<?php
// includes/order_modal.php
require_once __DIR__ . '/../config.php';
?>

<!-- Order & WhatsApp Interactive Modal dengan Auto-Deteksi Lokasi GPS & Cek Ongkir Otomatis (Layer z-[60]) -->
<div x-show="orderModalOpen" 
     class="fixed inset-0 z-[60] overflow-y-auto" 
     style="display: none;"
     @keydown.escape.window="closeModal()"
     aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <!-- Backdrop -->
    <div x-show="orderModalOpen"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="closeModal()"
         class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity cursor-pointer"></div>

    <div class="flex min-h-full items-center justify-center p-3 sm:p-4 text-center">
        <div x-show="orderModalOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all my-6 sm:my-8 w-full max-w-lg border border-ftl-sand"
             x-data="{
                modalTab: 'konsultasi',
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
                destinations: [],
                cityList: [],
                couriers: [],
                selectedCourier: null,
                loadingOngkir: false,
                detectingGPS: false,
                detectedAlert: '',
                searchQuery: '',
                showSuggestions: false,
                productsList: {
                    'calming-rub-50g': { name: 'Baby Calming Rub Cream 50g', price: 79000, weight: 100 },
                    'bundling-double-care': { name: 'Bundle Double Care (2x 50g)', price: 145000, weight: 200 },
                    'bundling-newborn-gift': { name: 'Newborn Comfort Gift Box', price: 189000, weight: 400 }
                },
                get currentPrice() {
                    return this.productsList[this.product] ? this.productsList[this.product].price : 79000;
                },
                get currentName() {
                    return this.productsList[this.product] ? this.productsList[this.product].name : '';
                },
                get totalWeight() {
                    const unitWeight = this.productsList[this.product] ? this.productsList[this.product].weight : 100;
                    return unitWeight * this.qty;
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
                    this.destinations.forEach(d => {
                        d.cities.forEach(c => {
                            list.push({ city: c, province: d.province, full: c + ', ' + d.province });
                        });
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
                formatRp(val) {
                    return 'Rp ' + Number(val).toLocaleString('id-ID');
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
                onProvinceChange() {
                    const found = this.destinations.find(d => d.province === this.province);
                    this.cityList = found ? found.cities : [];
                    this.city = '';
                    this.couriers = [];
                    this.selectedCourier = null;
                    this.detectedAlert = '';
                },
                selectCityFromSearch(item) {
                    this.province = item.province;
                    const found = this.destinations.find(d => d.province === this.province);
                    this.cityList = found ? found.cities : [];
                    this.city = item.city;
                    this.searchQuery = item.city + ', ' + item.province;
                    this.showSuggestions = false;
                    this.detectedAlert = 'Lokasi Terpilih: ' + item.city + ', ' + item.province;
                    this.calculateOngkir();
                },
                async detectLocationGPS() {
                    if (!navigator.geolocation) {
                        alert('Browser Anda tidak mendukung deteksi lokasi otomatis. Silakan pilih kota manual.');
                        return;
                    }
                    this.detectingGPS = true;
                    this.detectedAlert = '';

                    navigator.geolocation.getCurrentPosition(async (pos) => {
                        try {
                            const lat = pos.coords.latitude;
                            const lon = pos.coords.longitude;
                            // Reverse geocode via BigDataCloud client API (Gratis, HTTPS, cepat)
                            const res = await fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${lon}&localityLanguage=id`);
                            const data = await res.json();
                            
                            const rawProv = (data.principalSubdivision || '').toLowerCase();
                            const rawCity = (data.city || data.locality || '').toLowerCase();

                            // Cari kecocokan di database tujuan
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

                            // Fallback jika di Jakarta
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
                                this.detectedAlert = 'Lokasi sekitar: ' + (data.city || data.locality || 'Indonesia') + '. Silakan konfirmasi di dropdown.';
                            }
                        } catch (e) {
                            console.error('Error reverse geocode GPS', e);
                            alert('Gagal mendeteksi nama kota otomatis. Silakan pilih manual melalui pencarian.');
                        } finally {
                            this.detectingGPS = false;
                        }
                    }, (err) => {
                        this.detectingGPS = false;
                        alert('Izin akses lokasi tidak diberikan atau GPS non-aktif. Silakan ketik nama kota manual.');
                    }, { timeout: 8000 });
                },
                async calculateOngkir() {
                    if (!this.province || !this.city) return;
                    this.loadingOngkir = true;
                    this.selectedCourier = null;
                    try {
                        const url = '<?= BASE_URL ?>api/ongkir.php?action=calculate&province=' + encodeURIComponent(this.province) + '&city=' + encodeURIComponent(this.city) + '&weight=' + this.totalWeight;
                        const res = await fetch(url);
                        const json = await res.json();
                        if (json.status === 'success') {
                            this.couriers = json.couriers;
                            // Default otomatis pilih J&T Express
                            this.selectedCourier = this.couriers[0];
                        }
                    } catch (e) {
                        console.error('Gagal hitung ongkir', e);
                    } finally {
                        this.loadingOngkir = false;
                    }
                },
                selectTopic(topic, defaultText = '') {
                    this.consultTopic = topic;
                    if (defaultText && !this.consultCustomQuestion.trim()) {
                        this.consultCustomQuestion = defaultText;
                    }
                },
                sendConsultationWA() {
                    let msg = 'Halo Tim For The Little Indonesia 🍃\n\n';
                    if (this.consultName && this.consultName.trim()) {
                        msg += 'Perkenalkan, saya *' + this.consultName.trim() + '* ingin konsultasi seputar perawatan si kecil:\n\n';
                    } else {
                        msg += 'Saya ingin konsultasi seputar si kecil & produk FTL:\n\n';
                    }
                    if (this.consultBabyAge && this.consultBabyAge.trim()) {
                        msg += '• *Usia/Kondisi Si Kecil:* ' + this.consultBabyAge.trim() + '\n';
                    }
                    msg += '• *Topik Pertanyaan:* ' + this.consultTopic + '\n';
                    if (this.consultCustomQuestion && this.consultCustomQuestion.trim()) {
                        msg += '\n*Detail Pertanyaan / Keluhan:*\n"' + this.consultCustomQuestion.trim() + '"\n';
                    }
                    msg += '\nMohon saran dan penjelasannya ya min. Terima kasih banyak! 🙏';

                    const url = 'https://wa.me/<?= WHATSAPP_NUMBER ?>?text=' + encodeURIComponent(msg);
                    const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
                    if (isMobile) {
                        window.location.href = url;
                    } else {
                        window.open(url, '_blank');
                    }
                    this.closeModal();
                },
                closeModal() {
                    try {
                        this.$dispatch('close-order-modal');
                    } catch(e) {}
                    window.dispatchEvent(new CustomEvent('close-order-modal'));
                    try {
                        if (document.body._x_dataStack && document.body._x_dataStack[0]) {
                            document.body._x_dataStack[0].orderModalOpen = false;
                        }
                    } catch(e) {}
                },
                submitToWhatsApp() {
                    if (!this.name.trim()) {
                        alert('Mohon isi nama Bunda / Ayah.');
                        return;
                    }
                    if (!this.phone.trim()) {
                        alert('Mohon isi nomor WhatsApp Anda.');
                        return;
                    }
                    if (!this.province || !this.city) {
                        alert('Mohon tentukan lokasi tujuan (gunakan tombol Auto-Deteksi GPS atau ketik kota).');
                        return;
                    }
                    if (!this.selectedCourier) {
                        alert('Mohon pilih salah satu ekspedisi pengiriman.');
                        return;
                    }

                    let msg = '*PESANAN FOR THE LITTLE INDONESIA* 🍃\n';
                    msg += '------------------------------------\n';
                    msg += '*DATA PENERIMA:*\n';
                    msg += '• Nama: ' + this.name.trim() + '\n';
                    msg += '• No. WhatsApp: ' + this.phone.trim() + '\n';
                    msg += '• Tujuan: ' + this.city + ', ' + this.province + '\n';
                    if (this.address.trim()) {
                        msg += '• Alamat Lengkap: ' + this.address.trim() + '\n';
                    }
                    msg += '\n*RINCIAN PRODUK:*\n';
                    msg += '• ' + this.currentName + '\n';
                    msg += '• Jumlah: ' + this.qty + ' pcs (Estimasi ' + this.totalWeight + 'g)\n';
                    msg += '• Subtotal Produk: ' + this.formatRp(this.subtotal) + '\n\n';
                    
                    msg += '*EKSPEDISI & ONGKOS KIRIM:*\n';
                    msg += '• Kurir: ' + this.selectedCourier.name + ' (' + this.selectedCourier.service + ')\n';
                    msg += '• Estimasi Tiba: ' + this.selectedCourier.etd + '\n';
                    msg += '• Biaya Ongkir: ' + this.formatRp(this.shippingCost) + '\n';
                    msg += '------------------------------------\n';
                    msg += '*TOTAL PEMBAYARAN: ' + this.formatRp(this.grandTotal) + '*\n';
                    msg += '------------------------------------\n';
                    if (this.note.trim()) {
                        msg += '*Catatan Tambahan:* ' + this.note.trim() + '\n\n';
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
             }"
             @open-order-modal.window="
                if ($event.detail && $event.detail.tab) modalTab = $event.detail.tab;
                if ($event.detail && $event.detail.product) {
                    product = $event.detail.product;
                    if (city) calculateOngkir();
                }
                setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 50);
             "
             x-init="
                initDestinations();
                $watch('modalTab', val => {
                    setTimeout(() => { if (window.lucide) lucide.createIcons(); }, 50);
                });
             ">
            
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
                            class="flex-1 py-2 text-xs sm:text-sm rounded-xl transition flex items-center justify-center gap-1.5 cursor-pointer">
                        <img src="<?= BASE_URL ?>assets/images/whatsapp-icon.svg" class="w-4 h-4" alt="WhatsApp" x-show="modalTab === 'konsultasi'">
                        <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-4 h-4" alt="WhatsApp" x-show="modalTab !== 'konsultasi'">
                        <span>Tanya-Tanya Dulu</span>
                    </button>
                    <button type="button" 
                            @click="modalTab = 'pesan'" 
                            :class="modalTab === 'pesan' ? 'bg-white text-ftl-forest font-bold shadow-sm' : 'text-white/80 hover:text-white font-medium'"
                            class="flex-1 py-2 text-xs sm:text-sm rounded-xl transition flex items-center justify-center gap-1.5 cursor-pointer">
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
                                class="min-h-[50px] p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2.5 cursor-pointer active:scale-[0.98]">
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
                                class="min-h-[50px] p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2.5 cursor-pointer active:scale-[0.98]">
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
                                class="min-h-[50px] p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2.5 cursor-pointer active:scale-[0.98]">
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
                                class="min-h-[50px] p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2.5 cursor-pointer active:scale-[0.98]">
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

                <!-- Input Nama & Usia Bayi (Text-base on mobile to prevent iOS zoom) -->
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

                <!-- Detail Pertanyaan (Text-base on mobile to prevent iOS zoom) -->
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
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider flex items-center justify-between">
                        <span>1. Produk yang Dipesan</span>
                        <span class="text-[10px] text-emerald-700 font-semibold uppercase tracking-wider">100% Original FTL</span>
                    </label>

                    <!-- Product Card Banner -->
                    <div class="p-3 sm:p-3.5 rounded-2xl bg-gradient-to-r from-emerald-50/70 to-ftl-light/60 border border-emerald-100 flex items-center gap-3">
                        <div class="w-14 h-14 rounded-xl bg-white p-1.5 flex items-center justify-center shrink-0 border border-emerald-100/80 shadow-2xs">
                            <img src="<?= BASE_URL ?>assets/images/product-calming-rub.svg" alt="Baby Calming Rub Cream 50g" class="h-full w-auto object-contain">
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-1.5">
                                <span class="bg-emerald-600 text-white text-[9px] font-extrabold px-1.5 py-0.5 rounded">OFFICIAL</span>
                                <span class="text-[10px] text-gray-500">Netto 50g • BPOM Resmi</span>
                            </div>
                            <h4 class="font-bold text-xs sm:text-sm text-gray-900 truncate">Baby Calming Rub Cream (50g)</h4>
                            <div class="flex items-baseline gap-1.5 mt-0.5">
                                <span class="text-xs sm:text-sm font-extrabold text-ftl-forest">Rp 79.000</span>
                                <span class="text-[11px] text-gray-400 line-through">Rp 99.000</span>
                                <span class="text-[10px] font-bold text-amber-800 bg-amber-100 px-1.5 py-0.2 rounded">Hemat 20%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quantity Stepper & Price -->
                    <div class="flex items-center justify-between bg-ftl-light p-3 rounded-2xl border border-emerald-100">
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-600 font-medium">Jumlah Pesanan:</span>
                            <div class="flex items-center gap-3 mt-1">
                                <button type="button" 
                                        @click="if (qty > 1) { qty--; if(city) calculateOngkir(); }" 
                                        class="w-7 h-7 rounded-lg bg-white border border-gray-300 text-gray-700 flex items-center justify-center font-bold hover:bg-gray-100 active:scale-95 transition text-sm">
                                    -
                                </button>
                                <span class="font-bold text-sm sm:text-base w-6 text-center" x-text="qty"></span>
                                <button type="button" 
                                        @click="qty++; if(city) calculateOngkir();" 
                                        class="w-7 h-7 rounded-lg bg-white border border-gray-300 text-gray-700 flex items-center justify-center font-bold hover:bg-gray-100 active:scale-95 transition text-sm">
                                    +
                                </button>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-[11px] text-gray-500">Subtotal Produk:</span>
                            <div class="text-base sm:text-lg font-extrabold text-ftl-forest" x-text="formatRp(subtotal)"></div>
                            <span class="text-[10px] text-emerald-700 font-semibold" x-text="'Berat: ' + totalWeight + 'g'"></span>
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
                        <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">
                            Kirim dari: Jakarta
                        </span>
                    </div>

                    <!-- TOMBOL AUTO-DETEKSI GPS -->
                    <button type="button" 
                            @click="detectLocationGPS()" 
                            :disabled="detectingGPS"
                            class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-300 text-ftl-forest hover:bg-emerald-100 font-bold text-xs sm:text-sm transition active:scale-95 shadow-2xs cursor-pointer">
                        <span x-show="detectingGPS" class="w-4 h-4 border-2 border-emerald-700 border-t-transparent rounded-full animate-spin"></span>
                        <i x-show="!detectingGPS" data-lucide="crosshair" class="w-4 h-4 text-emerald-600"></i>
                        <span x-text="detectingGPS ? 'Mendeteksi Koordinat GPS Lokasi Anda...' : '📍 Auto-Deteksi Lokasi Saya (GPS Otomatis)'"></span>
                    </button>

                    <!-- Alert Banner Hasil Auto-Deteksi -->
                    <div x-show="detectedAlert" 
                         x-transition 
                         class="bg-emerald-50 border border-emerald-300 text-emerald-900 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm flex items-center justify-between">
                        <span class="font-bold flex items-center gap-1.5" x-text="detectedAlert"></span>
                        <span class="text-[10px] bg-emerald-200/80 text-emerald-800 px-2 py-0.5 rounded-full font-bold">Auto</span>
                    </div>

                    <!-- FITUR PENCARIAN CEPAT KOTA / KABUPATEN -->
                    <div class="relative">
                        <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                            Atau Ketik Nama Kota / Kabupaten Kamu:
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

                        <!-- Live Suggestion Dropdown -->
                        <div x-show="showSuggestions && filteredCities.length > 0" 
                             @click.away="showSuggestions = false"
                             class="absolute z-30 left-0 right-0 mt-1 max-h-48 overflow-y-auto bg-white rounded-xl shadow-xl border border-gray-200 divide-y divide-gray-100 text-xs sm:text-sm">
                            <template x-for="item in filteredCities" :key="item.full">
                                <div @click="selectCityFromSearch(item)" 
                                     class="px-3.5 py-2.5 hover:bg-emerald-50 cursor-pointer flex items-center justify-between transition-colors">
                                    <span class="font-bold text-gray-800" x-text="item.city"></span>
                                    <span class="text-gray-400 text-[10px]" x-text="item.province"></span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- DROPDOWN MANUAL (CADANGAN / KONFIRMASI) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <div>
                            <label class="block text-[10px] text-gray-500 mb-0.5">Provinsi:</label>
                            <select x-model="province" 
                                    @change="onProvinceChange()" 
                                    class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-base sm:text-sm font-medium text-gray-800 focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200">
                                <option value="">-- Pilih Provinsi --</option>
                                <template x-for="item in destinations" :key="item.province">
                                    <option :value="item.province" x-text="item.province"></option>
                                </template>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[10px] text-gray-500 mb-0.5">Kota / Kab:</label>
                            <select x-model="city" 
                                    @change="calculateOngkir()" 
                                    :disabled="!province"
                                    class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-base sm:text-sm font-medium text-gray-800 focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 disabled:bg-gray-100 disabled:text-gray-400">
                                <option value="">-- Pilih Kota / Kab --</option>
                                <template x-for="c in cityList" :key="c">
                                    <option :value="c" x-text="c"></option>
                                </template>
                            </select>
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
                            <span class="text-[10px] text-emerald-700 font-semibold">Tersedia 3 Opsi</span>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                            <template x-for="c in couriers" :key="c.code">
                                <div @click="selectedCourier = c"
                                     :class="selectedCourier && selectedCourier.code === c.code ? 'border-emerald-600 bg-emerald-50/50 ring-2 ring-emerald-500/20' : 'border-gray-200 hover:border-gray-300 bg-white'"
                                     class="p-2.5 rounded-2xl border cursor-pointer transition-all flex flex-col justify-between text-left relative group">
                                    <div>
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-xs font-extrabold text-gray-900" x-text="c.name"></span>
                                            <div class="w-4 h-4 rounded-full border flex items-center justify-center"
                                                 :class="selectedCourier && selectedCourier.code === c.code ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300'">
                                                <div x-show="selectedCourier && selectedCourier.code === c.code" class="w-1.5 h-1.5 bg-white rounded-full"></div>
                                            </div>
                                        </div>
                                        <span class="text-[10px] text-gray-500 block leading-tight" x-text="c.service"></span>
                                        <span class="text-[10px] text-emerald-700 font-semibold block mt-0.5" x-text="'Est. ' + c.etd"></span>
                                    </div>
                                    <div class="pt-2 mt-1 border-t border-gray-100 flex items-baseline justify-between">
                                        <span class="text-xs font-extrabold text-ftl-forest" x-text="c.cost_formatted"></span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div x-show="!city && !loadingOngkir" class="bg-gray-50 p-3 rounded-xl text-center border border-dashed border-gray-200">
                        <p class="text-xs text-gray-500">
                            Klik <b>"📍 Auto-Deteksi Lokasi"</b> di atas atau ketik nama kota untuk langsung menampilkan tarif ongkir <b>J&T, JNE, dan SiCepat</b>.
                        </p>
                    </div>
                </div>

                <!-- 4. TOTAL RINGKASAN PEMBAYARAN -->
                <div x-show="selectedCourier" class="bg-emerald-50/70 p-3.5 rounded-2xl border border-emerald-200 space-y-1.5 text-xs text-gray-700">
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
