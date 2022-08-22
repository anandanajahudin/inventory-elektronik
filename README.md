# inventory-elektronik

## Overview

inventory-elektronik adalah project yang digunakan untuk melakukan penyimpanan data inventory

## Cara Instalasi Project

### Instalasi Project

1. Clone project dari repository github terlebih dahulu dengan cara ketik di command-line anda

```
git clone https://github.com/anandanajahudin/inventory-elektronik.git
```

Atau anda bisa mengunduh berupa file .zip dengan cara bukalah link https://github.com/anandanajahudin/inventory-elektronik.git

Kemudian klik tombol hijau "Code", lalu pilih "Download ZIP"

2. Kemudian bukalah project di IDE anda lalu buka terminal atau command-line

3. Instalasi composer terlebih dahulu, jalankan perintah

```
composer install
```

### Instalasi Database

1. Buatlah database MySQL dengan nama "inventoryku"

2. Ubah file .env.example menjadi .env

3. Kemudian bukalah file .env

Lalu setting file env seperti di bawah ini:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventoryku
DB_USERNAME=root
DB_PASSWORD=
```

(username dan password database, disesuaikan dengan hak akses yang anda miliki di database anda)

4. Lalu jalankan perintah command-line

```
php artisan key:generate
```

Untuk mendeklarasikan kunci di dalam file .env agar project dapat dijalankan

5. Lalu jalankan migrasi database, jalankan perintah

```
php artisan migrate"
```

6. Setelah itu jalankan seeder agar dapat masuk sebagai admin

Jalankan perintah

```
php artisan db:seed
```

### Menjalankan Project

1. Kemudian jalankan file project dengan perintah

```
php artisan serve
```
