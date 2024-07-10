@extends('layouts.app')

@vite(['resources/sass/detailrecipe.scss'])
@section('content')
<!-- <body class="detailrecipe1"> -->
    <div class="container detailrecipe mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" style="color:black;">
                    <a href="{{ route('home') }}" style="color:black;">Home</a>
                </li>
                {{-- <li class="breadcrumb-item" style="color:black;">
                    <a href="{{ route('home') }}" style="color:black;">Cook Chef</a> --}}
                </li>
                <li class="breadcrumb-item active" style="color:black;" aria-current="page">{{ $recipe->title }}</li>
            </ol>
        </nav>
        <div class="recipe-detail detailrecipe">  
            <div class="d-flex align-items-center mb-3">
                @if (Auth::check() && Auth::id() == $recipe->user_id)
                    @if (Auth::user()->avatar)
                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="chef-icon mr-2 rounded-circle">
                    @else
                        <img src="{{ asset('/images/profile_icon.png') }}" alt="{{ Auth::user()->name }}" class="chef-icon mr-2 rounded-circle">
                    @endif
                    <h2 class="m-0">&nbsp;{{ Auth::user()->name }}</h2>
                @else
                    @if ($recipe->user->avatar)
                        <img src="{{ $recipe->user->avatar }}" alt="{{ $recipe->user->name }}" class="chef-icon mr-2 rounded-circle">
                    @else
                        <img src="{{ asset('/images/profile_icon.png') }}" alt="{{ $recipe->user->name }}" class="chef-icon mr-2 rounded-circle">
                    @endif
                    <h2 class="m-0">&nbsp;{{ $recipe->user->name }}</h2>
                @endif
            </div>
            <h1 class="recipe-title mb-3">
                @auth
                    <i class="fas fa-bookmark {{ $recipe->is_bookmarked ? 'bookmarked' : '' }}"></i>
                @endauth
                {{ $recipe->title }}
            </h1>
            <div class="row">
                <div class="col-md-8">
                @if($recipe->photo)
                    <img 
                        src="{{ $recipe->photo }}" 
                        alt="{{ $recipe->title }}" 
                        class="food-photo"
                    >
                @else
                    <img 
                        src="{{ asset('/images/recipe_photos/weCook.png') }}" 
                        alt="{{ $recipe->title }}" 
                        class="food-photo"
                    >
                @endif
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-primary">{{ $recipe->dish->name }}</span>
                        <span class="text-muted d-flex align-items-center">
                            <i class="far fa-clock mr-2"></i> {{ $recipe->cooking_time }}
                            @if(Auth::check()&&Auth::user()->id === $recipe->user_id)
                                <a href="{{ route('editmyrecipe') }}" class="ml-3"><i class="fas fa-pencil-alt"></i></a>
                            @endif
                        </span>
                    </div>              
                    <h3>Ingredients</h3>
                    <ul>
                        @foreach(explode("\n", $recipe->ingredients) as $ingredient)
                            <li>{{ $ingredient }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <h3>Description</h3>
            <ol>
                @foreach(explode("\n", $recipe->description) as $step)
                    <li>{{ $step }}</li>
                @endforeach
            </ol>
        </div>
    </div>
    @include('comment_qestion\comment_qa')
<!-- </body> -->
@endsection
