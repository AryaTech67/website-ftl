<?php
// includes/navbar.php
$nav_items = [
    'home' => ['label' => 'Beranda', 'url' => BASE_URL . 'index.php'],
    'produk' => ['label' => 'Katalog Produk', 'url' => BASE_URL . 'produk.php'],
    'tentang' => ['label' => 'Tentang Kami', 'url' => BASE_URL . 'tentang-kami.php'],
    'artikel' => ['label' => 'Artikel Parenting', 'url' => BASE_URL . 'artikel.php'],
    'reseller' => ['label' => 'Kemitraan & Reseller', 'url' => BASE_URL . 'reseller.php'],
];
?>

<!-- Top Announcement Bar -->
<div class="bg-ftl-forest text-white text-xs sm:text-sm py-2 px-4">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-1 text-center sm:text-left">
        <div class="flex items-center justify-center gap-2">
            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-ftl-accent text-white">
                🍃 100% Alami
            </span>
            <span>Natural Baby Calming Rub dari Kekayaan Pala Nusantara #frommothertoanother</span>
        </div>
        <div class="hidden md:flex items-center gap-4 text-xs opacity-90">
            <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener" class="hover:text-amber-200 transition-colors flex items-center gap-1">
                <i data-lucide="instagram" class="w-3.5 h-3.5"></i> @forthelittle.id
            </a>
            <span>•</span>
            <a href="https://wa.me/<?= WHATSAPP_NUMBER ?>" target="_blank" rel="noopener" class="hover:text-amber-200 transition-colors flex items-center gap-1">
                <i data-lucide="phone" class="w-3.5 h-3.5"></i> CS WhatsApp
            </a>
        </div>
    </div>
</div>

<!-- Main Sticky Header -->
<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-ftl-sand shadow-sm transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            <!-- Brand Logo -->
            <a href="<?= BASE_URL ?>index.php" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-ftl-forest to-ftl-sage flex items-center justify-center text-white shadow-md group-hover:scale-105 transition-transform duration-300">
                    <i data-lucide="sprout" class="w-6 h-6"></i>
                </div>
                <div class="flex flex-col">
                    <span class="font-display font-bold text-xl sm:text-2xl text-ftl-forest tracking-tight leading-none">
                        For The Little
                    </span>
                    <span class="text-[10px] tracking-wider uppercase text-ftl-earth font-medium mt-1">
                        Indonesia • Natural BabyCare
                    </span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden lg:flex items-center gap-8">
                <?php foreach ($nav_items as $key => $item): ?>
                    <a href="<?= $item['url'] ?>" 
                       class="text-sm font-semibold transition-colors duration-200 relative py-1 <?= ($current_page === $key) ? 'text-ftl-forest font-bold' : 'text-gray-600 hover:text-ftl-forest' ?>">
                        <?= $item['label'] ?>
                        <?php if ($current_page === $key): ?>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-ftl-forest rounded-full"></span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <!-- Action CTAs -->
            <div class="hidden sm:flex items-center gap-3">
                <!-- Shopee link icon -->
                <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener" 
                   class="p-2.5 rounded-full text-orange-600 hover:bg-orange-50 border border-orange-200 transition-colors"
                   title="Beli di Official Shopee">
                    <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                </a>

                <!-- Order via WA Button -->
                <button type="button" 
                        @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'" 
                        class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-full shadow-sm hover:shadow-md hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span>Pesan via WA</span>
                </button>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex items-center gap-2 lg:hidden">
                <button type="button" 
                        @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'"
                        class="sm:hidden p-2 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100"
                        title="Pesan via WA">
                    <i data-lucide="message-circle" class="w-5 h-5"></i>
                </button>
                <button type="button" 
                        @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="p-2 rounded-xl text-gray-700 hover:text-ftl-forest hover:bg-ftl-light transition-colors focus:outline-none"
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
         class="lg:hidden border-b border-ftl-sand bg-white px-4 pt-3 pb-6 shadow-xl"
         style="display: none;">
        <nav class="flex flex-col space-y-2">
            <?php foreach ($nav_items as $key => $item): ?>
                <a href="<?= $item['url'] ?>" 
                   class="px-4 py-3 rounded-xl text-base font-semibold transition-colors <?= ($current_page === $key) ? 'bg-ftl-light text-ftl-forest' : 'text-gray-700 hover:bg-gray-50' ?>">
                    <?= $item['label'] ?>
                </a>
            <?php endforeach; ?>
            <div class="pt-4 border-t border-gray-100 flex flex-col gap-2">
                <button type="button" 
                        @click="mobileMenuOpen = false; orderModalOpen = true"
                        class="w-full flex items-center justify-center gap-2 bg-emerald-600 text-white font-semibold py-3 px-4 rounded-xl shadow">
                    <i data-lucide="message-circle" class="w-5 h-5"></i>
                    <span>Pesan via WhatsApp Langsung</span>
                </button>
                <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener"
                   class="w-full flex items-center justify-center gap-2 border border-orange-500 text-orange-600 font-semibold py-2.5 px-4 rounded-xl hover:bg-orange-50">
                    <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                    <span>Toko Resmi Shopee FTL</span>
                </a>
            </div>
        </nav>
    </div>
</header>
