@extends('layouts.main')

@section('container')
<div class="container py-5">
    <h1>{{ $title }}</h1>
    <a href="{{ route('stok.create') }}" class="btn btn-primary mb-3">Add New Stok</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Masuk</th>
                <th>Jumlah Keluar</th>
                <th>Total Barang</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stoks as $stok)
            <tr>
                <td>{{ $stok->id_barang }}</td>
                <td>{{ $stok->nama_barang }}</td>
                <td>{{ $stok->jml_masuk }}</td>
                <td>{{ $stok->jml_keluar }}</td>
                <td>{{ $stok->total_barang }}</td>
                <td>
                    <a href="{{ route('stok.edit', $stok->id_barang) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('stok.destroy', $stok->id_barang) }}" method="POST" style="display:inline;">
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
