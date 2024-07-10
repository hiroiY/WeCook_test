<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post; // Postモデルをインポート
use App\Models\Dish;
use Illuminate\Support\Facades\Log;

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

        $this->post->user_id = Auth::user()->id;
        $this->post->title = $request->title;
        $this->post->dish_id = $request->dish_category;
        $this->post->cooking_time = $request->cooking_time;
        $this->post->ingredients = $request->ingredients;
        $this->post->description = $request->description;
        if ($request->hasFile('photo')) {
            $this->post->photo = 'data:image/' . $request->photo->extension() . ';base64,' . base64_encode(file_get_contents($request->photo));
            // $request->file('photo')->move(public_path('images'), $imageName);
        }
        $this->post->save();
        return redirect()->route('myrecipe',Auth::user()->id);
    }

    public function detailrecipe($id)
    {
        $recipe = Post::with('dish')->findOrFail($id);
            return view('recipe.detailrecipe', compact('recipe'));
    }

    // Edit recipe method
    public function editMyRecipe($id)
    {
        $post = $this->post->findOrFail($id);
        if(Auth::user()->id != $post->user->id && Auth::user()->role_id !=1){
            return redirect()->route('recipe.detailrecipe', $post->id);
        }
        return view('editmyrecipe')->with('post', $post);
    }

    // Update recipe method
    public function updateMyRecipe(Request $request, $id){
        // dd($request->all());

        // try {
            $post = Post::findOrFail($id);
            $post->title = $request->input('recipename');
            $post->dish_id = $request->input('recipecategory');
            $post->cooking_time = $request->input('cooking_time');
            $post->ingredients = $request->input('ingredients');
            $post->description = $request->input('descriptions');
            if ($request->hasFile('photo')) {
                $this->post->photo = 'data:image/' . $request->photo->extension() . ';base64,' . base64_encode(file_get_contents($request->photo));;                
            }
        //    dd($request->all(), $post);
            $post->save();
            // Log::info('Post updated successfully.', ['post_id' => $post->id]);
            return redirect()->route('home')->with('success', 'Post updated successfully.');
        // } catch (\Exception $e) {
        //     Log::error('Failed to update post: ' . $e->getMessage(), [
        //         'post_id' => $id,
        //     ]);
        // }

    }
    
    // Delete recipe method
    public function deleterecipe()
    {
        return view('delete_recipe');
    }
}

