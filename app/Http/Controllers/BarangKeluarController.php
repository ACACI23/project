<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Stok;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
{
    // Ambil data stok yang memiliki barang keluar
    $barangKeluar = Stok::with(['barangKeluar', 'barang'])
        ->whereHas('barangKeluar') // Hanya stok dengan data barang keluar
        ->get();

    $title = 'Daftar Barang Keluar';
    return view('barang-keluar.index', compact('barangKeluar', 'title'));
}


    public function create()
    {
        $stoks = Stok::all(); // Ambil data stok untuk dropdown
        $title = 'Daftar Barang Keluar';
        return view('barang-keluar.create', compact('stoks', 'title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required|exists:stoks,id_barang',
            'jml_keluar' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:255',
        ]);

        // Periksa stok tersedia
        $stok = Stok::where('id_barang', $validated['id_barang'])->first();
        if ($stok->total_barang < $validated['jml_keluar']) {
            return back()->withErrors(['msg' => 'Jumlah keluar melebihi stok tersedia.']);
        }

        // Simpan data barang keluar
        BarangKeluar::create($validated);

        // Kurangi stok barang
        $stok->reduceStok($validated['jml_keluar']);

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id); // Ambil data barang keluar berdasarkan ID
        $stoks = Stok::all(); // Data stok untuk dropdown
        return view('barang-keluar.edit', compact('barangKeluar', 'stoks'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_barang' => 'required|exists:stoks,id_barang',
            'jml_keluar' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:255',
        ]);

        $barangKeluar = BarangKeluar::findOrFail($id);

        $stok = Stok::where('id_barang', $barangKeluar->id_barang)->first();

        // Kembalikan stok lama
        $stok->addStok($barangKeluar->jml_keluar);

        // Kurangi stok sesuai data baru
        if ($stok->total_barang < $validated['jml_keluar']) {
            return back()->withErrors(['msg' => 'Jumlah keluar melebihi stok tersedia.']);
        }

        $stok->reduceStok($validated['jml_keluar']);
        $barangKeluar->update($validated);

        return redirect()->route('barang-keluar.index')->with('success', 'Data barang keluar berhasil diperbarui.');
    }

    public function destroy($id)
{
    $barangKeluar = BarangKeluar::find($id);

    if (!$barangKeluar) {
        return redirect()->route('barang-keluar.index')->withErrors(['msg' => 'Data tidak ditemukan.']);
    }

    // Kembalikan stok sebelum menghapus
    $stok = Stok::where('id_barang', $barangKeluar->id_barang)->first();

    if ($stok) {
        $stok->addStok($barangKeluar->jml_keluar);
    }

    $barangKeluar->delete();

    return redirect()->route('barang-keluar.index')->with('success', 'Data barang keluar berhasil dihapus.');
}

}
