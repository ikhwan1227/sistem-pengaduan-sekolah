<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //METHOD STORE
    public function store(Request $request, $id)
    {
        Feedback::create([
            'complaint_id' => $id,
            'pesan' => $request->pesan,
            'tanggal' => now()
        ]);

        return back();
    }
}
