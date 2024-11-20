<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan semua data barang
    public function index()
    {
        $title = 'Barang List'; // Set judul halaman
        $barangs = Barang::all();
        return view('barang.index', compact('barangs', 'title'));
    }

    // Menampilkan form untuk membuat barang baru
    public function create()
    {
        $title = 'Create Barang'; // Set judul halaman
        return view('barang.create', compact('title'));
    }

    // Menyimpan data barang ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required|integer',
            'nama_barang' => 'required|string|max:255',
            'spesifikasi' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'jumlah_barang' => 'required|integer',
            'sumber_dana' => 'nullable|string|max:255',
            'kondisi' => 'nullable|string|max:255',
        ]);

        Barang::create($validated);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit barang
    public function edit($id)
    {
        $title = 'Edit Barang'; // Set judul halaman
        $barang = Barang::find($id);

        // Cek apakah data barang ada
        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Barang tidak ditemukan.');
        }
        return view('barang.edit', compact('barang', 'title'));
    }

    // Memperbarui data barang di database
    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'spesifikasi' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'jumlah_barang' => 'required|integer',
            'sumber_dana' => 'nullable|string|max:255',
            'kondisi' => 'nullable|string|max:255',
        ]);

        $barang->update($validated);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    // Menghapus data barang dari database
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus.');
    }
}
