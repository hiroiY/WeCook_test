@vite(['resources/sass/navbar.scss'])
<nav class="navbar navbar-expand-md shadow-sm p-1">
  <div class="container">
    <a 
      class="navbar-brand" 
      href="{{-- route('homepage') --}}"
    >
      <img 
        src="/logo//Logo_white.png" 
        alt="logo" 
        class="me-2 pb-2"
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
      class="collapse navbar-collapse" 
      id="navbarSupportedContent"
    >
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav m-auto">
        <form action="{{-- route('search') --}}">
          <input 
            type="search" 
            name="search" 
            id="searchbar" 
            class="form-control" 
            placeholder=" &#xF52A; Search all recipe !" 
            autofocus
          >
        </form>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ms-auto">
          <!-- Authentication Links -->
          @guest
            @if (Route::has('login'))
              <li class="nav-item">
                  <a 
                    class="nav-link" 
                    href="{{ route('login') }}"
                  >
                    {{ __('Login') }}
                  </a>
              </li>
            @endif

            @if (Route::has('register'))
              <li class="nav-item">
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
                  href="{{-- route('myrecipe.show', Auth::user()->id) --}}" 
                  class="dropdown-item"
                >
                  My Recipe
                </a>
                {{--My Bookmark Button/Link --}}
                <a 
                  href="{{-- route('bookmark.show', Auth::user()->id) --}}" 
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
                <a href="{{-- route('myrecipe.show', Auth::user()->id) --}}" class="dropdown-item">
                  User Management
                </a>
                {{--post management button/Link --}}
                <a href="{{-- route('bookmark.show', Auth::user()->id) --}}" class="dropdown-item">
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
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>