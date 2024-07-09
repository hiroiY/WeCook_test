<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post; // Postモデルをインポート
use App\Models\Dish;

class RecipeController extends Controller
{
    private $post;
    private $dish;

    public function __construct(Post $post, Dish $dish) 
    {
        $this->post = $post;
        $this->dish = $dish;
    }

    public function createrecipe(Request $request){
        $all_dishes = $this->getAllDish();

        return view('recipe.createrecipe',compact('all_dishes'));
    }


    public function getAllDish () {
        $all_dishes = $this->dish->all();

        return $all_dishes;
    }
    
    // Add storeRecipe method
    public function storeRecipe(Request $request) 
    {
        $createPost = $request->validate([
            'photo' => 'mimes:jpeg,png,jpg,gif,svg|max:1048',
            'title' => 'required|min:1|max:150',
            'dish_category' => 'required',
            'cooking_time' => 'required|max:150',
            'ingredients' => 'required|min:1',
            'description' => 'required|min:1',
        ]);

        // $imageName = '';        $this->post->photo = ;
        // if ($request->hasFile('photo')) {
        //     $imageName = time() . '.' . $request->file('photo')->extension();
        //     // $request->file('photo')->move(public_path('images'), $imageName);
        // }

        $this->post->user_id = Auth::user()->id;
        $this->post->title = $request->title;
        $this->post->dish_id = $request->dish_category;
        $this->post->cooking_time = $request->cooking_time;
        $this->post->ingredients = $request->ingredients;
        $this->post->description = $request->description;

        if ($request->hasFile('photo')) {
            $this->post->photo = 'data:image/' . $request->photo->extension() . ';base64,' . base64_encode(file_get_contents($request->photo));;
            // $request->file('photo')->move(public_path('images'), $imageName);
        }

        $this->post->save();

        return redirect()->route('myrecipe',Auth::user()->id);
    }


    // public function createrecipe(){
    //     return view('recipe.createrecipe');
    // }

    // public function storeRecipe(Request $request) // storeRecipeメソッドを追加
    // {
    //     $request->validate([
    //         'cover-photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'recipe-name' => 'required|string|max:255',
    //         'dish-category' => 'required|string|max:255',
    //         'cooking-time' => 'required|string|max:255',
    //         'ingredients' => 'required|string',
    //         'description' => 'required|string',
    //     ]);

    //     $imageName = '';
    //     if ($request->hasFile('cover-photo')) {
    //         $imageName = time() . '.' . $request->file('cover-photo')->extension();
    //         $request->file('cover-photo')->move(public_path('images'), $imageName);
    //     }

    //     Post::create([
    //         'user_id' => auth()->id(), // 認証されたユーザーのIDを設定
    //         'photo' => $imageName,
    //         'dish_id' => 1, // ここは適切な dish_id を設定する必要があります
    //         'title' => $request->input('recipe-name'),
    //         'category' => $request->input('dish-category'), // dish-category を保存
    //         'times' => $request->input('cooking-time'),
    //         'ingredients' => $request->input('ingredients'),
    //         'description' => $request->input('description'),
    //     ]);

    //     return redirect()->route('createrecipe')->with('success', 'Recipe created successfully.');
    // }

    public function detailrecipe($id) 
    {
        $recipe = Post::with('dish')->findOrFail($id);
    
            return view('recipe.detailrecipe', compact('recipe'));

    }

    public function editmyrecipe()
    {
        return view('editmyrecipe');
    }
    
    public function deleterecipe()
    {
        return view('delete_recipe');
    }
}
