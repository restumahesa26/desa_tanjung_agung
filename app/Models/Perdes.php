<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perdes extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'link'
    ];
}
