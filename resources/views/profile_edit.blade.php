@extends('layouts.app')

@vite(['resources/sass/profile_edit.scss'])

@section('content')
<div class="body row w-100">
    <!-- side bar -->
    <div class="col-auto">
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar d-flex">
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
    <div class="contents">
        <div class="contents-box">
            <!-- Bread Crumb -->
            <form action="{{ route('profile_update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
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
                    <!-- @if (Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="avatar" style="max-width: 150px; margin-top: 10px;">
                    @endif -->
                    <div class="file-info" id="file-info">
                        The acceptable formats are jpeg, jpg, png and gif only.<br>
                        Max file size is 1048kB.
                    </div>
                </div>
                <!-- Username -->
                <div class="form-group">
                    <div class="form" style="font-size: 1.5rem;">
                        <label for="name">Username</label>
                        <input type="text" id="name" name="name" placeholder="{{ Auth::user()->name }}">
                    </div>
                </div>
                <!-- Email Address -->
                <div class="form-group">
                    <div class="form" style="font-size: 1.5rem;">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" placeholder="Email Address">
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="submit-box">
                    <button type="submit" class="submit-button btn fw-bold">Update profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
