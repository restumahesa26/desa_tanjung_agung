<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KritikSaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'no_handphone', 'subjek', 'pesan'
    ];
}
