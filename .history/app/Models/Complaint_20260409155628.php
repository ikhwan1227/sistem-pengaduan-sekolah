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
        'image', 
        'status',
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
}
