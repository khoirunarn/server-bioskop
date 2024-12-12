<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'id_movie' => 1,
                'id_cinema' => 1,
                'waktu_tayang' => '2021-09-01 12:00:00',
                'seats' => 100
            ],
            [
                'id_movie' => 2,
                'id_cinema' => 2,
                'waktu_tayang' => '2021-09-01 14:00:00',
                'seats' => 100
            ],
            [
                'id_movie' => 3,
                'id_cinema' => 3,
                'waktu_tayang' => '2021-09-01 16:00:00',
                'seats' => 100
            ],
            [
                'id_movie' => 4,
                'id_cinema' => 4,
                'waktu_tayang' => '2021-09-01 18:00:00',
                'seats' => 100
            ],
        ];

        foreach ($datas as $data) {
            \App\Models\JadwalModel::create($data);
        }
    }
}
