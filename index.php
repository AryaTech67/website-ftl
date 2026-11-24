<?php
$current_page = 'home';
$page_title = 'Natural Baby Calming Rub Cream dari Kekayaan Alam Nusantara';
$page_desc = 'For The Little Indonesia menghadirkan Baby Calming Rub Cream alami berbahan biji pala nusantara, calendula, coconut oil, dan avocado oil. Meredakan kolik, kembung, dermatologically tested, dan aman untuk newborn 0+.';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- ======================================================= -->
<!-- 1. FULL-WIDTH HERO SLIDER (LEBAR FULL LAYAR EDGE-TO-EDGE)-->
<!-- ======================================================= -->
<section id="beranda" class="scroll-mt-14 sm:scroll-mt-20 relative w-full overflow-hidden bg-ftl-forest select-none" 
         style="touch-action: pan-y;"
         x-data="{ 
             activeSlide: 0,
             totalSlides: 3,
             slideDuration: 5000, // 5 detik per slide (durasi ideal untuk membaca & transisi mulus)
             autoplayInterval: null,
             touchStartX: 0,
             touchStartY: 0,
             touchEndX: 0,
             startAutoplay() {
                 this.stopAutoplay();
                 this.autoplayInterval = setInterval(() => {
                     this.nextSlide();
                 }, this.slideDuration);
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
                 this.touchStartX = e.touches[0].clientX;
                 this.touchStartY = e.touches[0].clientY;
             },
             handleTouchMove(e) {
                 if (!this.touchStartX || !this.touchStartY) return;
                 const diffX = Math.abs(e.touches[0].clientX - this.touchStartX);
                 const diffY = Math.abs(e.touches[0].clientY - this.touchStartY);
                 // Bila geser horizontal pada banner, cegah browser menyeret seluruh layar secara horizontal
                 if (diffX > diffY && diffX > 8) {
                     if (e.cancelable) e.preventDefault();
                 }
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
         @touchstart.passive="handleTouchStart($event)"
         @touchmove="handleTouchMove($event)"
         @touchend.passive="handleTouchEnd($event)">

    <!-- Hero Banner Custom Styling for Authentic FTL Forest Green Luminous Gradient -->
    <style>
        .ftl-hero-overlay {
            background: linear-gradient(180deg, rgba(38, 77, 59, 0.94) 0%, rgba(38, 77, 59, 0.82) 55%, rgba(38, 77, 59, 0.40) 100%);
        }
        @media (min-width: 640px) {
            .ftl-hero-overlay {
                background: linear-gradient(90deg, rgba(38, 77, 59, 0.95) 0%, rgba(38, 77, 59, 0.85) 45%, rgba(38, 77, 59, 0.45) 78%, rgba(38, 77, 59, 0.15) 100%);
            }
        }
    </style>

    <!-- Full Bleed Container: 100% Lebar Layar (Proporsional di HP & Desktop) -->
    <div class="relative w-full h-[300px] sm:h-[440px] lg:h-[520px] overflow-hidden bg-ftl-forest select-none" style="touch-action: pan-y;">
        
        <!-- Horizontal Carousel Track (Glides Smoothly on Change) -->
        <div class="flex w-full h-full transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)]"
             :style="'transform: translate3d(-' + (activeSlide * 100) + '%, 0, 0);'"
             style="will-change: transform;">

            <!-- ================= SLIDE 1: Flagship FTL (Clean Typography, Lega & Elegan) ================= -->
            <div class="w-full h-full shrink-0 relative flex items-center overflow-hidden bg-cover bg-left sm:bg-center"
                 style="background-image: url('<?= BASE_URL ?>assets/images/banner-ftl-hero.webp?v=<?= filemtime(__DIR__ . '/assets/images/banner-ftl-hero.webp') ?>');">
                
                <!-- Luminous FTL Forest Green Gradient Overlay for Natural Brand Look & Maximum Text Contrast -->
                <div class="absolute inset-0 pointer-events-none ftl-hero-overlay"></div>
                
                <div class="w-full max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                        
                        <!-- Left/Center Content (8 cols) -->
                        <div class="lg:col-span-8 space-y-2.5 sm:space-y-5 text-left max-w-2xl">

                            <!-- Headline Bersih & Tegas -->
                            <h1 class="text-2xl sm:text-5xl lg:text-6xl font-extrabold text-white font-display tracking-tight leading-tight">
                                Bayi Nyaman & Ceria<br>
                                <span class="text-[#FCD34D]">Bebas Kembung & Kolik!</span>
                            </h1>

                            <!-- Subtitle Singkat, Lega & Enak Dibaca -->
                            <p class="text-xs sm:text-base text-white/95 leading-relaxed font-normal max-w-xl line-clamp-2 sm:line-clamp-none">
                                Krim telon alami dengan kehangatan <strong>Biji Pala Nusantara & Calendula</strong>. Cepat meresap, 0% rasa lengket, dermatologically tested, dan lembut untuk newborn 0+ bulan.
                            </p>

                            <!-- Micro Trust Highlights (Rapi & Minimalis di Layar Lebar) -->
                            <div class="hidden sm:flex flex-wrap items-center gap-x-4 gap-y-2 text-xs sm:text-sm text-emerald-200 font-semibold pt-1">
                                <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> 100% Biji Pala Nusantara</span>
                                <span class="inline-flex items-center gap-1.5"><i data-lucide="shield-check" class="w-4 h-4 text-[#FCD34D]"></i> Dermatologically Tested</span>
                                <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> 0% Rasa Lengket</span>
                                <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> BPOM & Halal Resmi</span>
                            </div>

                            <!-- CTA Buttons -->
                            <div class="pt-1 sm:pt-2 flex flex-wrap items-center gap-2 sm:gap-3">
                                <button type="button" 
                                        @click="openOrderModal('pesan', 'calming-rub-50g')"
                                        class="inline-flex items-center gap-1.5 sm:gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-bold px-4 sm:px-8 py-2.5 sm:py-3.5 rounded-full shadow-lg shadow-emerald-950/40 hover:scale-105 active:scale-95 transition text-xs sm:text-sm">
                                    <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-4 h-4" alt="WhatsApp">
                                    <span>Pesan via WA</span>
                                </button>
                                <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                                   class="inline-flex items-center gap-1.5 sm:gap-2 bg-[#EE4D2D] hover:bg-[#d73f21] text-white font-bold px-4 sm:px-7 py-2.5 sm:py-3.5 rounded-full shadow-lg hover:scale-105 active:scale-95 transition text-xs sm:text-sm">
                                    <img src="<?= BASE_URL ?>assets/images/shopee-icon-white.svg" class="w-4 h-4" alt="Shopee">
                                    <span>Shopee Official</span>
                                </a>
                            </div>

                        </div>

                        <!-- Right Product Mockup Visual (4 cols) -->
                        <div class="lg:col-span-4 hidden lg:flex flex-col justify-center items-center relative">
                            <div class="w-64 h-64 rounded-full bg-emerald-400/20 absolute -z-10 blur-2xl"></div>
                            <img src="<?= BASE_URL ?>assets/images/product-calming-rub-real.webp?v=<?= filemtime(__DIR__ . '/assets/images/product-calming-rub-real.webp') ?>" 
                                 alt="FTL Calming Rub Tube" 
                                 class="h-64 sm:h-72 lg:h-80 w-auto object-contain hover:scale-105 transition-transform duration-500 drop-shadow-2xl">
                            <div class="mt-2 inline-flex items-center gap-1 text-[11px] font-bold text-white bg-[#163325]/80 backdrop-blur-xs px-3 py-1 rounded-full border border-white/20">
                                <span>Isi Bersih 50g</span> • <span>Travel Friendly</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- ================= SLIDE 2: Rempah Pala Nusantara (Clean Typography) ================= -->
            <div class="w-full h-full shrink-0 relative flex items-center overflow-hidden bg-cover bg-center sm:bg-center"
                 style="background-image: url('<?= BASE_URL ?>assets/images/banner-ftl-slide2.webp?v=<?= filemtime(__DIR__ . '/assets/images/banner-ftl-slide2.webp') ?>');">
                
                <!-- Luminous FTL Forest Green Gradient Overlay for Natural Brand Look & Maximum Text Contrast -->
                <div class="absolute inset-0 pointer-events-none ftl-hero-overlay"></div>

                <div class="w-full max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                        
                        <!-- Left/Center Content (8 cols) -->
                        <div class="lg:col-span-8 space-y-2.5 sm:space-y-5 text-left max-w-2xl">

                            <!-- Headline Bersih & Tegas -->
                            <h2 class="text-2xl sm:text-5xl lg:text-6xl font-extrabold text-white font-display tracking-tight leading-tight">
                                Khasiat Murni Rempah Alami<br>
                                <span class="text-[#FCD34D]">Hangat Lembut, Tidak Panas!</span>
                            </h2>

                            <p class="text-xs sm:text-base text-white/95 leading-relaxed font-normal max-w-xl line-clamp-2 sm:line-clamp-none">
                                Perpaduan biji pala nusantara dan ekstrak calendula organik yang melembapkan <em>skin barrier</em> serta menenangkan si kecil saat rewel.
                            </p>

                            <div class="hidden sm:flex flex-wrap items-center gap-x-4 gap-y-2 text-xs sm:text-sm text-amber-200 font-semibold pt-1">
                                <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> Ekstrak Biji Pala Murni</span>
                                <span class="inline-flex items-center gap-1.5"><i data-lucide="shield-check" class="w-4 h-4 text-[#FCD34D]"></i> Dermatologically Tested</span>
                                <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> Ekstrak Bunga Calendula</span>
                                <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> Bebas Paraben & Alkohol</span>
                            </div>

                            <div class="pt-1 sm:pt-2 flex flex-wrap items-center gap-2 sm:gap-3">
                                <a href="<?= BASE_URL ?>produk.php"
                                   class="inline-flex items-center gap-1.5 sm:gap-2 bg-amber-400 hover:bg-amber-300 text-amber-950 font-bold px-4 sm:px-8 py-2.5 sm:py-3.5 rounded-full shadow-lg transition text-xs sm:text-sm">
                                    <span>Komposisi Lengkap</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                                <button type="button" 
                                        @click="openOrderModal('konsultasi')"
                                        class="inline-flex items-center gap-1.5 sm:gap-2 bg-white/20 hover:bg-white text-white hover:text-gray-900 border border-white/40 font-bold px-4 sm:px-7 py-2.5 sm:py-3.5 rounded-full transition text-xs sm:text-sm">
                                    <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-4 h-4" alt="WhatsApp">
                                    <span>Konsultasi WA</span>
                                </button>
                            </div>

                        </div>

                        <!-- Right Ingredients Visual (4 cols) -->
                        <div class="lg:col-span-4 hidden lg:flex justify-center items-center gap-4">
                            <div class="p-4 bg-white/15 backdrop-blur-md rounded-3xl border border-white/25 shadow-2xl flex flex-col items-center hover:scale-105 transition-all duration-300 group">
                                <div class="w-32 h-36 flex items-center justify-center">
                                    <img src="<?= BASE_URL ?>assets/images/ingredient-nutmeg-real.png" alt="Biji Pala Asli Nusantara" class="h-full w-auto object-contain drop-shadow-2xl group-hover:scale-110 transition-transform duration-300">
                                </div>
                                <span class="text-xs font-bold text-amber-200 mt-2 tracking-wide text-center">Biji Pala Nusantara</span>
                            </div>
                            <div class="p-4 bg-white/15 backdrop-blur-md rounded-3xl border border-white/25 shadow-2xl flex flex-col items-center hover:scale-105 transition-all duration-300 group">
                                <div class="w-32 h-36 flex items-center justify-center">
                                    <img src="<?= BASE_URL ?>assets/images/ingredient-calendula-real.png" alt="Ekstrak Bunga Calendula" class="w-28 h-28 object-cover rounded-full border-2 border-white/50 shadow-2xl group-hover:scale-110 transition-transform duration-300">
                                </div>
                                <span class="text-xs font-bold text-amber-200 mt-2 tracking-wide text-center">Bunga Calendula</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- ================= SLIDE 3: #frommothertoanother (Clean Typography) ================= -->
            <div class="w-full h-full shrink-0 relative flex items-center overflow-hidden bg-cover bg-center sm:bg-center"
                 style="background-image: url('<?= BASE_URL ?>assets/images/banner-ftl-slide3.webp?v=<?= filemtime(__DIR__ . '/assets/images/banner-ftl-slide3.webp') ?>');">
                
                <!-- Luminous FTL Forest Green Gradient Overlay for Natural Brand Look & Maximum Text Contrast -->
                <div class="absolute inset-0 pointer-events-none ftl-hero-overlay"></div>
                
                <div class="w-full max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                        
                        <!-- Left/Center Content (8 cols) -->
                        <div class="lg:col-span-8 space-y-2.5 sm:space-y-5 text-left max-w-2xl">

                            <!-- Headline Bersih & Tegas -->
                            <h2 class="text-2xl sm:text-5xl lg:text-6xl font-extrabold text-white font-display tracking-tight leading-tight">
                                Dari Hati Seorang Ibu,<br>
                                <span class="text-[#FCD34D]">Untuk Seluruh Bunda di Nusantara</span>
                            </h2>

                            <p class="text-xs sm:text-base text-white/95 leading-relaxed font-normal max-w-xl line-clamp-2 sm:line-clamp-none">
                                Diformulasikan khusus tanpa kompromi demi kenyamanan buah hati dan ketenangan hati Bunda. Teruji klinis, halal, dan aman digunakan sejak hari pertama lahir.
                            </p>

                            <div class="hidden sm:flex flex-wrap items-center gap-x-4 gap-y-2 text-xs sm:text-sm text-emerald-200 font-bold pt-1">
                                <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> Diciptakan Ibu untuk Para Ibu</span>
                                <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> Rating 5.0/5 di Shopee</span>
                                <span class="inline-flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-[#FCD34D]"></i> Pengiriman Seluruh RI</span>
                            </div>

                            <div class="pt-1 sm:pt-2 flex flex-wrap items-center gap-2 sm:gap-3">
                                <a href="<?= BASE_URL ?>tentang-kami.php"
                                   class="inline-flex items-center gap-1.5 sm:gap-2 bg-white text-ftl-forest hover:bg-emerald-50 font-bold px-4 sm:px-8 py-2.5 sm:py-3.5 rounded-full shadow-lg transition text-xs sm:text-sm">
                                    <span>Cerita FTL</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                                <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener"
                                   class="inline-flex items-center gap-1.5 sm:gap-2 bg-white/20 hover:bg-white text-white hover:text-ftl-forest border border-white/40 font-bold px-3.5 sm:px-6 py-2.5 sm:py-3.5 rounded-full transition text-xs sm:text-sm">
                                    <img src="<?= BASE_URL ?>assets/images/instagram-icon-white.svg" class="w-4 h-4" alt="Instagram">
                                    <span>Instagram</span>
                                </a>
                                <a href="<?= TIKTOK_URL ?>" target="_blank" rel="noopener"
                                   class="inline-flex items-center gap-1.5 sm:gap-2 bg-black/40 hover:bg-black text-white border border-white/40 font-bold px-3.5 sm:px-6 py-2.5 sm:py-3.5 rounded-full transition text-xs sm:text-sm">
                                    <img src="<?= BASE_URL ?>assets/images/tiktok-icon-official.svg" class="w-4 h-4 object-contain" alt="TikTok">
                                    <span>TikTok</span>
                                </a>
                            </div>

                        </div>

                        <!-- Right Testimonial Card Visual (4 cols) -->
                        <div class="lg:col-span-4 hidden lg:flex justify-center items-center">
                            <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener" 
                               class="block bg-white/10 hover:bg-white/15 backdrop-blur-md p-6 rounded-3xl border border-white/25 text-center text-white space-y-3 max-w-xs shadow-2xl transition-all duration-300 hover:scale-[1.02] group">
                                <div class="flex items-center justify-center gap-2">
                                    <div class="text-amber-300 text-base">★★★★★</div>
                                    <span class="inline-flex items-center gap-1.5 text-[10px] font-bold bg-[#EE4D2D] text-white px-2 py-0.5 rounded-full shadow-xs">
                                        <img src="<?= BASE_URL ?>assets/images/shopee-icon-white.svg" class="w-3 h-3" alt="Shopee">
                                        Shopee Review
                                    </span>
                                </div>
                                <p class="text-xs text-emerald-100 italic leading-relaxed">
                                    "Baby Calming Rub FTL beneran ngebantu banget waktu anakku kolik di malam hari. Pijat ILU sebentar, tidurnya langsung pulas tanpa rewel."
                                </p>
                                <div class="pt-2 border-t border-white/20 flex items-center justify-between text-[11px] text-white">
                                    <span class="font-bold">— Bunda Maya (Jakarta)</span>
                                    <span class="text-amber-200 group-hover:text-white transition flex items-center gap-0.5 text-[10px] font-semibold">
                                        Lihat di Shopee &rarr;
                                    </span>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <!-- Left Prev Slide Arrow Button (Desktop & Tablet) -->
        <button type="button" 
                @click="prevSlide(); startAutoplay()" 
                class="hidden sm:flex absolute left-4 lg:left-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-[#738a7a]/80 hover:bg-ftl-forest text-white backdrop-blur-md border border-white/20 items-center justify-center transition-all duration-200 shadow-lg hover:scale-110 active:scale-95 cursor-pointer"
                aria-label="Slide Sebelumnya">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"/>
            </svg>
        </button>

        <!-- Right Next Slide Arrow Button (Desktop & Tablet) -->
        <button type="button" 
                @click="nextSlide(); startAutoplay()" 
                class="hidden sm:flex absolute right-4 lg:right-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-[#738a7a]/80 hover:bg-ftl-forest text-white backdrop-blur-md border border-white/20 items-center justify-center transition-all duration-200 shadow-lg hover:scale-110 active:scale-95 cursor-pointer"
                aria-label="Slide Selanjutnya">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"/>
            </svg>
        </button>

        <!-- Slider Dots / Indicators (Interaktif & Indah di Bawah Banner) -->
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-2.5 z-20 bg-[#738a7a]/90 backdrop-blur-md px-4 py-2 rounded-full border border-white/20 shadow-lg">
            <template x-for="i in totalSlides" :key="i">
                <button type="button" 
                        @click="activeSlide = i - 1; startAutoplay()"
                        :class="activeSlide === (i - 1) ? 'w-8 bg-[#FCD34D]' : 'w-2.5 bg-white/40 hover:bg-white/80'"
                        class="h-2 rounded-full transition-all duration-300 focus:outline-none cursor-pointer"
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
            
            <div data-animate="fade-up" data-delay="0" class="flex flex-col items-center p-3 rounded-2xl hover:bg-ftl-cream/60 transition-colors group">
                <div class="w-14 h-14 sm:w-16 sm:h-16 mb-2.5 p-1 rounded-2xl bg-white border border-emerald-100 flex items-center justify-center group-hover:border-emerald-300 group-hover:scale-105 transition-all shadow-xs">
                    <img src="<?= BASE_URL ?>assets/images/badge-bpom-halal.svg?v=<?= @filemtime(__DIR__ . '/assets/images/badge-bpom-halal.svg') ?>" alt="BPOM & Halal Certified" class="w-full h-full object-contain">
                </div>
                <h4 class="font-bold text-sm text-gray-800">BPOM & Halal Certified</h4>
                <p class="text-xs text-gray-500 mt-1">Terjamin resmi, aman, & higienis</p>
            </div>

            <div data-animate="fade-up" data-delay="100" class="flex flex-col items-center p-3 rounded-2xl hover:bg-ftl-cream/60 transition-colors group">
                <div class="w-14 h-14 sm:w-16 sm:h-16 mb-2.5 p-1 rounded-2xl bg-white border border-emerald-100 flex items-center justify-center group-hover:border-emerald-300 group-hover:scale-105 transition-all shadow-xs">
                    <img src="<?= BASE_URL ?>assets/images/badge-hypoallergenic.svg?v=<?= @filemtime(__DIR__ . '/assets/images/badge-hypoallergenic.svg') ?>" alt="Dermatologically Tested" class="w-full h-full object-contain">
                </div>
                <h4 class="font-bold text-sm text-gray-800">Dermatologically Tested</h4>
                <p class="text-xs text-gray-500 mt-1">Teruji klinis aman untuk newborn & kulit sensitif</p>
            </div>

            <div data-animate="fade-up" data-delay="200" class="flex flex-col items-center p-3 rounded-2xl hover:bg-ftl-cream/60 transition-colors group">
                <div class="w-14 h-14 sm:w-16 sm:h-16 mb-2.5 p-1 rounded-2xl bg-white border border-emerald-100 flex items-center justify-center group-hover:border-emerald-300 group-hover:scale-105 transition-all shadow-xs">
                    <img src="<?= BASE_URL ?>assets/images/badge-natural.svg?v=<?= @filemtime(__DIR__ . '/assets/images/badge-natural.svg') ?>" alt="100% Bahan Alami" class="w-full h-full object-contain">
                </div>
                <h4 class="font-bold text-sm text-gray-800">100% Bahan Alami</h4>
                <p class="text-xs text-gray-500 mt-1">Tanpa alkohol, paraben & mineral oil berbahaya</p>
            </div>

            <div data-animate="fade-up" data-delay="300" class="flex flex-col items-center p-3 rounded-2xl hover:bg-ftl-cream/60 transition-colors group">
                <div class="w-14 h-14 sm:w-16 sm:h-16 mb-2.5 p-1 rounded-2xl bg-white border border-emerald-100 flex items-center justify-center group-hover:border-emerald-300 group-hover:scale-105 transition-all shadow-xs">
                    <img src="<?= BASE_URL ?>assets/images/badge-newborn.svg?v=<?= @filemtime(__DIR__ . '/assets/images/badge-newborn.svg') ?>" alt="Safe for Newborn" class="w-full h-full object-contain">
                </div>
                <h4 class="font-bold text-sm text-gray-800">Safe for Newborn</h4>
                <p class="text-xs text-gray-500 mt-1">Lembut untuk bayi usia 0+ bulan</p>
            </div>

        </div>
    </div>
</section>

<!-- ======================================================= -->
<!-- 3. KATALOG & KATEGORI PRODUK (TAMPILAN MODERN PERSIS TENTANG ANAK) -->
<!-- ======================================================= -->
<section id="produk" class="scroll-mt-16 sm:scroll-mt-24 py-10 sm:py-16 bg-[#FAF7F2] border-b border-ftl-sand">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section Produk Resmi FTL -->
        <div data-animate="fade-up" class="mb-5 sm:mb-8 text-left">
            <span class="text-xs sm:text-sm font-extrabold text-ftl-forest uppercase tracking-wider block font-sans">
                PRODUK RESMI FTL
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold font-display text-gray-900 mt-1">
                Pilihan Produk Alami For The Little
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1 max-w-2xl">
                Rangkaian perawatan alami ekstrak Biji Pala Nusantara & Calendula untuk kehangatan dan kenyamanan si kecil.
            </p>
        </div>

        <!-- Horizontal Swipeable Carousel di Mobile (Cards Peek on Right), 5-Cols Grid di Desktop -->
        <div class="flex md:grid md:grid-cols-3 lg:grid-cols-5 gap-3.5 sm:gap-4 overflow-x-auto snap-x snap-mandatory pb-4 sm:pb-8 -mx-4 px-4 sm:mx-0 sm:px-0 no-scrollbar">
            
            <!-- Card 1: Baby Calming Rub Cream 50g (Single) -->
            <div data-animate="fade-up" data-delay="0" class="min-w-[210px] sm:min-w-0 max-w-[240px] sm:max-w-none flex-1 shrink-0 snap-center bg-white rounded-3xl p-4 sm:p-5 border border-stone-200/80 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Top Pill Badge -->
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-full bg-rose-50 text-rose-700 border border-rose-200/70">
                            🎁 Free Gift
                        </span>
                        <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Bestseller</span>
                    </div>

                    <!-- Packshot Image -->
                    <div class="h-36 sm:h-44 flex items-center justify-center my-3 relative overflow-hidden">
                        <img src="<?= BASE_URL ?>assets/images/product-calming-rub-real.webp?v=<?= filemtime(__DIR__ . '/assets/images/product-calming-rub-real.webp') ?>" 
                             alt="Baby Calming Rub Cream 50g" 
                             class="max-h-32 sm:max-h-40 w-auto rounded-2xl object-contain group-hover:scale-105 transition-transform duration-300 drop-shadow-sm">
                    </div>

                    <!-- Info -->
                    <div>
                        <h3 class="font-display font-extrabold text-base sm:text-lg text-gray-900 group-hover:text-ftl-forest transition-colors">
                            Baby Calming Rub Cream
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Krim Telon & Calming (50g)
                        </p>
                        <div class="mt-2 flex items-baseline gap-2 flex-wrap">
                            <span class="text-base font-extrabold text-ftl-forest">Rp 117.999</span>
                            <span class="text-xs text-gray-400 line-through">Rp 299.000</span>
                            <span class="text-[10px] font-bold text-amber-800 bg-amber-100 px-1.5 py-0.5 rounded-md">Hemat 60%</span>
                        </div>
                        <p class="text-[10px] text-emerald-700 font-bold mt-1 flex items-center gap-1">
                            <i data-lucide="gift" class="w-3 h-3 text-emerald-600"></i> Free Keychain & Card
                        </p>
                    </div>
                </div>

                <!-- Beli Actions -->
                <div class="mt-3.5 flex items-center gap-2">
                    <button type="button" 
                            @click="openOrderModal('pesan', 'calming-rub-50g')"
                            class="flex-1 py-2.5 px-3 rounded-full font-bold text-xs text-white bg-emerald-600 hover:bg-emerald-700 shadow-2xs hover:shadow-md hover:scale-[1.02] active:scale-95 transition-all text-center cursor-pointer flex items-center justify-center gap-1.5">
                        <i data-lucide="shopping-bag" class="w-3.5 h-3.5"></i>
                        <span>Pesan Web</span>
                    </button>
                    <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                       class="py-2.5 px-3 rounded-full font-bold text-xs text-[#EE4D2D] bg-[#FFF0ED] hover:bg-[#EE4D2D] hover:text-white border border-[#EE4D2D]/30 transition-all text-center flex items-center justify-center gap-1"
                       title="Beli via Shopee Official">
                        <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-3.5 h-3.5" alt="Shopee">
                        <span>Shopee</span>
                    </a>
                </div>
            </div>

            <!-- Card 2: Paket 2 Tube (Bundling) -->
            <div data-animate="fade-up" data-delay="120" class="min-w-[210px] sm:min-w-0 max-w-[240px] sm:max-w-none flex-1 shrink-0 snap-center bg-white rounded-3xl p-4 sm:p-5 border border-stone-200/80 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Top Pill Badge -->
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-50 text-amber-800 border border-amber-200/70">
                            🔥 Hemat 61%
                        </span>
                        <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Paket Bunda</span>
                    </div>

                    <!-- Packshot Image -->
                    <div class="h-36 sm:h-44 flex items-center justify-center my-3 relative overflow-hidden">
                        <img src="<?= BASE_URL ?>assets/images/product-bundle-2-real.webp?v=<?= filemtime(__DIR__ . '/assets/images/product-bundle-2-real.webp') ?>" 
                             alt="Bundle Double Care (2x 50g)" 
                             class="max-h-32 sm:max-h-40 w-auto rounded-2xl object-contain group-hover:scale-105 transition-transform duration-300 drop-shadow-sm">
                    </div>

                    <!-- Info -->
                    <div>
                        <h3 class="font-display font-extrabold text-base sm:text-lg text-gray-900 group-hover:text-ftl-forest transition-colors">
                            Bundle Double Care (2x 50g)
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Paket 2 Tube Perawatan Bunda
                        </p>
                        <div class="mt-2 flex items-baseline gap-2 flex-wrap">
                            <span class="text-base font-extrabold text-ftl-forest">Rp 229.999</span>
                            <span class="text-xs text-gray-400 line-through">Rp 598.000</span>
                        </div>
                        <p class="text-[10px] text-emerald-700 font-bold mt-1 flex items-center gap-1">
                            <i data-lucide="gift" class="w-3 h-3 text-emerald-600"></i> Free Keychain & Card
                        </p>
                    </div>
                </div>

                <!-- Beli Actions -->
                <div class="mt-3.5 flex items-center gap-2">
                    <button type="button" 
                            @click="openOrderModal('pesan', 'bundling-double-care')"
                            class="flex-1 py-2.5 px-3 rounded-full font-bold text-xs text-white bg-emerald-600 hover:bg-emerald-700 shadow-2xs hover:shadow-md hover:scale-[1.02] active:scale-95 transition-all text-center cursor-pointer flex items-center justify-center gap-1.5">
                        <i data-lucide="shopping-bag" class="w-3.5 h-3.5"></i>
                        <span>Pesan Web</span>
                    </button>
                    <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                       class="py-2.5 px-3 rounded-full font-bold text-xs text-[#EE4D2D] bg-[#FFF0ED] hover:bg-[#EE4D2D] hover:text-white border border-[#EE4D2D]/30 transition-all text-center flex items-center justify-center gap-1"
                       title="Beli via Shopee Official">
                        <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-3.5 h-3.5" alt="Shopee">
                        <span>Shopee</span>
                    </a>
                </div>
            </div>

            <!-- Card 3: Bundle Triple Care 3 Tube -->
            <div data-animate="fade-up" data-delay="240" class="min-w-[210px] sm:min-w-0 max-w-[240px] sm:max-w-none flex-1 shrink-0 snap-center bg-white rounded-3xl p-4 sm:p-5 border border-stone-200/80 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Top Pill Badge -->
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200/70">
                            🌟 Super Hemat 61%
                        </span>
                        <span class="text-[10px] font-bold text-gray-400">Stok 3 Bulan</span>
                    </div>

                    <!-- Packshot Image -->
                    <div class="h-36 sm:h-44 flex items-center justify-center my-3 relative overflow-hidden">
                        <img src="<?= BASE_URL ?>assets/images/product-bundle-3-real.webp?v=<?= filemtime(__DIR__ . '/assets/images/product-bundle-3-real.webp') ?>" 
                             alt="Bundle Triple Care (3x 50g)" 
                             class="max-h-32 sm:max-h-40 w-auto rounded-2xl object-contain group-hover:scale-105 transition-transform duration-300 drop-shadow-sm">
                    </div>

                    <!-- Info -->
                    <div>
                        <h3 class="font-display font-extrabold text-base sm:text-lg text-gray-900 group-hover:text-ftl-forest transition-colors">
                            Bundle Triple Care (3x 50g)
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Paket Lengkap 3 Tube Si Kecil
                        </p>
                        <div class="mt-2 flex items-baseline gap-2 flex-wrap">
                            <span class="text-base font-extrabold text-ftl-forest">Rp 344.999</span>
                            <span class="text-xs text-gray-400 line-through">Rp 897.000</span>
                        </div>
                        <p class="text-[10px] text-emerald-700 font-bold mt-1 flex items-center gap-1">
                            <i data-lucide="gift" class="w-3 h-3 text-emerald-600"></i> Free Keychain & Card
                        </p>
                    </div>
                </div>

                <!-- Beli Actions -->
                <div class="mt-3.5 flex items-center gap-2">
                    <button type="button" 
                            @click="openOrderModal('pesan', 'bundling-newborn-gift')"
                            class="flex-1 py-2.5 px-3 rounded-full font-bold text-xs text-white bg-emerald-600 hover:bg-emerald-700 shadow-2xs hover:shadow-md hover:scale-[1.02] active:scale-95 transition-all text-center cursor-pointer flex items-center justify-center gap-1.5">
                        <i data-lucide="shopping-bag" class="w-3.5 h-3.5"></i>
                        <span>Pesan Web</span>
                    </button>
                    <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                       class="py-2.5 px-3 rounded-full font-bold text-xs text-[#EE4D2D] bg-[#FFF0ED] hover:bg-[#EE4D2D] hover:text-white border border-[#EE4D2D]/30 transition-all text-center flex items-center justify-center gap-1"
                       title="Beli via Shopee Official">
                        <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-3.5 h-3.5" alt="Shopee">
                        <span>Shopee</span>
                    </a>
                </div>
            </div>

            <!-- Card 4: Bundle Family Care (4x 50g) -->
            <div data-animate="fade-up" data-delay="360" class="min-w-[210px] sm:min-w-0 max-w-[240px] sm:max-w-none flex-1 shrink-0 snap-center bg-white rounded-3xl p-4 sm:p-5 border border-stone-200/80 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Top Pill Badge -->
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-full bg-teal-50 text-teal-800 border border-teal-200/70">
                            🔥 Hemat 62%
                        </span>
                        <span class="text-[10px] font-bold text-teal-700 bg-teal-50 px-2 py-0.5 rounded-full">Stok 4 Bulan</span>
                    </div>

                    <!-- Packshot Image -->
                    <div class="h-36 sm:h-44 flex items-center justify-center my-3 relative overflow-hidden">
                        <img src="<?= BASE_URL ?>assets/images/product-bundle-4-real.webp?v=<?= filemtime(__DIR__ . '/assets/images/product-bundle-4-real.webp') ?>" 
                             alt="Bundle Family Care (4x 50g)" 
                             class="max-h-32 sm:max-h-40 w-auto rounded-2xl object-contain group-hover:scale-105 transition-transform duration-300 drop-shadow-sm">
                    </div>

                    <!-- Info -->
                    <div>
                        <h3 class="font-display font-extrabold text-base sm:text-lg text-gray-900 group-hover:text-ftl-forest transition-colors">
                            Bundle Family Care (4x 50g)
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Paket Hemat 4 Tube Keluarga
                        </p>
                        <div class="mt-2 flex items-baseline gap-2 flex-wrap">
                            <span class="text-base font-extrabold text-ftl-forest">Rp 449.999</span>
                            <span class="text-xs text-gray-400 line-through">Rp 1.196.000</span>
                        </div>
                        <p class="text-[10px] text-emerald-700 font-bold mt-1 flex items-center gap-1">
                            <i data-lucide="gift" class="w-3 h-3 text-emerald-600"></i> Free Keychain & Card
                        </p>
                    </div>
                </div>

                <!-- Beli Actions -->
                <div class="mt-3.5 flex items-center gap-2">
                    <button type="button" 
                            @click="openOrderModal('pesan', 'bundling-quad-care')"
                            class="flex-1 py-2.5 px-3 rounded-full font-bold text-xs text-white bg-emerald-600 hover:bg-emerald-700 shadow-2xs hover:shadow-md hover:scale-[1.02] active:scale-95 transition-all text-center cursor-pointer flex items-center justify-center gap-1.5">
                        <i data-lucide="shopping-bag" class="w-3.5 h-3.5"></i>
                        <span>Pesan Web</span>
                    </button>
                    <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                       class="py-2.5 px-3 rounded-full font-bold text-xs text-[#EE4D2D] bg-[#FFF0ED] hover:bg-[#EE4D2D] hover:text-white border border-[#EE4D2D]/30 transition-all text-center flex items-center justify-center gap-1"
                       title="Beli via Shopee Official">
                        <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-3.5 h-3.5" alt="Shopee">
                        <span>Shopee</span>
                    </a>
                </div>
            </div>

            <!-- Card 5: Bundle Mega Care (5x 50g) -->
            <div data-animate="fade-up" data-delay="480" class="min-w-[210px] sm:min-w-0 max-w-[240px] sm:max-w-none flex-1 shrink-0 snap-center bg-white rounded-3xl p-4 sm:p-5 border border-stone-200/80 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Top Pill Badge -->
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-full bg-purple-50 text-purple-800 border border-purple-200/70">
                            👑 Mega Hemat 63%
                        </span>
                        <span class="text-[10px] font-bold text-purple-700 bg-purple-50 px-2 py-0.5 rounded-full">Paling Hemat</span>
                    </div>

                    <!-- Packshot Image -->
                    <div class="h-36 sm:h-44 flex items-center justify-center my-3 relative overflow-hidden">
                        <img src="<?= BASE_URL ?>assets/images/product-bundle-5-real.webp?v=<?= filemtime(__DIR__ . '/assets/images/product-bundle-5-real.webp') ?>" 
                             alt="Bundle Mega Care (5x 50g)" 
                             class="max-h-32 sm:max-h-40 w-auto rounded-2xl object-contain group-hover:scale-105 transition-transform duration-300 drop-shadow-sm">
                    </div>

                    <!-- Info -->
                    <div>
                        <h3 class="font-display font-extrabold text-base sm:text-lg text-gray-900 group-hover:text-ftl-forest transition-colors">
                            Bundle Mega Care (5x 50g)
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Paket Super Hemat 5 Tube
                        </p>
                        <div class="mt-2 flex items-baseline gap-2 flex-wrap">
                            <span class="text-base font-extrabold text-ftl-forest">Rp 549.999</span>
                            <span class="text-xs text-gray-400 line-through">Rp 1.495.000</span>
                        </div>
                        <p class="text-[10px] text-emerald-700 font-bold mt-1 flex items-center gap-1">
                            <i data-lucide="gift" class="w-3 h-3 text-emerald-600"></i> Free Keychain & Card
                        </p>
                    </div>
                </div>

                <!-- Beli Actions -->
                <div class="mt-3.5 flex items-center gap-2">
                    <button type="button" 
                            @click="openOrderModal('pesan', 'bundling-mega-care')"
                            class="flex-1 py-2.5 px-3 rounded-full font-bold text-xs text-white bg-emerald-600 hover:bg-emerald-700 shadow-2xs hover:shadow-md hover:scale-[1.02] active:scale-95 transition-all text-center cursor-pointer flex items-center justify-center gap-1.5">
                        <i data-lucide="shopping-bag" class="w-3.5 h-3.5"></i>
                        <span>Pesan Web</span>
                    </button>
                    <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                       class="py-2.5 px-3 rounded-full font-bold text-xs text-[#EE4D2D] bg-[#FFF0ED] hover:bg-[#EE4D2D] hover:text-white border border-[#EE4D2D]/30 transition-all text-center flex items-center justify-center gap-1"
                       title="Beli via Shopee Official">
                        <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-3.5 h-3.5" alt="Shopee">
                        <span>Shopee</span>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 4. PRODUK UNGGULAN RESMI (FLAGSHIP SHOWCASE)             -->
<!-- ======================================================= -->
<section id="produk" class="py-12 sm:py-20 bg-white border-b border-ftl-sand">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Title (Rapi, Terpusat & Bebas Offside) -->
        <div data-animate="fade-up" class="text-center max-w-2xl mx-auto mb-8 sm:mb-12">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-100/80 text-ftl-forest text-xs font-bold uppercase tracking-wider mb-2 border border-emerald-200/60">
                PRODUK UNGGULAN RESMI FTL
            </span>
            <h2 class="text-2xl sm:text-4xl font-extrabold font-display text-ftl-forest">
                Baby Calming Rub Cream 50g
            </h2>
            <p class="text-xs sm:text-base text-gray-600 mt-1.5">
                Kombinasi formulasi modern tanpa rasa lengket dan kehangatan alami Biji Pala Nusantara.
            </p>
        </div>

        <!-- Single Flagship Showcase Card -->
        <div data-animate="fade-up" class="bg-white rounded-3xl sm:rounded-[36px] border border-ftl-sand shadow-xl shadow-emerald-950/5 overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                
                <!-- Left: Product Visual Presentation (5 cols) -->
                <div data-animate="zoom-in" data-delay="100" class="lg:col-span-5 bg-gradient-to-br from-emerald-50/70 via-ftl-light/50 to-teal-50/40 p-6 sm:p-10 flex flex-col justify-between items-center relative border-b lg:border-b-0 lg:border-r border-ftl-sand/60">
                    <!-- Top Badges -->
                    <div class="w-full flex items-center justify-between z-10">
                        <span class="inline-flex items-center gap-1 bg-white/95 backdrop-blur-xs text-ftl-forest font-bold text-xs px-3 py-1.5 rounded-full shadow-xs border border-emerald-100 animate-ftl-float">
                            ⭐ Official Flagship
                        </span>
                        <span class="inline-flex items-center gap-1 bg-emerald-600 text-white font-extrabold text-xs px-3 py-1.5 rounded-full shadow-xs">
                            Netto 50g
                        </span>
                    </div>

                    <!-- Main Product Image (Foto Studio Asli Produk 50g) -->
                    <div class="my-5 sm:my-7 relative group flex items-center justify-center">
                        <div class="absolute -inset-4 bg-emerald-200/30 rounded-3xl blur-2xl group-hover:bg-emerald-300/40 transition duration-500"></div>
                        <picture>
                            <source srcset="<?= BASE_URL ?>assets/images/product-calming-rub-real.webp?v=<?= filemtime(__DIR__ . '/assets/images/product-calming-rub-real.webp') ?>" type="image/webp">
                            <img src="<?= BASE_URL ?>assets/images/product-calming-rub-real.webp?v=<?= filemtime(__DIR__ . '/assets/images/product-calming-rub-real.webp') ?>" 
                                 alt="Baby Calming Rub Cream 50g - For The Little" 
                                 class="relative w-64 sm:w-72 lg:w-80 max-w-full h-auto object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-300">
                        </picture>
                    </div>

                    <!-- Bottom Certifications Pill -->
                    <div class="w-full grid grid-cols-3 gap-2 pt-4 border-t border-emerald-200/50 text-center">
                        <div class="bg-white/80 backdrop-blur-xs py-2 px-2 rounded-xl border border-emerald-100/60 shadow-2xs">
                            <span class="block text-[11px] font-bold text-gray-800">BPOM RI</span>
                            <span class="text-[10px] text-gray-500 font-mono font-medium">NA18260108839</span>
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
                            <span class="text-xs font-bold text-gray-800">5.0 / 5.0</span>
                            <span class="text-xs text-gray-400">• 16 Ulasan Bintang 5 di Shopee</span>
                        </div>

                        <!-- Product Title -->
                        <h3 class="text-2xl sm:text-3xl font-extrabold font-display text-gray-900 tracking-tight">
                            Baby Calming Rub Cream 50g
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-500 mt-1">
                            Krim telon alami dengan biji pala nusantara & ekstrak calendula organik.
                        </p>

                        <!-- Price Banner -->
                        <div class="mt-5 p-4 rounded-2xl bg-ftl-light/80 border border-emerald-100 flex flex-wrap items-center justify-between gap-2.5 sm:gap-3">
                            <div class="flex items-baseline gap-2 sm:gap-2.5 flex-wrap">
                                <span class="text-xs sm:text-sm text-gray-400 line-through whitespace-nowrap">Rp 299.000</span>
                                <span class="text-2xl sm:text-3xl font-extrabold text-ftl-forest whitespace-nowrap">Rp 117.999</span>
                                <span class="text-xs font-bold text-amber-800 bg-amber-100 px-2.5 py-0.5 rounded-full whitespace-nowrap">
                                    Hemat 60%
                                </span>
                            </div>
                            <span class="text-xs font-semibold text-emerald-800 bg-emerald-100/90 px-2.5 py-1 rounded-full flex items-center gap-1 whitespace-nowrap shrink-0">
                                <i data-lucide="gift" class="w-3.5 h-3.5 text-emerald-700"></i> Free Keychain & Card
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
                            <div class="w-9 h-9 rounded-2xl bg-rose-50 border border-rose-200/80 text-rose-600 flex items-center justify-center shrink-0 shadow-2xs" title="Auto-Deteksi Lokasi GPS & Ongkir">
                                <svg class="w-5 h-5 fill-rose-600 text-rose-600" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
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
                                    @click="openOrderModal('pesan', 'calming-rub-50g')"
                                    class="w-full h-12 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-3 sm:px-4 rounded-2xl text-xs sm:text-sm shadow-md hover:shadow-emerald-600/30 transition flex items-center justify-center gap-2 active:scale-95 group cursor-pointer whitespace-nowrap">
                                <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-4 h-4 shrink-0 group-hover:scale-110 transition-transform" alt="WhatsApp">
                                <span>Pesan via WhatsApp</span>
                            </button>
                            <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                               class="w-full h-12 bg-[#EE4D2D] hover:bg-[#d73f21] text-white font-bold py-3 px-3 sm:px-4 rounded-2xl text-xs sm:text-sm shadow-md hover:shadow-orange-600/30 transition flex items-center justify-center gap-2 active:scale-95 text-center group whitespace-nowrap">
                                <img src="<?= BASE_URL ?>assets/images/shopee-icon-white.svg" class="w-4 h-4 shrink-0 group-hover:scale-110 transition-transform" alt="Shopee">
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
        
        <div data-animate="fade-up" class="text-center max-w-3xl mx-auto space-y-3 mb-16">
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
            
            <!-- Card 1: Biji Pala Nusantara -->
            <div data-animate="fade-up" data-delay="0" class="bg-white rounded-3xl p-8 border border-ftl-sand shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">
                <div class="w-28 h-28 mb-6 p-2 rounded-2xl bg-amber-50/60 border border-amber-100 flex items-center justify-center overflow-hidden">
                    <img src="<?= BASE_URL ?>assets/images/ingredient-nutmeg-real.png" alt="Biji Pala Nusantara" class="w-24 h-24 object-cover rounded-full shadow-md">
                </div>
                <div class="inline-block px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold mb-3">
                    Bahan Utama Nusantara
                </div>
                <h3 class="text-xl font-bold font-display text-gray-900 mb-2">
                    Biji Pala Nusantara
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Kandungan *myristicin* alami dalam biji pala nusantara berkhasiat menghangatkan perut secara lembut, melancarkan sirkulasi, dan mengusir kembung serta kolik seketika.
                </p>
            </div>

            <!-- Card 2: Bunga Calendula -->
            <div data-animate="fade-up" data-delay="120" class="bg-white rounded-3xl p-8 border border-ftl-sand shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">
                <div class="w-28 h-28 mb-6 p-2 rounded-2xl bg-yellow-50/60 border border-yellow-100 flex items-center justify-center overflow-hidden">
                    <img src="<?= BASE_URL ?>assets/images/ingredient-calendula-real.png" alt="Ekstrak Calendula" class="w-24 h-24 object-cover rounded-full shadow-md">
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

            <!-- Card 3: Coconut & Avocado Oil Alami -->
            <div data-animate="fade-up" data-delay="240" class="bg-white rounded-3xl p-8 border border-ftl-sand shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">
                <div class="w-28 h-28 mb-6 p-2 rounded-2xl bg-emerald-50/60 border border-emerald-100 flex items-center justify-center overflow-hidden">
                    <img src="<?= BASE_URL ?>assets/images/ingredient-plant-oil-real.png?v=<?= @filemtime(__DIR__ . '/assets/images/ingredient-plant-oil-real.png') ?>" alt="Coconut & Avocado Oil Alami" class="w-24 h-24 object-cover rounded-full shadow-md">
                </div>
                <div class="inline-block px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
                    Cepat Meresap & Menutrisi
                </div>
                <h3 class="text-xl font-bold font-display text-gray-900 mb-2">
                    Coconut & Avocado Oil
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Perpaduan virgin *coconut oil* dan *avocado oil* nabati murni yang kaya nutrisi, mengunci kelembapan alami, cepat meresap sempurna, serta menjaga kelembutan kulit bayi tanpa rasa lengket.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 5. PERBANDINGAN: KENAPA BUNDA BERALIH KE CALMING RUB     -->
<!-- ======================================================= -->
<section class="py-16 sm:py-24 bg-[#F7F4EE] border-t border-ftl-sand/80 relative overflow-hidden">
    
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header Editorial -->
        <div data-animate="fade-up" class="text-center max-w-2xl mx-auto mb-12 sm:mb-16 space-y-3">
            <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-100/80 text-ftl-forest text-xs font-bold tracking-wider uppercase">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                Inovasi Formula Perawatan Bayi
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-display text-gray-900 tracking-tight leading-tight">
                Mengapa Bunda Beralih ke <br class="hidden sm:inline">
                <span class="text-ftl-forest">Baby Calming Rub Cream?</span>
            </h2>
            <p class="text-sm sm:text-base text-gray-600 leading-relaxed max-w-xl mx-auto">
                Sentuhan baru yang menggabungkan khasiat rempah alami nusantara dengan kelembutan krim modern, menjawab kekurangan minyak telon konvensional.
            </p>
        </div>

        <!-- Dual Column Editorial Comparison Cards (Bukan Tabel AI Kaku) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch">
            
            <!-- CARD 1: FOR THE LITTLE (Hero Card: Elegan, Teruji & Menutrisi) -->
            <div data-animate="fade-right" class="lg:col-span-7 bg-white rounded-[32px] p-6 sm:p-9 border-2 border-ftl-forest/30 shadow-xl shadow-emerald-950/5 relative flex flex-col justify-between">
                
                <!-- Corner Header -->
                <div class="flex items-center justify-between gap-3 pb-6 border-b border-emerald-100">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-50 border border-emerald-200/80 flex items-center justify-center shrink-0 shadow-2xs">
                            <i data-lucide="shield-check" class="w-6 h-6 text-emerald-700"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-extrabold uppercase tracking-widest text-emerald-700 block">
                                Pilihan Utama Bunda Cerdas
                            </span>
                            <h3 class="font-display font-extrabold text-xl sm:text-2xl text-ftl-forest">
                                For The Little Baby Calming Rub
                            </h3>
                        </div>
                    </div>
                    <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-bold border border-emerald-200/60 shrink-0">
                        Formula Modern
                    </span>
                </div>

                <!-- Editorial Feature Narrative List -->
                <div class="divide-y divide-gray-100 py-4 space-y-4">
                    
                    <!-- Feature 1 -->
                    <div class="pt-4 first:pt-0 flex items-start gap-4">
                        <span class="font-display font-bold text-sm text-emerald-700 w-6 shrink-0 pt-0.5">01</span>
                        <div class="space-y-1">
                            <h4 class="font-bold text-sm sm:text-base text-gray-900">Tekstur Krim Lembut & Cepat Meresap</h4>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Krim berbahan dasar air yang langsung meresap sempurna ke kulit bayi. 100% bebas rasa lengket di tangan dan tidak meninggalkan noda minyak pada pakaian si kecil.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="pt-4 flex items-start gap-4">
                        <span class="font-display font-bold text-sm text-emerald-700 w-6 shrink-0 pt-0.5">02</span>
                        <div class="space-y-1">
                            <h4 class="font-bold text-sm sm:text-base text-gray-900">Kehangatan Pas dari Biji Pala Nusantara</h4>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Kehangatan alami rempah pala yang menenangkan dan meredakan kolik/kembung seketika, tanpa sensasi panas berlebih yang berisiko membuat kulit bayi perih.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="pt-4 flex items-start gap-4">
                        <span class="font-display font-bold text-sm text-emerald-700 w-6 shrink-0 pt-0.5">03</span>
                        <div class="space-y-1">
                            <h4 class="font-bold text-sm sm:text-base text-gray-900">Menutrisi Skin Barrier dengan Calendula</h4>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Diperkaya ekstrak Calendula organik yang melembapkan kulit sensitif si kecil, melindungi dari ruam dan kekeringan saat sering digunakan.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="pt-4 flex items-start gap-4">
                        <span class="font-display font-bold text-sm text-emerald-700 w-6 shrink-0 pt-0.5">04</span>
                        <div class="space-y-1">
                            <h4 class="font-bold text-sm sm:text-base text-gray-900">Kemasan Tube Higienis & Praktis</h4>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Tutup flip-top kedap udara yang mudah dibuka dengan satu tangan. Aman di dalam diaper bag tanpa khawatir tumpah atau belepotan saat bepergian.
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Bottom Trust Note -->
                <div class="pt-4 border-t border-emerald-100 flex items-center justify-between text-xs text-emerald-800 font-semibold">
                    <span class="flex items-center gap-1.5">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-600"></i> Teruji Dermatologis & Halal Resmi
                    </span>
                    <span class="text-[11px] text-gray-400">Aman untuk Newborn 0+</span>
                </div>

            </div>

            <!-- CARD 2: MINYAK TELON TRADISIONAL (Jelas, Tajam, Santun & Objektif) -->
            <div data-animate="fade-left" class="lg:col-span-5 bg-[#FAF7F2] rounded-[32px] p-6 sm:p-8 border border-stone-300 shadow-sm flex flex-col justify-between">
                
                <div>
                    <!-- Header Kartu Tradisional -->
                    <div class="pb-6 border-b border-stone-200 flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-2xl bg-stone-200/80 border border-stone-300 flex items-center justify-center shrink-0 text-stone-700">
                                <i data-lucide="flask-conical" class="w-5 h-5 text-stone-600"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-stone-500 block">
                                    Format Tradisional
                                </span>
                                <h3 class="font-display font-extrabold text-lg sm:text-xl text-stone-900">
                                    Minyak Telon Konvensional
                                </h3>
                            </div>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-stone-200/80 text-stone-700">
                            Format Lama
                        </span>
                    </div>

                    <!-- Comparison Points (Teks Tajam, Kontras Tinggi & Sangat Jelas) -->
                    <div class="divide-y divide-stone-200/80 py-4 space-y-4 text-xs sm:text-sm">
                        
                        <div class="pt-4 first:pt-0 space-y-1">
                            <h4 class="font-bold text-stone-900 text-sm sm:text-base flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-stone-400 shrink-0"></span>
                                Tekstur Minyak Cair & Licin
                            </h4>
                            <p class="text-stone-700 leading-relaxed text-xs sm:text-sm pl-3.5">
                                Lambat meresap ke kulit, licin di telapak tangan, dan berpotensi meninggalkan noda kekuningan yang sulit hilang di baju bayi.
                            </p>
                        </div>

                        <div class="pt-4 space-y-1">
                            <h4 class="font-bold text-stone-900 text-sm sm:text-base flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-stone-400 shrink-0"></span>
                                Aroma Menyengat & Kadang Terlalu Panas
                            </h4>
                            <p class="text-stone-700 leading-relaxed text-xs sm:text-sm pl-3.5">
                                Konsentrasi minyak kayu putih yang tajam sering kali terlalu menyengat bagi pernapasan bayi dan rentan memicu ruam panas pada newborn.
                            </p>
                        </div>

                        <div class="pt-4 space-y-1">
                            <h4 class="font-bold text-stone-900 text-sm sm:text-base flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-stone-400 shrink-0"></span>
                                Tidak Mengandung Pelembap Kulit
                            </h4>
                            <p class="text-stone-700 leading-relaxed text-xs sm:text-sm pl-3.5">
                                Tanpa nutrisi pelembap aktif. Pemakaian rutin pada kulit bayi yang baru lahir berisiko menyebabkan kulit menjadi kering dan mengelupas.
                            </p>
                        </div>

                        <div class="pt-4 space-y-1">
                            <h4 class="font-bold text-stone-900 text-sm sm:text-base flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-stone-400 shrink-0"></span>
                                Kemasan Botol Rawan Tumpah
                            </h4>
                            <p class="text-stone-700 leading-relaxed text-xs sm:text-sm pl-3.5">
                                Tutup ulir botol rawan kendur atau bocor saat ditaruh di dalam tas perlengkapan bayi, membuat isi tas berbau menyengat dan kotor.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="pt-4 border-t border-stone-200 text-xs text-stone-600 font-medium">
                    Catatan: Format lama membutuhkan kehati-hatian ekstra saat diaplikasikan ke kulit bayi.
                </div>

            </div>

        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 6. ARTIKEL EDUKASI PARENTING (MIRIP TENTANG ANAK)       -->
<!-- ======================================================= -->
<section id="artikel" class="scroll-mt-16 sm:scroll-mt-24 py-20 bg-white border-t border-ftl-sand">
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
                    <img src="<?= BASE_URL ?>assets/images/article-kolik.webp?v=<?= filemtime(__DIR__ . '/assets/images/article-kolik.webp') ?>" 
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
                    <img src="<?= BASE_URL ?>assets/images/article-pijat-ilu.webp?v=<?= filemtime(__DIR__ . '/assets/images/article-pijat-ilu.webp') ?>" 
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
                    <img src="<?= BASE_URL ?>assets/images/article-minyak-pala.webp?v=<?= filemtime(__DIR__ . '/assets/images/article-minyak-pala.webp') ?>" 
                         alt="Khasiat Biji Pala Nusantara untuk Bayi" 
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
                                Mengapa Biji Pala Nusantara Sangat Baik untuk Kehangatan Bayi?
                            </a>
                        </h3>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-2 leading-relaxed">
                            Mengupas warisan nenek moyang dan bukti ilmiah tentang keunggulan biji pala dibanding minyak kayu putih biasa.
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
<section id="tentang" class="scroll-mt-16 sm:scroll-mt-24 py-20 bg-ftl-cream border-t border-ftl-sand">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left: Brand Story & 3 Pillars (Col 6) -->
            <div data-animate="fade-right" class="lg:col-span-6 space-y-6">
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
                                Mengangkat khasiat hangat alami biji pala lokal yang menenangkan dan nyaman untuk bayi.
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
                            @click="openOrderModal('pesan', 'calming-rub-50g')"
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
            <div data-animate="fade-left" data-delay="150" class="lg:col-span-6">
                <div class="bg-gradient-to-br from-ftl-light via-white to-amber-50/60 rounded-3xl sm:rounded-[32px] p-6 sm:p-8 border border-emerald-100 shadow-md shadow-emerald-950/5 relative">
                    
                    <!-- Quote Banner Header -->
                    <div class="flex items-center gap-3.5 pb-6 border-b border-emerald-100/70">
                        <div class="w-11 h-11 rounded-full border border-emerald-700/30 bg-ftl-forest text-white flex items-center justify-center shrink-0 shadow-2xs">
                            <i data-lucide="sparkles" class="w-5 h-5 text-amber-300"></i>
                        </div>
                        <div>
                            <h3 class="font-display font-bold text-base sm:text-lg text-ftl-forest">
                                Bringing Back Indonesia's Nature Blessing
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
                                <i data-lucide="sun" class="w-4 h-4 text-amber-600"></i>
                            </div>
                            <h5 class="font-bold text-sm text-gray-800">Setelah Mandi Pagi</h5>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Melindungi bayi dari masuk angin dan kembung saat beraktivitas ceria.</p>
                        </div>

                        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-2xs hover:border-emerald-200 transition">
                            <div class="w-8 h-8 rounded-full border border-indigo-300/70 bg-indigo-50/50 flex items-center justify-center text-indigo-700 mb-2.5">
                                <i data-lucide="moon" class="w-4 h-4 text-indigo-600"></i>
                            </div>
                            <h5 class="font-bold text-sm text-gray-800">Sebelum Tidur Malam</h5>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Mencegah terbangun tengah malam karena perut begah, kolik, atau rewel.</p>
                        </div>

                        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-2xs hover:border-emerald-200 transition">
                            <div class="w-8 h-8 rounded-full border border-teal-300/70 bg-teal-50/50 flex items-center justify-center text-teal-700 mb-2.5">
                                <i data-lucide="cloud-rain" class="w-4 h-4 text-teal-600"></i>
                            </div>
                            <h5 class="font-bold text-sm text-gray-800">Saat Cuaca Dingin / Hujan</h5>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Menjaga kehangatan tubuh si kecil tetap stabil, nyaman, dan tenang.</p>
                        </div>

                        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-2xs hover:border-emerald-200 transition">
                            <div class="w-8 h-8 rounded-full border border-emerald-300/70 bg-emerald-50/50 flex items-center justify-center text-emerald-700 mb-2.5">
                                <i data-lucide="compass" class="w-4 h-4 text-emerald-600"></i>
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
                            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-600"></i> Dermatologically Tested
                        </span>
                        <span class="inline-flex items-center gap-1.5 text-emerald-800 font-bold">
                            <i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-600"></i> Biji Pala Asli
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
<!-- TESTIMONI PARA IBU (SHOPEE OFFICIAL VERIFIED REVIEWS)   -->
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
        
        <div data-animate="fade-up" class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 sm:mb-12 gap-4">
            <div>
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#FFF0ED] text-[#EE4D2D] border border-[#EE4D2D]/20 text-xs font-bold mb-2">
                    <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-3.5 h-3.5 shrink-0" alt="Shopee">
                    <span>ULASAN ASLI SHOPEE OFFICIAL STORE</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold font-display text-ftl-forest">
                    Kata Para Moms di Shopee
                </h2>
                <p class="text-sm sm:text-base text-gray-600 mt-1 flex items-center gap-2 flex-wrap">
                    <span>Rating <strong class="text-gray-900 font-bold">5.0 / 5.0</strong> dari <strong class="text-gray-900 font-bold">16 ulasan bintang 5</strong> pembeli resmi di Shopee.</span>
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
            
            <!-- Real Review 1: annisamutiara.yu -->
            <div data-animate="fade-up" data-delay="0" @click="testiIndex = 0"
                 :class="testiIndex === 0 ? 'flex ring-2 ring-[#EE4D2D]/60 bg-[#FFF9F8]/60 shadow-xl shadow-orange-950/5 scale-[1.01] md:scale-[1.02] z-10 border-[#EE4D2D]/30' : 'hidden md:flex opacity-75 hover:opacity-100 hover:border-orange-200 border-ftl-sand bg-white'" 
                 class="p-6 sm:p-7 rounded-3xl border transition-all duration-300 flex-col justify-between cursor-pointer group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#FFF0ED] text-[#EE4D2D] border border-[#EE4D2D]/20">
                            <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-3 h-3 shrink-0" alt="Shopee">
                            Shopee Verified
                        </span>
                    </div>
                    <div class="flex flex-wrap gap-1.5 text-[10px] text-gray-500 font-medium">
                        <span class="bg-gray-100 px-2 py-0.5 rounded">Variasi: Cream 50g</span>
                        <span class="bg-emerald-50 text-emerald-800 px-2 py-0.5 rounded">100% Bintang 5</span>
                    </div>
                    <p class="text-sm text-gray-800 font-medium italic leading-relaxed pt-1">
                        "Bagus untuk bayikk mengatasi kembung super love banget!🥰"
                    </p>
                    <div class="bg-gray-50 p-3 rounded-2xl border border-gray-100 text-[11px] text-gray-600 mt-2">
                        <strong class="text-ftl-forest block mb-0.5">Respon Toko FTL:</strong>
                        "Haii Momss, terimakasih atas kepercayaan momss dalam memilih produk For the little untuk kebutuhn si kecil ❤️"
                    </div>
                </div>
                
                <div class="pt-5 border-t border-gray-100 mt-4 space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full border border-orange-200 bg-gradient-to-br from-[#FFF0ED] to-white text-[#EE4D2D] flex items-center justify-center shrink-0 font-bold text-xs shadow-2xs">
                            AM
                        </div>
                        <div>
                            <h5 class="font-bold text-xs text-gray-900 flex items-center gap-1.5">
                                <span>annisamutiara.yu</span>
                            </h5>
                            <span class="text-[11px] text-gray-500">Ulasan Asli Pembeli Shopee</span>
                        </div>
                    </div>
                    <a href="<?= SHOPEE_REVIEWS_URL ?>" target="_blank" rel="noopener" @click.stop
                       class="inline-flex items-center justify-between w-full text-xs font-semibold text-gray-600 hover:text-[#EE4D2D] transition pt-1">
                        <span class="flex items-center gap-1.5">
                            <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-3.5 h-3.5 shrink-0" alt="Shopee">
                            Lihat ulasan di Shopee
                        </span>
                        <span class="text-[#EE4D2D] font-bold">&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Real Review 2: susirius -->
            <div data-animate="fade-up" data-delay="120" @click="testiIndex = 1"
                 :class="testiIndex === 1 ? 'flex ring-2 ring-[#EE4D2D]/60 bg-[#FFF9F8]/60 shadow-xl shadow-orange-950/5 scale-[1.01] md:scale-[1.02] z-10 border-[#EE4D2D]/30' : 'hidden md:flex opacity-75 hover:opacity-100 hover:border-orange-200 border-ftl-sand bg-white'"
                 class="p-6 sm:p-7 rounded-3xl border transition-all duration-300 flex-col justify-between cursor-pointer group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#FFF0ED] text-[#EE4D2D] border border-[#EE4D2D]/20">
                            <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-3 h-3 shrink-0" alt="Shopee">
                            Shopee Verified
                        </span>
                    </div>
                    <div class="flex flex-wrap gap-1.5 text-[10px] text-gray-500 font-medium">
                        <span class="bg-gray-100 px-2 py-0.5 rounded">Variasi: Cream 50g</span>
                        <span class="bg-emerald-50 text-emerald-800 px-2 py-0.5 rounded">Ulasan + Foto Kemasan</span>
                    </div>
                    <p class="text-sm text-gray-800 font-medium italic leading-relaxed pt-1">
                        "Tekstur: saya suka karena produk tersebut tidak lengket."
                    </p>
                    <div class="bg-gray-50 p-3 rounded-2xl border border-gray-100 text-[11px] text-gray-600 mt-2">
                        <strong class="text-ftl-forest block mb-0.5">Respon Toko FTL:</strong>
                        "Semoga Baby Calming Rub Cream-nya bisa jadi favorit dan merasakan manfaatnya bagi si kecil yaa. Ditunggu order selanjutnyaa, momss🥰"
                    </div>
                </div>
                
                <div class="pt-5 border-t border-gray-100 mt-4 space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full border border-orange-200 bg-gradient-to-br from-[#FFF0ED] to-white text-[#EE4D2D] flex items-center justify-center shrink-0 font-bold text-xs shadow-2xs">
                            SR
                        </div>
                        <div>
                            <h5 class="font-bold text-xs text-gray-900 flex items-center gap-1.5">
                                <span>susirius</span>
                            </h5>
                            <span class="text-[11px] text-gray-500">Ulasan Asli Pembeli Shopee</span>
                        </div>
                    </div>
                    <a href="<?= SHOPEE_REVIEWS_URL ?>" target="_blank" rel="noopener" @click.stop
                       class="inline-flex items-center justify-between w-full text-xs font-semibold text-gray-600 hover:text-[#EE4D2D] transition pt-1">
                        <span class="flex items-center gap-1.5">
                            <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-3.5 h-3.5 shrink-0" alt="Shopee">
                            Lihat ulasan di Shopee
                        </span>
                        <span class="text-[#EE4D2D] font-bold">&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Real Review 3: tanti_fitriani -->
            <div data-animate="fade-up" data-delay="240" @click="testiIndex = 2"
                 :class="testiIndex === 2 ? 'flex ring-2 ring-[#EE4D2D]/60 bg-[#FFF9F8]/60 shadow-xl shadow-orange-950/5 scale-[1.01] md:scale-[1.02] z-10 border-[#EE4D2D]/30' : 'hidden md:flex opacity-75 hover:opacity-100 hover:border-orange-200 border-ftl-sand bg-white'"
                 class="p-6 sm:p-7 rounded-3xl border transition-all duration-300 flex-col justify-between cursor-pointer group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#FFF0ED] text-[#EE4D2D] border border-[#EE4D2D]/20">
                            <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-3 h-3 shrink-0" alt="Shopee">
                            Shopee Verified
                        </span>
                    </div>
                    <div class="flex flex-wrap gap-1.5 text-[10px] text-gray-500 font-medium">
                        <span class="bg-gray-100 px-2 py-0.5 rounded">Variasi: Cream 50g</span>
                        <span class="bg-amber-50 text-amber-800 px-2 py-0.5 rounded">+ Free Gift Merchandise</span>
                    </div>
                    <p class="text-sm text-gray-800 font-medium italic leading-relaxed pt-1">
                        "Produk original For The Little, pengemasan sangat rapi dan dapat free gift merchandise eksklusif. Hangatnya lembut dan tidak bikin perih di kulit si kecil."
                    </p>
                    <div class="bg-gray-50 p-3 rounded-2xl border border-gray-100 text-[11px] text-gray-600 mt-2">
                        <strong class="text-ftl-forest block mb-0.5">Respon Toko FTL:</strong>
                        "Terimakasih sudah berbelanja di For the little dan kepercayaan momss dalam memilih produk kami untuk kebutuhn si kecil ❤️"
                    </div>
                </div>
                
                <div class="pt-5 border-t border-gray-100 mt-4 space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full border border-orange-200 bg-gradient-to-br from-[#FFF0ED] to-white text-[#EE4D2D] flex items-center justify-center shrink-0 font-bold text-xs shadow-2xs">
                            TF
                        </div>
                        <div>
                            <h5 class="font-bold text-xs text-gray-900 flex items-center gap-1.5">
                                <span>tanti_fitriani</span>
                            </h5>
                            <span class="text-[11px] text-gray-500">Ulasan Asli Pembeli Shopee</span>
                        </div>
                    </div>
                    <a href="<?= SHOPEE_REVIEWS_URL ?>" target="_blank" rel="noopener" @click.stop
                       class="inline-flex items-center justify-between w-full text-xs font-semibold text-gray-600 hover:text-[#EE4D2D] transition pt-1">
                        <span class="flex items-center gap-1.5">
                            <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-3.5 h-3.5 shrink-0" alt="Shopee">
                            Lihat ulasan di Shopee
                        </span>
                        <span class="text-[#EE4D2D] font-bold">&rarr;</span>
                    </a>
                </div>
            </div>

        </div>

        <!-- Mobile Touch Swipe Hint -->
        <p class="text-center text-[11px] text-gray-400 mt-5 md:hidden flex items-center justify-center gap-1.5">
            <svg class="w-3.5 h-3.5 text-[#EE4D2D] animate-pulse" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"/>
            </svg>
            <span>Geser (swipe) atau klik tombol panah untuk membaca ulasan Shopee lainnya</span>
        </p>

        <!-- High-Trust Shopee Official Banner CTA -->
        <div data-animate="fade-up" class="mt-10 p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-[#FFF5F2] via-white to-[#FFF5F2] border border-[#EE4D2D]/25 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4 text-left">
                <div class="w-14 h-14 rounded-2xl bg-[#EE4D2D] text-white flex items-center justify-center shrink-0 shadow-md">
                    <img src="<?= BASE_URL ?>assets/images/shopee-icon-white.svg" class="w-8 h-8" alt="Shopee">
                </div>
                <div>
                    <div class="flex items-center gap-2 flex-wrap">
                        <h4 class="font-extrabold text-gray-900 text-base sm:text-lg">For The Little Official Store</h4>
                        <span class="bg-[#EE4D2D] text-white text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">Shopee Resmi</span>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-600 mt-1 flex items-center gap-2 flex-wrap">
                        <span class="text-amber-500 font-bold flex items-center gap-1">★ 5.0 / 5.0</span>
                        <span class="text-gray-300">•</span>
                        <span class="text-gray-700 font-semibold">16 Ulasan Bintang 5 (100% Puas)</span>
                        <span class="text-gray-300">•</span>
                        <span class="text-emerald-700 font-semibold">100% Produk Original BPOM</span>
                    </p>
                </div>
            </div>
            <a href="<?= SHOPEE_REVIEWS_URL ?>" target="_blank" rel="noopener"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 bg-[#EE4D2D] hover:bg-[#d73f21] text-white font-bold px-6 py-3.5 rounded-2xl shadow-lg hover:shadow-orange-500/25 hover:scale-105 active:scale-95 transition-all text-sm shrink-0">
                <img src="<?= BASE_URL ?>assets/images/shopee-icon-white.svg" class="w-4 h-4" alt="Shopee">
                <span>Lihat Semua 16 Ulasan di Shopee</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

    </div>
</section>

<!-- ======================================================= -->
<!-- 7. CTA PEMESANAN & KONSULTASI RESMI FOR THE LITTLE       -->
<!-- ======================================================= -->
<section id="kontak" class="py-16 bg-[#738a7a] text-white relative overflow-hidden">
    <!-- Subtle natural organic background glowing blurs in authentic FTL tones -->
    <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-[#abcbb2]/40 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-[#566c5d]/40 blur-3xl pointer-events-none"></div>

    <div data-animate="zoom-in" class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-6">
        <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-ftl-light text-xs font-bold tracking-wider uppercase border border-white/20">
            #frommothertoanother • Perawatan Alami Si Kecil
        </span>
        <h2 class="text-3xl sm:text-5xl font-extrabold font-display leading-tight">
            Berikan Kehangatan Penuh Kasih & <br class="hidden sm:inline">
            Kenyamanan Terbaik untuk Si Kecil
        </h2>
        <p class="text-sm sm:text-base text-ftl-light/95 max-w-xl mx-auto">
            Konsultasikan keluhan si kecil atau pesan Baby Calming Rub Cream 50g sekarang melalui WhatsApp CS resmi kami dan Shopee Official Store.
        </p>
        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button type="button" 
                    @click="openOrderModal('pesan', 'calming-rub-50g')" 
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-ftl-forest hover:bg-ftl-light font-bold px-8 py-4 rounded-full shadow-xl hover:scale-105 active:scale-95 transition-all text-base cursor-pointer">
                <img src="<?= BASE_URL ?>assets/images/whatsapp-icon.svg" class="w-5 h-5 shrink-0" alt="WhatsApp">
                <span>Pesan Cepat via WhatsApp</span>
            </button>
            <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#EE4D2D] hover:bg-[#d73f21] text-white font-bold px-8 py-4 rounded-full shadow-xl hover:scale-105 active:scale-95 transition-all text-base">
                <img src="<?= BASE_URL ?>assets/images/shopee-icon-white.svg" class="w-5 h-5" alt="Shopee">
                <span>Beli di Shopee Resmi</span>
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
