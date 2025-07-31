# 🌸**Klasifikasi Bunga Iris**

Proyek ini terdiri dari dua bagian:

    iris-laravel → Aplikasi Laravel untuk upload gambar & menampilkan hasil prediksi.

    iris-ml-api → API Python (Flask + Tesseract OCR) untuk memproses gambar tulisan tangan.

📂 Struktur Proyek

iris-laravel/       # Aplikasi Laravel (Frontend & Backend)
iris-ml-api/        # API Python (Flask OCR)

🚀 Instalasi Laravel (iris-laravel)

1️⃣ Masuk ke folder Laravel:

cd iris-laravel

2️⃣ Install dependency:

composer install

3️⃣ Copy .env.example ke .env:

cp .env.example .env

4️⃣ Generate key:

php artisan key:generate

5️⃣ Jalankan Laravel:

php artisan serve

✅ Akses di browser:
👉 http://127.0.0.1:8000/klasifikasi
🤖 Instalasi API Python (iris-ml-api)

1️⃣ Masuk ke folder API:

cd iris-ml-api

2️⃣ Buat virtual environment (opsional):

python -m venv venv
source venv/bin/activate       # Mac/Linux
venv\Scripts\activate          # Windows

3️⃣ Install dependency:

pip install -r requirements.txt

4️⃣ Pastikan Tesseract OCR sudah terinstall:

    Windows: Install dari https://github.com/tesseract-ocr/tesseract
    Pastikan path: C:\Program Files\Tesseract-OCR\tesseract.exe

5️⃣ Jalankan API:

python app.py

✅ API berjalan di:
👉 http://127.0.0.1:5000/predict
📌 Cara Penggunaan

1️⃣ Jalankan iris-ml-api di port 5000
2️⃣ Jalankan iris-laravel di port 8000
3️⃣ Buka http://127.0.0.1:8000/klasifikasi
4️⃣ Upload gambar tulisan tangan
5️⃣ Hasil prediksi akan muncul di halaman Laravel
📷 Contoh Output

    Input: Gambar tulisan tangan

    Output: "families", "hello", "MOVE"

✅ Teknologi yang Digunakan

    Laravel 11

    Python 3 + Flask

    Tesseract OCR

    Pillow (Image Processing)

    Tailwind (opsional untuk styling)

📦 Requirements Python

iris-ml-api/requirements.txt

Flask==3.0.3
pillow==10.4.0
pytesseract==0.3.10
numpy==1.26.4
joblib==1.4.2

🔧 Troubleshooting

    Tesseract tidak ditemukan: Pastikan path sudah benar di app.py

    Prediksi kosong: Pastikan gambar jelas & gunakan preprocessing bawaan

    Laravel error GET/POST: Pastikan route /klasifikasi memiliki GET & POST
