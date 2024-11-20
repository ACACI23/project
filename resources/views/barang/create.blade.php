@extends('layouts.main')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Tambah Barang Keluar</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang-keluar.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="id_barang" class="block font-medium">ID Barang</label>
            <input type="text" id="id_barang" name="id_barang" class="border border-gray-300 p-2 w-full" required>
        </div>

        <div>
            <label for="jml_keluar" class="block font-medium">Jumlah Keluar</label>
            <input type="number" id="jml_keluar" name="jml_keluar" class="border border-gray-300 p-2 w-full" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('barang_keluar.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
    </form>
</div>
@endsection
