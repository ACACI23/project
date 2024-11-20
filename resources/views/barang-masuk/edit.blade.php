@extends('layouts.main')

@section('container')
<div class="container py-5">
    <h1>Edit Barang Masuk</h1>
    <form action="{{ route('barang-masuk.update', $barangMasuk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_barang" class="form-label">ID Barang</label>
            <select name="id_barang" id="id_barang" class="form-control" required>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id_barang }}" {{ $barangMasuk->id_barang == $barang->id_barang ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jml_masuk" class="form-label">Jumlah Masuk</label>
            <input type="number" name="jml_masuk" id="jml_masuk" class="form-control" value="{{ $barangMasuk->jml_masuk }}" required>
        </div>
        <div class="mb-3">
            <label for="id_supplier" class="form-label">ID Supplier</label>
            <input type="number" name="id_supplier" id="id_supplier" class="form-control" value="{{ $barangMasuk->id_supplier }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
