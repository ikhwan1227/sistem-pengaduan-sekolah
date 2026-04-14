<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        
         $totalPengaduan = Complaint::where('user_id', $userId)->where('is_draft', 'submitted')->count();
        $totalBulanIni = Complaint::where('user_id', $userId)->where('is_draft', 'submitted')->whereMonth('tanggal', now()->month)->whereYear('tanggal', now()->year)->count();
        $diproses = Complaint::where('user_id', $userId)->where('is_draft', 'submitted')->where('status', 'diproses')->count();
        $selesai = Complaint::where('user_id', $userId)->where('is_draft', 'submitted')->where('status', 'selesai')->count();
        $ditolak = Complaint::where('user_id', $userId)->where('is_draft', 'submitted')->where('status', 'ditolak')->count();
        $draft = Complaint::where('user_id', $userId)->where('is_draft', 'draft')->count();
        
        $pengaduanTerbaru = Complaint::where('user_id', $userId)
            ->where('is_draft', 'submitted')
            ->with(['category', 'feedbacks'])
            ->latest()
            ->take(5)
            ->get();
        
        // Statistik per status untuk chart
        $statusStats = Complaint::where('user_id', $userId)
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();
        
        $chartData = [
            'labels' => $statusStats->pluck('status')->map(function($status) {
                return ucfirst($status);
            }),
            'data' => $statusStats->pluck('total'),
        ];
        
        // Tips acak
        $tips = [
            [
                'title' => 'Deskripsi yang Detail',
                'content' => 'Jelaskan masalah secara detail agar admin bisa memahami dan menindaklanjuti dengan cepat.',
                'icon' => '📝'
            ],
            [
                'title' => 'Sertakan Foto',
                'content' => 'Lampirkan foto bukti untuk memperkuat pengaduan Anda.',
                'icon' => '📸'
            ],
            [
                'title' => 'Pilih Kategori Tepat',
                'content' => 'Pilih kategori yang sesuai agar pengaduan cepat diproses oleh bagian terkait.',
                'icon' => '🏷️'
            ],
            [
                'title' => 'Follow Up',
                'content' => 'Pantau status pengaduan Anda dan jangan ragu untuk bertanya jika belum ada tindak lanjut.',
                'icon' => '👀'
            ],
            [
                'title' => 'Bahasa Santun',
                'content' => 'Sampaikan pengaduan dengan bahasa yang santun dan sopan untuk komunikasi yang baik.',
                'icon' => '💬'
            ],
        ];
        
        $randomTips = $tips[array_rand($tips)];
        
        return view('dashboard.student', compact(
            'totalPengaduan', 'totalBulanIni', 'diproses', 'selesai', 'ditolak', 'pengaduanTerbaru', 'chartData', 'randomTips'
        ));
    }
}