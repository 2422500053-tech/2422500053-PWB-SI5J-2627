# 2422500053-PWB-SI5J-2627
Repository Latihan Pertemuan-1 sampai dengan Pertemuan-16 Matakuliah Pemrograman Web Bisnis

## GitHub Pages

GitHub Pages hanya menyajikan file statis dan tidak menjalankan PHP atau menghubungkan aplikasi ke MySQL. Workflow di `.github/workflows/pages.yml` menerbitkan preview beranda dari folder `github-pages/`; source PHP dan konfigurasi aplikasi tidak disertakan dalam hasil deploy.

Untuk mengaktifkan deploy, buka **Settings > Pages** di repository dan pilih **GitHub Actions** sebagai build and deployment source. Workflow berjalan saat push ke branch `main` atau `master`, atau dapat dijalankan manual dari tab **Actions**. Halaman ini hanya preview; untuk memakai seluruh aplikasi CodeIgniter, gunakan hosting yang mendukung PHP dan database MySQL.
