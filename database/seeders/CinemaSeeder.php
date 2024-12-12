<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'id_movie' => 1,
                'nama_cinema' => 'Cinema 21',
                'address' => 'Jl. Jendral Sudirman No. 1',
                'harga' => 50000
            ],
            [
                'id_movie' => 2,
                'nama_cinema' => 'Cinema XXI',
                'address' => 'Jl. Jendral Sudirman No. 2',
                'harga' => 75000
            ],
            [
                'id_movie' => 3,
                'nama_cinema' => 'Cinema 21',
                'address' => 'Jl. Jendral Sudirman No. 3',
                'harga' => 100000
            ],
            [
                'id_movie' => 4,
                'nama_cinema' => 'Cinema 21',
                'address' => 'Jl. Jendral Sudirman No. 4',
                'harga' => 125000
            ]
        ];

        foreach ($datas as $data) {
            \App\Models\CinemaModel::create($data);
        }
    }
}
