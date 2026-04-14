<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Complaint::with(['user','category']);

        if($request->tanggal){
            $query->whereDate('tanggal', $request->tanggal);
        }

        if($request->category_id){
            $query->where('category_id', $request->category_id);
        }

        if($request->user_id){
            $query->where('user_id', $request->user_id);
        }

        $complaints = $query->get();
        $categories = Category::all();
        $users = User::where('role','siswa')->get();

        return view('admin.index', compact('complaints','categories','users'));
    }
}
