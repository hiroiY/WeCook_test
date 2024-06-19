@extends('layouts.app')

@vite(['resources/sass/detailrecipe.scss'])

@section('content')


  <div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Cook Chef</a></li>
            <li class="breadcrumb-item active" aria-current="page">Omelette with green onion</li>
        </ol>
    </nav>
    <div class="recipe-detail">
        <div class="row">
            <div class="col-md-8">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('/images/recipe/food1.jpg')}}" alt="Chef" class="mr-2" style="width: 50px; height: 50px;">
                    <h1 class="m-0">Cook Chef</h1>
                </div>
                    <h2 class="recipe-title"><i class="fas fa-bookmark"></i>Omelette with green onions </h2>
                    <img src="{{ asset('/images/recipe/food1.jpg')}}" alt="Omelette with green onions" class="img-fluid rounded mb-3 food-photo">
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge badge-primary">Appetizer</span>
                    <span class="text-muted"><i class="far fa-clock"></i> 30 min <i class="fas fa-pencil-alt"></i></span>
                </div>
                <h3>Ingredients</h3>
                <ul>
                    <li>Rice flour 600g</li>
                    <li>2 eggs</li>
                    <li>2 sausages</li>
                    <li>4 lettuce leaves</li>
                    <li>Mayonnaise to taste</li>
                    <li>Pepper to taste</li>
                    <li>1 tablespoon chicken stock</li>
                    <li>1 teaspoon soy sauce</li>
                    <li>A little salt and pepper</li>
                    <li>Green onions to taste (chopped)</li>
                </ul>
            </div>
        </div>
        <h3>Description</h3>
        <ol>
            <li>Cut the sausages into small pieces and tear the lettuce by hand.</li>
            <li>Spread 1 tablespoon of oil (not listed) in a frying pan,</li>
            <li>Add the sausages and eggs, stir-fry a little, and when half-cooked, add the rice.</li>
            <li>Moisten the rice flour a little with water, and stir-fry. Stir the rice slowly with a wooden spoon, adding the chicken stock and salt and pepper, and mix well.</li>
            <li>Spread mayonnaise evenly in a thin line, add soy sauce, mix it all together, add lettuce, stir-fry quickly, and it's done.</li>
        </ol>
    </div>
</div> 




@endsection


