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
            'category_id' => 'required|exists:categories,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|min:10',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('complaints', 'public');
        }

        Complaint::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'location' => $request->location,
            'image' => $imagePath,
            'status' => 'pending',
            'is_draft' => 'submitted',
            'tanggal' => now()
        ]);

        return redirect()->route('complaint.index')->with('success', 'Pengaduan berhasil dikirim');
    }

    public function history()
    {
        $complaints = Complaint::where('user_id', auth()->id())
            ->with(['category', 'feedbacks'])
            ->latest()
            ->paginate(10);
        
        return view('complaint.history', compact('complaints'));
    }
}
