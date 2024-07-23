@vite(['resources\sass\comments\comment_modal.scss'])
<div 
  class="modal fade" 
  id="commentEdit" 
  data-bs-backdrop="static" 
  data-bs-keyboard="false" 
  tabindex="-1" 
  aria-labelledby="staticBackdropLabel" 
  aria-hidden="true"
>
  <div 
    class="modal-dialog modal-dialog-centered modal-xl"
  >
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header">
        <p class="modal-title h3 fw-medium" id="exampleModalLabel"> Edit Your Comment </p>
        <button 
          type="button" 
          class="btn-close" 
          data-bs-dismiss="modal" 
          aria-label="Close"
          id="btn-close"
        >
          <i class="fa-solid fa-xmark"></i>
        </button>
         <!-- the comment body -->
      </div>
      
      <div class="modal-body pb-0">
        <form 
          action="{{ route('update.comment', $comment->id) }}" 
          method="post"
          class="edit-form"
        >

        <p class="current-comment">
          <b>Current</b>
          <i class="fa-regular fa-comment-dots"
          style="color: #e45900;"></i>
          <br>
          &ensp; {{ $comment->body }}
        </p>
          @csrf
          @method('PATCH')
          <input 
            type="text" 
            name="body" 
            class="form-control save-comment bootstrap-maxlength data-autofocus"
            value="{{ old('body',$comment->body) }}"
            minlength="1"
            required
          >
          <div class="error-message mt-2">
          Please enter between 1 and 300 characters!
          </div>

          <!-- The Cancel editing button -->
          <div 
            class="d-flex justify-content-end mt-3 me-0"
          >
            <button 
              type="button" 
              class="btn-cancel px-5 py-1" 
              data-bs-dismiss="modal"
            >
              Cansel
            </button>

            <!-- The Save comments bitton -->
            <button 
              type="submit" 
              class="save-btn ms-4 px-5 py-1"
            >
              Save
            </button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.js"></script>
  <script src="bootstrap-maxlength.js"></script>
</div>

  