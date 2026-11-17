<?php
$current_page = 'produk';
$page_title = 'Katalog Produk & Baby Calming Rub Cream 50g';
$page_desc = 'Jelajahi produk perawatan bayi alami dari For The Little. Diformulasikan dengan Minyak Pala Nusantara dan Calendula untuk redakan kolik dan kembung.';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$main_product = $PRODUCTS['calming-rub-50g'];
?>

<!-- Breadcrumb -->
<div class="bg-ftl-light/50 border-b border-ftl-sand py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-gray-500 flex items-center gap-2">
        <a href="<?= BASE_URL ?>index.php" class="hover:text-ftl-forest">Beranda</a>
        <span>/</span>
        <span class="text-ftl-forest font-bold">Katalog Produk</span>
    </div>
</div>

<!-- Product Main Detail Section -->
<section class="py-12 bg-white" x-data="{ 
    activeTab: 'manfaat', 
    qty: 1,
    selectedVariant: 'calming-rub-50g',
    variantPrice: 79000,
    formatRp(v) { return 'Rp ' + Number(v).toLocaleString('id-ID'); },
    activeThumb: 0,
    thumbnails: [
        {
            title: 'Baby Calming Rub Cream 50g',
            img: '<?= BASE_URL ?>assets/images/product-calming-rub.svg',
            badgeLeft: 'BPOM & Halal Resmi',
            badgeRight: 'Safe for Newborn 0+',
            caption: 'Kemasan Tube Flip-Top Anti-Bocor (Isi Bersih 50g) • Travel Friendly'
        },
        {
            title: 'Minyak Atsiri Buah Pala Nusantara',
            img: '<?= BASE_URL ?>assets/images/ingredient-nutmeg.svg',
            badgeLeft: '100% Buah Pala Asli',
            badgeRight: 'Hangat Lembut Bayi',
            caption: 'Menenangkan Kolik & Redakan Perut Begah Tanpa Bikin Kulit Bayi Perih'
        },
        {
            title: 'Ekstrak Bunga Calendula Organik',
            img: '<?= BASE_URL ?>assets/images/ingredient-calendula.svg',
            badgeLeft: 'Ekstrak Organik Alami',
            badgeRight: 'Skin Barrier Protection',
            caption: 'Menutrisi Kelembapan Kulit Sensitif Newborn & Mencegah Iritasi Ruam'
        }
    ],
    orderDirectWA() {
        const url = '<?= BASE_URL ?>' + 'index.php';
        // Trigger WA message
        let text = 'Halo Admin For The Little! 👋 Saya ingin beli ' + this.qty + ' pcs Baby Calming Rub Cream 50g (Total: ' + this.formatRp(this.qty * this.variantPrice) + '). Mohon info ongkir dan no rek ya!';
        window.open('https://wa.me/<?= WHATSAPP_NUMBER ?>?text=' + encodeURIComponent(text), '_blank');
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 sm:gap-12 items-start">
            
            <!-- Left: Product Image Showcase (Col 6) - Interaktif Penuh -->
            <div class="lg:col-span-6 space-y-4">
                <div class="bg-gradient-to-b from-ftl-light to-white rounded-3xl p-6 sm:p-8 border border-ftl-sand flex flex-col items-center justify-between relative min-h-[380px] sm:min-h-[420px] transition-all duration-300">
                    <!-- Dynamic Badges based on active thumbnail -->
                    <div class="w-full flex items-center justify-between z-10">
                        <span class="bg-emerald-600 text-white text-[11px] sm:text-xs font-bold px-3 py-1.5 rounded-full shadow-xs transition-all"
                              x-text="thumbnails[activeThumb].badgeLeft">
                        </span>
                        <span class="bg-amber-500 text-white text-[11px] sm:text-xs font-bold px-3 py-1.5 rounded-full shadow-xs transition-all"
                              x-text="thumbnails[activeThumb].badgeRight">
                        </span>
                    </div>

                    <!-- Main Dynamic Image Preview -->
                    <div class="my-auto py-4 flex items-center justify-center min-h-[220px] sm:min-h-[280px]">
                        <img :src="thumbnails[activeThumb].img" 
                             :alt="thumbnails[activeThumb].title" 
                             class="w-52 h-52 sm:w-72 sm:h-72 object-contain drop-shadow-xl hover:scale-105 transition-all duration-300">
                    </div>

                    <!-- Active Image Label & Explanation -->
                    <div class="w-full text-center pt-3 border-t border-emerald-100/70">
                        <h4 class="font-display font-extrabold text-xs sm:text-sm text-ftl-forest" x-text="thumbnails[activeThumb].title"></h4>
                        <p class="text-[11px] text-gray-500 mt-0.5 line-clamp-1" x-text="thumbnails[activeThumb].caption"></p>
                    </div>
                </div>

                <!-- Thumbnails Mini Preview - Sekarang Interaktif Bisa Diklik -->
                <div class="grid grid-cols-3 gap-2.5 sm:gap-3">
                    <template x-for="(t, index) in thumbnails" :key="index">
                        <button type="button" 
                                @click="activeThumb = index" 
                                class="p-2.5 sm:p-3 rounded-2xl flex flex-col items-center justify-center cursor-pointer transition-all duration-200"
                                :class="activeThumb === index ? 'border-2 border-ftl-forest bg-ftl-light/60 shadow-sm ring-2 ring-emerald-500/20' : 'border border-gray-200 bg-white hover:border-ftl-forest/60 hover:bg-gray-50'">
                            <img :src="t.img" :alt="t.title" class="h-12 sm:h-14 w-auto object-contain">
                            <span class="text-[10px] font-bold mt-1.5 truncate max-w-full"
                                  :class="activeThumb === index ? 'text-ftl-forest font-extrabold' : 'text-gray-500'"
                                  x-text="index === 0 ? 'Kemasan Tube' : (index === 1 ? 'Minyak Pala' : 'Calendula')">
                            </span>
                        </button>
                    </template>
                </div>
            </div>

            <!-- Right: Product Purchasing & Specs (Col 6) -->
            <div class="lg:col-span-6 space-y-6">
                <div>
                    <span class="text-xs font-bold text-ftl-accent uppercase tracking-wider">
                        Natural BabyCare Essentials
                    </span>
                    <h1 class="text-2xl sm:text-4xl font-extrabold font-display text-gray-900 mt-1">
                        Baby Calming Rub Cream (50g)
                    </h1>
                    <p class="text-sm text-gray-500 mt-1">
                        Krim Telon & Penghangat Alami dengan Ekstrak Minyak Pala Nusantara & Calendula
                    </p>

                    <a href="<?= SHOPEE_REVIEWS_URL ?>" target="_blank" rel="noopener" 
                       class="inline-flex items-center gap-2 mt-3 group" title="Lihat 16 ulasan bintang 5 di Shopee Resmi">
                        <div class="flex text-amber-400 text-sm">★★★★★</div>
                        <span class="text-xs font-bold text-gray-800">5.0 / 5.0</span>
                        <span class="text-xs text-gray-400">• 16 Ulasan Bintang 5 di Shopee</span>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-[#FFF0ED] text-[#EE4D2D] border border-[#EE4D2D]/20 group-hover:bg-[#EE4D2D] group-hover:text-white transition">
                            Shopee Resmi &rarr;
                        </span>
                    </a>
                </div>

                <!-- Pricing Block -->
                <div class="bg-ftl-light p-4 rounded-2xl border border-emerald-100 flex items-baseline justify-between">
                    <div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-3xl font-extrabold text-ftl-forest">
                                Rp 79.000
                            </span>
                            <span class="text-sm text-gray-400 line-through">
                                Rp 99.000
                            </span>
                            <span class="text-xs font-bold bg-amber-100 text-amber-800 px-2 py-0.5 rounded-full">
                                Hemat 20%
                            </span>
                        </div>
                        <span class="text-xs text-gray-500 mt-1 block">Kemasan Tube 50 gram (Penggunaan 1 - 2 bulan)</span>
                    </div>
                    <div class="text-right">
                        <span class="inline-flex items-center gap-1 text-xs font-bold text-emerald-700 bg-emerald-100/80 px-2.5 py-1 rounded-full">
                            <i data-lucide="check" class="w-3 h-3"></i> Ready Stock
                        </span>
                    </div>
                </div>

                <!-- Short Benefit List -->
                <ul class="space-y-2 text-xs sm:text-sm text-gray-700">
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600"></i> Redakan kolik, perut begah, dan kembung si kecil</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600"></i> Tekstur cream lembut mudah meresap, <strong>tidak licin/lengket</strong></li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600"></i> Aroma alami menenangkan, bantu bayi tidur nyenyak pulas</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600"></i> Teruji Hypoallergenic & ramah newborn (0+ bulan)</li>
                </ul>

                <!-- Order Controls (Qty + WA Button) -->
                <div class="pt-4 border-t border-gray-100 space-y-4">
                    <div class="flex items-center gap-4">
                        <span class="text-xs font-bold text-gray-700 uppercase">Jumlah:</span>
                        <div class="flex items-center border border-gray-300 rounded-xl bg-white">
                            <button type="button" @click="if (qty > 1) qty--" class="px-3.5 py-2 font-bold text-gray-600 hover:bg-gray-100 rounded-l-xl">-</button>
                            <span class="px-4 py-2 font-bold text-sm w-12 text-center" x-text="qty"></span>
                            <button type="button" @click="qty++" class="px-3.5 py-2 font-bold text-gray-600 hover:bg-gray-100 rounded-r-xl">+</button>
                        </div>
                        <div class="text-xs text-gray-500">
                            Subtotal: <strong class="text-ftl-forest text-sm font-extrabold" x-text="formatRp(qty * variantPrice)"></strong>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <button type="button" 
                                @click="orderDirectWA()"
                                class="w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 px-5 rounded-2xl shadow-lg hover:shadow-emerald-600/30 active:scale-95 transition-all text-sm cursor-pointer">
                            <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-4 h-4" alt="WhatsApp">
                            <span>Pesan via WhatsApp</span>
                        </button>
                        <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                           class="w-full flex items-center justify-center gap-2 bg-[#EE4D2D] hover:bg-[#d73f21] text-white font-bold py-3.5 px-5 rounded-2xl shadow-lg active:scale-95 transition-all text-sm text-center">
                            <img src="<?= BASE_URL ?>assets/images/shopee-icon-white.svg" class="w-4 h-4" alt="Shopee">
                            <span>Beli di Shopee Resmi</span>
                        </a>
                    </div>
                </div>

                <!-- Guarantee box -->
                <div class="bg-gray-50 p-3.5 rounded-2xl flex items-center justify-around text-xs text-gray-600 border border-gray-100">
                    <span class="flex items-center gap-1.5"><i data-lucide="shield" class="w-4 h-4 text-emerald-600"></i> 100% Original</span>
                    <span>•</span>
                    <span class="flex items-center gap-1.5"><i data-lucide="truck" class="w-4 h-4 text-emerald-600"></i> Pengiriman Seluruh RI</span>
                    <span>•</span>
                    <span class="flex items-center gap-1.5"><i data-lucide="headphones" class="w-4 h-4 text-emerald-600"></i> Free Konsultasi CS</span>
                </div>

            </div>

        </div>

        <!-- Detail Tabs (Manfaat, Komposisi, Cara Pakai, FAQ) -->
        <div class="mt-16 pt-10 border-t border-ftl-sand">
            <!-- Tab Headers -->
            <div class="flex flex-wrap border-b border-gray-200 gap-4 sm:gap-8">
                <button type="button" @click="activeTab = 'manfaat'" 
                        :class="activeTab === 'manfaat' ? 'border-ftl-forest text-ftl-forest font-bold' : 'border-transparent text-gray-500 hover:text-gray-700'"
                        class="pb-4 text-sm sm:text-base border-b-2 transition">
                    Manfaat Lengkap
                </button>
                <button type="button" @click="activeTab = 'komposisi'" 
                        :class="activeTab === 'komposisi' ? 'border-ftl-forest text-ftl-forest font-bold' : 'border-transparent text-gray-500 hover:text-gray-700'"
                        class="pb-4 text-sm sm:text-base border-b-2 transition">
                    Komposisi & Bahan Alami
                </button>
                <button type="button" @click="activeTab = 'carapakai'" 
                        :class="activeTab === 'carapakai' ? 'border-ftl-forest text-ftl-forest font-bold' : 'border-transparent text-gray-500 hover:text-gray-700'"
                        class="pb-4 text-sm sm:text-base border-b-2 transition">
                    Cara Penggunaan
                </button>
                <button type="button" @click="activeTab = 'faq'" 
                        :class="activeTab === 'faq' ? 'border-ftl-forest text-ftl-forest font-bold' : 'border-transparent text-gray-500 hover:text-gray-700'"
                        class="pb-4 text-sm sm:text-base border-b-2 transition">
                    Pertanyaan Umum (FAQ)
                </button>
            </div>

            <!-- Tab Content -->
            <div class="py-8 text-sm text-gray-700 leading-relaxed">
                
                <!-- Tab Manfaat -->
                <div x-show="activeTab === 'manfaat'" class="space-y-4 max-w-4xl">
                    <h3 class="font-display font-bold text-xl text-gray-900">Mengapa Baby Calming Rub Cream FTL Jadi Sahabat Terbaik Bunda?</h3>
                    <p>Bayi baru lahir memiliki sistem pencernaan yang belum sempurna, sehingga sering menelan udara saat menyusu atau menangis. Hal ini memicu gas terperangkap di lambung yang menyebabkan perut begah dan rasa sakit luar biasa yang disebut <strong>kolik infantil</strong>.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                        <div class="bg-ftl-cream p-4 rounded-2xl border border-ftl-sand">
                            <h4 class="font-bold text-ftl-forest mb-1">Menenangkan Kolik & Kembung</h4>
                            <p class="text-xs text-gray-600">Efek karminatif dari pala nusantara membantu meluruhkan dan mengeluarkan gas di perut bayi tanpa rasa perih panas.</p>
                        </div>
                        <div class="bg-ftl-cream p-4 rounded-2xl border border-ftl-sand">
                            <h4 class="font-bold text-ftl-forest mb-1">Kulit Lembut & Lembap</h4>
                            <p class="text-xs text-gray-600">Dilengkapi Calendula dan pelembap alami yang menjaga elastisitas kulit bayi agar tidak bersisik atau pecah-pecah.</p>
                        </div>
                    </div>
                </div>

                <!-- Tab Komposisi -->
                <div x-show="activeTab === 'komposisi'" style="display: none;" class="space-y-4 max-w-4xl">
                    <h3 class="font-display font-bold text-xl text-gray-900">Formulasi Murni & Teruji Klinis</h3>
                    <p>Kami bangga mengolah kekayaan hayati tanah air secara beretika dan higienis:</p>
                    <ul class="list-disc pl-5 space-y-2 text-xs sm:text-sm">
                        <li><strong>Myristica Fragrans (Nutmeg/Pala Nusantara Oil):</strong> Menghangatkan dan melancarkan sirkulasi alami.</li>
                        <li><strong>Calendula Officinalis Extract:</strong> Menjaga *skin barrier* dan menenangkan iritasi ringan.</li>
                        <li><strong>Sunflower & Coconut Plant Oils:</strong> Base carrier oil nabati lembut yang melembapkan dan cepat meresap tanpa menyumbat pori-pori.</li>
                        <li><strong>Natural Calming Aromatherapy:</strong> Keharuman alami lembut yang menenangkan si kecil saat rewel dan sebelum tidur.</li>
                        <li><strong>Bebas Dari:</strong> Paraben, SLS/SLES, Pewarna Buatan, Mineral Oil berbahaya, dan Alkohol.</li>
                    </ul>
                </div>

                <!-- Tab Cara Pakai -->
                <div x-show="activeTab === 'carapakai'" style="display: none;" class="space-y-4 max-w-4xl">
                    <h3 class="font-display font-bold text-xl text-gray-900">Panduan Penggunaan Harian</h3>
                    <ol class="list-decimal pl-5 space-y-2 text-xs sm:text-sm">
                        <li>Gunakan setelah mandi pagi, mandi sore, atau setiap kali si kecil tampak gelisah/rewel karena kembung.</li>
                        <li>Keluarkan cream secukupnya di telapak tangan Bunda, lalu hangatkan dengan menggosok kedua tangan.</li>
                        <li>Pijat lembut perut bayi dengan gerakan memutar searah jarum jam (pijatan ILU).</li>
                        <li>Usapkan juga pada punggung, dada, dan telapak kaki si kecil sebelum mengenakan pakaian atau kaus kaki.</li>
                    </ol>
                </div>

                <!-- Tab FAQ -->
                <div x-show="activeTab === 'faq'" style="display: none;" class="space-y-4 max-w-4xl">
                    <div class="space-y-3">
                        <div class="bg-gray-50 p-4 rounded-2xl">
                            <h4 class="font-bold text-gray-900">Apakah aman untuk bayi yang baru lahir (newborn 0 hari)?</h4>
                            <p class="text-xs text-gray-600 mt-1">Ya, sangat aman. Formula FTL telah diuji secara dermatologis dan dirancang dengan kadar kehangatan yang pas untuk kulit bayi baru lahir.</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-2xl">
                            <h4 class="font-bold text-gray-900">Bagaimana cara pesan dan pembayarannya?</h4>
                            <p class="text-xs text-gray-600 mt-1">Anda bisa memesan langsung melalui tombol WhatsApp. CS kami akan mengonfirmasi alamat, ongkos kirim termurah, dan nomor rekening pembayaran (BCA / Mandiri / QRIS).</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- Official Shopee & Order Banner Section -->
<section class="py-16 bg-ftl-cream border-t border-ftl-sand">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 sm:p-10 border border-ftl-sand shadow-sm text-center relative overflow-hidden">
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-orange-100 text-[#EE4D2D] text-xs font-bold uppercase tracking-wider mb-3">
                <i data-lucide="store" class="w-3.5 h-3.5"></i>
                Official Store Shopee & WhatsApp
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold font-display text-gray-900">
                Beli For The Little di Toko Resmi
            </h2>
            <p class="text-xs sm:text-sm text-gray-600 mt-2 max-w-xl mx-auto">
                Dapatkan jaminan produk 100% asli, harga promo spesial Rp 79.000 (hemat 20%), dan pengiriman cepat ke seluruh Indonesia langsung ke alamat Bunda.
            </p>

            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3 max-w-md mx-auto">
                <button type="button" 
                        @click="orderDirectWA()"
                        class="w-full sm:w-auto flex-1 flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 px-6 rounded-2xl shadow-md transition active:scale-95 text-xs sm:text-sm cursor-pointer">
                    <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-4 h-4" alt="WhatsApp">
                    <span>Pesan via WhatsApp</span>
                </button>
                <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                   class="w-full sm:w-auto flex-1 flex items-center justify-center gap-2 bg-[#EE4D2D] hover:bg-[#d73f21] text-white font-bold py-3.5 px-6 rounded-2xl shadow-md transition active:scale-95 text-xs sm:text-sm text-center">
                    <img src="<?= BASE_URL ?>assets/images/shopee-icon-white.svg" class="w-4 h-4" alt="Shopee">
                    <span>Kunjungi Toko Shopee</span>
                </a>
            </div>

            <div class="mt-6 flex flex-wrap items-center justify-center gap-4 text-xs text-gray-500">
                <span class="flex items-center gap-1"><i data-lucide="check" class="w-3.5 h-3.5 text-emerald-600"></i> BPOM & Halal Resmi</span>
                <span>•</span>
                <span class="flex items-center gap-1"><i data-lucide="check" class="w-3.5 h-3.5 text-emerald-600"></i> Kurir J&T, JNE, SiCepat</span>
                <span>•</span>
                <span class="flex items-center gap-1"><i data-lucide="check" class="w-3.5 h-3.5 text-emerald-600"></i> Packaging Bubble Wrap Tebal</span>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
