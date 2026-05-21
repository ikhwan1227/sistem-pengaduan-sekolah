<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Category;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    // Method tampil form + histori + draft
    public function index()
    {
        $categories = Category::all();
        
        $complaints = Complaint::where('user_id', auth()->id())
            ->where('is_draft', 'submitted')
            ->with(['category', 'feedbacks'])
            ->latest()
            ->paginate(10);
        
        $drafts = Complaint::where('user_id', auth()->id())
            ->where('is_draft', 'draft')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('complaint.index', compact('categories', 'complaints', 'drafts'));
    }

    /**
     * ✅ METHOD PRIVATE UNTUK MENYIMPAN PENGADUAN (MENGHINDARI DUPLIKASI)
     * @param Request $request
     * @param bool $isDraft
     * @return Complaint
     */
    private function saveComplaint(Request $request, bool $isDraft = false): Complaint
    {
        $data = [
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'judul' => $request->judul ?? 'Draft',
            'deskripsi' => $request->deskripsi,
            'location' => $request->location,
            'status' => 'pending',
            'is_draft' => $isDraft ? 'draft' : 'submitted',
            'tanggal' => now()
        ];

        // Proses upload gambar (hanya jika ada file)
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('complaints', 'public');
        }

        return Complaint::create($data);
    }

    // Method simpan data (SUBMIT)
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|min:10',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->saveComplaint($request, false);

        return redirect()->route('complaint.index')->with('success', 'Pengaduan berhasil dikirim');
    }

    // Simpan sebagai draft
    public function saveDraft(Request $request)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            // Draft TIDAK WAJIB punya gambar
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->saveComplaint($request, true);

        return back()->with('success', 'Draft pengaduan berhasil disimpan');
    }

    // Hapus draft
    public function deleteDraft($id)
    {
        $draft = Complaint::where('user_id', auth()->id())
            ->where('id', $id)
            ->where('is_draft', 'draft')
            ->firstOrFail();
        
        // Hapus gambar jika ada
        if ($draft->image && \Storage::disk('public')->exists($draft->image)) {
            \Storage::disk('public')->delete($draft->image);
        }
        
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
            ->with(['category', 'feedbacks'])
            ->latest()
            ->paginate(10);
        
        $drafts = Complaint::where('user_id', auth()->id())
            ->where('is_draft', 'draft')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('complaint.index', compact('categories', 'complaints', 'drafts', 'draft'));
    }
}