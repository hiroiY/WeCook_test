@vite(['resources/sass/comments/answer_modal.scss'])
<div 
  class="modal fade answerEdit" 
  id="answerEdit-{{ $question->answer($question->id)->id }}" 
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
        <p class="modal-title h3 fw-medium" id="exampleModalLabel"> Edit Your Answer </p>
        <button 
          type="button" 
          class="btn-close" 
          data-bs-dismiss="modal" 
          aria-label="Close"
          id="btn-close"
        >
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
      
      <!-- the answer body -->
      <div class="modal-body pb-0">
        <form 
          action="{{ route('update.answer', $question->answer($question->id)->id) }}" 
          method="post"
          class="edit-form"
        >

          <p class="current-answer">
            <b>Current</b>
            <i class="fa-solid fa-a"  style="color: #e45900;"></i>
            <br>
            &ensp; {{ $question->answer($question->id)->body }}
          </p>
          @csrf
          @method('PATCH')
          <input 
            type="text" 
            name="body" 
            class="form-control save-answer bootstrap-maxlength data-autofocus mt-2"
            value="{{ old('body',$question->answer($question->id)->body) }}"
            minlength="1"
            required
          >
          <div class="error-message mt-2">
          Please enter between 1 and 300 characters!
          </div>

          <!-- The Cancel editing button -->
          <div 
            class="d-flex justify-content-end mt-4 me-0"
          >
            <button 
              type="button" 
              class="btn-cancel px-5 py-1" 
              data-bs-dismiss="modal"
            >
              Cansel
            </button>

            <!-- The Save answers bitton -->
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
</div>

  