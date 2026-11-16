<?php
// includes/order_modal.php
require_once __DIR__ . '/../config.php';
?>

<!-- Order & WhatsApp Interactive Modal dengan Hitung Ongkir Otomatis (J&T, JNE, SiCepat) -->
<div x-show="orderModalOpen" 
     class="fixed inset-0 z-50 overflow-y-auto" 
     style="display: none;"
     aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <!-- Backdrop -->
    <div x-show="orderModalOpen"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="orderModalOpen = false"
         class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>

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
                            // Default pilih J&T Express
                            this.selectedCourier = this.couriers[0];
                        }
                    } catch (e) {
                        console.error('Gagal hitung ongkir', e);
                    } finally {
                        this.loadingOngkir = false;
                    }
                },
                submitToWhatsApp() {
                    if (!this.name.trim()) {
                        alert('Mohon isi nama Bunda / Ayah.');
                        return;
                    }
                    if (!this.phone.trim()) {
                        alert('Mohon isi nomor WhatsApp.');
                        return;
                    }
                    if (!this.province || !this.city) {
                        alert('Mohon pilih Provinsi dan Kota/Kabupaten untuk menghitung ongkos kirim.');
                        return;
                    }
                    if (!this.selectedCourier) {
                        alert('Mohon pilih salah satu ekspedisi pengiriman.');
                        return;
                    }

                    let msg = '*PESANAN RESMI FOR THE LITTLE (FTL)* 🍃\n';
                    msg += '------------------------------------\n';
                    msg += '*DATA PENERIMA:*\n';
                    msg += '• Nama: ' + this.name.trim() + '\n';
                    msg += '• No. WhatsApp: ' + this.phone.trim() + '\n';
                    msg += '• Tujuan: ' + this.city + ', ' + this.province + '\n';
                    if (this.address.trim()) {
                        msg += '• Alamat: ' + this.address.trim() + '\n';
                    }
                    msg += '\n*RINCIAN PRODUK:*\n';
                    msg += '• ' + this.currentName + '\n';
                    msg += '• Jumlah: ' + this.qty + ' pcs (Estimasi ' + this.totalWeight + 'g)\n';
                    msg += '• Subtotal Produk: ' + this.formatRp(this.subtotal) + '\n\n';
                    
                    msg += '*EKSPEDISI & ONGKIR:*\n';
                    msg += '• Ekspedisi: ' + this.selectedCourier.name + ' (' + this.selectedCourier.service + ')\n';
                    msg += '• Estimasi Sampai: ' + this.selectedCourier.etd + '\n';
                    msg += '• Biaya Ongkir: ' + this.formatRp(this.shippingCost) + '\n';
                    msg += '------------------------------------\n';
                    msg += '*TOTAL PEMBAYARAN: ' + this.formatRp(this.grandTotal) + '*\n';
                    msg += '------------------------------------\n';
                    if (this.note.trim()) {
                        msg += '*Catatan Tambahan:* ' + this.note.trim() + '\n\n';
                    }
                    msg += 'Halo Admin FTL, saya sudah memilih produk dan menghitung ongkir resmi via website. Mohon info nomor rekening untuk konfirmasi transfer ya. Terima kasih! 🙏';

                    const url = 'https://wa.me/<?= WHATSAPP_NUMBER ?>?text=' + encodeURIComponent(msg);
                    window.open(url, '_blank');
                    this.$root.closest('[x-data]').orderModalOpen = false;
                }
             }"
             x-init="
                initDestinations();
                $watch('$parent.selectedProduct', value => { 
                    if(value) {
                        product = value;
                        if(city) calculateOngkir();
                    }
                });
                $watch('orderModalOpen', val => { 
                    if(val) setTimeout(() => { if(window.lucide) lucide.createIcons(); }, 60); 
                });
             ">
            
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-ftl-forest to-ftl-sage p-5 sm:p-6 text-white relative">
                <button @click="orderModalOpen = false" 
                        class="absolute top-4 right-4 text-white/80 hover:text-white p-1.5 rounded-full hover:bg-white/10 transition-colors">
                    <i data-lucide="x" class="w-5 h-5 sm:w-6 sm:h-6"></i>
                </button>
                <div class="flex items-center gap-2 text-[11px] font-semibold text-emerald-200 uppercase tracking-wider mb-1">
                    <i data-lucide="truck" class="w-3.5 h-3.5"></i> Cek Ongkir Otomatis (J&T • JNE • SiCepat)
                </div>
                <h3 class="text-xl sm:text-2xl font-bold font-display leading-tight" id="modal-title">
                    Pesan Cepat via WhatsApp
                </h3>
                <p class="text-xs text-emerald-100 mt-1">
                    Pilih produk & masukkan lokasi Anda, ongkos kirim akan otomatis dihitung.
                </p>
            </div>

            <!-- Modal Body / Form -->
            <div class="p-5 sm:p-6 space-y-4 max-h-[72vh] overflow-y-auto">
                
                <!-- 1. PILIH PRODUK & JUMLAH -->
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            1. Pilih Produk FTL
                        </label>
                        <select x-model="product" 
                                @change="if(city) calculateOngkir()"
                                class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm font-semibold text-gray-800 focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200">
                            <option value="calming-rub-50g">Baby Calming Rub Cream 50g - Rp 79.000</option>
                            <option value="bundling-double-care">Bundle Double Care (2x 50g) - Rp 145.000 (Hemat 24%)</option>
                            <option value="bundling-newborn-gift">Newborn Comfort Gift Box - Rp 189.000</option>
                        </select>
                    </div>

                    <!-- Quantity Stepper & Price -->
                    <div class="flex items-center justify-between bg-ftl-light p-3 rounded-2xl border border-emerald-100">
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-600 font-medium">Jumlah Botol/Paket:</span>
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
                                   class="w-full rounded-xl border border-gray-300 px-3 py-2 text-xs sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                                No. WhatsApp Aktif *
                            </label>
                            <input type="tel" x-model="phone" placeholder="Misal: 081234567890" 
                                   class="w-full rounded-xl border border-gray-300 px-3 py-2 text-xs sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200">
                        </div>
                    </div>
                </div>

                <!-- 3. LOKASI PENGIRIMAN & ONGKIR OTOMATIS -->
                <div class="space-y-3 pt-2 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                            3. Alamat & Cek Ongkir
                        </label>
                        <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">
                            Kirim dari: Jakarta
                        </span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <!-- Dropdown Provinsi -->
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                                Provinsi Tujuan *
                            </label>
                            <select x-model="province" 
                                    @change="onProvinceChange()" 
                                    class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 text-xs sm:text-sm font-medium text-gray-800 focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200">
                                <option value="">-- Pilih Provinsi --</option>
                                <template x-for="item in destinations" :key="item.province">
                                    <option :value="item.province" x-text="item.province"></option>
                                </template>
                            </select>
                        </div>

                        <!-- Dropdown Kota / Kabupaten -->
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                                Kota / Kabupaten Tujuan *
                            </label>
                            <select x-model="city" 
                                    @change="calculateOngkir()" 
                                    :disabled="!province"
                                    class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 text-xs sm:text-sm font-medium text-gray-800 focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200 disabled:bg-gray-100 disabled:text-gray-400">
                                <option value="">-- Pilih Kota / Kab --</option>
                                <template x-for="c in cityList" :key="c">
                                    <option :value="c" x-text="c"></option>
                                </template>
                            </select>
                        </div>
                    </div>

                    <!-- Alamat Lengkap & Patokan -->
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                            Alamat Lengkap & Patokan Rumah (Opsional):
                        </label>
                        <input type="text" x-model="address" placeholder="Jl. Melati No. 12, RT 03/05, Kec. Gambir (Dekat Masjid Al-Ikhlas)" 
                               class="w-full rounded-xl border border-gray-300 px-3 py-2 text-xs sm:text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200">
                    </div>

                    <!-- PILIHAN EKSPEDISI (MUNCUL OTOMATIS) -->
                    <div x-show="loadingOngkir" class="py-4 text-center text-xs text-gray-500 flex items-center justify-center gap-2">
                        <div class="w-4 h-4 border-2 border-emerald-600 border-t-transparent rounded-full animate-spin"></div>
                        <span>Menghubungkan & menghitung ongkir...</span>
                    </div>

                    <div x-show="couriers.length > 0 && !loadingOngkir" class="space-y-2 pt-1">
                        <span class="block text-[11px] font-bold text-gray-700 uppercase tracking-wider">
                            Pilih Ekspedisi:
                        </span>
                        
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
                            Pilih <b>Provinsi</b> dan <b>Kota</b> di atas untuk menampilkan tarif ongkir <b>J&T, JNE, dan SiCepat</b>.
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
                        <span class="font-extrabold text-sm text-gray-900">Total Pembayaran:</span>
                        <span class="text-lg font-extrabold text-ftl-forest" x-text="formatRp(grandTotal)"></span>
                    </div>
                </div>

                <!-- Catatan Tambahan (Opsional) -->
                <div>
                    <label class="block text-[11px] font-semibold text-gray-600 mb-1">
                        Catatan Khusus (Opsional):
                    </label>
                    <input type="text" x-model="note" placeholder="Misal: Titip pesan ucapan kado kelahiran" 
                           class="w-full rounded-xl border border-gray-300 px-3 py-2 text-xs focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200">
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-5 sm:px-6 py-4 flex flex-col sm:flex-row-reverse gap-2.5 border-t border-gray-100">
                <button type="button" 
                        @click="submitToWhatsApp()" 
                        class="w-full sm:w-auto inline-flex justify-center items-center gap-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 px-6 py-3 text-sm font-bold text-white shadow-md active:scale-95 transition-all">
                    <i data-lucide="send" class="w-4 h-4"></i>
                    <span>Kirim Pesanan ke WhatsApp</span>
                </button>
                <button type="button" 
                        @click="orderModalOpen = false"
                        class="w-full sm:w-auto inline-flex justify-center items-center rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-gray-100 transition-colors">
                    Batal
                </button>
            </div>

        </div>
    </div>
</div>
