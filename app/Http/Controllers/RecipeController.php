<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post; // Postモデルをインポート
use App\Models\Dish;
use App\Models\Comment;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class RecipeController extends Controller
{
    private $post;
    private $dish;
    private $comment;

    public function __construct(Post $post, Dish $dish, Comment $comment) 
    {
        $this->post = $post;
        $this->dish = $dish;
        $this->comment = $comment;
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
        if(!Auth::user())
        {
            return redirect()->route('home');
        }

        $request->validate([
            'photo' => 'mimes:jpeg,png,jpg,gif,svg|max:1048',
            'title' => 'required|min:1|max:150',
            'dish_category' => 'required',
            'cooking_time' => 'required|max:150',
            'ingredients' => 'required|min:1',
            'description' => 'required|min:1',
        ]);

        $post = $this->post;

        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->dish_id = $request->dish_category;
        $post->cooking_time = $request->cooking_time;
        $post->ingredients = $request->ingredients;
        $post->description = $request->description;
        if ($request->hasFile('photo')) {
            $post->photo = 'data:image/' . $request->photo->extension() . ';base64,' . base64_encode(file_get_contents($request->photo));
            // $request->file('photo')->move(public_path('images'), $imageName);
        }
        
        $post->save();
        
        return redirect()->route('myrecipe',Auth::user()->id);
    }

    public function detailrecipe(Request $request, $id)
    {
        $recipe = Post::with('dish', 'bookmarkedBy')->findOrFail($id);
        // get all of commnets.
        $all_comments = $recipe
                        ->comment()
                        ->latest()
                        ->paginate(5);
        // get all of questions
        $all_questions = $recipe
                        ->questions()
                        ->latest()
                        ->paginate(5);

        return view('recipe.detailrecipe', compact('recipe','all_comments','all_questions'));
    }

    // Edit recipe method
    public function editMyRecipe($id)
    {
        $post = $this->post->findOrFail($id);
        if(Auth::user()->id != $post->user->id && Auth::user()->role_id !=1){
            return redirect()->route('recipe.detailrecipe', $post->id);
        }
        $all_dishes = $this->getAllDish();
        return view('editmyrecipe')->with('post', $post)->with('all_dishes', $all_dishes);
    }

    // Update recipe method
    public function updateMyRecipe(Request $request, $id){
        // dd($request->all());

        // try {
        // $post = Post::findOrFail($id);

        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:1048',
            'recipename' => 'required|min:1|max:150',
            'recipecategory' => 'required',
            'cooking_time' => 'required|max:150',
            'ingredients' => 'required|min:1',
            'descriptions' => 'required|min:1',
        ]);
            $post = $this->post->findOrFail($id);

            $post->title = $request->input('recipename');
            $post->dish_id = $request->input('recipecategory');
            $post->cooking_time = $request->input('cooking_time');
            $post->ingredients = $request->input('ingredients');
            $post->description = $request->input('descriptions');
            if ($request->hasFile('image')) {
                $post->photo = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
            }
        //    dd($request->all(), $post);
            $post->save();
            // Log::info('Post updated successfully.', ['post_id' => $post->id]);
            return redirect()->route('detailrecipe', ['post_id'=>$post->id, 'user_id'=>$post->user_id]);
        // } catch (\Exception $e) {
        //     Log::error('Failed to update post: ' . $e->getMessage(), [
        //         'post_id' => $id,
        //     ]);
        // }

    }
    
    // Delete recipe method
    public function deleteMyRecipe($id)
    {
        $post = $this->post->findOrFail($id);
        $user = $post->user_id;
        $post->forceDelete();
        return redirect()->route('myrecipe', $user);
    }

}

