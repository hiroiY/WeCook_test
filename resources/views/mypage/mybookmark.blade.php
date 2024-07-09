@extends('layouts.app')

@vite(['resources/js/tabs2.js'])

@vite(['resources/sass/mybookmark.scss'])

@section('content') 
<div class="row w-100">
  <div class="col-auto">
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar d-flex" >
      <div class="position-sticky">
        <div class="list-group-flush">
          <a
          href="#"
          class="list-group-item list-group-item-action p-2 ripple fw-bold unselected"
          aria-current="true"
          >
            <span class="ms-auto">My Recipe</span>
          </a>
          <a href="#"
          class="list-group-item list-group-item-action p-2 ripple selected">
            <span>My Bookmark</span>
          </a>
          <a href="#"
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
      style="max-width: 97%; height: 1200px;"
    >
      <ul class="tab_menu m-0 p-0">
        <li
          class="tab_menu-item w-100 is-active"
          data-tab="01"
        >
          Appetizer (10)
        </li>
        <li
          class="tab_menu-item  w-100"
          data-tab="02"
        >
          Side dish (5)
        </li>
        <li
          class="tab_menu-item w-100"
          data-tab="03"
        >
          Main dish (7)
        </li>
        <li
          class="tab_menu-item w-100"
          data-tab="04"
        >
          Dessert (8)
        </li>
      </ul>
        <!-- tab_panel area/ text here! -->
      <div class="tab_panel">
        <div
          class="tab_panel-box is-show"
          data-panel="01"
        >
          <div class="tab_panel-text">
          @include('mypage.mybookmark_tab.appetizer')
          </div>
        </div>
        <div
          class="tab_panel-box"
          data-panel="02"
        >
          <div class="tab_panel-text">
          @include('mypage.mybookmark_tab.sidedish')
          </div>
        </div>
        <div
          class="tab_panel-box"
          data-panel="03"
        >
          <div class="tab_panel-text">
            @include('mypage.mybookmark_tab.maindish')
          </div>
        </div>
        <div
          class="tab_panel-box"
          data-panel="04"
        >
          <div class="tab_panel-text">
            @include('mypage.mybookmark_tab.dessert')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection