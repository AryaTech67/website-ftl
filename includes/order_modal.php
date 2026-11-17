<?php
// includes/order_modal.php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/shipping_data.php';

// Siapkan database wilayah & ongkir lokal langsung (instant zero-delay load)
$FTL_DESTINATIONS = getShippingDestinations($SHIPPING_DATA);
?>

<!-- Order & WhatsApp Interactive Modal dengan Auto-Deteksi Lokasi GPS, Live Ongkir & Custom Styled Dropdown (Layer z-[60]) -->
<div id="ftl-order-modal-root"
     x-data="orderModal()" 
     x-show="isOpen || (typeof orderModalOpen !== 'undefined' && orderModalOpen)" 
     @open-order-modal.window="openModal($event.detail)"
     @close-order-modal.window="isOpen = false"
     @keydown.escape.window="closeModal()"
     class="fixed inset-0 z-[60] overflow-y-auto" 
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

    <div class="flex min-h-full items-center justify-center p-3 sm:p-4 text-center">
        <div x-show="isOpen || (typeof orderModalOpen !== 'undefined' && orderModalOpen)"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all my-6 sm:my-8 w-full max-w-lg border border-ftl-sand">
            
            <!-- Modal Header dengan Tab Navigasi -->
            <div class="bg-gradient-to-r from-ftl-forest to-ftl-sage p-5 sm:p-6 text-white relative">
                <button type="button" @click="closeModal()" 
                        class="absolute top-3 right-3 sm:top-4 sm:right-4 z-30 w-11 h-11 flex items-center justify-center text-white/90 hover:text-white bg-black/25 hover:bg-black/40 rounded-full transition-all cursor-pointer active:scale-90"
                        aria-label="Tutup modal">
                    <i data-lucide="x" class="w-6 h-6"></i>
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
                <div class="flex items-center p-1 bg-black/25 rounded-2xl mt-4 border border-white/15">
                    <button type="button" 
                            @click="modalTab = 'konsultasi'" 
                            :class="modalTab === 'konsultasi' ? 'bg-white text-ftl-forest font-bold shadow-sm' : 'text-white/80 hover:text-white font-medium'"
                            class="flex-1 py-2.5 text-xs sm:text-sm rounded-xl transition flex items-center justify-center gap-1.5 cursor-pointer">
                        <img src="<?= BASE_URL ?>assets/images/whatsapp-icon.svg" class="w-4 h-4" alt="WhatsApp" x-show="modalTab === 'konsultasi'">
                        <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-4 h-4" alt="WhatsApp" x-show="modalTab !== 'konsultasi'">
                        <span>Tanya-Tanya Dulu</span>
                    </button>
                    <button type="button" 
                            @click="modalTab = 'pesan'" 
                            :class="modalTab === 'pesan' ? 'bg-white text-ftl-forest font-bold shadow-sm' : 'text-white/80 hover:text-white font-medium'"
                            class="flex-1 py-2.5 text-xs sm:text-sm rounded-xl transition flex items-center justify-center gap-1.5 cursor-pointer">
                        <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                        <span>Mau Pesan Produk</span>
                    </button>
                </div>
            </div>

            <!-- ================= TAB 1: FORM KONSULTASI BUNDA ================= -->
            <div x-show="modalTab === 'konsultasi'" class="p-5 sm:p-6 space-y-4 max-h-[72vh] overflow-y-auto">
                
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
                                class="min-h-[52px] p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2.5 cursor-pointer active:scale-[0.98]">
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
                                class="min-h-[52px] p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2.5 cursor-pointer active:scale-[0.98]">
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
                                @click="selectTopic('Komposisi Minyak Pala Nusantara & Calendula', 'Halo min, mau tanya detail kandungan minyak pala dan ekstrak calendula di dalamnya, apakah halal dan ber-BPOM?')"
                                :class="consultTopic === 'Komposisi Minyak Pala Nusantara & Calendula' ? 'bg-emerald-50 border-emerald-600 text-emerald-950 font-bold ring-2 ring-emerald-500/25 shadow-xs' : 'bg-gray-50/80 border-gray-200 text-gray-700 hover:bg-gray-100'"
                                class="min-h-[52px] p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2.5 cursor-pointer active:scale-[0.98]">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <span class="text-lg shrink-0">🌿</span>
                                <span class="text-xs sm:text-sm leading-tight">Komposisi & keaslian produk</span>
                            </div>
                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors"
                                 :class="consultTopic === 'Komposisi Minyak Pala Nusantara & Calendula' ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                                <span class="w-2 h-2 rounded-full bg-white" x-show="consultTopic === 'Komposisi Minyak Pala Nusantara & Calendula'"></span>
                            </div>
                        </button>
                        <button type="button" 
                                @click="selectTopic('Pertanyaan lainnya seputar si kecil', '')"
                                :class="consultTopic === 'Pertanyaan lainnya seputar si kecil' ? 'bg-emerald-50 border-emerald-600 text-emerald-950 font-bold ring-2 ring-emerald-500/25 shadow-xs' : 'bg-gray-50/80 border-gray-200 text-gray-700 hover:bg-gray-100'"
                                class="min-h-[52px] p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2.5 cursor-pointer active:scale-[0.98]">
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

                <!-- Input Nama & Usia Bayi (Text-base 16px to prevent iOS Safari auto-zoom) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Nama Bunda (Opsional)</label>
                        <input type="text" 
                               x-model="consultName"
                               placeholder="Contoh: Bunda Sarah" 
                               class="w-full text-base sm:text-sm p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Usia / Kondisi Si Kecil</label>
                        <input type="text" 
                               x-model="consultBabyAge"
                               placeholder="Contoh: Newborn 2 minggu / 8 bulan" 
                               class="w-full text-base sm:text-sm p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-white">
                    </div>
                </div>

                <!-- Detail Pertanyaan -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Pertanyaan atau Keluhan Bunda:</label>
                    <textarea x-model="consultCustomQuestion"
                              rows="3"
                              placeholder="Tuliskan pertanyaan Bunda di sini... (Contoh: Apakah krim ini boleh dioleskan ke dada saat si kecil pilek/batuk?)"
                              class="w-full text-base sm:text-sm p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-white"></textarea>
                </div>

                <!-- Tombol Submit Konsultasi WA -->
                <div class="pt-2">
                    <button type="button" 
                            @click="sendConsultationWA()"
                            class="w-full py-4 px-5 rounded-2xl bg-emerald-600 hover:bg-emerald-700 active:scale-[0.98] text-white font-bold text-sm sm:text-base shadow-lg shadow-emerald-950/20 flex items-center justify-center gap-2.5 transition-all cursor-pointer">
                        <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-5 h-5 shrink-0" alt="WhatsApp">
                        <span>Mulai Chat Konsultasi via WhatsApp</span>
                    </button>
                    <p class="text-[11px] text-gray-400 text-center mt-2">
                        Tim admin FTL aktif setiap hari kerja (09.00 - 17.00 WIB) untuk merespons pertanyaan Bunda.
                    </p>
                </div>

            </div>

            <!-- ================= TAB 2: FORM PEMESANAN & CEK ONGKIR ================= -->
            <div x-show="modalTab === 'pesan'" class="p-5 sm:p-6 space-y-4 max-h-[72vh] overflow-y-auto">
                
                <!-- 1. PILIH PRODUK & JUMLAH -->
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                            1. Pilih Produk yang Ingin Dipesan:
                        </label>
                        <span class="text-[10px] text-emerald-700 font-semibold uppercase tracking-wider">100% Original FTL</span>
                    </div>

                    <!-- Pilihan Produk Interaktif (Kartu Produk Fleksibel) -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                        <template x-for="(item, key) in productsList" :key="key">
                            <div @click="product = key; if(city) calculateOngkir();" 
                                 :class="product === key ? 'border-emerald-600 bg-emerald-50/70 ring-2 ring-emerald-500/25 shadow-xs' : 'border-gray-200 bg-white hover:bg-gray-50/80'"
                                 class="p-2.5 rounded-2xl border text-left transition-all flex sm:flex-col items-center sm:items-start gap-2.5 cursor-pointer relative active:scale-[0.98]">
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
                                        <span class="text-xs font-extrabold text-ftl-forest" x-text="formatRp(item.price)"></span>
                                        <span class="text-[10px] text-gray-400 line-through" x-text="formatRp(item.originalPrice)"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Quantity Stepper & Price -->
                    <div class="flex items-center justify-between bg-ftl-light p-3.5 rounded-2xl border border-emerald-100">
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-700 font-bold">Jumlah Pesanan:</span>
                            <div class="flex items-center gap-3 mt-1.5">
                                <button type="button" 
                                        @click="if (qty > 1) { qty--; if(city) calculateOngkir(); }" 
                                        class="w-9 h-9 rounded-xl bg-white border border-gray-300 text-gray-800 flex items-center justify-center font-bold text-lg hover:bg-gray-100 active:scale-90 transition shadow-2xs cursor-pointer select-none">
                                    -
                                </button>
                                <span class="font-display font-extrabold text-base sm:text-lg w-8 text-center text-gray-900" x-text="qty"></span>
                                <button type="button" 
                                        @click="qty++; if(city) calculateOngkir();" 
                                        class="w-9 h-9 rounded-xl bg-white border border-gray-300 text-gray-800 flex items-center justify-center font-bold text-lg hover:bg-gray-100 active:scale-90 transition shadow-2xs cursor-pointer select-none">
                                    +
                                </button>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-[11px] text-gray-500">Subtotal Produk:</span>
                            <div class="text-base sm:text-lg font-extrabold text-ftl-forest" x-text="formatRp(subtotal)"></div>
                            <span class="text-[10px] text-emerald-700 font-semibold" x-text="'Estimasi Berat: ' + totalWeight + 'g'"></span>
                        </div>
                    </div>
                </div>

                <!-- 2. DATA PENERIMA -->
                <div class="space-y-3 pt-2 border-t border-gray-100">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                        2. Data Penerima
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                                Nama Bunda / Ayah *
                            </label>
                            <input type="text" x-model="name" placeholder="Misal: Bunda Rina" 
                                   class="w-full rounded-xl border border-gray-300 px-3.5 py-3 text-base sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 bg-white">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                                No. WhatsApp Aktif *
                            </label>
                            <input type="tel" x-model="phone" placeholder="Misal: 081234567890" 
                                   class="w-full rounded-xl border border-gray-300 px-3.5 py-3 text-base sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 bg-white">
                        </div>
                    </div>
                </div>

                <!-- 3. LOKASI PENGIRIMAN DENGAN AUTO-DETEKSI GPS & SEARCH -->
                <div class="space-y-3 pt-2 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                            3. Lokasi Pengiriman & Cek Ongkir
                        </label>
                        <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60">
                            Kirim dari: Jakarta
                        </span>
                    </div>

                    <!-- TOMBOL AUTO-DETEKSI GPS -->
                    <button type="button" 
                            @click="detectLocationGPS()" 
                            :disabled="detectingGPS"
                            class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-gradient-to-r from-emerald-50 via-teal-50 to-emerald-50 border border-emerald-300 text-ftl-forest hover:bg-emerald-100 font-bold text-xs sm:text-sm transition active:scale-95 shadow-2xs cursor-pointer">
                        <span x-show="detectingGPS" class="w-4 h-4 border-2 border-emerald-700 border-t-transparent rounded-full animate-spin"></span>
                        <i x-show="!detectingGPS" data-lucide="crosshair" class="w-4 h-4 text-emerald-600"></i>
                        <span x-text="detectingGPS ? 'Mendeteksi Koordinat GPS Lokasi Anda...' : '📍 Auto-Deteksi Lokasi Saya (GPS Cepat)'"></span>
                    </button>

                    <!-- Alert Banner Hasil Auto-Deteksi -->
                    <div x-show="detectedAlert" 
                         x-transition 
                         class="bg-emerald-50 border border-emerald-300 text-emerald-900 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm flex items-center justify-between">
                        <span class="font-bold flex items-center gap-1.5" x-text="detectedAlert"></span>
                        <span class="text-[10px] bg-emerald-200/80 text-emerald-800 px-2 py-0.5 rounded-full font-bold">Terpilih</span>
                    </div>

                    <!-- FITUR PENCARIAN CEPAT KOTA / KABUPATEN DI SELURUH INDONESIA -->
                    <div class="relative">
                        <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                            Atau Ketik Langsung Kota / Kabupaten Kamu:
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   x-model="searchQuery" 
                                   @input="showSuggestions = true"
                                   @focus="showSuggestions = true"
                                   placeholder="Ketik kota tujuan (misal: Bandung, Tangerang, Surabaya...)" 
                                   class="w-full rounded-xl border border-gray-300 pl-9 pr-3.5 py-3 text-base sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 bg-white">
                            <i data-lucide="search" class="w-4 h-4 text-gray-400 absolute left-3 top-3.5"></i>
                        </div>

                        <!-- Live Suggestion Dropdown Cepat -->
                        <div x-show="showSuggestions && filteredCities.length > 0" 
                             @click.away="showSuggestions = false"
                             class="absolute z-40 left-0 right-0 mt-1 max-h-56 overflow-y-auto bg-white rounded-2xl shadow-xl border border-emerald-200 divide-y divide-gray-100 text-xs sm:text-sm">
                            <template x-for="item in filteredCities" :key="item.full">
                                <div @click="selectCityFromSearch(item)" 
                                     class="px-4 py-3 hover:bg-emerald-50 cursor-pointer flex items-center justify-between transition-colors">
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="map-pin" class="w-3.5 h-3.5 text-emerald-600 shrink-0"></i>
                                        <span class="font-bold text-gray-900" x-text="item.city"></span>
                                    </div>
                                    <span class="text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full text-[10px] font-semibold" x-text="item.province"></span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- ================= PILIHAN MODEL PROVINSI & KOTA BERGAYA ELEGAN ================= -->
                    <div class="space-y-3 pt-1">
                        <!-- 1. CUSTOM STYLED PROVINSI SELECTOR -->
                        <div class="relative">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 flex items-center justify-between">
                                <span>Provinsi Tujuan:</span>
                                <span class="text-[10px] text-emerald-700 font-semibold" x-show="province" x-text="'Provinsi Terpilih'"></span>
                            </label>
                            
                            <button type="button" 
                                    @click="openProvDropdown = !openProvDropdown; openCityDropdown = false;"
                                    class="w-full p-3 sm:p-3.5 rounded-2xl border transition-all flex items-center justify-between text-left bg-white shadow-2xs cursor-pointer active:scale-[0.99]"
                                    :class="openProvDropdown ? 'border-emerald-600 ring-2 ring-emerald-500/25' : (province ? 'border-emerald-400 bg-emerald-50/20' : 'border-gray-300 hover:border-gray-400')">
                                <div class="flex items-center gap-3 min-w-0">
                                    <div class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0 transition-colors"
                                         :class="province ? 'bg-emerald-600 text-white' : 'bg-gray-100 text-gray-500'">
                                        <i data-lucide="map" class="w-4 h-4"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <span class="text-[10px] uppercase font-bold text-gray-400 block leading-tight">Provinsi</span>
                                        <span class="text-xs sm:text-sm font-bold truncate block"
                                              :class="province ? 'text-gray-900' : 'text-gray-400'"
                                              x-text="province || '-- Ketuk untuk Pilih Provinsi --'"></span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-1.5 shrink-0 ml-2">
                                    <span x-show="province" class="text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full hidden sm:inline-block">Ganti</span>
                                    <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="openProvDropdown ? 'rotate-180 text-emerald-600' : ''"></i>
                                </div>
                            </button>

                            <!-- Dropdown Menu Box Provinsi -->
                            <div x-show="openProvDropdown" 
                                 @click.away="openProvDropdown = false"
                                 x-transition:enter="transition ease-out duration-150"
                                 x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                 class="absolute z-50 left-0 right-0 mt-1.5 bg-white rounded-2xl shadow-2xl border border-emerald-300 p-2.5 text-xs sm:text-sm space-y-2">
                                
                                <!-- Mini Search Filter di Dalam Dropdown -->
                                <div class="relative">
                                    <input type="text" 
                                           x-model="searchProvQuery" 
                                           placeholder="Cari provinsi (misal: Jawa, Bali, Riau, Sumatera)..."
                                           class="w-full pl-8 pr-3 py-2.5 text-xs rounded-xl border border-gray-200 focus:outline-none focus:border-emerald-600 focus:ring-1 focus:ring-emerald-500 bg-gray-50">
                                    <i data-lucide="search" class="w-3.5 h-3.5 text-gray-400 absolute left-2.5 top-3"></i>
                                </div>

                                <!-- List Item Provinsi -->
                                <div class="max-h-56 overflow-y-auto space-y-1 pr-1">
                                    <template x-for="item in filteredProvincesList" :key="item.province">
                                        <button type="button"
                                                @click="selectProvince(item.province)"
                                                class="w-full text-left px-3 py-2.5 rounded-xl transition flex items-center justify-between cursor-pointer active:scale-98"
                                                :class="province === item.province ? 'bg-emerald-600 text-white font-bold shadow-xs' : 'hover:bg-emerald-50 text-gray-800'">
                                            <div class="flex items-center gap-2">
                                                <span class="w-1.5 h-1.5 rounded-full" :class="province === item.province ? 'bg-white' : 'bg-emerald-500'"></span>
                                                <span class="truncate" x-text="item.province"></span>
                                            </div>
                                            <span class="text-[10px] px-2 py-0.5 rounded-full shrink-0 ml-2"
                                                  :class="province === item.province ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500'"
                                                  x-text="item.cities.length + ' Kota'"></span>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <!-- 2. CUSTOM STYLED KOTA / KABUPATEN SELECTOR -->
                        <div class="relative">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 flex items-center justify-between">
                                <span>Kota / Kabupaten:</span>
                                <span class="text-[10px] text-gray-400" x-show="!province">Pilih provinsi dulu</span>
                                <span class="text-[10px] text-emerald-700 font-semibold" x-show="province && city" x-text="'Kota Terpilih'"></span>
                            </label>

                            <button type="button" 
                                    @click="if (province) { openCityDropdown = !openCityDropdown; openProvDropdown = false; }"
                                    :disabled="!province"
                                    class="w-full p-3 sm:p-3.5 rounded-2xl border transition-all flex items-center justify-between text-left shadow-2xs"
                                    :class="!province ? 'bg-gray-100/70 border-gray-200 text-gray-400 cursor-not-allowed' : (openCityDropdown ? 'bg-white border-emerald-600 ring-2 ring-emerald-500/25 cursor-pointer' : (city ? 'bg-emerald-50/20 border-emerald-400 text-gray-900 cursor-pointer' : 'bg-white border-gray-300 hover:border-gray-400 cursor-pointer active:scale-[0.99]'))">
                                <div class="flex items-center gap-3 min-w-0">
                                    <div class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0 transition-colors"
                                         :class="city ? 'bg-emerald-600 text-white' : 'bg-gray-100 text-gray-500'">
                                        <i data-lucide="building-2" class="w-4 h-4"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <span class="text-[10px] uppercase font-bold text-gray-400 block leading-tight">Kota / Kab</span>
                                        <span class="text-xs sm:text-sm font-bold truncate block"
                                              :class="city ? 'text-gray-900' : 'text-gray-400'"
                                              x-text="city || (province ? '-- Ketuk untuk Pilih Kota / Kab --' : '-- Pilih Provinsi Dulu --')"></span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-1.5 shrink-0 ml-2">
                                    <span x-show="city" class="text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full hidden sm:inline-block">Ganti</span>
                                    <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="openCityDropdown ? 'rotate-180 text-emerald-600' : ''"></i>
                                </div>
                            </button>

                            <!-- Dropdown Menu Box Kota -->
                            <div x-show="openCityDropdown && province" 
                                 @click.away="openCityDropdown = false"
                                 x-transition:enter="transition ease-out duration-150"
                                 x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                 class="absolute z-50 left-0 right-0 mt-1.5 bg-white rounded-2xl shadow-2xl border border-emerald-300 p-2.5 text-xs sm:text-sm space-y-2">
                                
                                <!-- Mini Search Filter di Dalam Dropdown Kota -->
                                <div class="relative">
                                    <input type="text" 
                                           x-model="searchCityQuery" 
                                           :placeholder="'Cari kota di ' + province + '...'"
                                           class="w-full pl-8 pr-3 py-2.5 text-xs rounded-xl border border-gray-200 focus:outline-none focus:border-emerald-600 focus:ring-1 focus:ring-emerald-500 bg-gray-50">
                                    <i data-lucide="search" class="w-3.5 h-3.5 text-gray-400 absolute left-2.5 top-3"></i>
                                </div>

                                <!-- List Item Kota -->
                                <div class="max-h-56 overflow-y-auto space-y-1 pr-1">
                                    <template x-for="c in filteredCitiesOfProvince" :key="c">
                                        <button type="button"
                                                @click="selectCity(c)"
                                                class="w-full text-left px-3 py-2.5 rounded-xl transition flex items-center justify-between cursor-pointer active:scale-98"
                                                :class="city === c ? 'bg-emerald-600 text-white font-bold shadow-xs' : 'hover:bg-emerald-50 text-gray-800'">
                                            <div class="flex items-center gap-2">
                                                <span class="w-1.5 h-1.5 rounded-full" :class="city === c ? 'bg-white' : 'bg-emerald-500'"></span>
                                                <span class="truncate" x-text="c"></span>
                                            </div>
                                            <i data-lucide="check" class="w-4 h-4 text-white" x-show="city === c"></i>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Lengkap & Patokan Rumah -->
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                            Alamat Jalan & Patokan Rumah (Opsional):
                        </label>
                        <input type="text" x-model="address" placeholder="Jl. Mawar No. 8, RT 02/RW 04, Kec. Sukajadi (Depan Klinik)" 
                               class="w-full rounded-xl border border-gray-300 px-3.5 py-3 text-base sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 bg-white">
                    </div>

                    <!-- PILIHAN EKSPEDISI (TERDETEKSI OTOMATIS) -->
                    <div x-show="loadingOngkir" class="py-3 text-center text-xs text-gray-500 flex items-center justify-center gap-2">
                        <div class="w-4 h-4 border-2 border-emerald-600 border-t-transparent rounded-full animate-spin"></div>
                        <span>Menghubungkan & mendeteksi ongkir otomatis...</span>
                    </div>

                    <div x-show="couriers.length > 0 && !loadingOngkir" class="space-y-2 pt-1">
                        <div class="flex items-center justify-between">
                            <span class="block text-[11px] font-bold text-gray-700 uppercase tracking-wider">
                                Ekspedisi Terdeteksi:
                            </span>
                            <span class="text-[10px] text-emerald-700 font-semibold bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">
                                3 Opsi Pengiriman Tersedia
                            </span>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                            <template x-for="c in couriers" :key="c.code">
                                <div @click="selectedCourier = c"
                                     :class="selectedCourier && selectedCourier.code === c.code ? 'border-emerald-600 bg-emerald-50/70 ring-2 ring-emerald-500/25 shadow-xs' : 'border-gray-200 hover:border-gray-300 bg-white'"
                                     class="p-3 rounded-2xl border cursor-pointer transition-all flex flex-col justify-between text-left relative active:scale-[0.98]">
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
                                        <span class="text-xs font-extrabold text-ftl-forest" x-text="c.cost_formatted"></span>
                                        <span class="text-[9px] font-bold text-emerald-700" x-text="c.badge"></span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div x-show="!city && !loadingOngkir" class="bg-gray-50 p-3.5 rounded-2xl text-center border border-dashed border-gray-200">
                        <p class="text-xs text-gray-500">
                            Pilih <b>Provinsi & Kota</b> di atas untuk langsung menampilkan tarif ongkir <b>J&T, JNE, dan SiCepat</b>.
                        </p>
                    </div>
                </div>

                <!-- 4. TOTAL RINGKASAN PEMBAYARAN -->
                <div x-show="selectedCourier" class="bg-emerald-50/70 p-4 rounded-2xl border border-emerald-200 space-y-1.5 text-xs text-gray-700">
                    <div class="flex justify-between">
                        <span>Subtotal Produk (<span x-text="qty"></span> pcs):</span>
                        <span class="font-bold text-gray-900" x-text="formatRp(subtotal)"></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Ongkir (<span x-text="selectedCourier ? selectedCourier.name : ''"></span>):</span>
                        <span class="font-bold text-gray-900" x-text="formatRp(shippingCost)"></span>
                    </div>
                    <div class="pt-2 border-t border-emerald-200 flex justify-between items-baseline font-display">
                        <span class="font-extrabold text-sm text-gray-900">Total Tagihan Transfer:</span>
                        <span class="text-lg font-extrabold text-ftl-forest" x-text="formatRp(grandTotal)"></span>
                    </div>
                </div>

                <!-- Catatan Tambahan (Opsional) -->
                <div>
                    <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                        Catatan Khusus (Opsional):
                    </label>
                    <input type="text" x-model="note" placeholder="Misal: Titip kartu ucapan kado kelahiran" 
                           class="w-full rounded-xl border border-gray-300 px-3.5 py-3 text-base sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 bg-white">
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-5 sm:px-6 py-4 flex flex-col sm:flex-row-reverse gap-2.5 border-t border-gray-100">
                <button type="button" 
                        x-show="modalTab === 'pesan'"
                        @click="submitToWhatsApp()" 
                        class="w-full sm:w-auto inline-flex justify-center items-center gap-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 px-6 py-3.5 text-sm font-bold text-white shadow-md active:scale-95 transition-all cursor-pointer">
                    <i data-lucide="send" class="w-4 h-4"></i>
                    <span>Kirim Pesanan ke WhatsApp</span>
                </button>
                <button type="button" 
                        @click="closeModal()"
                        class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl border border-gray-300 bg-white px-5 py-3 text-xs sm:text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors cursor-pointer active:scale-95">
                    Batal
                </button>
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
        modalTab: 'konsultasi', // 'konsultasi' | 'pesan'
        consultName: '',
        consultBabyAge: '',
        consultTopic: 'Aman untuk newborn (0+) & kulit sensitif?',
        consultCustomQuestion: '',
        product: 'calming-rub-50g',
        qty: 1,
        name: '',
        phone: '',
        province: '',
        city: '',
        address: '',
        note: '',
        openProvDropdown: false,
        searchProvQuery: '',
        openCityDropdown: false,
        searchCityQuery: '',
        destinations: window.FTL_EMBEDDED_DESTINATIONS || [],
        cityList: [],
        couriers: [],
        selectedCourier: null,
        loadingOngkir: false,
        detectingGPS: false,
        detectedAlert: '',
        searchQuery: '',
        showSuggestions: false,
        productsList: {
            'calming-rub-50g': { 
                id: 'calming-rub-50g',
                name: 'Baby Calming Rub Cream 50g', 
                desc: 'Single Tube (1x 50g)',
                price: 79000, 
                originalPrice: 99000,
                badge: '🌿 100% Pala Asli',
                badgeClass: 'bg-emerald-50 text-emerald-800 border-emerald-200/80',
                weight: 100,
                image: 'assets/images/product-calming-rub.svg'
            },
            'bundling-double-care': { 
                id: 'bundling-double-care',
                name: 'Paket Hemat 2 Tube', 
                desc: 'Stok Lengkap Bunda (2x 50g)',
                price: 149000, 
                originalPrice: 198000,
                badge: '🔥 Hemat 25%',
                badgeClass: 'bg-amber-50 text-amber-800 border-amber-200/80',
                weight: 200,
                image: 'assets/images/product-bundle-2.svg'
            },
            'bundling-newborn-gift': { 
                id: 'bundling-newborn-gift',
                name: 'Newborn Care Gift Set', 
                desc: 'Paket Sambut Buah Hati',
                price: 189000, 
                originalPrice: 249000,
                badge: '🎁 Kado Spesial',
                badgeClass: 'bg-rose-50 text-rose-800 border-rose-200/80',
                weight: 350,
                image: 'assets/images/product-gift-box.svg'
            }
        },
        get currentProduct() {
            return this.productsList[this.product] || this.productsList['calming-rub-50g'];
        },
        get currentPrice() {
            return this.currentProduct.price;
        },
        get currentName() {
            return this.currentProduct.name;
        },
        get totalWeight() {
            return this.currentProduct.weight * this.qty;
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
        },
        openModal(detail) {
            this.isOpen = true;
            if (detail && detail.tab) this.modalTab = detail.tab;
            if (detail && detail.product && this.productsList[detail.product]) {
                this.product = detail.product;
                if (this.city) this.calculateOngkir();
            }
            setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 50);
        },
        closeModal() {
            this.isOpen = false;
            this.openProvDropdown = false;
            this.openCityDropdown = false;
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
            const found = this.destinations.find(d => d.province === this.province);
            this.cityList = found ? found.cities : [];
            this.city = '';
            this.couriers = [];
            this.selectedCourier = null;
            this.detectedAlert = '';
            this.searchQuery = '';
            this.openProvDropdown = false;
            this.searchProvQuery = '';
            // Auto buka pilihan kota agar flow belanja mulus
            this.openCityDropdown = true;
            this.searchCityQuery = '';
            setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 30);
        },
        selectCity(cityName) {
            this.city = cityName;
            this.searchQuery = cityName + ', ' + this.province;
            this.detectedAlert = '📍 Lokasi Terpilih: ' + cityName + ' (' + this.province + ')';
            this.openCityDropdown = false;
            this.searchCityQuery = '';
            this.calculateOngkir();
        },
        selectCityFromSearch(item) {
            this.province = item.province;
            const found = this.destinations.find(d => d.province === this.province);
            this.cityList = found ? found.cities : [];
            this.city = item.city;
            this.searchQuery = item.city + ', ' + item.province;
            this.showSuggestions = false;
            this.detectedAlert = '📍 Lokasi Terpilih: ' + item.city + ' (' + item.province + ')';
            this.calculateOngkir();
        },
        async detectLocationGPS() {
            if (!navigator.geolocation) {
                alert('Browser Anda tidak mendukung deteksi lokasi otomatis. Silakan pilih provinsi & kota manual.');
                return;
            }
            this.detectingGPS = true;
            this.detectedAlert = '';

            navigator.geolocation.getCurrentPosition(async (pos) => {
                try {
                    const lat = pos.coords.latitude;
                    const lon = pos.coords.longitude;
                    const res = await fetch('https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=' + lat + '&longitude=' + lon + '&localityLanguage=id');
                    const data = await res.json();
                    
                    const rawProv = (data.principalSubdivision || '').toLowerCase();
                    const rawCity = (data.city || data.locality || '').toLowerCase();

                    let matched = null;
                    for (let d of this.destinations) {
                        for (let c of d.cities) {
                            const cLow = c.toLowerCase();
                            const pLow = d.province.toLowerCase();
                            if (rawCity && (cLow.includes(rawCity) || rawCity.includes(cLow.replace(/^(kota|kab\.)\s*/, '')))) {
                                matched = { province: d.province, city: c };
                                break;
                            }
                            if (rawProv && pLow.includes(rawProv) && !matched) {
                                matched = { province: d.province, city: c };
                            }
                        }
                        if (matched) break;
                    }

                    if (!matched && (rawProv.includes('jakarta') || rawCity.includes('jakarta'))) {
                        matched = { province: 'DKI Jakarta', city: 'Kota Jakarta Selatan' };
                    }

                    if (matched) {
                        this.province = matched.province;
                        const found = this.destinations.find(d => d.province === this.province);
                        this.cityList = found ? found.cities : [];
                        this.city = matched.city;
                        this.searchQuery = matched.city + ', ' + matched.province;
                        this.detectedAlert = '📍 GPS Terdeteksi: ' + matched.city + ' (' + matched.province + ')';
                        await this.calculateOngkir();
                    } else {
                        this.detectedAlert = 'Lokasi sekitar: ' + (data.city || data.locality || 'Indonesia') + '. Silakan pilih di menu Provinsi & Kota.';
                    }
                } catch (e) {
                    console.error('Error reverse geocode GPS', e);
                    alert('Gagal mendeteksi nama kota otomatis. Silakan pilih manual melalui menu Provinsi & Kota.');
                } finally {
                    this.detectingGPS = false;
                }
            }, (err) => {
                this.detectingGPS = false;
                alert('Izin akses lokasi tidak diberikan atau GPS non-aktif. Silakan pilih Provinsi & Kota manual.');
            }, { timeout: 8000 });
        },
        async calculateOngkir() {
            if (!this.province || !this.city) return;
            this.loadingOngkir = true;
            this.selectedCourier = null;

            // 1. Instant Local Calculation (0ms response time, 100% resilient)
            if (window.FTL_EMBEDDED_SHIPPING_RATES && window.FTL_EMBEDDED_SHIPPING_RATES[this.province]) {
                const provData = window.FTL_EMBEDDED_SHIPPING_RATES[this.province];
                const rateInfo = (provData.cities && provData.cities[this.city]) ? provData.cities[this.city] : provData.base;
                const chargeableKg = Math.max(1, Math.ceil(this.totalWeight / 1000));
                
                const jntCost = rateInfo.jnt * chargeableKg;
                const jneCost = rateInfo.jne * chargeableKg;
                const sicepatCost = rateInfo.sicepat * chargeableKg;
                const etd = rateInfo.etd || '1-2 Hari';

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
                this.loadingOngkir = false;
                setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 30);
                return;
            }

            // 2. Fallback to API if shipping rates not embedded
            try {
                const url = '<?= BASE_URL ?>api/ongkir.php?action=calculate&province=' + encodeURIComponent(this.province) + '&city=' + encodeURIComponent(this.city) + '&weight=' + this.totalWeight;
                const res = await fetch(url);
                const json = await res.json();
                if (json.status === 'success') {
                    this.couriers = json.couriers;
                    this.selectedCourier = this.couriers[0];
                }
            } catch (e) {
                console.error('Gagal hitung ongkir', e);
            } finally {
                this.loadingOngkir = false;
                setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 30);
            }
        },
        sendConsultationWA() {
            let msg = 'Halo Tim For The Little Indonesia 🍃

';
            if (this.consultName && this.consultName.trim()) {
                msg += 'Perkenalkan, saya *' + this.consultName.trim() + '* ingin konsultasi seputar perawatan si kecil:

';
            } else {
                msg += 'Saya ingin konsultasi seputar si kecil & produk FTL:

';
            }
            if (this.consultBabyAge && this.consultBabyAge.trim()) {
                msg += '• *Usia/Kondisi Si Kecil:* ' + this.consultBabyAge.trim() + '
';
            }
            msg += '• *Topik Pertanyaan:* ' + this.consultTopic + '
';
            if (this.consultCustomQuestion && this.consultCustomQuestion.trim()) {
                msg += '
*Detail Pertanyaan / Keluhan:*
"' + this.consultCustomQuestion.trim() + '"
';
            }
            msg += '
Mohon saran dan penjelasannya ya min. Terima kasih banyak! 🙏';

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
            if (!this.name.trim()) {
                alert('Silakan isi Nama Bunda / Ayah terlebih dahulu.');
                return;
            }
            if (!this.phone.trim()) {
                alert('Silakan masukkan nomor WhatsApp aktif penerima.');
                return;
            }
            if (!this.city || !this.province) {
                alert('Silakan tentukan provinsi & kota/kabupaten pengiriman.');
                return;
            }
            if (!this.selectedCourier) {
                alert('Silakan tunggu atau pilih kurir ekspedisi pengiriman.');
                return;
            }

            let msg = 'Halo Admin For The Little Indonesia 🍃
';
            msg += 'Saya ingin memesan produk via Website Resmi FTL:

';
            msg += '------------------------------------
';
            msg += '*DATA PENERIMA:*
';
            msg += '• Nama: ' + this.name.trim() + '
';
            msg += '• No. WhatsApp: ' + this.phone.trim() + '
';
            msg += '• Tujuan: ' + this.city + ', ' + this.province + '
';
            if (this.address.trim()) {
                msg += '• Alamat Lengkap: ' + this.address.trim() + '
';
            }
            msg += '
*RINCIAN PRODUK:*
';
            msg += '• ' + this.currentName + '
';
            msg += '• Jumlah: ' + this.qty + ' pcs (Estimasi ' + this.totalWeight + 'g)
';
            msg += '• Subtotal Produk: ' + this.formatRp(this.subtotal) + '

';
            
            msg += '*EKSPEDISI & ONGKOS KIRIM:*
';
            msg += '• Kurir: ' + this.selectedCourier.name + ' (' + this.selectedCourier.service + ')
';
            msg += '• Estimasi Tiba: ' + this.selectedCourier.etd + '
';
            msg += '• Biaya Ongkir: ' + this.formatRp(this.shippingCost) + '
';
            msg += '------------------------------------
';
            msg += '*TOTAL PEMBAYARAN: ' + this.formatRp(this.grandTotal) + '*
';
            msg += '------------------------------------
';
            if (this.note.trim()) {
                msg += '*Catatan Tambahan:* ' + this.note.trim() + '

';
            }
            msg += 'Halo Admin FTL, saya sudah mengisi form pesanan dan ongkir sudah otomatis terdeteksi via website. Mohon info nomor rekening BCA/Mandiri untuk transfer ya. Terima kasih! 🙏';

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
window.openOrderModal = function(tab = 'pesan', product = 'calming-rub-50g') {
    window.dispatchEvent(new CustomEvent('open-order-modal', { detail: { tab, product } }));
    try {
        if (document.body._x_dataStack && document.body._x_dataStack[0]) {
            document.body._x_dataStack[0].orderModalOpen = true;
            document.body._x_dataStack[0].modalTab = tab;
            document.body._x_dataStack[0].selectedProduct = product;
        }
    } catch(e) {}
};

window.closeOrderModal = function() {
    window.dispatchEvent(new CustomEvent('close-order-modal'));
    try {
        if (document.body._x_dataStack && document.body._x_dataStack[0]) {
            document.body._x_dataStack[0].orderModalOpen = false;
        }
    } catch(e) {}
};
</script>
