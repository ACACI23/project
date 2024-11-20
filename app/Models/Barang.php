<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Stok;
use App\Models\BarangMasuk; // Impor model BarangMasuk
use App\Models\BarangKeluar; // Impor model BarangKeluar
use App\Models\PinjamBarang; // Impor model PinjamBarang

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $primaryKey = 'id_barang'; // Primary key kustom
    public $incrementing = true; // Auto-increment
    protected $keyType = 'int'; // Tipe data integer

    protected $fillable = [
        'nama_barang',
        'spesifikasi',
        'lokasi',
        'kondisi',
        'jumlah_barang',
        'sumber_dana',
    ];
    public function stok()
{
    return $this->hasOne(Stok::class, 'id_barang');
}

public function barangMasuk()
{
    return $this->hasMany(BarangMasuk::class, 'id_barang', 'id_barang');
}

public function barangKeluar()
{
    return $this->hasMany(BarangKeluar::class, 'id_barang', 'id_barang');
}
    public function pinjamBarangs()
    {
        return $this->hasMany(PinjamBarang::class, 'id_barang', 'id_barang');
    }
}
?>

