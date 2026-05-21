<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Tandai semua notifikasi sebagai sudah dibaca
     */
    public function markAllAsRead(Request $request)
    {
        Auth::user()->unreadNotifications->markAsRead();
        
        return back()->with('success', 'Semua notifikasi telah ditandai dibaca');
    }
    
    /**
     * Tandai satu notifikasi sebagai sudah dibaca
     */
    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->where('id', $id)->first();
        
        if ($notification) {
            $notification->markAsRead();
        }
        
        return back()->with('success', 'Notifikasi ditandai dibaca');
    }
    
    /**
     * Hapus semua notifikasi (opsional)
     */
    public function destroyAll(Request $request)
    {
        Auth::user()->notifications()->delete();
        
        return back()->with('success', 'Semua notifikasi telah dihapus');
    }
}