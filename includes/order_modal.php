<?php
// includes/order_modal.php
require_once __DIR__ . '/../config.php';
?>

<!-- Order & WhatsApp Interactive Modal -->
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

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div x-show="orderModalOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-ftl-sand"
             x-data="{
                product: 'calming-rub-50g',
                qty: 1,
                name: '',
                phone: '',
                city: '',
                note: '',
                productsList: {
                    'calming-rub-50g': { name: 'Baby Calming Rub Cream (50g)', price: 79000 },
                    'bundling-double-care': { name: 'Bundle Double Care (2x 50g)', price: 145000 },
                    'bundling-newborn-gift': { name: 'Newborn Comfort Gift Box', price: 189000 }
                },
                get currentPrice() {
                    return this.productsList[this.product] ? this.productsList[this.product].price : 79000;
                },
                get currentName() {
                    return this.productsList[this.product] ? this.productsList[this.product].name : '';
                },
                get subtotal() {
                    return this.currentPrice * this.qty;
                },
                formatRp(val) {
                    return 'Rp ' + Number(val).toLocaleString('id-ID');
                },
                submitToWhatsApp() {
                    let msg = '*PESANAN FOR THE LITTLE INDONESIA* 🍃\n';
                    msg += '------------------------------------\n';
                    if (this.name.trim()) msg += '*Nama Pemesan:* ' + this.name.trim() + '\n';
                    if (this.phone.trim()) msg += '*No. WhatsApp:* ' + this.phone.trim() + '\n';
                    if (this.city.trim()) msg += '*Kota/Alamat:* ' + this.city.trim() + '\n\n';
                    
                    msg += '*Rincian Produk:*\n';
                    msg += '• ' + this.currentName + '\n';
                    msg += '• Jumlah: ' + this.qty + ' pcs\n';
                    msg += '• Estimasi Total: ' + this.formatRp(this.subtotal) + ' *(belum termasuk ongkir)*\n\n';
                    
                    if (this.note.trim()) {
                        msg += '*Catatan:* ' + this.note.trim() + '\n\n';
                    }
                    
                    msg += '------------------------------------\n';
                    msg += 'Halo Admin FTL, saya ingin konfirmasi pesanan di atas. Mohon info nomor rekening & pilihan ekspedisi ongkir ke alamat saya ya. Terima kasih! 🙏';
                    
                    const url = 'https://wa.me/<?= WHATSAPP_NUMBER ?>?text=' + encodeURIComponent(msg);
                    window.open(url, '_blank');
                    this.$root.closest('[x-data]').orderModalOpen = false;
                }
             }"
             x-init="$watch('$parent.selectedProduct', value => { if(value) product = value; })">
            
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-ftl-forest to-ftl-sage p-6 text-white relative">
                <button @click="orderModalOpen = false" 
                        class="absolute top-5 right-5 text-white/80 hover:text-white p-1 rounded-full hover:bg-white/10 transition-colors">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
                <div class="flex items-center gap-2 text-xs font-semibold text-emerald-200 uppercase tracking-wider mb-1">
                    <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Order Cepat & Konsultasi CS
                </div>
                <h3 class="text-xl sm:text-2xl font-bold font-display leading-tight" id="modal-title">
                    Pesan via WhatsApp Resmi
                </h3>
                <p class="text-xs sm:text-sm text-emerald-100 mt-1">
                    Isi detail pesanan di bawah ini, lalu klik tombol untuk terhubung langsung dengan CS kami.
                </p>
            </div>

            <!-- Modal Body / Form -->
            <div class="p-6 space-y-4 max-h-[75vh] overflow-y-auto">
                
                <!-- Pilih Produk -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Pilih Produk FTL
                    </label>
                    <select x-model="product" 
                            class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-800 focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200">
                        <option value="calming-rub-50g">Baby Calming Rub Cream 50g - Rp 79.000</option>
                        <option value="bundling-double-care">Bundle Double Care (2x 50g) - Rp 145.000 (Hemat 24%)</option>
                        <option value="bundling-newborn-gift">Newborn Comfort Gift Box - Rp 189.000</option>
                    </select>
                </div>

                <!-- Quantity & Price Preview -->
                <div class="flex items-center justify-between bg-ftl-light p-3.5 rounded-2xl border border-emerald-100">
                    <div class="flex flex-col">
                        <span class="text-xs text-gray-600 font-medium">Jumlah Pesanan:</span>
                        <div class="flex items-center gap-3 mt-1.5">
                            <button type="button" 
                                    @click="if (qty > 1) qty--" 
                                    class="w-8 h-8 rounded-lg bg-white border border-gray-300 text-gray-700 flex items-center justify-center font-bold hover:bg-gray-100 active:scale-95 transition">
                                -
                            </button>
                            <span class="font-bold text-base w-6 text-center" x-text="qty"></span>
                            <button type="button" 
                                    @click="qty++" 
                                    class="w-8 h-8 rounded-lg bg-white border border-gray-300 text-gray-700 flex items-center justify-center font-bold hover:bg-gray-100 active:scale-95 transition">
                                +
                            </button>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-xs text-gray-500">Estimasi Total:</span>
                        <div class="text-lg font-extrabold text-ftl-forest" x-text="formatRp(subtotal)"></div>
                        <span class="text-[11px] text-gray-500">*Belum termasuk ongkir</span>
                    </div>
                </div>

                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">
                        Nama Lengkap Bunda / Ayah:
                    </label>
                    <input type="text" x-model="name" placeholder="Misal: Bunda Rina" 
                           class="w-full rounded-xl border border-gray-300 px-3.5 py-2 text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200">
                </div>

                <!-- Kota / Kecamatan Pengiriman -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">
                        Kota / Kecamatan Tujuan Pengiriman:
                    </label>
                    <input type="text" x-model="city" placeholder="Misal: Kebayoran Baru, Jakarta Selatan" 
                           class="w-full rounded-xl border border-gray-300 px-3.5 py-2 text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200">
                </div>

                <!-- Catatan Tambahan -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">
                        Catatan Khusus (Opsional):
                    </label>
                    <input type="text" x-model="note" placeholder="Misal: Mohon bubble wrap ekstra / titip ucapan kado" 
                           class="w-full rounded-xl border border-gray-300 px-3.5 py-2 text-sm focus:border-ftl-forest focus:outline-none focus:ring-2 focus:ring-emerald-200">
                </div>

                <!-- Keunggulan Transaksi WA -->
                <div class="grid grid-cols-2 gap-2 text-[11px] text-gray-600 bg-gray-50 p-2.5 rounded-xl">
                    <div class="flex items-center gap-1.5">
                        <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i>
                        <span>100% Produk Original</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <i data-lucide="truck" class="w-4 h-4 text-emerald-600"></i>
                        <span>Kirim Cepat Seluruh RI</span>
                    </div>
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-6 py-4 flex flex-col sm:flex-row-reverse gap-3 border-t border-gray-100">
                <button type="button" 
                        @click="submitToWhatsApp()" 
                        class="w-full sm:w-auto inline-flex justify-center items-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-bold text-white shadow-lg hover:bg-emerald-700 active:scale-95 transition-all">
                    <i data-lucide="send" class="w-4 h-4"></i>
                    <span>Kirim Pesanan ke WhatsApp</span>
                </button>
                <a href="<?= get_whatsapp_order_link() ?>" target="_blank" rel="noopener"
                   class="w-full sm:w-auto inline-flex justify-center items-center gap-2 rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-gray-100 transition-colors">
                    <i data-lucide="message-square" class="w-3.5 h-3.5"></i>
                    <span>Konsultasi Dulu Saja</span>
                </a>
            </div>

        </div>
    </div>
</div>
