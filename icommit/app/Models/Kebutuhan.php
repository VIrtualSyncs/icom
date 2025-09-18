<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebutuhan extends Model
{
    // 👇 Beri tahu Eloquent nama tabel sebenarnya
    protected $table = 'kebutuhan';

    // kolom yang boleh di-isi massal
    protected $fillable = ['title', 'description', 'icon'];
}
