@extends('layouts.app')

@vite([
    'resources/sass/homepage.scss',
<<<<<<< HEAD
    'resources/js/tabs.js'
=======
    'resources/js/tabs_pagination.js'
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
])

@section('content')
<!-- Top image Carousel -->
<<<<<<< HEAD
<div class="w-100 h-25">
=======
<div class="w-100" id="top">
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
    @include('homepage.carousel')
</div>

<!-- Tab menu area -->
<div 
<<<<<<< HEAD
    class="tab mx-auto my-5" 
    style="max-width: 92%;"
=======
    class="tab mx-auto py-5" 
    style="max-width: 92%;"
    id="content-start"
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
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
<<<<<<< HEAD
            class="tab_menu-item" 
=======
            class="tab_menu-item"
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
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