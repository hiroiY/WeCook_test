<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Post;

class QuestionController extends Controller
{
    private $question;
    private $post;

    public function __construct(Question $question,Post $post)
    {
        $this->question = $question;
        $this->post = $post;
    }

    public function storeQuestion(Request $request,$id) {
        $request->validate([
            'question' => 'required|min:1|max:300',
        ]);

       $this->post->findOrFail($id);

        $this->question->user_id = Auth::user()->id;
        $this->question->post_id = $id;
        $this->question->body = $request->question;

        $this->question->save();

        return redirect()->back();
    }

    public function updateQuestion(Request $request,$id) 
    {
        $request->validate([
            'body' => 'required|min:1|max:300',
        ]);

        $question = $this->question->findOrFail($id);

        if($question->user_id !== Auth::user()->id) {
            return redirect()->back();
        }
        
        $question->body = $request->body;
        $question->save();

        return redirect()->back();

    }

    public function deleteQuestion($id) 
    {
        $question = $this->question->findOrFail($id);

        $question->delete($id);

       return redirect()->back();
    }
}
