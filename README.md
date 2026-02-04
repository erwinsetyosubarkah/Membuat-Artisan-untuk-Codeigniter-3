# DOKUMENTASI LENGKAP
## Membuat artisan pada Codeigniter 3

### 1️⃣ Pendahuluan
#### Apa itu CI_Artisan?
___CI_Artisan___ adalah tool Command Line Interface (CLI) untuk CodeIgniter 3 yang berfungsi seperti php artisan pada Laravel.

#### CI_Artisan menyediakan:
* Generator file (model, controller, request, migration, dll)
* Auto CRUD (MVC)
* Database migration & seeding
* API scaffolding
* Auth, policy, dan middleware berbasis Hook CI3
  
#### Tujuan Penggunaan
* Mempercepat proses development
* Mengurangi penulisan boilerplate manual
* Menyeragamkan struktur kode
* Membuat CI3 terasa lebih modern & maintainable

⚠️ CI_Artisan hanya bisa dijalankan lewat CLI, tidak bisa diakses dari browser.

## 2️⃣ Environment Requirement
#### Sistem Operasi
* Linux (direkomendasikan)
* macOS
* Windows (CMD / PowerShell)

#### Software
| Komponen    | Versi Minimal                |
| ----------- | ---------------------------- |
| PHP         | 7.2                          |
| CodeIgniter | 3.1.x                        |
| Database    | MySQL / MariaDB / PostgreSQL |
| Web Server  | Apache / Nginx               |

#### PHP Extension yang Dibutuhkan
* mysqli atau pdo
* mbstring
* openssl

#### Permission Folder
Pastikan folder berikut writable:
```
application/cache/
application/migrations/
application/views/
application/models/
application/controllers/
```

## 3️⃣ Struktur Folder
Setelah CI_Artisan digunakan, struktur umum akan menjadi:
```
application/
├── controllers/
│   ├── cli/
│   │   └── CI_Artisan.php
│   ├── User.php
│   └── api/
│       └── User.php
│
├── models/
│   └── User_model.php
│
├── views/
│   └── users/
│       ├── index.php
│       ├── create.php
│       └── edit.php
│
├── migrations/
│   └── 20260204123045_create_users.php
│
├── requests/
│   └── StoreUser_request.php
│
├── hooks/
│   └── Auth_hook.php
│
└── cache/

```
