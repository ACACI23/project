@extends('layouts.main')

@section('container')

<div class="container py-5">
    <h1 class="mb-4">Daftar Peminjaman</h1>
    
    <a href="{{ route('pinjam.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Nama Peminjam</th>
                    <th>Jumlah Pinjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Keterangan</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pinjams as $pinjam)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pinjam->id_barang }}</td>
                        <td>{{ $pinjam->barang->nama_barang }}</td>
                        <td>{{ $pinjam->nama_peminjam }}</td>
                        <td>{{ $pinjam->jumlah_pinjam }}</td>
                        <td>{{ $pinjam->tanggal_pinjam }}</td>
                        <td>{{ $pinjam->tanggal_kembali ?? '-' }}</td>
                        <td>{{ $pinjam->keterangan ?? '-' }}</td>
                        <td>
                            <a href="{{ route('pinjam.edit', $pinjam->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('pinjam.destroy', $pinjam->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus peminjaman ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
