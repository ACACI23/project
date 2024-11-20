@extends('layouts.main')

@section('container')
<div class="container py-5">
    <h1>Tambah Barang Masuk</h1>
    <form action="{{ route('barang-masuk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_barang" class="form-label">ID Barang</label>
            <select name="id_barang" id="id_barang" class="form-control" required>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jml_masuk" class="form-label">Jumlah Masuk</label>
            <input type="number" name="jml_masuk" id="jml_masuk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="id_supplier" class="form-label">ID Supplier</label>
            <input type="number" name="id_supplier" id="id_supplier" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
