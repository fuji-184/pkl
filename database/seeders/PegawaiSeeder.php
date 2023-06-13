<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Pegawai::create([
          'nama_beserta_gelar' => 'Pegawai ' . $i . ' .SPD',
          'nip' => '123456789',
          'jabatan' => 'guru',
          'tanggal_lahir' => '1995-10-20',
          'alamat' => 'Klaten',
          'no_hp' => '08123456789',
          'foto' => 'media/Screenshot_20230521-192300_Chrome_1684684244.jpg'
          ]);
        }
    }
}
