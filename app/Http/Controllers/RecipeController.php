<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Postモデルをインポート

class RecipeController extends Controller
{
    public function createrecipe(){
        return view('recipe.createrecipe');
    }

    public function storeRecipe(Request $request) // storeRecipeメソッドを追加
    {
        $request->validate([
            'cover-photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'recipe-name' => 'required|string|max:255',
            'dish-category' => 'required|string|max:255',
            'cooking-time' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'description' => 'required|string',
        ]);

        $imageName = '';
        if ($request->hasFile('cover-photo')) {
            $imageName = time() . '.' . $request->file('cover-photo')->extension();
            $request->file('cover-photo')->move(public_path('images'), $imageName);
        }

        Post::create([
            'user_id' => auth()->id(), // 認証されたユーザーのIDを設定
            'photo' => $imageName,
            'dish_id' => 1, // ここは適切な dish_id を設定する必要があります
            'title' => $request->input('recipe-name'),
            'category' => $request->input('dish-category'), // dish-category を保存
            'times' => $request->input('cooking-time'),
            'ingredients' => $request->input('ingredients'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('createrecipe')->with('success', 'Recipe created successfully.');
    }

    public function detailrecipe($id) 
    {
        $recipe = Post::with('dish')->findOrFail($id);
    
            return view('recipe.detailrecipe', compact('recipe'));

    }

    public function editmyrecipe($id)
    {
        $recipe = Post::findOrFail($id);
        return view('editmyrecipe', compact('recipe'));
    }
    
    

    public function deleterecipe($id)
    {
        $recipe = Post::findOrFail($id);
        return view('delete_recipe', compact('recipe'));
    }

    public function delete($id)
    {
        $recipe = Post::findOrFail($id);
        $recipe->delete();
        return redirect()->route('home')->with('success', 'Recipe deleted successfully');
    }
}
