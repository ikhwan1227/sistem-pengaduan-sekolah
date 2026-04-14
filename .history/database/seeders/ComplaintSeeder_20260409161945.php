<?php

namespace Database\Seeders;

use App\Models\Complaint;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ComplaintSeeder extends Seeder
{
    public function run(): void
    {
        $siswa = User::where('role', 'siswa')->get();
        $categories = Category::all();

        $complaints = [
            [
                'judul' => 'AC Ruang Kelas Rusak',
                'deskripsi' => 'AC di ruang kelas X IPA 1 sudah tidak dingin selama 3 minggu. Mohon segera diperbaiki karena sangat mengganggu proses belajar.',
                'status' => 'pending',
            ],
            [
                'judul' => 'Kebersihan Toilet',
                'deskripsi' => 'Toilet lantai 2 sangat kotor dan bau. Tidak ada air mengalir untuk menyiram.',
                'status' => 'diproses',
            ],
            [
                'judul' => 'Penerangan Lapangan',
                'deskripsi' => 'Lampu penerangan di lapangan basket mati semua, jadi tidak bisa latihan sore.',
                'status' => 'selesai',
            ],
            [
                'judul' => 'Wifi Sekolah Lemot',
                'deskripsi' => 'Koneksi wifi di perpustakaan sangat lambat, susah untuk mengakses materi pembelajaran online.',
                'status' => 'diproses',
            ],
            [
                'judul' => 'Kursi Belajar Banyak Rusak',
                'deskripsi' => 'Di kelas XI IPS 2, ada 10 kursi yang kakinya patah. Kurangnya kursi membuat siswa terpaksa belajar sambil berdiri.',
                'status' => 'pending',
            ],
        ];

        foreach ($complaints as $index => $complaint) {
            Complaint::create([
                'user_id' => $siswa->random()->id,
                'category_id' => $categories->random()->id,
                'judul' => $complaint['judul'],
                'deskripsi' => $complaint['deskripsi'],
                'status' => $complaint['status'],
                'tanggal' => now()->subDays(rand(1, 30)),
            ]);
        }

        // Buat 10 complaint random tambahan
        Complaint::factory(10)->create();
    }
}