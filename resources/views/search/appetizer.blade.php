@vite(['resources/sass/recipe_card_homepage.scss'])
<div 
  class="tab_panel-box" 
  data-panel="01"
>
  <div class="row px-4 py-1">
    @forelse($appetizer as $post)
      <div class="col-4 p-2">
        <!-- recipe card -->
        <div class="card">
          <!-- recipe photo -->
          <a 
            href="{{ route('detailrecipe',
                  ['post_id'=>$post->id, 
                  'user_id'=>$post->user->id]) }}" 
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
              <div class="col-auto px-0">
                <a href="">
                  &#xf086; 
                  <span>
                    {{ $post->comment->count() }}
                  </span>
                </a>
              </div>
              <div class="col-1">
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
            </div>
            <!-- recipe discription -->
            <p class="card-text pt-0">
              {{ $post->description }}
            </p>
          </div>
        </div>
      </div>
    @empty
      <div class="col-auto mx-auto">
        <p class="h2 sorry">Sorry! No Recipe Available.</p>
      </div>
    @endforelse
  </div>
  {{ $appetizer->links() }}
</div>