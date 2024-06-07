@extends('layouts.app')

<link 
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
  rel="stylesheet" 
  integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
  crossorigin="anonymous"
>

@section('content')
<!-- Top photo Carousel -->

<div 
  id="carouselExampleAutoplaying" 
  class="carousel slide h-25"
  data-bs-ride="carousel"
>
  <div class="carousel-inner">
    <!-- <div class="carousel-item active">
      <img src="/images/homepage_top.png" class="d-block w-100 h-25" alt="homepage_top photo">
    </div> -->
    <div class="carousel-item active">
      <a href="#">
        <img 
          src="/images/homepage_appetizer.png" 
          class="d-block w-100 h-100" 
          alt="homepage_appetizer photo"
        >
      </a>
    </div>
    <div class="carousel-item">
     <a href="#">
        <img 
          src="/images/homepage_sidedish.png" 
          class="d-block w-100 h-100" 
          alt="homepage_sidedish photo"
        >
      </a>
    </div>
    <div class="carousel-item">
      <a href="#">
        <img 
          src="/images/homepage_maindish.png" 
          class="d-block w-100 h-100" 
          alt="homepage_maindish photo"
        >
      </a>
    </div>
    <div class="carousel-item">
      <a href="#">
        <img 
          src="/images/homepage_dessert.jpg" 
          class="d-block w-100 h-100" 
          alt="homepage_dessert photo"
        >
      </a>
    </div>
  </div>
  <button 
    class="carousel-control-prev" 
    type="button" 
    data-bs-target="#carouselExampleAutoplaying" 
    data-bs-slide="prev"
  >
    <span 
      class="carousel-control-prev-icon" 
      aria-hidden="true"
    >
    </span>
    <span class="visually-hidden">
      Previous
    </span>
  </button>
  <button 
    class="carousel-control-next" 
    type="button" 
    data-bs-target="#carouselExampleAutoplaying" 
    data-bs-slide="next"
  >
    <span 
      class="carousel-control-next-icon" 
      aria-hidden="true">
    </span>
    <span class="visually-hidden">
      Next
    </span>
  </button>
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
      <p class="tab_panel-text">
        Resently shared recipe page here.
      </p>
    </div>
    <div 
      class="tab_panel-box" 
      data-panel="02"
    >
      <p class="tab_panel-text">
        Appetizer recipe page here.
      </p>
    </div>
    <div 
      class="tab_panel-box" 
      data-panel="03"
    >
      <p class="tab_panel-text">
        Side dish recipe page here.
      </p>
    </div>
    <div 
      class="tab_panel-box" 
      data-panel="04"
    >
      <p class="tab_panel-text">
        main dish recipe page here.
      </p>
    </div>
    <div 
      class="tab_panel-box" 
      data-panel="05"
    >
      <p class="tab_panel-text">
        dessert recipe page here.
      </p>
    </div>
  </div>
</div>




<script src="/index.js"></script>
@endsection