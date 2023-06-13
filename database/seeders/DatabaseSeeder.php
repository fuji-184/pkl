<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PegawaiSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\BukuSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
$this->call([
        UserSeeder::class,
        PostSeeder::class,
        PegawaiSeeder::class,
        BukuSeeder::class
    ]);
    }
}
