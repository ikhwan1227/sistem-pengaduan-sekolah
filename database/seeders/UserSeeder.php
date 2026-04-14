<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@sekolah.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Siswa sample
        $siswa = [
            ['name' => 'Budi Santoso', 'email' => 'budi@siswa.com'],
            ['name' => 'Ani Wijaya', 'email' => 'ani@siswa.com'],
            ['name' => 'Citra Dewi', 'email' => 'citra@siswa.com'],
            ['name' => 'Doni Prasetyo', 'email' => 'doni@siswa.com'],
        ];

        foreach ($siswa as $s) {
            User::create([
                'name' => $s['name'],
                'email' => $s['email'],
                'password' => Hash::make('password'),
                'role' => 'siswa',
            ]);
        }
    }
}