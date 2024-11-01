@vite(['resources/sass/recipe_card_homepage.scss'])
<<<<<<< HEAD
{{-- @foreach()--}}
=======
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
<div 
  class="tab_panel-box" 
  data-panel="05"
>
<<<<<<< HEAD
  <div class="row px-4 py-1">
=======
<div class="row px-4 py-1">
  @forelse($writer_dessert as $post)
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
    <div class="col-4 p-2">
      <!-- recipe card -->
      <div class="card recipe_card w-100">
        <!-- recipe photo -->
<<<<<<< HEAD
        <img 
          src="{{ asset('/images/recipe_photos/chocolate_donatus.jpg') }}" 
          alt="" 
          class="recipe_photo"
        >
        <div class="card-body">
          <!-- recipe title -->
          <div class="row mt-2 recipe_title">
            <div class="col-auto pe-4">
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
            <div class="col-auto ps-3">
              <a href="">
                <i class="fa-regular fa-bookmark"></i>
              </a>
            </div>
          </div>
          <!-- recipe discription -->
          <p class="card-text">
            1st recipe.1st recipe.1st recipe.1st recipe.1st recipe.1st recipe.1st recipe.Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro fuga maiores nihil accusantium. Adipisci illo laborum sint quia rem maiores!
=======
        <a 
          href="{{ route('detailrecipe', [$post->id, $writer->id]) }}" 
        >
          @if($post->photo)
            <img 
              src="{{ $post->photo }}" 
              alt="{{ $post->title }}" 
              class="recipe_photo"
            >
          @else
            <img 
              src="{{ asset('/images/recipe_photos/weCook.png') }}" 
              alt="{{ $post->title }}" 
              class="recipe_photo"
            >
          @endif
        </a>
        <div class="card-body">
          <!-- recipe title -->
          <div class="row mt-2">
              <div class="col-8 pe-4">
                <a 
                  href="{{ route('detailrecipe',
                  ['post_id'=>$post->id, 
                  'user_id'=>$post->user->id]) }}"
                  class="text-decoration-none"
                >
                  <h4 class="card-title">
                    {{ $post->title }}
                  </h4>
                </a>
              </div>
              <!-- transit to the comment area -->
              <div class="col-auto px-0 d-none d-lg-block">
                <a href="{{ route('detailrecipe',
                  ['post_id'=>$post->id, 
                  'user_id'=>$post->user->id]) }}/#comment-start">
                  &#xf086; 
                  <span>
                    {{ $post->comment->count() }}
                  </span>
                </a>
              </div>
              <div class="col-1 d-none d-lg-block">
                @auth
                  @if($post->isBookmarked())
                    <a href="{{ route('bookmark.toggle', ['post_id' => $post->id]) }}">
                      <i class="fa-solid fa-bookmark"></i>
                    </a>
                  @else
                    <a href="{{ route('bookmark.toggle', ['post_id' => $post->id]) }}">
                      <i class="fa-regular fa-bookmark"></i>
                    </a>
                  @endif
                @endauth
              </div>
              <!-- responsive style (max-width: 912px) -->
              <div class="col-1 d-lg-none ms-auto me-3">
                <div class="dropdown">
                  <button 
                    class="btn
                    dropdown-toggle btn-lg" 
                    type="button" 
                    id="dropdownMenuButton" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false"
                    style="color: #887569; border: none;"
                  >
                  </button>
                  <ul 
                    class="dropdown-menu" 
                    aria-labelledby="dropdownMenuButton"
                  >
                    <li  style="width: auto; margin-right: 1em; padding-right:0;">
                      <a 
                        class="dropdown-item tog-icon" 
                        href="{{ route('detailrecipe', ['post_id'=>$post->id, 'user_id'=>$post->user->id]) }}/#comment-start"
                      >
                        &#xf086; 
                        <span>{{ $post->comment->count() }}</span>
                      </a>
                    </li>
                    <li  style="width: auto; margin-right: 1em; padding-right: 0;">
                      @auth
                        @if($post->isBookmarked())
                          <a 
                            class="dropdown-item  tog-icon" 
                            href="{{ route('bookmark.toggle', ['post_id' => $post->id]) }}"
                          >
                            <i class="fa-solid fa-bookmark"></i>
                          </a>
                        @else
                          <a 
                            class="dropdown-item tog-icon" 
                            href="{{ route('bookmark.toggle', ['post_id' => $post->id]) }}"
                          >
                            <i class="fa-regular fa-bookmark"></i>
                          </a>
                        @endif
                      @endauth
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          <!-- recipe description -->
          <p class="card-text pt-0">
            {{ $post->description }}
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
          </p>
        </div>
      </div>
    </div>
<<<<<<< HEAD
    <div class="col-4 mx-auto p-2">
      <div class="card">
        <img src="{{ asset('/images/recipe_photos/chocolate_donatus.jpg') }}" alt="" class="recipe_photo">
        <div class="card-body">
          <div class="row mt-2 recipe_title">
            <div class="col-auto pe-4">
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
            <div class="col-auto ps-3">
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
            <div class="col-auto pe-4">
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
            <div class="col-auto ps-3">
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
  </div>
=======
  @empty
    <div class="col-auto mx-auto">
      <p class="h2 sorry">Sorry! No recipe yet.</h3>
    </div>
  @endforelse
</div>
<div class="pagination-wrapper">
  {{ $writer_dessert->links() }}
</div>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
</div>