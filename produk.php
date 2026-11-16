<?php
$current_page = 'produk';
$page_title = 'Katalog Produk & Baby Calming Rub Cream 50g';
$page_desc = 'Jelajahi produk perawatan bayi alami dari For The Little. Diformulasikan dengan Minyak Pala Nusantara, Calendula, dan Chamomile untuk redakan kolik dan kembung.';

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
    orderDirectWA() {
        const url = '<?= BASE_URL ?>' + 'index.php';
        // Trigger WA message
        let text = 'Halo Admin For The Little! 👋 Saya ingin beli ' + this.qty + ' pcs Baby Calming Rub Cream 50g (Total: ' + this.formatRp(this.qty * this.variantPrice) + '). Mohon info ongkir dan no rek ya!';
        window.open('https://wa.me/<?= WHATSAPP_NUMBER ?>?text=' + encodeURIComponent(text), '_blank');
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left: Product Image Showcase (Col 6) -->
            <div class="lg:col-span-6 space-y-4">
                <div class="bg-gradient-to-b from-ftl-light to-white rounded-3xl p-8 border border-ftl-sand flex items-center justify-center relative min-h-[420px]">
                    <span class="absolute top-4 left-4 bg-emerald-600 text-white text-xs font-bold px-3 py-1.5 rounded-full">
                        BPOM & Halal Resmi
                    </span>
                    <span class="absolute top-4 right-4 bg-amber-500 text-white text-xs font-bold px-3 py-1.5 rounded-full">
                        Safe for Newborn 0+
                    </span>
                    <img src="<?= BASE_URL ?>assets/images/product-calming-rub.svg" 
                         alt="Baby Calming Rub Cream 50g" 
                         class="max-h-96 w-auto object-contain drop-shadow-xl hover:scale-105 transition-transform duration-300">
                </div>

                <!-- Thumbnails Mini Preview -->
                <div class="grid grid-cols-3 gap-3">
                    <div class="p-2 rounded-2xl border-2 border-ftl-forest bg-ftl-light/50 flex items-center justify-center cursor-pointer">
                        <img src="<?= BASE_URL ?>assets/images/product-calming-rub.svg" class="h-16 object-contain">
                    </div>
                    <div class="p-2 rounded-2xl border border-gray-200 bg-white hover:border-ftl-forest flex items-center justify-center cursor-pointer transition">
                        <img src="<?= BASE_URL ?>assets/images/ingredient-nutmeg.svg" class="h-14 object-contain">
                    </div>
                    <div class="p-2 rounded-2xl border border-gray-200 bg-white hover:border-ftl-forest flex items-center justify-center cursor-pointer transition">
                        <img src="<?= BASE_URL ?>assets/images/ingredient-calendula.svg" class="h-14 object-contain">
                    </div>
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

                    <div class="flex items-center gap-3 mt-3">
                        <div class="flex text-amber-400 text-sm">★★★★★</div>
                        <span class="text-xs font-bold text-gray-700">4.9 / 5.0</span>
                        <span class="text-xs text-gray-400">• Terjual 2.500+ pcs</span>
                    </div>
                </div>

                <!-- Pricing Block -->
                <div class="bg-ftl-light p-4 rounded-2xl border border-emerald-100 flex items-baseline justify-between">
                    <div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-3xl font-extrabold text-ftl-forest">
                                Rp 79.000
                            </span>
                            <span class="text-sm text-gray-400 line-through">
                                Rp 95.000
                            </span>
                            <span class="text-xs font-bold bg-amber-100 text-amber-800 px-2 py-0.5 rounded-full">
                                Hemat 17%
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

                    <div>
                        <button type="button" 
                                @click="orderDirectWA()"
                                class="w-full flex items-center justify-center gap-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 px-6 rounded-2xl shadow-lg hover:shadow-emerald-600/30 active:scale-95 transition-all text-sm sm:text-base">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                            <span>Pesan via WhatsApp Sekarang</span>
                        </button>
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
                        <li><strong>Chamomilla Recutita Flower Extract:</strong> Memberikan efek aromaterapi relaksasi sebelum tidur.</li>
                        <li><strong>Sunflower & Coconut Plant Oils:</strong> Base carrier oil nabati lembut yang cepat meresap tanpa menyumbat pori-pori.</li>
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

<!-- Bundling Packages Section -->
<section class="py-16 bg-ftl-cream border-t border-ftl-sand">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <h2 class="text-2xl sm:text-3xl font-extrabold font-display text-ftl-forest">
                Paket Bundling & Hadiah Spesial
            </h2>
            <p class="text-xs sm:text-sm text-gray-600 mt-1">
                Pilihan hemat untuk stok jangka panjang dan kado menyambut kelahiran si kecil.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Bundle Double -->
            <div class="bg-white rounded-3xl p-6 border border-ftl-sand shadow-sm flex flex-col justify-between">
                <div class="flex gap-4 items-center">
                    <img src="<?= BASE_URL ?>assets/images/product-bundle-2.svg" class="w-24 h-24 object-contain">
                    <div>
                        <span class="bg-amber-100 text-amber-800 text-[10px] font-bold px-2 py-0.5 rounded-full">Hemat 24%</span>
                        <h3 class="font-display font-bold text-lg text-gray-900 mt-1">Bundle Double Care (2x 50g)</h3>
                        <p class="text-xs text-gray-500">Stok untuk rumah dan bepergian</p>
                        <div class="mt-2 text-xl font-extrabold text-ftl-forest">Rp 145.000 <span class="text-xs text-gray-400 line-through">Rp 190.000</span></div>
                    </div>
                </div>
                <button type="button" @click="orderModalOpen = true; selectedProduct = 'bundling-double-care'" class="mt-4 w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 rounded-xl text-xs flex items-center justify-center gap-2">
                    <i data-lucide="message-circle" class="w-4 h-4"></i> Pesan Bundle Double Care via WA
                </button>
            </div>

            <!-- Gift Box -->
            <div class="bg-white rounded-3xl p-6 border border-ftl-sand shadow-sm flex flex-col justify-between">
                <div class="flex gap-4 items-center">
                    <img src="<?= BASE_URL ?>assets/images/product-gift-box.svg" class="w-24 h-24 object-contain">
                    <div>
                        <span class="bg-emerald-100 text-emerald-800 text-[10px] font-bold px-2 py-0.5 rounded-full">Gift Box Exclusive</span>
                        <h3 class="font-display font-bold text-lg text-gray-900 mt-1">Newborn Comfort Gift Box</h3>
                        <p class="text-xs text-gray-500">Kado istimewa dengan greeting card</p>
                        <div class="mt-2 text-xl font-extrabold text-ftl-forest">Rp 189.000 <span class="text-xs text-gray-400 line-through">Rp 225.000</span></div>
                    </div>
                </div>
                <button type="button" @click="orderModalOpen = true; selectedProduct = 'bundling-newborn-gift'" class="mt-4 w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 rounded-xl text-xs flex items-center justify-center gap-2">
                    <i data-lucide="message-circle" class="w-4 h-4"></i> Pesan Newborn Gift Set via WA
                </button>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
