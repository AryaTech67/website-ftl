<?php
$current_page = 'home';
$page_title = 'Natural Baby Calming Rub Cream dari Kekayaan Alam Nusantara';
$page_desc = 'For The Little Indonesia menghadirkan Baby Calming Rub Cream alami berbahan minyak pala nusantara dan calendula. Meredakan kolik, kembung, dan aman untuk newborn 0+.';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- ======================================================= -->
<!-- 1. HERO SLIDER / CAROUSEL BANNER (MIRIP TENTANG ANAK)   -->
<!-- ======================================================= -->
<section class="relative bg-ftl-cream overflow-hidden py-4 sm:py-6" 
         x-data="{ 
             activeSlide: 0,
             totalSlides: 4,
             autoplayInterval: null,
             startAutoplay() {
                 this.autoplayInterval = setInterval(() => {
                     this.nextSlide();
                 }, 5000);
             },
             stopAutoplay() {
                 if (this.autoplayInterval) {
                     clearInterval(this.autoplayInterval);
                     this.autoplayInterval = null;
                 }
             },
             nextSlide() {
                 this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
             },
             prevSlide() {
                 this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides;
             }
         }" 
         x-init="startAutoplay()"
         @mouseenter="stopAutoplay()"
         @mouseleave="startAutoplay()">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Slider Main Viewport Container (Aspect Ratio Mirip Tentang Anak) -->
        <div class="relative w-full rounded-3xl sm:rounded-[36px] overflow-hidden shadow-xl border border-ftl-sand bg-white min-h-[460px] sm:min-h-[500px] flex items-center">
            
            <!-- ================= SLIDE 1: Flagship Calming Rub ================= -->
            <div x-show="activeSlide === 0"
                 x-transition:enter="transition transform ease-out duration-700"
                 x-transition:enter-start="opacity-0 translate-x-12 scale-98"
                 x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                 x-transition:leave="transition transform ease-in duration-500 absolute inset-0"
                 x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                 x-transition:leave-end="opacity-0 -translate-x-12 scale-98"
                 class="w-full h-full bg-gradient-to-r from-ftl-light via-ftl-cream to-amber-50/40 p-6 sm:p-12 lg:p-16 flex items-center">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center w-full">
                    <div class="lg:col-span-7 space-y-4 sm:space-y-6 text-center lg:text-left">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white text-ftl-forest text-xs font-bold border border-emerald-200 shadow-2xs">
                            <i data-lucide="sparkles" class="w-3.5 h-3.5 text-emerald-600"></i>
                            <span>No.1 Natural BabyCare from Indonesia 🍃</span>
                        </div>
                        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold font-display text-ftl-dark tracking-tight leading-[1.15]">
                            A Little Warmth, <br class="hidden sm:inline">
                            <span class="text-ftl-forest underline decoration-ftl-accent/40 decoration-wavy">
                                A Lot of Love.
                            </span>
                        </h1>
                        <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                            Krim telon alami berbahan <strong>Minyak Pala Nusantara & Calendula</strong>. Hangat lembut meredakan kolik dan kembung tanpa rasa lengket. Safe for newborn (0+ bulan).
                        </p>
                        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3">
                            <button type="button" 
                                    @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'"
                                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-7 py-3.5 rounded-full shadow-lg hover:shadow-emerald-600/30 transition text-sm">
                                <i data-lucide="message-circle" class="w-4 h-4"></i>
                                <span>Pesan via WhatsApp Resmi</span>
                            </button>
                            <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white hover:bg-orange-50 border-2 border-orange-500 text-orange-600 font-bold px-6 py-3 rounded-full transition text-sm">
                                <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                                <span>Beli di Shopee</span>
                            </a>
                        </div>
                    </div>
                    <div class="lg:col-span-5 flex justify-center relative">
                        <div class="w-56 h-56 sm:w-72 sm:h-72 rounded-full bg-emerald-200/50 absolute -z-10 blur-xl"></div>
                        <img src="<?= BASE_URL ?>assets/images/product-calming-rub.svg" alt="Baby Calming Rub Cream 50g" 
                             class="h-64 sm:h-80 w-auto object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-500">
                    </div>
                </div>

            </div>

            <!-- ================= SLIDE 2: Kekayaan Rempah Herbal ================= -->
            <div x-show="activeSlide === 1"
                 x-transition:enter="transition transform ease-out duration-700"
                 x-transition:enter-start="opacity-0 translate-x-12 scale-98"
                 x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                 x-transition:leave="transition transform ease-in duration-500 absolute inset-0"
                 x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                 x-transition:leave-end="opacity-0 -translate-x-12 scale-98"
                 style="display: none;"
                 class="w-full h-full bg-gradient-to-r from-amber-50/80 via-ftl-cream to-emerald-50/60 p-6 sm:p-12 lg:p-16 flex items-center">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center w-full">
                    <div class="lg:col-span-7 space-y-4 sm:space-y-6 text-center lg:text-left">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-100 text-amber-900 text-xs font-bold shadow-2xs">
                            <i data-lucide="leaf" class="w-3.5 h-3.5 text-amber-700"></i>
                            <span>Bringing Back Indonesia's Nature Blessing 🍃</span>
                        </div>
                        <h2 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold font-display text-ftl-dark tracking-tight leading-[1.15]">
                            Khasiat Sejati <br class="hidden sm:inline">
                            <span class="text-amber-700">Minyak Pala Nusantara.</span>
                        </h2>
                        <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                            Bukan sekadar minyak telon biasa. Perpaduan Minyak Pala, Calendula, dan Chamomile terbukti klinis meredakan perut begah dan memberikan relaksasi alami sebelum tidur.
                        </p>
                        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3">
                            <a href="<?= BASE_URL ?>produk.php" 
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-ftl-forest hover:bg-emerald-900 text-white font-bold px-7 py-3.5 rounded-full shadow-lg transition text-sm">
                                <span>Pelajari Kandungan Alami</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                    <div class="lg:col-span-5 flex justify-center items-center gap-4">
                        <div class="bg-white/90 p-4 rounded-3xl shadow-lg border border-amber-100 text-center w-36 hover:scale-105 transition">
                            <img src="<?= BASE_URL ?>assets/images/ingredient-nutmeg.svg" class="w-20 h-20 mx-auto mb-2">
                            <span class="text-xs font-bold text-gray-800">Minyak Pala</span>
                            <span class="block text-[10px] text-gray-400">Anti-Kolik</span>
                        </div>
                        <div class="bg-white/90 p-4 rounded-3xl shadow-lg border border-yellow-100 text-center w-36 hover:scale-105 transition">
                            <img src="<?= BASE_URL ?>assets/images/ingredient-calendula.svg" class="w-20 h-20 mx-auto mb-2">
                            <span class="text-xs font-bold text-gray-800">Calendula</span>
                            <span class="block text-[10px] text-gray-400">Skin Barrier</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ================= SLIDE 3: #frommothertoanother ================= -->
            <div x-show="activeSlide === 2"
                 x-transition:enter="transition transform ease-out duration-700"
                 x-transition:enter-start="opacity-0 translate-x-12 scale-98"
                 x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                 x-transition:leave="transition transform ease-in duration-500 absolute inset-0"
                 x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                 x-transition:leave-end="opacity-0 -translate-x-12 scale-98"
                 style="display: none;"
                 class="w-full h-full bg-gradient-to-r from-rose-50/70 via-ftl-cream to-emerald-50/70 p-6 sm:p-12 lg:p-16 flex items-center">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center w-full">
                    <div class="lg:col-span-7 space-y-4 sm:space-y-6 text-center lg:text-left">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-rose-100 text-rose-800 text-xs font-bold">
                            <i data-lucide="heart" class="w-3.5 h-3.5 text-rose-600"></i>
                            <span>#frommothertoanother 🤱🏻</span>
                        </div>
                        <h2 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold font-display text-gray-900 tracking-tight leading-[1.15]">
                            Dari Ibu, <br class="hidden sm:inline">
                            <span class="text-rose-600">Untuk Seluruh Bunda.</span>
                        </h2>
                        <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                            Kisah perjuangan seorang ibu mencari kenyamanan alami tanpa kompromi. Teruji Hypoallergenic, ramah kulit sensitif, dan bebas paraben atau alkohol.
                        </p>
                        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3">
                            <a href="<?= BASE_URL ?>tentang-kami.php" 
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-rose-600 hover:bg-rose-700 text-white font-bold px-7 py-3.5 rounded-full shadow-lg transition text-sm">
                                <span>Baca Kisah Lengkap FTL</span>
                                <i data-lucide="heart" class="w-4 h-4"></i>
                            </a>
                            <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener"
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 font-bold px-6 py-3 rounded-full transition text-sm">
                                <i data-lucide="instagram" class="w-4 h-4"></i>
                                <span>Instagram @forthelittle.id</span>
                            </a>
                        </div>
                    </div>
                    <div class="lg:col-span-5 flex justify-center">
                        <div class="bg-white p-6 rounded-3xl shadow-xl border border-rose-100 max-w-xs text-center space-y-3">
                            <div class="flex justify-center text-amber-400 text-lg">★★★★★</div>
                            <blockquote class="text-xs text-gray-600 italic">
                                "Tidurnya bayi jadi anteng pol sampai pagi setelah rutin dioles FTL Calming Rub dan pijat ILU. Gak lengket sama sekali!"
                            </blockquote>
                            <div class="font-bold text-xs text-gray-800 pt-2 border-t border-gray-100">
                                Bunda Maya — Jakarta
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ================= SLIDE 4: Kemitraan & Reseller ================= -->
            <div x-show="activeSlide === 3"
                 x-transition:enter="transition transform ease-out duration-700"
                 x-transition:enter-start="opacity-0 translate-x-12 scale-98"
                 x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                 x-transition:leave="transition transform ease-in duration-500 absolute inset-0"
                 x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                 x-transition:leave-end="opacity-0 -translate-x-12 scale-98"
                 style="display: none;"
                 class="w-full h-full bg-gradient-to-r from-emerald-900 via-ftl-forest to-ftl-sage text-white p-6 sm:p-12 lg:p-16 flex items-center">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center w-full">
                    <div class="lg:col-span-7 space-y-4 sm:space-y-6 text-center lg:text-left">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 text-emerald-200 text-xs font-bold border border-white/20">
                            <i data-lucide="briefcase" class="w-3.5 h-3.5"></i>
                            <span>Peluang Bisnis Berkah 💼</span>
                        </div>
                        <h2 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold font-display text-white tracking-tight leading-[1.15]">
                            Tumbuh Bersama <br class="hidden sm:inline">
                            Mitra & Reseller FTL.
                        </h2>
                        <p class="text-sm sm:text-base text-emerald-100 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                            Produk kebutuhan pokok bayi (*daily essentials*) dengan repeat order sangat tinggi. Dapatkan margin menguntungkan dan materi promosi harian gratis.
                        </p>
                        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3">
                            <a href="<?= BASE_URL ?>reseller.php" 
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-ftl-forest hover:bg-emerald-50 font-bold px-7 py-3.5 rounded-full shadow-lg transition text-sm">
                                <span>Lihat Pilihan Paket Mitra</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                    <div class="lg:col-span-5 flex justify-center">
                        <div class="bg-white/10 backdrop-blur-md p-6 rounded-3xl border border-white/20 text-center text-white space-y-3 max-w-xs">
                            <i data-lucide="trending-up" class="w-10 h-10 text-emerald-300 mx-auto"></i>
                            <h4 class="font-bold text-lg">Mulai dari 12 pcs</h4>
                            <p class="text-xs text-emerald-100">Bisa jualan dari rumah sambil mengasuh si kecil. Bimbingan grup WA resmi.</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Carousel Navigation Arrows (Prev & Next) -->
            <button type="button" 
                    @click="prevSlide()" 
                    class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/80 hover:bg-white text-ftl-dark hover:text-ftl-forest shadow-md backdrop-blur-xs flex items-center justify-center transition-all hover:scale-105 active:scale-95 z-20"
                    aria-label="Previous slide">
                <i data-lucide="chevron-left" class="w-6 h-6"></i>
            </button>
            <button type="button" 
                    @click="nextSlide()" 
                    class="absolute right-3 sm:right-5 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/80 hover:bg-white text-ftl-dark hover:text-ftl-forest shadow-md backdrop-blur-xs flex items-center justify-center transition-all hover:scale-105 active:scale-95 z-20"
                    aria-label="Next slide">
                <i data-lucide="chevron-right" class="w-6 h-6"></i>
            </button>

            <!-- Dots / Pill Indicator Container (Bottom Center) -->
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-2 z-20 bg-black/10 backdrop-blur-xs px-3 py-1.5 rounded-full">
                <template x-for="i in totalSlides" :key="i">
                    <button type="button" 
                            @click="activeSlide = i - 1"
                            :class="activeSlide === (i - 1) ? 'w-8 bg-emerald-600' : 'w-2.5 bg-gray-300 hover:bg-gray-400'"
                            class="h-2.5 rounded-full transition-all duration-300 focus:outline-none"
                            :aria-label="'Go to slide ' + i">
                    </button>
                </template>
            </div>

        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 2. EMPAT PILAR KATEGORI PRODUK (MIRIP TENTANG ANAK)     -->
<!-- ======================================================= -->
<section class="py-12 bg-ftl-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-8 space-y-1">
            <span class="text-xs font-bold text-ftl-accent uppercase tracking-widest">
                PILIHAN PRODUK
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold font-display text-ftl-forest">
                Kategori Produk Persembahan Ahlinya
            </h2>
            <p class="text-xs sm:text-sm text-gray-500">
                Formula lembut teruji klinis untuk setiap momen tumbuh kembang si kecil.
            </p>
        </div>

        <!-- 4 Kolom Pilar Kartu -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Pilar 1: Calming Rub Cream 50g -->
            <div class="bg-white rounded-3xl p-6 border border-ftl-sand shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                <div class="text-center space-y-3">
                    <div class="w-24 h-24 mx-auto rounded-2xl bg-emerald-50 flex items-center justify-center p-2 group-hover:scale-105 transition">
                        <img src="<?= BASE_URL ?>assets/images/product-calming-rub.svg" class="h-20 w-auto object-contain">
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-emerald-600 uppercase tracking-wider block">Best Seller ⭐</span>
                        <h3 class="font-display font-bold text-lg text-gray-900 mt-1">Calming Rub (50g)</h3>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-2">Krim telon alami dengan minyak pala nusantara untuk meredakan kolik.</p>
                    </div>
                    <div class="text-lg font-extrabold text-ftl-forest">
                        Rp 79.000
                    </div>
                </div>
                <div class="pt-4 border-t border-gray-100 mt-4">
                    <button type="button" 
                            @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'"
                            class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-4 rounded-full text-xs shadow-xs transition flex items-center justify-center gap-1.5">
                        <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                        <span>Beli Sekarang</span>
                    </button>
                </div>
            </div>

            <!-- Pilar 2: Bundle Double Care (Hemat 24%) -->
            <div class="bg-white rounded-3xl p-6 border border-ftl-sand shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                <div class="text-center space-y-3">
                    <div class="w-24 h-24 mx-auto rounded-2xl bg-amber-50 flex items-center justify-center p-2 group-hover:scale-105 transition">
                        <img src="<?= BASE_URL ?>assets/images/product-bundle-2.svg" class="h-20 w-auto object-contain">
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-amber-600 uppercase tracking-wider block">Hemat 24% 🔥</span>
                        <h3 class="font-display font-bold text-lg text-gray-900 mt-1">Bundle Double Care</h3>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-2">Paket 2 pcs 50g untuk persediaan di rumah dan di tas bepergian.</p>
                    </div>
                    <div class="text-lg font-extrabold text-ftl-forest">
                        Rp 145.000 <span class="text-xs text-gray-400 font-normal line-through">Rp 190.000</span>
                    </div>
                </div>
                <div class="pt-4 border-t border-gray-100 mt-4">
                    <button type="button" 
                            @click="orderModalOpen = true; selectedProduct = 'bundling-double-care'"
                            class="w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-2.5 px-4 rounded-full text-xs shadow-xs transition flex items-center justify-center gap-1.5">
                        <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                        <span>Pilih Paket</span>
                    </button>
                </div>
            </div>

            <!-- Pilar 3: Newborn Gift Box -->
            <div class="bg-white rounded-3xl p-6 border border-ftl-sand shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                <div class="text-center space-y-3">
                    <div class="w-24 h-24 mx-auto rounded-2xl bg-teal-50 flex items-center justify-center p-2 group-hover:scale-105 transition">
                        <img src="<?= BASE_URL ?>assets/images/product-gift-box.svg" class="h-20 w-auto object-contain">
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-teal-600 uppercase tracking-wider block">Special Gift 🎁</span>
                        <h3 class="font-display font-bold text-lg text-gray-900 mt-1">Newborn Gift Box</h3>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-2">Kado istimewa kelahiran dengan box elegan & kartu ucapan selamat.</p>
                    </div>
                    <div class="text-lg font-extrabold text-ftl-forest">
                        Rp 189.000
                    </div>
                </div>
                <div class="pt-4 border-t border-gray-100 mt-4">
                    <button type="button" 
                            @click="orderModalOpen = true; selectedProduct = 'bundling-newborn-gift'"
                            class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-2.5 px-4 rounded-full text-xs shadow-xs transition flex items-center justify-center gap-1.5">
                        <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                        <span>Kirim Hadiah</span>
                    </button>
                </div>
            </div>

            <!-- Pilar 4: Kemitraan & Reseller -->
            <div class="bg-white rounded-3xl p-6 border border-ftl-sand shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                <div class="text-center space-y-3">
                    <div class="w-24 h-24 mx-auto rounded-2xl bg-rose-50 flex items-center justify-center p-2 group-hover:scale-105 transition">
                        <i data-lucide="users" class="w-12 h-12 text-rose-600"></i>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-rose-600 uppercase tracking-wider block">Komunitas 💼</span>
                        <h3 class="font-display font-bold text-lg text-gray-900 mt-1">Mitra & Reseller</h3>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-2">Mulai usaha dari rumah dengan produk repeat order harian tinggi.</p>
                    </div>
                    <div class="text-sm font-bold text-rose-600">
                        Mulai 12 pcs
                    </div>
                </div>
                <div class="pt-4 border-t border-gray-100 mt-4">
                    <a href="<?= BASE_URL ?>reseller.php"
                       class="w-full bg-rose-600 hover:bg-rose-700 text-white font-bold py-2.5 px-4 rounded-full text-xs shadow-xs transition flex items-center justify-center gap-1.5">
                        <i data-lucide="briefcase" class="w-3.5 h-3.5"></i>
                        <span>Gabung Mitra</span>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 3. TRUST BADGES / SERTIFIKASI RESMI                     -->
<!-- ======================================================= -->
<section class="bg-white py-8 border-y border-ftl-sand">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            
            <div class="flex flex-col items-center p-3 rounded-2xl hover:bg-ftl-cream transition-colors">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center mb-3">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
                <h4 class="font-bold text-sm text-gray-800">BPOM & Halal Certified</h4>
                <p class="text-xs text-gray-500 mt-1">Terjamin resmi, aman, & higienis</p>
            </div>

            <div class="flex flex-col items-center p-3 rounded-2xl hover:bg-ftl-cream transition-colors">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center mb-3">
                    <i data-lucide="feather" class="w-6 h-6"></i>
                </div>
                <h4 class="font-bold text-sm text-gray-800">Hypoallergenic Tested</h4>
                <p class="text-xs text-gray-500 mt-1">Aman untuk kulit paling sensitif</p>
            </div>

            <div class="flex flex-col items-center p-3 rounded-2xl hover:bg-ftl-cream transition-colors">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center mb-3">
                    <i data-lucide="leaf" class="w-6 h-6"></i>
                </div>
                <h4 class="font-bold text-sm text-gray-800">100% Bahan Alami</h4>
                <p class="text-xs text-gray-500 mt-1">Tanpa alkohol, paraben & mineral oil berbahaya</p>
            </div>

            <div class="flex flex-col items-center p-3 rounded-2xl hover:bg-ftl-cream transition-colors">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center mb-3">
                    <i data-lucide="baby" class="w-6 h-6"></i>
                </div>
                <h4 class="font-bold text-sm text-gray-800">Safe for Newborn</h4>
                <p class="text-xs text-gray-500 mt-1">Lembut untuk bayi usia 0+ bulan</p>
            </div>

        </div>
    </div>
</section>

<!-- ======================================================= -->
<!-- 4. HERO INGREDIENTS (Pala, Calendula, Chamomile)        -->
<!-- ======================================================= -->
<section class="py-20 bg-ftl-cream relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
            <span class="text-xs font-bold text-ftl-accent uppercase tracking-widest">
                Kekayaan Hayati Indonesia
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold font-display text-ftl-forest">
                Keajaiban Bahan Alami Pilihan untuk Si Kecil
            </h2>
            <p class="text-sm sm:text-base text-gray-600">
                Kami percaya kearifan rempah Nusantara memiliki khasiat terbaik yang disempurnakan dengan riset modern untuk kenyamanan buah hati Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Card 1: Minyak Pala Nusantara -->
            <div class="bg-white rounded-3xl p-8 border border-ftl-sand shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">
                <div class="w-28 h-28 mb-6 p-2 rounded-2xl bg-amber-50/60 border border-amber-100 flex items-center justify-center">
                    <img src="<?= BASE_URL ?>assets/images/ingredient-nutmeg.svg" alt="Minyak Pala Nusantara" class="w-24 h-24">
                </div>
                <div class="inline-block px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold mb-3">
                    Bahan Utama Nusantara
                </div>
                <h3 class="text-xl font-bold font-display text-gray-900 mb-2">
                    Minyak Pala Nusantara
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Kandungan *myristicin* alami dalam minyak pala nusantara berkhasiat menghangatkan perut secara lembut, melancarkan sirkulasi, dan mengusir kembung serta kolik seketika.
                </p>
            </div>

            <!-- Card 2: Bunga Calendula -->
            <div class="bg-white rounded-3xl p-8 border border-ftl-sand shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">
                <div class="w-28 h-28 mb-6 p-2 rounded-2xl bg-yellow-50/60 border border-yellow-100 flex items-center justify-center">
                    <img src="<?= BASE_URL ?>assets/images/ingredient-calendula.svg" alt="Ekstrak Calendula" class="w-24 h-24">
                </div>
                <div class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 text-xs font-bold mb-3">
                    Pelindung Kulit Bayi
                </div>
                <h3 class="text-xl font-bold font-display text-gray-900 mb-2">
                    Ekstrak Calendula
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Kaya antioksidan yang melembapkan kulit bayi, menenangkan iritasi ringan, dan menjaga elastisitas serta kekuatan *skin barrier* alami si kecil.
                </p>
            </div>

            <!-- Card 3: Chamomile Alami -->
            <div class="bg-white rounded-3xl p-8 border border-ftl-sand shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">
                <div class="w-28 h-28 mb-6 p-2 rounded-2xl bg-emerald-50/60 border border-emerald-100 flex items-center justify-center">
                    <img src="<?= BASE_URL ?>assets/images/ingredient-chamomile.svg" alt="Chamomile Alami" class="w-24 h-24">
                </div>
                <div class="inline-block px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
                    Relaksasi & Tidur Nyenyak
                </div>
                <h3 class="text-xl font-bold font-display text-gray-900 mb-2">
                    Chamomile Alami
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Memberikan aroma aromaterapi lembut yang meredakan ketegangan otot bayi, menenangkan rewel di malam hari, dan membantu tidur lebih pulas.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 5. PERBANDINGAN: FTL VS TELON BIASA                     -->
<!-- ======================================================= -->
<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-xs font-bold text-emerald-700 uppercase tracking-widest">
                Mengapa Harus Beralih?
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold font-display text-gray-900 mt-2">
                For The Little vs Minyak Telon Konvensional
            </h2>
            <p class="text-sm sm:text-base text-gray-500 mt-2">
                Inovasi tekstur krim yang dirancang khusus untuk kenyamanan maksimal Bunda dan si kecil.
            </p>
        </div>

        <div class="overflow-hidden rounded-3xl border border-ftl-sand shadow-lg bg-white">
            <div class="grid grid-cols-12 bg-ftl-forest text-white py-4 px-6 text-sm font-bold">
                <div class="col-span-5 sm:col-span-4">Fitur / Karakteristik</div>
                <div class="col-span-4 sm:col-span-4 text-emerald-300">🍃 For The Little (Calming Rub)</div>
                <div class="col-span-3 sm:col-span-4 text-gray-300 text-right sm:text-left">Minyak Telon Biasa</div>
            </div>

            <div class="divide-y divide-gray-100 text-xs sm:text-sm">
                
                <div class="grid grid-cols-12 py-4 px-6 items-center hover:bg-ftl-light/50 transition-colors">
                    <div class="col-span-5 sm:col-span-4 font-semibold text-gray-800">Tekstur & Daya Serap</div>
                    <div class="col-span-4 sm:col-span-4 text-emerald-700 font-bold flex items-center gap-1.5">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>Cream lembut, cepat meresap & TIDAK LENGKET</span>
                    </div>
                    <div class="col-span-3 sm:col-span-4 text-gray-500 text-right sm:text-left">Minyak cair, licin & menodai pakaian</div>
                </div>

                <div class="grid grid-cols-12 py-4 px-6 items-center hover:bg-ftl-light/50 transition-colors bg-gray-50/50">
                    <div class="col-span-5 sm:col-span-4 font-semibold text-gray-800">Sensasi Hangat</div>
                    <div class="col-span-4 sm:col-span-4 text-emerald-700 font-bold flex items-center gap-1.5">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>Hangat pas dari pala, tidak bikin perih</span>
                    </div>
                    <div class="col-span-3 sm:col-span-4 text-gray-500 text-right sm:text-left">Kadang terlalu panas bagi newborn</div>
                </div>

                <div class="grid grid-cols-12 py-4 px-6 items-center hover:bg-ftl-light/50 transition-colors">
                    <div class="col-span-5 sm:col-span-4 font-semibold text-gray-800">Kelembapan Kulit</div>
                    <div class="col-span-4 sm:col-span-4 text-emerald-700 font-bold flex items-center gap-1.5">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>Melembapkan kulit dengan Calendula</span>
                    </div>
                    <div class="col-span-3 sm:col-span-4 text-gray-500 text-right sm:text-left">Bisa membuat kulit bayi kering/mengelupas</div>
                </div>

                <div class="grid grid-cols-12 py-4 px-6 items-center hover:bg-ftl-light/50 transition-colors bg-gray-50/50">
                    <div class="col-span-5 sm:col-span-4 font-semibold text-gray-800">Kepraktisan Kemasan</div>
                    <div class="col-span-4 sm:col-span-4 text-emerald-700 font-bold flex items-center gap-1.5">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                        <span>Tube anti bocor, praktis di diaper bag</span>
                    </div>
                    <div class="col-span-3 sm:col-span-4 text-gray-500 text-right sm:text-left">Botol rawan tumpah dan belepotan</div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 6. PANDUAN PIJAT ILU BAYI DENGAN FTL                    -->
<!-- ======================================================= -->
<section class="py-20 bg-ftl-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 space-y-5">
                <span class="text-xs font-bold text-ftl-accent uppercase tracking-widest">
                    Sentuhan Penuh Kasih
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold font-display text-ftl-forest">
                    Ritual Pijat Nyaman untuk Meredakan Kolik & Rewel
                </h2>
                <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                    Kombinasi kehangatan pala nusantara dan teknik pijat perut lembut membantu melancarkan gas di dalam saluran cerna bayi yang belum matang sempurna.
                </p>

                <div class="space-y-4 pt-2">
                    <div class="flex gap-4">
                        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-800 font-bold flex items-center justify-center flex-shrink-0 text-sm">1</div>
                        <div>
                            <h4 class="font-bold text-sm text-gray-800">Hangatkan di Telapak Tangan</h4>
                            <p class="text-xs text-gray-500">Ambil secukupnya cream FTL, gosok perlahan di kedua telapak tangan Bunda.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-800 font-bold flex items-center justify-center flex-shrink-0 text-sm">2</div>
                        <div>
                            <h4 class="font-bold text-sm text-gray-800">Gerakan Pijat 'ILU' (I Love You)</h4>
                            <p class="text-xs text-gray-500">Pijat perut si kecil membentuk huruf I, L terbalik, dan U terbalik searah jarum jam.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-800 font-bold flex items-center justify-center flex-shrink-0 text-sm">3</div>
                        <div>
                            <h4 class="font-bold text-sm text-gray-800">Usap Dada & Telapak Kaki</h4>
                            <p class="text-xs text-gray-500">Aroma lembut chamomile melegakan pernapasan dan membuat si kecil rileks tertidur.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="button" 
                            @click="orderModalOpen = true"
                            class="inline-flex items-center gap-2 bg-ftl-forest hover:bg-emerald-800 text-white font-bold px-6 py-3 rounded-full text-sm shadow-md transition">
                        <span>Coba FTL Calming Rub Hari Ini</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>

            <!-- Visual Demonstration Box -->
            <div class="lg:col-span-7">
                <div class="bg-gradient-to-br from-ftl-light to-amber-50/50 rounded-3xl p-8 sm:p-10 border border-emerald-100 shadow-sm relative">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-2xs">
                            <i data-lucide="sun" class="w-8 h-8 text-amber-500 mb-2"></i>
                            <h5 class="font-bold text-sm text-gray-800">Setelah Mandi Pagi</h5>
                            <p class="text-xs text-gray-500 mt-1">Melindungi bayi dari masuk angin dan kembung saat beraktivitas ceria.</p>
                        </div>
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-2xs">
                            <i data-lucide="moon" class="w-8 h-8 text-indigo-500 mb-2"></i>
                            <h5 class="font-bold text-sm text-gray-800">Sebelum Tidur Malam</h5>
                            <p class="text-xs text-gray-500 mt-1">Mencegah terbangun tengah malam karena perut begah atau kolik.</p>
                        </div>
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-2xs">
                            <i data-lucide="wind" class="w-8 h-8 text-teal-500 mb-2"></i>
                            <h5 class="font-bold text-sm text-gray-800">Saat Cuaca Dingin/Hujan</h5>
                            <p class="text-xs text-gray-500 mt-1">Menjaga kehangatan tubuh bayi agar tetap stabil dan nyaman.</p>
                        </div>
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-2xs">
                            <i data-lucide="map-pin" class="w-8 h-8 text-emerald-500 mb-2"></i>
                            <h5 class="font-bold text-sm text-gray-800">Saat Travelling</h5>
                            <p class="text-xs text-gray-500 mt-1">Tube praktis anti bocor selalu siap sedia di diaper bag Bunda.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 7. TESTIMONI PARA IBU (SLIDER MIRIP "KATA PARA AYBUN")  -->
<!-- ======================================================= -->
<section class="py-20 bg-white" 
         x-data="{ 
             testiIndex: 0,
             totalTesti: 3,
             nextTesti() { this.testiIndex = (this.testiIndex + 1) % this.totalTesti; },
             prevTesti() { this.testiIndex = (this.testiIndex - 1 + this.totalTesti) % this.totalTesti; }
         }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-xs font-bold text-ftl-accent uppercase tracking-widest">
                    #frommothertoanother
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold font-display text-ftl-forest mt-1">
                    Kata Para Moms
                </h2>
                <p class="text-sm sm:text-base text-gray-600 mt-1">
                    Cerita nyata pengalaman orang tua setelah menggunakan For The Little Calming Rub.
                </p>
            </div>

            <!-- Prev/Next Controls -->
            <div class="flex items-center gap-2">
                <button type="button" @click="prevTesti()" class="w-10 h-10 rounded-full border border-gray-200 hover:bg-ftl-light text-gray-700 flex items-center justify-center transition">
                    <i data-lucide="chevron-left" class="w-5 h-5"></i>
                </button>
                <button type="button" @click="nextTesti()" class="w-10 h-10 rounded-full border border-gray-200 hover:bg-ftl-light text-gray-700 flex items-center justify-center transition">
                    <i data-lucide="chevron-right" class="w-5 h-5"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Review 1 -->
            <div :class="testiIndex === 0 ? 'ring-2 ring-emerald-500 scale-[1.02]' : 'opacity-85'" 
                 class="bg-ftl-cream p-7 rounded-3xl border border-ftl-sand shadow-sm flex flex-col justify-between transition-all duration-300">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800">Verified Shopee</span>
                    </div>
                    <p class="text-sm text-gray-700 italic leading-relaxed">
                        "Anakku umur 2 bulan sering rewel jam 7-9 malam karena kolik. Setelah rutin dioles FTL Calming Rub sehabis mandi sore dan pijat ILU, perutnya ga bunyi kembung lagi dan tidurnya anteng pol sampai pagi!"
                    </p>
                </div>
                <div class="pt-6 border-t border-ftl-sand flex items-center gap-3 mt-4">
                    <div class="w-10 h-10 rounded-full bg-emerald-200 text-emerald-800 font-bold flex items-center justify-center text-xs">
                        MR
                    </div>
                    <div>
                        <h5 class="font-bold text-xs text-gray-900">Bunda Maya Rahayu</h5>
                        <span class="text-[11px] text-gray-500">Jakarta Selatan • Bayi 2 Bulan</span>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div :class="testiIndex === 1 ? 'ring-2 ring-emerald-500 scale-[1.02]' : 'opacity-85'"
                 class="bg-ftl-cream p-7 rounded-3xl border border-ftl-sand shadow-sm flex flex-col justify-between transition-all duration-300">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-orange-100 text-orange-800">Instagram Review</span>
                    </div>
                    <p class="text-sm text-gray-700 italic leading-relaxed">
                        "Paling suka karena teksturnya CREAM bukan minyak! Jadi ga licin di tangan dan ga ninggalin noda kuning di baju bayi. Aromanya juga enak banget, wangi pala dan chamomile bikin relaks."
                    </p>
                </div>
                <div class="pt-6 border-t border-ftl-sand flex items-center gap-3 mt-4">
                    <div class="w-10 h-10 rounded-full bg-amber-200 text-amber-800 font-bold flex items-center justify-center text-xs">
                        DN
                    </div>
                    <div>
                        <h5 class="font-bold text-xs text-gray-900">Bunda Dinda Nirmala</h5>
                        <span class="text-[11px] text-gray-500">Surabaya • Bayi 5 Bulan</span>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div :class="testiIndex === 2 ? 'ring-2 ring-emerald-500 scale-[1.02]' : 'opacity-85'"
                 class="bg-ftl-cream p-7 rounded-3xl border border-ftl-sand shadow-sm flex flex-col justify-between transition-all duration-300">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-rose-100 text-rose-800">WhatsApp Order</span>
                    </div>
                    <p class="text-sm text-gray-700 italic leading-relaxed">
                        "Kulit anakku super sensitif, gampang merah kalau kena telon biasa. Tapi pakai For The Little ini beneran aman banget, hypoallergenic dan malah bikin kulitnya halus karena ada Calendula-nya."
                    </p>
                </div>
                <div class="pt-6 border-t border-ftl-sand flex items-center gap-3 mt-4">
                    <div class="w-10 h-10 rounded-full bg-rose-200 text-rose-800 font-bold flex items-center justify-center text-xs">
                        CA
                    </div>
                    <div>
                        <h5 class="font-bold text-xs text-gray-900">Bunda Citra Anggraini</h5>
                        <span class="text-[11px] text-gray-500">Bandung • Bayi 1 Bulan</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 8. ARTIKEL EDUKASI PARENTING (MIRIP TENTANG ANAK)       -->
<!-- ======================================================= -->
<section class="py-20 bg-ftl-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-xs font-bold text-ftl-forest uppercase tracking-widest">
                    Pojok Edukasi & Tips
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold font-display text-gray-900 mt-1">
                    Panduan Parenting Bunda
                </h2>
                <p class="text-sm sm:text-base text-gray-500 mt-1">
                    Informasi terpercaya seputar kesehatan, kenyamanan, dan tumbuh kembang si kecil.
                </p>
            </div>
            
            <a href="<?= BASE_URL ?>artikel.php" class="inline-flex items-center gap-1.5 text-sm font-bold text-ftl-forest hover:text-emerald-700 transition">
                <span>Lihat Semua Artikel</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Artikel 1 -->
            <article class="group rounded-3xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col bg-white">
                <div class="h-48 bg-emerald-100 flex items-center justify-center text-emerald-800 font-display font-bold text-xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <span class="relative z-10 text-white text-center px-4">Mengatasi Kolik Bayi</span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold text-emerald-600 uppercase">Kesehatan Bayi</span>
                        <h3 class="font-bold text-lg text-gray-900 mt-1 group-hover:text-ftl-forest transition-colors">
                            <a href="<?= BASE_URL ?>artikel-detail.php?id=cara-atasi-kolik">
                                Cara Mengenali Gejala Kolik pada Bayi Baru Lahir dan Solusi Penanganannya
                            </a>
                        </h3>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-2">
                            Kenali tanda-tanda saat tangisan bayi bukan sekadar lapar, melainkan kram perut akibat gas berlebih.
                        </p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                        <span>5 Menit Baca</span>
                        <a href="<?= BASE_URL ?>artikel-detail.php?id=cara-atasi-kolik" class="font-bold text-ftl-forest hover:underline">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Artikel 2 -->
            <article class="group rounded-3xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col bg-white">
                <div class="h-48 bg-amber-100 flex items-center justify-center text-amber-800 font-display font-bold text-xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <span class="relative z-10 text-white text-center px-4">Teknik Pijat Bayi</span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold text-amber-600 uppercase">Stimulasi & Tidur</span>
                        <h3 class="font-bold text-lg text-gray-900 mt-1 group-hover:text-ftl-forest transition-colors">
                            <a href="<?= BASE_URL ?>artikel-detail.php?id=panduan-pijat-ilu">
                                Panduan Lengkap Pijat ILU untuk Membantu Bayi Tidur Nyenyak
                            </a>
                        </h3>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-2">
                            Langkah demi langkah teknik pijatan perut alami untuk melancarkan pencernaan dan bonding erat Bunda dan bayi.
                        </p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                        <span>4 Menit Baca</span>
                        <a href="<?= BASE_URL ?>artikel-detail.php?id=panduan-pijat-ilu" class="font-bold text-ftl-forest hover:underline">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Artikel 3 -->
            <article class="group rounded-3xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col bg-white">
                <div class="h-48 bg-teal-100 flex items-center justify-center text-teal-800 font-display font-bold text-xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <span class="relative z-10 text-white text-center px-4">Kearifan Rempah</span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold text-teal-600 uppercase">Bahan Alami</span>
                        <h3 class="font-bold text-lg text-gray-900 mt-1 group-hover:text-ftl-forest transition-colors">
                            <a href="<?= BASE_URL ?>artikel-detail.php?id=manfaat-minyak-pala">
                                Mengapa Minyak Pala Nusantara Sangat Baik untuk Kehangatan Bayi?
                            </a>
                        </h3>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-2">
                            Mengupas warisan nenek moyang dan bukti ilmiah tentang keunggulan minyak pala dibanding minyak kayu putih biasa.
                        </p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                        <span>6 Menit Baca</span>
                        <a href="<?= BASE_URL ?>artikel-detail.php?id=manfaat-minyak-pala" class="font-bold text-ftl-forest hover:underline">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </article>

        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 9. FINAL CALL TO ACTION                                 -->
<!-- ======================================================= -->
<section class="py-16 bg-gradient-to-tr from-ftl-forest via-ftl-sage to-emerald-900 text-white relative overflow-hidden">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-6">
        <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-emerald-200 text-xs font-bold tracking-wider uppercase border border-emerald-400/20">
            For The Little Indonesia
        </span>
        <h2 class="text-3xl sm:text-5xl font-extrabold font-display leading-tight">
            Berikan Kehangatan Penuh Kasih <br class="hidden sm:inline">
            Untuk Si Kecil Hari Ini
        </h2>
        <p class="text-sm sm:text-base text-emerald-100 max-w-xl mx-auto">
            Konsultasikan keluhan si kecil atau pesan langsung produk Baby Calming Rub Cream 50g bersama admin kami di WhatsApp.
        </p>
        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button type="button" 
                    @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'" 
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-ftl-forest hover:bg-emerald-50 font-bold px-8 py-4 rounded-full shadow-xl hover:scale-105 transition-all text-base">
                <i data-lucide="message-circle" class="w-5 h-5 text-emerald-600"></i>
                <span>Pesan Cepat via WhatsApp</span>
            </button>
            <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 border border-emerald-300/40 hover:bg-white/10 text-white font-semibold px-6 py-4 rounded-full transition-colors text-base">
                <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                <span>Beli di Shopee</span>
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
