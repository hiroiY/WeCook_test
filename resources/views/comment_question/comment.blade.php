<div 
  class="tab_panel-box is-show" 
  data-panel="01"
>
  <div class="tab_panel-text mt-5">
    @if(Auth::user())
      @error('comment')
        <div class="alert alert-danger text-danger small mx-5 py-2">
          {{ $message }}
        </div>
      @enderror
      <form 
        action="{{ route('store.comment',$recipe->id) }}" 
        method="post" 
        class="px-5 d-flex mb-5"
      >
        @csrf 
        <input 
          type="text" 
          name="comment" 
          id="comment" 
          class="w-100 p-1" 
          placeholder="Comments here"
        >
        <button 
          type="submit" 
          class="ms-3 p-1 border-0 rounded add" 
        >
          Add Comment
        </button>
      </form>
    @else
      <h3 
        class="text-center my-5"
      >
        Adding Comment is for auth users only, <a href="{{ route('register') }}"">Register</a> or <a href="{{ route('login') }}"">Login</a>
      </h3>
    @endif

    <!-- comment area below-->
    @forelse($all_comments as $comment)
      <!-- If the user is comment's owner -->
      @if(Auth::user())
        @if( $comment->user_id === Auth::user()->id )
          <div class="p-3 mb-3 mx-5 comments-owner">
            <div class="row user_account w-100 ms-0 mb-0 justify-content-between">
              <div class="col-5 d-inline-flex ms-0 ps-0"> 
                @if($comment->user->avatar)
                  <img 
                    src="{{ $comment->user->avatar }}" 
                    alt="{{ $comment->user->avatar }}"
                  >
                @else
                  <img 
                    src="{{ asset('images\profile_icon.png') }}" 
                    alt="{{ $comment->user->name }}"
                  >
                @endif
                <p class="username my-auto p-1">{{ Auth::user()->name }}</p>
                &nbsp;
                <span 
                  class="text-uppercase small text-center my-auto" 
                  style="color: #4D1F0191;"
                >
                  {{ date('M d, Y', strtotime($comment->created_at)) }}
                </span>
              </div>
              <div class="col-auto me-0 pe-0">
                <button 
                  type="button" 
                  class="edit-btn ms-3 px-4"
                  data-bs-toggle="modal" 
                  data-bs-target="#commentEdit-{{ $comment->id }}"
                >
                  Edit
                </button>
                @include('comment_question.modal.comment_update')

                <form 
                  action="{{ route('delete.comment', $comment->id) }}" 
                  method="post"
                  class="delete-btn d-inline-flex"
                >
                  @csrf
                  @method('DELETE')
                  <button 
                    type="submit" 
                    class="px-4 ms-2 me-0 mt-2"
                  >
                    Delete
                  </button>
                </form>
              </div>
              <p class="comment-body mt-2 mb-0 p-0">{{ $comment->body}}</p>
            </div>
          </div>
        @else

          <!-- Another user's comment -->
          <div class="p-3 mb-3 mx-5 comments">
            <div class="user_account d-inline-flex mb-1"> 
              @if($comment->user->avatar) 
                <img 
                  src="{{$comment->user->avatar}}" 
                  alt="{{$comment->user->name}}"
                >
                <p class="username my-auto p-1">
                  {{$comment->user->name}}
                </p>
              @else
                <img 
                  src="{{ asset('images\profile_icon.png') }}" 
                  alt="{{ $comment->user->name }}"
                >
                <p class="username my-auto p-1">
                  {{$comment->user->name}}
                </p>
              @endif
              &nbsp;
              <span 
                class="text-uppercase small text-center my-auto" 
                style="color: #4D1F0191;"
              >
                {{ date('M d, Y', strtotime($comment->created_at)) }}
              </span>
            </div>
            <p class="mb-0">
              {{ $comment->body }}
            </p>
          </div>
        @endif
        <!-- If the user's status is just a guest. -->
      @else
        <div class="p-3 mb-3 mx-5 comments">
          <div class="user_account d-inline-flex mb-1"> 
            @if($comment->user->avatar) 
              <img 
                src="{{$comment->user->avatar}}" 
                alt="{{$comment->user->name}}"
              >
              <p class="username my-auto p-1">
                {{$comment->user->name}}
              </p>
            @else
              <img 
                src="{{('images\profile_icon.png') }}" 
                alt="{{ $comment->user->name }}"
              >
              <p class="username my-auto p-1">
                {{$comment->user->name}}
              </p>
            @endif
            &nbsp;
            <span 
              class="text-uppercase small text-center my-auto" 
              style="color: #4D1F0191;"
            >
              {{ date('M d, Y', strtotime($comment->created_at)) }}
            </span>
          </div>
          <p class="mb-0">
            {{ $comment->body }}
          </p>
        </div>
      @endif
    @empty
    <div class="col-auto text-center">
      <p class="h2 sorry">Let's add your commnet!</p>
    </div>
    @endforelse
  </div>
  {{ $all_comments->links() }}
</div>