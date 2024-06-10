@extends('layouts.app')

@vite(['resources/sass/homepage.scss',
        'resources/js/tabs.js'])
@vite(['resources/sass/carousel.scss'])

@section('content')
<!-- Top image Carousel -->
<div class="w-100 h-25">
  @include('homepage.carousel')
</div>

<!-- tab menu area -->
<div 
  class="tab mx-auto mt-5" 
  style="max-width: 95%;"
>
  <ul class="tab_menu m-0 p-0">
    <li 
      class="tab_menu-item is-active" 
      data-tab="01"
    >
      Resently shared
    </li>
    <li 
      class="tab_menu-item " 
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

    <!-- tab_panel area/ text here! -->
  <div class="tab_panel w-100">
    <div 
      class="tab_panel-box is-show" 
      data-panel="01"
    >
      <div class="tab_panel-text">
        Resently shared recipe page here.
      </div>
    </div>
    <div 
      class="tab_panel-box" 
      data-panel="02"
    >
      <div class="tab_panel-text">
        Appetizer recipe page here.
      </div>
    </div>
    <div 
      class="tab_panel-box" 
      data-panel="03"
    >
      <div class="tab_panel-text">
        Side dish recipe page here.
      </div>
    </div>
    <div 
      class="tab_panel-box" 
      data-panel="04"
    >
      <div class="tab_panel-text">
        main dish recipe page here.
      </div>
    </div>
    <div 
      class="tab_panel-box" 
      data-panel="05"
    >
      <div class="tab_panel-text">
        dessert recipe page here.
      </div>
    </div>
  </div>
</div>

@endsection