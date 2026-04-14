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

    // Simpan sebagai draft
    public function saveDraft(Request $request)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'location' => 'nullable|string|max:255',
        ]);

        Complaint::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'judul' => $request->judul ?? 'Draft',
            'deskripsi' => $request->deskripsi,
            'location' => $request->location,
            'status' => 'pending',
            'is_draft' => 'draft',
            'tanggal' => now()
        ]);

        return back()->with('success', 'Draft pengaduan berhasil disimpan');
    }

    // Hapus draft
    public function deleteDraft($id)
    {
        $draft = Complaint::where('user_id', auth()->id())
            ->where('id', $id)
            ->where('is_draft', 'draft')
            ->firstOrFail();
        
        $draft->delete();
        
        return back()->with('success', 'Draft berhasil dihapus');
    }

    // Edit draft (load data ke form)
    public function editDraft($id)
    {
        $draft = Complaint::where('user_id', auth()->id())
            ->where('id', $id)
            ->where('is_draft', 'draft')
            ->firstOrFail();
        
        $categories = Category::all();
        $complaints = Complaint::where('user_id', auth()->id())
            ->where('is_draft', 'submitted')
            ->get();
        $drafts = Complaint::where('user_id', auth()->id())
            ->where('is_draft', 'draft')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('complaint.index', compact('categories', 'complaints', 'drafts', 'draft'));
    }
}
