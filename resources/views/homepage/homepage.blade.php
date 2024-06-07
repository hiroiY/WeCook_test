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
      <img 
        src="/images/homepage_appetizer.png" 
        class="d-block w-100 h-100" 
        alt="homepage_appetizer photo"
      >
    </div>
    <div class="carousel-item">
      <img 
        src="/images/homepage_sidedish.png" 
        class="d-block w-100 h-100" 
        alt="homepage_sidedish photo"
      >
    </div>
    <div class="carousel-item">
      <img 
        src="/images/homepage_maindish.png" 
        class="d-block w-100 h-100" 
        alt="homepage_maindish photo"
      >
    </div>
    <div class="carousel-item">
      <img 
        src="/images/homepage_dessert.jpg" 
        class="d-block w-100 h-100" 
        alt="homepage_dessert photo"
      >
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

<!-- Resently shared -->


<script src="/index.js"></script>
@endsection