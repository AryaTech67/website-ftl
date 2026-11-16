<?php
// includes/navbar.php
$nav_items = [
    'home' => ['label' => 'Beranda', 'url' => BASE_URL . 'index.php'],
    'produk' => ['label' => 'Produk', 'url' => BASE_URL . 'produk.php'],
    'artikel' => ['label' => 'Artikel Parenting', 'url' => BASE_URL . 'artikel.php'],
    'tentang' => ['label' => 'Tentang Kami', 'url' => BASE_URL . 'tentang-kami.php'],
    'reseller' => ['label' => 'Kemitraan & Reseller', 'url' => BASE_URL . 'reseller.php'],
];
?>

<!-- Main Header (Bersih Seperti Tentang Anak, 100% Fokus WhatsApp) -->
<header class="sticky top-0 z-40 bg-white border-b border-gray-100 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20">
            
            <!-- Brand Logo -->
            <a href="<?= BASE_URL ?>index.php" class="flex items-center gap-2.5 group">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-ftl-forest to-ftl-sage flex items-center justify-center text-white shadow-xs group-hover:scale-105 transition-transform duration-300">
                    <i data-lucide="sprout" class="w-5 h-5"></i>
                </div>
                <div class="flex flex-col">
                    <span class="font-display font-extrabold text-xl sm:text-2xl text-ftl-forest tracking-tight leading-none">
                        For The Little
                    </span>
                    <span class="text-[9px] tracking-wider uppercase text-ftl-earth font-semibold mt-1">
                        Indonesia • Natural BabyCare
                    </span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden lg:flex items-center gap-8">
                <?php foreach ($nav_items as $key => $item): ?>
                    <a href="<?= $item['url'] ?>" 
                       class="text-sm font-semibold transition-colors duration-200 py-1 <?= ($current_page === $key) ? 'text-ftl-forest font-bold' : 'text-gray-700 hover:text-ftl-forest' ?>">
                        <?= $item['label'] ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <!-- Action CTAs (100% WhatsApp CS) -->
            <div class="flex items-center gap-3">
                <button type="button" 
                        @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'" 
                        class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs sm:text-sm font-bold px-5 py-2.5 rounded-full shadow-xs hover:scale-105 active:scale-95 transition-all">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span>Pesan via WA</span>
                </button>

                <!-- Mobile Hamburger Button -->
                <button type="button" 
                        @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="p-2 rounded-xl text-gray-700 hover:text-ftl-forest hover:bg-gray-100 transition-colors focus:outline-none lg:hidden"
                        aria-label="Toggle menu">
                    <i x-show="!mobileMenuOpen" data-lucide="menu" class="w-6 h-6"></i>
                    <i x-show="mobileMenuOpen" data-lucide="x" class="w-6 h-6" style="display: none;"></i>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="lg:hidden border-b border-gray-100 bg-white px-4 pt-3 pb-6 shadow-xl"
         style="display: none;">
        <nav class="flex flex-col space-y-1.5">
            <?php foreach ($nav_items as $key => $item): ?>
                <a href="<?= $item['url'] ?>" 
                   class="px-4 py-3 rounded-xl text-sm font-semibold transition-colors <?= ($current_page === $key) ? 'bg-ftl-light text-ftl-forest font-bold' : 'text-gray-700 hover:bg-gray-50' ?>">
                    <?= $item['label'] ?>
                </a>
            <?php endforeach; ?>
            <div class="pt-3 border-t border-gray-100 flex flex-col gap-2">
                <button type="button" 
                        @click="mobileMenuOpen = false; orderModalOpen = true"
                        class="w-full flex items-center justify-center gap-2 bg-emerald-600 text-white font-bold py-3 px-4 rounded-xl text-sm shadow">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span>Pesan via WhatsApp</span>
                </button>
            </div>
        </nav>
    </div>
</header>
