<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['nama_kategori' => 'Fasilitas']);
        Category::create(['nama_kategori' => 'Kebersihan']);
        Category::create(['nama_kategori' => 'Keamanan']);
    }
}