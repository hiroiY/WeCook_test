@extends('layouts.app')

@vite(['resources/sass/profile_edit.scss'])

@section('content')
<div class="container-fluid">
    <div class="row body">
        <!-- side bar -->
        <div class="col-1" style="padding: 0;">
            <nav id="sidebarMenu" class="sidebar collapse d-lg-block">
                <div class="position-sticky">
                    <div class="list-group-flush">
                        <a href="{{ route('myrecipe', ['id' => Auth::user()->id]) }}" class="list-group-item list-group-item-action p-2 ripple unselected" aria-current="true">
                            <span class="ms-auto">My Recipe</span>
                        </a>
                        <a href="{{ route('mybookmark', ['id' => Auth::user()->id]) }}" class="list-group-item list-group-item-action p-2 ripple unselected">
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
                            <a href="{{ route('myrecipe', ['id' => Auth::user()->id]) }}">{{ Auth::user()->name }}</a> >
                            <a href="#" class="selected-breadcrumb">Profile Edit</a>
                        </p>
                    </div>
                    <!-- Avatar -->
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" class="form-control" name="avatar" aria-describedby="image-info">
                        <div class="file-info mt-2" id="file-info">
                            The acceptable formats are jpeg, jpg, png and gif only.<br>
                            Max file size is 1048kB.
                        </div>
                    </div>
                    <!-- Username -->
                    <div class="form-group">
                        <label for="name" class="form-label" style="font-size: 1.5rem;">Username</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="{{ Auth::user()->name }}">
                    </div>
                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email" class="form-label" style="font-size: 1.5rem;">Email address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
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
