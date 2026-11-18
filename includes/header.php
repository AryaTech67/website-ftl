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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
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

    <!-- Preload Critical Banner Slides for Zero-Delay Instant Slider -->
    <link rel="preload" as="image" href="<?= BASE_URL ?>assets/images/banner-ftl-hero.webp" fetchpriority="high">
    <link rel="preload" as="image" href="<?= BASE_URL ?>assets/images/banner-ftl-slide2.webp">
    <link rel="preload" as="image" href="<?= BASE_URL ?>assets/images/banner-ftl-slide3.webp">
    <script>
        (function() {
            var slides = [
                '<?= BASE_URL ?>assets/images/banner-ftl-hero.webp',
                '<?= BASE_URL ?>assets/images/banner-ftl-slide2.webp',
                '<?= BASE_URL ?>assets/images/banner-ftl-slide3.webp'
            ];
            slides.forEach(function(url) {
                var img = new Image();
                img.src = url;
            });
        })();
    </script>

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

    <!-- Global Modal Helper Functions (Always Ready & Scope-Independent) -->
    <script>
        window.openOrderModal = function(tab = 'pesan', product = 'calming-rub-50g') {
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

    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 72px;
            overflow-x: hidden;
            max-width: 100vw;
            width: 100%;
        }
        @media (min-width: 640px) {
            html {
                scroll-padding-top: 88px;
            }
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FAF7F2;
            color: #1C2822;
            overflow-x: hidden;
            max-width: 100vw;
            width: 100%;
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
        /* Hide scrollbar for seamless touch-swipe carousel on mobile (app-like feel) */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        /* Anti-Zoom on Mobile Inputs (iOS Safari auto-zooms if font-size < 16px) */
        @media screen and (max-width: 768px) {
            input, select, textarea {
                font-size: 16px !important;
            }
        }

        /* ==================================================== */
        /* High-Performance 60FPS Scroll Reveal & Micro Motion */
        /* ==================================================== */
        [data-animate] {
            opacity: 0;
            will-change: transform, opacity;
            transition-property: opacity, transform;
            transition-duration: 0.65s;
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
        [data-animate="fade-up"] {
            transform: translateY(28px);
        }
        [data-animate="fade-down"] {
            transform: translateY(-28px);
        }
        [data-animate="fade-left"] {
            transform: translateX(28px);
        }
        [data-animate="fade-right"] {
            transform: translateX(-28px);
        }
        [data-animate="zoom-in"] {
            transform: scale(0.92);
        }
        [data-animate].is-visible {
            opacity: 1;
            transform: translate(0) scale(1);
        }

        /* Subtle floating badge & visual animation */
        @keyframes ftlFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
        .animate-ftl-float {
            animation: ftlFloat 3.6s ease-in-out infinite;
        }

        /* Accessibility: Respect Reduced Motion Preferences */
        @media (prefers-reduced-motion: reduce) {
            [data-animate] {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
            .animate-ftl-float {
                animation: none !important;
            }
        }
    </style>

    <!-- Scroll Reveal Engine (IntersectionObserver 60fps) -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const animElements = document.querySelectorAll('[data-animate]');
            if (!animElements.length) return;

            if (!('IntersectionObserver' in window)) {
                animElements.forEach(el => el.classList.add('is-visible'));
                return;
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const delay = parseInt(el.getAttribute('data-delay') || '0', 10);
                        if (delay > 0) {
                            setTimeout(() => {
                                el.classList.add('is-visible');
                            }, delay);
                        } else {
                            el.classList.add('is-visible');
                        }
                        observer.unobserve(el);
                    }
                });
            }, {
                threshold: 0.08,
                rootMargin: '0px 0px -30px 0px'
            });

            animElements.forEach(el => observer.observe(el));
        });
    </script>
</head>
<body class="bg-ftl-cream text-ftl-dark antialiased min-h-screen flex flex-col" 
      :class="mobileMenuOpen ? 'overflow-hidden' : ''"
      x-data="{ 
          mobileMenuOpen: false, 
          orderModalOpen: false, 
          modalTab: 'konsultasi',
          selectedProduct: 'calming-rub-50g',
          activeSection: '<?= $current_page ?? 'home' ?>'
      }"
      @close-order-modal.window="orderModalOpen = false"
      @open-order-modal.window="orderModalOpen = true; if ($event.detail && $event.detail.tab) modalTab = $event.detail.tab; if ($event.detail && $event.detail.product) selectedProduct = $event.detail.product;"
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
