<?php
// includes/order_modal.php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/shipping_data.php';

// Siapkan database wilayah & ongkir lokal langsung (instant zero-delay load)
$FTL_DESTINATIONS = getShippingDestinations($SHIPPING_DATA);
?>

<!-- Order & WhatsApp Interactive Modal dengan Auto-Deteksi Lokasi GPS, Live Ongkir & Custom Styled Dropdown (Layer z-[60]) -->
<style>
    /* Anti-Zoom iOS Safari & Touch Stabilization */
    #ftl-order-modal-root input,
    #ftl-order-modal-root select,
    #ftl-order-modal-root textarea {
        font-size: 16px !important;
        -webkit-text-size-adjust: 100% !important;
        text-size-adjust: 100% !important;
        touch-action: manipulation;
    }
    @media (max-width: 640px) {
        #ftl-order-modal-root input::placeholder,
        #ftl-order-modal-root textarea::placeholder {
            font-size: 14px;
        }
    }
</style>
<div id="ftl-order-modal-root"
     x-data="orderModal()" 
     x-show="isOpen || (typeof orderModalOpen !== 'undefined' && orderModalOpen)" 
     @open-order-modal.window="openModal($event.detail)"
     @close-order-modal.window="isOpen = false"
     @keydown.escape.window="closeModal()"
     class="fixed inset-0 z-[60] flex flex-col justify-end sm:justify-center sm:items-center overflow-hidden" 
     style="display: none;"
     aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <!-- Backdrop -->
    <div x-show="isOpen || (typeof orderModalOpen !== 'undefined' && orderModalOpen)"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="closeModal()"
         class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity cursor-pointer"></div>

    <!-- Modal Card Container (Bottom Sheet di Mobile, Centered Card di Desktop) -->
    <div x-show="isOpen || (typeof orderModalOpen !== 'undefined' && orderModalOpen)"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-full sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-full sm:translate-y-0 sm:scale-95"
         class="relative z-10 flex flex-col rounded-t-[32px] sm:rounded-3xl bg-white text-left shadow-2xl transition-all w-full max-w-lg border-t sm:border border-ftl-sand overflow-hidden"
         style="max-height: 82dvh; max-height: calc(100dvh - 3.5rem);">
            
            <!-- Modal Header dengan Tab Navigasi (Sticky Top) -->
            <div class="bg-gradient-to-r from-ftl-forest to-ftl-sage p-4 sm:p-5 text-white relative shrink-0">
                <button type="button" @click="closeModal()" 
                        class="absolute top-3 right-3 sm:top-4 sm:right-4 z-30 w-10 h-10 flex items-center justify-center text-white/90 hover:text-white bg-black/25 hover:bg-black/40 rounded-full transition-all cursor-pointer active:scale-90 no-tap-zoom"
                        style="touch-action: manipulation;"
                        aria-label="Tutup modal">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
                <div class="flex items-center gap-2 text-[11px] font-semibold text-emerald-200 uppercase tracking-wider mb-1">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Layanan WhatsApp Resmi FTL
                </div>
                <h3 class="text-xl sm:text-2xl font-bold font-display leading-tight" id="modal-title">
                    <span x-show="modalTab === 'konsultasi'">Konsultasi Bunda & Si Kecil 👶🍃</span>
                    <span x-show="modalTab === 'pesan'">Form Pemesanan & Ongkir 🛍️</span>
                </h3>
                <p class="text-xs text-emerald-100 mt-1">
                    <span x-show="modalTab === 'konsultasi'">Bebas tanya seputar kolik, newborn, atau cara pakai tanpa harus beli.</span>
                    <span x-show="modalTab === 'pesan'">Hitung ongkir otomatis lalu kirim rincian order ke WhatsApp CS.</span>
                </p>

                <!-- 2-Tab Switcher -->
                <div class="flex items-center p-1 bg-black/25 rounded-2xl mt-3.5 border border-white/15">
                    <button type="button" 
                            @click="modalTab = 'konsultasi'" 
                            :class="modalTab === 'konsultasi' ? 'bg-white text-ftl-forest font-bold shadow-sm' : 'text-white/80 hover:text-white font-medium'"
                            class="flex-1 py-2 text-xs sm:text-sm rounded-xl transition flex items-center justify-center gap-1.5 cursor-pointer no-tap-zoom"
                            style="touch-action: manipulation;">
                        <img src="<?= BASE_URL ?>assets/images/whatsapp-icon.svg" class="w-4 h-4" alt="WhatsApp" x-show="modalTab === 'konsultasi'">
                        <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-4 h-4" alt="WhatsApp" x-show="modalTab !== 'konsultasi'">
                        <span>Tanya-Tanya Dulu</span>
                    </button>
                    <button type="button" 
                            @click="modalTab = 'pesan'" 
                            :class="modalTab === 'pesan' ? 'bg-white text-ftl-forest font-bold shadow-sm' : 'text-white/80 hover:text-white font-medium'"
                            class="flex-1 py-2 text-xs sm:text-sm rounded-xl transition flex items-center justify-center gap-1.5 cursor-pointer no-tap-zoom"
                            style="touch-action: manipulation;">
                        <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                        <span>Mau Pesan Produk</span>
                    </button>
                </div>
            </div>

            <!-- ================= TAB 1: FORM KONSULTASI BUNDA (Scrollable Body) ================= -->
            <div x-show="modalTab === 'konsultasi'" class="p-4 sm:p-5 space-y-4 flex-1 overflow-y-auto overscroll-contain pb-28 sm:pb-5" style="-webkit-overflow-scrolling: touch;">
                
                <!-- Info Banner Ramah -->
                <div class="p-3.5 bg-emerald-50/90 rounded-2xl border border-emerald-200/80 flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center shrink-0 text-emerald-700 mt-0.5">
                        <i data-lucide="heart" class="w-4 h-4"></i>
                    </div>
                    <div class="text-xs text-emerald-950 space-y-0.5 leading-relaxed">
                        <p class="font-bold">Bebas Tanya Dulu Tanpa Beban Beli! 🍃</p>
                        <p class="text-gray-600">Bunda ingin konsultasikan keluhan kembung, ruam, atau cara aman merawat si kecil? Tim kami siap mendampingi Bunda secara gratis via WhatsApp.</p>
                    </div>
                </div>

                <!-- Pilihan Topik Cepat -->
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider flex items-center justify-between">
                        <span>Pilih Topik Pertanyaan:</span>
                        <span class="text-[10px] text-emerald-700 font-semibold lowercase">ketuk untuk memilih</span>
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        <button type="button" 
                                @click="selectTopic('Aman untuk newborn (0+) & kulit sensitif?', 'Halo min, mau tanya apakah aman digunakan untuk newborn dan kulit yang sensitif/ada riwayat eksim?')"
                                :class="consultTopic === 'Aman untuk newborn (0+) & kulit sensitif?' ? 'bg-emerald-50 border-emerald-600 text-emerald-950 font-bold ring-2 ring-emerald-500/25 shadow-xs' : 'bg-gray-50/80 border-gray-200 text-gray-700 hover:bg-gray-100'"
                                class="min-h-[50px] p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2.5 cursor-pointer active:scale-[0.98] no-tap-zoom"
                                style="touch-action: manipulation;">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <span class="text-lg shrink-0">🍃</span>
                                <span class="text-xs sm:text-sm leading-tight">Aman newborn / eksim?</span>
                            </div>
                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors"
                                 :class="consultTopic === 'Aman untuk newborn (0+) & kulit sensitif?' ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                                <span class="w-2 h-2 rounded-full bg-white" x-show="consultTopic === 'Aman untuk newborn (0+) & kulit sensitif?'"></span>
                            </div>
                        </button>
                        <button type="button" 
                                @click="selectTopic('Cara pijat ILU & aturan pakai kembung/kolik', 'Halo min, mohon panduan cara pijat ILU dan dosis pemakaian Calming Rub saat si kecil kembung/kolik ya.')"
                                :class="consultTopic === 'Cara pijat ILU & aturan pakai kembung/kolik' ? 'bg-emerald-50 border-emerald-600 text-emerald-950 font-bold ring-2 ring-emerald-500/25 shadow-xs' : 'bg-gray-50/80 border-gray-200 text-gray-700 hover:bg-gray-100'"
                                class="min-h-[50px] p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2.5 cursor-pointer active:scale-[0.98] no-tap-zoom"
                                style="touch-action: manipulation;">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <span class="text-lg shrink-0">👶</span>
                                <span class="text-xs sm:text-sm leading-tight">Cara pakai kembung & kolik</span>
                            </div>
                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors"
                                 :class="consultTopic === 'Cara pijat ILU & aturan pakai kembung/kolik' ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                                <span class="w-2 h-2 rounded-full bg-white" x-show="consultTopic === 'Cara pijat ILU & aturan pakai kembung/kolik'"></span>
                            </div>
                        </button>
                        <button type="button" 
                                @click="selectTopic('Komposisi Biji Pala Nusantara & Calendula', 'Halo min, mau tanya detail kandungan biji pala dan ekstrak calendula di dalamnya, apakah halal dan ber-BPOM?')"
                                :class="consultTopic === 'Komposisi Biji Pala Nusantara & Calendula' ? 'bg-emerald-50 border-emerald-600 text-emerald-950 font-bold ring-2 ring-emerald-500/25 shadow-xs' : 'bg-gray-50/80 border-gray-200 text-gray-700 hover:bg-gray-100'"
                                class="min-h-[50px] p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2.5 cursor-pointer active:scale-[0.98] no-tap-zoom"
                                style="touch-action: manipulation;">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <span class="text-lg shrink-0">🌿</span>
                                <span class="text-xs sm:text-sm leading-tight">Komposisi & keaslian produk</span>
                            </div>
                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors"
                                 :class="consultTopic === 'Komposisi Biji Pala Nusantara & Calendula' ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                                <span class="w-2 h-2 rounded-full bg-white" x-show="consultTopic === 'Komposisi Biji Pala Nusantara & Calendula'"></span>
                            </div>
                        </button>
                        <button type="button" 
                                @click="selectTopic('Pertanyaan lainnya seputar si kecil', '')"
                                :class="consultTopic === 'Pertanyaan lainnya seputar si kecil' ? 'bg-emerald-50 border-emerald-600 text-emerald-950 font-bold ring-2 ring-emerald-500/25 shadow-xs' : 'bg-gray-50/80 border-gray-200 text-gray-700 hover:bg-gray-100'"
                                class="min-h-[50px] p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2.5 cursor-pointer active:scale-[0.98] no-tap-zoom"
                                style="touch-action: manipulation;">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <span class="text-lg shrink-0">💬</span>
                                <span class="text-xs sm:text-sm leading-tight">Pertanyaan lainnya</span>
                            </div>
                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors"
                                 :class="consultTopic === 'Pertanyaan lainnya seputar si kecil' ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                                <span class="w-2 h-2 rounded-full bg-white" x-show="consultTopic === 'Pertanyaan lainnya seputar si kecil'"></span>
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Input Nama & Usia Bayi (Opsional) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                            Nama Bunda / Ayah (Opsional):
                        </label>
                        <input type="text" x-model="consultName" placeholder="Misal: Bunda Dian" 
                               class="w-full rounded-xl border border-gray-300 px-3.5 py-2.5 text-base sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 bg-white">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                            Usia Si Kecil (Opsional):
                        </label>
                        <input type="text" x-model="consultBabyAge" placeholder="Misal: 2 Bulan / Newborn" 
                               class="w-full rounded-xl border border-gray-300 px-3.5 py-2.5 text-base sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 bg-white">
                    </div>
                </div>

                <!-- Input Detail Pertanyaan -->
                <div>
                    <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                        Pesan / Pertanyaan Spesifik Bunda:
                    </label>
                    <textarea x-model="consultCustomQuestion" rows="3" 
                              placeholder="Tuliskan keluhan atau pertanyaan Bunda secara bebas di sini..." 
                              class="w-full rounded-xl border border-gray-300 p-3 text-base sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 bg-white leading-relaxed"></textarea>
                </div>
            </div>

            <!-- ================= TAB 2: FORM PEMESANAN & ONGKIR (Scrollable Body) ================= -->
            <div x-show="modalTab === 'pesan'" class="p-4 sm:p-5 space-y-4 flex-1 overflow-y-auto overscroll-contain pb-28 sm:pb-5" style="-webkit-overflow-scrolling: touch;">
                
                <!-- 1. PILIH PRODUK & JUMLAH -->
                <div id="field-product-selection" class="space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                            1. Pilih Produk yang Ingin Dipesan: <span class="text-rose-500">*</span>
                        </label>
                        <span class="text-[10px] text-emerald-700 font-semibold uppercase tracking-wider">100% Original FTL</span>
                    </div>

                    <!-- Panduan / Warning jika belum memilih produk -->
                    <div x-show="!product && !errors.product" class="text-xs text-amber-800 bg-amber-50 border border-amber-200 px-3.5 py-2 rounded-xl flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4 text-amber-600 shrink-0"></i>
                        <span>Silakan ketuk salah satu pilihan paket produk di bawah untuk memilih:</span>
                    </div>
                    <div x-show="errors.product" class="text-xs font-bold text-rose-700 bg-rose-50 border border-rose-300 px-3.5 py-2 rounded-xl flex items-center gap-2 animate-pulse">
                        <i data-lucide="alert-circle" class="w-4 h-4 text-rose-600 shrink-0"></i>
                        <span x-text="errors.product"></span>
                    </div>

                    <!-- Pilihan Produk Interaktif (Kartu Produk Fleksibel) -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                        <template x-for="(item, key) in productsList" :key="key">
                            <div @click="product = key; delete errors.product; errorMessage = ''; if(city) calculateOngkir();" 
                                 :class="product === key ? 'border-emerald-600 bg-emerald-50/70 ring-2 ring-emerald-500/25 shadow-xs' : 'border-gray-200 bg-white hover:bg-gray-50/80'"
                                 class="p-2.5 rounded-2xl border text-left transition-all flex sm:flex-col items-center sm:items-start gap-2.5 cursor-pointer relative active:scale-[0.98] no-tap-zoom"
                                 style="touch-action: manipulation;">
                                <!-- Radio indicator dot -->
                                <div class="absolute top-2.5 right-2.5 w-4 h-4 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors"
                                     :class="product === key ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white" x-show="product === key"></span>
                                </div>
                                
                                <!-- Product packshot image -->
                                <div class="w-14 h-14 sm:w-full sm:h-18 rounded-xl bg-white p-1.5 flex items-center justify-center shrink-0 border border-gray-100 shadow-2xs">
                                    <img :src="'<?= BASE_URL ?>' + item.image" :alt="item.name" class="h-full w-auto object-contain">
                                </div>
                                
                                <!-- Product details -->
                                <div class="min-w-0 flex-1 pr-6 sm:pr-0">
                                    <span class="inline-block text-[9px] font-bold px-2 py-0.5 rounded-full border mb-1 truncate max-w-full"
                                          :class="item.badgeClass" x-text="item.badge"></span>
                                    <h5 class="font-bold text-xs text-gray-900 leading-snug line-clamp-1" x-text="item.name"></h5>
                                    <div class="flex items-baseline gap-1 mt-0.5">
                                        <span class="text-xs font-extrabold text-ftl-forest whitespace-nowrap" x-text="formatRp(item.price)"></span>
                                        <span x-show="item.originalPrice && item.originalPrice > item.price" class="text-[10px] text-gray-400 line-through whitespace-nowrap" x-text="formatRp(item.originalPrice)"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Quantity Stepper & Price (Anti Double-Tap Zoom) -->
                    <div class="flex items-center justify-between bg-ftl-light p-3.5 rounded-2xl border border-emerald-100">
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-700 font-bold">Jumlah Pesanan:</span>
                            <div class="flex items-center gap-3 mt-1.5">
                                <button type="button" 
                                        @click="if (qty > 1) { qty--; if(city) calculateOngkir(); }" 
                                        class="w-9 h-9 rounded-xl bg-white border border-gray-300 text-gray-800 flex items-center justify-center font-bold text-lg hover:bg-gray-100 active:scale-90 transition shadow-2xs cursor-pointer select-none no-tap-zoom"
                                        style="touch-action: manipulation; user-select: none; -webkit-user-select: none;"
                                        aria-label="Kurangi jumlah">
                                    -
                                </button>
                                <span class="font-display font-extrabold text-base sm:text-lg w-8 text-center text-gray-900 select-none" x-text="qty"></span>
                                <button type="button" 
                                        @click="qty++; if(city) calculateOngkir();" 
                                        class="w-9 h-9 rounded-xl bg-white border border-gray-300 text-gray-800 flex items-center justify-center font-bold text-lg hover:bg-gray-100 active:scale-90 transition shadow-2xs cursor-pointer select-none no-tap-zoom"
                                        style="touch-action: manipulation; user-select: none; -webkit-user-select: none;"
                                        aria-label="Tambah jumlah">
                                    +
                                </button>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-[11px] text-gray-500">Subtotal Produk:</span>
                            <div class="text-base sm:text-lg font-extrabold text-ftl-forest whitespace-nowrap" x-text="product ? formatRp(subtotal) : 'Pilih produk dulu'"></div>
                            <span class="text-[10px] text-emerald-700 font-semibold" x-text="product ? ('Estimasi Berat: ' + totalWeight + 'g') : ''"></span>
                        </div>
                    </div>
                </div>

                <!-- 2. DATA PENERIMA -->
                <div id="field-receiver" class="space-y-3 pt-2 border-t border-gray-100">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                        2. Data Penerima
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 items-start">
                        <div id="field-name">
                            <label class="block text-[11px] font-semibold text-gray-700 mb-1">
                                Nama Bunda / Ayah <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" x-model="name" 
                                   @input="delete errors.name; errorMessage = '';"
                                   placeholder="Contoh: Bunda Rina / Ayah Dimas" 
                                   class="w-full rounded-xl border px-3.5 py-3 text-base sm:text-sm focus:outline-none focus:ring-2 bg-white transition-colors"
                                   :class="errors.name ? 'border-rose-500 ring-2 ring-rose-200 bg-rose-50/20' : 'border-gray-300 focus:border-ftl-forest focus:ring-emerald-200'">
                            <span x-show="errors.name" class="text-xs font-bold text-rose-600 flex items-center gap-1 mt-1">
                                <i data-lucide="alert-circle" class="w-3.5 h-3.5 shrink-0"></i>
                                <span x-text="errors.name"></span>
                            </span>
                        </div>
                        <div id="field-phone">
                            <label class="block text-[11px] font-semibold text-gray-700 mb-1">
                                No. WhatsApp Aktif <span class="text-rose-500">*</span>
                            </label>
                            <input type="tel" x-model="phone" 
                                   @input="delete errors.phone; errorMessage = '';"
                                   placeholder="Contoh: 081234567890" 
                                   class="w-full rounded-xl border px-3.5 py-3 text-base sm:text-sm focus:outline-none focus:ring-2 bg-white transition-colors"
                                   :class="errors.phone ? 'border-rose-500 ring-2 ring-rose-200 bg-rose-50/20' : 'border-gray-300 focus:border-ftl-forest focus:ring-emerald-200'">
                            <span x-show="errors.phone" class="text-xs font-bold text-rose-600 flex items-center gap-1 mt-1">
                                <i data-lucide="alert-circle" class="w-3.5 h-3.5 shrink-0"></i>
                                <span x-text="errors.phone"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- 3. LOKASI PENGIRIMAN DENGAN SEARCH & CEK ONGKIR PRESISI -->
                <div id="field-shipping-location" class="space-y-3 pt-2 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                            3. Lokasi Pengiriman & Cek Ongkir <span class="text-rose-500">*</span>
                        </label>
                        <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60">
                            Kirim dari: Jakarta
                        </span>
                    </div>

                    <!-- Error Lokasi -->
                    <div x-show="errors.city" class="text-xs font-bold text-rose-700 bg-rose-50 border border-rose-300 px-3.5 py-2 rounded-xl flex items-center gap-2">
                        <i data-lucide="alert-circle" class="w-4 h-4 text-rose-600 shrink-0"></i>
                        <span x-text="errors.city"></span>
                    </div>

                    <!-- STATE A: KOTA SUDAH TERPILIH (Tampilan Super Bersih, Presisi & Rapi) -->
                    <div x-show="city" class="bg-emerald-50/90 border border-emerald-300 rounded-2xl p-3 sm:p-3.5 flex items-center justify-between shadow-2xs">
                        <div class="flex items-center gap-2.5 min-w-0">
                            <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                            </div>
                            <div class="min-w-0">
                                <span class="text-xs sm:text-sm font-bold text-emerald-950 block truncate" x-text="city + ', ' + province"></span>
                                <span class="text-[10px] text-emerald-700 block font-medium">Tujuan Terpilih • Ongkir Siap Dihitung</span>
                            </div>
                        </div>
                        <button type="button" 
                                @click="city = ''; province = ''; searchQuery = ''; couriers = []; selectedCourier = null;" 
                                class="shrink-0 ml-2 px-3 py-1.5 rounded-xl bg-white border border-emerald-300 text-emerald-800 font-bold text-xs hover:bg-emerald-100 transition shadow-2xs cursor-pointer no-tap-zoom"
                                style="touch-action: manipulation;">
                            Ganti Kota
                        </button>
                    </div>

                    <!-- STATE B: KOTA BELUM TERPILIH (Pencarian Cerdas & Presisi) -->
                    <div x-show="!city" class="space-y-2">
                        <label class="block text-[11px] font-semibold text-gray-700">
                            Kota Tujuan Pengiriman <span class="text-rose-500">*</span>:
                        </label>

                        <!-- SEARCH INPUT WITH AUTOCOMPLETE -->
                        <div class="space-y-2">
                            <div class="relative">
                                <input type="text" 
                                       x-model="searchQuery" 
                                       @input="showSuggestions = true; delete errors.city; errorMessage = '';"
                                       @focus="if(searchQuery.length >= 2) showSuggestions = true"
                                       placeholder="Ketik nama kota (misal: Depok, Bandung, Surabaya)..." 
                                       class="w-full rounded-xl border border-gray-300 pl-9 pr-8 py-3 text-base sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 bg-white">
                                <i data-lucide="search" class="w-4 h-4 text-gray-400 absolute left-3 top-3.5"></i>
                                <button type="button" 
                                        x-show="searchQuery" 
                                        @click="searchQuery = ''; showSuggestions = false;" 
                                        class="absolute right-2.5 top-3.5 text-gray-400 hover:text-gray-600 cursor-pointer no-tap-zoom"
                                        style="touch-action: manipulation;"
                                        aria-label="Hapus teks">
                                    <i data-lucide="x" class="w-4 h-4"></i>
                                </button>
                            </div>

                            <!-- Live Suggestion Dropdown Cepat -->
                            <div x-show="showSuggestions && filteredCities.length > 0" 
                                 @click.away="showSuggestions = false"
                                 class="relative z-40 max-h-56 overflow-y-auto bg-white rounded-2xl shadow-xl border border-emerald-200 divide-y divide-gray-100 text-xs sm:text-sm">
                                <template x-for="item in filteredCities" :key="item.full">
                                    <div @click="selectCityFromSearch(item)" 
                                         class="px-4 py-2.5 hover:bg-emerald-50 cursor-pointer flex items-center justify-between transition-colors">
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="map-pin" class="w-3.5 h-3.5 text-emerald-600 shrink-0"></i>
                                            <span class="font-bold text-gray-900" x-text="item.city"></span>
                                        </div>
                                        <span class="text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full text-[10px] font-semibold" x-text="item.province"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Lengkap & Patokan Rumah -->
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-700 mb-1">
                            Alamat Jalan & Patokan Rumah <span class="text-gray-400 font-normal">(Opsional)</span>:
                        </label>
                        <input type="text" x-model="address" placeholder="Contoh: Jl. Mawar No. 8, RT 02/04, Kel. Sukajadi (Depan Klinik)" 
                               class="w-full rounded-xl border border-gray-300 px-3.5 py-3 text-base sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 bg-white">
                    </div>

                    <!-- PILIHAN EKSPEDISI (TERDETEKSI OTOMATIS) -->
                    <div x-show="loadingOngkir" class="py-3 text-center text-xs text-gray-500 flex items-center justify-center gap-2">
                        <div class="w-4 h-4 border-2 border-emerald-600 border-t-transparent rounded-full animate-spin"></div>
                        <span>Menghubungkan & mendeteksi ongkir otomatis...</span>
                    </div>

                    <div id="field-couriers" x-show="couriers.length > 0 && !loadingOngkir" class="space-y-2 pt-1">
                        <div class="flex items-center justify-between">
                            <span class="block text-[11px] font-bold text-gray-700 uppercase tracking-wider">
                                Ekspedisi Terdeteksi:
                            </span>
                            <span class="text-[10px] text-emerald-700 font-semibold bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">
                                <span x-text="couriers.length + ' Opsi Pengiriman Tersedia'"></span>
                            </span>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2.5">
                            <template x-for="c in couriers" :key="c.code">
                                <div @click="selectedCourier = c; delete errors.courier; errorMessage = '';"
                                     :class="selectedCourier && selectedCourier.code === c.code ? 'border-emerald-600 bg-emerald-50/70 ring-2 ring-emerald-500/25 shadow-xs' : 'border-gray-200 hover:border-gray-300 bg-white'"
                                     class="p-3 rounded-2xl border cursor-pointer transition-all flex flex-col justify-between text-left relative active:scale-[0.98] no-tap-zoom"
                                     style="touch-action: manipulation;">
                                    <div>
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-xs font-extrabold text-gray-900" x-text="c.name"></span>
                                            <div class="w-4 h-4 rounded-full border-2 flex items-center justify-center"
                                                 :class="selectedCourier && selectedCourier.code === c.code ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300'">
                                                <div x-show="selectedCourier && selectedCourier.code === c.code" class="w-1.5 h-1.5 bg-white rounded-full"></div>
                                            </div>
                                        </div>
                                        <span class="text-[10px] text-gray-500 block leading-tight" x-text="c.service"></span>
                                        <span class="text-[10px] text-emerald-700 font-semibold block mt-0.5" x-text="'Est. ' + c.etd"></span>
                                    </div>
                                    <div class="pt-2 mt-2 border-t border-gray-100 flex items-baseline justify-between">
                                        <span class="text-xs font-extrabold text-ftl-forest whitespace-nowrap" x-text="c.cost_formatted"></span>
                                        <span class="text-[9px] font-bold text-emerald-700" x-text="c.badge"></span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div x-show="!city && !loadingOngkir" class="bg-gray-50 p-3.5 rounded-2xl text-center border border-dashed border-gray-200">
                        <p class="text-xs text-gray-500">
                            Ketik & pilih <b>Kota Tujuan</b> di atas untuk langsung menampilkan tarif ongkir <b>J&T, JNE, dan SiCepat</b>.
                        </p>
                    </div>
                </div>

                <!-- 4. TOTAL RINGKASAN PEMBAYARAN -->
                <div x-show="selectedCourier && product" class="bg-emerald-50/70 p-4 rounded-2xl border border-emerald-200 space-y-1.5 text-xs text-gray-700">
                    <div class="flex justify-between">
                        <span>Subtotal Produk (<span x-text="qty"></span> pcs):</span>
                        <span class="font-bold text-gray-900 whitespace-nowrap" x-text="formatRp(subtotal)"></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Ongkir (<span x-text="selectedCourier ? selectedCourier.name : ''"></span>):</span>
                        <span class="font-bold text-gray-900 whitespace-nowrap" x-text="formatRp(shippingCost)"></span>
                    </div>
                    <div class="pt-2 border-t border-emerald-200 flex justify-between items-baseline font-display">
                        <span class="font-extrabold text-sm text-gray-900">Total Tagihan Transfer:</span>
                        <span class="text-lg font-extrabold text-ftl-forest whitespace-nowrap" x-text="formatRp(grandTotal)"></span>
                    </div>
                </div>

                <!-- Catatan Tambahan (Opsional) -->
                <div>
                    <label class="block text-[11px] font-semibold text-gray-700 mb-1">
                        Catatan Khusus <span class="text-gray-400 font-normal">(Opsional)</span>:
                    </label>
                    <input type="text" x-model="note" placeholder="Contoh: Titip kartu ucapan kado lahiran / Tolong dipacking ekstra aman" 
                           class="w-full rounded-xl border border-gray-300 px-3.5 py-3 text-base sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 bg-white">
                </div>

                <!-- 5. METODE PEMBAYARAN RESMI & JAMINAN -->
                <div class="bg-gray-50/80 p-3 sm:p-3.5 rounded-2xl border border-gray-200 space-y-2.5">
                    <div class="flex items-center justify-between">
                        <span class="text-[11px] font-bold text-gray-700 flex items-center gap-1.5">
                            <i data-lucide="credit-card" class="w-3.5 h-3.5 text-emerald-700"></i>
                            <span>Pilih Rekening Transfer:</span>
                        </span>
                        <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-100/80 px-2 py-0.5 rounded-full">
                            Bebas Biaya Admin
                        </span>
                    </div>
                    <div class="grid grid-cols-4 gap-2">
                        <!-- BNI -->
                        <button type="button" 
                                @click="selectedBank = 'BNI'"
                                :class="selectedBank === 'BNI' ? 'border-emerald-600 bg-emerald-50/80 ring-2 ring-emerald-500/25 shadow-xs' : 'border-gray-200 bg-white hover:border-gray-300'"
                                class="px-2 py-2 rounded-xl border flex items-center justify-center h-11 transition-all cursor-pointer relative active:scale-95 no-tap-zoom"
                                style="touch-action: manipulation;"
                                title="Bank BNI">
                            <img src="<?= BASE_URL ?>assets/images/bank-bni.svg?v=2026" alt="BNI" class="h-4 sm:h-5 max-h-5 w-auto max-w-full object-contain">
                            <div x-show="selectedBank === 'BNI'" class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-600 text-white rounded-full flex items-center justify-center shadow-xs">
                                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                        </button>

                        <!-- SeaBank -->
                        <button type="button" 
                                @click="selectedBank = 'SeaBank'"
                                :class="selectedBank === 'SeaBank' ? 'border-emerald-600 bg-emerald-50/80 ring-2 ring-emerald-500/25 shadow-xs' : 'border-gray-200 bg-white hover:border-gray-300'"
                                class="px-2 py-2 rounded-xl border flex items-center justify-center h-11 transition-all cursor-pointer relative active:scale-95 no-tap-zoom"
                                style="touch-action: manipulation;"
                                title="SeaBank">
                            <img src="<?= BASE_URL ?>assets/images/bank-seabank.svg?v=2026" alt="SeaBank" class="h-4 sm:h-5 max-h-5 w-auto max-w-full object-contain">
                            <div x-show="selectedBank === 'SeaBank'" class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-600 text-white rounded-full flex items-center justify-center shadow-xs">
                                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                        </button>

                        <!-- BSI -->
                        <button type="button" 
                                @click="selectedBank = 'BSI'"
                                :class="selectedBank === 'BSI' ? 'border-emerald-600 bg-emerald-50/80 ring-2 ring-emerald-500/25 shadow-xs' : 'border-gray-200 bg-white hover:border-gray-300'"
                                class="px-2 py-2 rounded-xl border flex items-center justify-center h-11 transition-all cursor-pointer relative active:scale-95 no-tap-zoom"
                                style="touch-action: manipulation;"
                                title="Bank Syariah Indonesia (BSI)">
                            <img src="<?= BASE_URL ?>assets/images/bank-bsi.svg?v=2026" alt="BSI" class="h-4 sm:h-5 max-h-5 w-auto max-w-full object-contain">
                            <div x-show="selectedBank === 'BSI'" class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-600 text-white rounded-full flex items-center justify-center shadow-xs">
                                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                        </button>

                        <!-- PermataBank -->
                        <button type="button" 
                                @click="selectedBank = 'PermataBank'"
                                :class="selectedBank === 'PermataBank' ? 'border-emerald-600 bg-emerald-50/80 ring-2 ring-emerald-500/25 shadow-xs' : 'border-gray-200 bg-white hover:border-gray-300'"
                                class="px-2 py-2 rounded-xl border flex items-center justify-center h-11 transition-all cursor-pointer relative active:scale-95 no-tap-zoom"
                                style="touch-action: manipulation;"
                                title="PermataBank">
                            <img src="<?= BASE_URL ?>assets/images/bank-permata.svg?v=2026" alt="Permata" class="h-4 sm:h-5 max-h-5 w-auto max-w-full object-contain">
                            <div x-show="selectedBank === 'PermataBank'" class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-600 text-white rounded-full flex items-center justify-center shadow-xs">
                                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                        </button>
                    </div>

                    <div x-show="selectedBank" class="text-[10px] text-emerald-800 font-semibold flex items-center gap-1.5 px-0.5">
                        <i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-600 shrink-0"></i>
                        <span>Dipilih: Transfer Bank <b x-text="selectedBank"></b></span>
                    </div>
                    <div x-show="!selectedBank" class="text-[10px] text-gray-500 font-medium flex items-center gap-1.5 px-0.5">
                        <i data-lucide="info" class="w-3.5 h-3.5 text-gray-400 shrink-0"></i>
                        <span>Pilih salah satu bank tujuan transfer di atas</span>
                    </div>

                    <div class="pt-2 border-t border-gray-200/80 flex flex-wrap items-center justify-between gap-2 text-[10px] text-gray-500 font-medium">
                        <span class="flex items-center gap-1"><i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-600"></i> 100% Original BPOM</span>
                        <span class="flex items-center gap-1"><i data-lucide="package-check" class="w-3.5 h-3.5 text-emerald-600"></i> Free Bubble Wrap & Dus</span>
                        <span class="flex items-center gap-1"><i data-lucide="rotate-ccw" class="w-3.5 h-3.5 text-emerald-600"></i> Garansi Ganti Baru</span>
                    </div>
                </div>

                <!-- 8. PINTU ALTERNATIF SHOPEE OFFICIAL -->
                <div class="flex items-center justify-between p-3 rounded-2xl bg-orange-50/70 border border-orange-200 text-xs">
                    <div class="flex items-center gap-2.5 min-w-0">
                        <img src="<?= BASE_URL ?>assets/images/shopee-icon-orange.svg" alt="Shopee" class="w-6 h-6 shrink-0">
                        <div class="min-w-0">
                            <p class="font-bold text-gray-900 text-[11px] truncate">Mau Checkout via Marketplace Shopee?</p>
                            <p class="text-[10px] text-gray-600 truncate">Bisa klaim Voucher Gratis Ongkir & opsi Bayar di Tempat (COD)</p>
                        </div>
                    </div>
                    <a href="<?= SHOPEE_URL ?>" target="_blank" rel="noopener noreferrer" 
                       class="shrink-0 ml-2 px-3 py-1.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-[11px] flex items-center gap-1 shadow-2xs transition-all active:scale-95 no-tap-zoom"
                       style="touch-action: manipulation;">
                        <span>Ke Shopee</span>
                        <i data-lucide="external-link" class="w-3 h-3"></i>
                    </a>
                </div>

            </div>

            <!-- ================= MODAL FOOTER (Sticky Bottom - 100% Kelihatan di iPhone & Android) ================= -->
            <div class="bg-white/98 backdrop-blur-md px-4 sm:px-6 pt-2.5 sm:pt-3 border-t border-gray-200 shrink-0 shadow-lg z-30"
                 style="padding-bottom: max(16px, env(safe-area-inset-bottom, 16px));">
                <!-- Banner Notifikasi Error -->
                <div x-show="errorMessage" 
                     x-transition 
                     class="p-2 mb-2 bg-rose-50 border border-rose-300 text-rose-800 rounded-xl text-xs font-bold flex items-center gap-2">
                    <i data-lucide="alert-circle" class="w-4 h-4 text-rose-600 shrink-0"></i>
                    <span x-text="errorMessage"></span>
                </div>

                <div class="flex items-center justify-between gap-2.5">
                    <div x-show="modalTab === 'pesan'" class="min-w-0 pr-1">
                        <span class="text-[10px] text-gray-500 uppercase font-bold block leading-tight">Total Tagihan:</span>
                        <span class="text-base sm:text-lg font-extrabold text-ftl-forest truncate block whitespace-nowrap" 
                              x-text="product ? formatRp(grandTotal) : 'Pilih produk'"></span>
                    </div>
                    <div class="flex items-center gap-2 ml-auto shrink-0">
                        <button type="button" 
                                @click="closeModal()"
                                class="px-3.5 py-2.5 sm:px-4 sm:py-3 rounded-xl border border-gray-300 bg-white text-xs sm:text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors cursor-pointer active:scale-95 no-tap-zoom"
                                style="touch-action: manipulation;">
                            Batal
                        </button>
                        <button type="button" 
                                x-show="modalTab === 'pesan'"
                                @click="submitToWhatsApp()" 
                                class="inline-flex justify-center items-center gap-1.5 sm:gap-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 px-4 sm:px-6 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-white shadow-md active:scale-95 transition-all cursor-pointer no-tap-zoom whitespace-nowrap"
                                style="touch-action: manipulation;">
                            <i data-lucide="send" class="w-4 h-4"></i>
                            <span>Kirim ke WhatsApp</span>
                        </button>
                        <button type="button" 
                                x-show="modalTab === 'konsultasi'"
                                @click="sendConsultationWA()" 
                                class="inline-flex justify-center items-center gap-1.5 sm:gap-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 px-4 sm:px-6 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-white shadow-md active:scale-95 transition-all cursor-pointer no-tap-zoom whitespace-nowrap"
                                style="touch-action: manipulation;">
                            <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-4 h-4" alt="WA">
                            <span>Mulai Konsultasi</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

<script>
// Database Wilayah & Ongkir Terintegrasi Langsung (Embedded Zero-Delay Data)
window.FTL_EMBEDDED_DESTINATIONS = <?= json_encode($FTL_DESTINATIONS, JSON_UNESCAPED_UNICODE) ?>;
window.FTL_EMBEDDED_SHIPPING_RATES = <?= json_encode($SHIPPING_DATA, JSON_UNESCAPED_UNICODE) ?>;

/**
 * Order Modal Alpine Component Definition
 * Handles: Consultations, Product Selection, Styled Dropdown, Geolocation GPS & Live Shipping calculation.
 */
function orderModal() {
    return {
        isOpen: false,
        modalTab: 'pesan', // 'konsultasi' | 'pesan'
        consultName: '',
        consultBabyAge: '',
        consultTopic: 'Aman untuk newborn (0+) & kulit sensitif?',
        consultCustomQuestion: '',
        product: '', // DEFAULT KOSONG: User bebas memilih sendiri tanpa dipaksa lock produk
        qty: 1,
        name: '',
        phone: '',
        province: '',
        city: '',
        address: '',
        note: '',
        errors: {},
        errorMessage: '',
        openProvDropdown: false,
        searchProvQuery: '',
        openCityDropdown: false,
        searchCityQuery: '',
        destinations: window.FTL_EMBEDDED_DESTINATIONS || [],
        cityList: [],
        couriers: [],
        selectedCourier: null,
        loadingOngkir: false,
        searchQuery: '',
        showSuggestions: false,
        selectedBank: '',
        locationMode: 'search',
        productsList: {
            'calming-rub-50g': { 
                id: 'calming-rub-50g',
                name: 'Baby Calming Rub Cream 50g', 
                desc: 'Single Tube (1x 50g) + Free Gift',
                price: 117999, 
                originalPrice: 299000,
                badge: '🎁 Free Gift Keychain',
                badgeClass: 'bg-rose-50 text-rose-800 border-rose-200/80',
                weight: 100,
                image: 'assets/images/product-calming-rub-real.webp'
            },
            'bundling-double-care': { 
                id: 'bundling-double-care',
                name: 'Bundle Double Care (2x 50g)', 
                desc: 'Paket 2 Tube Bunda (2x 50g)',
                price: 229999, 
                originalPrice: 598000,
                badge: '🔥 Hemat 61%',
                badgeClass: 'bg-amber-50 text-amber-800 border-amber-200/80',
                weight: 200,
                image: 'assets/images/product-bundle-2-real.webp'
            },
            'bundling-newborn-gift': { 
                id: 'bundling-newborn-gift',
                name: 'Bundle Triple Care (3x 50g)', 
                desc: 'Paket Hemat 3 Tube (Stok 3 Bulan)',
                price: 344999, 
                originalPrice: 897000,
                badge: '🌟 Super Hemat 61%',
                badgeClass: 'bg-emerald-50 text-emerald-800 border-emerald-200/80',
                weight: 300,
                image: 'assets/images/product-bundle-3-real.webp'
            }
        },
        get currentProduct() {
            return (this.product && this.productsList[this.product]) ? this.productsList[this.product] : null;
        },
        get currentPrice() {
            return this.currentProduct ? this.currentProduct.price : 0;
        },
        get currentName() {
            return this.currentProduct ? this.currentProduct.name : 'Belum memilih produk';
        },
        get totalWeight() {
            return this.currentProduct ? (this.currentProduct.weight * this.qty) : 100;
        },
        get subtotal() {
            return this.currentPrice * this.qty;
        },
        get shippingCost() {
            return this.selectedCourier ? this.selectedCourier.cost : 0;
        },
        get grandTotal() {
            return this.subtotal + this.shippingCost;
        },
        get allCitiesList() {
            let list = [];
            if (!this.destinations) return [];
            this.destinations.forEach(d => {
                if (d.cities && Array.isArray(d.cities)) {
                    d.cities.forEach(c => {
                        list.push({ city: c, province: d.province, full: c + ', ' + d.province });
                    });
                }
            });
            return list;
        },
        get filteredCities() {
            if (!this.searchQuery || this.searchQuery.trim().length < 2) return [];
            const q = this.searchQuery.toLowerCase().trim();
            return this.allCitiesList.filter(item => 
                item.city.toLowerCase().includes(q) || item.province.toLowerCase().includes(q)
            ).slice(0, 6);
        },
        get filteredProvincesList() {
            if (!this.searchProvQuery || !this.searchProvQuery.trim()) {
                return this.destinations;
            }
            const q = this.searchProvQuery.toLowerCase().trim();
            return this.destinations.filter(d => d.province.toLowerCase().includes(q));
        },
        get filteredCitiesOfProvince() {
            if (!this.searchCityQuery || !this.searchCityQuery.trim()) {
                return this.cityList;
            }
            const q = this.searchCityQuery.toLowerCase().trim();
            return this.cityList.filter(c => c.toLowerCase().includes(q));
        },
        formatRp(val) {
            return 'Rp ' + Number(val || 0).toLocaleString('id-ID');
        },
        init() {
            if (window.FTL_EMBEDDED_DESTINATIONS && window.FTL_EMBEDDED_DESTINATIONS.length > 0) {
                this.destinations = window.FTL_EMBEDDED_DESTINATIONS;
            } else {
                this.initDestinations();
            }

            // Restore modal jika pengguna me-refresh saat berada di halaman/form pesan WA
            try {
                const saved = sessionStorage.getItem('ftl_order_modal');
                if (saved) {
                    const parsed = JSON.parse(saved);
                    if (parsed && parsed.open) {
                        setTimeout(() => {
                            this.openModal({ tab: parsed.tab || 'pesan', product: parsed.product || '' });
                        }, 80);
                    }
                }
            } catch(e) {}

            this.$watch('modalTab', () => this.saveModalState());
            this.$watch('product', () => this.saveModalState());
        },
        saveModalState() {
            try {
                if (this.isOpen) {
                    sessionStorage.setItem('ftl_order_modal', JSON.stringify({
                        open: true,
                        tab: this.modalTab,
                        product: this.product
                    }));
                } else {
                    sessionStorage.removeItem('ftl_order_modal');
                }
            } catch(e) {}
        },
        openModal(detail) {
            this.isOpen = true;
            try { document.body.style.overflow = 'hidden'; } catch(e) {}
            this.errors = {};
            this.errorMessage = '';
            if (detail && detail.tab) this.modalTab = detail.tab;
            if (detail && detail.product && this.productsList[detail.product]) {
                this.product = detail.product;
                if (this.city) this.calculateOngkir();
            } else if (detail && detail.product === '') {
                this.product = '';
            }
            this.saveModalState();
            setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 50);
        },
        closeModal() {
            this.isOpen = false;
            try { document.body.style.overflow = ''; } catch(e) {}
            this.openProvDropdown = false;
            this.openCityDropdown = false;
            this.errors = {};
            this.errorMessage = '';
            this.saveModalState();
            try {
                if (typeof orderModalOpen !== 'undefined') {
                    orderModalOpen = false;
                }
            } catch(e) {}
            try {
                if (document.body && document.body._x_dataStack && document.body._x_dataStack[0]) {
                    document.body._x_dataStack[0].orderModalOpen = false;
                }
            } catch(e) {}
        },
        selectTopic(topic, defaultText = '') {
            this.consultTopic = topic;
            if (defaultText && !this.consultCustomQuestion.trim()) {
                this.consultCustomQuestion = defaultText;
            }
        },
        async initDestinations() {
            if (this.destinations.length > 0) return;
            try {
                const res = await fetch('<?= BASE_URL ?>api/ongkir.php?action=destinations');
                const data = await res.json();
                if (data.status === 'success') {
                    this.destinations = data.data;
                }
            } catch (e) {
                console.error('Gagal memuat tujuan ongkir', e);
            }
        },
        selectProvince(provName) {
            this.province = provName;
            this.openProvDropdown = false;
            this.city = '';
            this.openCityDropdown = true;
            this.searchProvQuery = '';
            this.searchCityQuery = '';
            delete this.errors.city;
            this.errorMessage = '';
            const found = this.destinations.find(d => d.province === provName);
            this.cityList = found ? found.cities : [];
            this.couriers = [];
            this.selectedCourier = null;
            setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 30);
        },
        selectCity(cityName) {
            this.city = cityName;
            this.searchQuery = cityName;
            this.showSuggestions = false;
            this.openCityDropdown = false;
            this.searchCityQuery = '';
            delete this.errors.city;
            this.errorMessage = '';
            this.calculateOngkir();
            setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 30);
        },
        selectCityFromSearch(item) {
            this.province = item.province;
            this.city = item.city;
            this.searchQuery = item.city;
            this.showSuggestions = false;
            delete this.errors.city;
            this.errorMessage = '';
            const found = this.destinations.find(d => d.province === item.province);
            this.cityList = found ? found.cities : [];
            this.calculateOngkir();
            setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 30);
        },
        async calculateOngkir() {
            if (!this.city || !this.province) return;
            this.loadingOngkir = true;
            this.couriers = [];
            this.selectedCourier = null;

            // 1. Prioritize Mengantar Live API (Official FTL Account)
            try {
                const url = '<?= BASE_URL ?>api/ongkir.php?action=calculate&province=' + encodeURIComponent(this.province) + '&city=' + encodeURIComponent(this.city) + '&weight=' + this.totalWeight;
                const res = await fetch(url);
                const json = await res.json();
                if (json.status === 'success' && json.couriers && json.couriers.length > 0) {
                    this.couriers = json.couriers;
                    this.selectedCourier = this.couriers[0];
                    delete this.errors.courier;
                    this.loadingOngkir = false;
                    setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 30);
                    return;
                }
            } catch (e) {
                console.warn('Live API request failed, falling back to embedded rates', e);
            }

            // 2. Fallback to Embedded Shipping Rates if offline or API delay
            if (window.FTL_EMBEDDED_SHIPPING_RATES && window.FTL_EMBEDDED_SHIPPING_RATES[this.city]) {
                const rates = window.FTL_EMBEDDED_SHIPPING_RATES[this.city];
                const kg = Math.max(1, Math.ceil(this.totalWeight / 1000));
                
                const jntCost = rates.jnt * kg;
                const jneCost = rates.jne * kg;
                const sicepatCost = rates.sicepat * kg;
                const etd = rates.etd || '1-3 Hari';

                this.couriers = [
                    {
                        code: 'jnt',
                        name: 'J&T Express',
                        badge: 'Terpopuler ⚡',
                        service: 'Layanan EZ (Reguler)',
                        cost: jntCost,
                        cost_formatted: this.formatRp(jntCost),
                        etd: etd,
                        color: 'red'
                    },
                    {
                        code: 'jne',
                        name: 'JNE Express',
                        badge: 'Terpercaya 📦',
                        service: 'Layanan REG (Reguler)',
                        cost: jneCost,
                        cost_formatted: this.formatRp(jneCost),
                        etd: etd,
                        color: 'blue'
                    },
                    {
                        code: 'sicepat',
                        name: 'SiCepat Ekspres',
                        badge: 'Ekonomis 🚀',
                        service: 'Layanan REG (Reguler)',
                        cost: sicepatCost,
                        cost_formatted: this.formatRp(sicepatCost),
                        etd: etd,
                        color: 'amber'
                    }
                ];
                this.selectedCourier = this.couriers[0];
                delete this.errors.courier;
            }

            this.loadingOngkir = false;
            setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 30);
        },
        sendConsultationWA() {
            let lines = [];
            lines.push('Halo Tim For The Little Indonesia 🍃\n');
            if (this.consultName && this.consultName.trim()) {
                lines.push('Perkenalkan, saya *' + this.consultName.trim() + '* ingin konsultasi seputar perawatan si kecil:\n');
            } else {
                lines.push('Saya ingin konsultasi seputar si kecil & produk FTL:\n');
            }
            if (this.consultBabyAge && this.consultBabyAge.trim()) {
                lines.push('• *Usia/Kondisi Si Kecil:* ' + this.consultBabyAge.trim());
            }
            lines.push('• *Topik Pertanyaan:* ' + this.consultTopic);
            if (this.consultCustomQuestion && this.consultCustomQuestion.trim()) {
                lines.push('\n*Detail Pertanyaan / Keluhan:*');
                lines.push('"' + this.consultCustomQuestion.trim() + '"');
            }
            lines.push('\nMohon saran dan penjelasannya ya min. Terima kasih banyak! 🙏');

            const msg = lines.join('\n');
            const url = 'https://wa.me/<?= WHATSAPP_NUMBER ?>?text=' + encodeURIComponent(msg);
            const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
            if (isMobile) {
                window.location.href = url;
            } else {
                window.open(url, '_blank');
            }
            this.closeModal();
        },
        submitToWhatsApp() {
            this.errors = {};
            this.errorMessage = '';
            let firstErrorId = null;

            if (!this.product) {
                this.errors.product = 'Silakan pilih salah satu produk yang ingin dipesan terlebih dahulu ya, Bunda.';
                if (!firstErrorId) firstErrorId = 'field-product-selection';
            }
            if (!this.name || !this.name.trim()) {
                this.errors.name = 'Nama lengkap penerima wajib diisi.';
                if (!firstErrorId) firstErrorId = 'field-name';
            }
            if (!this.phone || !this.phone.trim()) {
                this.errors.phone = 'Nomor WhatsApp aktif wajib diisi.';
                if (!firstErrorId) firstErrorId = 'field-phone';
            }
            if (!this.city || !this.province) {
                this.errors.city = 'Silakan tentukan provinsi & kota tujuan pengiriman.';
                if (!firstErrorId) firstErrorId = 'field-shipping-location';
            }
            if (!this.selectedCourier && this.city && this.province) {
                this.errors.courier = 'Silakan tunggu deteksi ongkir atau pilih kurir ekspedisi.';
                if (!firstErrorId) firstErrorId = 'field-couriers';
            }

            if (Object.keys(this.errors).length > 0) {
                this.errorMessage = 'Mohon lengkapi data wajib yang bertanda merah di atas ya, Bunda.';
                if (firstErrorId) {
                    const el = document.getElementById(firstErrorId);
                    if (el) {
                        el.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
                setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 50);
                return;
            }

            let lines = [];
            lines.push('Halo Admin For The Little Indonesia 🍃');
            lines.push('Saya ingin memesan produk via Website Resmi FTL:\n');
            lines.push('------------------------------------');
            lines.push('*DATA PENERIMA:*');
            lines.push('• Nama: ' + this.name.trim());
            lines.push('• No. WhatsApp: ' + this.phone.trim());
            lines.push('• Tujuan: ' + this.city + ', ' + this.province);
            if (this.address.trim()) {
                lines.push('• Alamat Lengkap: ' + this.address.trim());
            }
            lines.push('\n*RINCIAN PRODUK:*');
            lines.push('• ' + this.currentName);
            lines.push('• Jumlah: ' + this.qty + ' pcs (Estimasi ' + this.totalWeight + 'g)');
            lines.push('• Subtotal Produk: ' + this.formatRp(this.subtotal) + '\n');
            lines.push('*EKSPEDISI & ONGKOS KIRIM:*');
            lines.push('• Kurir: ' + this.selectedCourier.name + ' (' + this.selectedCourier.service + ')');
            lines.push('• Estimasi Tiba: ' + this.selectedCourier.etd);
            lines.push('• Biaya Ongkir: ' + this.formatRp(this.shippingCost));
            lines.push('------------------------------------');
            lines.push('*TOTAL PEMBAYARAN: ' + this.formatRp(this.grandTotal) + '*');
            if (this.selectedBank) {
                lines.push('• Metode Bayar: Transfer Bank ' + this.selectedBank + ' (Bebas Admin)');
            } else {
                lines.push('• Metode Bayar: Transfer Bank Resmi (Bebas Admin)');
            }
            lines.push('------------------------------------');
            if (this.note.trim()) {
                lines.push('*Catatan Tambahan:* ' + this.note.trim() + '\n');
            }
            if (this.selectedBank) {
                lines.push('Mohon dicek ya min, untuk pembayaran via transfer *Bank ' + this.selectedBank + '* bisa minta nomor rekening resminya? Terima kasih banyak min! 🙏✨');
            } else {
                lines.push('Mohon dicek ya min, untuk pembayaran via transfer bank resmi bisa minta nomor rekeningnya? Terima kasih banyak min! 🙏✨');
            }

            const msg = lines.join('\n');
            const url = 'https://wa.me/<?= WHATSAPP_NUMBER ?>?text=' + encodeURIComponent(msg);
            const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
            if (isMobile) {
                window.location.href = url;
            } else {
                window.open(url, '_blank');
            }
            this.closeModal();
        }
    };
}

// Global modal trigger helper
window.openOrderModal = function(tab = 'pesan', product = '') {
    window.dispatchEvent(new CustomEvent('open-order-modal', { detail: { tab, product } }));
    try {
        if (document.body && document.body._x_dataStack && document.body._x_dataStack[0]) {
            document.body._x_dataStack[0].orderModalOpen = true;
            document.body._x_dataStack[0].modalTab = tab;
            document.body._x_dataStack[0].selectedProduct = product;
        }
    } catch(e) {}
    try {
        const modalEl = document.getElementById('ftl-order-modal-root');
        if (modalEl && modalEl._x_dataStack && modalEl._x_dataStack[0]) {
            modalEl._x_dataStack[0].openModal({ tab, product });
        }
    } catch(e) {}
};

window.closeOrderModal = function() {
    window.dispatchEvent(new CustomEvent('close-order-modal'));
    try {
        if (document.body && document.body._x_dataStack && document.body._x_dataStack[0]) {
            document.body._x_dataStack[0].orderModalOpen = false;
        }
    } catch(e) {}
    try {
        const modalEl = document.getElementById('ftl-order-modal-root');
        if (modalEl && modalEl._x_dataStack && modalEl._x_dataStack[0]) {
            modalEl._x_dataStack[0].closeModal();
        }
    } catch(e) {}
};
</script>