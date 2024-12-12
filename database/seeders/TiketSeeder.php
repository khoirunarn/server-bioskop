<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'id_jadwal' => 1,
                'jumlah_tiket' => 100,
                'harga' => 50000,
                'waktu_pesan_tiket' => '2024-12-10 14:32:46',
            ],
            [
                'id_jadwal' => 2,
                'jumlah_tiket' => 100,
                'harga' => 50000,
                'waktu_pesan_tiket' => '2024-12-10 14:32:46',
            ],
            [
                'id_jadwal' => 3,
                'jumlah_tiket' => 100,
                'harga' => 50000,
                'waktu_pesan_tiket' => '2024-12-10 14:32:46',
            ],
            [
                'id_jadwal' => 4,
                'jumlah_tiket' => 100,
                'harga' => 50000,
                'waktu_pesan_tiket' => '2024-12-10 14:32:46',
            ]
        ];

        foreach ($datas as $data) {
            \App\Models\TiketModel::create($data);
        }
    }
}
