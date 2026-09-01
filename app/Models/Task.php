<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // 🔓 Kolom yang diizinkan untuk diisi data
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'score',
    ];
}