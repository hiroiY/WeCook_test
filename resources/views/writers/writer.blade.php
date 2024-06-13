@extends('layouts.app')

@vite(['resources/sass/writers.scss','resources/js/tabs.js'])

@section('content')
<!-- breadcrumb is here -->
<div class="breadcrumb ms-5 mt-3">
  <a 
  href="{{-- route('homepage') --}}"
  >
    Home
  </a> &nbsp; 
  <i 
    class="fa-solid fa-angle-right" 
    style="color:#887569;"
  >
  </i> &nbsp;
  <a 
    href="#"
  >
    Recipe's name{{-- $recipe->name --}}
  </a> &nbsp; 
  <i 
    class="fa-solid fa-angle-right" 
    style="color:#887569;"
  >
  </i> &nbsp;
  <a 
    href="#"
  >
    Writer's name{{-- $recipe->user->name --}}
  </a>
</div>
<!-- writer's acount here -->
<div class="writer_account mt-5 ms-4">
  {{-- @if($recipe->user->avatar) --}}
    <!-- <img 
      src="{{-- $recipe->user->avatar --}}" 
      alt="{{-- $recipe->user->name --}}" 
      class="rounded-circle avatar-lg"
    >
    <a 
      href="#"
    >
      {{-- $recipe->user->name --}} 
    </a>-->
    {{-- $recipe->user->name --}}
  {{-- @else --}}
    <img 
      src="{{asset('/images//profile_icon.png')}}" 
      alt="{{-- $recipe->user->name --}}" 
      class="rounded-circle avatar-lg"
    >
    <a 
      href="#"
    >
      Mr.Cook {{-- $recipe->user->name --}} 
    </a>
  {{-- @endif --}}
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
      Appetizer&nbsp;<span>(11{{-- $user->recipes->count() --}})</span>
    </li>
    <li 
      class="tab_menu-item" 
      data-tab="03"
    >
      Side dish&nbsp;<span>(8{{-- $user->recipes->count() --}})</span>
    </li>
    <li 
      class="tab_menu-item" 
      data-tab="04"
    >
      Main dish&nbsp;<span>(4{{-- $user->recipes->count() --}})</span>
    </li>
    <li 
      class="tab_menu-item" 
      data-tab="05"
    >
      Dessert&nbsp;<span>(1{{-- $user->recipes->count() --}})</span>
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
