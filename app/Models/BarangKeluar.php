<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Barang;
use App\Models\Stok;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluars'; // Nama tabel sesuai migrasi
    protected $fillable = [
        'id_barang',
        'tgl_keluar',
        'jml_keluar',
        'lokasi',
        'penerima',
    ];

    /**
     * Relasi ke model Barang.
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function stok()
{
    return $this->belongsTo(Stok::class, 'id_barang', 'id_barang');
}
}
