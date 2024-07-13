@vite(['resources/sass/status.scss'])

    {{-- Delete recipe modal --}}
    <div class="modal fade" id="delete-post" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-color">
                        Are you sure you wanna delete <br> <span class="account-name">{{ $post->title }}</span>?
                    </h2>
                </div>
                <div class="modal-body">
                    <p>The comments that were added to this recipe will be deleted too!</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-cancel mx-2" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('deleteMyRecipe', ['id' => $post->id]) }}" method="post" class="d-flex justify-content-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete mx-2">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>