# SMP Indonesia

## Tentang Project ini

Aplikasi ini dikembangkan untuk mengelola data Nilai, Siswa, Kelas, Mata pelajaran, dan data Guru. dengan beberapa fitur diantaranya.

- Menggunakan template SB-Admin.
- Route yang cukup Simple.
- Validation & Notification.
- Multiple User Login.

Aplikasi ini juga biasanya digunakan untuk bahan LSP ujikom.

## Cara Instalasi

1. Clone repository
```
git clone https://github.com/oktapiancaw/SMP-Indonesia.git
```
2. Download package yang di butuhkan
```
composer install
```
3. Setting .env
4. Buat database sesuai dengan .env
5. Jalankan migrate
```
php artisan migrate
```
6. Masukan data dummy untuk guru
```
php artisan db:seed --class=DummyAccounts
```
7. Jalankan serve
```
php artisan serve
```

## Creator

Username github : [Oktapian Caw](https://github.com/oktapiancaw/).

Website : [oktapiancaw.github.io](http://oktapiancaw.github.io/)

