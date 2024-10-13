@vite(['resources/sass/footer.scss'])
@vite(['resources/js/search_keyword.js'])
<div class="footer py-5 footer-custom">
    <div class="container">
        <div class="row">
            <a 
            href="{{ route('home') }}#top" 
            class="wecook"
            >
                <h1>
                    <span class="we">We</span><span class="cook">Cook</span>
                </h1>
            </a>
            <div class="col-md-2 footer-section">
                <ul class="list-unstyled my-3">
                    @guest
                        <li class="my-3">
                            <a href="{{ route('login') }}">Log in</a>
                        </li>
                        <li class="my-3">                        
                            <a 
                            class="my-3 disabled-link" 
                            >
                            {{ __('Logout') }}
                            </a>
                        </li>
                        <li class="my-3">
                            <a 
                            class="disabled-link" 
                            href="{{ route('register') }}"
                            >
                            {{ __('Register') }}
                            </a>
                        </li>
                    @else
                        <li class="my-3 disabled-link">
                            Log in
                        </li>
                        <li class="my-3">                        
                            @include('modals.logout')
                            <a 
                            class="my-3" 
                            data-bs-toggle="modal" 
                            data-bs-target="#logoutModal"
                            style="cursor: pointer;"
                            >
                            {{ __('Logout') }}
                            </a>
                        </li>
                        <li class="my-3">
                            <a 
                            class="disabled-link" 
                            href="#"
                            >
                            {{ __('Register') }}
                            </a>
                        </li>
                    @endguest
                </ul>
                <form action="{{ route('search') }}" class="my-auto d-flex" method="GET" role="search" for="search">
                    <input 
                        type="search" 
                        name="search" 
                        id="searchbar" 
                        class="form-control"  
                        placeholder=" &#xF52A; Search all recipe !" 
                        aria-label="Search"
                        required
                    >
                    <input type="submit" style="display: none;">
                </form>
            </div>
            <div class="col-md-2 footer-section">
                @guest
                    <ul class="list-unstyled">
                        <li class="my-3">
                            <a href="{{ route('home') }}#top">Home</a>
                        </li>
                        <li 
                        class="my-3">
                            <a 
                            href="#"
                            class="disabled-link"
                            >
                            Create Post</a>
                        </li>
                    </ul>
                @else
                    <ul class="list-unstyled">
                        <li class="my-3">
                            <a href="{{ route('home') }}#top">Home</a>
                        </li>
                        <li class="my-3">
                            <a href="/createrecipe">Create Recipe</a>
                        </li>
                @endguest
            </div>
            <div class="col-md-2 footer-section">
                <ul class="list-unstyled">
                    <li class="my-3"><a href="{{ route('others.about_us') }}">About Us</a></li>
                    <li class="my-3"><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="col-md-2 footer-section">
                <ul class="list-unstyled">
                    @guest
                    <li class="my-3">
                        <a
                        href="#"
                        class="disabled-link"
                        >
                        My Recipe
                        </a>
                    </li>
                    <li class="my-3">
                        <a
                        href="#"
                        class="disabled-link"
                        >
                        My Bookmark
                        </a>
                    </li>
                    <li class="my-3">
                        <a
                        href="#"
                        class="disabled-link"
                        >
                        Edit Profile
                        </a>                        
                    </li>
                    @else
                        <li class="my-3">
                            <a
                            href="{{ route('myrecipe',['id' => Auth::user()->id]) }}"
                            >
                            My Recipe
                            </a>
                        </li>
                        <li class="my-3">
                                <a
                                href="{{ route('mybookmark',['id' => Auth::user()->id]) }}"
                                >
                                My Bookmark
                                </a>
                        </li>
                        <li class="my-3">
                                <a
                                href="{{ route('profile_edit', Auth::user()->id) }}"
                                >
                                Edit Profile
                                </a>                        
                        </li>
                    @endguest
                </ul>
            </div>
            <div class="col-md-4 footer-section text-end mt-4">
                <h4><i class="fa-solid fa-location-dot address"></i></h4>
                <address class="address">
                    14th Floor Central Bloc<br>
                    Corporate Center Tower 1,<br>
                    Block 10, Geonzon St.,<br>
                    Cebu IT Park, Apas<br>
                    Cebu City
                </address>
                <p class="address">Copy right @ WeCook 2024</p>
            </div>
        </div> {{-- end of row --}}
    </div>
</div>
