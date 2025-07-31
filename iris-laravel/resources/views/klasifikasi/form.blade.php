<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Klasifikasi Bunga Iris</title>
    <link rel="stylesheet" href="{{ asset('assets/css/iris.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="container">
    <div class="flex-box">
        <!-- Form Input -->
        <div class="form-section">
            <form method="POST" action="/klasifikasi">
                @csrf

                <label>Sepal Length: <span id="sepalLengthVal">0</span></label>
                <input type="range" name="sepal_length" min="0" max="10" step="0.1" oninput="sepalLengthVal.innerText = this.value" required>

                <label>Sepal Width: <span id="sepalWidthVal">0</span></label>
                <input type="range" name="sepal_width" min="0" max="10" step="0.1" oninput="sepalWidthVal.innerText = this.value" required>

                <label>Petal Length: <span id="petalLengthVal">0</span></label>
                <input type="range" name="petal_length" min="0" max="10" step="0.1" oninput="petalLengthVal.innerText = this.value" required>

                <label>Petal Width: <span id="petalWidthVal">0</span></label>
                <input type="range" name="petal_width" min="0" max="10" step="0.1" oninput="petalWidthVal.innerText = this.value" required>

                <button type="submit">Klasifikasikan</button>
            </form>
        </div>

        <!-- Output Section -->
        <div class="result-section">
            @isset($result)
                @php
                    $gambar = match(strtolower($result)) {
                        'setosa' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Irissetosa1.jpg/400px-Irissetosa1.jpg',
                        'versicolor' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Blue_Flag%2C_Ottawa.jpg/400px-Blue_Flag%2C_Ottawa.jpg',
                        'virginica' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Iris_virginica_2.jpg/400px-Iris_virginica_2.jpg',
                        default => null
                    };
                @endphp

                @if ($gambar)
                    <div class="image-container">
                        <img src="{{ $gambar }}" alt="Gambar Bunga {{ $result }}">
                    </div>
                @endif

                <div class="prediksi-text">Spesies: {{ ucfirst($result) }}</div>

                <h3 style="text-align:center;">Hasil Klasifikasi</h3>
                <table class="tabel">
                    <thead>
                        <tr>
                            <th>Sepal Length</th>
                            <th>Sepal Width</th>
                            <th>Petal Length</th>
                            <th>Petal Width</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $input['sepal_length'] }}</td>
                            <td>{{ $input['sepal_width'] }}</td>
                            <td>{{ $input['petal_length'] }}</td>
                            <td>{{ $input['petal_width'] }}</td>
                        </tr>
                    </tbody>
                </table>

                <h4 style="text-align:center;">Prediksi Probabilitas</h4>
                <table class="tabel">
                    <thead>
                        <tr><th>Spesies</th><th>Probabilitas</th></tr>
                    </thead>
                    <tbody>
                        @foreach($probabilities as $species => $prob)
                            <tr>
                                <td>{{ ucfirst($species) }}</td>
                                <td>{{ number_format($prob * 100, 2) }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="text-align:center;">Silakan masukkan data untuk mendapatkan hasil klasifikasi.</p>
            @endisset
        </div>
    </div>
</div>

</body>
</html>
