@vite(['resources/sass/status.scss'])

<<<<<<< HEAD
{{-- Delete recipe modal--}}
<div class="modal fade" id="delete-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-color">
                    Are you sure to delete <br> <span class="account-name">Omelette with green onion </span>?
                </h2>
            </div>
            <div class="modal-body">
                <p>The comments that were added to this recipe will be deleted too!</p>
            </div>
            <div class="modal-footer">
                <form action="#" method="post">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-delete">Delete</button>    
                </form>
            </div>
        </div>
    </div>
</div>
=======
    {{-- Delete recipe modal --}}
    <div 
    class="modal fade modal-lg" 
    id="delete-post" 
    tabindex="-1" 
    aria-labelledby="logoutModalLabel" 
    aria-hidden="true" 
    data-bs-backdrop="static"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-color">
                        Are you sure to delete <br> <span class="account-name">{{ $post->title }}</span>?
                    </h2>
                </div>
                <div class="modal-body">
                    <p>The comments that were added to this recipe will be deleted too!</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <div class="row">
                        <div class="col-6">
                            <button 
                            type="button" class="btn btn-cancel mx-2 w-100" 
                            data-bs-dismiss="modal"
                            >
                                Cancel
                            </button>
                        </div>
                        <div class="col-6">
                            <form 
                            action="{{ route('deleteMyRecipe', ['id' => $post->id]) }}" 
                            method="post" class="d-flex justify-content-center"
                            >
                                @csrf
                                @method('DELETE')
                                <button 
                                type="submit" 
                                class="btn btn-delete px-5">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
