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
            
            <!-- Brand Logo (Official Logo For The Little) -->
            <a href="<?= BASE_URL ?>index.php" class="flex items-center gap-2.5 sm:gap-3 group shrink-0">
                <img src="<?= BASE_URL ?>assets/images/logo-ftl.png?v=<?= filemtime(__DIR__ . '/../assets/images/logo-ftl.png') ?>" 
                     alt="For The Little" 
                     class="w-9 h-9 sm:w-11 sm:h-11 lg:w-12 lg:h-12 rounded-full object-cover shadow-xs border border-gray-100 group-hover:scale-105 transition-transform duration-300 shrink-0">
                <div class="flex flex-col justify-center">
                    <span class="font-display font-extrabold text-[17px] sm:text-xl lg:text-2xl text-ftl-forest tracking-tight leading-none whitespace-nowrap">
                        For The Little
                    </span>
                    <span class="hidden md:block text-[9px] tracking-wider uppercase text-ftl-earth font-semibold mt-1 whitespace-nowrap">
                        Indonesia • Natural BabyCare
                    </span>
                </div>
            </a>

            <!-- Desktop Navigation Links dengan Garis Indikator Aktif (ScrollSpy) -->
            <nav class="hidden lg:flex items-center gap-5 xl:gap-7 h-16 sm:h-20">
                <?php foreach ($nav_items as $key => $item): ?>
                    <a href="<?= $item['url'] ?>" 
                       <?= !empty($item['target']) ? 'target="' . $item['target'] . '" rel="noopener"' : '' ?>
                       @click="<?= empty($item['target']) ? "activeSection = '{$key}'" : '' ?>"
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
                   class="hidden md:inline-flex items-center gap-1.5 bg-[#EE4D2D] hover:bg-[#d73f21] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-full shadow-xs hover:scale-105 active:scale-95 transition-all whitespace-nowrap">
                    <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                    <span>Shopee Resmi</span>
                </a>

                <button type="button" 
                        @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'" 
                        class="hidden md:inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs sm:text-sm font-bold px-4 sm:px-5 py-2.5 rounded-full shadow-xs hover:scale-105 active:scale-95 transition-all whitespace-nowrap shrink-0">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span>Pesan via WA</span>
                </button>

                <!-- Mobile Hamburger Button (Satu-satunya kontrol di kanan pada layar mobile) -->
                <button type="button" 
                        @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="p-2 rounded-xl text-gray-700 hover:text-ftl-forest hover:bg-gray-100 transition-colors focus:outline-none lg:hidden shrink-0"
                        aria-label="Toggle menu">
                    <i x-show="!mobileMenuOpen" data-lucide="menu" class="w-6 h-6 transition-transform"></i>
                    <i x-show="mobileMenuOpen" data-lucide="x" class="w-6 h-6 transition-transform" style="display: none;"></i>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Backdrop Overlay (GSAP Driven 60fps, No Heavy Blur) -->
    <div id="mobile-menu-backdrop"
         @click="mobileMenuOpen = false"
         class="fixed inset-0 top-14 sm:top-20 bg-black/60 z-40 lg:hidden"
         style="display: none; will-change: opacity;">
    </div>

    <!-- Mobile Drawer Menu Panel (GSAP Driven Smooth Slide & Stagger) -->
    <div id="mobile-menu-drawer"
         class="relative z-50 lg:hidden border-b border-gray-100 bg-white px-4 pt-3 pb-6 shadow-2xl max-h-[calc(100vh-3.5rem)] overflow-y-auto"
         style="display: none; will-change: transform, opacity;">
        <nav class="flex flex-col space-y-1.5">
            <?php foreach ($nav_items as $key => $item): ?>
                <a href="<?= $item['url'] ?>" 
                   <?= !empty($item['target']) ? 'target="' . $item['target'] . '" rel="noopener"' : '' ?>
                   @click="mobileMenuOpen = false; <?= empty($item['target']) ? "activeSection = '{$key}'" : '' ?>"
                   class="mobile-menu-item px-4 py-3 rounded-xl text-sm font-semibold transition-colors flex items-center justify-between"
                   :class="activeSection === '<?= $key ?>' ? 'bg-emerald-50 text-ftl-forest font-bold border-l-4 border-ftl-forest' : 'text-gray-700 hover:bg-gray-50'">
                    <span><?= $item['label'] ?></span>
                    <span x-show="activeSection === '<?= $key ?>'" class="w-2 h-2 rounded-full bg-ftl-forest"></span>
                </a>
            <?php endforeach; ?>
            <div class="pt-3 border-t border-gray-100 flex flex-col gap-2">
                <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                   class="mobile-menu-item w-full flex items-center justify-center gap-2 bg-[#EE4D2D] hover:bg-[#d73f21] text-white font-bold py-3 px-4 rounded-xl text-sm shadow transition">
                    <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                    <span>Beli di Shopee Resmi</span>
                </a>
                <button type="button" 
                        @click="mobileMenuOpen = false; orderModalOpen = true"
                        class="mobile-menu-item w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-4 rounded-xl text-sm shadow transition">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span>Pesan via WhatsApp</span>
                </button>
            </div>
        </nav>
    </div>

    <!-- GSAP Controller for Buttery Smooth Mobile Menu Animation -->
    <script>
    document.addEventListener('alpine:init', () => {
        Alpine.bind('mobileMenuHandler', () => ({
            init() {
                this.$watch('mobileMenuOpen', (isOpen) => {
                    animateMobileMenu(isOpen);
                });
            }
        }));
    });

    function animateMobileMenu(isOpen) {
        const backdrop = document.getElementById('mobile-menu-backdrop');
        const drawer = document.getElementById('mobile-menu-drawer');
        if (!backdrop || !drawer) return;

        const items = drawer.querySelectorAll('.mobile-menu-item');

        if (typeof gsap === 'undefined') {
            // Fallback if GSAP is not loaded
            backdrop.style.display = isOpen ? 'block' : 'none';
            drawer.style.display = isOpen ? 'block' : 'none';
            return;
        }

        if (isOpen) {
            backdrop.style.display = 'block';
            drawer.style.display = 'block';
            gsap.killTweensOf([backdrop, drawer, items]);

            // 1. Smooth Fade-in Backdrop (no heavy backdrop-blur)
            gsap.fromTo(backdrop, 
                { opacity: 0 }, 
                { opacity: 1, duration: 0.28, ease: 'power2.out' }
            );

            // 2. Smooth Slide & Scale-in Drawer
            gsap.fromTo(drawer, 
                { opacity: 0, y: -20, transformOrigin: 'top center' }, 
                { opacity: 1, y: 0, duration: 0.32, ease: 'power3.out' }
            );

            // 3. Staggered Menu Items Animation
            if (items.length) {
                gsap.fromTo(items, 
                    { opacity: 0, y: 10 }, 
                    { opacity: 1, y: 0, duration: 0.22, stagger: 0.04, delay: 0.06, ease: 'power2.out' }
                );
            }
        } else {
            gsap.killTweensOf([backdrop, drawer, items]);

            gsap.to(drawer, { 
                opacity: 0, 
                y: -15, 
                duration: 0.2, 
                ease: 'power2.in',
                onComplete: () => { drawer.style.display = 'none'; }
            });

            gsap.to(backdrop, { 
                opacity: 0, 
                duration: 0.2, 
                ease: 'power2.in',
                onComplete: () => { backdrop.style.display = 'none'; }
            });
        }
    }
    </script>
</header>
