<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IrisController extends Controller
{
    public function index()
    {
        return view('klasifikasi.form');
    }

    public function classify(Request $request)
    {
        $validated = $request->validate([
            'sepal_length' => 'required|numeric',
            'sepal_width'  => 'required|numeric',
            'petal_length' => 'required|numeric',
            'petal_width'  => 'required|numeric',
        ]);

        try {
            $response = Http::post('http://127.0.0.1:5000/predict', $validated);

            if ($response->successful()) {
                $json = $response->json();
                $result = $json['prediction'] ?? 'Tidak diketahui';
                $probabilities = $json['probabilities'] ?? [];
            } else {
                $result = 'Gagal memproses klasifikasi.';
                $probabilities = [];
            }
        } catch (\Exception $e) {
            $result = 'Terjadi kesalahan: ' . $e->getMessage();
            $probabilities = [];
        }

        return view('klasifikasi.form', [
            'result' => $result,
            'input' => $validated,
            'probabilities' => $probabilities
        ]);
    }
}
