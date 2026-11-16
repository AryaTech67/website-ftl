<?php
// includes/footer.php
require_once __DIR__ . '/../config.php';
?>

<!-- Footer -->
<footer class="bg-ftl-forest text-white mt-auto pt-16 pb-12 border-t-4 border-ftl-accent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Top Footer Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-white/10">
            
            <!-- Col 1: Brand & Bio (Span 2) -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-emerald-300">
                        <i data-lucide="sprout" class="w-7 h-7"></i>
                    </div>
                    <div>
                        <span class="font-display font-bold text-2xl tracking-tight text-white block">
                            For The Little
                        </span>
                        <span class="text-xs uppercase tracking-widest text-emerald-200 font-medium">
                            Indonesia • Natural BabyCare
                        </span>
                    </div>
                </div>
                
                <p class="text-sm text-emerald-100/90 leading-relaxed max-w-sm">
                    Membawa kembali berkah dan kekayaan alam Nusantara untuk perawatan si kecil. Diformulasikan khusus dengan minyak pala alami, aman untuk bayi baru lahir, dan teruji dermatologis.
                </p>

                <div class="pt-2">
                    <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full bg-white/10 text-emerald-200 border border-emerald-400/20">
                        #frommothertoanother 🤱🏻🍃
                    </span>
                </div>

                <!-- Social Media & Official Store -->
                <div class="flex items-center gap-3 pt-3">
                    <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener" 
                       class="w-10 h-10 rounded-xl bg-[#EE4D2D] flex items-center justify-center hover:bg-[#d73f21] hover:scale-105 transition-all text-white shadow-sm" 
                       title="Shopee Official Store @forthelittle.id">
                        <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                    </a>
                    <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener" 
                       class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-white/20 hover:scale-105 transition-all text-white" 
                       title="Instagram @forthelittle.id">
                        <i data-lucide="instagram" class="w-5 h-5"></i>
                    </a>
                    <a href="<?= TIKTOK_URL ?>" target="_blank" rel="noopener" 
                       class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-white/20 hover:scale-105 transition-all text-white" 
                       title="TikTok @forthelittle.id">
                        <i data-lucide="video" class="w-5 h-5"></i>
                    </a>
                    <a href="https://wa.me/<?= WHATSAPP_NUMBER ?>" target="_blank" rel="noopener" 
                       class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-white/20 hover:scale-105 transition-all text-white" 
                       title="WhatsApp Official">
                        <i data-lucide="message-circle" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <!-- Col 2: Navigasi Cepat -->
            <div>
                <h4 class="font-display font-bold text-base text-white tracking-wide mb-4">
                    Jelajahi
                </h4>
                <ul class="space-y-2.5 text-sm text-emerald-100/80">
                    <li><a href="<?= BASE_URL ?>index.php" class="hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="<?= BASE_URL ?>produk.php" class="hover:text-white transition-colors">Baby Calming Rub Cream</a></li>
                    <li><a href="<?= BASE_URL ?>tentang-kami.php" class="hover:text-white transition-colors">Tentang Kami (#frommother)</a></li>
                    <li><a href="<?= BASE_URL ?>artikel.php" class="hover:text-white transition-colors">Artikel & Tips Parenting</a></li>
                    <li><a href="<?= BASE_URL ?>reseller.php" class="hover:text-white transition-colors">Peluang Mitra & Reseller</a></li>
                </ul>
            </div>

            <!-- Col 3: Edukasi & Manfaat -->
            <div>
                <h4 class="font-display font-bold text-base text-white tracking-wide mb-4">
                    Keunggulan FTL
                </h4>
                <ul class="space-y-2.5 text-sm text-emerald-100/80">
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-400"></i> Minyak Pala Asli Nusantara</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-400"></i> Redakan Perut Kembung & Kolik</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-400"></i> Teruji Dermatologis & BPOM</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-400"></i> Safe for Newborn (0+ Bulan)</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-400"></i> Tekstur Ringan Tanpa Lengket</li>
                </ul>
            </div>

            <!-- Col 4: Layanan Pelanggan -->
            <div>
                <h4 class="font-display font-bold text-base text-white tracking-wide mb-4">
                    Customer Care
                </h4>
                <div class="space-y-3 text-sm text-emerald-100/80">
                    <div class="flex items-start gap-2.5">
                        <i data-lucide="phone-call" class="w-4 h-4 text-emerald-400 mt-1 flex-shrink-0"></i>
                        <div>
                            <span class="block text-xs text-emerald-200">WhatsApp CS:</span>
                            <a href="https://wa.me/<?= WHATSAPP_NUMBER ?>" target="_blank" rel="noopener" class="font-bold text-white hover:underline">
                                <?= WHATSAPP_DISPLAY ?>
                            </a>
                        </div>
                    </div>
                    <div class="flex items-start gap-2.5">
                        <i data-lucide="mail" class="w-4 h-4 text-emerald-400 mt-1 flex-shrink-0"></i>
                        <div>
                            <span class="block text-xs text-emerald-200">Email:</span>
                            <span class="text-white"><?= EMAIL_CONTACT ?></span>
                        </div>
                    </div>
                    <div class="flex items-start gap-2.5">
                        <i data-lucide="clock" class="w-4 h-4 text-emerald-400 mt-1 flex-shrink-0"></i>
                        <div>
                            <span class="block text-xs text-emerald-200">Jam Operasional:</span>
                            <span>Senin - Sabtu: 08.00 - 18.00 WIB</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom Copyright & Badges -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-emerald-200/80">
            <p>
                &copy; <?= date('Y') ?> <strong><?= SITE_NAME ?></strong>. All rights reserved. Bringing Back Indonesia's Nature Blessing 🍃
            </p>
            <div class="flex items-center gap-4 text-xs">
                <span>Terdaftar BPOM & Halal MUI</span>
                <span>•</span>
                <span>Hypoallergenic Tested</span>
            </div>
        </div>

    </div>
</footer>

<!-- Include Order Modal -->
<?php require_once __DIR__ . '/order_modal.php'; ?>

<!-- Floating WhatsApp Widget Button (Bottom-Right) -->
<div class="fixed bottom-6 right-6 z-40 flex items-center gap-3">
    <!-- Tooltip Chat Bubble -->
    <div class="hidden md:flex items-center gap-2 bg-white text-gray-800 px-3.5 py-2 rounded-2xl shadow-xl border border-gray-100 text-xs font-semibold animate-bounce">
        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
        <span>Butuh bantuan / pesan cepat? Chat CS yuk!</span>
    </div>

    <!-- Floating Action Button -->
    <button type="button" 
            @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'" 
            class="w-14 h-14 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300 ring-4 ring-emerald-200/60"
            title="Chat WhatsApp / Pesan Cepat">
        <i data-lucide="message-circle" class="w-7 h-7"></i>
    </button>
</div>

<!-- Initialize Lucide Icons -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        lucide.createIcons();
    });
</script>
</body>
</html>
