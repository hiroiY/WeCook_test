@extends('layouts.app')

@vite(['resources/sass/profile_edit.scss'])

<<<<<<< HEAD
@section('content') 
<div class="body row w-100">
    <div class="col-auto">
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar d-flex" >
        <div class="position-sticky">
            <div class="list-group-flush">
            <a
            href="#"
            class="list-group-item list-group-item-action p-2 ripple fw-bold unselected"
            aria-current="true"
            >
                <span class="ms-auto">My Recipe</span>
            </a>
            <a href="#"
            class="list-group-item list-group-item-action p-2 ripple unselected">
                <span>My Bookmark</span>
            </a>
            <a href="#"
            class="list-group-item list-group-item-action p-2 ripple selected">
                <span>Profile Edit</span>
            </a>
            </div>
        </div>
        </nav>
    </div>
    <!-- profile edit -->
    <div class="" style="width: 75%; height: 100%; margin-left: 5.5rem;">
        <div style="width: 50%; margin-top: 3rem; margin-bottom: 3rem; margin-left: 22rem;">
            <div class="breadcrumb">
                <a href="#">Home</a> &gt; <a href="#">Mr. Cook</a> &gt; <a href="#" class="selected fw-bold">Profile Edit</a>
            </div>
            <div class="form-group">
                <label for="profile-image" class="form-label fw-bold"  style="font-size: 1.5rem">Avatar</label>
                <input type="file" name="profile-image" id="profile-image" class="form-control" aria-describedby="image-info">
                <div class="file-info" id="file-info">
                    The acceptable formats are jpeg, jpg, png and gif only.<br>
                    Max file size is 1048kB.
                </div>
            </div>
            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Mr.Cook">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" id="email" name="email" placeholder="Email address">
                </div>
                <button type="submit" class="btn fw-bold" style="color: #F7F3EB; background-color: #ff7a00;">Update profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
=======
@section('content')
<div class="container-fluid">
    <div class="row body">
        <!-- side bar -->
        <div class="col-1" style="padding: 0;">
            <nav id="sidebarMenu" class="sidebar collapse d-lg-block">
                <div class="position-sticky">
                    <div class="list-group-flush">
                        <a href="{{ route('myrecipe', ['id' => $user->id]) }}" class="list-group-item list-group-item-action p-2 ripple unselected" aria-current="true">
                            <span class="ms-auto">My Recipe</span>
                        </a>
                        <a href="{{ route('mybookmark', ['id' => $user->id]) }}" class="list-group-item list-group-item-action p-2 ripple unselected">
                            <span>My Bookmark</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action p-2 ripple selected">
                            <span>Profile Edit</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- profile edit -->
        <div class="col-11">
            <div class="contents-box p-3">
                <!-- Bread Crumb -->
                <form action="{{ route('profile_update', $user->id) }}" method="POST" enctype="multipart/form-data" id="profile-form">
                    @csrf
                    @method('PATCH')
                    <div class="my-4 breadcrumb">
                        <p>
                            <a href="{{ route('home') }}">Home</a> >
                            <a href="{{ route('myrecipe', ['id' => $user->id]) }}">{{ $user->name }}</a> >
                            <a href="#" class="selected-breadcrumb">Profile Edit</a>
                        </p>
                    </div>
                    <!-- Avatar -->
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <div class="d-flex justify-content-center">
                        @if($user->avatar)
                            <img src="{{ $user->avatar }}" alt="{{  $user->avatar }}'s avatar"
                            class="current-avatar me-4">
                            <i class="fa-solid fa-arrow-right my-auto me-4"></i>
                        @endif
                        <input type="file" class="form-control my-auto"  name="avatar" id="avatar" aria-describedby="image-info">
                        </div>
                    
                        <div class="file-info mt-2" id="file-info">
                            The acceptable formats are jpeg, jpg, png and gif only.<br>
                            Max file size is 1048kB.
                        </div>
                        @error('avatar')
                            <p class="alert alert-danger text-danger small fw-bold">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <!-- Username -->
                    <div class="form-group">
                        <label for="name" class="form-label" style="font-size: 1.5rem;">Username</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Username" value="{{ old('email',$user->name) }}">
                        @error('name')
                            <p class="alert alert-danger text-danger small fw-bold">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email" class="form-label" style="font-size: 1.5rem;">Email address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email',$user->email) }}">
                        @error('email')
                            <p class="alert alert-danger text-danger small fw-bold">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <!-- Submit Button -->
                    <div class="submit-box mt-5">
                        <button type="submit" class="submit-button btn fw-bold">Update profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
