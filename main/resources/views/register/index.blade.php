@extends('layouts.main')

@section('container')
<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="/register" method="POST">
              @csrf
              <div class="form-floating">
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                <div id="validationServer04Feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div id="validationServer04Feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
                <label for="floatingInput">Email address</label>
                @error('email')
                <div id="validationServer04Feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" value="{{ old('password') }}">
                <label for="floatingPassword">Password</label>
                @error('password')
                <div id="validationServer04Feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
              <small class="d-block text-center mt-4">Already Registered? <a href="/login" class="text-decoration-none">Login Now!</a></small>
            </form>
        </main>
    </div>
</div>

@endsection