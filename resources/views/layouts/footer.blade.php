@extends('layouts.app')

@section('content')

<div class="footer py-5 footer-custom">
    <div class="container" >
        <div class="row">
            <h1 class="text-warning"><span class="we">We</span><span class="cook">Cook</span></h1>
            <div class="col-md-2 footer-section">
                <ul class="list-unstyled my-3">
                    <li class="my-3"><a href="#">Appetizers</a></li>
                    <li class="my-3"><a href="#">Side dish</a></li>
                    <li class="my-3"><a href="#">Main dish</a></li>
                    <li class="my-3"><a href="#">Dessert</a></li>        
                </ul>
            </div>
            <div class="col-md-2 footer-section">
                <ul class="list-unstyled">
                    <li class="my-3"><a href="#">Create Post</a></li>
                    <li class="my-3"><a href="#">Login</a></li>
                    <li class="my-3"><a href="#">My page</a></li>        
                </ul>
            </div>
            <div class="col-md-2 footer-section">
                <ul class="list-unstyled">
                    <li class="my-3"><a href="#">About us</a></li>
                    <li class="my-3"><a href="#">Home</a></li>
                    <li class="my-3"><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="col-md-2 footer-section">
                <ul class="list-unstyled">
                    <li class="my-3"><a href="#">Location</a></li>
                    <li class="my-3"><a href="#">Contact us</a></li>
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
        </div>{{-- end of row --}}
    </div>
</div>
@endsection

