@extends('layouts.main')

@section('container')
<div class="container py-5">
    <h1>Tambah Barang Keluar</h1>
    <form action="{{ route('barang-keluar.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_barang" class="form-label">ID Barang</label>
            <input type="text" class="form-control" id="id_barang" name="id_barang" required>
        </div>
        <div class="mb-3">
            <label for="jml_keluar" class="form-label">Jumlah Keluar</label>
            <input type="number" class="form-control" id="jml_keluar" name="jml_keluar" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
