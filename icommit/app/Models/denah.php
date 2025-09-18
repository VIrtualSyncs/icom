<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class denah extends Model
{
    protected $table = 'denah';

    protected $fillable = ['title', 'description', 'image'];
}
