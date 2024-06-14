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
                    href="#"
                    class="list-group-item list-group-item-action p-2 ripple mt-5"
                    aria-current="true"
                    >
                    <span class="unselected">User Management</span>
                    </a>
                    <a href="#" 
                    class="list-group-item list-group-item-action p-2 ripple mt-5">
                    <span class="selected">Post Management</span>
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
                    <form action="#">
                        <input 
                            type="search" 
                            name="search_username" 
                            id="search-username" 
                            class="form-control d-inline search-input p-2 my-3" 
                            placeholder="&#xF52A;   Search by Recipe name" 
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
                                <th class="p-3 thead">Username address</th>
                                <th class="p-3 thead">Comment</th>
                                <th class="p-3 thead">Category</th>
                                <th class="p-3 thead">Created at</th>
                                <th class="p-3 thead">Deleted at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pt-4">
                                    <a href="#">
                                        <i class="fa-solid fa-eye fa-eye-orange fa-xl my-3"></i>
                                    </a>
                                </td>
                                <td class="p-3">
                                    <a href="#">
                                        <div class="thumb">
                                            <img src="{{ asset('../images/Dumplings.jpg') }}" 
                                                alt="post-picture" 
                                                class=""/>
                                        </div>
                                    </a>
                                </td>
                                <td style="vertical-align:middle">
                                    <a href="#" 
                                        class="textdecoration-none">
                                        Spicy dumpling
                                    </a>
                                </td>
                                <td style="vertical-align:middle">
                                    <a href="#" 
                                        class="textdecoration-none">
                                        Isabel jackson
                                    </a>
                                </td>
                                <td style="vertical-align:middle">
                                    <a href="#" 
                                        class="textdecoration-none">7
                                    </a>
                                </td>
                                <td style="vertical-align:middle">
                                    <a href="#" 
                                        class="textdecoration-none">
                                        Side dish
                                    </a>
                                </td>
                                <td style="vertical-align:middle">March 8th, 2024</td>
                                <td></td>
                            </tr> 
                            <tr>
                                <td style="vertical-align:middle">
                                    <a href="#">
                                        <i class="fa-solid fa-eye-slash fa-xl my-3"></i>
                                    </a>
                                </td>
                                <td class="p-3">
                                    <div class="thumb">
                                        <a href="">
                                            <img src="{{ asset('../images/shortcake.jpeg') }}" 
                                                alt="post-picture" 
                                                class=""/>
                                        </a>
                                    </div>
                                </td>
                                <td style="vertical-align:middle">
                                    <a href="#" 
                                        class="textdecoration-none">
                                        Classic strawberry cake</a>
                                    </td>
                                <td style="vertical-align:middle">
                                    <a href="#" 
                                        class="textdecoration-none">
                                        Emma Thompson
                                    </a>
                                </td>
                                <td style="vertical-align:middle">
                                    <a href="#" 
                                        class="textdecoration-none">6
                                    </a>
                                </td>
                                <td style="vertical-align:middle">
                                    <a href="#" 
                                        class="textdecoration-none">
                                        Dessert
                                    </a>
                                </td>
                                <td style="vertical-align:middle">April 26th, 2024</td>
                                <td style="vertical-align:middle">May 16th, 2024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

