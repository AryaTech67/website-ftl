<?php
require_once __DIR__ . '/../config.php';

// Default page variables jika belum diset di halaman pemanggil
$page_title = isset($page_title) ? $page_title . ' | ' . SITE_NAME : SITE_NAME . ' - ' . SITE_TAGLINE;
$page_desc = isset($page_desc) ? $page_desc : SITE_DESCRIPTION;
$current_page = isset($current_page) ? $current_page : 'home';
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_desc) ?>">
    <meta name="keywords" content="<?= SITE_KEYWORDS ?>">
    <meta name="author" content="<?= SITE_NAME ?>">

    <!-- Open Graph / Facebook / WhatsApp Share Preview -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= BASE_URL ?>">
    <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($page_desc) ?>">
    <meta property="og:image" content="<?= BASE_URL ?>assets/images/og-banner.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta property="twitter:description" content="<?= htmlspecialchars($page_desc) ?>">

    <!-- Google Fonts: Plus Jakarta Sans & Quicksand -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ftl: {
                            forest: '#264D3B',      // Hijau tua elegan khas FTL
                            sage: '#3B7056',        // Hijau sage natural
                            light: '#EEF6F0',       // Soft mint/sage background
                            cream: '#FAF7F2',       // Warm milk cream
                            sand: '#F2ECE4',        // Neutral warm sand
                            earth: '#8D6E54',       // Earth tone pala nusantara
                            accent: '#D97A29',      // Warm honey accent
                            dark: '#1C2822'         // Teks utama kontras tinggi
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['Quicksand', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- GSAP for Ultra Smooth 60fps Micro-Interactions -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <!-- Alpine.js CDN for light reactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FAF7F2;
            color: #1C2822;
        }
        .font-display {
            font-family: 'Quicksand', sans-serif;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #FAF7F2;
        }
        ::-webkit-scrollbar-thumb {
            background: #BDD8C8;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #3B7056;
        }
    </style>
</head>
<body class="bg-ftl-cream text-ftl-dark antialiased min-h-screen flex flex-col" 
      x-data="{ 
          mobileMenuOpen: false, 
          orderModalOpen: false, 
          selectedProduct: 'calming-rub-50g',
          activeSection: '<?= $current_page ?? 'home' ?>'
      }"
      x-init="$watch('mobileMenuOpen', val => { if (typeof animateMobileMenu === 'function') animateMobileMenu(val); })"
      @scroll.window.passive="
          <?php if (($current_page ?? '') === 'home'): ?>
          if ((window.innerHeight + window.scrollY) >= (document.documentElement.scrollHeight - 60)) {
              activeSection = 'tentang';
          } else if (window.scrollY < 120) {
              activeSection = 'home';
          } else {
              const sections = ['beranda', 'produk', 'artikel', 'tentang'];
              for (let i = sections.length - 1; i >= 0; i--) {
                  const el = document.getElementById(sections[i]);
                  if (el && el.getBoundingClientRect().top <= 140) {
                      activeSection = (sections[i] === 'beranda') ? 'home' : sections[i];
                      break;
                  }
              }
          }
          <?php endif; ?>
      ">
