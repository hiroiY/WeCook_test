@vite(['resources/sass/navbar.scss'])
@vite(['resources/js/logout_modal.js'])
@vite(['resources/js/search_keyword.js'])
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<nav 
  class="navbar navbar-expand-lg navbar-dark shadow-sm py-2"
>
  <div class="container-fluid">
    <a 
      class="navbar-brand d-flex justify-content-center mx-5" 
      href="{{ route('home') }}"
    >
      <img 
        src="{{asset('logo//Logo_white.png')}}" 
        alt="logo" 
        class="me-2 py-1"
      >
      <span class="wecook">
        <span class="we">We</span>Cook
      </span>
    </a>
    <button 
      class="navbar-toggler" 
      type="button" 
      data-bs-toggle="collapse" 
      data-bs-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" 
      aria-expanded="false" 
      aria-label="{{ __('Toggle navigation') }}"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div 
      class="collapse navbar-collapse px-5 mt-1" 
      id="navbarSupportedContent"
    >
      <!-- Left Side Of Navbar -->
      <!-- Search bar -->
      <ul class="navbar-nav me-auto">
        <form 
          action="{{ route('search') }}" class="my-auto" 
          method="GET" 
          role="search"
        >
          <input 
            type="search" 
            name="search" 
            id="searchbar" 
            class="form-control" 
            placeholder=" &#xF52A; Search all recipe !"
            aria-label="Search"
            value="{{ old('search') }}"
            autofocus
          >
          <input type="submit" style="display: none;">
        </form>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ms-auto mb-2 mt-2 mb-lg-0 d-flex">
          <!-- Authentication Links -->
          @guest
            @if (Route::has('login'))
              <li class="nav-item me-2">
                  <a 
                    class="nav-link" 
                    href="{{ route('login') }}"
                  >
                    {{ __('Login') }}
                  </a>
              </li>
            @endif

            @if (Route::has('register'))
              <li class="nav-item ms-4 me-2">
                  <a 
                    class="nav-link" 
                    href="{{ route('register') }}"
                  >
                    {{ __('Register') }}
                  </a>
              </li>
            @endif
          @else
            {{-- NAVIGATION AREA --}}
            {{-- Create Post Button/link --}}
            <li 
              class="nav-item" 
              title="Create Post"
            >
              <a 
                href="/createrecipe" 
                class="nav-link"
                style="color: #F7F3EB;"
              >
                <i class="fa-solid fa-pen-to-square">
                </i>
                  Create post
              </a>
            </li>

            {{-- Account Dropdown Button --}}
            <span class="account" >
              <li class="nav-item ms-3 dropdown">
                <button 
                  id="account-dropdown"
                  data-bs-toggle="dropdown"
                >
                  @if (Auth::user()->avatar)
                    <img 
                      src="{{ Auth::user()->avatar }}" 
                      alt="{{ Auth::user()->name }}" 
                      class="rounded-circle avatar-lg"
                    >
                    <span 
                      class="mt-1" 
                      style="color: #F7F3EB;"
                    >
                      {{ Auth::user()->name }}
                    </span>
                  @else
                    <img 
                      src="{{ asset('/images//profile_icon.png') }}" 
                      alt="{{ Auth::user()->name }}" 
                      class="rounded-circle avatar-lg"
                    >
                    </i> 
                    <span 
                      class="mt-1" 
                      style="color: #F7F3EB;"
                    >
                      {{ Auth::user()->name }}
                    </span>
                  @endif
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
                class="nav-item dropdown mt-2 ms-2"
              >
                @if(Auth::check() && Auth::user()->role_id === 1)
                  <button 
                    id="account-dropdown"
                    data-bs-toggle="dropdown"
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
          
          <li class="nav-item">
            <a 
              class="nav-link ms-2" 
              data-bs-toggle="modal" 
              data-bs-target="#logoutModal"
              style="cursor: pointer;"
            >
              <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
            </a>
          </li>
        @endguest
      </ul>
    </div>
  @include('modals.logout')
  </div>
</nav>