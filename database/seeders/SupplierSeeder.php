<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('supplier')->insert([
            [
                'id_supplier' => '999',
                'nama_supplier' => 'PT Elektronik Jaya',
                'alamat_supplier' => 'Jl. Mangga Dua, Jakarta',
                'telepon_supplier' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_supplier' => '888',
                'nama_supplier' => 'PT-Elektrik',
                'alamat_supplier' => 'Bekasi City Park',
                'telepon_supplier' => '081345678909',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_supplier' => '777',
                'nama_supplier' => 'PT Sinar Baru',
                'alamat_supplier' => 'Jl. Kuningan, Jakarta',
                'telepon_supplier' => '081276543210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
