<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'difficulty',
        'question',
        'image',
        'options',
        'correct_index',
        'points',
        'explanation'
    ];

    // Agar kolom 'options' otomatis berubah jadi Array saat diambil, dan jadi JSON saat disimpan
    protected $casts = [
        'options' => 'array',
    ];
}