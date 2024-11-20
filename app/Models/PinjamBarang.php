<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Barang;

class PinjamBarang extends Model
{
    use HasFactory;

    protected $table = 'pinjam_barangs'; // Pastikan nama tabel sesuai di database

    protected $fillable = [
        'id_barang',
        'nama_peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'keterangan',
        'jumlah_pinjam',
    ];

    public function barang()
{
    return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
}

}