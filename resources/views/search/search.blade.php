@extends('layouts.app')

@vite([
    'resources/sass/search.scss',
    'resources/js/search_tabs_page.js'
])

@section('content')
<!-- search results area -->
<div 
  class="row justify-content-center mt-5"
  id="content-start";
>
  <div class="col-6 search_results" name="search">
      <p class="h4 mb-4">Search results for &nbsp;
        "<span>{{ $search }}</span>" ... ({{ $recipes->count() }})</p>
  </div>
</div>

<!-- Tab menu area -->
<div 
  class="tab mx-auto my-5" 
  style="max-width: 95%;"
>
    <ul class="tab_menu m-0 p-0">
        <li 
          class="tab_menu-item is-active" 
          data-tab="01"
        >
          Appetizer&nbsp;<span>({{ $recipes->where('dish_id',1)->count() }})</span>
      </li>
        <li 
          class="tab_menu-item" 
          data-tab="02"
        >
          Side dish&nbsp;<span>({{ $recipes->where('dish_id', 2)->count() }})</span>
        </li>
        <li 
          class="tab_menu-item" 
          data-tab="03"
        >
          Main dish&nbsp;<span>({{ $recipes->where('dish_id', 3)->count() }})</span>
      </li>
        <li 
          class="tab_menu-item" 
          data-tab="04"
        >
          Dessert&nbsp;<span>({{ $recipes->where('dish_id', 4)->count() }})</span>
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