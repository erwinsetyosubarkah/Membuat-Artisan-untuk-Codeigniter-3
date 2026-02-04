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

### 2️⃣ Environment Requirement
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

### 3️⃣ Struktur Folder
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

### 4️⃣ Cara Menjalankan CI_Artisan
Bagian ini dibagi dua agar jelas.

#### 🔹 MODE A — TANPA ALIAS (DEFAULT CODEIGNITER 3)
Mode ini tidak memerlukan konfigurasi tambahan.

Format Perintah
```
php index.php cli/ci_artisan <command> <parameter>
```

Contoh
```
php index.php cli/ci_artisan make:model User
```

📌 Cocok untuk:
* Windows
* Shared hosting
* Environment terbatas

####🔹 MODE B — MENGGUNAKAN ALIAS (ci) ⭐ RECOMMENDED
Mode ini hanya shortcut, fungsinya sama persis.

Membuat Alias (Linux / macOS)
```
sudo nano /usr/local/bin/ci
```

Isi:
```
#!/bin/bash
php /path/ke/project/index.php cli/ci_artisan "$@"
```


Aktifkan:
```
sudo chmod +x /usr/local/bin/ci
```

Format Perintah
```
ci <command> <parameter>
```

Contoh
```
ci make:model User
```


### 5️⃣ Daftar Command & Contoh Penggunaan
Setiap command ditampilkan dalam dua mode.

---

🔹 ``` make:model ```

Membuat file model CI3.
Tanpa Alias
```
php index.php cli/ci_artisan make:model User
```


Dengan Alias
```
ci make:model User
```


Output:
```
application/models/User_model.php
```

---

🔹 ```make:controller```

Tanpa Alias
```
php index.php cli/ci_artisan make:controller User
```


Dengan Alias
```
ci make:controller User
```


Output:
```
application/controllers/User.php
```

---

🔹 ```make:request```

Membuat class validasi form (Form Request).
Tanpa Alias
```
php index.php cli/ci_artisan make:request StoreUser
```


Dengan Alias
```
ci make:request StoreUser
```


Output:
```
application/requests/StoreUser_request.php
```

---

🔹 ```make:migration```

Tanpa Alias
```
php index.php cli/ci_artisan make:migration create_users
```


Dengan Alias
```
ci make:migration create_users
```


Output:
```
application/migrations/YYYYMMDDHHMMSS_create_users.php
```

---

🔹 ```db:migrate```

Menjalankan seluruh migration.
Tanpa Alias
```
php index.php cli/ci_artisan db:migrate
```


Dengan Alias
```
ci db:migrate
```

---

🔹 ```make:crud```

Generate CRUD dasar (Controller + Model + View).
Tanpa Alias
```
php index.php cli/ci_artisan make:crud users
```


Dengan Alias
```
ci make:crud users
```

---

🔹 ```auto-CRUD```

CRUD lengkap dengan struktur MVC.
Tanpa Alias
```
php index.php cli/ci_artisan auto:crud users
```

Dengan Alias
```
ci auto:crud users
```

---

🔹 ```make:api```

Tanpa Alias
```
php index.php cli/ci_artisan make:api User
```

Dengan Alias
```
ci make:api User
```

---

🔹 ```make:auth```

Tanpa Alias
```
php index.php cli/ci_artisan make:auth
```


Dengan Alias
```
ci make:auth
```

---

🔹 ```make:policy```

Tanpa Alias
```
php index.php cli/ci_artisan make:policy UserPolicy
```

Dengan Alias
```
ci make:policy UserPolicy
```

---

🔹 ```make:middleware```

Tanpa Alias
```
php index.php cli/ci_artisan make:middleware Auth
```


Dengan Alias
```
ci make:middleware Auth
```

---

🔹 ```db:seed```

Tanpa Alias
```
php index.php cli/ci_artisan db:seed UserSeeder
```


Dengan Alias
```
ci db:seed UserSeeder
```

---

🔹 ```cache:clear```

Tanpa Alias
```
php index.php cli/ci_artisan cache:clear
```


Dengan Alias
```
ci cache:clear
```

---

🔹 ```route:list```

Tanpa Alias
```
php index.php cli/ci_artisan route:list
```


Dengan Alias
```
ci route:list
```
---

📌 Sangat disarankan untuk:
* Daily development
* Tim developer
* Proyek jangka panjang


### 6️⃣ Best Practice Penggunaan
✅ Disarankan
* Gunakan request class untuk validasi
* Gunakan policy untuk otorisasi
* Gunakan middleware (hook) untuk auth
* Gunakan alias (ci) saat development

❌ Hindari
* Query database di controller
* Validasi langsung di controller
* Akses CI_Artisan lewat browser

### 7️⃣ Kesimpulan
Dengan CI_Artisan:
* CodeIgniter 3 menjadi lebih modern
* Struktur kode lebih rapi & konsisten
* Development lebih cepat dan terstandar

Cocok untuk proyek besar & tim
