@extends('layouts.app')

@vite(['resources/sass/mybookmark.scss', 'resources/js/tabs_pagination.js'])

@section('content')
<div class="row w-100">
  <div class="col-auto">
    @if(Auth::user()->role_id===1)
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar d-flex" >
        <div class="position-sticky">
          <div class="list-group-flush">
            <a
            href="{{ route('myrecipe', ['id' => $user->id]) }}"
            class="list-group-item list-group-item-action p-2 ripple unselected"
            aria-current="true"
            >
              <span class="ms-auto">My Recipe</span>
            </a>
            <a href="#"
            class="list-group-item list-group-item-action p-2 ripple selected">
              <span>My Bookmark</span>
            </a>
            <a href="{{ route('profile_edit', ['id' => $user->id]) }}" 
            class="list-group-item list-group-item-action p-2 ripple unselected">
              <span>Profile Edit</span>
            </a>
          </div>
        </div>
      </nav>
    @else
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar d-flex" >
        <div class="position-sticky">
          <div class="list-group-flush">
            <a
            href="{{ route('myrecipe', ['id' => Auth::user()->id]) }}"
            class="list-group-item list-group-item-action p-2 ripple unselected"
            aria-current="true"
            >
              <span class="ms-auto">My Recipe</span>
            </a>
            <a href="#"
            class="list-group-item list-group-item-action p-2 ripple selected">
              <span>My Bookmark</span>
            </a>
            <a href="{{ route('profile_edit', ['id' => Auth::user()->id]) }}" 
            class="list-group-item list-group-item-action p-2 ripple unselected">
              <span>Profile Edit</span>
            </a>
          </div>
        </div>
      </nav>
    @endif
  </div>
  <!-- tab menu area/HTML -->
  <div class="col w-100">
    @if(Auth::user()->role_id===1)
      <h4 class="pt-5 ps-3">You are visiting <span style="color: #E45900">{{ $user->name }}</span>'s page</h4>
    @endif
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
            @include('mypage.mybookmark_tab.appetizer')
          </div>
          <!-- <div class="pagination-wrapper" style="border: solid red; ">
                {{ $appetizer_posts->links() }}
            </div> -->
        </div>
        <div class="tab_panel-box" data-panel="02">
          <div class="tab_panel-text">
            @include('mypage.mybookmark_tab.sidedish')
          </div>
        </div>
        <div class="tab_panel-box" data-panel="03">
          <div class="tab_panel-text">
            @include('mypage.mybookmark_tab.maindish')
          </div>
        </div>
        <div class="tab_panel-box" data-panel="04">
          <div class="tab_panel-text">
            @include('mypage.mybookmark_tab.dessert')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
