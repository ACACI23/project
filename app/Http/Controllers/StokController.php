<?php
namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $title = 'Stok List';
        $stoks = Stok::all();
        return view('stok.index', compact('stoks', 'title'));
    }

    public function create()
    {
        $title = 'Create Stok';
        return view('stok.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required|exists:barangs,id_barang', 
            'nama_barang' => 'required|string|max:255',
            'jml_masuk' => 'required|integer',
            'jml_keluar' => 'required|integer',
            'total_barang' => 'required|integer',
        ]);

        Stok::create($validated);

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $title = 'Edit Stok';
        $stok = Stok::find($id);

        if (!$stok) {
            return redirect()->route('stok.index')->with('error', 'Stok tidak ditemukan.');
        }

        return view('stok.edit', compact('stok', 'title'));
    }

    public function update(Request $request, Stok $stok)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jml_masuk' => 'required|integer',
            'jml_keluar' => 'required|integer',
            'total_barang' => 'required|integer',
        ]);

        $stok->update($validated);

        return redirect()->route('stok.index')->with('success', 'Stok berhasil diperbarui.');
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus.');
    }
}