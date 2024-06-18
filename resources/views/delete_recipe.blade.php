@vite(['resources/sass/status.scss'])

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
