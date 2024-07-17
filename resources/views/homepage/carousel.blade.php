@vite(['resources/sass/carousel.scss'])
<!-- @vite(['resources/js/carousel.js']) -->
<div 
  id="carouselAutoplaying" 
  class="carousel slide"
  data-bs-ride="carousel"
>
  <div class="carousel-inner carousel_menu">
    <div class="carousel-item active is-active">
      {{-- <a href=""> --}}
        <div class="appetizer h-100">
          <p>appetizer</p>
        </div>
      {{-- </a> --}}
    </div>
    <div class="carousel-item">
      {{-- <a href=""> --}}
          <div class="sidedish h-100">
            <p>side dish</p>
          </div>
      {{-- </a> --}}
    </div>
    <div class="carousel-item">
      {{-- <a href=""> --}}
            <div class="maindish h-100">
              <p>main dish</p>
            </div>
      {{-- </a> --}}
    </div>
    <div class="carousel-item">
      {{-- <a href=""> --}}
        <div class="dessert h-100">
          <p>dessert</p>
        </div>
      {{-- </a> --}}
    </div>
  </div>
  <button 
    class="carousel-control-prev" 
    type="button" 
    data-bs-target="#carouselAutoplaying" 
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
    data-bs-target="#carouselAutoplaying" 
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