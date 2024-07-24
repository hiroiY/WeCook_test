@extends('layouts.app')

@vite(['resources/js/tabs.js'])
@vite(['resources/sass/myrecipe.scss', 'resources/js/tabs_pagination.js'])

@section('content')
<div class="row w-100">
  <div class="col-auto">
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar d-flex" >
      <div class="position-sticky">
        <div class="list-group-flush">
          <a
          href="#"
          class="list-group-item list-group-item-action p-2 ripple fw-bold selected"
          aria-current="true"
          >
            <span class="ms-auto">My Recipe</span>
          </a>
          <a href="{{ route('mybookmark', ['id' => Auth::user()->id]) }}"
          class="list-group-item list-group-item-action p-2 ripple unselected">
            <span>My Bookmark</span>
          </a>
          <a href="{{ route('profile_edit', ['id' => Auth::user()->id]) }}" 
          class="list-group-item list-group-item-action p-2 ripple unselected">
            <span>Profile Edit</span>
          </a>
        </div>
      </div>
    </nav>
  </div>
  <!-- tab menu area/HTML -->
  <div class="col w-100">
    <div
      class="tab me-auto mt-5"
      style="max-width: 97%; height: 1600px;"
      id="content-start"
    >
      <ul class="tab_menu m-0 p-0">
        <li class="tab_menu-item w-100 is-active" data-tab="01">
          Appetizer ({{ $appetizer_count }})
        </li>
        <li class="tab_menu-item w-100" data-tab="02">
          Side dish ({{ $sidedish_count }})
        </li>
        <li class="tab_menu-item w-100" data-tab="03">
          Main dish ({{ $maindish_count }})
        </li>
        <li class="tab_menu-item w-100" data-tab="04">
          Dessert ({{ $dessert_count }})
        </li>
      </ul>
      <!-- tab_panel area/ text here! -->
      <div class="tab_panel">
        <div class="tab_panel-box is-show" data-panel="01">
          <div class="tab_panel-text">
            @include('mypage.myrecipe_tab.appetizer', ['posts' => $appetizer_posts, 'post_counts' => $post_counts])
          </div>
        </div>
        <div class="tab_panel-box" data-panel="02">
          <div class="tab_panel-text">
            @include('mypage.myrecipe_tab.sidedish', ['posts' => $sidedish_posts, 'post_counts' => $post_counts])
          </div>
        </div>
        <div class="tab_panel-box" data-panel="03">
          <div class="tab_panel-text">
            @include('mypage.myrecipe_tab.maindish', ['posts' => $maindish_posts, 'post_counts' => $post_counts])
          </div>
        </div>
        <div class="tab_panel-box" data-panel="04">
          <div class="tab_panel-text">
            @include('mypage.myrecipe_tab.dessert', ['posts' => $dessert_posts, 'post_counts' => $post_counts])
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
