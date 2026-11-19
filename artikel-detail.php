<?php
$current_page = 'artikel';
require_once __DIR__ . '/config.php';

$article_id = $_GET['id'] ?? 'cara-atasi-kolik';

// Database mock konten artikel lengkap
$ARTICLES_DATA = [
    'cara-atasi-kolik' => [
        'title' => 'Cara Mengenali Gejala Kolik pada Bayi Baru Lahir dan Solusi Penanganannya',
        'category' => 'Kesehatan Bayi',
        'read_time' => '5 Menit Baca',
        'date' => '14 November 2026',
        'author' => 'Tim Bidan & Parenting FTL',
        'content' => <<<HTML
<p class="text-base text-gray-700 leading-relaxed mb-6">
Mendengar tangisan si kecil yang tak kunjung reda di malam hari tentu membuat hati para orang tua cemas dan kelelahan. Salah satu penyebab paling umum yang sering dialami oleh bayi berusia 2 minggu hingga 4 bulan adalah <strong>kolik infantil</strong>.
</p>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">Apa Itu Kolik pada Bayi?</h3>
<p class="text-sm text-gray-700 leading-relaxed mb-4">
Kolik bukanlah sebuah penyakit, melainkan kumpulan gejala berupa tangisan intens, berulang, dan berlangsung lama tanpa alasan yang jelas pada bayi yang tampak sehat. Para ahli medis umumnya menggunakan <em>"Rule of Threes"</em>: menangis lebih dari 3 jam sehari, minimal 3 hari dalam seminggu, dan berlangsung setidaknya selama 3 minggu berturut-turut.
</p>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">Gejala Khas Kolik yang Perlu Bunda Ketahui</h3>
<ul class="list-disc pl-6 space-y-2 text-sm text-gray-700 mb-6">
    <li><strong>Waktu Tangisan Teratur:</strong> Biasanya memuncak pada sore hingga larut malam.</li>
    <li><strong>Bahasa Tubuh Menegang:</strong> Bayi mengepalkan tangan, menarik kaki ke arah perut, atau melengkungkan punggung.</li>
    <li><strong>Perut Terasa Keras & Bunyi Kembung:</strong> Saat disentuh perlahan, perut bayi terasa padat dan sering mengeluarkan gas (kentut).</li>
    <li><strong>Wajah Kemerahan:</strong> Wajah tampak memerah karena mengejan menahan rasa tidak nyaman di saluran cerna.</li>
</ul>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">Langkah Menenangkan Si Kecil Saat Kolik Melanda</h3>
<ol class="list-decimal pl-6 space-y-3 text-sm text-gray-700 mb-6">
    <li><strong>Lakukan Pijatan Perut ILU:</strong> Oleskan <em>Baby Calming Rub Cream</em> berbahan minyak pala hangat ke perut si kecil, lalu pijat memutar searah jarum jam untuk mendorong gas keluar.</li>
    <li><strong>Sendawakan Setelah Menyusu:</strong> Pastikan bayi bersendawa setiap selesai menyusu, baik via payudara langsung maupun botol.</li>
    <li><strong>Gerakan 'Bicycle Legs':</strong> Baringkan bayi, pegang kedua kakinya, lalu gerakkan perlahan seperti mengayuh sepeda.</li>
    <li><strong>Ciptakan Lingkungan Tenang:</strong> Redupkan lampu kamar, gunakan white noise atau suara bisikan lembut Bunda.</li>
</ol>
HTML
    ],
    'panduan-pijat-ilu' => [
        'title' => 'Panduan Lengkap Pijat ILU untuk Membantu Bayi Tidur Nyenyak Bebas Rewel',
        'category' => 'Stimulasi & Tidur',
        'read_time' => '4 Menit Baca',
        'date' => '10 November 2026',
        'author' => 'Bunda FTL Care',
        'content' => <<<HTML
<p class="text-base text-gray-700 leading-relaxed mb-6">
Pijat bayi bukan hanya sekadar sarana menenangkan fisik, tetapi juga bentuk komunikasi cinta (*bonding*) yang sangat kuat antara Bunda dan buah hati tercinta. Salah satu teknik pijat yang paling direkomendasikan dokter anak untuk meredakan kembung adalah <strong>Pijat ILU (I Love You)</strong>.
</p>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">Mengapa Dinamakan Pijat ILU?</h3>
<p class="text-sm text-gray-700 leading-relaxed mb-4">
Gerakan pijat ini mengikuti jalur usus besar bayi dari kanan bawah naik ke atas, melintang ke kiri, lalu turun ke kiri bawah menuju pembuangan:
</p>

<div class="space-y-3.5 my-6">
    <div class="flex items-start gap-4 p-4 rounded-2xl bg-ftl-cream/60 border border-ftl-sand/80 shadow-2xs">
        <span class="w-8 h-8 rounded-full border border-ftl-forest/25 bg-white text-ftl-forest font-display font-bold text-xs flex items-center justify-center shrink-0 mt-0.5 shadow-2xs">01</span>
        <div>
            <h4 class="font-bold text-sm sm:text-base text-ftl-forest mb-0.5">Gerakan 'I' (Sisi Kiri Perut Bayi)</h4>
            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">Usap lembut dari bawah tulang rusuk kiri bayi lurus ke arah perut bagian bawah membentuk huruf 'I'. Ulangi 3-5 kali.</p>
        </div>
    </div>
    <div class="flex items-start gap-4 p-4 rounded-2xl bg-ftl-cream/60 border border-ftl-sand/80 shadow-2xs">
        <span class="w-8 h-8 rounded-full border border-ftl-forest/25 bg-white text-ftl-forest font-display font-bold text-xs flex items-center justify-center shrink-0 mt-0.5 shadow-2xs">02</span>
        <div>
            <h4 class="font-bold text-sm sm:text-base text-ftl-forest mb-0.5">Gerakan 'L' Terbalik (Dari Kanan ke Kiri Bayi)</h4>
            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">Mulai dari sisi perut kanan atas bayi, geser mendatar ke kiri, lalu turun ke bawah membentuk huruf 'L' terbalik. Ulangi 3-5 kali.</p>
        </div>
    </div>
    <div class="flex items-start gap-4 p-4 rounded-2xl bg-ftl-cream/60 border border-ftl-sand/80 shadow-2xs">
        <span class="w-8 h-8 rounded-full border border-ftl-forest/25 bg-white text-ftl-forest font-display font-bold text-xs flex items-center justify-center shrink-0 mt-0.5 shadow-2xs">03</span>
        <div>
            <h4 class="font-bold text-sm sm:text-base text-ftl-forest mb-0.5">Gerakan 'U' Terbalik (Bawah Kanan Melingkar ke Bawah Kiri)</h4>
            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">Mulai dari perut kanan bawah bayi, naik ke atas, mendatar ke kiri, lalu turun ke perut kiri bawah membentuk huruf 'U' terbalik. Ulangi 3-5 kali.</p>
        </div>
    </div>
</div>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">Tips Memilih Media Pijat yang Tepat</h3>
<p class="text-sm text-gray-700 leading-relaxed mb-4">
Hindari minyak yang terlalu licin dan lengket. Pilihlah <strong>calming cream</strong> berbahan dasar minyak pala nusantara dan calendula seperti <em>For The Little Baby Calming Rub</em> yang tidak berminyak, mudah diserap kulit, dan memberikan kehangatan stabil.
</p>
HTML
    ],
    'manfaat-minyak-pala' => [
        'title' => 'Mengapa Minyak Pala Nusantara Sangat Baik untuk Kehangatan & Kenyamanan Bayi?',
        'category' => 'Kekayaan Herbal',
        'read_time' => '6 Menit Baca',
        'date' => '05 November 2026',
        'author' => 'Riset Formulasi FTL',
        'content' => <<<HTML
<p class="text-base text-gray-700 leading-relaxed mb-6">
Kepulauan Nusantara sejak ratusan tahun silam telah dikenal dunia sebagai pusat rempah terbaik. Di antara sekian banyak kekayaan alam Indonesia, <strong>biji dan fuli pala <em>(Myristica fragrans)</em></strong> menempati kedudukan istimewa dalam tradisi perawatan keluarga.
</p>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">Kandungan Utama Minyak Pala</h3>
<p class="text-sm text-gray-700 leading-relaxed mb-4">
Minyak atsiri yang diekstrak dari pala mengandung senyawa aktif <em>myristicin</em>, <em>elemicin</em>, dan <em>safrole</em>. Dalam konsentrasi yang diformulasikan aman untuk bayi, komponen ini memiliki fungsi istimewa:
</p>
<ul class="list-disc pl-6 space-y-2 text-sm text-gray-700 mb-6">
    <li><strong>Efek Karminatif:</strong> Membantu merelaksasi otot saluran cerna sehingga gas penyebab begah lebih mudah keluar.</li>
    <li><strong>Efek Sedatif Alami:</strong> Aroma hangat pala merangsang saraf parasimpatis untuk menurunkan denyut jantung dan membuat tubuh si kecil rileks.</li>
    <li><strong>Sirkulasi Darah Lancar:</strong> Menjaga kestabilan suhu tubuh bayi tanpa menimbulkan efek panas menyengat seperti minyak cabe atau balsem dewasa.</li>
</ul>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">Komitmen For The Little</h3>
<p class="text-sm text-gray-700 leading-relaxed mb-4">
Melalui kampanye <em>Bringing Back Indonesia's Nature Blessing</em>, For The Little memastikan setiap bahan baku pala dipanen secara berkelanjutan dari petani lokal Indonesia dan diproses dengan standar mutu farmasi modern.
</p>
HTML
    ],
    'tips-kulit-sensitif-newborn' => [
        'title' => 'Merawat Kulit Bayi Sensitif: Mengapa Bahan Hypoallergenic Begitu Krusial?',
        'category' => 'Skincare Bayi',
        'read_time' => '4 Menit Baca',
        'date' => '01 November 2026',
        'author' => 'Redaksi For The Little',
        'content' => <<<HTML
<p class="text-base text-gray-700 leading-relaxed mb-6">
Tahukah Bunda bahwa lapisan pelindung kulit (*skin barrier*) bayi baru lahir hingga usia 1 tahun sekitar 30% lebih tipis dan jauh lebih rentan kehilangan kelembapan dibanding kulit orang dewasa? Inilah mengapa bayi sering mengalami ruam, kulit kemerahan, atau terasa kasar saat terkena udara dingin atau produk berbahan kimia keras.
</p>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">Apa Arti Label Hypoallergenic?</h3>
<p class="text-sm text-gray-700 leading-relaxed mb-4">
Label <em>hypoallergenic</em> bukan sekadar istilah pemasaran. Ini adalah standar formulasi yang secara ketat meminimalisir atau menghilangkan bahan-bahan yang memiliki potensi memicu reaksi alergi, seperti pewangi buatan (*artificial fragrance*), paraben, sulfat, maupun alkohol berbahaya.
</p>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">Tips Menjaga Kelembapan Kulit Sensitif Si Kecil</h3>
<ul class="list-disc pl-6 space-y-2 text-sm text-gray-700 mb-6">
    <li><strong>Hindari Air Mandi Terlalu Panas:</strong> Gunakan air hangat suam-suam kuku (sekitar 36-37°C) dan batasi durasi mandi maksimal 5-10 menit.</li>
    <li><strong>Keringkan dengan Cara Ditepuk Lembut:</strong> Jangan menggosok kulit bayi dengan handuk kasar. Tepuk-tepuk perlahan menggunakan handuk serat bambu atau katun lembut.</li>
    <li><strong>Gunakan Krim Berbahan Calendula:</strong> Ekstrak bunga Calendula telah terbukti klinis efektif meredakan iritasi ringan dan memperkuat pertahanan alami kulit bayi.</li>
    <li><strong>Pilih Pakaian Berbahan Katun Alami:</strong> Pakaian berbahan sintetis dapat memerangkap keringat dan memicu biang keringat.</li>
</ul>
HTML
    ],
    'mengatasi-perut-kembung' => [
        'title' => 'Perut Bayi Berbunyi dan Keras? Ini 4 Cara Cepat Meredakannya',
        'category' => 'Kesehatan Bayi',
        'read_time' => '3 Menit Baca',
        'date' => '28 Oktober 2026',
        'author' => 'Redaksi For The Little',
        'content' => <<<HTML
<p class="text-base text-gray-700 leading-relaxed mb-6">
Saat menggendong si kecil, Bunda mungkin pernah merasakan perutnya berbunyi "krucuk-krucuk" atau terasa tegang dan kencang saat disentuh. Kondisi ini adalah tanda klasik <strong>perut kembung (*excessive gas*)</strong> yang membuat bayi merasa tidak nyaman, gelisah, dan sering menggeliat.
</p>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">Mengapa Bayi Sangat Mudah Kembung?</h3>
<p class="text-sm text-gray-700 leading-relaxed mb-4">
Sistem pencernaan bayi masih dalam tahap adaptasi. Selain itu, bayi sering menelan udara (*aerophagia*) saat menyusu terburu-buru, menangis kencang, atau perlekatan (*latch-on*) yang kurang pas pada payudara maupun dot botol.
</p>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">4 Solusi Cepat Menenangkan Perut Begah</h3>
<ol class="list-decimal pl-6 space-y-3 text-sm text-gray-700 mb-6">
    <li><strong>Posisi Sendawa Tegak di Pundak:</strong> Sandarkan dada bayi di pundak Bunda, lalu tepuk-tepuk lembut punggungnya dari bawah ke atas hingga terdengar bunyi sendawa.</li>
    <li><strong>Balurkan Krim Hangat Alami:</strong> Oleskan <em>Baby Calming Rub Cream</em> For The Little ke area perut dan punggung secara melingkar. Kehangatan pala membantu melemaskan otot usus yang tegang.</li>
    <li><strong>Tummy Time Terawasi:</strong> Tengkurapkan bayi di atas pangkuan Bunda selama 2-3 menit saat ia sedang tenang. Tekanan lembut pada perut membantu gas keluar secara alami.</li>
    <li><strong>Cek Aliran Dot Susu:</strong> Pastikan ukuran dot sesuai dengan usia bayi agar susu tidak mengalir terlalu deras atau terlalu lambat.</li>
</ol>
HTML
    ],
    'rutinitas-tidur-malam-bayi' => [
        'title' => 'Membangun Rutinitas Malam (Bedtime Routine) Agar Bayi Tidur Semalaman',
        'category' => 'Pola Asuh',
        'read_time' => '5 Menit Baca',
        'date' => '22 Oktober 2026',
        'author' => 'Redaksi For The Little',
        'content' => <<<HTML
<p class="text-base text-gray-700 leading-relaxed mb-6">
Tidur nyenyak adalah kunci utama produksi hormon pertumbuhan (*growth hormone*) dan perkembangan otak si kecil. Namun, banyak Bunda yang kelelahan karena bayi sering terbangun setiap 1-2 jam di malam hari. Membangun <strong>rutinitas malam yang konsisten</strong> adalah solusi paling terbukti secara ilmiah.
</p>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">Kapan Waktu Terbaik Memulai Rutinitas?</h3>
<p class="text-sm text-gray-700 leading-relaxed mb-4">
Idealnya dimulai 30 hingga 45 menit sebelum jam tidur yang ditargetkan (biasanya antara pukul 19.30 - 20.30 malam). Konsistensi urutan kegiatan akan mengirimkan sinyal ke otak bayi bahwa saatnya menurunkan energi dan bersiap tidur lelap.
</p>

<h3 class="text-xl font-bold font-display text-gray-900 mt-8 mb-4">Langkah 4P: Rutinitas Tidur Ala For The Little</h3>
<ol class="list-decimal pl-6 space-y-3 text-sm text-gray-700 mb-6">
    <li><strong>Pembersihan Lembut:</strong> Mandi air hangat atau seka tubuh si kecil dengan washlap hangat untuk mengendurkan otot-otot yang tegang setelah seharian aktif.</li>
    <li><strong>Pijatan Kasih Sayang:</strong> Balurkan Calming Rub Cream di dada, perut, dan telapak kaki bayi dengan usapan lembut. Aroma alaminya memberikan rasa aman dan nyaman.</li>
    <li><strong>Pakaian Nyaman:</strong> Pakaikan baju tidur berbahan katun bernapas dan pastikan popok kering dan bersih.</li>
    <li><strong>Peredupan & Dongeng:</strong> Redupkan lampu utama, putar white noise atau bacakan dongeng singkat dengan nada suara berbisik tenang.</li>
</ol>
HTML
    ]
];

$article = $ARTICLES_DATA[$article_id] ?? $ARTICLES_DATA['cara-atasi-kolik'];
$page_title = $article['title'];
$page_desc = strip_tags(substr($article['content'], 0, 160));

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- Breadcrumb -->
<div class="bg-ftl-light/50 border-b border-ftl-sand py-3">
    <div class="max-w-4xl mx-auto px-4 text-xs text-gray-500 flex items-center gap-2">
        <a href="<?= BASE_URL ?>index.php" class="hover:text-ftl-forest">Beranda</a>
        <span>/</span>
        <a href="<?= BASE_URL ?>artikel.php" class="hover:text-ftl-forest">Artikel</a>
        <span>/</span>
        <span class="text-ftl-forest font-bold truncate"><?= htmlspecialchars($article['title']) ?></span>
    </div>
</div>

<article class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        
        <!-- Header Post -->
        <header class="space-y-4 pb-8 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold uppercase">
                    <?= $article['category'] ?>
                </span>
                <span class="text-xs text-gray-400">• <?= $article['read_time'] ?></span>
            </div>

            <h1 class="text-2xl sm:text-4xl font-extrabold font-display text-gray-900 leading-snug">
                <?= htmlspecialchars($article['title']) ?>
            </h1>

            <div class="flex flex-wrap items-center justify-between gap-3 text-xs text-gray-500 pt-2">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-full bg-white border border-emerald-200/80 p-0.5 shadow-2xs flex items-center justify-center shrink-0">
                        <img src="<?= BASE_URL ?>assets/images/logo-ftl.png?v=<?= filemtime(__DIR__ . '/assets/images/logo-ftl.png') ?>" 
                             alt="For The Little" 
                             class="w-full h-full object-contain">
                    </div>
                    <div>
                        <div class="font-bold text-gray-900 text-xs flex items-center gap-1.5">
                            <span>Redaksi For The Little</span>
                            <i data-lucide="badge-check" class="w-4 h-4 text-emerald-600"></i>
                        </div>
                        <span class="text-[11px] text-gray-400">Ditinjau untuk Edukasi & Parenting Bunda</span>
                    </div>
                </div>
                <div class="flex items-center gap-1.5 text-gray-400 font-medium">
                    <i data-lucide="calendar" class="w-3.5 h-3.5 text-emerald-600"></i>
                    <span>Diterbitkan: <?= $article['date'] ?></span>
                </div>
            </div>
        </header>

        <!-- Featured Article Hero Image -->
        <?php 
        $article_images = [
            'cara-atasi-kolik' => 'article-kolik.webp',
            'panduan-pijat-ilu' => 'article-pijat-ilu.webp',
            'manfaat-minyak-pala' => 'article-minyak-pala.webp',
            'tips-kulit-sensitif-newborn' => 'article-kolik.webp',
            'mengatasi-perut-kembung' => 'article-pijat-ilu.webp',
            'rutinitas-tidur-malam-bayi' => 'article-kolik.webp',
        ];
        $feat_img = $article_images[$article_id] ?? 'article-kolik.webp';
        ?>
        <div class="my-8 rounded-3xl overflow-hidden shadow-md border border-gray-100 max-h-[420px]">
            <img src="<?= BASE_URL ?>assets/images/<?= $feat_img ?>?v=<?= filemtime(__DIR__ . '/assets/images/' . $feat_img) ?>" 
                 alt="<?= htmlspecialchars($article['title']) ?>" 
                 class="w-full h-full object-cover">
        </div>

        <!-- Body Content -->
        <div class="py-8 prose prose-emerald max-w-none">
            <?= $article['content'] ?>
        </div>

        <!-- Medical Disclaimer -->
        <div class="my-8 p-4 rounded-2xl bg-amber-50/80 border border-amber-200/80 text-xs text-amber-950 flex items-start gap-3 shadow-2xs">
            <span class="w-6 h-6 rounded-full border border-amber-400/50 bg-amber-100/70 text-amber-800 flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="16" x2="12" y2="12"/>
                    <line x1="12" y1="8" x2="12.01" y2="8"/>
                </svg>
            </span>
            <div class="leading-relaxed">
                <strong>Catatan Edukasi:</strong> Artikel ini bertujuan sebagai informasi umum dan panduan perawatan harian. Jika bayi Anda mengalami demam tinggi, muntah proyektil, atau tanda kegawatdaruratan medis, segera konsultasikan ke dokter spesialis anak (Sp.A).
            </div>
        </div>

        <!-- Product Recommendation Box in Article -->
        <div class="my-10 bg-gradient-to-r from-ftl-forest to-ftl-sage rounded-3xl p-6 sm:p-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-xl">
            <div class="flex items-center gap-4">
                <img src="<?= BASE_URL ?>assets/images/product-calming-rub-real.webp" class="h-24 sm:h-28 w-auto rounded-2xl object-cover flex-shrink-0 shadow-md">
                <div>
                    <span class="bg-amber-400 text-amber-950 text-[10px] font-extrabold px-2.5 py-0.5 rounded-full uppercase">Rekomendasi Bunda</span>
                    <h3 class="font-display font-bold text-xl mt-1">Baby Calming Rub Cream (50g)</h3>
                    <p class="text-xs text-emerald-100 mt-1 max-w-sm">Meredakan kolik & kembung dalam hitungan menit dengan kehangatan lembut minyak pala nusantara.</p>
                    <div class="text-lg font-bold text-white mt-2">Rp 79.000</div>
                </div>
            </div>
            <button type="button" @click="openOrderModal('pesan', 'calming-rub-50g')" 
                    class="w-full sm:w-auto bg-white hover:bg-emerald-50 text-ftl-forest font-bold px-6 py-3 rounded-full text-xs shadow transition flex items-center justify-center gap-2 whitespace-nowrap">
                <img src="<?= BASE_URL ?>assets/images/whatsapp-icon.svg" class="w-4 h-4" alt="WhatsApp">
                <span>Pesan via WhatsApp</span>
            </button>
        </div>

        <!-- Back to Articles Button -->
        <div class="pt-6 border-t border-gray-100 flex items-center justify-between">
            <a href="<?= BASE_URL ?>artikel.php" class="inline-flex items-center gap-2 text-xs font-bold text-gray-600 hover:text-ftl-forest transition">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                <span>Kembali ke Daftar Artikel</span>
            </a>
            <div class="flex items-center gap-2 text-xs text-gray-500">
                <span>Bagikan:</span>
                <a href="https://api.whatsapp.com/send?text=<?= rawurlencode(htmlspecialchars($article['title']) . ' ' . BASE_URL . 'artikel-detail.php?id=' . $article_id) ?>" target="_blank" rel="noopener" class="p-1.5 rounded-full bg-emerald-50 text-emerald-700 hover:bg-emerald-100">
                    <i data-lucide="share-2" class="w-4 h-4"></i>
                </a>
            </div>
        </div>

    </div>
</article>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
