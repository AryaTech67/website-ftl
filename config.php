<?php
/**
 * Konfigurasi Utama Website For The Little (FTL)
 * Mudah disesuaikan saat migrasi ke hosting cPanel / domain .com
 */

// Pengaturan Dasar
define('SITE_NAME', 'For The Little Indonesia');
define('SITE_SHORT_NAME', 'For The Little');
define('SITE_TAGLINE', "No.1 Natural BabyCare from Indonesia 🍃");
define('SITE_DESCRIPTION', "Perawatan alami terbaik untuk bayi dan anak berbahan kekayaan alam Indonesia. Hangat alami, menenangkan, teruji dermatologis, dan aman untuk newborn (0+).");
define('SITE_KEYWORDS', 'baby calming rub cream, minyak telon bayi, krim kolik bayi, skincare bayi alami, for the little indonesia, ftl baby');

// Kontak & Media Sosial Resmi
define('WHATSAPP_NUMBER', '6285148313636'); // Nomor WhatsApp admin resmi FTL (format 628xxx tanpa simbol)
define('WHATSAPP_DISPLAY', '+62 851-4831-3636');
define('INSTAGRAM_URL', 'https://www.instagram.com/forthelittle.id/');
define('TIKTOK_URL', 'https://www.tiktok.com/@forthelittle.id');
define('SHOPEE_URL', 'https://shopee.co.id/forthelittle.id');
define('SHOPEE_REVIEWS_URL', 'https://shopee.co.id/buyer/6118698651/rating?shop_id=1784309022&is_from_signup=true');
define('TOKOPEDIA_URL', 'https://www.tokopedia.com/');
define('EMAIL_CONTACT', 'adminforthelittle@gmail.com');
define('OPERATIONAL_HOURS_WEEKDAY', 'Senin - Jumat: 09.00 - 17.00 WIB');
define('OPERATIONAL_HOURS_SATURDAY', 'Sabtu: 09.00 - 15.00 WIB');
define('OPERATIONAL_HOURS_SUNDAY', 'Minggu & Hari Libur: Tutup');

// Pengaturan Ekspedisi & Live API Ongkir
define('SHIPPING_ORIGIN_CITY', 'Jakarta Selatan');
define('SHIPPING_ORIGIN_PROVINCE', 'DKI Jakarta');
define('SHIPPING_ORIGIN_ID', 153); // ID Kota Jakarta Selatan di RajaOngkir
define('RAJAONGKIR_API_KEY', ''); // Masukkan API Key RajaOngkir jika menggunakan RajaOngkir
define('BITESHIP_API_KEY', '');   // Atau masukkan API Key Biteship jika menggunakan Biteship

// Penentuan Base URL Otomatis (Bekerja di localhost XAMPP, Vercel, maupun cPanel / Domain .com)
$is_https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') 
    || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
    || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
$protocol = $is_https ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$script_name = isset($_SERVER['SCRIPT_NAME']) ? str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])) : '';
if ($script_name == '/' || $script_name == '\\' || $script_name == '.' || empty($script_name) || $script_name == '/api') {
    $base_url = $protocol . $host . '/';
} else {
    $base_url = rtrim($protocol . $host . $script_name, '/') . '/';
}
define('BASE_URL', $base_url);

// Daftar Produk Resmi FTL
$PRODUCTS = [
    'calming-rub-50g' => [
        'id' => 'calming-rub-50g',
        'name' => 'Baby Calming Rub Cream 50g',
        'subtitle' => 'Krim Telon & Calming Alami dengan Biji Pala Nusantara',
        'price' => 79000,
        'original_price' => 118000,
        'badge' => 'Best Seller ⭐',
        'rating' => 5.0,
        'reviews_count' => 16,
        'image' => 'assets/images/product-calming-rub-real.webp',
        'short_desc' => 'Diformulasikan khusus dengan Biji Pala asli Nusantara, Calendula, Virgin Coconut Oil, dan Avocado Oil untuk meredakan kolik, perut kembung, dan membantu si kecil tidur lebih lelap tanpa rasa lengket.',
        'size' => '50 gram (Tube)',
        'certifications' => ['BPOM Certified', 'Halal Indonesia', 'Hypoallergenic', 'Dermatologically Tested', 'Safe for Newborn 0+'],
        'benefits' => [
            'Meredakan perut kembung dan gejala kolik pada bayi',
            'Memberikan sensasi hangat alami yang lembut & menenangkan',
            'Tekstur cream ringan, cepat meresap, dan tidak lengket',
            'Aroma menenangkan alami yang membantu tidur lebih nyenyak',
            'Aman untuk kulit sensitif dan bayi baru lahir (0+ bulan)'
        ]
    ],
    'bundling-double-care' => [
        'id' => 'bundling-double-care',
        'name' => 'Bundle Double Care (2x 50g)',
        'subtitle' => 'Paket Hemat 2 Tube Perawatan Harian & Cadangan Bepergian',
        'price' => 149000,
        'original_price' => 236000,
        'badge' => 'Hemat 25% 🔥',
        'rating' => 5.0,
        'reviews_count' => 128,
        'image' => 'assets/images/product-bundle-2-real.webp',
        'short_desc' => 'Paket 2 pcs Baby Calming Rub Cream 50g. Satu untuk di rumah di meja ganti, satu selalu siap sedia di diaper bag bepergian.',
        'size' => '2 x 50 gram (Total 100g)',
        'certifications' => ['BPOM Certified', 'Halal Indonesia', 'Dermatologically Tested'],
        'benefits' => [
            'Lebih hemat dibanding beli satuan',
            'Praktis untuk stok di rumah dan travelling',
            'Gratis konsultasi pemakaian via WhatsApp CS'
        ]
    ],
    'bundling-newborn-gift' => [
        'id' => 'bundling-newborn-gift',
        'name' => 'Bundle Triple Care (3x 50g)',
        'subtitle' => 'Paket Lengkap 3 Tube (Stok 3 Bulan Bebas Kolik & Rewel)',
        'price' => 219000,
        'original_price' => 354000,
        'badge' => 'Super Hemat 38% 🌟',
        'rating' => 5.0,
        'reviews_count' => 84,
        'image' => 'assets/images/product-bundle-3-real.webp',
        'short_desc' => 'Paket terlengkap dan paling hemat untuk perlindungan optimal si kecil setiap hari. Satu untuk meja ganti kamar, satu untuk tas bepergian, satu untuk stok cadangan.',
        'size' => '3 x 50 gram (Total 150g)',
        'certifications' => ['BPOM Certified', 'Halal Indonesia', 'Dermatologically Tested', 'Paling Hemat'],
        'benefits' => [
            'Hemat Rp 135.000 dibanding harga sebelum diskon',
            'Stok tenang 3 bulan bebas rewel malam hari',
            'Gratis konsultasi pemakaian via WhatsApp CS'
        ]
    ]
];

// Helper fungsi format rupiah
function format_rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// Helper URL WhatsApp Generator
function get_whatsapp_order_link($product_name = '', $quantity = 1) {
    $text = "Halo Admin " . SITE_SHORT_NAME . "! 👋\n\n";
    $text .= "Saya ingin konsultasi dan pesan produk:\n";
    if (!empty($product_name)) {
        $text .= "• Produk: " . $product_name . "\n";
        $text .= "• Jumlah: " . $quantity . " pcs\n\n";
    } else {
        $text .= "• Baby Calming Rub Cream 50g\n\n";
    }
    $text .= "Mohon info ketersediaan stok dan ongkir ya Min. Terima kasih! 🙏";
    
    return "https://wa.me/" . WHATSAPP_NUMBER . "?text=" . rawurlencode($text);
}
