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
    // Return sederhana untuk testing
    return response('Dashboard berhasil diakses', 200);
}
}