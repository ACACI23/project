<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Barang;
use App\Models\Stok;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuks'; // Sesuaikan nama tabel jika berbeda
    protected $fillable = ['id_barang', 'jml_masuk', 'id_supplier', 'tgl_masuk'];


    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function stok()
{
    return $this->belongsTo(Stok::class, 'id_barang', 'id_barang');
}

}