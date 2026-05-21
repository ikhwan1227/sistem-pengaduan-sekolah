<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:categories,nama_kategori'
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'nama_kategori.unique' => 'Kategori sudah ada'
        ]);

        Category::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('admin.categories')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:categories,nama_kategori,' . $id
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'nama_kategori.unique' => 'Kategori sudah ada'
        ]);

        $category->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('admin.categories')
            ->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        // Cek apakah kategori sedang digunakan
        $complaintCount = $category->complaints()->count();
        if ($complaintCount > 0) {
            return redirect()->route('admin.categories')
                ->with('error', 'Kategori tidak bisa dihapus karena masih digunakan oleh ' . $complaintCount . ' pengaduan');
        }
        
        $category->delete();
        
        return redirect()->route('admin.categories')
            ->with('success', 'Kategori berhasil dihapus');
    }
}