<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //METHOD INDEX (LIST + FILTER)
    public function index(Request $request)
    {
        $query = Complaint::with(['user','category','feedbacks']);

        if($request->tanggal){
            $query->whereDate('tanggal', $request->tanggal);
        }

        if($request->category_id){
            $query->where('category_id', $request->category_id);
        }

        if($request->status){
            $query->where('status', $request->status);
        }

        $complaints = $query->latest()->get();
        $categories = Category::all();
        $users = User::where('role','siswa')->get();

        // ========== TAMBAHKAN STATISTIK DI SINI ==========
        
        // Total semua pengaduan (sudah terfilter)
        $totalAll = $complaints->count();
        
        // Statistik berdasarkan status
        $totalPending = $complaints->where('status', 'pending')->count();
        $totalDiproses = $complaints->where('status', 'diproses')->count();
        $totalSelesai = $complaints->where('status', 'selesai')->count();
        $totalDitolak = $complaints->where('status', 'ditolak')->count();
        
        // Hitung pengaduan bulan ini (TERPISAH, tidak terpengaruh filter)
        $totalBulanIni = Complaint::whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->count();
        
        // Kirim semua variabel ke view
        return view('admin.index', compact(
            'complaints', 
            'categories', 
            'users',
            'totalAll',
            'totalPending',
            'totalDiproses',
            'totalSelesai',
            'totalDitolak',
            'totalBulanIni'
        ));
    }

    //UPDATE STATUS
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai'
        ]);

        $c = Complaint::findOrFail($id);
        $c->status = $request->status;
        $c->save();

        return back()->with('success','Status berhasil diupdate');
    }

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        
        // Hapus gambar jika ada
        if ($complaint->image && \Storage::disk('public')->exists($complaint->image)) {
            \Storage::disk('public')->delete($complaint->image);
        }
        
        $complaint->delete(); // Feedback akan otomatis terhapus karena cascade

        return back()->with('success', 'Pengaduan berhasil dihapus');
    }

    public function feedback(Request $request, $id)
    {
        $request->validate([
            'pesan' => 'required|string|max:500'
        ], [
            'pesan.required' => 'Feedback tidak boleh kosong',
            'pesan.max' => 'Feedback maksimal 500 karakter'
        ]);

        // Cek apakah complaint ada
        $complaint = Complaint::findOrFail($id);

        Feedback::create([
            'complaint_id' => $id,
            'admin_id' => auth()->id(),
            'pesan' => $request->pesan,
            'tanggal' => now()
        ]);

        return back()->with('success', 'Feedback berhasil dikirim');
    }
}
