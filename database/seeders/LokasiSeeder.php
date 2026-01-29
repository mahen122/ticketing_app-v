<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lokasi')->insert([
            [
                'nama_lokasi' => 'Stadion Utama',
                'aktif' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lokasi' => 'Galeri Seni Kota',
                'aktif' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lokasi' => 'Taman Kota',
                'aktif' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
