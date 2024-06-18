@extends('layouts.app')

@vite([
    'resources/sass/homepage.scss',
    'resources/js/tabs.js'
])

@section('content')
<!-- Top image Carousel -->
<div class="w-100 h-25">
    @include('homepage.carousel')
</div>

<!-- Tab menu area -->
<div 
    class="tab mx-auto mt-5" 
    style="max-width: 92%;"
>
    <ul class="tab_menu tab-content m-0 p-0">
        <li 
            class="tab_menu-item is-active" 
            data-tab="01"
        >
            Recently shared
        </li>
        <li 
            class="tab_menu-item" 
            data-tab="02"
        >
            Appetizer
        </li>
        <li 
            class="tab_menu-item" 
            data-tab="03"
        >
            Side dish
        </li>
        <li 
            class="tab_menu-item" 
            data-tab="04"
        >
            Main dish
        </li>
        <li 
            class="tab_menu-item" 
            data-tab="05"
        >
            Dessert
        </li>
    </ul>

    <!-- Tab panel area / specific recipe page here! -->
    <div class="tab_panel w-100">
        @include('homepage.recently')
        @include('homepage.appetizer')
        @include('homepage.sidedish')
        @include('homepage.maindish')
        @include('homepage.dessert')
    </div>
</div>
<!-- Pagination will insert to each page. -->
@endsection