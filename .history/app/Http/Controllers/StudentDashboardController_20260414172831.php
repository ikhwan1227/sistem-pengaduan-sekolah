<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentDashboardController extends Controller
{
    // Di app/Http/Controllers/StudentDashboardController.php
public function index()
{
    $totalPengaduan = 10;
    $totalBulanIni = 5;
    $diproses = 2;
    $selesai = 3;
    $ditolak = 1;
    $draft = 0;
    $pengaduanTerbaru = collect([]);
    
    return view('student.dashboard', compact(
        'totalPengaduan', 
        'totalBulanIni', 
        'diproses', 
        'selesai', 
        'ditolak', 
        'draft',
        'pengaduanTerbaru'
    ));
}
}