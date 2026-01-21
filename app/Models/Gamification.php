<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamification extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi
    protected $fillable = [
        'user_id',
        'total_points',
        'highest_streak',
        'badge_level'
    ];

    // Relasi: Data game ini milik satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}