@extends('layouts.main')

@section('container')
    <h1 class="mb-5">About Me</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="Aurelia" width="200px" class="img-thumbnail rounded-circle" />
@endsection