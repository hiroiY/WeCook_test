@vite(['resources/sass/recipe_card_homepage.scss'])
{{-- @foreach()--}}
<div 
  class="tab_panel-box" 
  data-panel="05"
>
  <div class="row px-4 py-1">
    <div class="col-4 p-2">
      <!-- recipe card -->
      <div class="card">
        <!-- recipe photo -->
        <img 
          src="{{ asset('/images/recipe_photos/chocolate_donatus.jpg') }}" 
          alt="" 
          class="recipe_photo"
        >
        <div class="card-body">
          <!-- recipe title -->
          <div class="row mt-2 recipe_title">
            <div class="col-8 pe-4">
              <h4 class="card-title">
                Recipe's name here.
                {{-- recipe()->name --}}
              </h4>
            </div>
            <div class="col-auto px-0">
              <a href="">
                &#xf086; 
                <span>
                  11{{-- count here --}}
                </span>
              </a>
            </div>
            <div class="col-1">
              <a href="">
                <i class="fa-regular fa-bookmark"></i>
              </a>
            </div>
          </div>
          <!-- recipe discription -->
          <p class="card-text">
            1st recipe.1st recipe.1st recipe.1st recipe.1st recipe.1st recipe.1st recipe.Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!
          </p>
        </div>
      </div>
    </div>
    <div class="col-4 mx-auto p-2">
      <div class="card">
        <img src="{{ asset('/images/recipe_photos/chocolate_donatus.jpg') }}" alt="" class="recipe_photo">
        <div class="card-body">
          <div class="row mt-2 recipe_title">
            <div class="col-8 pe-4">
              <h4 class="card-title">
                Recipe's name here.
                {{-- recipe()->name --}}
              </h4>
            </div>
            <div class="col-auto px-0">
              <a href="">
                &#xf086; 
                <span>
                  11{{-- count here --}}
                </span>
              </a>
            </div>
            <div class="col-1">
              <a href="">
                <i class="fa-regular fa-bookmark"></i>
              </a>
            </div>
          </div>
          <p class="card-text">
            2nd recipe2nd recipe.2nd recipe.2nd recipe.2nd recipe.2nd recipe.2nd recipe..Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!
          </p>
        </div>
      </div>
    </div>
    <div class="col-4 p-2">
      <div class="card">
        <img src="{{ asset('/images/recipe_photos/chocolate_donatus.jpg') }}" alt="" class="recipe_photo">
        <div class="card-body">
          <div class="row mt-2 recipe_title">
            <div class="col-8 pe-4">
              <h4 class="card-title">
                Recipe's name here.
                {{-- recipe()->name --}}
              </h4>
            </div>
            <div class="col-auto px-0">
              <a href="">
                &#xf086; 
                <span>
                  11{{-- count here --}}
                </span>
              </a>
            </div>
            <div class="col-1">
              <a href="">
                <i class="fa-regular fa-bookmark"></i>
              </a>
            </div>
          </div>
          <p class="card-text">
            3rd recipe.3rd recipe.3rd recipe.3rd recipe.3rd recipe.3rd recipe.Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!
          </p>
        </div>
      </div>
    </div>
    {{--@endforeach--}}
    <div class="col-4 p-2">
      <!-- recipe card -->
      <div class="card">
        <!-- recipe photo -->
        <img 
          src="{{ asset('/images/recipe_photos/chocolate_donatus.jpg') }}" 
          alt="" 
          class="recipe_photo"
        >
        <div class="card-body">
          <!-- recipe title -->
          <div class="row mt-2 recipe_title">
            <div class="col-8 pe-4">
              <h4 class="card-title">
                Recipe's name here.
                {{-- recipe()->name --}}
              </h4>
            </div>
            <div class="col-auto px-0">
              <a href="">
                &#xf086; 
                <span>
                  11{{-- count here --}}
                </span>
              </a>
            </div>
            <div class="col-1">
              <a href="">
                <i class="fa-regular fa-bookmark"></i>
              </a>
            </div>
          </div>
          <!-- recipe discription -->
          <p class="card-text">
            1st recipe.1st recipe.1st recipe.1st recipe.1st recipe.1st recipe.1st recipe.Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!
          </p>
        </div>
      </div>
    </div>
    <div class="col-4 mx-auto p-2">
      <div class="card">
        <img src="{{ asset('/images/recipe_photos/chocolate_donatus.jpg') }}" alt="" class="recipe_photo">
        <div class="card-body">
          <div class="row mt-2 recipe_title">
            <div class="col-8 pe-4">
              <h4 class="card-title">
                Recipe's name here.
                {{-- recipe()->name --}}
              </h4>
            </div>
            <div class="col-auto px-0">
              <a href="">
                &#xf086; 
                <span>
                  11{{-- count here --}}
                </span>
              </a>
            </div>
            <div class="col-1">
              <a href="">
                <i class="fa-regular fa-bookmark"></i>
              </a>
            </div>
          </div>
          <p class="card-text">
            2nd recipe2nd recipe.2nd recipe.2nd recipe.2nd recipe.2nd recipe.2nd recipe..Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!
          </p>
        </div>
      </div>
    </div>
    <div class="col-4 p-2">
      <div class="card">
        <img src="{{ asset('/images/recipe_photos/chocolate_donatus.jpg') }}" alt="" class="recipe_photo">
        <div class="card-body">
          <div class="row mt-2 recipe_title">
            <div class="col-8 pe-4">
              <h4 class="card-title">
                Recipe's name here.
                {{-- recipe()->name --}}
              </h4>
            </div>
            <div class="col-auto px-0">
              <a href="">
                &#xf086; 
                <span>
                  11{{-- count here --}}
                </span>
              </a>
            </div>
            <div class="col-1">
              <a href="">
                <i class="fa-regular fa-bookmark"></i>
              </a>
            </div>
          </div>
          <p class="card-text">
            3rd recipe.3rd recipe.3rd recipe.3rd recipe.3rd recipe.3rd recipe.Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!
          </p>
        </div>
      </div>
    </div>
    <div class="col-4 p-2">
      <!-- recipe card -->
      <div class="card">
        <!-- recipe photo -->
        <img 
          src="{{ asset('/images/recipe_photos/chocolate_donatus.jpg') }}" 
          alt="" 
          class="recipe_photo"
        >
        <div class="card-body">
          <!-- recipe title -->
          <div class="row mt-2 recipe_title">
            <div class="col-8 pe-4">
              <h4 class="card-title">
                Recipe's name here.
                {{-- recipe()->name --}}
              </h4>
            </div>
            <div class="col-auto px-0">
              <a href="">
                &#xf086; 
                <span>
                  11{{-- count here --}}
                </span>
              </a>
            </div>
            <div class="col-1">
              <a href="">
                <i class="fa-regular fa-bookmark"></i>
              </a>
            </div>
          </div>
          <!-- recipe discription -->
          <p class="card-text">
            1st recipe.1st recipe.1st recipe.1st recipe.1st recipe.1st recipe.1st recipe.Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!
          </p>
        </div>
      </div>
    </div>
    <div class="col-4 mx-auto p-2">
      <div class="card">
        <img src="{{ asset('/images/recipe_photos/chocolate_donatus.jpg') }}" alt="" class="recipe_photo">
        <div class="card-body">
          <div class="row mt-2 recipe_title">
            <div class="col-8 pe-4">
              <h4 class="card-title">
                Recipe's name here.
                {{-- recipe()->name --}}
              </h4>
            </div>
            <div class="col-auto px-0">
              <a href="">
                &#xf086; 
                <span>
                  11{{-- count here --}}
                </span>
              </a>
            </div>
            <div class="col-1">
              <a href="">
                <i class="fa-regular fa-bookmark"></i>
              </a>
            </div>
          </div>
          <p class="card-text">
            2nd recipe2nd recipe.2nd recipe.2nd recipe.2nd recipe.2nd recipe.2nd recipe..Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!
          </p>
        </div>
      </div>
    </div>
    <div class="col-4 p-2">
      <div class="card">
        <img src="{{ asset('/images/recipe_photos/chocolate_donatus.jpg') }}" alt="" class="recipe_photo">
        <div class="card-body">
          <div class="row mt-2 recipe_title">
            <div class="col-8 pe-4">
              <h4 class="card-title">
                Recipe's name here.
                {{-- recipe()->name --}}
              </h4>
            </div>
            <div class="col-auto px-0">
              <a href="">
                &#xf086; 
                <span>
                  11{{-- count here --}}
                </span>
              </a>
            </div>
            <div class="col-1">
              <a href="">
                <i class="fa-regular fa-bookmark"></i>
              </a>
            </div>
          </div>
          <p class="card-text">
            3rd recipe.3rd recipe.3rd recipe.3rd recipe.3rd recipe.3rd recipe.Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
