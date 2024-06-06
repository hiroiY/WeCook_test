@extends('layouts.app')

@section('content')


<div class="container" style="padding:120px">
    <nav class="breadcrumb">
      <a href="#">Home</a> &gt; <span>Create Recipe</span>
    </nav>
    <form class="recipe-form">
      <div class="upload-photo" style="height:100px">
        <label for="cover-photo">
          <img src="camera-icon.png" alt="Upload photo" />
          <span>Upload photo (Cover photo)</span>
        </label>
        <input type="file" id="cover-photo" name="cover-photo" style="display: none;">
      </div>
      <input type="text" placeholder="Recipe Name: American style burger" class="recipe-name">
      <div class="dropdowns">
        <select class="dropdown">
          <option>Dish Category</option>
        </select>
        <select class="dropdown">
          <option>Cooking Time</option>
        </select>
      </div>
      <h3>Ingredients</h3>
      <textarea placeholder="Ingredients for your recipe" class="ingredients"></textarea>
      <h3>Description</h3>
      <textarea placeholder="Describe your recipe" class="description"style="height:400px"></textarea>
      <button type="submit" class="publish-button">Publish your recipe!</button>
    </form>
  </div>
@endsection


