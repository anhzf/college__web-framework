# E-Nyileh

Aplikasi manajemen peminjaman fasilitas dan ruangan.

> Silahkan klik menu dipojok kiri atas ↖️ untuk melihat daftar isi.

## Petunjuk Umum

### Tools yang disarankan
- [VSCode](https://code.visualstudio.com/)

  Kemudian install ekstensi yang direkomendasikan, dapat dilihat di tab `Extensions` -> Recommended.

  Setelah clone klik kanan pada file `uas-pwf.code-workspace` open with vscode.


### Clone Repository
1. Buka terminal kemudian arahkan ke folder tujuan.
2. Gunakan perintah berikut untuk melakukan clone.
   ```bash
   git clone https://github.com/anhzf/college__web-framework.git
   ```
3. Done!


## Develop App

### Requirements
- [NodeJS](https://nodejs.org) (Download versi LTS)

### Petunjuk
1. Setelah [clone repository](#clone-repository) arahkan terminal ke folder `./webapp`.
2. Instal dependensi yang dibutuhkan.
   ```bash
   npm install
   ```
   *Jalankan command ini setiap ada perubahan file `package.json`
3. Copy file `.env.example` menjadi `.env`, kemudian isikan konfigurasi sesuai yang dimiliki.
4. Jalankan development server!
   ```
   npm run dev
   ```
5. Happy develop!

### Useful Link
- https://vuejs.org/
- https://next.vuetifyjs.com/en/


## Develop API

### Requirements
- [PHP](https://php.net/)
- [MySQL Database](https://www.mysql.com/)
- [Composer](https://getcomposer.org/)

### Petunjuk
1. Setelah [clone repository](#clone-repository) arahkan terminal ke folder `./api`.
2. Instal dependensi yang dibutuhkan.
   ```bash
   composer install
   ```
3. Copy file `.env.example` menjadi `.env`, kemudian isikan konfigurasi sesuai yang dimiliki. (Terutama pada bagian `DB_`).
4. Jalankan command berikut secara berurutan:
   ```bash
   php artisan key:generate
   php artisan storage:link
   php artisan migrate --seed
   ```
5. Jalankan development server!
   ```bash
   php artisan serve
   ```
6. Happy develop!

## Tentang Kami
Aplikasi ini dibuat untuk keperluan tugas UAS kuliah.

### Anggota Kelompok
| NIM      | Nama                    |
| -------- | ----------------------- |
| K3519008 | Alviana Hermawati       |
| K3519010 | Alwan Nuha Zaky Fadhila |
| K3519011 | Amalia Rizqi Marwah     |


## External Links
- Brainstorming, User Flow, Wireframe, Figjam
  https://www.figma.com/file/mdowBSwCZJ7dAf3ZTwoNGS/Kuliah%2FPWF%2FUAS%2FJam?node-id=0%3A1
- UI Prototype
  https://www.figma.com/file/4DhIy1PxKlM5nKPTrParTJ/Kuliah%2FPWF%2FUAS%2FUI?node-id=0%3A1
