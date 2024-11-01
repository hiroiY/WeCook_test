@extends('layouts.app')

<<<<<<< HEAD
@vite(['resources/sass/writers.scss','resources/js/tabs.js'])

@section('content')
<!-- breadcrumb is here -->
<div class="breadcrumb ms-5 mt-3">
=======
@vite(['resources/sass/writers.scss','resources/js/writer_tabs_pagination.js'])
<!-- I will chenge JavaScript file to tabs_pagination.js after the Backend/tab_action merged  -->

@section('content')
<!-- breadcrumb is here -->
<div 
  class="breadcrumb ms-5 mt-3"
  id="content-start"
>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
  <a 
  href="{{ route('home') }}"
  >
    Home
<<<<<<< HEAD
  </a> &nbsp; 
=======
  </a> 
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
  <i 
    class="fa-solid fa-angle-right" 
    style="color:#887569;"
  >
<<<<<<< HEAD
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
=======
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
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
  style="max-width: 95%;"
>
  <ul class="tab_menu m-0 p-0">
    <li 
      class="tab_menu-item is-active" 
      data-tab="01"
    >
      Recently shared
<<<<<<< HEAD

=======
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
    </li>
    <li 
      class="tab_menu-item " 
      data-tab="02"
    >
<<<<<<< HEAD
      Appetizer&nbsp;<span>(11{{-- $user->recipes->count() --}})</span>
=======
      Appetizer&nbsp;<span>({{ $appetizer_count }})</span>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
    </li>
    <li 
      class="tab_menu-item" 
      data-tab="03"
    >
<<<<<<< HEAD
      Side dish&nbsp;<span>(8{{-- $user->recipes->count() --}})</span>
=======
      Side dish&nbsp;<span>({{ $sidedish_count }})</span>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
    </li>
    <li 
      class="tab_menu-item" 
      data-tab="04"
    >
<<<<<<< HEAD
      Main dish&nbsp;<span>(4{{-- $user->recipes->count() --}})</span>
=======
      Main dish&nbsp;<span>({{  $maindish_count }})</span>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
    </li>
    <li 
      class="tab_menu-item" 
      data-tab="05"
    >
<<<<<<< HEAD
      Dessert&nbsp;<span>(1{{-- $user->recipes->count() --}})</span>
=======
      Dessert&nbsp;<span>({{ $dessert_count }})</span>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
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
