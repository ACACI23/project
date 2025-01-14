@extends('layouts.main')

@section('container')

<h1 class="mb-5">Product Categories</h1>

<div class="container">
    <div class="row">

        @foreach ($posts as $category)

        <div class="col-md-4">
            <a href="/posts?category={{ $category->slug }}" class="text-decoration-none">
            <div class="card">
                <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                <div class="card-img-overlay d-flex align-items-center">
                  <h5 class="card-title text-center text-white flex-fill p-3 fs-3" style="background-color: rgba(0, 0, 0,0.7)">{{ $category->name }}</h5>
                </div>
              </div>
            </a>
        </div>
        @endforeach

    </div>
</div>

@endsection