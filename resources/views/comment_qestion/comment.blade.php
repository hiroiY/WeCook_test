<div 
  class="tab_panel-box " 
  data-panel="01"
>
  <div class="tab_panel-text">
    @if(Auth::user())
    <form action="#" method="post" class="px-5 d-flex my-5">
      @csrf 
      <input type="text" name="comment" id="comment" class="w-100 p-1" placeholder="Comments here">
      <button type="submit" class="ms-1 p-1 border-0 rounded add" >Add Comment</button>
    </form>
    @else
      <h3 class="text-center my-5">Adding Comment is for auth users only, <a href="{{ route('register') }}"">Register</a> or <a href="{{ route('login') }}"">Login</a></h3>
    @endif

    <!-- comment area below-->
    {{-- @foreach() --}}
    <div class="p-3 mb-3 mx-3 comments">
      <div class="user_account d-inline-flex mb-1"> 
        {{-- @if($comment->user->avatar) --}}
        <!-- <img src="" alt="">
        <p class="username my-auto p-1">Auth Username </p> -->
        {{-- @else --}}
        <img src="{{ asset('images\profile_icon.png') }}" alt="{{-- $comment->user->name --}}">
        <p class="username my-auto p-1">Username </p>
        {{-- @endif --}}
        &nbsp;
        <span class="text-uppercase small text-center my-auto" style="color: #4D1F0191;">date</span>
      </div>
      <p class="mb-0">{{-- comment body here --}} Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>

    <!-- If the user is comment's owner -->
    {{-- @if(the user is comment's owner) --}}
    <div class="p-3 mb-3 mx-3 comments-owner ">
      <div class="row user_account w-100 ms-0 mb-2 justify-content-between"> 
      {{--  @if(the user has avatar) --}}
        <div class="col-3 d-inline-flex ms-0 ps-0">
          <img src="{{ asset('images\profile_icon.png') }}" alt="">
          <p class="username my-auto p-1">Auth Username </p>
          {{--  @endif --}}
          &nbsp;
          <span class="text-uppercase small text-center my-auto" style="color: #4D1F0191;">date</span>
          <!-- <img src="" alt="{{--  --}}">
          <p class="username my-auto p-1">Auth Username </p> -->
          {{--  @else --}}
        </div>
        <div class="col-2 my-auto pe-0">
          <button type="button" class="ms-4 px-3 small">Edit</button>
          <button type="submit" class="px-3 ms-2 me-0 small mt-2">Delete</button>
        </div>
      </div>

      <p class="mb-0">{{-- comment body here --}} Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>
    {{-- @endforeach --}}
  </div>
  <!--add pagenate soon-->
</div>