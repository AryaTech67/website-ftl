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
<section id="beranda" class="relative w-full overflow-hidden bg-ftl-cream select-none" 
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
                 }, 3000); // Geser cepat 3 detik persis Tentang Anak
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
             },
             handleTouchEnd(e) {
                 this.touchEndX = e.changedTouches[0].clientX;
                 this.handleSwipe();
             },
             handleSwipe() {
                 const diff = this.touchStartX - this.touchEndX;
                 if (Math.abs(diff) > 35) { // ambang batas geser tangan di HP
                     if (diff > 0) {
                         this.nextSlide(); // Geser ke kiri -> slide berikutnya
                     } else {
                         this.prevSlide(); // Geser ke kanan -> slide sebelumnya
                     }
                     this.startAutoplay(); // Reset timer setelah digeser manual
                 }
             }
         }" 
         x-init="startAutoplay()"
         @mouseenter="stopAutoplay()"
         @mouseleave="startAutoplay()"
         @touchstart.passive="handleTouchStart($event)"
         @touchend.passive="handleTouchEnd($event)">

    <!-- Full Bleed Container: 100% Lebar Layar Bergaya Tentang Anak -->
    <div class="relative w-full h-[520px] sm:h-[560px] lg:h-[580px] overflow-hidden bg-ftl-forest cursor-grab active:cursor-grabbing">
        
        <!-- ================= SLIDE 1: Flagship FTL (Persis Gaya Visual Tentang Anak) ================= -->
        <div x-show="activeSlide === 0"
             x-transition:enter="transition transform ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-x-full"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition transform ease-in duration-400 absolute inset-0"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 -translate-x-full"
             class="w-full h-full relative flex items-center overflow-hidden bg-cover bg-left sm:bg-center"
             style="background-image: url('<?= BASE_URL ?>assets/images/banner-ftl-hero.jpg');">
            
            <!-- Dark Gradient Vignette Overlay to ensure razor-sharp text contrast -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/50 via-[#142E20]/85 to-[#0D1F16]/95 lg:from-black/15 lg:via-[#142E20]/85 lg:to-[#0D1F16]/95 pointer-events-none"></div>
            
            <div class="w-full max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <!-- Left/Center Content (8 cols) -->
                    <div class="lg:col-span-8 space-y-3 sm:space-y-4 text-left">
                        
                        <!-- Top Header Row ala Tentang Anak (Logo Kiri & Endorsement Kanan) -->
                        <div class="flex items-center justify-between gap-3 max-w-xl">
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-white/20 backdrop-blur-md text-white text-xs font-black border border-white/30 shadow-xs tracking-wider">
                                    <i data-lucide="sprout" class="w-3.5 h-3.5 text-emerald-300"></i>
                                    FOR THE LITTLE
                                </span>
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 text-emerald-100 text-xs font-semibold">
                                    #frommothertoanother 🤱🏻
                                </span>
                            </div>

                            <!-- Endorsement Badge Kanan Atas ala Tentang Anak -->
                            <div class="hidden sm:inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-md border border-white/25 text-white shadow-xs">
                                <div class="w-5 h-5 rounded-full bg-amber-400 text-amber-950 flex items-center justify-center shrink-0">
                                    <i data-lucide="shield-check" class="w-3 h-3"></i>
                                </div>
                                <span class="text-[11px] font-bold text-amber-200">Ahlinya Redakan Kolik Bayi</span>
                            </div>
                        </div>

                        <!-- Headline Tegas 2 Baris ala Tentang Anak -->
                        <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-white font-display tracking-tight leading-tight drop-shadow-sm pt-1">
                            Bayi Nyaman & Ceria<br>
                            <span class="text-[#FCD34D]">Bebas Kembung & Kolik Semalaman!</span>
                        </h1>

                        <!-- 4 Kapsul Fitur Utama (Grid 2x2 ala Tentang Anak) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-2.5 max-w-xl pt-1">
                            <div class="flex items-center gap-2.5 bg-white/95 backdrop-blur-xs py-2 px-3.5 rounded-full shadow-md border border-white/60">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-[#EE4D2D] text-white flex items-center justify-center shrink-0 shadow-2xs">
                                    <i data-lucide="leaf" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 leading-snug">Minyak Pala Alami Nusantara</span>
                            </div>
                            <div class="flex items-center gap-2.5 bg-white/95 backdrop-blur-xs py-2 px-3.5 rounded-full shadow-md border border-white/60">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-2xs">
                                    <i data-lucide="smile" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 leading-snug">Lembut & Aman untuk Newborn (0+)</span>
                            </div>
                            <div class="flex items-center gap-2.5 bg-white/95 backdrop-blur-xs py-2 px-3.5 rounded-full shadow-md border border-white/60">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-amber-500 text-white flex items-center justify-center shrink-0 shadow-2xs">
                                    <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 leading-snug">0% Rasa Lengket & Cepat Meresap</span>
                            </div>
                            <div class="flex items-center gap-2.5 bg-white/95 backdrop-blur-xs py-2 px-3.5 rounded-full shadow-md border border-white/60">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-teal-600 text-white flex items-center justify-center shrink-0 shadow-2xs">
                                    <i data-lucide="moon" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 leading-snug">Redakan Rewel, Tidur Lebih Pulas</span>
                            </div>
                        </div>

                        <!-- Pita Bawah #1 (Signature Tentang Anak) & CTA Buttons -->
                        <div class="pt-2 flex flex-wrap items-center gap-3 max-w-xl">
                            <div class="inline-flex items-center gap-2.5 bg-[#EE4D2D] text-white py-1.5 px-3.5 sm:px-4 rounded-xl shadow-md border border-orange-400/40">
                                <span class="text-base sm:text-lg font-black font-display text-amber-300">#1</span>
                                <div class="text-[10px] sm:text-[11px] font-bold leading-tight">
                                    <span class="block text-white uppercase tracking-wide">Krim Telon Pala Pertama di Indonesia</span>
                                    <span class="text-amber-100 font-normal">BPOM RI • Halal Resmi • Hypoallergenic</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <button type="button" 
                                        @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'"
                                        class="inline-flex items-center gap-1.5 bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold px-4 sm:px-5 py-2 sm:py-2.5 rounded-full shadow-md hover:scale-105 active:scale-95 transition text-xs">
                                    <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                                    <span>Pesan via WA (Hitung Ongkir)</span>
                                </button>
                                <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                                   class="inline-flex items-center gap-1.5 bg-white hover:bg-gray-100 text-[#EE4D2D] font-extrabold px-3.5 sm:px-4 py-2 sm:py-2.5 rounded-full shadow-md hover:scale-105 active:scale-95 transition text-xs">
                                    <i data-lucide="shopping-bag" class="w-3.5 h-3.5"></i>
                                    <span>Beli di Shopee</span>
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- Right Product Mockup Visual (4 cols) -->
                    <div class="lg:col-span-4 hidden lg:flex flex-col justify-center items-center relative">
                        <div class="w-64 h-64 rounded-full bg-emerald-400/20 absolute -z-10 blur-2xl"></div>
                        <img src="<?= BASE_URL ?>assets/images/product-calming-rub.svg" 
                             alt="Baby Calming Rub Cream 50g" 
                             class="h-72 lg:h-84 w-auto object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-500">
                        <span class="mt-2 inline-flex items-center gap-1 text-[11px] font-bold text-white bg-black/40 backdrop-blur-xs px-3 py-1 rounded-full border border-white/20">
                            ⭐ Rp 79.000 (Hemat 20%)
                        </span>
                    </div>

                </div>
            </div>

        </div>

        <!-- ================= SLIDE 2: Rempah Pala Nusantara (Gaya Visual Tentang Anak) ================= -->
        <div x-show="activeSlide === 1"
             x-transition:enter="transition transform ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-x-full"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition transform ease-in duration-400 absolute inset-0"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 -translate-x-full"
             style="display: none;"
             class="w-full h-full relative flex items-center overflow-hidden bg-cover bg-left sm:bg-center"
             style="background-image: url('<?= BASE_URL ?>assets/images/banner-ftl-slide2.jpg');">
            
            <!-- Dark Gradient Vignette Overlay to ensure razor-sharp text contrast -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/50 via-[#3D2514]/85 to-[#21140B]/95 lg:from-black/15 lg:via-[#3D2514]/85 lg:to-[#21140B]/95 pointer-events-none"></div>

            <div class="w-full max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <!-- Left/Center Content (8 cols) -->
                    <div class="lg:col-span-8 space-y-3 sm:space-y-4 text-left">
                        
                        <!-- Top Header Row ala Tentang Anak -->
                        <div class="flex items-center justify-between gap-3 max-w-xl">
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-amber-400 text-amber-950 text-xs font-black shadow-xs tracking-wider">
                                    🍃 KEKAYAAN PALA NUSANTARA
                                </span>
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 text-amber-100 text-xs font-semibold">
                                    Formulasi Tradisi & Sains Modern
                                </span>
                            </div>

                            <div class="hidden sm:inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-md border border-white/25 text-white shadow-xs">
                                <div class="w-5 h-5 rounded-full bg-amber-400 text-amber-950 flex items-center justify-center shrink-0">
                                    <i data-lucide="sparkles" class="w-3 h-3"></i>
                                </div>
                                <span class="text-[11px] font-bold text-amber-200">100% Rempah Murni</span>
                            </div>
                        </div>

                        <!-- Headline Tegas 2 Baris ala Tentang Anak -->
                        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-white font-display tracking-tight leading-tight drop-shadow-sm pt-1">
                            Khasiat Murni Rempah Alami<br>
                            <span class="text-[#FCD34D]">Hangat Lembut, Tidak Panas di Kulit!</span>
                        </h2>

                        <!-- 4 Kapsul Fitur Komposisi (Grid 2x2 ala Tentang Anak) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-2.5 max-w-xl pt-1">
                            <div class="flex items-center gap-2.5 bg-white/95 backdrop-blur-xs py-2 px-3.5 rounded-full shadow-md border border-white/60">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-[#6E4226] text-white flex items-center justify-center shrink-0 shadow-2xs">
                                    <i data-lucide="flower" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 leading-snug">Minyak Atsiri Pala (Myristica)</span>
                            </div>
                            <div class="flex items-center gap-2.5 bg-white/95 backdrop-blur-xs py-2 px-3.5 rounded-full shadow-md border border-white/60">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-amber-500 text-white flex items-center justify-center shrink-0 shadow-2xs">
                                    <i data-lucide="sun" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 leading-snug">Ekstrak Bunga Calendula Alami</span>
                            </div>
                            <div class="flex items-center gap-2.5 bg-white/95 backdrop-blur-xs py-2 px-3.5 rounded-full shadow-md border border-white/60">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-2xs">
                                    <i data-lucide="droplet" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 leading-snug">Pelembap Nabati Kelapa & Chamomile</span>
                            </div>
                            <div class="flex items-center gap-2.5 bg-white/95 backdrop-blur-xs py-2 px-3.5 rounded-full shadow-md border border-white/60">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-rose-600 text-white flex items-center justify-center shrink-0 shadow-2xs">
                                    <i data-lucide="shield-alert" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 leading-snug">Bebas Paraben, Alkohol & SLS/SLES</span>
                            </div>
                        </div>

                        <!-- Pita Bawah #1 (Signature Tentang Anak) & CTA Buttons -->
                        <div class="pt-2 flex flex-wrap items-center gap-3 max-w-xl">
                            <div class="inline-flex items-center gap-2.5 bg-[#6E4226] text-white py-1.5 px-3.5 sm:px-4 rounded-xl shadow-md border border-amber-300/30">
                                <span class="text-base sm:text-lg font-black font-display text-amber-300">100%</span>
                                <div class="text-[10px] sm:text-[11px] font-bold leading-tight">
                                    <span class="block text-white uppercase tracking-wide">Warisan Rempah Asli Indonesia</span>
                                    <span class="text-amber-200 font-normal">Dirancang Khusus Karakter Kulit Bayi Tropis</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <a href="<?= BASE_URL ?>produk.php"
                                   class="inline-flex items-center gap-1.5 bg-amber-400 hover:bg-amber-300 text-amber-950 font-extrabold px-4 sm:px-5 py-2 sm:py-2.5 rounded-full shadow-md hover:scale-105 active:scale-95 transition text-xs">
                                    <span>Pelajari Komposisi</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                </a>
                                <button type="button" 
                                        @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'"
                                        class="inline-flex items-center gap-1.5 bg-white/20 hover:bg-white text-white hover:text-gray-900 border border-white/40 font-extrabold px-3.5 sm:px-4 py-2 sm:py-2.5 rounded-full transition text-xs">
                                    <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                                    <span>Konsultasi WA</span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- Right Ingredients Visual (4 cols) -->
                    <div class="lg:col-span-4 hidden lg:flex justify-center items-center gap-4">
                        <div class="p-3 bg-white/10 backdrop-blur-md rounded-3xl border border-white/20 shadow-2xl flex flex-col items-center">
                            <img src="<?= BASE_URL ?>assets/images/ingredient-nutmeg.svg" class="w-32 h-32 drop-shadow-xl hover:scale-105 transition">
                            <span class="text-xs font-bold text-amber-200 mt-2">Minyak Pala Nusantara</span>
                        </div>
                        <div class="p-3 bg-white/10 backdrop-blur-md rounded-3xl border border-white/20 shadow-2xl flex flex-col items-center">
                            <img src="<?= BASE_URL ?>assets/images/ingredient-calendula.svg" class="w-32 h-32 drop-shadow-xl hover:scale-105 transition">
                            <span class="text-xs font-bold text-amber-200 mt-2">Bunga Calendula</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- ================= SLIDE 3: #frommothertoanother (Gaya Visual Tentang Anak) ================= -->
        <div x-show="activeSlide === 2"
             x-transition:enter="transition transform ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-x-full"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition transform ease-in duration-400 absolute inset-0"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 -translate-x-full"
             style="display: none;"
             class="w-full h-full relative flex items-center overflow-hidden bg-cover bg-left sm:bg-center"
             style="background-image: url('<?= BASE_URL ?>assets/images/banner-ftl-slide3.jpg');">
            
            <!-- Dark Gradient Vignette Overlay to ensure razor-sharp text contrast -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/50 via-[#1C3225]/85 to-[#0E1E15]/95 lg:from-black/15 lg:via-[#1C3225]/85 lg:to-[#0E1E15]/95 pointer-events-none"></div>
            
            <div class="w-full max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <!-- Left/Center Content (8 cols) -->
                    <div class="lg:col-span-8 space-y-3 sm:space-y-4 text-left">
                        
                        <!-- Top Header Row ala Tentang Anak -->
                        <div class="flex items-center justify-between gap-3 max-w-xl">
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-rose-400 text-rose-950 text-xs font-black shadow-xs tracking-wider">
                                    #frommothertoanother 🤱🏻
                                </span>
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 text-rose-100 text-xs font-semibold">
                                    Dibuat Penuh Cinta Kasih
                                </span>
                            </div>

                            <div class="hidden sm:inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-md border border-white/25 text-white shadow-xs">
                                <div class="w-5 h-5 rounded-full bg-rose-500 text-white flex items-center justify-center shrink-0">
                                    <i data-lucide="heart" class="w-3 h-3"></i>
                                </div>
                                <span class="text-[11px] font-bold text-rose-200">Komunitas Ibu Cerdas</span>
                            </div>
                        </div>

                        <!-- Headline Tegas 2 Baris ala Tentang Anak -->
                        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-white font-display tracking-tight leading-tight drop-shadow-sm pt-1">
                            Dari Hati Seorang Ibu,<br>
                            <span class="text-[#FCD34D]">Untuk Seluruh Bunda di Nusantara</span>
                        </h2>

                        <!-- 4 Kapsul Komunitas & Layanan (Grid 2x2 ala Tentang Anak) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-2.5 max-w-xl pt-1">
                            <div class="flex items-center gap-2.5 bg-white/95 backdrop-blur-xs py-2 px-3.5 rounded-full shadow-md border border-white/60">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-rose-600 text-white flex items-center justify-center shrink-0 shadow-2xs">
                                    <i data-lucide="heart-handshake" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 leading-snug">Diciptakan Ibu untuk Para Ibu</span>
                            </div>
                            <div class="flex items-center gap-2.5 bg-white/95 backdrop-blur-xs py-2 px-3.5 rounded-full shadow-md border border-white/60">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-2xs">
                                    <i data-lucide="headphones" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 leading-snug">Konsultasi Bayi Gratis via CS WA</span>
                            </div>
                            <div class="flex items-center gap-2.5 bg-white/95 backdrop-blur-xs py-2 px-3.5 rounded-full shadow-md border border-white/60">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-amber-500 text-white flex items-center justify-center shrink-0 shadow-2xs">
                                    <i data-lucide="truck" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 leading-snug">Pengiriman Aman ke Seluruh RI</span>
                            </div>
                            <div class="flex items-center gap-2.5 bg-white/95 backdrop-blur-xs py-2 px-3.5 rounded-full shadow-md border border-white/60">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-teal-600 text-white flex items-center justify-center shrink-0 shadow-2xs">
                                    <i data-lucide="star" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 leading-snug">Rating 4.9/5 dari 500+ Bunda</span>
                            </div>
                        </div>

                        <!-- Pita Bawah #1 (Signature Tentang Anak) & CTA Buttons -->
                        <div class="pt-2 flex flex-wrap items-center gap-3 max-w-xl">
                            <div class="inline-flex items-center gap-2.5 bg-rose-900/90 text-white py-1.5 px-3.5 sm:px-4 rounded-xl shadow-md border border-rose-400/30">
                                <span class="text-base sm:text-lg font-black font-display text-rose-300">❤️</span>
                                <div class="text-[10px] sm:text-[11px] font-bold leading-tight">
                                    <span class="block text-white uppercase tracking-wide">Dipercaya Ratusan Keluarga Indonesia</span>
                                    <span class="text-rose-100 font-normal">Komitmen Kualitas & Kehangatan Alami Teruji</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <a href="<?= BASE_URL ?>tentang-kami.php"
                                   class="inline-flex items-center gap-1.5 bg-white text-ftl-forest hover:bg-emerald-50 font-extrabold px-4 sm:px-5 py-2 sm:py-2.5 rounded-full shadow-md hover:scale-105 active:scale-95 transition text-xs">
                                    <span>Cerita FTL</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                </a>
                                <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener"
                                   class="inline-flex items-center gap-1.5 bg-white/20 hover:bg-white text-white hover:text-ftl-forest border border-white/40 font-extrabold px-3.5 sm:px-4 py-2 sm:py-2.5 rounded-full transition text-xs">
                                    <i data-lucide="instagram" class="w-3.5 h-3.5"></i>
                                    <span>Instagram</span>
                                </a>
                            </div>
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

    </div>
</section>

<!-- ======================================================= -->
<!-- 2. TRUST BADGES / SERTIFIKASI RESMI                     -->
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
<!-- 3. PRODUK UNGGULAN RESMI (FLAGSHIP SHOWCASE)             -->
<!-- ======================================================= -->
<section id="produk" class="py-16 sm:py-24 bg-gradient-to-b from-ftl-cream to-white border-b border-ftl-sand">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-100 text-ftl-forest text-xs font-bold uppercase tracking-wider mb-3">
                <i data-lucide="sparkles" class="w-3.5 h-3.5 text-emerald-600"></i>
                PRODUK RESMI FOR THE LITTLE
            </span>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-display text-ftl-forest tracking-tight">
                Baby Calming Rub Cream
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

                    <!-- Main Product Image -->
                    <div class="my-8 sm:my-10 relative group">
                        <div class="absolute -inset-4 bg-emerald-200/30 rounded-full blur-2xl group-hover:bg-emerald-300/40 transition duration-500"></div>
                        <img src="<?= BASE_URL ?>assets/images/product-calming-rub.svg" 
                             alt="Baby Calming Rub Cream 50g - For The Little" 
                             class="relative w-52 sm:w-64 h-auto object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-300">
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
                            <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <span class="font-bold block">Pesan Mudah dengan Hitung Ongkir Otomatis</span>
                                <span class="text-emerald-700 text-[11px]">Cukup klik pesan via WA, GPS/kota Anda akan otomatis mendeteksi tarif J&T, JNE, dan SiCepat.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Dual CTAs: WhatsApp + Shopee -->
                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <button type="button" 
                                    @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'"
                                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 px-4 rounded-2xl text-xs sm:text-sm shadow-md hover:shadow-emerald-600/30 transition flex items-center justify-center gap-2 active:scale-95 group cursor-pointer">
                                <i data-lucide="message-circle" class="w-4 h-4 group-hover:scale-110 transition-transform"></i>
                                <span>Pesan via WhatsApp (Hitung Ongkir)</span>
                            </button>
                            <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                               class="w-full bg-[#EE4D2D] hover:bg-[#d73f21] text-white font-bold py-3.5 px-4 rounded-2xl text-xs sm:text-sm shadow-md hover:shadow-orange-600/30 transition flex items-center justify-center gap-2 active:scale-95 text-center group">
                                <i data-lucide="shopping-bag" class="w-4 h-4 group-hover:scale-110 transition-transform"></i>
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
<!-- 4. HERO INGREDIENTS (Pala, Calendula, Chamomile)        -->
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
<!-- 7. TENTANG KAMI: PANDUAN PIJAT ILU & TESTIMONI MOMS     -->
<!-- ======================================================= -->
<section id="tentang" class="py-20 bg-ftl-cream border-t border-ftl-sand">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 space-y-5">
                <span class="text-xs font-bold text-ftl-accent uppercase tracking-widest">
                    #frommothertoanother • Sentuhan Penuh Kasih
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

                <div class="pt-4 flex flex-wrap items-center gap-3">
                    <button type="button" 
                            @click="orderModalOpen = true"
                            class="inline-flex items-center gap-2 bg-ftl-forest hover:bg-emerald-800 text-white font-bold px-6 py-3 rounded-full text-sm shadow-md transition">
                        <span>Coba FTL Calming Rub Hari Ini</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                    <a href="<?= BASE_URL ?>tentang-kami.php" 
                       class="inline-flex items-center gap-1.5 text-sm font-semibold text-ftl-forest hover:underline px-4 py-3">
                        <span>Cerita Lengkap FTL →</span>
                    </a>
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
<!-- TESTIMONI PARA IBU (SLIDER MIRIP "KATA PARA AYBUN")     -->
<!-- ======================================================= -->
<section class="py-20 bg-white border-t border-ftl-sand" 
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
                <button type="button" @click="prevTesti()" class="w-10 h-10 rounded-full border border-gray-200 hover:bg-white text-gray-700 flex items-center justify-center transition">
                    <i data-lucide="chevron-left" class="w-5 h-5"></i>
                </button>
                <button type="button" @click="nextTesti()" class="w-10 h-10 rounded-full border border-gray-200 hover:bg-white text-gray-700 flex items-center justify-center transition">
                    <i data-lucide="chevron-right" class="w-5 h-5"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Review 1 -->
            <div :class="testiIndex === 0 ? 'ring-2 ring-emerald-500 scale-[1.02]' : 'opacity-85'" 
                 class="bg-white p-7 rounded-3xl border border-ftl-sand shadow-sm flex flex-col justify-between transition-all duration-300">
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
                 class="bg-white p-7 rounded-3xl border border-ftl-sand shadow-sm flex flex-col justify-between transition-all duration-300">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-orange-100 text-orange-800">Instagram Review</span>
                    </div>
                    <p class="text-sm text-gray-700 italic leading-relaxed">
                        "Paling suka karena teksturnya CREAM bukan minyak! Jadi ga licin di tangan dan ga ninggalin noda kuning di baju bayi. Aromanya juga enak banget, wangi pala dan chamomile bikin relaks."
                    </p>
                </div>
                <div class="pt-6 border-t border-gray-100 flex items-center gap-3 mt-4">
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
                 class="bg-white p-7 rounded-3xl border border-ftl-sand shadow-sm flex flex-col justify-between transition-all duration-300">
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
<!-- 7. KEMITRAAN RESELLER & PEMESANAN WHATSAPP              -->
<!-- ======================================================= -->
<section id="reseller" class="py-16 bg-gradient-to-tr from-ftl-forest via-ftl-sage to-emerald-900 text-white relative overflow-hidden">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-6">
        <span class="inline-block px-4 py-1 rounded-full bg-white/10 text-emerald-200 text-xs font-bold tracking-wider uppercase border border-emerald-400/20">
            For The Little Indonesia • Peluang Kemitraan
        </span>
        <h2 class="text-3xl sm:text-5xl font-extrabold font-display leading-tight">
            Berikan Kehangatan Penuh Kasih & <br class="hidden sm:inline">
            Tumbuh Bersama Komunitas FTL
        </h2>
        <p class="text-sm sm:text-base text-emerald-100 max-w-xl mx-auto">
            Konsultasikan keluhan si kecil, pesan produk Baby Calming Rub Cream 50g via WhatsApp, atau bergabung menjadi Mitra & Reseller resmi kami dari rumah.
        </p>
        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button type="button" 
                    @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'" 
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-ftl-forest hover:bg-emerald-50 font-bold px-8 py-4 rounded-full shadow-xl hover:scale-105 transition-all text-base">
                <i data-lucide="message-circle" class="w-5 h-5 text-emerald-600"></i>
                <span>Pesan Cepat via WhatsApp</span>
            </button>
            <a href="<?= BASE_URL ?>reseller.php"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 border border-emerald-300/40 hover:bg-white/10 text-white font-semibold px-6 py-4 rounded-full transition-colors text-base">
                <i data-lucide="users" class="w-5 h-5 text-emerald-300"></i>
                <span>Gabung Mitra & Reseller</span>
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
