@extends('layouts.main')

@section('container')
<div class="container py-5">
    <h1>{{ $title }}</h1>
    <a href="{{ route('barang-keluar.create') }}" class="btn btn-primary mb-3">Tambah Barang Keluar</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Keluar</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($barangKeluar as $stok)
            @foreach ($stok->barangKeluar as $item)
            <tr>
                <td>{{ $stok->id_barang }}</td>
                <td>{{ $stok->nama_barang }}</td>
                <td>{{ $item->jml_keluar }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <a href="{{ route('barang-keluar.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('barang-keluar.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        @empty
            <tr>
                <td colspan="5" class="text-center">Data barang keluar tidak tersedia.</td>
            </tr>
        @endforelse
        
        </tbody>
    </table>
</div>
@endsection
