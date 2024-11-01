@extends('layouts.app')

<<<<<<< HEAD
<link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous"
>
<link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>
=======
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> has popper already -->
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
@vite(['resources/sass/admin.scss'])

@section('content')
<div class="container-fluid h-100 p-0">
    <div class="col-2 text-white">
        {{-- Side bar --}}
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
            <div class="position-sticky">
                <div class="list-group-flush mt-4">
                    <a
<<<<<<< HEAD
                    href="#"
=======
                    href="{{ route('usermanagement')}}"
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                    class="list-group-item list-group-item-action p-2 ripple mt-5"
                    aria-current="true"
                    >
                    <span class="selected">User Management</span>
                    </a>
<<<<<<< HEAD
                    <a href="#" 
                    class="list-group-item list-group-item-action p-2 ripple mt-5">
=======
                    <a 
                    href="{{ route('postmanagement')}}" 
                    class="list-group-item list-group-item-action p-2 ripple mt-5"
                    >
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                    <span class="unselected">Post Management</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
<<<<<<< HEAD
    <div class="col overflow-auto h-100 py-5"> 
=======
    <div class="col overflow-auto h-100"> 
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
        <div class="content">
            <div class="container-fluid">
                <div class="mx-4 p-4">
                    {{-- Search bar --}}
<<<<<<< HEAD
                    <form action="#">
=======
                    <form action="{{ route ('admin.users.search') }}" method="GET">
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                        <input 
                            type="search" 
                            name="search_username" 
                            id="search-username" 
                            class="form-control d-inline search-input p-2 my-3" 
<<<<<<< HEAD
                            placeholder="&#xF52A;   Search by username" 
                            style="font-family: Bootstrap-icons; width: 400px"
=======
                            placeholder="&#xF52A;   Search by Username" 
                            style="font-family: Bootstrap-icons; width: 400px"
                            value="{{ isset($search_username) ? $search_username : '' }}"
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                        >
                    </form>
                    {{-- Table --}}
                    <table class="table table-sm table-hover">
                        <thead class="small">
                            <tr>
                                <th class="p-3 thead">Status</th>
                                <th></th>
                                <th class="p-3 thead">Username</th>
                                <th class="p-3 thead">Email address</th>
                                <th class="p-3 thead">Number of posts</th>
                                <th class="p-3 thead">Created at</th>
                                <th class="p-3 thead">Deleted at</th>
                            </tr>
                        </thead>
                        <tbody>
<<<<<<< HEAD
                            <tr>
                                <td class="p-3">
                                    <a href="#">
                                        <i class="fa-solid fa-eye fa-eye-orange fa-xl my-3"></i>
                                    </a>
                                </td>
                                <td class="p-3">
                                    <i class="fa-regular fa-circle-user fa-2x"></i>
                                </td>
                                <td class="p-3">
                                    <a href="#" class="textdecoration-none">Isabel jackson</a>
                                </td>
                                <td class="p-3">isabel@mail.com</td>
                                <td class="p-3">
                                    <a href="#" class="textdecoration-none">54</a>
                                </td>
                                <td class="p-3">March 8th, 2024</td>
                                <td></td>
                            </tr> 
                            <tr>
                                <td class="p-3">
                                    <a href="#">
                                        <i class="fa-solid fa-eye-slash fa-xl my-3"></i>
                                    </a>
                                </td>
                                <td class="p-3">
                                    <i class="fa-regular fa-circle-user fa-2x"></i>
                                </td>
                                <td class="p-3">
                                    <a href="#" class="textdecoration-none">Emma Thompson</a>
                                </td>
                                <td class="p-3">emma@mail.com</td>
                                <td class="p-3">
                                    <a href="#" class="textdecoration-none">6</a>
                                </td>
                                <td class="p-3">April 26th, 2024</td>
                                <td class="p-3">May 16th, 2024</td>
                            </tr>
                        </tbody>
                    </table>
=======
                            @foreach($all_users as $user)
                                <tr class="grab" >
                                    <td 
                                        style="vertical-align:middle"
                                        class="p-3"
                                    >
                                        {{-- Modal --}}
                                        @include('admin.modal.user_status', ['user'=>$user])
                                        @if($user->trashed())
                                            <button 
                                            class="dropdown-item text-success" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#activate-user-{{ $user->id }}"
                                            data-user-id="{{ $user->id }}"
                                            >
                                                <i class="fa-solid fa-eye-slash fa-xl my-3"></i>
                                            </button>
                                        @else
                                            <button 
                                            class="dropdown-item text-danger" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deactivate-user-{{ $user->id }}"
                                            data-user-id="{{ $user->id }}"
                                            >
                                                <i class="fa-solid fa-eye fa-eye-orange fa-xl my-3"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td style="vertical-align:middle"
                                        class="p-3">
                                        @if($user->avatar)
                                            <img 
                                            src="{{ $user->avatar }}" 
                                            alt="{{ $user->name }}" 
                                            class="rounded-circle avatar-lg ms-2 thumb"
                                            >
                                        @else
                                            <img 
                                            src="{{asset('/images//profile_icon.png')}}" 
                                            alt="{{ $user->name }}" 
                                            class="rounded-circle avatar-lg ms-2 thumb"
                                            >
                                        @endif
                                    
                                    </td>
                                    <td 
                                    style="vertical-align:middle"
                                    class="p-3"
                                    >
                                        <a 
                                        href="{{ route('myrecipe', ['id' => $user->id]) }}"
                                        class="textdecoration-none"
                                        >
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    <td 
                                    style="vertical-align:middle"
                                    class="p-3"
                                    >
                                        {{ $user->email }}
                                    </td>
                                    <td 
                                    style="vertical-align:middle"
                                    class="p-3"
                                    >
                                        @if($user->posts->isNotEmpty())
                                            <a 
                                            href="{{ route('writer', ['post_id' 
                                            => $user->posts->first()->id, 'user_id' 
                                            => $user->id]) }}"
                                            class="textdecoration-none"
                                            >
                                                {{ $user->posts()->count() }}
                                            </a>
                                        @else
                                            {{ $user->posts()->count() }}
                                        @endif
                                    </td>
                                    <td 
                                    style="vertical-align:middle"
                                    class="p-3"
                                    >
                                        {{ $user->created_at }}
                                    </td>
                                    <td 
                                    style="vertical-align:middle"
                                    class="p-3"
                                    >
                                        {{ $user->deleted_at }}
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                    {{ $all_users->links() }}
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======
<script>
    $(document).ready(function() {
        $('.activate-user').on('click', function() {
            var userId = $(this).data('user-id');
            $('#activate-user-' + userId).modal('show');

            $('#activate_btn_' + userId).on('click', function() {
                $.ajax({
                    url: '/admin/usermanagement/' + userId + '/activate',
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload(); // Reload 
                        } else {
                            alert('Failed to reactivate user.');
                        }
                    },
                    error: function() {
                        alert('Error reactivating user.');
                    }
                });

                $('#activate-user-' + userId).modal('hide');
            });
        });
    });
</script>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
@endsection

