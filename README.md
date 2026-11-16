# 🍃 Website Resmi For The Little (FTL) Indonesia

Website profil brand & katalog produk **For The Little Indonesia** (`@forthelittle.id`) terinspirasi dari standar ekosistem parenting & kesehatan anak **Tentang Anak** (`tentanganak.com`).

---

## 🌟 Fitur Utama Website

1. **Brand Showcase & E-Catalog Berkelas:**
   - Desain bernuansa *earthy-nature* (*sage green*, *soft cream*, dan *warm gold*) khas bahan alami pala nusantara.
   - Responsif 100% di Smartphone, Tablet, dan Desktop (*Mobile-first* untuk para Bunda).
   - Katalog produk satuan (50g), paket bundling hemat, dan paket *Newborn Gift Set*.
   - Edukasi *Hero Ingredients* (Minyak Pala Nusantara, Bunga Calendula, dan Chamomile Alami).
   - Panduan visual langkah demi langkah ritual **Pijat ILU (I Love You)** untuk meredakan kembung & kolik bayi.

2. **Sistem Pemesanan Manual via WhatsApp (Tanpa Ribet):**
   - **Interactive WhatsApp Order Modal:** Pengunjung dapat memilih produk, memasukkan nama, alamat kota, catatan, dan sistem otomatis menghitung estimasi subtotal.
   - Format pesan pesanan otomatis dikirim langsung ke WhatsApp CS resmi FTL dengan template yang rapi dan siap diproses.
   - Dilengkapi tombol alternatif belanja di **Official Shopee** & **TikTok Shop**.

3. **Portal Artikel Parenting & Edukasi:**
   - Menyediakan rubrik edukasi seputar kolik bayi, rutinitas tidur, dan kearifan rempah tradisional untuk meningkatkan kepercayaan pembeli sekaligus optimasi SEO Google.

4. **Halaman Kemitraan & Reseller:**
   - Penjelasan paket kemitraan (Reseller Starter, Agen Wilayah, dan Distributor Kota) dengan tombol pendaftaran langsung ke WhatsApp Admin.

---

## 🚀 Cara Menjalankan di Komputer Lokal (XAMPP)

1. Buka aplikasi **XAMPP Control Panel**.
2. Klik tombol **Start** pada modul **Apache**.
3. Buka browser (Chrome / Edge / Firefox) dan akses:
   ```text
   http://localhost/Website-FTL/
   ```

*(Atau jika ingin menjalankan via PHP Built-in Server di terminal: `php -S localhost:8000` lalu buka `http://localhost:8000/`)*.

---

## ⚙️ Cara Mengubah Pengaturan (Nomor WA, Link Medsos, dsb.)

Cukup buka file `config.php`:
- **Nomor WhatsApp CS:** Ubah baris `define('WHATSAPP_NUMBER', '6281234567890');` dengan nomor WhatsApp admin FTL (format `628xxx` tanpa tanda `+` atau spasi).
- **Link Shopee Resmi:** Ubah `define('SHOPEE_URL', 'https://shopee.co.id/toko-resmi-ftl');`.
- **Link TikTok / Instagram:** Sesuaikan di konstanta `TIKTOK_URL` dan `INSTAGRAM_URL`.
- **Harga & Daftar Produk:** Edit array `$PRODUCTS` di `config.php` kapan saja untuk mengubah harga promo, nama, atau deskripsi produk.

---

## 🌐 Cara Upload / Hosting ke Domain .com (cPanel)

Karena dibangun menggunakan **PHP Modular murni**, website ini **100% kompatibel dengan SEMUA penyedia web hosting** (Hostinger, Niagahoster, DomaiNesia, cPanel, dll):

1. Masuk ke **cPanel** hosting Anda.
2. Buka menu **File Manager** -> masuk ke folder `public_html`.
3. Kompres seluruh file di folder `Website-FTL` menjadi file `.zip`.
4. Upload file `.zip` tersebut ke `public_html`, lalu klik **Extract**.
5. Selesai! Website langsung otomatis aktif di domain Anda (misal: `forthelittle.id` atau `forthelittle.com`) tanpa perlu konfigurasi database yang rumit.

---
*#frommothertoanother — Bringing Back Indonesia's Nature Blessing 🍃*
