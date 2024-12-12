<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'judul' => 'The Avengers',
                'genre' => 'Action, Adventure, Sci-Fi',
                'durasi' => 143,
                'rating' => 8.0
            ],
            [
                'judul' => 'The Shawshank Redemption',
                'genre' => 'Drama',
                'durasi' => 142,
                'rating' => 9.3
            ],
            [
                'judul' => 'The Godfather',
                'genre' => 'Crime, Drama',
                'durasi' => 175,
                'rating' => 9.2
            ],
            [
                'judul' => 'The Dark Knight',
                'genre' => 'Action, Crime, Drama',
                'durasi' => 152,
                'rating' => 9.0
            ]
        ];

        foreach ($datas as $data) {
            \App\Models\MovieModel::create($data);
        }
    }
}
