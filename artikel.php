<?php
$current_page = 'artikel';
$page_title = 'Artikel & Panduan Parenting Bunda';
$page_desc = 'Kumpulan tips dan edukasi terpercaya seputar kesehatan bayi, cara meredakan kolik, panduan pijat bayi, dan tips tidur nyenyak.';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

// Data artikel edukasi parenting (mirip Tentang Anak)
$ARTIKEL_LIST = [
    'cara-atasi-kolik' => [
        'id' => 'cara-atasi-kolik',
        'title' => 'Cara Mengenali Gejala Kolik pada Bayi Baru Lahir dan Solusi Penanganannya',
        'category' => 'Kesehatan Bayi',
        'read_time' => '5 Menit Baca',
        'date' => '14 November 2026',
        'author' => 'Tim Bidan & Parenting FTL',
        'excerpt' => 'Kenali tanda-tanda saat tangisan bayi bukan sekadar lapar, melainkan kram perut akibat gas berlebih yang terperangkap.',
        'color' => 'bg-emerald-100 text-emerald-800'
    ],
    'panduan-pijat-ilu' => [
        'id' => 'panduan-pijat-ilu',
        'title' => 'Panduan Lengkap Pijat ILU untuk Membantu Bayi Tidur Nyenyak Bebas Rewel',
        'category' => 'Stimulasi & Tidur',
        'read_time' => '4 Menit Baca',
        'date' => '10 November 2026',
        'author' => 'Bunda FTL Care',
        'excerpt' => 'Langkah demi langkah teknik pijatan perut alami untuk melancarkan pencernaan, meredakan ketegangan, dan mempererat bonding.',
        'color' => 'bg-amber-100 text-amber-800'
    ],
    'manfaat-minyak-pala' => [
        'id' => 'manfaat-minyak-pala',
        'title' => 'Mengapa Minyak Pala Nusantara Sangat Baik untuk Kehangatan & Kenyamanan Bayi?',
        'category' => 'Kekayaan Herbal',
        'read_time' => '6 Menit Baca',
        'date' => '05 November 2026',
        'author' => 'Riset Formulasi FTL',
        'excerpt' => 'Mengupas warisan nenek moyang dan bukti ilmiah tentang keunggulan minyak pala dibanding minyak kayu putih biasa.',
        'color' => 'bg-teal-100 text-teal-800'
    ],
    'tips-kulit-sensitif-newborn' => [
        'id' => 'tips-kulit-sensitif-newborn',
        'title' => 'Merawat Kulit Bayi Sensitif: Mengapa Bahan Hypoallergenic Begitu Krusial?',
        'category' => 'Skincare Bayi',
        'read_time' => '4 Menit Baca',
        'date' => '01 November 2026',
        'author' => 'Tim Bidan & Parenting FTL',
        'excerpt' => 'Kulit bayi 30% lebih tipis dibanding orang dewasa. Simak panduan memilih produk harian yang aman dari ruam dan iritasi.',
        'color' => 'bg-rose-100 text-rose-800'
    ],
    'mengatasi-perut-kembung' => [
        'id' => 'mengatasi-perut-kembung',
        'title' => 'Perut Bayi Berbunyi dan Keras? Ini 4 Cara Cepat Meredakannya',
        'category' => 'Kesehatan Bayi',
        'read_time' => '3 Menit Baca',
        'date' => '28 Oktober 2026',
        'author' => 'Bunda FTL Care',
        'excerpt' => 'Posisi menyusui, teknik sendawa, dan pemakaian calming rub yang tepat untuk mencegah si kecil tersiksa kembung.',
        'color' => 'bg-emerald-100 text-emerald-800'
    ],
    'rutinitas-tidur-malam-bayi' => [
        'id' => 'rutinitas-tidur-malam-bayi',
        'title' => 'Membangun Rutinitas Malam (Bedtime Routine) Agar Bayi Tidur Semalaman',
        'category' => 'Pola Asuh',
        'read_time' => '5 Menit Baca',
        'date' => '22 Oktober 2026',
        'author' => 'Tim Bidan & Parenting FTL',
        'excerpt' => 'Langkah-langkah sederhana sejak mandi sore hingga pijatan lembut penenang sebelum mematikan lampu kamar si kecil.',
        'color' => 'bg-purple-100 text-purple-800'
    ]
];
?>

<!-- Header Section -->
<section class="bg-ftl-light/60 py-14 border-b border-ftl-sand">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-3">
        <span class="text-xs font-bold text-ftl-forest uppercase tracking-widest">
            Parenting Hub & Edukasi
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold font-display text-gray-900">
            Artikel & Tips Parenting Bunda
        </h1>
        <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto">
            Temukan panduan praktis dari para ahli dan sesama ibu untuk mendukung kenyamanan serta tumbuh kembang buah hati tercinta.
        </p>
    </div>
</section>

<!-- Filter Categories & Articles Grid -->
<section class="py-14 bg-white" x-data="{ currentCategory: 'semua' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Category Filter Tabs -->
        <div class="flex flex-wrap items-center justify-center gap-2 mb-12">
            <button type="button" @click="currentCategory = 'semua'"
                    :class="currentCategory === 'semua' ? 'bg-ftl-forest text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                    class="px-4 py-2 rounded-full text-xs font-bold transition">
                Semua Artikel
            </button>
            <button type="button" @click="currentCategory = 'Kesehatan Bayi'"
                    :class="currentCategory === 'Kesehatan Bayi' ? 'bg-ftl-forest text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                    class="px-4 py-2 rounded-full text-xs font-bold transition">
                Kesehatan Bayi & Kolik
            </button>
            <button type="button" @click="currentCategory = 'Stimulasi & Tidur'"
                    :class="currentCategory === 'Stimulasi & Tidur' ? 'bg-ftl-forest text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                    class="px-4 py-2 rounded-full text-xs font-bold transition">
                Pijat & Kualitas Tidur
            </button>
            <button type="button" @click="currentCategory = 'Kekayaan Herbal'"
                    :class="currentCategory === 'Kekayaan Herbal' ? 'bg-ftl-forest text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                    class="px-4 py-2 rounded-full text-xs font-bold transition">
                Bahan Alami Nusantara
            </button>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($ARTIKEL_LIST as $item): ?>
                <article class="group rounded-3xl overflow-hidden border border-ftl-sand bg-white shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between"
                         x-show="currentCategory === 'semua' || currentCategory === '<?= $item['category'] ?>'">
                    
                    <div>
                        <!-- Header banner abstract -->
                        <div class="h-44 bg-gradient-to-tr from-ftl-forest via-ftl-sage to-emerald-800 p-6 flex flex-col justify-between text-white relative">
                            <span class="inline-block self-start text-[11px] font-bold px-3 py-1 rounded-full bg-white/20 backdrop-blur-xs border border-white/20">
                                <?= $item['category'] ?>
                            </span>
                            <div class="flex items-center gap-2 text-xs text-emerald-200">
                                <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                                <span><?= $item['read_time'] ?></span>
                                <span>•</span>
                                <span><?= $item['date'] ?></span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 space-y-2">
                            <h3 class="font-display font-bold text-lg text-gray-900 group-hover:text-ftl-forest transition-colors leading-snug">
                                <a href="<?= BASE_URL ?>artikel-detail.php?id=<?= $item['id'] ?>">
                                    <?= htmlspecialchars($item['title']) ?>
                                </a>
                            </h3>
                            <p class="text-xs text-gray-600 line-clamp-3 leading-relaxed">
                                <?= htmlspecialchars($item['excerpt']) ?>
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0 border-t border-gray-100 flex items-center justify-between text-xs mt-4">
                        <span class="text-gray-400 font-medium">Oleh: <?= $item['author'] ?></span>
                        <a href="<?= BASE_URL ?>artikel-detail.php?id=<?= $item['id'] ?>" class="font-bold text-ftl-forest hover:text-emerald-700 flex items-center gap-1">
                            <span>Baca</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>

                </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
