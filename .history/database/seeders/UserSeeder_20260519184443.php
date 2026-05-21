<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Sekolah', // Ganti dengan nama yang Anda inginkan
            'email' => 'admin@sekolah.com', // Ganti dengan email admin
            'password' => Hash::make('password'), // Ganti dengan password yang kuat
            'role' => 'admin', // Sangat penting: ini yang membedakan sebagai admin
        ]);
    }
}