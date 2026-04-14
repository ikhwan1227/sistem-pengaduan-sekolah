<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Category;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    //Method tampil form
    public function index()
    {
        $categories = Category::all();
        $complaints = Complaint::where('user_id', auth()->id())->get();

        return view('complaint.index', compact('categories','complaints'));
    }

    //methode simpan data
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        Complaint::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'pending',
            'tanggal' => now()
        ]);

        return back()->with('success','Pengaduan berhasil dikirim');
    }
}
