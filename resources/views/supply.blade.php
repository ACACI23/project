@extends('layouts.main')

@section('container')

<!-- Gambar di atas tombol -->
<div class="w-full flex justify-center my-5">
    <img src="{{ asset('img/Screenshot 2024-11-11 135410.png') }}" alt="Gambar Deskripsi" class="max-w-full h-auto">
</div>


<!-- Tombol Responsif -->
<div class="flex flex-wrap justify-center gap-3">
    <a href="/supplier" class="btn btn-primary text-sm font-semibold py-2 px-4">Supplier</a>
    <a href="/stok" class="btn btn-primary text-sm font-semibold py-2 px-4">Stok</a>
    <a href="/barang-masuk" class="btn btn-primary text-sm font-semibold py-2 px-4">Barang Masuk</a>
    <a href="/barang-keluar" class="btn btn-primary text-sm font-semibold py-2 px-4">Barang Keluar</a>
    <a href="/pinjam" class="btn btn-primary text-sm font-semibold py-2 px-4">Pinjam Barang</a>
</div>

@endsection
