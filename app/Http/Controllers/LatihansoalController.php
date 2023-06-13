<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LatihansoalController extends Controller
{
    public function index()
    {
        return view('latihan_soal');
    }

    public function latsol(Request $request)
    {
        try {
            // Mengatur waktu eksekusi maksimum
            set_time_limit(300); // Waktu eksekusi diperpanjang menjadi 5 menit (300 detik)

            // Ambil input dari permintaan pengguna
            $input = $request->pesan;

            // Buat permintaan ke API OpenAI menggunakan GuzzleHTTP
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                    ['role' => 'user', 'content' => strval($input)],
                ],
                'max_tokens' => 500,
                'model' => 'gpt-3.5-turbo',
            ]);

            // Periksa jika respons sukses
            if ($response->successful()) {
                // Ambil respons dari API OpenAI
                $output = $response->json();
                $outputText = $output['choices'][0]['message']['content'];

                // Kembalikan respons ke pengguna
                return response()->json(['tes' => $outputText]);
            } else {
                // Tangani respons gagal
                $errorMessage = $response->json('error.message');
                return response()->json(['error' => $errorMessage], 500);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
