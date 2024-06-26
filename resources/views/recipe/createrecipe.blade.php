@extends('layouts.app')
@vite(['resources/sass/createrecipe.scss'])
@section('content')

<div class="createrecipe container" style="padding:120px">
    <nav class="breadcrumb">
        <a href="#">Home</a> &gt; <span> <a href="#">Create Recipe</a></span>
    </nav>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form class="recipe-form" action="{{ route('storerecipe') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="upload-photo" style="height:100px">
            <label for="cover-photo">
                <img src="camera-icon.png" alt="Upload photo" />
                <span>Upload photo (Cover photo)</span>
            </label>
            <input type="file" id="cover-photo" name="cover-photo" style="display: none;">
        </div>
        <input type="text" name="recipe-name" placeholder="Recipe Name: American style burger" class="recipe-name">
        <div class="dropdowns">
            <select name="dish-category" class="dropdown">
                <option>Dish Category</option>
                <option value="Appetizer">Appetizer</option>
                <option value="Side dish">Side dish</option>
                <option value="Main dish">Main dish</option>
                <option value="Dessert">Dessert</option>
            </select>
            <input type="text" name="cooking-time" placeholder="Cooking Time: e.g., 30 minutes" class="dropdown">
        </div>
        <h3>Ingredients</h3>
        <textarea name="ingredients" placeholder="Ingredients for your recipe" class="ingredients"></textarea>
        <h3>Description</h3>
        <textarea name="description" placeholder="Describe your recipe" class="description" style="height:400px"></textarea>
        <button type="submit" class="publish-button">Publish your recipe!</button>
    </form>
</div>
@endsection
