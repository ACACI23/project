<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'nama_barang' => 'Laptop Dell Inspiron',
                'spesifikasi' => 'Intel Core i5, 8GB RAM, 256GB SSD',
                'lokasi' => 'Ruang IT',
                'kondisi' => 'Baik',
                'jumlah_barang' => 10,
                'sumber_dana' => 'APBN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Printer HP LaserJet',
                'spesifikasi' => 'Laser, Cetak Hitam Putih, WiFi',
                'lokasi' => 'Ruang Administrasi',
                'kondisi' => 'Baik',
                'jumlah_barang' => 5,
                'sumber_dana' => 'APBD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Proyektor Epson',
                'spesifikasi' => '1080p, 3000 Lumens',
                'lokasi' => 'Ruang Rapat',
                'kondisi' => 'Cukup',
                'jumlah_barang' => 3,
                'sumber_dana' => 'Donasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Kursi Ergonomis',
                'spesifikasi' => 'Busa Empuk, Roda, Sandaran Punggung',
                'lokasi' => 'Ruang Kerja',
                'kondisi' => 'Baru',
                'jumlah_barang' => 20,
                'sumber_dana' => 'APBN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
