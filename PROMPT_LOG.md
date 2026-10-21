# Prompt Log

AI yang dipakai: Claude (Anthropic). Semua hasil saya uji sendiri di browser, DevTools, dan SSH sebelum di-commit.

## 1. Minta urutan pengerjaan
Prompt: Saya pemula di WordPress/PHP. Seluruh soal tes saya kirim, saya tanya langkah pengerjaannya: satu-satu atau sekaligus.
Hasil: Dibagi 6 fase (konten statis, JS filter, form + PHP, responsive, Elementor, deliverable), commit per fase.
Yang saya lakukan: Dipakai. Saya kerjakan per fase dan commit tiap fase selesai.

## 2. Fase 1: judul, footer, tombol WA/LINE
Prompt: Saya kirim page-trails.php dan tanya apakah judul itu H1 atau title di dashboard.
Hasil: Judul adalah H1 di template; diberi perbaikan A3, A4, A5, A8 plus CSS bar sticky.
Yang saya lakukan: Dipakai. Nomor WA/LINE dan URL sosial media masih placeholder, saya ganti/konfirmasi.

## 3. Fase 2: pencarian dan filter
Prompt: Saya kirim trails.js dan error console "Cannot read properties of null (reading 'addEventListener')".
Hasil: Penyebab ID `searchInput` salah (harusnya `search-box`) dan `no-results` salah (harusnya `trails-no-results`); satu fungsi `applyFilter` untuk search header, search utama, dan kategori.
Yang saya lakukan: Dipakai, lalu dites manual (mount, zzz, kategori + search).

## 4. Fase 3: form booking dan functions.php
Prompt: Saya kirim functions.php berisi bug B1-B3.
Hasil: Text domain ditambahkan; nonce + sanitasi + validasi untuk handler; argumen hook diubah dari 1 ke 2; field Digital Nomad, Host Terms, Daily/Monthly, konfirmasi via fetch.
Yang saya lakukan: Dipakai dan dites lewat Network tab dan `wp transient get`.

## 5. Pertanyaan belajar: grep, wp-cli, hook
Prompt: Saya tanya arti perintah grep -rni, wp transient, dan apa itu hook WordPress.
Hasil: Penjelasan perintah dan konsep add_action/add_filter.
Yang saya lakukan: Dipelajari supaya bisa menjelaskan perbaikan sendiri.

## 6. Fase 4: responsive 390px
Prompt: Saya kirim style.css untuk memperbaiki A7.
Hasil: Dua penyebab: `.trails-cards` flex dengan `min-width: 320px` dan banner promo `display: none` di mobile; diganti CSS grid auto-fill dan aturan sembunyi dihapus.
Yang saya lakukan: Dipakai, dicek scrollWidth vs clientWidth di Console.

## 7. Fase 5: hero Elementor
Prompt: Beberapa pertanyaan karena widget tersusun menyamping di Container.
Hasil: Atur Direction ke Column sebelum menambah widget; input search lewat widget HTML dengan id `main-search` dipertahankan; styling kustom lewat class di style.css.
Yang saya lakukan: Dipakai; template diekspor ke JSON dan dimasukkan ke repo.

## 8. Klarifikasi dari MyRehat
Prompt: Saya tempel jawaban klarifikasi tentang form (POST + nonce + konfirmasi terlihat) dan minta dicocokkan dengan kode.
Hasil: Kode sudah sesuai; diberi langkah bukti (Network tab, wp transient, tes hapus nonce).
Yang saya lakukan: Dites sendiri.

## 9. Bug dari saran AI: POST status 404
Prompt: Saya laporkan request POST berstatus 404 padahal response success: true.
Hasil: AI mengakui kesalahan di kodenya: field bernama `name` bentrok dengan query var WordPress. Field di-rename jadi `trails_name` dan `trails_date`, dan status dipaksa 200.
Yang saya lakukan: Dipakai; setelah fix, POST berstatus 200. Ini contoh hasil AI yang tetap harus diverifikasi sendiri.