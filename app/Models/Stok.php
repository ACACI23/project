<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang; // Pastikan ini diimpor
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stoks';
    public $incrementing = false;
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'jml_masuk',
        'jml_keluar',
        'total_barang',
    ];

    // Method untuk menambah stok
    public function addStok($jumlah)
    {
        $this->total_barang += $jumlah;
        $this->save();
    }

    // Method untuk mengurangi stok
    public function reduceStok($jumlah)
    {
        $this->total_barang -= $jumlah;
        $this->save();
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
     
    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'id_barang', 'id_barang');
    }

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'id_barang', 'id_barang');
    }
}
