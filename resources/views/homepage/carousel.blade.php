@vite(['resources/sass/carousel.scss'])
<div 
  id="carouselAutoplaying" 
  class="carousel slide m-0" 
  data-bs-ride="carousel"
>
  <div class="carousel-inner carousel_menu">
    <div class="carousel-item active is-active">
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