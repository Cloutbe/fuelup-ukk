# ☕ Fuel Up Coffee - Web E-Commerce & POS

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=flat-square&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-00758F?style=flat-square&logo=mysql)
![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-3.x-38B2AC?style=flat-square&logo=tailwind-css)

**Platform E-Commerce Modern untuk Coffee Shop dengan Sistem POS dan Verifikasi Pembayaran Manual**

[🚀 Fitur](#-fitur-unggulan) • [📦 Teknologi](#-teknologi) • [⚙️ Instalasi](#-panduan-instalasi) • [📚 Learning Points](#-learning-points)

</div>

---

## 📖 Tentang Aplikasi

**Fuel Up Coffee** adalah solusi terintegrasi yang dirancang khusus untuk coffee shop modern yang membutuhkan sistem penjualan omnichannel. Aplikasi ini menggabungkan kekuatan **e-commerce** untuk penjualan online dengan fitur **POS (Point of Sale)** untuk transaksi dine-in di tempat.

Dengan sistem verifikasi pembayaran manual melalui upload bukti transfer, aplikasi ini memberikan fleksibilitas tinggi bagi pelanggan yang ingin memesan melalui web, membayar via transfer bank, dan langsung nikmati pesanan mereka di café dengan nomor meja yang ditunjuk.

**Dirancang untuk:**
- ☕ Pemilik Coffee Shop yang ingin digitalisasi penjualan
- 👥 Barista & Staff yang perlu manage pesanan efisien
- 💼 Admin untuk monitoring laporan keuangan real-time
- 🛍️ Pelanggan yang ingin pengalaman berbelanja seamless

---

## 🎯 Fitur Unggulan

### 👨‍💼 Fitur Admin

- ✅ **Dashboard Interaktif**
  - Grafik pendapatan harian/mingguan/bulanan
  - Status pesanan real-time (Pending, Diproses, Selesai)
  - Overview penjualan produk terpopuler

- ✅ **Manajemen Produk**
  - CRUD (Create, Read, Update, Delete) produk dengan mudah
  - Upload gambar produk dengan preview
  - Kategori produk dinamis
  - Manage harga, stok, dan deskripsi

- ✅ **Manajemen Pesanan**
  - Verifikasi bukti transfer pembayaran dari pelanggan
  - Update status pesanan (Pending → Diproses → Selesai)
  - Filter & cari pesanan berdasarkan berbagai kriteria
  - Cetak struk thermal untuk barista

- ✅ **Laporan & Analytics**
  - Download laporan keuangan bulanan dalam format PDF
  - Analisis trend penjualan
  - Detail transaksi per periode

- ✅ **Manajemen User & Kategori**
  - Kelola user pelanggan
  - Setup kategori produk baru
  - Kontrol akses berbasis role

### 👤 Fitur User (Pelanggan)

- ✅ **Landing Page Modern**
  - Hero section yang eye-catching
  - Pencarian produk real-time
  - Filter berdasarkan kategori
  - Display produk yang responsif

- ✅ **Sistem Keranjang Belanja**
  - Add/Remove produk dari cart
  - Update jumlah item
  - Hitung total otomatis
  - Persistent cart (tersimpan di sesi)

- ✅ **Checkout & Pemesanan**
  - Input nomor meja untuk dine-in
  - Pilih metode pembayaran
  - Review pesanan sebelum submit
  - Nomor pesanan otomatis

- ✅ **Verifikasi Pembayaran**
  - Upload bukti transfer bank
  - Validasi format file
  - Real-time status tracking

- ✅ **Manajemen Profil & History**
  - Edit data pribadi
  - Lihat riwayat transaksi
  - Tracking status setiap pesanan
  - Download invoice transaksi

---

## 🛠️ Teknologi

| Komponen | Teknologi | Versi |
|----------|-----------|-------|
| **Backend Framework** | Laravel | 11.x |
| **PHP Version** | PHP | 8.2+ |
| **Database** | MySQL | 8.0+ |
| **Frontend** | Blade Templates | - |
| **CSS Framework** | Tailwind CSS | 3.x (CDN) |
| **PDF Generation** | barryvdh/laravel-dompdf | Latest |
| **Charts & Graphs** | Chart.js | Latest |
| **Version Control** | Git | - |

**Dependencies Utama:**
```
- Laravel Framework 11
- Eloquent ORM (Database)
- Middleware untuk Role-based Access
- Blade Template Engine
- Laravel Artisan CLI
```

---

## 📊 Alur Sistem Pesanan

```
┌─────────────────┐
│  Pelanggan Pesan │
│  (Di Web/Cart)  │
└────────┬────────┘
         │
         ▼
┌─────────────────────┐
│  Input Nomor Meja   │
│  & Checkout         │
└────────┬────────────┘
         │
         ▼
┌─────────────────────┐
│ Upload Bukti        │
│ Transfer Bank       │
└────────┬────────────┘
         │
         ▼
┌──────────────────────┐
│ Admin Verifikasi     │
│ Pembayaran           │
└────────┬─────────────┘
         │
         ▼
┌──────────────────────┐
│ Barista Proses       │
│ Pesanan              │
└────────┬─────────────┘
         │
         ▼
┌──────────────────────┐
│ Selesai & Pelanggan  │
│ Nikmati Pesanan      │
└──────────────────────┘
```

---

## ⚙️ Panduan Instalasi

### Prasyarat
Pastikan sistem Anda sudah memiliki:
- **PHP 8.2 atau lebih tinggi**
- **Composer** (Package Manager PHP)
- **MySQL 8.0 atau lebih tinggi**
- **Git** (untuk version control)
- **Node.js & npm** (optional, untuk frontend development)

### Step-by-Step Installation

#### 1️⃣ Clone Repository
```bash
git clone https://github.com/yourusername/fuelup-ukk.git
cd fuelup-ukk
```

#### 2️⃣ Install Dependencies PHP
```bash
composer install
```
> Composer akan mengunduh semua library dan dependensi yang diperlukan aplikasi.

#### 3️⃣ Setup Environment File
```bash
# Copy .env.example menjadi .env
cp .env.example .env
```

Buka file `.env` dan sesuaikan konfigurasi database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fuelup_coffee
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

Juga set konfigurasi email dan storage:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password

FILESYSTEM_DISK=public
```

#### 4️⃣ Generate Application Key
```bash
php artisan key:generate
```
> Perintah ini akan menghasilkan encryption key untuk aplikasi Laravel Anda.

#### 5️⃣ Migrasi Database
```bash
php artisan migrate
```

Jika ingin dengan seeder data (User Admin & Sample Data):
```bash
php artisan migrate --seed
```

#### 6️⃣ Setup Storage Link ⭐ PENTING
```bash
php artisan storage:link
```

**Mengapa penting?**
- Perintah ini membuat symbolic link dari `storage/app/public` ke `public/storage`
- Tanpa ini, **gambar produk tidak akan tampil** di browser
- File upload akan tersimpan dengan baik tapi tidak bisa diakses public
- Pastikan direktori `storage` memiliki write permission

#### 7️⃣ Jalankan Development Server
```bash
php artisan serve
```

Aplikasi akan berjalan di: **http://127.0.0.1:8000**

Jika ingin menjalankan di port tertentu:
```bash
php artisan serve --port=8080
```

---

## 🔐 Akun Demo

Gunakan kredensial berikut untuk testing:

### 👨‍💼 Admin Account
| Field | Value |
|-------|-------|
| Email | admin@fuelup.com |
| Password | password |
| Role | Admin |
| Akses | Dashboard, Manage Produk, Verify Pembayaran, Laporan |

### 👤 User Account (Pelanggan)
| Field | Value |
|-------|-------|
| Email | user@fuelup.com |
| Password | password |
| Role | Customer |
| Akses | Belanja, Cart, Checkout, Upload Bukti |

> ⚠️ **Catatan:** Akun demo ini hanya tersedia setelah menjalankan `php artisan migrate --seed`.

---

## 📚 Learning Points

Dokumentasi kode ini mencakup berbagai konsep dan best practice Laravel yang berguna untuk pembelajaran:

### 1. **Role-Based Access Control (RBAC) dengan Middleware**
Implementasi middleware untuk membedakan akses admin dan user:
```php
// Contoh: Hanya admin yang bisa akses dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
});
```

### 2. **Eloquent ORM & Relasi Model**
Memahami relasi antar tabel (One-to-Many, Many-to-Many):
- **Product** → **Category** (Many-to-One)
- **Order** → **OrderItem** (One-to-Many)
- **Order** → **User** (Many-to-One)
- **Cart** → **Product** (Many-to-Many)

### 3. **Integrasi DomPDF untuk Generate PDF**
Cara menggunakan `barryvdh/laravel-dompdf` untuk:
- Generate invoice PDF
- Membuat laporan keuangan
- Export struk thermal

Contoh:
```php
$pdf = PDF::loadView('invoices.receipt', $data);
return $pdf->download('invoice-' . $order->id . '.pdf');
```

### 4. **Chart.js untuk Visualisasi Data**
Implementasi grafik interaktif di dashboard:
- Bar Chart untuk pendapatan harian
- Line Chart untuk trend penjualan
- Pie Chart untuk top products

### 5. **File Upload & Storage Management**
Menangani upload file gambar produk:
- Validasi format & ukuran file
- Simpan ke storage
- Retrieve gambar dengan symbolic link

### 6. **Database Migrations & Seeders**
- Membuat struktur database dengan migrations
- Populate data awal dengan seeders
- Rollback & fresh migration

### 7. **Form Validation & Error Handling**
Validasi input form dengan Laravel validation:
```php
$validated = $request->validate([
    'product_name' => 'required|string|max:255',
    'price' => 'required|numeric|min:0',
    'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
]);
```

### 8. **Authentication & Authorization**
- Laravel's built-in authentication
- Password hashing & security
- Session management

### 9. **RESTful Route & Controller Pattern**
Implementasi best practice routing dan controller organization

### 10. **Blade Template Inheritance & Components**
- Master layout template
- Template extending & including
- Reusable blade components

---

## 📁 Struktur Folder

```
fuelup-ukk/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Controller untuk handling logic
│   │   └── Middleware/       # Middleware untuk auth & roles
│   ├── Models/               # Eloquent Models (Product, Order, dll)
│   └── Providers/            # Service providers
├── database/
│   ├── migrations/           # Database schema files
│   ├── seeders/              # Data seeding
│   └── factories/            # Factory untuk testing
├── resources/
│   ├── views/
│   │   ├── admin/            # Admin dashboard & pages
│   │   ├── client/           # User/customer pages
│   │   ├── auth/             # Authentication pages
│   │   └── layouts/          # Master layouts
│   ├── css/                  # CSS files (Tailwind)
│   └── js/                   # JavaScript files
├── routes/
│   └── web.php               # Web routes definition
├── public/                   # Public accessible files
│   └── storage → ../storage/app/public  # Symbolic link
├── storage/
│   ├── app/public/           # User uploads (images, docs)
│   └── logs/                 # Application logs
├── config/                   # Configuration files
├── vendor/                   # Composer dependencies
├── .env                      # Environment configuration
├── composer.json             # PHP dependencies
└── README.md                 # Documentation (file ini)
```

---

## 🚀 Tips & Tricks

### Development Mode
Untuk development yang lebih nyaman, jalankan multiple terminals:

**Terminal 1 - Laravel Server:**
```bash
php artisan serve
```

**Terminal 2 - Queue Worker** (jika dibutuhkan):
```bash
php artisan queue:work
```

### Database Reset
Jika ingin reset database ke state awal:
```bash
php artisan migrate:refresh --seed
```

### Clear Cache
Setelah melakukan perubahan konfigurasi:
```bash
php artisan cache:clear
php artisan config:cache
php artisan view:clear
```

### Generate New Controller
```bash
php artisan make:controller YourControllerName
```

### Create Migration
```bash
php artisan make:migration create_table_name
```

---

## 🐛 Troubleshooting

| Masalah | Solusi |
|---------|--------|
| **Gambar produk tidak muncul** | Jalankan `php artisan storage:link` |
| **Database connection error** | Periksa `.env` DB credentials, pastikan MySQL running |
| **Permission denied di storage** | Set permission: `chmod -R 775 storage/` |
| **Composer install error** | Update Composer: `composer self-update` |
| **Key not set** | Jalankan: `php artisan key:generate` |
| **Blade template error** | Clear cache: `php artisan view:clear` |

---

## 📝 Catatan Pengembang

- **Scaffold Structure:** Aplikasi menggunakan struktur standar Laravel dengan separation of concerns
- **Security:** Selalu gunakan HTTPS di production, aktifkan CSRF protection
- **Performance:** Gunakan eager loading (`with()`) untuk query optimization
- **Testing:** Tulis unit test untuk critical logic
- **Documentation:** Maintain code documentation dengan PHPDoc comments

---

## 📞 Support & Kontribusi

Jika menemukan bug atau punya saran improvement, silakan buat issue atau pull request.

---

## 📄 Lisensi

Proyek ini adalah bagian dari tugas UKK/Skripsi. Gunakan sesuai kebutuhan akademik.

---

<div align="center">

**Dibuat dengan ❤️ untuk Fuel Up Coffee**

*Last Updated: November 2025*

</div>
