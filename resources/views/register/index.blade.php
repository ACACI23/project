@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-lg-4">
    <main class="form-registration w-100 m-auto">
      <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>  
      <form action="/register" method="post">

        @csrf
        
          <div class="form-floating mb-2">
            <input type="text" name="name" class="form-control rounded-top" id="name" @error('name') is-invalid @enderror placeholder="Name" required value="{{ old('name') }}">
            <label for="name">Name</label>
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-floating mb-2">
            <input type="text" name="username" class="form-control" id="username" @error('username') is-invalid @enderror placeholder="Username" required value="{{ old('username') }}">
            <label for="username">Username</label>
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-floating mb-2">
            <input type="email" name="email" class="form-control" id="email" @error('email') is-invalid @enderror placeholder="name@example.com" required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-floating mb-2">
            <input type="password" name="password" class="form-control rounded-bottom" id="password" @error('password') is-invalid @enderror placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
      
          <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
        </form>

        <small class="d-block text-center mt-3">Already registered? <a href="/login">Login Here!</a></small>
      </main>
    </div>
  </div>
@endsection
