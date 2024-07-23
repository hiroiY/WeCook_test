@extends('layouts.app')

@vite(['resources/sass/writers.scss','resources/js/tabs_pagination.js'])
<!-- I will chenge JavaScript file to tabs_pagination.js after the Backend/tab_action merged  -->

@section('content')
<!-- breadcrumb is here -->
<div 
  class="breadcrumb ms-5 mt-3"
  id="content-start"
>
  <a 
  href="{{ route('home') }}"
  >
    Home
  </a> 
  <i 
    class="fa-solid fa-angle-right" 
    style="color:#887569;"
  >
  </i>
  <a 
    href="{{ route('detailrecipe', ['post_id' => $previous_post->id, 'user_id' => $previous_post->user_id]) }}"
  >
  {{ $previous_post->title }}
  </a>
  <i 
    class="fa-solid fa-angle-right" 
    style="color:#887569;"
  >
  </i>
  <span
    class="writer_name"
  >
    {{ $writer->name }}
  </span>
</div>

<!-- writer's acount here -->
<div 
  class="writer_account mt-4 ms-4"
>
  @if($writer->avatar)
    <img 
      src="{{ $writer->avatar }}" 
      alt="{{ $writer->name }}" 
      class="rounded-circle avatar-lg ms-3"
    >
  @else
    <img 
      src="{{asset('/images//profile_icon.png')}}" 
      alt="{{ $writer->name }}" 
      class="rounded-circle avatar-lg ms-3"
    >
  @endif
  <span
    class="writer_name"
  >
    {{ $writer->name }}
  </span>
</div>

<!-- tab menu area -->
<div 
  class="tab mx-auto my-5" 
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
      Appetizer&nbsp;<span>({{ $appetizer_count }})</span>
    </li>
    <li 
      class="tab_menu-item" 
      data-tab="03"
    >
      Side dish&nbsp;<span>({{ $sidedish_count }})</span>
    </li>
    <li 
      class="tab_menu-item" 
      data-tab="04"
    >
      Main dish&nbsp;<span>({{  $maindish_count }})</span>
    </li>
    <li 
      class="tab_menu-item" 
      data-tab="05"
    >
      Dessert&nbsp;<span>({{ $dessert_count }})</span>
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
