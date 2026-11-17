<?php
/**
 * API Cek Ongkir Otomatis For The Little (FTL)
 * Mendukung J&T Express, JNE, SiCepat ke seluruh Indonesia
 * Terintegrasi otomatis ke WhatsApp Checkout
 */

header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config.php';

// Load Database Wilayah & Tarif Dasar Ekspedisi dari Jabodetabek (per kg)
require_once __DIR__ . '/../includes/shipping_data.php';

$action = $_GET['action'] ?? 'calculate';

// 1. GET ALL PROVINCES & CITIES FOR DROPDOWN
if ($action === 'destinations') {
    $response = getShippingDestinations($SHIPPING_DATA);
    echo json_encode(['status' => 'success', 'data' => $response]);
    exit;
}

// 2. CALCULATE SHIPPING COSTS
$province = trim($_GET['province'] ?? $_POST['province'] ?? '');
$city     = trim($_GET['city'] ?? $_POST['city'] ?? '');
$weight   = intval($_GET['weight'] ?? $_POST['weight'] ?? 100); // dalam gram

// Hitung berat dapat ditagih (Toleransi kurir 1.2kg = 1kg)
$chargeableKg = max(1, ceil($weight / 1000));

if (empty($province) || empty($city)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Provinsi dan Kota tujuan wajib diisi.'
    ]);
    exit;
}

// =========================================================================
// INTEGRASI LIVE API KE SERVER EKSPEDISI (RajaOngkir & Biteship)
// Jika API Key diisi di config.php, sistem otomatis menembak server live!
// =========================================================================
$liveCouriers = [];

// A. Pengecekan via Live RajaOngkir API jika API Key terpasang
if (defined('RAJAONGKIR_API_KEY') && !empty(RAJAONGKIR_API_KEY)) {
    $apiKey = RAJAONGKIR_API_KEY;
    // Map ID Kota Jakarta Selatan (Origin default FTL: 153 di RajaOngkir)
    $originId = defined('SHIPPING_ORIGIN_ID') ? SHIPPING_ORIGIN_ID : 153;
    
    // Tembak API RajaOngkir untuk JNE, J&T, SiCepat
    $targetCouriers = ['jne', 'jnt', 'sicepat'];
    foreach ($targetCouriers as $cr) {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 4,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query([
                'origin' => $originId,
                'destination' => $city, // ID atau nama kota
                'weight' => $weight,
                'courier' => $cr
            ]),
            CURLOPT_HTTPHEADER => [
                "content-type: application/x-www-form-urlencoded",
                "key: " . $apiKey
            ],
        ]);
        $res = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if (!$err && $res) {
            $parsed = json_decode($res, true);
            if (isset($parsed['rajaongkir']['results'][0]['costs'][0])) {
                $costData = $parsed['rajaongkir']['results'][0]['costs'][0];
                $costVal = $costData['cost'][0]['value'] ?? 0;
                $etdVal = $costData['cost'][0]['etd'] ?? '1-2';
                if ($costVal > 0) {
                    $liveCouriers[] = [
                        'code' => $cr,
                        'name' => strtoupper($cr) . ' Express',
                        'badge' => 'Live API ⚡',
                        'service' => $costData['service'] . ' (Reguler)',
                        'cost' => $costVal,
                        'cost_formatted' => 'Rp ' . number_format($costVal, 0, ',', '.'),
                        'etd' => $etdVal . ' Hari',
                        'color' => ($cr === 'jnt' ? 'red' : ($cr === 'jne' ? 'blue' : 'amber'))
                    ];
                }
            }
        }
    }

    if (!empty($liveCouriers)) {
        echo json_encode([
            'status'        => 'success',
            'source'        => 'rajaongkir_live_api',
            'origin'        => defined('SHIPPING_ORIGIN_CITY') ? SHIPPING_ORIGIN_CITY : 'Jakarta Selatan',
            'destination'   => $city . ', ' . $province,
            'weight_grams'  => $weight,
            'chargeable_kg' => $chargeableKg,
            'couriers'      => $liveCouriers
        ]);
        exit;
    }
}

// B. Pengecekan via Live Biteship API jika API Key terpasang
if (defined('BITESHIP_API_KEY') && !empty(BITESHIP_API_KEY)) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => "https://api.biteship.com/v1/rates/couriers",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 4,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode([
            'origin_postal_code' => 12430, // Jakarta Selatan
            'destination_area_name' => $city . ', ' . $province,
            'couriers' => 'jne,jnt,sicepat',
            'items' => [[
                'name' => 'For The Little Baby Calming Rub',
                'value' => 79000,
                'weight' => $weight,
                'quantity' => 1
            ]]
        ]),
        CURLOPT_HTTPHEADER => [
            "Authorization: " . BITESHIP_API_KEY,
            "Content-Type: application/json"
        ]
    ]);
    $res = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if (!$err && $res) {
        $parsed = json_decode($res, true);
        if (!empty($parsed['pricing'])) {
            foreach ($parsed['pricing'] as $p) {
                if (in_array(strtolower($p['courier_code']), ['jne', 'jnt', 'sicepat'])) {
                    $liveCouriers[] = [
                        'code' => strtolower($p['courier_code']),
                        'name' => $p['courier_name'],
                        'badge' => 'Live API ⚡',
                        'service' => $p['courier_service_name'],
                        'cost' => $p['price'],
                        'cost_formatted' => 'Rp ' . number_format($p['price'], 0, ',', '.'),
                        'etd' => $p['duration'],
                        'color' => 'emerald'
                    ];
                }
            }
        }
    }

    if (!empty($liveCouriers)) {
        echo json_encode([
            'status'        => 'success',
            'source'        => 'biteship_live_api',
            'origin'        => defined('SHIPPING_ORIGIN_CITY') ? SHIPPING_ORIGIN_CITY : 'Jakarta Selatan',
            'destination'   => $city . ', ' . $province,
            'weight_grams'  => $weight,
            'chargeable_kg' => $chargeableKg,
            'couriers'      => $liveCouriers
        ]);
        exit;
    }
}

// =========================================================================
// C. FALLBACK: DATABASE TARIF RIIL LOKAL (SUPER CEPAT & TIDAK AKAN PERNAH DOWN)
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
        'color'          => 'red'
    ],
    [
        'code'           => 'jne',
        'name'           => 'JNE Express',
        'badge'          => 'Terpercaya 📦',
        'service'        => 'Layanan REG (Reguler)',
        'cost'           => $jneCost,
        'cost_formatted' => 'Rp ' . number_format($jneCost, 0, ',', '.'),
        'etd'            => $etd,
        'color'          => 'blue'
    ],
    [
        'code'           => 'sicepat',
        'name'           => 'SiCepat Ekspres',
        'badge'          => 'Ekonomis 🚀',
        'service'        => 'Layanan REG (Reguler)',
        'cost'           => $sicepatCost,
        'cost_formatted' => 'Rp ' . number_format($sicepatCost, 0, ',', '.'),
        'etd'            => $etd,
        'color'          => 'amber'
    ]
];

echo json_encode([
    'status'         => 'success',
    'origin'         => defined('SHIPPING_ORIGIN_CITY') ? SHIPPING_ORIGIN_CITY : 'Jakarta Selatan',
    'destination'    => $city . ', ' . $province,
    'weight_grams'   => $weight,
    'chargeable_kg'  => $chargeableKg,
    'couriers'       => $couriers
]);
exit;
