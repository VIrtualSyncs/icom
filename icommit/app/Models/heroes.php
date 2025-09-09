<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class heroes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi_hero',
        'gambar',
    ];

    protected $table = 'heroes';
}
