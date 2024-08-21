@extends('layouts.app')

{{-- Read the scss for login --}}
@vite(['resources/sass/login.scss'])

@section('title', 'Login')

@section('content')
<div class="py-5 login-bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        {{-- Login card --}}
        <div id="login-card" class="card login-card my-auto">
          <div class="card-body">
            {{-- Login title --}}
            <p class="mb-5 display-4 login-card-ttl"><i class="fa-solid fa-chevron-left fa-xs login-card-ttl"></i>Log in</p>
            <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
              @csrf
              
              {{-- Email address input field --}}
              <div class="row mb-3 justify-content-center">
                <div class="col-10">
                  <input 
                  type="email"
                  name="email" 
                  id="email" 
                  class="form-control @error('email') is-invalid @enderror" 
                  placeholder="Email address"
                  required
                  autocomplete="email"
                  value="{{ old('email') }}"
                  >
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              
              {{-- Password input field --}}
              <div class="row mb-5 justify-content-center">
                <div class="col-10">
                  <input 
                  type="password" 
                  name="password" 
                  id="password" 
                  class="form-control @error('password') is-invalid @enderror" 
                  placeholder="Password"
                  required autocomplete="current-password"
                  >
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              
              {{-- Login button --}}
              <div class="row mb-4 justify-content-center">
                <div class="col-10">
                  <button id="login-card-btn" type="submit" class="btn w-100 login-card-btn">Log in</button>
                </div>
              </div>
              
              {{-- New registration link--}}
              <div class="row mb-3">
                <div class="col px-auto">
                  <p class="text-center fw-bold are-you-new">Are you new here? <a href="{{ route('register') }}" class="text-decoration-none register-link">Register</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  @endsection