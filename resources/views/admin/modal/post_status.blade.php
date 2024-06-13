@vite(['resources/sass/status.scss'])

{{-- re-publish modal--}}
<div class="modal fade" id="activate-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-color">
                    Do you want to re-publish <br>this <span class="account-name">post</span>?
                </h2>
            </div>
            <div class="modal-body">
                <p>This post can be searchable again!</p>
            </div>
            <div class="modal-footer">
                <form action="#" method="post">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-activate">Activate</button>    
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete modal--}}
<div class="modal fade" id="delete-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-color">
                    Are you sure to soft delete <br>this <span class="account-name">post</span>?
                </h2>
            </div>
            <div class="modal-body">
                <p>This post will be removed from all users favorite recipes too!</p>
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
