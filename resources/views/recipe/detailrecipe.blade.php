@extends('layouts.app')

@vite(['resources/sass/detailrecipe.scss'])

@section('content')
<<<<<<< HEAD


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


=======
<div class="containe py-3">
    <div class="detailrecipe px-5 pb-5 mx-3">
        <!-- breadcrumb area -->
        <nav 
            aria-label="breadcrumb"
            class="mb-3"
        >
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item current-reciprname" aria-current="location">{{ $recipe->title }}</li>
            </ol>
        </nav>
        {{-- button for jumo to the comment/QA section --}}
        <div class="jump-comment">
            <a href="#comment-start" class="textdecoration-none">
                <i class="fa-regular fa-comments"></i>
                Jump to comments 
                <i class="fa-solid fa-arrow-turn-down"></i>
            </a>
        </div>

        <!-- recipe detail area -->
        <div class="recipe-detail detailrecipe pt-3">  
            <!-- avatar&writer's name -->
            <div class="mb-3">
                <a 
                    href="{{ route('writer',['post_id'=>$recipe->id, 'user_id'=>$recipe->user_id]) }}"
                    class="writer-name d-flex py-auto"
                >
                    @if ($recipe->user->avatar)
                        <img src="{{ $recipe->user->avatar }}" alt="{{ $recipe->user->name }}" class="chef-icon mr-2 rounded-circle">
                    @else
                        <img src="{{ asset('/images/profile_icon.png') }}" alt="{{ $recipe->user->name }}" class="chef-icon mr-2 rounded-circle">
                    @endif
                    <p class="h3 align-self-center fill-flex my-auto writer-username">&nbsp;{{ $recipe->user->name }}</p>
                </a>
            </div>
            <h1 class="recipe-title mb-4 pt-3">
                @auth
                    <a href="{{ route('bookmark.toggle',['post_id' => $recipe->id])}}" class="text-decoration-none">
                        <i class="fa-bookmark {{ $recipe->bookmarkedBy->contains(Auth::id()) ? 'fas bookmarked' : 'fa-regular' }}"></i>
                    </a>
                @endauth
                {{ $recipe->title }}
            </h1>
            <div class="row">
                <div class="col-6">
                    @if($recipe->photo)
                        <img 
                            src="{{ $recipe->photo }}" 
                            alt="{{ $recipe->title }}" 
                            class="food-photo"
                        >
                    @else
                        <img 
                            src="{{ asset('/images/recipe_photos/weCook.png') }}" 
                            alt="{{ $recipe->title }}" 
                            class="food-photo"
                        >
                    @endif
                </div>
                <div class="col-6">
                    <div class="detail-content">
                        <!-- dish-category here -->
                        <span 
                            class="badge badge-primary ms-0 me-auto"
                        >
                            {{ $recipe->dish->name }}
                        </span>

                        <!-- cooking_time here -->
                        <span class="cooking-time me-auto ms-3">
                            <i class="far fa-clock mr-2 fa-xl me-3"></i>
                            {{ $recipe->cooking_time }}
                        </span>

                        <!-- Edit button here -->
                        @if(Auth::check()&&Auth::user()->id === $recipe->user_id)
                            <a 
                                href="{{ route('editmyrecipe',['id'=>$recipe->id]) }}" 
                                class="ml-3"
                            >
                                <i class="fas fa-pencil-alt fa-2xl mx-4"></i>
                            </a>
                        @endif
                    
                    </div>              
                    <h3>Ingredients</h3>
                    <ul>
                        @foreach(explode("\n", $recipe->ingredients) as $ingredient)
                            <li>{{ $ingredient }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <h3>Description</h3>
            <ol>
                @foreach(explode("\n", $recipe->description) as $step)
                    <li>{{ $step }}</li>
                @endforeach
            </ol>
        </div>
    </div>
    {{-- landed place from the "jumo to the comment" button --}}
    <h5 id="comment-start"></h5>
    <!-- comment/Q&A area -->
    @include('comment_question.comment_qa')
</div> 
@endsection
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
