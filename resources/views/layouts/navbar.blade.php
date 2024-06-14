@vite(['resources/sass/navbar.scss'])
<nav class="navbar navbar-expand-md shadow-sm p-1">
  <div class="container">
    <a class="navbar-brand" href="{{ route('homepage') }}">
      <img src="/logo/Logo_white.png" alt="logo" class="me-2 pb-2">
      <span class="wecook"><span class="we">We</span>Cook</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav m-auto">
        <form action="#">
          <input type="search" name="search" id="searchbar" class="form-control" placeholder="&#xF52A; Search all recipes!" autofocus>
        </form>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ms-auto">
        @guest
          @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
          @endif
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          <!-- Create Post Button/Link -->
          <li class="nav-item me-3 mt-2" title="Create Post">
            <a href="{{ route('post.create') }}" class="nav-link">
              <i class="fa-solid fa-pen-to-square"></i> Create post
            </a>
          </li>

          <!-- Account Dropdown Button -->
          <li class="nav-item me-3 dropdown">
            <button id="account-dropdown" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              @if (Auth::user()->avatar)
                <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="rounded-circle avatar-lg">
              @else
                <img src="/images/profile_icon.png" alt="{{ Auth::user()->name }}" class="rounded-circle avatar-lg">
              @endif
              {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="account-dropdown">
              <a href="{{ route('myrecipe.show', Auth::user()->id) }}" class="dropdown-item">My Recipe</a>
              <a href="{{ route('bookmark.show', Auth::user()->id) }}" class="dropdown-item">My Bookmark</a>
              <a href="{{ route('profile.show', Auth::user()->id) }}" class="dropdown-item">Profile Edit</a>
            </div>
          </li>

          <!-- Admin Management Dropdown Button -->
          @can('admin')
            <li class="nav-item dropdown me-3 mt-2">
              <button id="admin-dropdown" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                Admin
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="admin-dropdown">
                <a href="{{ route('admin.users') }}" class="dropdown-item">User Management</a>
                <a href="{{ route('recipe.management') }}" class="dropdown-item">Recipe Management</a>
              </div>
            </li>
          @endcan

          <!-- Logout Button/Link -->
          <li class="nav-item">
            <a class="nav-link mt-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
