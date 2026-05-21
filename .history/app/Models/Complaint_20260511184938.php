<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'judul',
        'deskripsi',
        'location',
        'image', 
        'status',
        'is_draft',
        'tanggal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    // Menghitung persentase penyelesaian berdasarkan status
    public function getProgressPercentageAttribute()
    {
        return match($this->status) {
            'pending' => 25,
            'diproses' => 60,
            'selesai' => 100,
            default => 0,
        };
    }

    // Mendapatkan status dalam bahasa Indonesia
    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'pending' => 'Menunggu',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
            default => 'Unknown',
        };
    }

    // Mendapatkan warna progress bar
    public function getProgressColorAttribute()
    {
        return match($this->status) {
            'pending' => 'bg-yellow-500',
            'diproses' => 'bg-blue-500',
            'selesai' => 'bg-green-500',
            default => 'bg-gray-500',
        };
    }
}
