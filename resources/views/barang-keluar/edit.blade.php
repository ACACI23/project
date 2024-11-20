@extends('layouts.main')

@section('container')
<div class="container py-5">
    <h1>{{ $title }}</h1>
    <form action="{{ route('barang-keluar.update', $stok->id_barang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_barang" class="form-label">ID Barang</label>
            <input type="text" class="form-control" id="id_barang" name="id_barang" value="{{ $stok->id_barang }}" readonly>
        </div>
        <div class="mb-3">
            <label for="jml_keluar" class="form-label">Jumlah Keluar</label>
            <input type="number" class="form-control" id="jml_keluar" name="jml_keluar" value="{{ $stok->jml_keluar }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
