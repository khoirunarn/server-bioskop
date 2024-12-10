<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieModel extends Model
{
    use HasFactory;
    protected $table = 'movie';
    protected $primaryKey = 'id_movie';

    protected $fillable = [
        'genre',
        'judul',
        'durasi',
        'rating'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function cinema()
    {
        return $this->hasMany(CinemaModel::class, 'id_cinema', 'id_cinema');
    }
}
