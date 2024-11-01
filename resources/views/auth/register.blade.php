@extends('layouts.app')

@vite(['resources/sass/register.scss'])

@section('title', 'Register')

@section('content')
<div class="py-5 register-bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        {{-- Register card --}}
        <div id="register-card" class="card my-auto">
          {{-- Register card body --}}
          <div class="card-body">
            {{-- Register card title --}}
            <p class="mb-5 display-4 register-card-ttl"><i class="fa-solid fa-chevron-left fa-xs register-card-ttl"></i>Register</p>
<<<<<<< HEAD
            <form action="" method="post">
=======
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
              @csrf

              {{-- Username input --}}
              <div class="row mb-3 justify-content-center">
                <div class="col-10">
                  <input 
                  type="text"
<<<<<<< HEAD
                  name="username" 
                  id="username" 
                  class="form-control" 
                  placeholder="Username"
                  >
=======
                  name="name" 
                  id="name" 
                  class="form-control @error('name') is-invalid @enderror" 
                  placeholder="Username"
                  >
                  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                </div>
              </div>

              {{-- Email address input field --}}
              <div class="row mb-3 justify-content-center">
                <div class="col-10">
                  <input 
                  type="email"
                  name="email" 
                  id="email" 
<<<<<<< HEAD
                  class="form-control" 
                  placeholder="Email address"
                  >
=======
                  class="form-control @error('email') is-invalid @enderror" 
                  placeholder="Email address"
                  >
                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                </div>
              </div>
              
              {{-- Password input field --}}
              <div class="row mb-3 justify-content-center">
                <div class="col-10">
                  <input 
                  type="password" 
                  name="password" 
                  id="password" 
                  class="form-control" 
                  placeholder="Password"
                  >
                </div>
              </div>
<<<<<<< HEAD

=======
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
              {{-- Confirm Password input field --}}
              <div class="row mb-5 justify-content-center">
                <div class="col-10">
                  <input 
                  type="password" 
<<<<<<< HEAD
                  name="confirm-password" 
                  id="confirm-password" 
=======
                  name="password_confirmation" 
                  id="password_confirmation" 
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                  class="form-control" 
                  placeholder="Confirm password"
                  >
                </div>
              </div>
              
              {{-- Register button --}}
              <div class="row mb-4 justify-content-center">
                <div class="col-10">
                  <button id="register-btn" type="submit" class="btn w-100">Register</button>
                </div>
              </div>
              
              {{-- Login link--}}
              <div class="row mb-3">
                <div class="col px-auto">
<<<<<<< HEAD
                  <p class="text-center fw-bold already-have-account">Already have an account? <a href="" class="text-decoration-none login-link">Log in</a></p>
=======
                  <p class="text-center fw-bold already-have-account">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none login-link">Log in</a></p>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
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
