<?php
namespace App\Http\Controllers;

use App\Models\PinjamBarang;
use App\Models\Barang;
use App\Models\Stok;
use Illuminate\Http\Request;

class PinjamBarangController extends Controller
{
    public function index()
    {
        $title = 'Daftar Peminjaman';
        $pinjams = PinjamBarang::with('barang')->get();
        return view('pinjam.index', compact('pinjams', 'title'));
    }

    public function create()
    {
        $title = 'Pinjam Barang';
        $barangs = Barang::all();
        return view('pinjam.create', compact('barangs', 'title'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'id_barang' => 'required|exists:barangs,id_barang',
        'nama_peminjam' => 'required|string|max:255',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        'keterangan' => 'nullable|string|max:255',
        'jumlah_pinjam' => 'required|integer|min:1',
    ]);

    $barang = Barang::find($validated['id_barang']);
    $stok = $barang->stok; // Mengakses relasi stok

    if (!$stok) {
        return redirect()->route('pinjam.index')->with('error', 'Stok untuk barang ini tidak ditemukan.');
    }

    if ($stok->total_barang >= $validated['jumlah_pinjam']) {
        $stok->total_barang -= $validated['jumlah_pinjam'];
        $stok->save();

        PinjamBarang::create($validated);

        return redirect()->route('pinjam.index')->with('success', 'Barang berhasil dipinjam.');
    }

    return redirect()->route('pinjam.index')->with('error', 'Stok barang tidak cukup untuk peminjaman.');
}

    public function edit($id)
    {
        $title = 'Edit Peminjaman';
        $pinjam = PinjamBarang::find($id);
        $barangs = Barang::all();

        if (!$pinjam) {
            return redirect()->route('pinjam.index')->with('error', 'Data peminjaman tidak ditemukan.');
        }

        return view('pinjam.edit', compact('pinjam', 'barangs', 'title'));
    }

    public function update(Request $request, PinjamBarang $pinjam)
{
    $validated = $request->validate([
        'id_barang' => 'required|exists:barangs,id_barang',
        'nama_peminjam' => 'required|string|max:255',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        'keterangan' => 'nullable|string|max:255',
        'jumlah_pinjam' => 'required|integer|min:1',
    ]);

    $barang = Barang::find($validated['id_barang']);
    $stok = $barang->stok;

    if (!$stok) {
        return redirect()->route('pinjam.index')->with('error', 'Stok untuk barang ini tidak ditemukan.');
    }

    // Kembalikan stok lama
    $stok->total_barang += $pinjam->jumlah_pinjam;

    // Cek apakah stok cukup untuk jumlah baru
    if ($stok->total_barang >= $validated['jumlah_pinjam']) {
        $stok->total_barang -= $validated['jumlah_pinjam'];
        $stok->save();

        $pinjam->update($validated);

        return redirect()->route('pinjam.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    return redirect()->route('pinjam.index')->with('error', 'Stok barang tidak cukup untuk peminjaman.');
}



public function destroy(PinjamBarang $pinjam)
{
    $stok = $pinjam->barang->stok;

    if ($stok) {
        $stok->total_barang += $pinjam->jumlah_pinjam;
        $stok->save();
    }

    $pinjam->delete();

    return redirect()->route('pinjam.index')->with('success', 'Data peminjaman berhasil dihapus.');
}

}