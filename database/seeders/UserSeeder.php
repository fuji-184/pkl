<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
          'name' => 'Admin',
          'email' => 'akunadminrahasia@gmail.com',
          'password' => Hash::make('noname123'),
          'role' => 'admin'
          ]);
        
     /*   for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password'),
                'role' => 'user'
            ]);
        } */
    }
}
