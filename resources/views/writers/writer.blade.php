@extends('layouts.app')

@vite(['resources/sass/writers.scss',
        'resources/js/tabs.js'])

@section('content')
<!-- breadcrumb is here -->

<!-- writer's acount here -->
<div class="writer_account">
  @if(Auth::user()->avatar)
    <img 
      src="{{ Auth::user()->avatar }}" 
      alt="{{ Auth::user()->name }}" 
      class="rounded-circle avatar-lg"
    >
    &nbsp;
    {{ Auth::user()->name }}
  @else
    <img 
      src="{{asset('/images//profile_icon.png')}}" 
      alt="{{ Auth::user()->name }}" 
      class="rounded-circle avatar-lg"
    >
    </i> 
    &nbsp;
    {{ Auth::user()->name }}
  @endif
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
      Recently shared
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

    <!-- tab_panel area/ specific recipe page here! -->
  <div class="tab_panel w-100">
    @include('writers.recently')
    @include('writers.appetizer')
    @include('writers.sidedish')
    @include('writers.maindish')
    @include('writers.dessert')
  </div>
</div>
<!-- pagenate will insert to each page. -->
@endsection
