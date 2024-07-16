@vite(['resources/sass/myrecipe_tab.scss'])

<div class="tab-content">
    <div class="container">
        <div class="row px-3 py-1">
            @forelse($dessert_posts as $post)
            <div class="col-md-6 px-5 py-5">    
                <div class="card"> 
                    <div class="card-itself container-fluid">
                        <div class="myrecipe-header d-flex justify-content-between align-items-center">
                            <div>
                                <p class="card-title">{{ \Illuminate\Support\Str::limit($post->title, 15) }}</p>
                            </div>
                            <div>
                                <a href="{{ route('editmyrecipe', $post->id) }}">
                                    <i class="edit-icon fa-solid fa-pen"></i>
                                </a>
                            </div>                                                        
                        </div>
                        <div class="image-container">
                            <img src="{{ $post->photo }}" alt="" class="img-fluid"/>
                        </div>
                        <div class="myrecipe-footer d-flex justify-content-between align-items-center">
                            <div>
                                <i class="comment-icon fa-regular fa-comments"></i>
                                <span class="comment-text fw-bold">{{ $post->comments->count() }}</span>
                            </div>
                            <div>
                                <i class="bookmark-icon fa-regular fa-bookmark"></i>
                                <span class="bookmark-text fw-bold">{{ $bookmark_counts[$post->id] ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-auto mx-auto">
                <p class="h2 sorry">Sorry! No Recipe Available.</p>
            </div>
            @endforelse
            <div class="pagination-wrapper">
                {{ $dessert_posts->links() }}
            </div>
        </div>
    </div>
</div>