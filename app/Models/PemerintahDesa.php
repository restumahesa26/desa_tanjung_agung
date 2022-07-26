<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemerintahDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'kades', 'sekdes', 'kaur_umum_perencanaan', 'kasi_kesra', 'kasi_pelayanan', 'kasi_pemerintah'
    ];
}
