@vite(['resources/sass/carousel.scss'])
<<<<<<< HEAD
@vite(['resources/js/carousel.js'])
<div 
  id="carouselAutoplaying" 
  class="carousel slide"
=======
<div 
  id="carouselAutoplaying" 
  class="carousel slide m-0" 
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
  data-bs-ride="carousel"
>
  <div class="carousel-inner carousel_menu">
    <div class="carousel-item active is-active">
<<<<<<< HEAD
      <a href="">
        <div class="appetizer h-100">
          <h1>appetizer</h1>
        </div>
      </a>
    </div>
    <div class="carousel-item">
      <a href="">
        <div class="sidedish h-100">
          <h1>side dish</h1>
        </div>
      </a>
    </div>
    <div class="carousel-item">
      <a href="">
          <div class="maindish h-100">
            <h1>main dish</h1>
          </div>
      </a>
    </div>
    <div class="carousel-item">
      <a href="">
        <div class="dessert h-100">
          <h1>dessert</h1>
        </div>
      </a>
=======
      {{-- <a href=""> --}}
        <div class="appetizer d-flex justify-content-center">
          <span>appetizer</span>
        </div>
      {{-- </a> --}}
    </div>
    <div class="carousel-item">
      {{-- <a href=""> --}}
          <div class="sidedish d-flex justify-content-center">
            <span>side dish</span>
          </div>
      {{-- </a> --}}
    </div>
    <div class="carousel-item">
      {{-- <a href=""> --}}
            <div class="maindish d-flex justify-content-center">
              <span>main dish</span>
            </div>
      {{-- </a> --}}
    </div>
    <div class="carousel-item">
      {{-- <a href=""> --}}
        <div class="dessert d-flex justify-content-center">
          <span>dessert</span>
        </div>
      {{-- </a> --}}
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
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