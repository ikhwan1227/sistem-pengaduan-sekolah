<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedback;

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

        if($request->user_id){
            $query->where('user_id', $request->user_id);
        }

        $complaints = $query->get();
        $categories = Category::all();
        $users = User::where('role','siswa')->get();

        return view('admin.index', compact('complaints','categories','users'));
    }

    //UPDATE STATUS
    public function updateStatus(Request $request, $id)
    {
        $c = Complaint::findOrFail($id);
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai'
        ]);
        $c->save();

        return back();
    }

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (auth()->user()->role != 'admin') {
                abort(403);
            }
            return $next($request);
        });
    }

    public function destroy($id)
    {
        $c = Complaint::findOrFail($id);
        $c->delete();

        return back();
    }

    public function feedback(Request $request, $id)
    {
        Feedback::create([
            'complaint_id' => $id,
            $request->validate([
                'pesan' => 'required|string|max:500'
            ]),
            'tanggal' => now()
        ]);

        return back()->with('success', 'Feedback berhasil dikirim');
    }
}
