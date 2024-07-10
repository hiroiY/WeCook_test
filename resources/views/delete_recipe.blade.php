@vite(['resources/sass/status.scss'])

@if(isset($recipe))
    {{-- Delete recipe modal --}}
    <div class="modal fade" id="delete-recipe">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-color">
                        Are you sure to delete <br> <span class="account-name">{{ $recipe->title }}</span>?
                    </h2>
                </div>
                <div class="modal-body">
                    <p>The comments that were added to this recipe will be deleted too!</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('recipe.delete', ['id' => $recipe->id]) }}" method="post" class="d-flex justify-content-center">
                        @csrf
                        <button type="button" class="btn btn-cancel mx-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-delete mx-2">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <p>Recipe not found.</p>
@endif