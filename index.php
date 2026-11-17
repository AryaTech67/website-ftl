<?php
$current_page = 'home';
$page_title = 'Natural Baby Calming Rub Cream dari Kekayaan Alam Nusantara';
$page_desc = 'For The Little Indonesia menghadirkan Baby Calming Rub Cream alami berbahan minyak pala nusantara dan calendula. Meredakan kolik, kembung, dan aman untuk newborn 0+.';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- ======================================================= -->
<!-- 1. FULL-WIDTH HERO SLIDER (LEBAR FULL LAYAR EDGE-TO-EDGE)-->
<!-- ======================================================= -->
<section id="beranda" class="relative w-full overflow-hidden bg-ftl-forest select-none" 
         x-data="{ 
             activeSlide: 0,
             totalSlides: 3,
             autoplayInterval: null,
             touchStartX: 0,
             touchEndX: 0,
             startAutoplay() {
                 this.stopAutoplay();
                 this.autoplayInterval = setInterval(() => {
                     this.nextSlide();
                 }, 6000); // 6 detik: tenang & nyaman dibaca, tidak buru-buru
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
             },
             handleTouchStart(e) {
                 this.touchStartX = e.changedTouches[0].clientX;
                 this.stopAutoplay();
             },
             handleTouchEnd(e) {
                 this.touchEndX = e.changedTouches[0].clientX;
                 this.handleSwipe();
             },
             handleSwipe() {
                 const diff = this.touchStartX - this.touchEndX;
                 if (Math.abs(diff) > 40) {
                     if (diff > 0) {
                         this.nextSlide();
                     } else {
                         this.prevSlide();
                     }
                 }
                 this.startAutoplay();
             }
         }" 
         x-init="startAutoplay()"
         @mouseenter="stopAutoplay()"
         @mouseleave="startAutoplay()"
         @touchstart.passive="handleTouchStart($event)"
         @touchend.passive="handleTouchEnd($event)">

    <!-- Full Bleed Container: 100% Lebar Layar -->
    <div class="relative w-full h-[480px] sm:h-[520px] lg:h-[540px] overflow-hidden bg-ftl-forest select-none">
        
        <!-- ================= SLIDE 1: Flagship FTL (Clean Typography, Lega & Elegan) ================= -->
        <div class="absolute inset-0 w-full h-full flex items-center overflow-hidden bg-cover bg-left sm:bg-center transition-opacity duration-700 ease-in-out"
             :class="activeSlide === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
             style="background-image: url('<?= BASE_URL ?>assets/images/banner-ftl-hero.jpg?v=<?= filemtime(__DIR__ . '/assets/images/banner-ftl-hero.jpg') ?>');">
            
            <!-- Dark Gradient Overlay for Maximum Text Contrast & Readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/35 pointer-events-none"></div>
            
            <div class="w-full max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <!-- Left/Center Content (8 cols) -->
                    <div class="lg:col-span-8 space-y-4 sm:space-y-5 text-left max-w-2xl">

                        <!-- Headline Bersih & Tegas (Tanpa filter drop-shadow yang memicu bug kotak hitam Safari iOS) -->
                        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white font-display tracking-tight leading-[1.15]">
                            Bayi Nyaman & Ceria<br>
                            <span class="text-[#FCD34D]">Bebas Kembung & Kolik Semalaman!</span>
                        </h1>

                        <!-- Subtitle Singkat, Lega & Enak Dibaca -->
                        <p class="text-sm sm:text-base text-emerald-100/90 leading-relaxed font-normal max-w-xl">
                            Krim telon alami dengan kehangatan <strong>Minyak Pala Nusantara & Calendula</strong>. Cepat meresap, 0% rasa lengket, dan lembut untuk newborn 0+ bulan.
                        </p>

                        <!-- Micro Trust Highlights (Rapi & Minimalis) -->
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs sm:text-sm text-emerald-200 font-semibold pt-1">
                            <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> 100% Pala Nusantara</span>
                            <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> 0% Rasa Lengket</span>
                            <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> BPOM & Halal Resmi</span>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="pt-2 flex flex-wrap items-center gap-3">
                            <button type="button" 
                                    @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'"
                                    class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-bold px-6 sm:px-8 py-3 sm:py-3.5 rounded-full shadow-lg shadow-emerald-950/40 hover:scale-105 active:scale-95 transition text-xs sm:text-sm">
                                <i data-lucide="message-circle" class="w-4 h-4"></i>
                                <span>Pesan via WhatsApp (Hitung Ongkir)</span>
                            </button>
                            <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2 bg-[#EE4D2D] hover:bg-[#d73f21] text-white font-bold px-5 sm:px-7 py-3 sm:py-3.5 rounded-full shadow-lg hover:scale-105 active:scale-95 transition text-xs sm:text-sm">
                                <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                                <span>Shopee Official</span>
                            </a>
                        </div>

                    </div>

                    <!-- Right Product Mockup Visual (4 cols) -->
                    <div class="lg:col-span-4 hidden lg:flex flex-col justify-center items-center relative">
                        <div class="w-64 h-64 rounded-full bg-emerald-400/20 absolute -z-10 blur-2xl"></div>
                        <img src="<?= BASE_URL ?>assets/images/product-tube.png" 
                             alt="FTL Calming Rub Tube" 
                             class="h-72 lg:h-84 w-auto object-contain hover:scale-105 transition-transform duration-500">
                        <div class="mt-2 inline-flex items-center gap-1 text-[11px] font-bold text-white bg-black/40 backdrop-blur-xs px-3 py-1 rounded-full border border-white/20">
                            <span>Isi Bersih 50g</span> • <span>Travel Friendly</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- ================= SLIDE 2: Rempah Pala Nusantara (Clean Typography) ================= -->
        <div class="absolute inset-0 w-full h-full flex items-center overflow-hidden bg-cover bg-center sm:bg-center transition-opacity duration-700 ease-in-out"
             :class="activeSlide === 1 ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
             style="background-image: url('<?= BASE_URL ?>assets/images/banner-ftl-slide2.jpg?v=<?= filemtime(__DIR__ . '/assets/images/banner-ftl-slide2.jpg') ?>');">
            
            <!-- Dark Gradient Overlay for Maximum Text Contrast & Readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/35 pointer-events-none"></div>

            <div class="w-full max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <!-- Left/Center Content (8 cols) -->
                    <div class="lg:col-span-8 space-y-4 sm:space-y-5 text-left max-w-2xl">

                        <!-- Headline Bersih & Tegas -->
                        <h2 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white font-display tracking-tight leading-[1.15]">
                            Khasiat Murni Rempah Alami<br>
                            <span class="text-[#FCD34D]">Hangat Lembut, Tidak Panas di Kulit!</span>
                        </h2>

                        <p class="text-sm sm:text-base text-amber-100/90 leading-relaxed font-normal max-w-xl">
                            Perpaduan minyak atsiri buah pala nusantara dan ekstrak calendula organik yang melembapkan <em>skin barrier</em> serta menenangkan si kecil saat rewel.
                        </p>

                        <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs sm:text-sm text-amber-200 font-semibold pt-1">
                            <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> Minyak Biji Pala Murni</span>
                            <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> Ekstrak Bunga Calendula</span>
                            <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> Bebas Paraben & Alkohol</span>
                        </div>

                        <div class="pt-2 flex flex-wrap items-center gap-3">
                            <a href="<?= BASE_URL ?>produk.php"
                               class="inline-flex items-center gap-2 bg-amber-400 hover:bg-amber-300 text-amber-950 font-bold px-6 sm:px-8 py-3 sm:py-3.5 rounded-full shadow-lg transition text-xs sm:text-sm">
                                <span>Pelajari Komposisi Lengkap</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                            <button type="button" 
                                    @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'"
                                    class="inline-flex items-center gap-2 bg-white/20 hover:bg-white text-white hover:text-gray-900 border border-white/40 font-bold px-5 sm:px-7 py-3 sm:py-3.5 rounded-full transition text-xs sm:text-sm">
                                <i data-lucide="message-circle" class="w-4 h-4"></i>
                                <span>Konsultasi via WA</span>
                            </button>
                        </div>

                    </div>

                    <!-- Right Ingredients Visual (4 cols) -->
                    <div class="lg:col-span-4 hidden lg:flex justify-center items-center gap-4">
                        <div class="p-3 bg-white/10 backdrop-blur-md rounded-3xl border border-white/20 shadow-2xl flex flex-col items-center">
                            <img src="<?= BASE_URL ?>assets/images/ingredient-nutmeg.svg" class="w-32 h-32 hover:scale-105 transition">
                            <span class="text-xs font-bold text-amber-200 mt-2">Minyak Pala Nusantara</span>
                        </div>
                        <div class="p-3 bg-white/10 backdrop-blur-md rounded-3xl border border-white/20 shadow-2xl flex flex-col items-center">
                            <img src="<?= BASE_URL ?>assets/images/ingredient-calendula.svg" class="w-32 h-32 hover:scale-105 transition">
                            <span class="text-xs font-bold text-amber-200 mt-2">Bunga Calendula</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- ================= SLIDE 3: #frommothertoanother (Clean Typography) ================= -->
        <div class="absolute inset-0 w-full h-full flex items-center overflow-hidden bg-cover bg-center sm:bg-center transition-opacity duration-700 ease-in-out"
             :class="activeSlide === 2 ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
             style="background-image: url('<?= BASE_URL ?>assets/images/banner-ftl-slide3.jpg?v=<?= filemtime(__DIR__ . '/assets/images/banner-ftl-slide3.jpg') ?>');">
            
            <!-- Dark Gradient Overlay for Maximum Text Contrast & Readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/35 pointer-events-none"></div>
            
            <div class="w-full max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <!-- Left/Center Content (8 cols) -->
                    <div class="lg:col-span-8 space-y-4 sm:space-y-5 text-left max-w-2xl">

                        <!-- Headline Bersih & Tegas (Tanpa drop-shadow filter yang memicu bug kotak hitam Safari iOS) -->
                        <h2 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white font-display tracking-tight leading-[1.15]">
                            Dari Hati Seorang Ibu,<br>
                            <span class="text-[#FCD34D]">Untuk Seluruh Bunda di Nusantara</span>
                        </h2>

                        <p class="text-sm sm:text-base text-rose-100/90 leading-relaxed font-normal max-w-xl">
                            Diformulasikan khusus tanpa kompromi demi kenyamanan buah hati dan ketenangan hati Bunda. Teruji klinis, halal, dan aman digunakan sejak hari pertama lahir.
                        </p>

                        <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs sm:text-sm text-rose-200 font-semibold pt-1">
                            <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> Diciptakan Ibu untuk Para Ibu</span>
                            <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> Rating 4.9/5 dari 500+ Bunda</span>
                            <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> Pengiriman Seluruh RI</span>
                        </div>

                        <div class="pt-2 flex flex-wrap items-center gap-3">
                            <a href="<?= BASE_URL ?>tentang-kami.php"
                               class="inline-flex items-center gap-2 bg-white text-ftl-forest hover:bg-emerald-50 font-bold px-6 sm:px-8 py-3 sm:py-3.5 rounded-full shadow-lg transition text-xs sm:text-sm">
                                <span>Cerita Perjalanan FTL</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                            <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2 bg-white/20 hover:bg-white text-white hover:text-ftl-forest border border-white/40 font-bold px-5 sm:px-7 py-3 sm:py-3.5 rounded-full transition text-xs sm:text-sm">
                                <i data-lucide="instagram" class="w-4 h-4"></i>
                                <span>Instagram @forthelittle.id</span>
                            </a>
                        </div>

                    </div>

                    <!-- Right Testimonial Card Visual (4 cols) -->
                    <div class="lg:col-span-4 hidden lg:flex justify-center items-center">
                        <div class="bg-white/10 backdrop-blur-md p-6 rounded-3xl border border-white/25 text-center text-white space-y-3 max-w-xs shadow-2xl">
                            <div class="text-amber-300 text-lg">★★★★★</div>
                            <p class="text-xs text-emerald-100 italic leading-relaxed">
                                "Baby Calming Rub FTL beneran ngebantu banget waktu anakku kolik di malam hari. Pijat ILU sebentar, tidurnya langsung pulas tanpa rewel."
                            </p>
                            <span class="block text-[11px] font-bold text-white pt-2 border-t border-white/20">
                                — Bunda Maya Rahayu (Jakarta)
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Slider Dots / Indicators (Interaktif & Indah di Bawah Banner) -->
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-2.5 z-20 bg-black/30 backdrop-blur-md px-4 py-2 rounded-full border border-white/15">
            <template x-for="i in totalSlides" :key="i">
                <button type="button" 
                        @click="activeSlide = i - 1; startAutoplay()"
                        :class="activeSlide === (i - 1) ? 'w-8 bg-emerald-400' : 'w-2.5 bg-white/50 hover:bg-white'"
                        class="h-2 rounded-full transition-all duration-300 focus:outline-none"
                        :aria-label="'Pindah ke Slide ' + i">
                </button>
            </template>
        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 2. TRUST BADGES / SERTIFIKASI RESMI                     -->
<!-- ======================================================= -->
<section class="bg-white py-8 border-y border-ftl-sand">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            
            <div class="flex flex-col items-center p-3 rounded-2xl hover:bg-ftl-cream/60 transition-colors group">
                <div class="w-12 h-12 rounded-full border border-emerald-900/15 bg-emerald-50/40 text-emerald-800 flex items-center justify-center mb-3 group-hover:border-emerald-600/40 group-hover:bg-emerald-50 transition-colors shadow-2xs">
                    <svg class="w-5 h-5 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                </div>
                <h4 class="font-bold text-sm text-gray-800">BPOM & Halal Certified</h4>
                <p class="text-xs text-gray-500 mt-1">Terjamin resmi, aman, & higienis</p>
            </div>

            <div class="flex flex-col items-center p-3 rounded-2xl hover:bg-ftl-cream/60 transition-colors group">
                <div class="w-12 h-12 rounded-full border border-emerald-900/15 bg-emerald-50/40 text-emerald-800 flex items-center justify-center mb-3 group-hover:border-emerald-600/40 group-hover:bg-emerald-50 transition-colors shadow-2xs">
                    <svg class="w-5 h-5 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"/>
                        <line x1="16" y1="8" x2="2" y2="22"/>
                        <line x1="17.5" y1="15" x2="9" y2="15"/>
                    </svg>
                </div>
                <h4 class="font-bold text-sm text-gray-800">Hypoallergenic Tested</h4>
                <p class="text-xs text-gray-500 mt-1">Aman untuk kulit paling sensitif</p>
            </div>

            <div class="flex flex-col items-center p-3 rounded-2xl hover:bg-ftl-cream/60 transition-colors group">
                <div class="w-12 h-12 rounded-full border border-emerald-900/15 bg-emerald-50/40 text-emerald-800 flex items-center justify-center mb-3 group-hover:border-emerald-600/40 group-hover:bg-emerald-50 transition-colors shadow-2xs">
                    <svg class="w-5 h-5 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/>
                        <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
                    </svg>
                </div>
                <h4 class="font-bold text-sm text-gray-800">100% Bahan Alami</h4>
                <p class="text-xs text-gray-500 mt-1">Tanpa alkohol, paraben & mineral oil berbahaya</p>
            </div>

            <div class="flex flex-col items-center p-3 rounded-2xl hover:bg-ftl-cream/60 transition-colors group">
                <div class="w-12 h-12 rounded-full border border-emerald-900/15 bg-emerald-50/40 text-emerald-800 flex items-center justify-center mb-3 group-hover:border-emerald-600/40 group-hover:bg-emerald-50 transition-colors shadow-2xs">
                    <svg class="w-5 h-5 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                </div>
                <h4 class="font-bold text-sm text-gray-800">Safe for Newborn</h4>
                <p class="text-xs text-gray-500 mt-1">Lembut untuk bayi usia 0+ bulan</p>
            </div>

        </div>
    </div>
</section>

<!-- ======================================================= -->
<!-- 3. PRODUK UNGGULAN RESMI (FLAGSHIP SHOWCASE)             -->
<!-- ======================================================= -->
<section id="produk" class="py-16 sm:py-24 bg-gradient-to-b from-ftl-cream to-white border-b border-ftl-sand">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-14">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-100/80 text-ftl-forest text-xs font-bold uppercase tracking-wider mb-3 border border-emerald-200/60">
                <svg class="w-3.5 h-3.5 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/>
                    <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
                </svg>
                PRODUK RESMI FOR THE LITTLE
            </span>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-display text-ftl-forest tracking-tight">
                Produk Unggulan Kami
            </h2>
            <p class="text-sm sm:text-base text-gray-600 mt-2">
                Satu sentuhan hangat alami dengan khasiat Minyak Pala Nusantara & Calendula untuk redakan kembung dan buat tidur si kecil pulas.
            </p>
        </div>

        <!-- Single Flagship Showcase Card -->
        <div class="bg-white rounded-3xl sm:rounded-[36px] border border-ftl-sand shadow-xl shadow-emerald-950/5 overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                
                <!-- Left: Product Visual Presentation (5 cols) -->
                <div class="lg:col-span-5 bg-gradient-to-br from-emerald-50/70 via-ftl-light/50 to-teal-50/40 p-8 sm:p-12 flex flex-col justify-between items-center relative border-b lg:border-b-0 lg:border-r border-ftl-sand/60">
                    <!-- Top Badges -->
                    <div class="w-full flex items-center justify-between z-10">
                        <span class="inline-flex items-center gap-1 bg-white/95 backdrop-blur-xs text-ftl-forest font-bold text-xs px-3 py-1.5 rounded-full shadow-xs border border-emerald-100">
                            ⭐ Official Flagship
                        </span>
                        <span class="inline-flex items-center gap-1 bg-emerald-600 text-white font-extrabold text-xs px-3 py-1.5 rounded-full shadow-xs">
                            Netto 50g
                        </span>
                    </div>

                    <!-- Main Product Image (Proporsi Diperbesar 20-25%) -->
                    <div class="my-6 sm:my-8 lg:my-10 relative group flex items-center justify-center">
                        <div class="absolute -inset-6 bg-emerald-200/40 rounded-full blur-3xl group-hover:bg-emerald-300/50 transition duration-500"></div>
                        <img src="<?= BASE_URL ?>assets/images/product-calming-rub.svg" 
                             alt="Baby Calming Rub Cream 50g - For The Little" 
                             class="relative w-64 sm:w-72 lg:w-80 max-w-full h-auto object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-300">
                    </div>

                    <!-- Bottom Certifications Pill -->
                    <div class="w-full grid grid-cols-3 gap-2 pt-4 border-t border-emerald-200/50 text-center">
                        <div class="bg-white/80 backdrop-blur-xs py-2 px-2 rounded-xl border border-emerald-100/60 shadow-2xs">
                            <span class="block text-[11px] font-bold text-gray-800">BPOM RI</span>
                            <span class="text-[10px] text-gray-500">Terdaftar Resmi</span>
                        </div>
                        <div class="bg-white/80 backdrop-blur-xs py-2 px-2 rounded-xl border border-emerald-100/60 shadow-2xs">
                            <span class="block text-[11px] font-bold text-emerald-800">Halal</span>
                            <span class="text-[10px] text-gray-500">Indonesia</span>
                        </div>
                        <div class="bg-white/80 backdrop-blur-xs py-2 px-2 rounded-xl border border-emerald-100/60 shadow-2xs">
                            <span class="block text-[11px] font-bold text-gray-800">0+ Bulan</span>
                            <span class="text-[10px] text-gray-500">Aman Newborn</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Product Information & Purchase CTAs (7 cols) -->
                <div class="lg:col-span-7 p-6 sm:p-10 lg:p-12 flex flex-col justify-between">
                    <div>
                        <!-- Rating & Category -->
                        <div class="flex items-center gap-2 mb-2">
                            <div class="flex text-amber-400 text-sm">★★★★★</div>
                            <span class="text-xs font-bold text-gray-800">4.9 / 5.0</span>
                            <span class="text-xs text-gray-400">• 500+ Bunda Puas di Shopee & WA</span>
                        </div>

                        <!-- Product Title -->
                        <h3 class="text-2xl sm:text-3xl font-extrabold font-display text-gray-900 tracking-tight">
                            Baby Calming Rub Cream 50g
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-500 mt-1">
                            Krim telon alami dengan minyak pala nusantara & ekstrak calendula organik.
                        </p>

                        <!-- Price Banner -->
                        <div class="mt-5 p-4 rounded-2xl bg-ftl-light/80 border border-emerald-100 flex flex-wrap items-baseline justify-between gap-3">
                            <div class="flex items-baseline gap-2.5">
                                <span class="text-xs sm:text-sm text-gray-400 line-through">Rp 99.000</span>
                                <span class="text-2xl sm:text-3xl font-extrabold text-ftl-forest">Rp 79.000</span>
                                <span class="text-xs font-bold text-amber-800 bg-amber-100 px-2.5 py-0.5 rounded-full">
                                    Hemat 20%
                                </span>
                            </div>
                            <span class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full flex items-center gap-1">
                                <i data-lucide="check" class="w-3 h-3"></i> Ready Stock
                            </span>
                        </div>

                        <!-- Keunggulan Produk Checklists -->
                        <div class="mt-6 space-y-3">
                            <h4 class="text-xs font-bold text-gray-700 uppercase tracking-wider">
                                Manfaat Utama untuk Si Kecil:
                            </h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs sm:text-sm text-gray-700">
                                <div class="flex items-start gap-2">
                                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                                    <span>Meredakan perut kembung, begah & kolik seketika</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                                    <span>Tekstur cream cepat meresap, <strong>0% rasa lengket</strong></span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                                    <span>Aroma pala alami menenangkan, tidur lebih nyenyak</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                                    <span>Hypoallergenic, ramah kulit sensitif & newborn</span>
                                </div>
                            </div>
                        </div>

                        <!-- Info Auto Ongkir Box -->
                        <div class="mt-6 p-3.5 rounded-2xl bg-emerald-50/60 border border-emerald-100 flex items-center gap-3 text-xs text-emerald-900">
                            <div class="w-8 h-8 rounded-full border border-emerald-600/30 bg-emerald-600 text-white flex items-center justify-center shrink-0">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <span class="font-bold block">Pesan Mudah dengan Hitung Ongkir Otomatis</span>
                                <span class="text-emerald-700 text-[11px]">Cukup klik pesan via WA, GPS/kota Anda akan otomatis mendeteksi tarif J&T, JNE, dan SiCepat.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Dual CTAs: WhatsApp + Shopee (Sejajar Sempurna 1 Baris) -->
                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 items-stretch">
                            <button type="button" 
                                    @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'"
                                    class="w-full h-12 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-3 sm:px-4 rounded-2xl text-xs sm:text-sm shadow-md hover:shadow-emerald-600/30 transition flex items-center justify-center gap-2 active:scale-95 group cursor-pointer whitespace-nowrap">
                                <i data-lucide="message-circle" class="w-4 h-4 shrink-0 group-hover:scale-110 transition-transform"></i>
                                <span>Pesan via WhatsApp</span>
                            </button>
                            <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                               class="w-full h-12 bg-[#EE4D2D] hover:bg-[#d73f21] text-white font-bold py-3 px-3 sm:px-4 rounded-2xl text-xs sm:text-sm shadow-md hover:shadow-orange-600/30 transition flex items-center justify-center gap-2 active:scale-95 text-center group whitespace-nowrap">
                                <i data-lucide="shopping-bag" class="w-4 h-4 shrink-0 group-hover:scale-110 transition-transform"></i>
                                <span>Beli di Shopee Resmi</span>
                            </a>
                        </div>
                        <div class="mt-3 flex items-center justify-center sm:justify-start gap-4 text-[11px] text-gray-500">
                            <span class="flex items-center gap-1"><i data-lucide="truck" class="w-3.5 h-3.5 text-emerald-600"></i> J&T • JNE • SiCepat</span>
                            <span>•</span>
                            <span class="flex items-center gap-1"><i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-600"></i> Garansi 100% Asli</span>
                            <span>•</span>
                            <a href="<?= BASE_URL ?>produk.php" class="text-ftl-forest font-semibold hover:underline flex items-center gap-0.5">
                                Detail Lengkap <i data-lucide="chevron-right" class="w-3 h-3"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 4. HERO INGREDIENTS (Pala Nusantara, Calendula & Minyak Nabati) -->
<!-- ======================================================= -->
<section class="py-20 bg-white relative">
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

            <!-- Card 3: Minyak Nabati Alami (Carrier Oils) -->
            <div class="bg-white rounded-3xl p-8 border border-ftl-sand shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">
                <div class="w-28 h-28 mb-6 p-2 rounded-2xl bg-emerald-50/60 border border-emerald-100 flex items-center justify-center">
                    <img src="<?= BASE_URL ?>assets/images/ingredient-plant-oil.svg" alt="Minyak Nabati Alami" class="w-24 h-24">
                </div>
                <div class="inline-block px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
                    Cepat Meresap & Menutrisi
                </div>
                <h3 class="text-xl font-bold font-display text-gray-900 mb-2">
                    Minyak Nabati Murni
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Kombinasi *sunflower* dan *coconut carrier oil* nabati yang mengunci kelembapan alami, cepat meresap sempurna, serta tidak menyumbat pori-pori kulit bayi.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 5. PERBANDINGAN: FTL VS TELON BIASA                     -->
<!-- ======================================================= -->
<section class="py-20 bg-ftl-cream border-t border-ftl-sand">
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

        <!-- Comparison Table Container -->
        <div class="overflow-hidden rounded-3xl border border-ftl-sand shadow-lg bg-white">
            
            <!-- Desktop Table View (Layar Tablet & Desktop) -->
            <div class="hidden sm:block">
                <div class="grid grid-cols-12 bg-ftl-forest text-white py-4 px-6 text-sm font-bold items-center">
                    <div class="col-span-4">Fitur / Karakteristik</div>
                    <div class="col-span-4 text-emerald-300 flex items-center gap-1.5">
                        <span>🍃 For The Little (Calming Rub)</span>
                    </div>
                    <div class="col-span-4 text-gray-300">Minyak Telon Biasa</div>
                </div>

                <div class="divide-y divide-gray-100 text-sm">
                    <!-- Row 1 -->
                    <div class="grid grid-cols-12 py-4 px-6 items-center hover:bg-ftl-light/40 transition-colors">
                        <div class="col-span-4 font-semibold text-gray-800">Tekstur & Daya Serap</div>
                        <div class="col-span-4 text-emerald-800 font-bold flex items-start gap-2">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                            <span>Cream lembut, cepat meresap & TIDAK LENGKET</span>
                        </div>
                        <div class="col-span-4 text-gray-500">Minyak cair, licin & menodai pakaian</div>
                    </div>
                    <!-- Row 2 -->
                    <div class="grid grid-cols-12 py-4 px-6 items-center hover:bg-ftl-light/40 transition-colors bg-gray-50/50">
                        <div class="col-span-4 font-semibold text-gray-800">Sensasi Hangat</div>
                        <div class="col-span-4 text-emerald-800 font-bold flex items-start gap-2">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                            <span>Hangat pas dari pala, tidak bikin perih</span>
                        </div>
                        <div class="col-span-4 text-gray-500">Kadang terlalu panas bagi newborn</div>
                    </div>
                    <!-- Row 3 -->
                    <div class="grid grid-cols-12 py-4 px-6 items-center hover:bg-ftl-light/40 transition-colors">
                        <div class="col-span-4 font-semibold text-gray-800">Kelembapan Kulit</div>
                        <div class="col-span-4 text-emerald-800 font-bold flex items-start gap-2">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                            <span>Melembapkan kulit dengan Calendula</span>
                        </div>
                        <div class="col-span-4 text-gray-500">Bisa membuat kulit bayi kering/mengelupas</div>
                    </div>
                    <!-- Row 4 -->
                    <div class="grid grid-cols-12 py-4 px-6 items-center hover:bg-ftl-light/40 transition-colors bg-gray-50/50">
                        <div class="col-span-4 font-semibold text-gray-800">Kepraktisan Kemasan</div>
                        <div class="col-span-4 text-emerald-800 font-bold flex items-start gap-2">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                            <span>Tube anti bocor, praktis di diaper bag</span>
                        </div>
                        <div class="col-span-4 text-gray-500">Botol rawan tumpah dan belepotan</div>
                    </div>
                </div>
            </div>

            <!-- Mobile Card Comparison View (Khusus Layar HP / Mobile Agar Lapang & Rapi) -->
            <div class="sm:hidden">
                <!-- Mobile Header -->
                <div class="bg-ftl-forest text-white py-3.5 px-4 text-center">
                    <span class="text-xs uppercase font-extrabold tracking-wider text-emerald-300">
                        Perbandingan Kualitas & Kenyamanan
                    </span>
                </div>

                <div class="p-3.5 space-y-3.5 divide-y divide-gray-100">
                    
                    <!-- Item 1 -->
                    <div class="pt-3.5 first:pt-0 space-y-2">
                        <div class="flex items-center gap-1.5 text-xs font-bold text-gray-800">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                            <span>Tekstur & Daya Serap</span>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="bg-emerald-50/80 border border-emerald-200/80 p-3 rounded-2xl">
                                <span class="text-[10px] font-bold text-emerald-800 uppercase tracking-wider block mb-1">🍃 For The Little</span>
                                <p class="text-xs text-emerald-950 font-bold leading-snug">Cream lembut, cepat meresap & TIDAK LENGKET</p>
                            </div>
                            <div class="bg-gray-50 border border-gray-200/60 p-3 rounded-2xl">
                                <span class="text-[10px] font-medium text-gray-400 uppercase tracking-wider block mb-1">Minyak Telon</span>
                                <p class="text-xs text-gray-600 leading-snug">Minyak cair, licin & menodai pakaian</p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="pt-3.5 space-y-2">
                        <div class="flex items-center gap-1.5 text-xs font-bold text-gray-800">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                            <span>Sensasi Hangat</span>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="bg-emerald-50/80 border border-emerald-200/80 p-3 rounded-2xl">
                                <span class="text-[10px] font-bold text-emerald-800 uppercase tracking-wider block mb-1">🍃 For The Little</span>
                                <p class="text-xs text-emerald-950 font-bold leading-snug">Hangat pas dari pala, tidak bikin perih</p>
                            </div>
                            <div class="bg-gray-50 border border-gray-200/60 p-3 rounded-2xl">
                                <span class="text-[10px] font-medium text-gray-400 uppercase tracking-wider block mb-1">Minyak Telon</span>
                                <p class="text-xs text-gray-600 leading-snug">Kadang terlalu panas bagi newborn</p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="pt-3.5 space-y-2">
                        <div class="flex items-center gap-1.5 text-xs font-bold text-gray-800">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                            <span>Kelembapan Kulit</span>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="bg-emerald-50/80 border border-emerald-200/80 p-3 rounded-2xl">
                                <span class="text-[10px] font-bold text-emerald-800 uppercase tracking-wider block mb-1">🍃 For The Little</span>
                                <p class="text-xs text-emerald-950 font-bold leading-snug">Melembapkan kulit dengan Calendula</p>
                            </div>
                            <div class="bg-gray-50 border border-gray-200/60 p-3 rounded-2xl">
                                <span class="text-[10px] font-medium text-gray-400 uppercase tracking-wider block mb-1">Minyak Telon</span>
                                <p class="text-xs text-gray-600 leading-snug">Bisa membuat kulit bayi kering/mengelupas</p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="pt-3.5 space-y-2">
                        <div class="flex items-center gap-1.5 text-xs font-bold text-gray-800">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                            <span>Kepraktisan Kemasan</span>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="bg-emerald-50/80 border border-emerald-200/80 p-3 rounded-2xl">
                                <span class="text-[10px] font-bold text-emerald-800 uppercase tracking-wider block mb-1">🍃 For The Little</span>
                                <p class="text-xs text-emerald-950 font-bold leading-snug">Tube anti bocor, praktis di diaper bag</p>
                            </div>
                            <div class="bg-gray-50 border border-gray-200/60 p-3 rounded-2xl">
                                <span class="text-[10px] font-medium text-gray-400 uppercase tracking-wider block mb-1">Minyak Telon</span>
                                <p class="text-xs text-gray-600 leading-snug">Botol rawan tumpah dan belepotan</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 6. ARTIKEL EDUKASI PARENTING (MIRIP TENTANG ANAK)       -->
<!-- ======================================================= -->
<section id="artikel" class="py-20 bg-white border-t border-ftl-sand">
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
            
            <!-- Artikel 1: Cara Mengenali Gejala Kolik -->
            <article class="group rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col bg-white">
                <a href="<?= BASE_URL ?>artikel-detail.php?id=cara-atasi-kolik" class="block h-48 sm:h-52 w-full overflow-hidden bg-emerald-50 relative">
                    <img src="<?= BASE_URL ?>assets/images/article-kolik.jpg?v=<?= filemtime(__DIR__ . '/assets/images/article-kolik.jpg') ?>" 
                         alt="Cara Mengenali Gejala Kolik pada Bayi" 
                         class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-60 group-hover:opacity-30 transition-opacity"></div>
                    <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-xs text-emerald-800 text-[11px] font-bold px-3 py-1 rounded-full shadow-xs">
                        Kesehatan Bayi
                    </span>
                </a>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 group-hover:text-ftl-forest transition-colors leading-snug">
                            <a href="<?= BASE_URL ?>artikel-detail.php?id=cara-atasi-kolik">
                                Cara Mengenali Gejala Kolik pada Bayi Baru Lahir dan Solusi Penanganannya
                            </a>
                        </h3>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-2 leading-relaxed">
                            Kenali tanda-tanda saat tangisan bayi bukan sekadar lapar, melainkan kram perut akibat gas berlebih yang terperangkap.
                        </p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                        <span class="flex items-center gap-1.5 text-gray-500 font-medium">
                            <i data-lucide="calendar" class="w-3.5 h-3.5 text-emerald-600"></i>
                            14 Nov 2026
                        </span>
                        <a href="<?= BASE_URL ?>artikel-detail.php?id=cara-atasi-kolik" class="font-bold text-ftl-forest hover:underline">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Artikel 2: Panduan Lengkap Pijat ILU -->
            <article class="group rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col bg-white">
                <a href="<?= BASE_URL ?>artikel-detail.php?id=panduan-pijat-ilu" class="block h-48 sm:h-52 w-full overflow-hidden bg-amber-50 relative">
                    <img src="<?= BASE_URL ?>assets/images/article-pijat-ilu.jpg?v=<?= filemtime(__DIR__ . '/assets/images/article-pijat-ilu.jpg') ?>" 
                         alt="Panduan Lengkap Pijat ILU Bayi" 
                         class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-60 group-hover:opacity-30 transition-opacity"></div>
                    <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-xs text-amber-800 text-[11px] font-bold px-3 py-1 rounded-full shadow-xs">
                        Stimulasi & Tidur
                    </span>
                </a>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 group-hover:text-ftl-forest transition-colors leading-snug">
                            <a href="<?= BASE_URL ?>artikel-detail.php?id=panduan-pijat-ilu">
                                Panduan Lengkap Pijat ILU untuk Membantu Bayi Tidur Nyenyak
                            </a>
                        </h3>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-2 leading-relaxed">
                            Langkah demi langkah teknik pijatan perut alami untuk melancarkan pencernaan dan bonding erat Bunda dan bayi.
                        </p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                        <span class="flex items-center gap-1.5 text-gray-500 font-medium">
                            <i data-lucide="calendar" class="w-3.5 h-3.5 text-amber-600"></i>
                            10 Nov 2026
                        </span>
                        <a href="<?= BASE_URL ?>artikel-detail.php?id=panduan-pijat-ilu" class="font-bold text-ftl-forest hover:underline">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Artikel 3: Kearifan Rempah Pala Nusantara -->
            <article class="group rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col bg-white">
                <a href="<?= BASE_URL ?>artikel-detail.php?id=manfaat-minyak-pala" class="block h-48 sm:h-52 w-full overflow-hidden bg-teal-50 relative">
                    <img src="<?= BASE_URL ?>assets/images/article-minyak-pala.jpg?v=<?= filemtime(__DIR__ . '/assets/images/article-minyak-pala.jpg') ?>" 
                         alt="Khasiat Minyak Pala Nusantara untuk Bayi" 
                         class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-60 group-hover:opacity-30 transition-opacity"></div>
                    <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-xs text-teal-800 text-[11px] font-bold px-3 py-1 rounded-full shadow-xs">
                        Bahan Alami
                    </span>
                </a>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 group-hover:text-ftl-forest transition-colors leading-snug">
                            <a href="<?= BASE_URL ?>artikel-detail.php?id=manfaat-minyak-pala">
                                Mengapa Minyak Pala Nusantara Sangat Baik untuk Kehangatan Bayi?
                            </a>
                        </h3>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-2 leading-relaxed">
                            Mengupas warisan nenek moyang dan bukti ilmiah tentang keunggulan minyak pala dibanding minyak kayu putih biasa.
                        </p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                        <span class="flex items-center gap-1.5 text-gray-500 font-medium">
                            <i data-lucide="calendar" class="w-3.5 h-3.5 text-teal-600"></i>
                            05 Nov 2026
                        </span>
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
<!-- 7. TENTANG KAMI: CERITA BRAND & PILAR NILAI FOR THE LITTLE -->
<!-- ======================================================= -->
<section id="tentang" class="py-20 bg-ftl-cream border-t border-ftl-sand">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left: Brand Story & 3 Pillars (Col 6) -->
            <div class="lg:col-span-6 space-y-6">
                <div>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-100/80 text-ftl-forest text-xs font-bold uppercase tracking-wider mb-3 border border-emerald-200/60">
                        <svg class="w-3.5 h-3.5 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                        </svg>
                        #frommothertoanother • Kisah Hangat Kami
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-4xl font-extrabold font-display text-ftl-forest leading-tight mt-1">
                        Menghadirkan Kehangatan Alami Nusantara untuk Si Kecil
                    </h2>
                </div>

                <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                    Terinspirasi dari kearifan lokal para ibu di Indonesia yang telah turun-temurun merawat si kecil dengan rempah alami pilihan, <strong>For The Little</strong> hadir membawa kembali berkah alam Nusantara. Kami memadukan tradisi penuh kasih tersebut dengan formulasi modern yang lembut, teruji klinis, dan aman untuk mendampingi setiap momen tumbuh kembang buah hati tercinta.
                </p>

                <!-- 3 Brand Pillars (Editorial Numbering) -->
                <div class="space-y-3.5 pt-1">
                    <!-- Pilar 1 -->
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-white/80 border border-emerald-900/10 shadow-2xs hover:bg-white hover:border-emerald-600/30 transition-all">
                        <span class="w-8 h-8 rounded-full border border-amber-600/30 bg-amber-50/50 text-amber-800 font-display font-bold text-xs flex items-center justify-center flex-shrink-0 mt-0.5">
                            01
                        </span>
                        <div>
                            <h4 class="font-bold text-sm sm:text-base text-gray-900">Warisan Pala Nusantara</h4>
                            <p class="text-xs sm:text-sm text-gray-600 mt-0.5 leading-relaxed">
                                Mengangkat khasiat hangat alami minyak pala lokal yang menenangkan dan nyaman untuk bayi.
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 2 -->
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-white/80 border border-emerald-900/10 shadow-2xs hover:bg-white hover:border-emerald-600/30 transition-all">
                        <span class="w-8 h-8 rounded-full border border-emerald-600/30 bg-emerald-50/50 text-emerald-800 font-display font-bold text-xs flex items-center justify-center flex-shrink-0 mt-0.5">
                            02
                        </span>
                        <div>
                            <h4 class="font-bold text-sm sm:text-base text-gray-900">Formulasi Lembut & Teruji</h4>
                            <p class="text-xs sm:text-sm text-gray-600 mt-0.5 leading-relaxed">
                                Bebas bahan kimia keras, teruji hypoallergenic, serta terdaftar resmi BPOM dan Halal.
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 3 -->
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-white/80 border border-emerald-900/10 shadow-2xs hover:bg-white hover:border-emerald-600/30 transition-all">
                        <span class="w-8 h-8 rounded-full border border-rose-600/30 bg-rose-50/50 text-rose-800 font-display font-bold text-xs flex items-center justify-center flex-shrink-0 mt-0.5">
                            03
                        </span>
                        <div>
                            <h4 class="font-bold text-sm sm:text-base text-gray-900">Dari Ibu untuk Ibu (#FromMotherToAnother)</h4>
                            <p class="text-xs sm:text-sm text-gray-600 mt-0.5 leading-relaxed">
                                Diciptakan untuk mendampingi setiap momen tumbuh kembang bayi dengan sentuhan penuh kasih.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- CTA Actions -->
                <div class="pt-2 flex flex-col sm:flex-row sm:items-center gap-3">
                    <button type="button" 
                            @click="orderModalOpen = true"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-ftl-forest hover:bg-emerald-800 text-white font-bold px-6 py-3.5 rounded-full text-sm shadow-md transition hover:scale-[1.02]">
                        <span>Pesan via WhatsApp</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                    <a href="<?= BASE_URL ?>tentang-kami.php" 
                       class="inline-flex items-center justify-center sm:justify-start gap-1.5 text-sm font-bold text-ftl-forest hover:text-emerald-800 underline underline-offset-4 px-3 py-2 sm:py-3 transition">
                        <span>Cerita Lengkap FTL →</span>
                    </a>
                </div>
            </div>

            <!-- Right: Brand Showcase & Caring Moments (Col 6) -->
            <div class="lg:col-span-6">
                <div class="bg-gradient-to-br from-ftl-light via-white to-amber-50/60 rounded-3xl sm:rounded-[32px] p-6 sm:p-8 border border-emerald-100 shadow-md shadow-emerald-950/5 relative">
                    
                    <!-- Quote Banner Header -->
                    <div class="flex items-center gap-3.5 pb-6 border-b border-emerald-100/70">
                        <div class="w-11 h-11 rounded-full border border-emerald-700/30 bg-ftl-forest text-white flex items-center justify-center shrink-0 shadow-2xs">
                            <svg class="w-5 h-5 text-amber-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z" stroke-dasharray="2 2"/>
                                <path d="M12 7c-2.5 2-4 5-4 7 0 2.2 1.8 4 4 4s4-1.8 4-4c0-2-1.5-5-4-7z"/>
                                <path d="M12 11v4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-display font-bold text-base sm:text-lg text-ftl-forest">
                                "Bringing Back Indonesia's Nature Blessing"
                            </h3>
                            <p class="text-xs text-gray-500">
                                Setia menemani setiap momen kasih sayang Bunda untuk buah hati
                            </p>
                        </div>
                    </div>

                    <!-- 4 Momen Penuh Kasih -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 pt-6">
                        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-2xs hover:border-emerald-200 transition">
                            <div class="w-8 h-8 rounded-full border border-amber-300/70 bg-amber-50/50 flex items-center justify-center text-amber-700 mb-2.5">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="4"/>
                                    <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                                </svg>
                            </div>
                            <h5 class="font-bold text-sm text-gray-800">Setelah Mandi Pagi</h5>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Melindungi bayi dari masuk angin dan kembung saat beraktivitas ceria.</p>
                        </div>

                        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-2xs hover:border-emerald-200 transition">
                            <div class="w-8 h-8 rounded-full border border-indigo-300/70 bg-indigo-50/50 flex items-center justify-center text-indigo-700 mb-2.5">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/>
                                    <path d="M19 3v4M21 5h-4"/>
                                </svg>
                            </div>
                            <h5 class="font-bold text-sm text-gray-800">Sebelum Tidur Malam</h5>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Mencegah terbangun tengah malam karena perut begah, kolik, atau rewel.</p>
                        </div>

                        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-2xs hover:border-emerald-200 transition">
                            <div class="w-8 h-8 rounded-full border border-teal-300/70 bg-teal-50/50 flex items-center justify-center text-teal-700 mb-2.5">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"/>
                                    <path d="M11 20l-1 2M15 20l-1 2"/>
                                </svg>
                            </div>
                            <h5 class="font-bold text-sm text-gray-800">Saat Cuaca Dingin / Hujan</h5>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Menjaga kehangatan tubuh si kecil tetap stabil, nyaman, dan tenang.</p>
                        </div>

                        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-2xs hover:border-emerald-200 transition">
                            <div class="w-8 h-8 rounded-full border border-emerald-300/70 bg-emerald-50/50 flex items-center justify-center text-emerald-700 mb-2.5">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>
                                </svg>
                            </div>
                            <h5 class="font-bold text-sm text-gray-800">Saat Bepergian / Travelling</h5>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Kemasan tube 50g yang praktis dan anti tumpah di diaper bag Bunda.</p>
                        </div>
                    </div>

                    <!-- Bottom Cert Badge Strip -->
                    <div class="mt-6 pt-4 border-t border-emerald-100/70 flex flex-wrap sm:flex-nowrap items-center justify-between gap-2.5 text-[10px] sm:text-[11px] text-gray-500 font-medium">
                        <span class="inline-flex items-center gap-1.5 text-emerald-800 font-bold">
                            <i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-600"></i> BPOM & Halal Resmi
                        </span>
                        <span class="inline-flex items-center gap-1.5 text-emerald-800 font-bold">
                            <i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-600"></i> Hypoallergenic 0+
                        </span>
                        <span class="inline-flex items-center gap-1.5 text-emerald-800 font-bold">
                            <i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-600"></i> Minyak Pala Asli
                        </span>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- TESTIMONI PARA IBU (SLIDER MIRIP "KATA PARA AYBUN")     -->
<!-- ======================================================= -->
<section class="py-16 sm:py-20 bg-white border-t border-ftl-sand" 
         x-data="{ 
             testiIndex: 0,
             totalTesti: 3,
             touchStartX: 0,
             touchEndX: 0,
             nextTesti() { this.testiIndex = (this.testiIndex + 1) % this.totalTesti; },
             prevTesti() { this.testiIndex = (this.testiIndex - 1 + this.totalTesti) % this.totalTesti; },
             handleSwipe() {
                 if (this.touchEndX < this.touchStartX - 50) this.nextTesti();
                 if (this.touchEndX > this.touchStartX + 50) this.prevTesti();
             }
         }"
         @touchstart="touchStartX = $event.changedTouches[0].screenX"
         @touchend="touchEndX = $event.changedTouches[0].screenX; handleSwipe()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 sm:mb-12 gap-4">
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

            <!-- Prev/Next Controls with Active Indicator Dots -->
            <div class="flex items-center gap-3 self-end sm:self-auto">
                <!-- Testimonial Indicator Dots -->
                <div class="flex items-center gap-1.5 mr-1">
                    <button type="button" @click="testiIndex = 0" :class="testiIndex === 0 ? 'w-6 bg-ftl-forest' : 'w-2 bg-emerald-200 hover:bg-emerald-300'" class="h-2 rounded-full transition-all duration-300 cursor-pointer" aria-label="Testimoni 1"></button>
                    <button type="button" @click="testiIndex = 1" :class="testiIndex === 1 ? 'w-6 bg-ftl-forest' : 'w-2 bg-emerald-200 hover:bg-emerald-300'" class="h-2 rounded-full transition-all duration-300 cursor-pointer" aria-label="Testimoni 2"></button>
                    <button type="button" @click="testiIndex = 2" :class="testiIndex === 2 ? 'w-6 bg-ftl-forest' : 'w-2 bg-emerald-200 hover:bg-emerald-300'" class="h-2 rounded-full transition-all duration-300 cursor-pointer" aria-label="Testimoni 3"></button>
                </div>
                <!-- Navigation Buttons -->
                <button type="button" 
                        @click="prevTesti()" 
                        class="w-10 h-10 rounded-full border border-emerald-900/15 bg-white hover:bg-ftl-forest hover:text-white hover:border-ftl-forest text-ftl-forest flex items-center justify-center transition shadow-2xs active:scale-95 cursor-pointer" 
                        aria-label="Testimoni Sebelumnya">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                </button>
                <button type="button" 
                        @click="nextTesti()" 
                        class="w-10 h-10 rounded-full border border-emerald-900/15 bg-white hover:bg-ftl-forest hover:text-white hover:border-ftl-forest text-ftl-forest flex items-center justify-center transition shadow-2xs active:scale-95 cursor-pointer" 
                        aria-label="Testimoni Selanjutnya">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
            
            <!-- Review 1 -->
            <div @click="testiIndex = 0"
                 :class="testiIndex === 0 ? 'flex ring-2 ring-emerald-600 bg-emerald-50/20 shadow-xl shadow-emerald-950/10 scale-[1.01] md:scale-[1.03] z-10 border-emerald-300' : 'hidden md:flex opacity-70 hover:opacity-100 hover:border-emerald-200 border-ftl-sand bg-white'" 
                 class="p-6 sm:p-7 rounded-3xl border transition-all duration-300 flex-col justify-between cursor-pointer group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800">Verified Order</span>
                    </div>
                    <p class="text-sm text-gray-700 italic leading-relaxed">
                        "Anakku umur 2 bulan sering rewel jam 7-9 malam karena kolik. Setelah rutin dioles FTL Calming Rub sehabis mandi sore dan pijat ILU, perutnya ga bunyi kembung lagi dan tidurnya anteng pol sampai pagi!"
                    </p>
                </div>
                <div class="pt-6 border-t border-gray-100 flex items-center gap-3 mt-4">
                    <div class="w-11 h-11 rounded-full border border-emerald-900/15 bg-gradient-to-br from-[#EBF3ED] via-white to-amber-50/80 text-emerald-800 flex items-center justify-center shrink-0 shadow-2xs">
                        <svg class="w-6 h-6 text-emerald-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="10" cy="7" r="3.2"/>
                            <path d="M4 19c0-3.3 2.7-6 6-6 1.8 0 3.4.8 4.5 2.1"/>
                            <circle cx="16.5" cy="14" r="2"/>
                            <path d="M14.5 19c.4-1.2 1.5-2 2.8-2 1 0 1.9.5 2.4 1.3"/>
                            <path d="M8 8c.5-1.2 1.3-1.8 2.5-1.8s2 .6 2.5 1.8"/>
                        </svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-xs text-gray-900">Bunda Maya Rahayu</h5>
                        <span class="text-[11px] text-gray-500">Jakarta Selatan • Bayi 2 Bulan</span>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div @click="testiIndex = 1"
                 :class="testiIndex === 1 ? 'flex ring-2 ring-emerald-600 bg-emerald-50/20 shadow-xl shadow-emerald-950/10 scale-[1.01] md:scale-[1.03] z-10 border-emerald-300' : 'hidden md:flex opacity-70 hover:opacity-100 hover:border-emerald-200 border-ftl-sand bg-white'"
                 class="p-6 sm:p-7 rounded-3xl border transition-all duration-300 flex-col justify-between cursor-pointer group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-orange-100 text-orange-800">Instagram Review</span>
                    </div>
                    <p class="text-sm text-gray-700 italic leading-relaxed">
                        "Paling suka karena teksturnya CREAM bukan minyak! Jadi ga licin di tangan dan ga ninggalin noda kuning di baju bayi. Aromanya juga enak banget, wangi hangat alami minyak pala dan calendula bikin si kecil relaks dan pulas."
                    </p>
                </div>
                <div class="pt-6 border-t border-gray-100 flex items-center gap-3 mt-4">
                    <div class="w-11 h-11 rounded-full border border-emerald-900/15 bg-gradient-to-br from-amber-50/80 via-white to-[#EBF3ED] text-emerald-800 flex items-center justify-center shrink-0 shadow-2xs">
                        <svg class="w-6 h-6 text-emerald-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Z"/>
                            <path d="M9.5 7c.4-1.2 1.4-1.8 2.5-1.8s2.1.6 2.5 1.8"/>
                            <path d="M5.5 20c0-3.6 2.9-6.5 6.5-6.5s6.5 2.9 6.5 6.5"/>
                            <path d="M12 14c1.5 1 2.5 2.2 2.5 4"/>
                            <circle cx="12" cy="17" r="1.5" fill="currentColor"/>
                        </svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-xs text-gray-900">Bunda Dinda Nirmala</h5>
                        <span class="text-[11px] text-gray-500">Surabaya • Bayi 5 Bulan</span>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div @click="testiIndex = 2"
                 :class="testiIndex === 2 ? 'flex ring-2 ring-emerald-600 bg-emerald-50/20 shadow-xl shadow-emerald-950/10 scale-[1.01] md:scale-[1.03] z-10 border-emerald-300' : 'hidden md:flex opacity-70 hover:opacity-100 hover:border-emerald-200 border-ftl-sand bg-white'"
                 class="p-6 sm:p-7 rounded-3xl border transition-all duration-300 flex-col justify-between cursor-pointer group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-rose-100 text-rose-800">WhatsApp Order</span>
                    </div>
                    <p class="text-sm text-gray-700 italic leading-relaxed">
                        "Kulit anakku super sensitif, gampang merah kalau kena telon biasa. Tapi pakai For The Little ini beneran aman banget, hypoallergenic dan malah bikin kulitnya halus karena ada Calendula-nya."
                    </p>
                </div>
                <div class="pt-6 border-t border-gray-100 flex items-center gap-3 mt-4">
                    <div class="w-11 h-11 rounded-full border border-emerald-900/15 bg-gradient-to-br from-[#EBF3ED] via-ftl-cream to-emerald-50/70 text-emerald-800 flex items-center justify-center shrink-0 shadow-2xs">
                        <svg class="w-6 h-6 text-emerald-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="6" r="3.2"/>
                            <path d="M12 2.8a1.2 1.2 0 1 0 0-2.4 1.2 1.2 0 0 0 0 2.4Z"/>
                            <path d="M5.5 20c0-3.6 2.9-6.5 6.5-6.5 2 0 3.8.9 5 2.3"/>
                            <path d="M15 20c0-1.8 1.4-3.2 3.2-3.2.9 0 1.7.4 2.3 1"/>
                            <circle cx="18.2" cy="14.8" r="1.6"/>
                        </svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-xs text-gray-900">Bunda Citra Anggraini</h5>
                        <span class="text-[11px] text-gray-500">Bandung • Bayi 1 Bulan</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Mobile Touch Swipe Hint -->
        <p class="text-center text-[11px] text-gray-400 mt-5 md:hidden flex items-center justify-center gap-1.5">
            <svg class="w-3.5 h-3.5 text-emerald-600 animate-pulse" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"/>
            </svg>
            <span>Geser (swipe) atau gunakan tombol panah untuk membaca ulasan lainnya</span>
        </p>

    </div>
</section>

<!-- ======================================================= -->
<!-- 7. CTA PEMESANAN & KONSULTASI RESMI FOR THE LITTLE       -->
<!-- ======================================================= -->
<section id="kontak" class="py-16 bg-gradient-to-tr from-ftl-forest via-ftl-sage to-emerald-900 text-white relative overflow-hidden">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-6">
        <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-emerald-200 text-xs font-bold tracking-wider uppercase border border-emerald-400/20">
            #frommothertoanother • Perawatan Alami Si Kecil
        </span>
        <h2 class="text-3xl sm:text-5xl font-extrabold font-display leading-tight">
            Berikan Kehangatan Penuh Kasih & <br class="hidden sm:inline">
            Kenyamanan Terbaik untuk Si Kecil
        </h2>
        <p class="text-sm sm:text-base text-emerald-100 max-w-xl mx-auto">
            Konsultasikan keluhan si kecil atau pesan Baby Calming Rub Cream 50g sekarang melalui WhatsApp CS resmi kami dan Shopee Official Store.
        </p>
        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button type="button" 
                    @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'" 
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-ftl-forest hover:bg-emerald-50 font-bold px-8 py-4 rounded-full shadow-xl hover:scale-105 active:scale-95 transition-all text-base cursor-pointer">
                <i data-lucide="message-circle" class="w-5 h-5 text-emerald-600"></i>
                <span>Pesan Cepat via WhatsApp</span>
            </button>
            <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#EE4D2D] hover:bg-[#d73f21] text-white font-bold px-8 py-4 rounded-full shadow-xl hover:scale-105 active:scale-95 transition-all text-base">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path d="M19.5 7.5h-2.25a5.25 5.25 0 0 0-10.5 0H4.5A1.5 1.5 0 0 0 3 9v11.25A2.25 2.25 0 0 0 5.25 22.5h13.5A2.25 2.25 0 0 0 21 20.25V9a1.5 1.5 0 0 0-1.5-1.5zm-7.5-3.75a3.75 3.75 0 0 1 3.75 3.75h-7.5A3.75 3.75 0 0 1 12 3.75zm1.88 12.2c-.17.65-.68 1.15-1.52 1.5-1.07.45-2.28.32-3.13-.34-.23-.18-.28-.52-.1-.76.17-.23.51-.28.75-.11.58.46 1.45.54 2.19.23.47-.2.72-.45.79-.72.08-.34-.05-.62-.48-.96-.44-.35-1.37-.8-1.74-1.12-.66-.57-.91-1.22-.72-1.93.2-.75.82-1.31 1.7-1.57.94-.28 2.05-.13 2.82.37.24.16.3.49.15.73-.15.24-.48.3-.73.15-.55-.36-1.37-.46-2.03-.26-.49.15-.79.43-.88.75-.09.32.02.6.43.92.42.33 1.34.78 1.76 1.12.63.53.86 1.17.67 1.83z"/>
                </svg>
                <span>Beli di Shopee Resmi</span>
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
