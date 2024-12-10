<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalModel extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'id_movie',
        'id_cinema',
        'jumlah_tiket',
        'harga'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
