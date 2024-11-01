@extends('layouts.app')

@vite([
    'resources/sass/search.scss',
<<<<<<< HEAD
    'resources/js/tabs.js'
=======
    'resources/js/search_tabs_page.js'
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
])

@section('content')
<!-- search results area -->
<<<<<<< HEAD
<div class="row justify-content-center mt-5">
  <div class="col-6 search_results">
      <p class="h4 mb-4">Search results for &nbsp;
        "<span class="fw-bold">Chicken{{-- $search --}}</span>"</p>
=======
<div 
  class="row justify-content-center mt-5"
  id="content-start";
>
  <div class="col-6 search_results" name="search">
      <p class="h4 mb-4">Search results for &nbsp;
        "<span>{{ $search }}</span>" ... ({{ $recipes->count() }})</p>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
  </div>
</div>

<!-- Tab menu area -->
<<<<<<< HEAD
<div class="tab mx-auto mt-5" style="max-width: 95%;">
=======
<div 
  class="tab mx-auto my-5" 
  style="max-width: 95%;"
>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
    <ul class="tab_menu m-0 p-0">
        <li 
          class="tab_menu-item is-active" 
          data-tab="01"
        >
<<<<<<< HEAD
          Appetizer&nbsp;<span>(11{{-- $user->recipes->count() --}})</span>
=======
          Appetizer&nbsp;<span>({{ $recipes->where('dish_id',1)->count() }})</span>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
      </li>
        <li 
          class="tab_menu-item" 
          data-tab="02"
        >
<<<<<<< HEAD
          Side dish&nbsp;<span>(11{{-- $user->recipes->count() --}})</span>
=======
          Side dish&nbsp;<span>({{ $recipes->where('dish_id', 2)->count() }})</span>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
        </li>
        <li 
          class="tab_menu-item" 
          data-tab="03"
        >
<<<<<<< HEAD
          Main dish&nbsp;<span>(11{{-- $user->recipes->count() --}})</span>
=======
          Main dish&nbsp;<span>({{ $recipes->where('dish_id', 3)->count() }})</span>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
      </li>
        <li 
          class="tab_menu-item" 
          data-tab="04"
        >
<<<<<<< HEAD
          Dessert&nbsp;<span>(11{{-- $user->recipes->count() --}})</span>
=======
          Dessert&nbsp;<span>({{ $recipes->where('dish_id', 4)->count() }})</span>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
      </li>
    </ul>

    <!-- Tab panel area / specific recipe page here! -->
    <div class="tab_panel w-100">
        @include('search.appetizer')
        @include('search.sidedish')
        @include('search.maindish')
        @include('search.dessert')
    </div>
</div>
<!-- Pagination will insert to each page. -->
@endsection