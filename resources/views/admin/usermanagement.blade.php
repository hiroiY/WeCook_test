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
    <div class="col overflow-auto h-100 py-5"> 
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
                            placeholder="&#xF52A;   Search by username" 
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
                            @foreach($users as $user)
                            <tr>
                                <td class="p-3">
                                    @if($user->trashed())
                                        <a href="">
                                            <i class="fa-solid fa-eye-slash fa-xl my-3"></i>
                                        </a>
                                    @else
                                        <a href="#">
                                            <i class="fa-solid fa-eye fa-eye-orange fa-xl my-3"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="p-3">
                                    @if($user->avatar)
                                        <img src="{{ $user->avator }}" 
                                            alt="{{ $user->name }}" 
                                        >
                                    @else <i class="fa-regular fa-circle-user fa-2x"></i>
                                    @endif                                    
                                </td>
                                <td class="p-3">
                                    <a href="#" class="textdecoration-none">{{ $user->name }}</a>
                                </td>
                                <td class="p-3">{{ $user->email }}</td>
                                <td class="p-3">
                                    {{-- <a href="#" class="textdecoration-none">{{ $user->posts()->count() }}</a> --}}
                                </td>
                                <td class="p-3">{{ $user->created_at }}</td>
                                <td class="p-3">{{ $user->deleted_at }}</td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

