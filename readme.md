# 🎫 TICKETING_APP-MAIN

TICKETING_APP-MAIN adalah aplikasi ticketing berbasis web yang dibangun menggunakan Laravel Framework. Aplikasi ini dirancang untuk mengelola pemesanan tiket, data event, serta manajemen pengguna dengan menerapkan arsitektur MVC (Model–View–Controller). Project ini dikembangkan sebagai bagian dari pembelajaran dan tugas perkuliahan dalam pengembangan aplikasi web, serta dapat dikembangkan lebih lanjut sesuai kebutuhan.

Aplikasi ini menggunakan PHP dan Laravel sebagai backend utama, MySQL sebagai database, Blade Template Engine untuk tampilan antarmuka, serta Tailwind CSS untuk styling. Pengelolaan dependency dilakukan menggunakan Composer dan NPM, sedangkan version control menggunakan Git dan GitHub.

Struktur direktori project ini mengikuti standar Laravel, yang memudahkan pengembangan, pemeliharaan, dan pengelolaan kode sumber.

Struktur direktori utama:

```bash
TICKETING_APP-MAIN/
├── app/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── views/
│   └── css/
├── routes/
│   └── web.php
├── storage/
├── tests/
├── vendor/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

Untuk menjalankan project ini secara lokal, langkah pertama adalah melakukan clone repository dari GitHub dan masuk ke direktori project.

```bash
git clone https://github.com/NaufalFerdiansyah/TICKETING_APP-MAIN.git
cd TICKETING_APP-MAIN
```

Setelah itu, install seluruh dependency backend menggunakan Composer.

```bash
composer install
```

Kemudian install dependency frontend menggunakan NPM dan jalankan proses build asset.

```bash
npm install
npm run dev
```

Selanjutnya lakukan konfigurasi environment dengan menyalin file `.env.example` menjadi `.env`, lalu generate application key.

```bash
cp .env.example .env
php artisan key:generate
```

Atur konfigurasi database pada file `.env` sesuai dengan database lokal yang digunakan.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ticketing_app
DB_USERNAME=root
DB_PASSWORD=
```

Pastikan database dengan nama `ticketing_app` sudah dibuat. Setelah itu jalankan migrasi database.

```bash
php artisan migrate
```

Jika tersedia data awal, database dapat diisi menggunakan seeder.

```bash
php artisan db:seed
```

Untuk menjalankan aplikasi, gunakan perintah berikut:

```bash
php artisan serve
```

Aplikasi dapat diakses melalui browser pada alamat:

```
http://localhost:8000
```

Contoh routing sederhana yang digunakan dalam aplikasi (`routes/web.php`):

```php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tickets', function () {
    return 'Halaman Daftar Tiket';
});
```

Contoh controller pada aplikasi:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets.index');
    }
}
```

Contoh tampilan menggunakan Blade Template:

```blade
@extends('layouts.app')

@section('content')
    <h1>Daftar Tiket</h1>
@endsection
```

Project ini bersifat terbuka untuk dikembangkan. Kontribusi dapat dilakukan dengan melakukan fork repository, membuat branch baru, melakukan perubahan, dan mengajukan pull request ke repository utama.

Project ini menggunakan lisensi MIT. README ini dibuat dalam satu file Markdown agar seluruh dokumentasi, struktur, serta cara menjalankan project berada dalam satu kesatuan yang utuh dan mudah dipahami.
