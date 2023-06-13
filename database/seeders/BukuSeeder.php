<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2; $i++) {
            Buku::create([
                'judul' => 'Buku ' . $i,
                'linkGambar' => "buku/sampul/Screenshot_20230521-192300_Chrome_1684684244.jpg",
                'linkBuku' => 'google.com'
            ]);
        }
    }
}
