<?php
$current_page = 'tentang';
$page_title = 'Tentang Kami - Kisah #frommothertoanother';
$page_desc = 'Cerita di balik For The Little Indonesia. Dedikasi seorang ibu dan kekayaan alam Nusantara untuk perawatan terbaik si kecil.';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- Header Banner -->
<section class="bg-gradient-to-b from-ftl-light to-ftl-cream py-16 border-b border-ftl-sand">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
        <span class="inline-block text-xs font-bold px-3 py-1 rounded-full bg-emerald-100 text-ftl-forest uppercase tracking-widest">
            #frommothertoanother 🤱🏻🍃
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold font-display text-ftl-forest">
            Kisah Hangat di Balik For The Little
        </h1>
        <p class="text-base sm:text-lg text-gray-600 leading-relaxed max-w-2xl mx-auto">
            Bringing Back Indonesia's Nature Blessing — Berawal dari kegelisahan seorang ibu mencari kenyamanan alami untuk bayinya yang sering rewel karena kolik.
        </p>
    </div>
</section>

<!-- Story Content -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 space-y-12">
        
        <!-- Story Block 1 -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            <div class="md:col-span-6 space-y-4">
                <span class="text-xs font-bold text-ftl-accent uppercase tracking-wider">Awal Mula Perjalanan</span>
                <h2 class="text-2xl sm:text-3xl font-bold font-display text-gray-900 leading-snug">
                    Ketika Tangisan Tengah Malam Membawa Sebuah Solusi
                </h2>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Setiap ibu pasti pernah merasakan malam-malam tanpa tidur saat si kecil menangis kencang karena perut kembung dan kolik. Minyak telon biasa seringkali terasa terlalu cair, licin, mudah tumpah, dan bagi bayi dengan kulit sensitif, rasa hangatnya terkadang justru memicu iritasi kemerahan.
                </p>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Dari situlah lahir <strong>For The Little (FTL)</strong>. Kami memadukan kearifan herbal rempah Indonesia dengan teknologi formulasi modern berbentuk krim yang lembut dan cepat meresap.
                </p>
            </div>
            <div class="md:col-span-6 bg-ftl-light/60 p-6 rounded-3xl border border-emerald-100 flex items-center justify-center">
                <div class="text-center p-6 space-y-3">
                    <div class="w-14 h-14 rounded-2xl border border-rose-200/80 bg-rose-50 text-rose-500 flex items-center justify-center mx-auto shadow-2xs">
                        <i data-lucide="heart" class="w-7 h-7 fill-rose-500 text-rose-500"></i>
                    </div>
                    <blockquote class="font-display font-extrabold text-lg sm:text-xl text-ftl-forest not-italic leading-snug">
                        Dibuat dengan cinta seorang ibu, untuk ibu lainnya.
                    </blockquote>
                    <p class="text-xs text-gray-500 max-w-sm mx-auto">
                        Prinsip #frommothertoanother yang selalu menjadi kompas kami dalam setiap tetes produk yang kami ciptakan.
                    </p>
                </div>
            </div>
        </div>

        <!-- 3 Pilar Komitmen FTL -->
        <div class="pt-8 border-t border-gray-100">
            <div class="text-center mb-10">
                <h3 class="text-2xl font-bold font-display text-gray-900">3 Pilar Dedikasi For The Little</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-ftl-cream/70 p-6 sm:p-7 rounded-2xl border border-ftl-sand space-y-3 hover:bg-white transition-all shadow-2xs">
                    <span class="w-8 h-8 rounded-full border border-emerald-900/20 bg-white text-emerald-900 font-display font-bold text-xs flex items-center justify-center shadow-2xs">
                        01
                    </span>
                    <h4 class="font-bold text-base text-gray-900">Berkah Alam Nusantara</h4>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Kami bangga menggunakan Minyak Pala (Nutmeg Oil) asli perkebunan Indonesia yang telah ratusan tahun terbukti secara empiris dan ilmiah memiliki efek relaksasi terbaik.
                    </p>
                </div>

                <div class="bg-ftl-cream/70 p-6 sm:p-7 rounded-2xl border border-ftl-sand space-y-3 hover:bg-white transition-all shadow-2xs">
                    <span class="w-8 h-8 rounded-full border border-emerald-900/20 bg-white text-emerald-900 font-display font-bold text-xs flex items-center justify-center shadow-2xs">
                        02
                    </span>
                    <h4 class="font-bold text-base text-gray-900">Standar Medis Tertinggi</h4>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Semua produk FTL melalui uji klinis laboratorium, teruji Hypoallergenic, ramah kulit newborn (0+ bulan), dan memiliki izin edar resmi BPOM & Halal Indonesia.
                    </p>
                </div>

                <div class="bg-ftl-cream/70 p-6 sm:p-7 rounded-2xl border border-ftl-sand space-y-3 hover:bg-white transition-all shadow-2xs">
                    <span class="w-8 h-8 rounded-full border border-emerald-900/20 bg-white text-emerald-900 font-display font-bold text-xs flex items-center justify-center shadow-2xs">
                        03
                    </span>
                    <h4 class="font-bold text-base text-gray-900">Komunitas & Edukasi</h4>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Kami bukan sekadar menjual produk, melainkan menjadi teman seperjuangan para orang tua melalui edukasi kesehatan bayi yang mudah dipahami dan dipraktikkan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Social & Call to Action -->
        <div class="bg-gradient-to-r from-ftl-forest to-ftl-sage rounded-3xl p-8 text-white text-center space-y-4">
            <h3 class="text-2xl font-bold font-display">Mari Terhubung dengan Keluarga FTL</h3>
            <p class="text-xs sm:text-sm text-emerald-100 max-w-lg mx-auto">
                Ikuti keseharian kami, tips perawatan bayi, dan cerita para Bunda di Instagram & TikTok resmi kami.
            </p>
            <div class="flex flex-wrap justify-center gap-3 pt-2">
                <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener" class="bg-white hover:bg-gray-50 text-gray-900 font-bold px-5 py-2.5 rounded-full text-xs transition flex items-center gap-2 shadow-sm border border-gray-100">
                    <img src="<?= BASE_URL ?>assets/images/instagram-official.svg" alt="Instagram" class="w-4 h-4 object-contain">
                    <span>Instagram</span>
                </a>
                <a href="<?= TIKTOK_URL ?>" target="_blank" rel="noopener" class="bg-black hover:bg-gray-900 text-white font-bold px-5 py-2.5 rounded-full text-xs transition flex items-center gap-2 shadow-sm">
                    <img src="<?= BASE_URL ?>assets/images/tiktok-icon-official.svg" alt="TikTok" class="w-4 h-4 object-contain">
                    <span>TikTok</span>
                </a>
                <button type="button" @click="openOrderModal('pesan', 'calming-rub-50g')" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold px-5 py-2.5 rounded-full text-xs transition flex items-center gap-2 cursor-pointer shadow-sm">
                    <img src="<?= BASE_URL ?>assets/images/whatsapp-icon-white.svg" class="w-4 h-4" alt="WhatsApp">
                    <span>Chat WhatsApp Kami</span>
                </button>
            </div>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
