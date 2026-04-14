<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Fasilitas Belajar'],
            ['nama_kategori' => 'Kebersihan'],
            ['nama_kategori' => 'Keamanan'],
            ['nama_kategori' => 'Guru & Karyawan'],
            ['nama_kategori' => 'Kantin'],
            ['nama_kategori' => 'Perpustakaan'],
            ['nama_kategori' => 'Olahraga'],
            ['nama_kategori' => 'Lainnya'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}