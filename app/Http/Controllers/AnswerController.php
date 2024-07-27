<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Post;

class AnswerController extends Controller
{
    private $question;
    private $answer;

    public function __construct(Question $question,Answer $answer)
    {
        $this->question = $question;
        $this->answer = $answer;
    }
    public function storeAnswer(Request $request,$id) 
    {
        $request->validate([
            'answer' => 'required|min:1|max:300',
        ]);

        $this->question->findOrFail($id);

        $this->answer->user_id = Auth::user()->id;
        $this->answer->question_id = $id;
        $this->answer->body = $request->answer;

        $this->answer->save();

        return redirect()->back();
    }

    public function updateAnswer(Request $request,$id) 
    {
        $request->validate([
            'body' => 'required|min:1|max:300',
        ]);

        $answer = $this->answer->findOrFail($id);

        if($answer->user_id !== Auth::user()->id) {
            return redirect()->back();
        }
        
        $answer->body = $request->body;
        $answer->save();

        return redirect()->back();

    }

    public function deleteAnswer($id) 
    {
        $answer = $this->answer->findOrFail($id);

        $answer->delete($id);

       return redirect()->back();
    }
}
