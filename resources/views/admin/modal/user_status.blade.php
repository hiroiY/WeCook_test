
{{-- <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous"
>
<link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
> --}}

{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}

@vite(['resources/sass/status.scss'])

{{-- Reactivate modal--}}
<div class="modal fade" id="activate-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-color">
                    Do you want to re-activate <br>this <span class="account-name">account</span>?
                </h2>
            </div>
            <div class="modal-body">
                <p>All the posts that posted by this user will be published again!</p>
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
                    Are you sure to soft delete <br>this <span class="account-name">account</span>?
                </h2>
            </div>
            <div class="modal-body">
                <p>All the posts that posted by this user will be deleted too!</p>
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

{{-- @endsection --}}


