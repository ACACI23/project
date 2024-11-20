@extends('layouts.main')

@section('container')

<div class="container py-5">
    <h1 class="mb-4">Pinjam Barang</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pinjam.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_barang" class="form-label">Nama Barang</label>
            <select class="form-select" id="id_barang" name="id_barang" required>
                <option selected disabled>Pilih Barang</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id_barang }}" {{ old('id_barang') == $barang->id_barang ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="{{ old('nama_peminjam') }}" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_pinjam" class="form-label">Jumlah Pinjam</label>
            <input type="number" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" value="{{ old('jumlah_pinjam') }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}">
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('pinjam.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
