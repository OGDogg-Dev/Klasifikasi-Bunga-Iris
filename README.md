# 🌸 Klasifikasi Bunga Iris

Proyek ini terdiri dari dua bagian:

- **iris-laravel** → Aplikasi Laravel untuk upload gambar & menampilkan hasil prediksi.
- **iris-ml-api** → API Python (Flask) untuk memproses gambar tulisan tangan.

---

## 📂 Struktur Proyek

iris-laravel/ # Aplikasi Laravel (Frontend & Backend)
iris-ml-api/ # API Python (Flask)


---

## 🚀 Instalasi Laravel (iris-laravel)

1. Masuk ke folder Laravel:

   ```bash
   cd iris-laravel

    Install dependency:

composer install

Copy file konfigurasi environment:

cp .env.example .env

Generate application key:

php artisan key:generate

Jalankan Laravel server:

    php artisan serve

    Akses aplikasi di browser:

    http://127.0.0.1:8000/klasifikasi

🤖 Instalasi API Python (iris-ml-api)

    Masuk ke folder API:

cd iris-ml-api

(Opsional) Buat virtual environment dan aktifkan:

    Mac/Linux:

python -m venv venv
source venv/bin/activate

Windows:

    python -m venv venv
    venv\Scripts\activate

Install dependencies:

pip install -r requirements.txt

Jalankan API:

    python app.py

    API berjalan di:
    http://127.0.0.1:5000/predict

📌 Cara Penggunaan

    Jalankan iris-ml-api di port 5000

    Jalankan iris-laravel di port 8000

    Buka http://127.0.0.1:8000/klasifikasi

    Upload gambar tulisan tangan

    Hasil prediksi akan muncul di halaman Laravel

📷 Contoh Output

    Input: Gambar tulisan tangan

    Output: "families", "hello", "MOVE" (hasil prediksi teks)

✅ Teknologi yang Digunakan

    Laravel 11

    Python 3 + Flask

    Pillow (Image Processing)

    Tailwind CSS (opsional untuk styling)

📦 Requirements Python

File iris-ml-api/requirements.txt berisi:

Flask==3.0.3
pillow==10.4.0
numpy==1.26.4
joblib==1.4.2

🔧 Troubleshooting

    Laravel error GET/POST:
    Pastikan route /klasifikasi mendukung method GET & POST.

Terima kasih sudah menggunakan proyek ini!
