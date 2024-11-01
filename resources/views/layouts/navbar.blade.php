@vite(['resources/sass/navbar.scss'])
<<<<<<< HEAD
<nav class="navbar navbar-expand-md shadow-sm p-1">
  <div class="container">
    <a 
      class="navbar-brand" 
=======
@vite(['resources/js/logout_modal.js'])
@vite(['resources/js/search_keyword.js'])
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<nav 
  class="navbar navbar-expand-lg top-nav py-2"
>
  <div class="container-fluid">
    <a 
      class="navbar-brand d-flex justify-content-center mx-5" 
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
      href="{{ route('home') }}"
    >
      <img 
        src="{{asset('logo//Logo_white.png')}}" 
        alt="logo" 
<<<<<<< HEAD
        class="me-2 pb-2"
=======
        class="me-2 py-1"
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
      >
      <span class="wecook">
        <span class="we">We</span>Cook
      </span>
    </a>
<<<<<<< HEAD
=======

>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
    <button 
      class="navbar-toggler" 
      type="button" 
      data-bs-toggle="collapse" 
<<<<<<< HEAD
      data-bs-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" 
=======
      data-bs-target="#navbarContent" 
      aria-controls="navbarContent" 
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
      aria-expanded="false" 
      aria-label="{{ __('Toggle navigation') }}"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
<<<<<<< HEAD

    <div 
      class="collapse navbar-collapse" 
      id="navbarSupportedContent"
    >
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav m-auto">
        <form action="{{-- route('search') --}}" class="my-auto">
=======
    <div 
      class="collapse navbar-collapse px-5 mt-1" 
      id="navbarContent"
    >
      <!-- Left Side Of Navbar -->
      <!-- Search bar -->
      <ul class="navbar-nav me-auto">
        <form 
          action="{{ route('search') }}" 
          class="my-auto" 
          method="GET" 
          role="search"
        >
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
          <input 
            type="search" 
            name="search" 
            id="searchbar" 
            class="form-control" 
<<<<<<< HEAD
            placeholder=" &#xF52A; Search all recipe !" 
            autofocus
          >
=======
            placeholder=" &#xF52A; Search all recipe !"
            aria-label="Search"
            value="{{ old('search') }}"
            autofocus
            required
          >
          <input type="submit" style="display: none;">
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
        </form>
      </ul>

      <!-- Right Side Of Navbar -->
<<<<<<< HEAD
      <ul class="navbar-nav ms-auto">
          <!-- Authentication Links -->
          @guest
            @if (Route::has('login'))
              <li class="nav-item">
=======
      <ul class="navbar-nav ms-auto mb-2 mt-2 mb-lg-0 d-flex">
          <!-- Authentication Links -->
          @guest
            @if (Route::has('login'))
              <li class="nav-item me-2">
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                  <a 
                    class="nav-link" 
                    href="{{ route('login') }}"
                  >
                    {{ __('Login') }}
                  </a>
              </li>
            @endif

            @if (Route::has('register'))
<<<<<<< HEAD
              <li class="nav-item">
=======
              <li class="nav-item ms-4 me-2">
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                  <a 
                    class="nav-link" 
                    href="{{ route('register') }}"
                  >
                    {{ __('Register') }}
                  </a>
              </li>
            @endif
          @else
<<<<<<< HEAD
          {{-- NAVIGATION AREA --}}
          {{-- Create Post Button/link --}}
          <li 
            class="nav-item me-3 mt-2" 
            title="Create Post"
          >
            <a 
              href="{{-- route('post.create') --}}" 
              class="nav-link"
            >
              <i class="fa-solid fa-pen-to-square">
              </i>
                Create post
            </a>
          </li>

          {{-- Account Dropdown Button --}}
          <div class="account" >
            <li class="nav-item me-3 dropdown">
              <button 
                id="account-dropdown" 
                class="nav-link " 
                data-bs-toggle="dropdown"
              >
                @if (Auth::user()->avatar)
                  <img 
                    src="{{ Auth::user()->avatar }}" 
                    alt="{{ Auth::user()->name }}" 
                    class="rounded-circle avatar-lg"
                  >
                  {{ Auth::user()->name }}
                @else
                  <img 
                    src="/images//profile_icon.png" 
                    alt="{{ Auth::user()->name }}" 
                    class="rounded-circle avatar-lg"
                  >
                  </i> 
                  {{ Auth::user()->name }}
                @endif
              </button>
          
              <div 
                class="dropdown-menu dropdown-menu-end" 
                aria-labelledby="account-dropdown"
              >
                {{--My Recipe Button/Link --}}
                <a 
                  href="{{ route('myrecipe', Auth::user()->id) }}" 
                  class="dropdown-item"
                >
                  My Recipe
                </a>
                {{--My Bookmark Button/Link --}}
                <a 
                  href="{{-- route('mybookmark', Auth::user()->id) --}}" 
                  class="dropdown-item"
                >
                  My Bookmark
                </a>
                {{--My Profile Edit Button/Link --}}
                <a 
                  href="{{-- route('profile.show', Auth::user()->id) --}}" 
                  class="dropdown-item"
                >
                  Profile Edit
                </a>
              </div>
            </li>
          </div>

          {{-- Admin management Dropdown Button --}}
          <div class="account">
            <li 
              class="nav-item dropdown me-3 mt-2"
            >
            {{-- @can('admin') --}}
              <button 
                id="account-dropdown" 
                class="nav-link " 
                data-bs-toggle="dropdown"
              >
                <a 
                  class="dropdown-item" 
                  href="{{-- route('admin.users') --}}"
                >
                  Admin
                </a>
              </button>
              <div 
                class="dropdown-menu dropdown-menu-end" 
                aria-labelledby="account-dropdown"
              >
                {{--User management button/Link --}}
                <a href="{{ route('usermanagement') }}" class="dropdown-item">
                  User Management
                </a>
                {{--post management button/Link --}}
                <a href="{{ route('postmanagement') }}" class="dropdown-item">
                  Recipe Management
                </a>
                {{--category management button/Link --}}
                <!-- <a href="{{-- route('profile.show', Auth::user()->id) --}}" class="dropdown-item">
                  Category Management
                </a> -->
              </div>
              {{-- @endcan --}}
            </li>
          </div>
          
          <li class="nav-item">
            {{-- Logout Button/Link --}}
            <a class="nav-link  mt-2" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
              <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
=======
            {{-- NAVIGATION AREA --}}
            {{-- Create Post Button/link --}}
            <li 
              class="nav-item icon-menu" 
              title="Create Post"
            >
              <a 
                href="/createrecipe" 
                class="nav-link"
                style="color: #F7F3EB;"
              >
                <i class="fa-solid fa-pen-to-square">
                </i>
                  Create Recipe
              </a>
            </li>

            {{-- Account Dropdown Button --}}
            <span class="account" >
              <li class="nav-item ms-3 dropdown my-auto">
                <button 
                  id="account-dropdown"
                  data-bs-toggle="dropdown"
                  class="pe-0 ms-2 d-inline-flex"
                >
                  @if (Auth::user()->avatar)
                    <img 
                      src="{{ Auth::user()->avatar }}" 
                      alt="{{ Auth::user()->name }}" 
                      class="rounded-circle avatar-lg me-0"
                    >
                  @else
                    <img 
                      src="{{ asset('/images//profile_icon.png') }}" 
                      alt="{{ Auth::user()->name }}" 
                      class="rounded-circle avatar-lg me-0"
                    >
                  @endif
                  <span 
                    class="account-username" 
                    style="color: #F7F3EB;"
                  >
                    {{ Auth::user()->name }}
                  </span>
                </button>
            
                <div 
                  class="dropdown-menu dropdown-menu-end m-0" 
                  aria-labelledby="account-dropdown"
                >
                  {{--My Recipe Button/Link --}}
                  <a 
                    href="{{ route('myrecipe',['id' => Auth::user()->id]) }}" 
                    class="dropdown-item"
                  >
                    My Recipe
                  </a>
                  {{--My Bookmark Button/Link --}}
                  <a 
                    href="{{ route('mybookmark',['id' => Auth::user()->id]) }}"
                    class="dropdown-item"
                  >
                    My Bookmark
                  </a>
                  {{--My Profile Edit Button/Link --}}
                  <a 
                    href="{{ route('profile_edit', Auth::user()->id) }}" 
                    class="dropdown-item"
                  >
                    Profile Edit
                  </a>
                </div>
              </li>
            </span>

            {{-- Admin management Dropdown Button --}}
            <span class="account">
              <li 
                class="nav-item dropdown mt-2 ms-3"
              >
                @if(Auth::check() && Auth::user()->role_id === 1)
                  <button 
                    id="account-dropdown"
                    data-bs-toggle="dropdown"
                    class="pe-0 ms-2"
                  >
                    Admin
                  </button>
                  <div 
                    class="dropdown-menu dropdown-menu-end" 
                    aria-labelledby="account-dropdown"
                  >
                    {{--User management button/Link --}}
                    <a 
                      href="{{ route('usermanagement') }}"
                      class="dropdown-item"
                     >
                      User Management
                    </a>
                    {{--post management button/Link --}}
                    <a 
                      href="{{ route('postmanagement') }}" 
                      class="dropdown-item"
                    >
                      Post Management
                    </a>
                    {{--category management button/Link --}}
                    <!-- <a href="{{-- route('profile.show', Auth::user()->id) --}}" class="dropdown-item">
                      Category Management
                    </a> -->
                  </div>
                @endif
              </li>
            </span>
          
          <li class="nav-item ms-3 icon-menu">
            <a 
              class="nav-link logout-btn" 
              data-bs-toggle="modal" 
              data-bs-target="#logoutModal"
              style="cursor: pointer;"
            >
              <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
            </a>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
          </li>
        @endguest
      </ul>
    </div>
<<<<<<< HEAD
=======
    @include('modals.logout')
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
  </div>
</nav>