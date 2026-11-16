<?php
$current_page = 'reseller';
$page_title = 'Peluang Kemitraan & Reseller Resmi';
$page_desc = 'Bergabung menjadi mitra dan reseller For The Little Indonesia. Produk berkualitas tinggi, repeat order cepat, dan margin keuntungan menarik.';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- Header Banner -->
<section class="bg-gradient-to-b from-ftl-light to-ftl-cream py-16 border-b border-ftl-sand">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
        <span class="inline-block text-xs font-bold px-3 py-1 rounded-full bg-amber-100 text-amber-800 uppercase tracking-widest">
            Peluang Bisnis Berkah 💼🍃
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold font-display text-ftl-forest">
            Tumbuh Bersama Komunitas Mitra FTL
        </h1>
        <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
            Hadirkan produk perawatan bayi alami berkualitas untuk ibu-ibu di kota Anda. Dapatkan margin keuntungan menjanjikan dan dukungan materi promosi lengkap.
        </p>
    </div>
</section>

<!-- Why Become a Reseller -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="text-2xl sm:text-3xl font-extrabold font-display text-gray-900">
                Mengapa Menjadi Mitra For The Little?
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-2">
                Produk kebutuhan harian bayi (*daily essentials*) memiliki tingkat perputaran dan pembelian berulang (*repeat order*) yang sangat tinggi.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            
            <div class="p-6 rounded-3xl bg-ftl-cream border border-ftl-sand space-y-3 text-center">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mx-auto">
                    <i data-lucide="repeat" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-base text-gray-900">Repeat Order Tinggi</h3>
                <p class="text-xs text-gray-600">Dipakai setiap hari setelah mandi dan sebelum tidur, habis dalam 1-2 bulan.</p>
            </div>

            <div class="p-6 rounded-3xl bg-ftl-cream border border-ftl-sand space-y-3 text-center">
                <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-800 flex items-center justify-center mx-auto">
                    <i data-lucide="percent" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-base text-gray-900">Margin Menjanjikan</h3>
                <p class="text-xs text-gray-600">Keuntungan per botol menarik dengan harga eceran terikat yang terjaga (tidak ada banting harga).</p>
            </div>

            <div class="p-6 rounded-3xl bg-ftl-cream border border-ftl-sand space-y-3 text-center">
                <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-800 flex items-center justify-center mx-auto">
                    <i data-lucide="image" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-base text-gray-900">Materi Promosi Gratis</h3>
                <p class="text-xs text-gray-600">Foto profesional, video reels, copywriting, dan testimoni siap posting disediakan gratis di grup.</p>
            </div>

            <div class="p-6 rounded-3xl bg-ftl-cream border border-ftl-sand space-y-3 text-center">
                <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-800 flex items-center justify-center mx-auto">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-base text-gray-900">Legalitas & Mutu Teruji</h3>
                <p class="text-xs text-gray-600">Sudah berizin resmi BPOM dan sertifikasi Halal sehingga sangat dipercaya konsumen.</p>
            </div>

        </div>

    </div>
</section>

<!-- Tier Paket Reseller -->
<section class="py-16 bg-ftl-cream border-t border-ftl-sand">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="text-2xl sm:text-3xl font-extrabold font-display text-ftl-forest">
                Pilihan Paket Kemitraan
            </h2>
            <p class="text-xs sm:text-sm text-gray-600 mt-2">
                Pilih modal awal yang paling sesuai dengan target pasar Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Tier 1 -->
            <div class="bg-white rounded-3xl p-8 border border-ftl-sand shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="inline-block px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-bold">
                        Paket Starter
                    </span>
                    <h3 class="font-display font-bold text-2xl text-gray-900">Reseller Pemula</h3>
                    <p class="text-xs text-gray-500">Cocok untuk Bunda yang baru mulai jualan sampingan dari rumah.</p>
                    
                    <div class="pt-2">
                        <div class="text-xs text-gray-400">Minimal Order:</div>
                        <div class="text-2xl font-bold text-ftl-forest">12 pcs</div>
                    </div>

                    <ul class="space-y-2 text-xs text-gray-600 pt-3 border-t border-gray-100">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i> Diskon Reseller Khusus</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i> Akses Konten Feed & Story</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i> Masuk Grup Komunitas WA</li>
                    </ul>
                </div>

                <a href="https://wa.me/<?= WHATSAPP_NUMBER ?>?text=<?= rawurlencode('Halo Admin FTL, saya berminat daftar Paket Reseller Starter (12 pcs). Mohon info pricelist ya!') ?>" 
                   target="_blank" rel="noopener"
                   class="mt-6 w-full flex items-center justify-center gap-2 bg-ftl-forest hover:bg-emerald-800 text-white font-bold py-3 rounded-xl text-xs transition">
                    <i data-lucide="message-circle" class="w-4 h-4"></i> Daftar Reseller Starter
                </a>
            </div>

            <!-- Tier 2 (Highlighted) -->
            <div class="bg-white rounded-3xl p-8 border-2 border-emerald-600 shadow-xl flex flex-col justify-between relative">
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-emerald-600 text-white text-[11px] font-bold px-4 py-1 rounded-full shadow">
                    PALING DIMINATI ⭐
                </div>
                <div class="space-y-4">
                    <span class="inline-block px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold">
                        Paket Agen / Toko Bayi
                    </span>
                    <h3 class="font-display font-bold text-2xl text-gray-900">Agen Wilayah</h3>
                    <p class="text-xs text-gray-500">Untuk baby shop, apotek, bidan praktek, atau reseller aktif.</p>
                    
                    <div class="pt-2">
                        <div class="text-xs text-gray-400">Minimal Order:</div>
                        <div class="text-2xl font-bold text-emerald-700">36 pcs</div>
                    </div>

                    <ul class="space-y-2 text-xs text-gray-600 pt-3 border-t border-gray-100">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i> Margin Profit Lebih Besar</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i> Spanduk / Banner Toko Fisik</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i> Diarahkan Pembeli dari Wilayah Tersebut</li>
                    </ul>
                </div>

                <a href="https://wa.me/<?= WHATSAPP_NUMBER ?>?text=<?= rawurlencode('Halo Admin FTL, saya berminat daftar Paket Agen Wilayah (36 pcs). Mohon info pricelist dan benefit lengkapnya!') ?>" 
                   target="_blank" rel="noopener"
                   class="mt-6 w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-xl text-xs transition shadow-md">
                    <i data-lucide="message-circle" class="w-4 h-4"></i> Daftar Agen Wilayah
                </a>
            </div>

            <!-- Tier 3 -->
            <div class="bg-white rounded-3xl p-8 border border-ftl-sand shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="inline-block px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold">
                        Paket Distributor
                    </span>
                    <h3 class="font-display font-bold text-2xl text-gray-900">Distributor Kota</h3>
                    <p class="text-xs text-gray-500">Eksklusivitas distribusi untuk 1 kota / kabupaten.</p>
                    
                    <div class="pt-2">
                        <div class="text-xs text-gray-400">Minimal Order:</div>
                        <div class="text-2xl font-bold text-ftl-forest">100 pcs</div>
                    </div>

                    <ul class="space-y-2 text-xs text-gray-600 pt-3 border-t border-gray-100">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i> Harga Grosir Termurah</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i> Proteksi Wilayah Distribusi</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i> Dukungan Ads & Marketing Support</li>
                    </ul>
                </div>

                <a href="https://wa.me/<?= WHATSAPP_NUMBER ?>?text=<?= rawurlencode('Halo Admin FTL, saya ingin diskusi peluang Distributor Kota (100+ pcs). Bisa jadwalkan call/meeting?') ?>" 
                   target="_blank" rel="noopener"
                   class="mt-6 w-full flex items-center justify-center gap-2 bg-ftl-forest hover:bg-emerald-800 text-white font-bold py-3 rounded-xl text-xs transition">
                    <i data-lucide="message-circle" class="w-4 h-4"></i> Ajukan Distributor Kota
                </a>
            </div>

        </div>

    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
