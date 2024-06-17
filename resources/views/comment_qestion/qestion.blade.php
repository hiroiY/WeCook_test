<div 
  class="tab_panel-box is-show" 
  data-panel="02"
>
  <div class="tab_panel-text">
    @if(Auth::user()) 
    <form 
      action="#" 
      method="post" 
      class="px-5 d-flex my-5"
    >
      @csrf 
      <input 
        type="text" 
        name="comment" 
        id="comment" 
        class="w-100 p-1" 
        placeholder="Your question here"
      >
      <button 
        type="submit" 
        class="ms-1 p-1 border-0 rounded add" 
      >
        Add Qestion
      </button>
    </form>
    @elseif(Auth::user()->id === $recipe->user->id)
    <form 
      action="#" 
      method="post"
      class="px-5 d-flex my-5"
    >
      @csrf 
      <input 
        type="text" 
        name="comment" 
        id="comment" 
        class="w-100 p-1" 
        placeholder="Your answer here"
      >
      <button 
        type="submit" 
        class="ms-1 p-1 border-0 rounded add" 
      >
        Add Answer
      </button>
    </form>
    @else
      <h3 
        class="text-center my-5"
      >
        Adding Comment is for auth users only, <a href="#">Register</a> or <a href="#">Login</a>
      </h3>
    @endif

    <!-- Q&A area -->
    <div class="p-3 mx-5 mb-3 questions">
      <div class="row user_question ms-0">
        <div class="col-2 p-0">
        </div>
        <div class="col-auto p-0 h-25 mt-5 ms-auto">
          <p 
            class="text-uppercase small mx-auto pt-4" 
            style="color: #4D1F0191;"
          >
            date
          </p>
        </div>
        <div class="col-8 question_body px-4 d-flex">
          <div class="my-auto p-1">
            <i class="fa-solid fa-q fa-3x"></i>
            <p class="qa_body"> question body here </p>
          </div>
        </div>
        <div class="col-auto text-start user_account p-0 me-0">
        {{-- @if($comment->user->avatar) --}}
          <!-- <img src="{{-- $comment->user->avatar --}}" alt="" class="ms-3">
          <p class="username my-auto p-1">Username</p> -->
          {{-- @else --}}
          <div class="ps-1">
            <img src="{{ asset('images\profile_icon.png') }}" alt="">
          </div>
          <p class="username my-auto p-1">Username</p>
          {{--  @endif --}}
        </div>
      </div>
      
      
      <div class="row user_answer mb-3">
        <div class="col-auto text-start user_account p-0 me-0 ms-0">
        {{-- @if($comment->user->avatar) --}}
          <!-- <img src="{{-- $comment->user->avatar --}}" alt="" class="ms-3">
          <p class="username my-auto p-1">Username</p> -->
          {{-- @else --}}
          <div class="ps-1">
            <img src="{{ asset('images\profile_icon.png') }}" alt="">
          </div>
          <p class="username my-auto p-1">Username</p>
          {{--  @endif --}}
        </div>
        <div class="col-8 answer_body me-0 d-flex">
          <div class="my-auto p-1">
            <i class="fa-solid fa-a fa-3x"></i>
            <p class="qa_body">
            answer body here</p>
          </div>
        </div>
        <div class="col-auto mt-5 mx-auto">
          <p 
            class="text-uppercase small pt-4" 
            style="color: #4D1F0191;"
          >
            date
          </p>
        </div>
        <div class="col-2 p-0">
        </div>
      </div>
    </div>
  </div>

  <!--add pagenate soon-->
</div>