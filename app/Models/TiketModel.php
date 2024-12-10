<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiketModel extends Model
{
    use HasFactory;

    protected $table = 'tiket';
    protected $primaryKey = 'id_tiket';

    protected $fillable = [
        'id_jadwal',
        'jumlah_tiket',
        'harga',
        'waktu_pesan_tiket'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
