<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css" >
    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <!-- Bootsorap & Fontawesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm p-1">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/logo//Logo_white.png" alt="logo" class="me-2 pb-2">
                    <span class="wecook">
                        <span class="we">We</span>Cook
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav m-auto">
                        <form action="{{-- route('search') --}}">
                            <input type="search" name="search" id="searchbar" class="form-control" placeholder=" &#xF52A; Search all recipe !" autofocus>
                        </form>
                    </ul>
                    <!-- &#xf002; -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            {{-- NAVIGATION AREA --}}
                            {{-- Create Post Button/link --}}
                            <li class="nav-item me-3" title="Create Post">
                                <a href="{{-- route('post.create') --}}" class="nav-link">
                                <i class="fa-solid fa-pen-to-square"></i> Create post
                                </a>
                            </li>

                            {{-- Account Dropdown Button --}}
                            <div class="account" >
                                <li class="nav-item me-3 dropdown">
                                    <button id="account-dropdown" class="nav-link" data-bs-toggle="dropdown">
                                        @if (Auth::user()->avatar)
                                            <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="rounded-circle avatar-sm">
                                            <span style="color: #F7F3EB;">
                                                {{ Auth::user()->name }}
                                            </span> 
                                        @else
                                            <i class="fa-solid fa-circle-user icon-sm"></i> {{ Auth::user()->name }}
                                        @endif
                                    </button>
                                
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="account-dropdown">
                                        {{--My Recipe Button/Link --}}
                                        <a href="{{-- route('myrecipe.show', Auth::user()->id) --}}" class="dropdown-item">
                                            My Recipe
                                        </a>
                                        {{--My Bookmark Button/Link --}}
                                        <a href="{{-- route('bookmark.show', Auth::user()->id) --}}" class="dropdown-item">
                                            My Bookmark
                                        </a>
                                        {{--My Profile Edit Button/Link --}}
                                        <a href="{{-- route('profile.show', Auth::user()->id) --}}" class="dropdown-item">
                                            Profile Edit
                                        </a>
                                    </div>
                                </div>
                                
                            </li>
                            <li class="nav-item me-3" title="Admin">
                                @can('admin')
                                {{-- Admin Controls --}}
                                <a class="dropdown-item" href="{{-- route('admin.users') --}}">
                                  Admin
                                </a>
                                @endcan
                            </li>
                            <li class="nav-item">
                                {{-- Logout Button/Link --}}
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<footer>
    <!-- include footer file here -->

</footer>
</html>
