@extends('layouts.app')

@vite(['resources/sass/profile_edit.scss'])

@section('content') 
<div class="row w-100">
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
    <div class="contents" style="width: 75%; margin-left: 8rem; margin-top: 1.5rem; border: solid grey;">
        <div style="width: 50%; margin-left: 25%; border: solid black">
            <div class="breadcrumb" style="border: solid red">
                <a href="#">Home</a> &gt; <a href="#">Mr. Cook</a> &gt; <a href="#" class="selected fw-bold">Profile edit</a>
            </div>
            <div class="avatar-title" style="border: solid black">
                <p class="fw-bold" style="border: solid black">Avatar</p>
            </div>
            <div class="avatar-container" style="border: solid red">
                <div class="avatar">
                    <img src="/images/avatar.png" alt="Avatar">
                </div>
                <div class="arrow" style="border: solid green;">
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="update-photo fw-bold">
                    <span>Update your photo</span>
                </div>
            </div>
            <form style="border: solid blue">
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