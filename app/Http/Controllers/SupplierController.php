<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller {
   // Menampilkan semua data supplier
   public function index()
{
    $title = 'Supplier List'; // Set judul halaman
    $suppliers = Supplier::all();
    return view('supplier.index', compact('suppliers', 'title')); // Kirim $title ke view
}

// Menampilkan form untuk membuat supplier baru
public function create()
{
    $title = 'Create Supplier'; // Set judul halaman
    return view('supplier.create', compact('title')); // Kirim $title ke view
}


   // Menyimpan data Supplier ke database
   public function store(Request $request)
   {
       $validated = $request->validate([
           'id_supplier' => 'required|integer',
           'nama_supplier' => 'required|string|max:255',
           'alamat_supplier' => 'nullable|string',
           'telepon_supplier' => 'nullable|string|max:15',
       ]);

       Supplier::create($validated);

       return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan.');
   }

   // Menghapus data Supplier dari database
   public function destroy(Supplier $supplier)
   {
       $supplier->delete();

       return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil dihapus.');
   }

   // Show the edit form for a specific supplier
   public function edit($id)
   {

        $title = 'Supplier Edit'; // Set judul halaman
       $supplier = Supplier::find($id);

       // Check if the supplier exists
       if (!$supplier) {
           return redirect()->route('supplier.index')->with('error', 'Supplier not found.');
       }
       return view('supplier.edit', compact('supplier', 'title'));
   }

   public function update(Supplier $supplier, Request $request)
   {
       // Validasi data request jika diperlukan
       $validatedData = $request->validate([
           'nama_supplier' => 'required|string|max:255',
           'alamat_supplier' => 'nullable|string',
           'telp_supplier' => 'nullable|string|max:15',
       ]);

       // Update data supplier
       $supplier->update($validatedData);

       return redirect()->route('supplier.index')->with('success', 'Supplier data successfully updated.');
   }
}
