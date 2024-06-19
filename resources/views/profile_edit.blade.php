@extends('layouts.app')

@vite(['resources/sass/profile_edit.scss'])

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