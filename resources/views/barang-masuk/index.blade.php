@extends('layouts.main')

@section('container')
<div class="container py-5">
    <h1>{{ $title }}</h1>
    <a href="{{ route('barang-masuk.create') }}" class="btn btn-primary mb-3">Tambah Barang Masuk</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Masuk</th>
                <th>Total Stok</th>
                <th>Tanggal Masuk</th>
                <th>Supplier</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangMasuk as $item)
            <tr>
                <td>{{ $item->id_barang }}</td>
                <td>{{ $item->barang->nama_barang ?? 'Tidak Ditemukan' }}</td>
                <td>{{ $item->jml_masuk }}</td>
                <td>{{ $item->stok->total_barang ?? '0' }}</td>
                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                <td>{{ $item->id_supplier }}</td>
                <td>
                    <a href="{{ route('barang-masuk.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('barang-masuk.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
