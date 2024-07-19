@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> has popper already -->
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
                    aria-current="true"
                    >
                    <span class="selected">User Management</span>
                    </a>
                    <a 
                    href="{{ route('postmanagement')}}" 
                    class="list-group-item list-group-item-action p-2 ripple mt-5"
                    >
                    <span class="unselected">Post Management</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div class="col overflow-auto h-100"> 
        <div class="content">
            <div class="container-fluid">
                <div class="mx-4 p-4">
                    {{-- Search bar --}}
                    <form action="{{ route ('admin.users.search') }}" method="GET">
                        <input 
                            type="search" 
                            name="search_username" 
                            id="search-username" 
                            class="form-control d-inline search-input p-2 my-3" 
                            placeholder="&#xF52A;   Search by Username" 
                            style="font-family: Bootstrap-icons; width: 400px"
                            value="{{ isset($search_username) ? $search_username : '' }}"
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
                                            src="{{ $writer->avatar }}" 
                                            alt="{{ $writer->name }}" 
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
                </div>
            </div>
        </div>
    </div>
</div>
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
@endsection

