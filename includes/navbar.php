<?php
// includes/navbar.php
$is_home = (($current_page ?? '') === 'home');

$nav_items = [
    'home' => [
        'label' => 'Beranda', 
        'url' => $is_home ? '#beranda' : BASE_URL . 'index.php#beranda'
    ],
    'produk' => [
        'label' => 'Produk', 
        'url' => $is_home ? '#produk' : BASE_URL . 'index.php#produk'
    ],
    'artikel' => [
        'label' => 'Artikel Parenting', 
        'url' => $is_home ? '#artikel' : BASE_URL . 'index.php#artikel'
    ],
    'tentang' => [
        'label' => 'Tentang Kami', 
        'url' => $is_home ? '#tentang' : BASE_URL . 'index.php#tentang'
    ],
];
?>

<!-- Main Header (Bersih Seperti Tentang Anak, Layer z-50) -->
<header class="sticky top-0 z-50 bg-white border-b border-gray-100 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-14 sm:h-20 gap-3 sm:gap-6">
            
            <!-- Mobile Hamburger Button di Sisi Kiri (Ultra Smooth 60fps Morphing Icon) -->
            <div class="flex items-center lg:hidden">
                <button type="button" 
                        @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="w-10 h-10 -ml-1.5 rounded-xl flex items-center justify-center text-gray-700 hover:text-ftl-forest hover:bg-gray-100/80 active:scale-90 transition-transform focus:outline-none shrink-0"
                        style="touch-action: manipulation; -webkit-tap-highlight-color: transparent;"
                        aria-label="Menu navigasi">
                    <div class="w-5 h-4 relative flex flex-col justify-between pointer-events-none">
                        <span class="w-full h-0.5 bg-gray-800 rounded-full transition-transform duration-250 ease-out origin-center"
                              :class="mobileMenuOpen ? 'rotate-45 translate-y-[7px]' : ''"></span>
                        <span class="w-full h-0.5 bg-gray-800 rounded-full transition-opacity duration-150 ease-out"
                              :class="mobileMenuOpen ? 'opacity-0' : 'opacity-100'"></span>
                        <span class="w-full h-0.5 bg-gray-800 rounded-full transition-transform duration-250 ease-out origin-center"
                              :class="mobileMenuOpen ? '-rotate-45 -translate-y-[7px]' : ''"></span>
                    </div>
                </button>
            </div>

            <!-- Brand Logo (Centered on Mobile like Tentang Anak, Left-aligned on Desktop) -->
            <div class="flex items-center justify-center lg:justify-start flex-1 lg:flex-initial">
                <a href="<?= BASE_URL ?>index.php" class="flex items-center gap-2 sm:gap-3 group shrink-0">
                    <img src="<?= BASE_URL ?>assets/images/logo-ftl.png?v=<?= filemtime(__DIR__ . '/../assets/images/logo-ftl.png') ?>" 
                         alt="For The Little" 
                         class="w-8 h-8 sm:w-11 sm:h-11 lg:w-12 lg:h-12 object-contain group-hover:scale-105 transition-transform duration-300 shrink-0">
                    <div class="flex flex-col justify-center">
                        <span class="font-display font-extrabold text-[16px] sm:text-xl lg:text-2xl text-ftl-forest tracking-tight leading-none whitespace-nowrap">
                            For The Little
                        </span>
                        <span class="hidden md:block text-[9px] tracking-wider uppercase text-ftl-earth font-semibold mt-1 whitespace-nowrap">
                            Indonesia • Natural BabyCare
                        </span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation Links dengan Garis Indikator Aktif (ScrollSpy) -->
            <nav class="hidden lg:flex items-center gap-5 xl:gap-7 h-16 sm:h-20">
                <?php foreach ($nav_items as $key => $item): ?>
                    <?php $target_id = ($key === 'home') ? 'beranda' : $key; ?>
                    <a href="<?= $item['url'] ?>" 
                       <?= !empty($item['target']) ? 'target="' . $item['target'] . '" rel="noopener"' : '' ?>
                       @click="<?= $is_home ? "\$event.preventDefault(); activeSection = '{$key}'; scrollToTarget('{$target_id}')" : "activeSection = '{$key}'" ?>"
                       class="relative h-full flex items-center px-1 text-sm font-semibold transition-all duration-200 group whitespace-nowrap shrink-0"
                       :class="activeSection === '<?= $key ?>' ? 'text-ftl-forest font-bold' : 'text-gray-600 hover:text-ftl-forest'">
                        
                        <span><?= $item['label'] ?></span>

                        <!-- Garis Indikator Bawah saat Menu Aktif -->
                        <span class="absolute bottom-0 left-0 w-full h-[3.5px] bg-ftl-forest rounded-t-full transition-all duration-300"
                              x-show="activeSection === '<?= $key ?>'"
                              x-transition:enter="transition ease-out duration-200"
                              x-transition:enter-start="opacity-0 scale-x-0"
                              x-transition:enter-end="opacity-100 scale-x-100"
                              x-transition:leave="transition ease-in duration-150"
                              x-transition:leave-start="opacity-100 scale-x-100"
                              x-transition:leave-end="opacity-0 scale-x-0">
                        </span>

                        <!-- Garis Halus Hover saat tidak aktif -->
                        <span class="absolute bottom-0 left-0 w-full h-[2px] bg-ftl-sage/30 rounded-t-full opacity-0 group-hover:opacity-100 transition-opacity duration-200"
                              x-show="activeSection !== '<?= $key ?>'">
                        </span>
                    </a>
                <?php endforeach; ?>
            </nav>

            <!-- Action CTAs (Shopee Resmi + WhatsApp CS) -->
            <div class="flex items-center gap-2 sm:gap-2.5 shrink-0">
                <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                   class="hidden md:inline-flex items-center gap-2 bg-[#EE4D2D] hover:bg-[#d73f21] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-full shadow-xs hover:scale-105 active:scale-95 transition-all whitespace-nowrap">
                    <img src="<?= BASE_URL ?>assets/images/shopee-icon-white.svg" class="w-4 h-4" alt="Shopee">
                    <span>Shopee Resmi</span>
                </a>

                <button type="button" 
                        @click="openOrderModal('pesan', 'calming-rub-50g')" 
                        class="hidden md:inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs sm:text-sm font-bold px-4 sm:px-5 py-2.5 rounded-full shadow-xs hover:scale-105 active:scale-95 transition-all whitespace-nowrap shrink-0 cursor-pointer">
                    <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-4 h-4" alt="WhatsApp">
                    <span>Pesan via WA</span>
                </button>

                <!-- Mobile Quick Shopee Action Icon di Kanan (Seimbang dengan Hamburger di Kiri) -->
                <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener" 
                   class="p-2 -mr-2 text-[#EE4D2D] hover:bg-orange-50 rounded-xl transition lg:hidden shrink-0 flex items-center justify-center" 
                   title="Beli di Shopee Resmi">
                    <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" class="w-6 h-6" alt="Shopee">
                </a>
            </div>

        </div>
    </div>

    <!-- Mobile Backdrop Overlay (Hardware-Accelerated 60/120fps CSS Transition, 0% Stutter) -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition-opacity ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="mobileMenuOpen = false"
         class="fixed inset-0 top-14 sm:top-20 bg-black/40 z-40 lg:hidden transform-gpu"
         style="will-change: opacity; -webkit-transform: translate3d(0,0,0); transform: translate3d(0,0,0); touch-action: none; display: none;">
    </div>

    <!-- Mobile Drawer Menu Panel (Absolute Overlay, 0% Layout Shift, Hardware-Accelerated 60fps) -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition-all ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-3"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition-all ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-3"
         class="absolute top-full left-0 right-0 z-50 lg:hidden border-b border-gray-200/80 bg-white px-4 pt-3 pb-6 shadow-xl max-h-[calc(100vh-3.5rem)] overflow-y-auto transform-gpu"
         style="will-change: transform, opacity; -webkit-transform: translate3d(0,0,0); transform: translate3d(0,0,0); -webkit-overflow-scrolling: touch; display: none;">
        <nav class="flex flex-col space-y-1.5">
            <?php foreach ($nav_items as $key => $item): ?>
                <?php $target_id = ($key === 'home') ? 'beranda' : $key; ?>
                <a href="<?= $item['url'] ?>" 
                   <?= !empty($item['target']) ? 'target="' . $item['target'] . '" rel="noopener"' : '' ?>
                   @click="<?= $is_home ? "\$event.preventDefault(); mobileMenuOpen = false; activeSection = '{$key}'; scrollToTarget('{$target_id}')" : "mobileMenuOpen = false; activeSection = '{$key}'" ?>"
                   style="touch-action: manipulation; -webkit-tap-highlight-color: transparent;"
                   class="mobile-menu-item px-4 py-3 rounded-xl text-sm font-semibold transition-colors flex items-center justify-between active:scale-[0.98]"
                   :class="activeSection === '<?= $key ?>' ? 'bg-emerald-50 text-ftl-forest font-bold border-l-4 border-ftl-forest' : 'text-gray-700 hover:bg-gray-50 active:bg-gray-100'">
                    <span><?= $item['label'] ?></span>
                    <span x-show="activeSection === '<?= $key ?>'" class="w-2 h-2 rounded-full bg-ftl-forest"></span>
                </a>
            <?php endforeach; ?>
            <div class="pt-3 border-t border-gray-100 flex flex-col gap-2">
                <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                   style="touch-action: manipulation; -webkit-tap-highlight-color: transparent;"
                   class="mobile-menu-item w-full flex items-center justify-center gap-2 bg-[#EE4D2D] hover:bg-[#d73f21] active:scale-[0.98] text-white font-bold py-3 px-4 rounded-xl text-sm shadow transition">
                    <img src="<?= BASE_URL ?>assets/images/shopee-icon-white.svg" class="w-4 h-4" alt="Shopee">
                    <span>Beli di Shopee Resmi</span>
                </a>
                <button type="button" 
                        @click="mobileMenuOpen = false; openOrderModal('pesan', 'calming-rub-50g')"
                        style="touch-action: manipulation; -webkit-tap-highlight-color: transparent;"
                        class="mobile-menu-item w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 active:scale-[0.98] text-white font-bold py-3 px-4 rounded-xl text-sm shadow transition cursor-pointer">
                    <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-4 h-4" alt="WhatsApp">
                    <span>Pesan via WhatsApp</span>
                </button>

                <!-- Social Channels Quick Links (Instagram & TikTok Resmi @forthelittle.id) -->
                <div class="pt-2 flex items-center justify-center gap-3">
                    <span class="text-[11px] font-semibold text-gray-400">Media Sosial:</span>
                    <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener"
                       style="touch-action: manipulation; -webkit-tap-highlight-color: transparent;"
                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-pink-50 hover:bg-pink-100 text-pink-700 text-xs font-bold transition active:scale-95"
                       title="Instagram Resmi @forthelittle.id">
                        <svg class="w-3.5 h-3.5 fill-[#E1306C]" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                        <span>Instagram</span>
                    </a>
                    <a href="<?= TIKTOK_URL ?>" target="_blank" rel="noopener"
                       style="touch-action: manipulation; -webkit-tap-highlight-color: transparent;"
                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-900 text-xs font-bold transition active:scale-95"
                       title="TikTok Resmi @forthelittle.id">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                        </svg>
                        <span>TikTok</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>

<script>
/**
 * Smooth Scroll to Target with precise sticky header offset compensation.
 * Guarantees zero layout jumps, perfect headroom below navbar, and handles repeat clicks.
 */
function scrollToTarget(targetId) {
    if (!targetId) return;
    const el = document.getElementById(targetId);
    if (!el) return;
    
    // Header height: 56px on mobile (<640px), 80px on desktop (>=640px)
    const headerHeight = window.innerWidth >= 640 ? 80 : 56;
    const extraPadding = 12; // breathing space
    const targetY = el.getBoundingClientRect().top + window.pageYOffset - (headerHeight + extraPadding);
    
    window.scrollTo({
        top: Math.max(0, targetY),
        behavior: 'smooth'
    });
    
    if (window.history && window.history.pushState) {
        window.history.pushState(null, '', '#' + targetId);
    }
}
</script>
