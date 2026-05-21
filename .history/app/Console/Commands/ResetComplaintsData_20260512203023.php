<?php

namespace App\Console\Commands;

use App\Models\Complaint;
use App\Models\Feedback;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResetComplaintsData extends Command
{
    protected $signature = 'complaints:reset';
    protected $description = 'Menghapus semua data pengaduan, feedback, dan notifikasi (Akun tetap aman)';

    public function handle()
    {
        // Hapus semua gambar dari storage
        $complaints = Complaint::all();
        $deletedImages = 0;
        
        foreach ($complaints as $complaint) {
            if ($complaint->image && Storage::disk('public')->exists($complaint->image)) {
                Storage::disk('public')->delete($complaint->image);
                $deletedImages++;
            }
        }

        // Nonaktifkan foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        // Hapus data
        Feedback::truncate();
        DB::table('notifications')->truncate();
        Complaint::truncate();
        
        // Aktifkan kembali foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Reset AUTO_INCREMENT
        DB::statement('ALTER TABLE complaints AUTO_INCREMENT = 1');
        DB::statement('ALTER TABLE feedbacks AUTO_INCREMENT = 1');
        DB::statement('ALTER TABLE notifications AUTO_INCREMENT = 1');

        $this->info('✅ Semua data berhasil direset!');
        $this->info('📁 Gambar terhapus: ' . $deletedImages . ' file');
        $this->info('📋 Feedback terhapus: semua');
        $this->info('🔔 Notifikasi terhapus: semua');
        $this->info('📄 Laporan terhapus: semua');
        $this->info('👥 Akun pengguna: TETAP AMAN');
    }
}