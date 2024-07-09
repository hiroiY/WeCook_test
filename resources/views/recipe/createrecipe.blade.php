@extends('layouts.app')
@vite(['resources/sass/createrecipe.scss'])
@section('content')

    <div class="createrecipe" style="padding:120px">
        <div class="container">
            <nav class="breadcrumb">
                <a href="{{ route('home') }}">Home</a> &gt; <span> <a href="">Create Recipe</a></span>
            </nav>
            <!-- @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif -->

            <form class="recipe-form  m-auto" action="{{ route('storerecipe') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- recipe photo -->
                <div class="upload-photo mb-0" style="height:100px">
                    <label for="photo" >
                        <i class="fa-solid fa-camera fa-2x me-3"></i>
                        <span>Upload photo (Cover photo)</span>
                    </label>
                    <input type="file" id="photo" name="photo" style="display: none;" >
                </div>
                <div class="form-text mt-0 mb-4 text-danger" id="image-info">
                    *The acceptable formats are jpeg, jpg, png and gif only.&nbsp; (Max file is 2048Kb)  

                    @error('photo')
                    <p class="alert alert-danger text-danger small fw-bold">
                        {{ $message }}
                    </p>
                @enderror
                </div>
            

                <!-- recipe title -->
                <input type="text" name="title" placeholder="Recipe Name: American style burger" class="recipe-name mt-3 mb-0" value="{{ old('title') }}">
                @error('title')
                    <p class="alert alert-danger text-danger small fw-bold mb-3 mt-1">
                        {{ $message }}
                    </p>
                @enderror

                <!-- Select dish_id here -->
                <div class="row p-auto my-4">
                    <div class="col-6 dropdowns">
                        <select 
                            name="dish_category" 
                            class="dropdown dish-id w-100"
                        >
                            <option selected disabled>
                                Dish Category
                            </option>
                            @foreach($all_dishes as $category )
                                <option 
                                    value="{{$category->id}}" 
                                    @if(old('dish_category') == $category->id) 
                                        @selected(old('dish_category') == $category->id) 
                                    @endif
                                >
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('dish_category')
                            <p class="alert alert-danger text-danger small fw-bold mb-3 mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- cooking_time here -->
                    <div class="col-6">
                        <input 
                            type="text" 
                            name="cooking_time" 
                            placeholder="Cooking Time: e.g., 30 minutes" 
                            class="cooking_time w-100"
                            value="{{ old('cooking_time') }}"
                        >
                    
                        @error('cooking_time')
                            <p class="alert alert-danger text-danger small fw-bold mb-3 mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- recipe ingredients -->
                <h3>Ingredients</h3>
                <textarea name="ingredients" placeholder="Ingredients for your recipe" class="ingredients mb-1" >{{ old('ingredients') }}</textarea>
                @error('ingredients')
                    <p class="alert alert-danger text-danger small fw-bold mb-3">
                        {{ $message }}
                    </p>
                @enderror

                <!-- recipe description -->
                <h3 class="mt-4">Description</h3>
                <textarea name="description" placeholder="Describe your recipe" class="description mb-1" style="height:400px">{{ old('description') }}</textarea>
                @error('description')
                    <p class="alert alert-danger text-danger small fw-bold mb-3">
                        {{ $message }}
                    </p>
                @enderror

                <!-- post recipe button -->
                <button type="submit" class="publish-button mt-3">
                    Publish your recipe!
                </button>
            </form>
        </div>
    </div>
@endsection
