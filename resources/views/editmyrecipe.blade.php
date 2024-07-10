@extends('layouts.app')

@vite(['resources/sass/editmyrecipe.scss'])

@section('title', 'Edit recipe')

@section('content')
<div class="edit-recipe">

<div class="container">
  <div class="row justify-content-center">
    {{-- Bread crumb --}}
    <div class="my-4">
      <p><a href="">Home</a> >
        <a href="">Creators</a> >
        <a href="">Mr.Cook</a> >
        <a href="">Omlette with green onion</a>
      </p>
    </div>
    
    {{-- Edit recipe form --}}
    <form action="" method="post">
      @csrf
      @method('PATCH')

      {{-- Recipe image input --}}
      <div class="mb-4">
        <label for="recipeimage" class="form-label h3">Recipe image</label>
        <input type="file" name="" id="recipeimage" class="form-control recipe-inp" aria-describedby="recipeimage-info">
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
        <input type="text" name="" id="recipename" class="form-control recipe-inp" placeholder="Enter the recipe name">
      </div>

      <div class="row col mb-4">
        {{-- Recipe category dropdown button --}}
        <div class="col-6">
          <label for="recipecategory" class="form-label h3">Recipe category</label>
          <select class="form-select recipe-inp" id="recipecategory" name="" required>
            <option value="" disabled selected>Select a recipe category</option>
            <option value="appetisers">Appetisers</option>
            <option value="side-dish">Side dish</option>
            <option value="main-dish">Main dish</option>
            <option value="desserts">Desserts</option>
          </select>
        </div>
        {{-- Cooking time input --}}
        <div class="col-6">
          <label for="cookingtime" class="form-label h3">Cooking time</label>
          <input type="text" name="" id="cookingtime" class="form-control recipe-inp" placeholder="Estimated cooking time in mins/hrs">
        </div>
      </div>

      {{-- Ingredients input --}}
      <div class="mb-4">
        <label for="ingredients" class="form-label h3">Ingredients</label>
        <textarea name="" id="ingredients" cols="30" rows="10" class="form-control recipe-inp" placeholder="Enter ingredients"></textarea>
      </div>
      {{-- Descriptions input --}}
      <div class="mb-5">
        <label for="descriptions" class="form-label h3">Desctiptions</label>
        <textarea name="" id="descriptions" cols="30" rows="10" class="form-control recipe-inp" placeholder="Enter descriptions"></textarea>
      </div>


      {{-- Update recipe button --}}
      <div class="mb-5">
        <button type="submit" class="btn w-100 updaterecipe">Update recipe</button>
      </div>
      {{-- Delete recipe button --}}
      <div class="mb-3">
        <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#delete-recipe">
            Delete Recipe
        </button>
    </div>
    </form>
  </div>
</div>
</div>
@include('delete_recipe')
@endsection

