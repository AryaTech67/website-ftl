<?php
// includes/footer.php
require_once __DIR__ . '/../config.php';
?>

<!-- Footer -->
<footer class="bg-ftl-forest text-white mt-auto pt-16 pb-12 border-t border-white/15">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Top Footer Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-white/10">
            
            <!-- Col 1: Brand & Bio (Span 2) -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center gap-3">
                    <img src="<?= BASE_URL ?>assets/images/logo-ftl.png?v=<?= filemtime(__DIR__ . '/../assets/images/logo-ftl.png') ?>" 
                         alt="For The Little" 
                         class="w-12 h-12 rounded-full object-cover shadow-md border border-white/20">
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

                <!-- Social Media & Official Store (Official Brand SVG Logos) -->
                <div class="flex items-center gap-3 pt-3">
                    <!-- 1. Shopee -->
                    <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener" 
                       class="w-10 h-10 rounded-xl bg-[#EE4D2D] flex items-center justify-center hover:bg-[#d73f21] hover:scale-105 transition-all shadow-sm p-2" 
                       title="Shopee Official Store @forthelittle.id">
                        <img src="<?= BASE_URL ?>assets/images/shopee-icon-white.svg" class="w-5 h-5" alt="Shopee">
                    </a>

                    <!-- 2. Instagram -->
                    <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener" 
                       class="w-10 h-10 rounded-xl bg-gradient-to-tr from-[#F58529] via-[#DD2A7B] to-[#8134AF] flex items-center justify-center hover:opacity-90 hover:scale-105 transition-all text-white shadow-sm" 
                       title="Instagram @forthelittle.id">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>

                    <!-- 3. TikTok -->
                    <a href="<?= TIKTOK_URL ?>" target="_blank" rel="noopener" 
                       class="w-10 h-10 rounded-xl bg-black flex items-center justify-center hover:bg-gray-900 hover:scale-105 transition-all text-white shadow-sm" 
                       title="TikTok @forthelittle.id">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                        </svg>
                    </a>

                    <!-- 4. WhatsApp -->
                    <a href="https://wa.me/<?= WHATSAPP_NUMBER ?>" target="_blank" rel="noopener" 
                       class="w-10 h-10 rounded-xl bg-[#25D366] flex items-center justify-center hover:bg-[#1ebd59] hover:scale-105 transition-all text-white shadow-sm" 
                       title="WhatsApp Official">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
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
                    <li><a href="<?= BASE_URL ?>tentang-kami.php" class="hover:text-white transition-colors">Tentang Kami</a></li>
                    <li><a href="<?= BASE_URL ?>artikel.php" class="hover:text-white transition-colors">Artikel & Tips Parenting</a></li>
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
                        <div class="space-y-0.5">
                            <span class="block text-xs text-emerald-200">Jam Operasional:</span>
                            <span class="block text-white font-medium text-xs sm:text-sm">Senin - Jumat: 09.00 - 17.00 WIB</span>
                            <span class="block text-emerald-100/90 text-xs">Sabtu: 09.00 - 15.00 WIB</span>
                            <span class="block text-emerald-200/60 text-[11px]">Minggu & Tanggal Merah: Libur</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom Copyright & Badges (Diberi padding ekstra agar tidak tertimpa floating WA) -->
        <div class="pt-8 pb-12 sm:pb-0 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-emerald-200/80 md:pr-24 lg:pr-28">
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

<!-- Floating WhatsApp Widget Button (Bottom-Right, Layer z-30 & disembunyikan saat mobileMenuOpen) -->
<div class="fixed bottom-6 right-6 z-30 flex items-center gap-3"
     x-show="!mobileMenuOpen"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 scale-90"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-90">
    <!-- Tooltip Chat Bubble -->
    <div class="hidden md:flex items-center gap-2 bg-white text-gray-800 px-3.5 py-2 rounded-2xl shadow-xl border border-gray-100 text-xs font-semibold animate-bounce">
        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
        <span>Butuh bantuan / pesan cepat? Chat CS yuk!</span>
    </div>

    <!-- Floating Action Button -->
    <button type="button" 
            @click="orderModalOpen = true; selectedProduct = 'calming-rub-50g'" 
            class="w-14 h-14 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300 ring-4 ring-emerald-200/60"
            title="Konsultasi WhatsApp / Pesan Cepat">
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
