<?php

namespace App\Http\Controllers;

use App\Models\Complaint;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        
        // Data statis untuk testing
        $totalPengaduan = Complaint::where('user_id', $userId)->where('is_draft', 'submitted')->count();
        $totalBulanIni = Complaint::where('user_id', $userId)
            ->where('is_draft', 'submitted')
            ->whereMonth('tanggal', now()->month)
            ->count();
        $diproses = Complaint::where('user_id', $userId)->where('is_draft', 'submitted')->where('status', 'diproses')->count();
        $selesai = Complaint::where('user_id', $userId)->where('is_draft', 'submitted')->where('status', 'selesai')->count();
        $ditolak = Complaint::where('user_id', $userId)->where('is_draft', 'submitted')->where('status', 'ditolak')->count();
        $draft = Complaint::where('user_id', $userId)->where('is_draft', 'draft')->count();
        
        $pengaduanTerbaru = Complaint::where('user_id', $userId)
            ->where('is_draft', 'submitted')
            ->latest()
            ->limit(5)
            ->get();
        
        return view('dashboard.student', compact(
            'totalPengaduan', 'totalBulanIni', 'diproses', 'selesai', 'ditolak', 'draft', 'pengaduanTerbaru'
        ));
    }
}