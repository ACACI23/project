@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row mb-5 justify-content-center ">
        <div class="col-md-8">
            <h1 class="mb-4">{{ $post->title }}</h1>
            <p class="mb-3">By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
            @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                  <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3" />  
                </div>
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid" />
                @endif
            <article class="my-3 fs-5">{!! $post->body !!}</article>
            <a href="/posts" class="d-block mb-3">Back to Blog</a>
        </div>
    </div>
</div>

@endsection

