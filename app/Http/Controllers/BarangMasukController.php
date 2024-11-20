<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Stok;
use App\Models\Barang; 
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Ambil data BarangMasuk beserta relasi Barang dan Stok
    $barangMasuk = BarangMasuk::with(['barang', 'stok'])->get(); 

    $title = 'Daftar Barang Masuk';
    return view('barang-masuk.index', compact('barangMasuk', 'title'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $barangs = Barang::all(); // Ambil semua data barang
    $title = 'Tambah Barang Masuk';
    return view('barang-masuk.create', compact('barangs', 'title'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required|exists:barangs,id_barang',
            'jml_masuk' => 'required|integer|min:1',
            'id_supplier' => 'required|string',
            'tgl_masuk' => 'required|date',
        ]);

        // Simpan data barang masuk
        $barangMasuk = BarangMasuk::create($validated);

        // Perbarui stok barang
        $stok = Stok::where('id_barang', $barangMasuk->id_barang)->first();
        if ($stok) {
            $stok->total_barang += $barangMasuk->jml_masuk;
            $stok->jml_masuk += $barangMasuk->jml_masuk;
            $stok->save();
        } else {
            $barang = Barang::findOrFail($barangMasuk->id_barang);

            Stok::create([
                'id_barang' => $barangMasuk->id_barang,
                'nama_barang' => $barang->nama_barang,
                'jml_masuk' => $barangMasuk->jml_masuk,
                'jml_keluar' => 0,
                'total_barang' => $barangMasuk->jml_masuk,
            ]);
        }

        return redirect()->route('barang-masuk.index')->with('success', 'Barang masuk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barangMasuk = BarangMasuk::with('barang')->findOrFail($id);
        return view('barang-masuk.show', compact('barangMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);

        $barangs = Barang::all(); // Ambil semua barang untuk dropdown
        $title = 'Edit Barang Masuk'; // Define the title
        return view('barang-masuk.edit', compact('barangMasuk', 'barangs', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_barang' => 'required|exists:barangs,id_barang',
            'jml_masuk' => 'required|integer|min:1',
            'id_supplier' => 'required|string',
        ]);

        $barangMasuk = BarangMasuk::findOrFail($id);

        // Hitung selisih stok
        $stok = Stok::where('id_barang', $barangMasuk->id_barang)->first();
        if ($stok) {
            $stok->total_barang -= $barangMasuk->jml_masuk; // Kembalikan stok lama
            $stok->jml_masuk -= $barangMasuk->jml_masuk;

            $stok->total_barang += $validated['jml_masuk']; // Tambahkan stok baru
            $stok->jml_masuk += $validated['jml_masuk'];
            $stok->save();
        }

        $barangMasuk->update($validated);

        return redirect()->route('barang-masuk.index')->with('success', 'Data barang masuk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);

        // Kurangi stok sebelum menghapus data barang masuk
        $stok = Stok::where('id_barang', $barangMasuk->id_barang)->first();
        if ($stok) {
            $stok->total_barang -= $barangMasuk->jml_masuk;
            $stok->jml_masuk -= $barangMasuk->jml_masuk;
            $stok->save();
        }

        $barangMasuk->delete();

        return redirect()->route('barang-masuk.index')->with('success', 'Data barang masuk berhasil dihapus.');
    }
}
