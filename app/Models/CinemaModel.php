<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaModel extends Model
{
    use HasFactory;

    protected $table = 'cinema';
    protected $primaryKey = 'id_cinema';

    protected $fillable = [
        'id_movie',
        'nama_cinema',
        'address',
        'harga'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function movie()
    {
        return $this->belongsTo(MovieModel::class, 'id_movie', 'id_movie');
    }

    public function cinema()
    {
        return $this->hasMany(JadwalModel::class, 'id_cinema', 'id_cinema');
    }
}
