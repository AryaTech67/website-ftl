<?php
/**
 * API Cek Ongkir Otomatis For The Little (FTL)
 * Terintegrasi Langsung dengan Mengantar.com Public API (Official FTL Account)
 * Mendukung J&T Express, JNE, SiCepat, SPX, Anteraja secara real-time
 * Fallback cerdas ke database tarif lokal jika jaringan offline
 */

header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/shipping_data.php';

$action = $_GET['action'] ?? 'calculate';

// 1. GET ALL PROVINCES & CITIES FOR DROPDOWN
if ($action === 'destinations') {
    $response = getShippingDestinations($SHIPPING_DATA);
    echo json_encode(['status' => 'success', 'data' => $response]);
    exit;
}

// 2. LIVE ADDRESS SEARCH VIA MENGANTAR
if ($action === 'search_address') {
    $keyword = trim($_GET['keyword'] ?? '');
    if (strlen($keyword) < 2) {
        echo json_encode(['status' => 'success', 'data' => []]);
        exit;
    }

    if (defined('MENGANTAR_API_KEY') && !empty(MENGANTAR_API_KEY)) {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => "https://api-public.mengantar.com/api/public/" . MENGANTAR_API_KEY . "/address/search?keyword=" . urlencode($keyword),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 4,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $res = curl_exec($ch);
        curl_close($ch);

        if ($res) {
            $parsed = json_decode($res, true);
            if (!empty($parsed['data'])) {
                $results = [];
                foreach (array_slice($parsed['data'], 0, 15) as $item) {
                    $results[] = [
                        'id' => $item['_id'],
                        'full_address' => $item['fullAddress'] ?? ($item['SUBDISTRICT_NAME'] . ', ' . $item['DISTRICT_NAME'] . ', ' . $item['CITY_NAME'] . ', ' . $item['PROVINCE_NAME']),
                        'subdistrict' => $item['SUBDISTRICT_NAME'] ?? '',
                        'district' => $item['DISTRICT_NAME'] ?? '',
                        'city' => $item['CITY_NAME'] ?? '',
                        'province' => $item['PROVINCE_NAME'] ?? '',
                        'postal_code' => $item['ZIP_CODE'] ?? ''
                    ];
                }
                echo json_encode(['status' => 'success', 'data' => $results]);
                exit;
            }
        }
    }

    echo json_encode(['status' => 'success', 'data' => []]);
    exit;
}

// 3. CALCULATE SHIPPING COSTS
$province      = trim($_GET['province'] ?? $_POST['province'] ?? '');
$city          = trim($_GET['city'] ?? $_POST['city'] ?? '');
$weight        = intval($_GET['weight'] ?? $_POST['weight'] ?? 100); // dalam gram
$destinationId = trim($_GET['destination_id'] ?? $_POST['destination_id'] ?? '');

// Hitung berat dapat ditagih (Toleransi kurir 1kg)
$chargeableKg = max(1, ceil($weight / 1000));

if (empty($province) && empty($city) && empty($destinationId)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Provinsi dan Kota tujuan wajib diisi.'
    ]);
    exit;
}

// =========================================================================
// A. INTEGRASI UTAMA: MENGANTAR.COM PUBLIC API (LIVE RESMI FTL)
// Tarif 100% identik dengan pembuatan resi di dashboard Mengantar FTL
// =========================================================================
if (defined('MENGANTAR_API_KEY') && !empty(MENGANTAR_API_KEY)) {
    $apiKey = MENGANTAR_API_KEY;
    $originId = defined('MENGANTAR_ORIGIN_ID') ? MENGANTAR_ORIGIN_ID : '5fc62dfaf8f44b34aa4be93b'; // Gudang FTL Bogor

    // 1. Tentukan Destination ID jika belum ada
    $targetDestId = $destinationId;
    $matchedAddressName = $city . ', ' . $province;

    if (empty($targetDestId) && (!empty($city) || !empty($province))) {
        $cleanCity = trim(preg_replace('/^(Kota|Kabupaten|Kab\.?)\s+/i', '', $city));
        $cleanProv = trim(preg_replace('/^(Provinsi|Prov\.?)\s+/i', '', $province));
        
        $searchKey = !empty($cleanCity) ? $cleanCity : $cleanProv;
        
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => "https://api-public.mengantar.com/api/public/{$apiKey}/address/search?keyword=" . urlencode($searchKey),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 4,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $searchRes = curl_exec($ch);
        curl_close($ch);

        if ($searchRes) {
            $searchJson = json_decode($searchRes, true);
            if (!empty($searchJson['data'])) {
                // Cari match terbaik antara kota & provinsi
                foreach ($searchJson['data'] as $item) {
                    $itemCity = $item['CITY_NAME'] ?? '';
                    $itemProv = $item['PROVINCE_NAME'] ?? '';
                    if (stripos($itemCity, $cleanCity) !== false && (empty($cleanProv) || stripos($itemProv, $cleanProv) !== false)) {
                        $targetDestId = $item['_id'];
                        $matchedAddressName = $item['fullAddress'] ?? ($itemCity . ', ' . $itemProv);
                        break;
                    }
                }
                // Jika tidak match persis kota & provinsi, ambil item pertama
                if (empty($targetDestId) && isset($searchJson['data'][0]['_id'])) {
                    $targetDestId = $searchJson['data'][0]['_id'];
                    $matchedAddressName = $searchJson['data'][0]['fullAddress'] ?? ($city . ', ' . $province);
                }
            }
        }
    }

    // 2. Eksekusi Cek Tarif ke Mengantar Estimate API
    if (!empty($targetDestId)) {
        $estimateUrl = "https://api-public.mengantar.com/api/public/{$apiKey}/order/estimate?origin_id={$originId}&destination_id={$targetDestId}&courier=all&weight={$chargeableKg}";
        
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $estimateUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $estRes = curl_exec($ch);
        $estErr = curl_error($ch);
        curl_close($ch);

        if (!$estErr && $estRes) {
            $estJson = json_decode($estRes, true);
            if (!empty($estJson['success']) && !empty($estJson['data'])) {
                $mData = $estJson['data'];
                $liveCouriers = [];

                // Pemetaan kurir favorit FTL
                $courierMap = [
                    'JT' => [
                        'code'    => 'jnt',
                        'name'    => 'J&T Express',
                        'badge'   => 'Terpopuler ⚡',
                        'service' => 'Layanan EZ (Reguler)',
                        'color'   => 'red'
                    ],
                    'JNE' => [
                        'code'    => 'jne',
                        'name'    => 'JNE Express',
                        'badge'   => 'Terpercaya 📦',
                        'service' => 'Layanan REG (Reguler)',
                        'color'   => 'blue'
                    ],
                    'SiCepat' => [
                        'code'    => 'sicepat',
                        'name'    => 'SiCepat Ekspres',
                        'badge'   => 'Ekonomis 🚀',
                        'service' => 'Layanan REG (Reguler)',
                        'color'   => 'amber'
                    ],
                    'spx' => [
                        'code'    => 'spx',
                        'name'    => 'SPX Express',
                        'badge'   => 'Cepat ⚡',
                        'service' => 'Layanan Standard',
                        'color'   => 'orange'
                    ],
                    'anteraja' => [
                        'code'    => 'anteraja',
                        'name'    => 'Anteraja',
                        'badge'   => 'Praktis 📦',
                        'service' => 'Layanan Reguler',
                        'color'   => 'purple'
                    ]
                ];

                foreach ($courierMap as $mKey => $info) {
                    if (isset($mData[$mKey]) && empty($mData[$mKey]['unsupported'])) {
                        $c = $mData[$mKey];
                        // Gunakan price/estimatedPrice resmi Mengantar
                        $cost = intval(!empty($c['price']) ? $c['price'] : ($c['estimatedPrice'] ?? 0));
                        $specialCost = intval(!empty($c['estimatedSpecialPrice']) ? $c['estimatedSpecialPrice'] : $cost);
                        
                        if ($cost > 0) {
                            $rawEtd = $c['estimate_delivery'] ?? ($c['estimatedDate'] ?? '');
                            $cleanEtd = !empty($rawEtd) && $rawEtd !== '-' ? trim($rawEtd) : '1-3 Hari';
                            if (stripos($cleanEtd, 'hari') === false && stripos($cleanEtd, 'day') === false) {
                                $cleanEtd .= ' Hari';
                            }
                            $cleanEtd = str_ireplace(['days', 'day'], 'Hari', $cleanEtd);

                            $liveCouriers[] = [
                                'code'           => $info['code'],
                                'name'           => $info['name'],
                                'badge'          => $info['badge'],
                                'service'        => $info['service'],
                                'cost'           => $cost,
                                'special_cost'   => $specialCost,
                                'cost_formatted' => 'Rp ' . number_format($cost, 0, ',', '.'),
                                'etd'            => $cleanEtd,
                                'color'          => $info['color'],
                                'is_live'        => true
                            ];
                        }
                    }
                }

                if (!empty($liveCouriers)) {
                    echo json_encode([
                        'status'         => 'success',
                        'source'         => 'mengantar_live_api',
                        'origin'         => defined('SHIPPING_ORIGIN_CITY') ? SHIPPING_ORIGIN_CITY : 'Kota Bogor',
                        'destination'    => $matchedAddressName,
                        'weight_grams'   => $weight,
                        'chargeable_kg'  => $chargeableKg,
                        'couriers'       => $liveCouriers
                    ]);
                    exit;
                }
            }
        }
    }
}

// =========================================================================
// B. FALLBACK: DATABASE TARIF RIIL LOKAL (SUPER CEPAT & ANTI-DOWN)
// =========================================================================
$rateInfo = null;

if (isset($SHIPPING_DATA[$province])) {
    $provData = $SHIPPING_DATA[$province];
    if (isset($provData['cities'][$city])) {
        $rateInfo = $provData['cities'][$city];
    } else {
        $rateInfo = $provData['base'];
    }
} else {
    // Default fallback tarif luar pulau
    $rateInfo = ['jnt' => 35000, 'jne' => 38000, 'sicepat' => 36000, 'etd' => '2-4 Hari'];
}

$jntCost     = $rateInfo['jnt'] * $chargeableKg;
$jneCost     = $rateInfo['jne'] * $chargeableKg;
$sicepatCost = $rateInfo['sicepat'] * $chargeableKg;
$etd         = $rateInfo['etd'];

$couriers = [
    [
        'code'           => 'jnt',
        'name'           => 'J&T Express',
        'badge'          => 'Terpopuler ⚡',
        'service'        => 'Layanan EZ (Reguler)',
        'cost'           => $jntCost,
        'cost_formatted' => 'Rp ' . number_format($jntCost, 0, ',', '.'),
        'etd'            => $etd,
        'color'          => 'red',
        'is_live'        => false
    ],
    [
        'code'           => 'jne',
        'name'           => 'JNE Express',
        'badge'          => 'Terpercaya 📦',
        'service'        => 'Layanan REG (Reguler)',
        'cost'           => $jneCost,
        'cost_formatted' => 'Rp ' . number_format($jneCost, 0, ',', '.'),
        'etd'            => $etd,
        'color'          => 'blue',
        'is_live'        => false
    ],
    [
        'code'           => 'sicepat',
        'name'           => 'SiCepat Ekspres',
        'badge'          => 'Ekonomis 🚀',
        'service'        => 'Layanan REG (Reguler)',
        'cost'           => $sicepatCost,
        'cost_formatted' => 'Rp ' . number_format($sicepatCost, 0, ',', '.'),
        'etd'            => $etd,
        'color'          => 'amber',
        'is_live'        => false
    ]
];

echo json_encode([
    'status'         => 'success',
    'source'         => 'local_fallback',
    'origin'         => defined('SHIPPING_ORIGIN_CITY') ? SHIPPING_ORIGIN_CITY : 'Kota Bogor',
    'destination'    => $city . ', ' . $province,
    'weight_grams'   => $weight,
    'chargeable_kg'  => $chargeableKg,
    'couriers'       => $couriers
]);
exit;
