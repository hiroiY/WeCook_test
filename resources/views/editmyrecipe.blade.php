@extends('layouts.app')

@vite(['resources/sass/editmyrecipe.scss'])

@section('title', 'Edit recipe')

@section('content')
<div class="edit-recipe">

<div class="container">
  <div class="row justify-content-center">
    {{-- Bread crumb --}}
    {{-- <div class="my-4">
      <p><a href="">Home</a> >
        <a href="">Creators</a> >
        <a href="">Mr.Cook</a> >
        <a href="">Omlette with green onion</a>
      </p>
    </div> --}}

    {{-- Edit recipe form --}}
    <form action="{{-- route('updaterecipe', $post->id) --}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      {{-- Recipe image input --}}
      <div class="mb-4">
        <label for="recipeimage" class="form-label h3">Recipe image</label>
        <input type="file" name="image" id="recipeimage" class="form-control recipe-inp" aria-describedby="recipeimage-info">
        <div class="form-text" id="recipeimage-info">
            The acceptable formats are jpeg, jpg, png and gif only. <br>
            Max file size is 1048kB.
        </div>
        {{-- error handling --}}
        @error('image')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
      </div>

      {{-- Recipe name input --}}
      <div class="mb-4">
        <label for="recipename" class="form-label h3">Recipe name</label>
        <input type="text" name="name" id="recipename" value="{{ old('title', $post->title) }}" class="form-control recipe-inp" placeholder="">
      </div>

      <div class="row col mb-4">
        {{-- Recipe category dropdown button --}}
        <div class="col-6">
          <label for="recipecategory" class="form-label h3">Recipe category</label>
          <select class="form-select recipe-inp" id="recipecategory" name="category" required>
            <option value="" disabled selected>Select a recipe category</option>
              {{-- @foreach ($dishes as $dish)
                <option value="{{ $post->dish()->id; }}">{{ $post->dish()->name; }}</option>
              @endforeach --}}
            {{-- <option value="{{ $post->dish()->id; }}">{{ $post->dish()->name; }}</option> --}}
            {{-- <option value="side-dish" {{ $recipe->category == 'side-dish' ? 'selected' : '' }}>Appetizer</option>
            <option value="side-dish" {{ $recipe->category == 'side-dish' ? 'selected' : '' }}>Side dish</option>
            <option value="main-dish" {{ $recipe->category == 'main-dish' ? 'selected' : '' }}>Main dish</option>
            <option value="desserts" {{ $recipe->category == 'desserts' ? 'selected' : '' }}>Desserts</option> --}}
            <option value="appetizer">Appetizer</option>
            <option value="side-dish">Side dish</option>
            <option value="main-dish">Main dish</option>
            <option value="dessert">Dessert</option>
          </select>
        </div>
        {{-- Cooking time input --}}
        <div class="col-6">
          <label for="cookingtime" class="form-label h3">Cooking time</label>
          <input type="text" name="cooking_time" id="cookingtime" value="{{ old('cooking_time', $post->cooking_time) }}" class="form-control recipe-inp" placeholder="Estimated cooking time in mins/hrs">
        </div>
      </div>

      {{-- Ingredients input --}}
      <div class="mb-4">
        <label for="ingredients" class="form-label h3">Ingredients</label>
        <textarea name="ingredients" id="ingredients" cols="30" rows="10" class="form-control recipe-inp" placeholder="Enter ingredients">{{ old('ingredients', $post->ingredients) }}</textarea>
      </div>
      {{-- Descriptions input --}}
      <div class="mb-5">
        <label for="description" class="form-label h3">Desctiptions</label>
        <textarea name="descriptions" id="descriptions" cols="30" rows="10" class="form-control recipe-inp" placeholder="Enter descriptions">{{ old('description', $post->description) }}</textarea>
      </div>


      {{-- Update recipe button --}}
      <div class="mb-5">
        <button type="submit" class="btn w-100 updaterecipe">Update recipe</button>
      </div>
      {{-- Delete recipe button --}}
      <div class="mb-3">
        <button type="submit" class="btn btn-danger w-100">Delete recipe</button>
      </div>
    </form>
  </div>
</div>
</div>

@endsection