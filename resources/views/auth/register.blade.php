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
            <form action="" method="post">
              @csrf

              {{-- Username input --}}
              <div class="row mb-3 justify-content-center">
                <div class="col-10">
                  <input 
                  type="text"
                  name="username" 
                  id="username" 
                  class="form-control" 
                  placeholder="Username"
                  >
                </div>
              </div>

              {{-- Email address input field --}}
              <div class="row mb-3 justify-content-center">
                <div class="col-10">
                  <input 
                  type="email"
                  name="email" 
                  id="email" 
                  class="form-control" 
                  placeholder="Email address"
                  >
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

              {{-- Confirm Password input field --}}
              <div class="row mb-5 justify-content-center">
                <div class="col-10">
                  <input 
                  type="password" 
                  name="confirm-password" 
                  id="confirm-password" 
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
                  <p class="text-center fw-bold already-have-account">Already have an account? <a href="" class="text-decoration-none login-link">Log in</a></p>
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
