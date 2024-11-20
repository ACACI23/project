@extends('layouts.main')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Daftar Barang Keluar</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('barang-keluar.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Barang Keluar</a>

    <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">ID Barang</th>
                <th class="border border-gray-300 px-4 py-2">Nama Barang</th>
                <th class="border border-gray-300 px-4 py-2">Jumlah Keluar</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stok as $item)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->id_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->nama_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->jml_keluar }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('barang_keluar.edit', $item->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('barang_keluar.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="border border-gray-300 px-4 py-2 text-center">Tidak ada data barang keluar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
