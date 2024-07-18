@extends('layouts.app')

<link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous"
>
<link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- has popper already -->

@vite(['resources/sass/admin.scss'])

@section('content')
<div class="container-fluid h-100 p-0">
    <div class="col-2 text-white">
        {{-- Side bar --}}
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
            <div class="position-sticky">
                <div class="list-group-flush mt-4">
                    <a
                    href="{{ route('usermanagement')}}"
                    class="list-group-item list-group-item-action p-2 ripple mt-5"
                    >
                    <span class="unselected">User Management</span>
                    </a>
                    <a 
                    href="{{ route('postmanagement')}}" 
                    class="list-group-item list-group-item-action p-2 ripple mt-5"
                    aria-current="true"
                    >
                    <span class="selected">Post Management</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div class="col overflow-auto h-100 "> 
        <div class="content">
            <div class="container-fluid">
                <div class="mx-4 p-4">
                    {{-- Search bar --}}
                    <form action="{{ route ('admin.posts.search') }}" method="GET">
                        <input 
                        type="search" 
                        name="search_post" 
                        id="search-post" 
                        class="form-control d-inline search-input p-2 my-3" 
                        placeholder="&#xF52A;   Search by Recipe Title Word" 
                        style="font-family: Bootstrap-icons; width: 400px"
                        >
                    </form>
                    {{-- Table --}}
                    <table class="table table-sm table-hover">
                        <thead class="small">
                            <tr>
                                <th class="p-3 thead">Status</th>
                                <th></th>
                                <th class="p-3 thead">Title</th>
                                <th class="p-3 thead">Username</th>
                                <th class="p-3 thead">Comment</th>
                                <th class="p-3 thead">Category</th>
                                <th class="p-3 thead">Created at</th>
                                <th class="p-3 thead">Deleted at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_posts as $post)
                            <tr>
                                <td style="vertical-align:middle"
                                    class="">
                                    {{-- Modal --}}
                                    @include('admin.modal.post_status', ['post'=>$post])
                                    @if($post->trashed())
                                        <button 
                                        class="dropdown-item text-success" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#activate-post-{{ $post->id }}"
                                        data-post-id="{{ $post->id }}"
                                        >
                                            <i 
                                            class="fa-solid fa-eye-slash fa-xl my-3"
                                            style="vertical-align:middle"
                                            ></i>
                                        </button>
                                    @else
                                        <button 
                                        class="dropdown-item text-danger" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deactivate-post-{{ $post->id }}"
                                        data-post-id="{{ $post->id }}"
                                        >
                                            <i class="fa-solid fa-eye fa-eye-orange fa-xl my-3"></i>
                                        </button>
                                    @endif
                                </td>
                                <td 
                                style="vertical-align:middle"
                                class="p-3 photo"
                                >
                                    <a 
                                    href="{{ route('detailrecipe', [$post->id, $post->user->id]) }}"
                                    >
                                        <div class="thumb">
                                            @if($post->photo)
                                                <img 
                                                src="{{ asset($post->photo) }}" 
                                                alt="post-photo" 
                                                class="img-fluid"
                                                >
                                            @else
                                                <img 
                                                src="{{ asset('/images/recipe_photos/weCook.png') }}" 
                                                alt="{{ $post->title }}" 
                                                class="food-photo img-fluid"
                                                >
                                            @endif
                                        </div>
                                    </a>
                                </td>
                                <td style="vertical-align:middle">
                                    <a 
                                    href="{{ route('detailrecipe', [$post->id, $post->user->id]) }}"
                                    class="textdecoration-none"
                                    >
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td style="vertical-align:middle">
                                    <a
                                    href="{{ route('myrecipe', ['id' => $post->user->id]) }}"
                                    class="textdecoration-none"
                                    >
                                        {{ $post->user->name }}
                                    </a>
                                </td>
                                <td style="vertical-align:middle">
                                    <a 
                                    href="{{ route('detailrecipe', [$post->id, $post->user->id]) }}#comment"
                                    class="textdecoration-none"
                                    >
                                        {{ $post->comments_count ?? 0 }}
                                </a>
                                </td>
                                <td style="vertical-align:middle">{{ $post->dish->name }}</td>
                                <td style="vertical-align:middle">{{ $post->created_at }}</td>
                                <td style="vertical-align:middle">{{ $post->deleted_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginate">
                        {{ $all_posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.activate-post').on('click', function() {
            var postId = $(this).data('post-id');
            $('#activate-post-' + postId).modal('show');

            $('#activate_btn_' + postId).on('click', function() {
                $.ajax({
                    url: '/admin/postmanagement/' + postId + '/activate',
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload(); // Reload 
                        } else {
                            alert('Failed to reactivate post.');
                        }
                    },
                    error: function() {
                        alert('Error reactivating post.');
                    }
                });

                $('#activate-post-' + postId).modal('hide');
            });
        });
    });
</script>

@endsection

