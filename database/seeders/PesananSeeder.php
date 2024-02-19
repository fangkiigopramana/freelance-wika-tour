<?php

namespace Database\Seeders;

use App\Models\Pesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            # code...
            Pesanan::create([
                'Kota_asal' => 'Jakarta',
                'Kota_Tujuan' => 'Surabaya',
                'jam_berangkat' => '08:00',
                'jam_tiba' => '10:00',
                'maskapai' => 'Garuda Indonesia',
                'harga' => rand(500000, 10000000),
                'kode_tiket' => 'GA123',
                'status' => 'proses',
                'pemesan' => 'User', // Sesuaikan dengan nama user yang telah ada di tabel 'users'
                'penumpang' => 'Penumpang 1, Penumpang 2',
                'tanggal' => '2023-06-01',
            ]);
        }
    }
}
