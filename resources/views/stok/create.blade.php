@extends('layouts.main')

@section('container')
<div class="container py-5">
    <h1 class="mb-4">Add New Stok</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stok.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_barang" class="form-label">ID Barang</label>
            <input type="number" class="form-control" id="id_barang" name="id_barang" value="{{ old('id_barang') }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" required>
        </div>
        <div class="mb-3">
            <label for="jml_masuk" class="form-label">Jumlah Masuk</label>
            <input type="number" class="form-control" id="jml_masuk" name="jml_masuk" value="{{ old('jml_masuk') }}" required oninput="calculateTotal()">
        </div>
        <div class="mb-3">
            <label for="jml_keluar" class="form-label">Jumlah Keluar</label>
            <input type="number" class="form-control" id="jml_keluar" name="jml_keluar" value="{{ old('jml_keluar') }}" required oninput="calculateTotal()">
        </div>
        <div class="mb-3">
            <label for="total_barang" class="form-label">Total Barang</label>
            <input type="number" class="form-control" id="total_barang" name="total_barang" value="{{ old('total_barang') }}" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('stok.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
    function calculateTotal() {
        let masuk = parseFloat(document.getElementById('jml_masuk').value) || 0;
        let keluar = parseFloat(document.getElementById('jml_keluar').value) || 0;
        document.getElementById('total_barang').value = masuk - keluar;
    }
</script>
@endsection
