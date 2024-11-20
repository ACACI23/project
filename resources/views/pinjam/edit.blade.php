@extends('layouts.main')

@section('container')

<div class="container py-5">
    <h1 class="mb-4">Edit Peminjaman</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pinjam.update', $pinjam->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- ID Barang -->
        <div class="mb-3">
            <label for="id_barang" class="form-label">Nama Barang</label>
            <select class="form-select" id="id_barang" name="id_barang" required>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id_barang }}" {{ $barang->id_barang == $pinjam->id_barang ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Nama Peminjam -->
        <div class="mb-3">
            <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="{{ $pinjam->nama_peminjam }}" required>
        </div>

        <!-- Jumlah Pinjam -->
        <div class="mb-3">
            <label for="jumlah_pinjam" class="form-label">Jumlah Pinjam</label>
            <input type="number" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" value="{{ $pinjam->jumlah_pinjam }}" required>
        </div>

        <!-- Tanggal Pinjam -->
        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ $pinjam->tanggal_pinjam }}" required>
        </div>

        <!-- Tanggal Kembali -->
        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ $pinjam->tanggal_kembali }}">
        </div>

        <!-- Keterangan -->
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{ $pinjam->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pinjam.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
