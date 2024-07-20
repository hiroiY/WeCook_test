@extends('layouts.app')

@vite(['resources/sass/editmyrecipe.scss'])

@section('title', 'Edit recipe')

@section('content')
<div class="edit-recipe py-5">

  <div class="container">
    <div class="row justify-content-center">

      {{-- Breadcrumb --}}
      <div class="breadcrumb my-4" id="breadcrumb-section">
        <a href="{{ route('home') }}">Home</a>
        <i class="fa-solid fa-angle-right"></i>
        <a href="{{ route('myrecipe', ['id' => Auth::user()->id]) }}">{{ Auth::user()->name }}</a>
        <i class="fa-solid fa-angle-right"></i>
        <span class="" style="color: #e45900;">{{ $post->title }}</span>
      </div>

      {{-- Edit recipe form --}}
      <form action="{{ route('updatemyrecipe', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        {{-- Recipe image input --}}
        <div class="mb-4">
          <label for="recipeimage" class="form-label h3">Recipe image</label>
          <input type="file" name="image" id="recipeimage" class="form-control recipe-inp" aria-describedby="recipeimage-info">
          <div class="form-text" id="recipeimage-info">
              The acceptable formats are jpeg, jpg, png and gif only. <br>
              Max file size is 1048kB.
              {{-- error handling --}}
              @error('image')
                  <div class="text-danger small">{{ $message }}</div>
              @enderror
          </div>
        </div>

        {{-- Recipe name input --}}
        <div class="mb-4">
          <label for="recipename" class="form-label h3">Recipe name</label>
          <input type="text" name="recipename" id="recipename" value="{{ old('recipename', $post->title) }}" class="form-control recipe-inp" placeholder="" required>
          @error('recipename')
            <div class="text-danger small">{{ $message }}</div>
          @enderror
        </div>

        <div class="row col mb-4">
          {{-- Recipe category dropdown button --}}
          <div class="col-6">
            <label for="recipecategory" class="form-label h3">Recipe category</label>
            <select class="form-select recipe-inp" id="recipecategory" name="recipecategory" required>
              <option value="" disabled selected>Select a recipe category</option>
                @foreach($all_dishes as $category )
                                  <option
                                      value="{{$category->id}}"
                                      @if(old('recipecategory', $post->dish_id) == $category->id)
                                          @selected(old('recipecategory', $post->dish_id) == $category->id)
                                      @endif
                                  >
                                      {{$category->name}}
                                  </option>
                              @endforeach
            </select>
          </div>
          {{-- Cooking time input --}}
          <div class="col-6">
            <label for="cookingtime" class="form-label h3">Cooking time</label>
            <input type="text" name="cooking_time" id="cooking_time" value="{{ old('cooking_time', $post->cooking_time) }}" class="form-control recipe-inp" placeholder="Estimated cooking time in mins/hrs" required>
          </div>
        </div>

        {{-- Ingredients input --}}
        <div class="mb-4">
          <label for="ingredients" class="form-label h3">Ingredients</label>
          <textarea name="ingredients" id="ingredients" cols="30" rows="10" class="form-control recipe-inp" placeholder="Enter ingredients" required>{{ old('ingredients', $post->ingredients) }}</textarea>
        </div>
        {{-- Descriptions input --}}
        <div class="mb-5">
          <label for="description" class="form-label h3">Desctiptions</label>
          <textarea name="descriptions" id="descriptions" cols="30" rows="10" class="form-control recipe-inp" placeholder="Enter descriptions" required>{{ old('descriptions', $post->description) }}</textarea>
        </div>

        {{-- Update recipe button --}}
        <div class="mb-5">
          <button type="submit" class="btn w-100 updaterecipe">Update recipe</button>
        </div>
      </form>


        {{-- Delete recipe button --}}
          <div class="mb-3">
            <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#delete-post">Delete recipe</button>
          </div>

    </div>
  </div>
</div>
@include('delete_recipe')
@endsection

