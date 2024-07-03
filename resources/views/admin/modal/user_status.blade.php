@vite(['resources/sass/status.scss'])

@if($user->trashed())
{{-- Reactivate modal--}}
    <div class="modal fade" id="activate-user-{{ $user->id }}">
        <div class="modal-dialog modal-dialog-centered custom-modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h2 class="modal-title text-color">
                        Do you want to re-activate <br><span class="account-name">{{$user->name}}</span>'s account ?
                    </h2>
                </div>
                <div class="modal-body">
                    <p>All the posts that posted by this user will be published again!</p>
                </div>
                <div class="modal-footer justify-content-center border-0">
                    <form action="{{ route('activate', ['id' => $user->id]) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="activate_btn_{{ $user->id }}" class="btn btn-activate">Activate</button>    
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
{{-- Delete modal--}}
    <div class="modal fade" id="deactivate-user-{{ $user->id }}">
        <div class="modal-dialog modal-dialog-centered custom-modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h2 class="modal-title text-color">
                        Are you sure to soft delete <br><span class="account-name">{{$user->name}}</span>'s account ?
                    </h2>
                </div>
                <div class="modal-body">
                    <p>All the posts that posted by this user will be deleted too!</p>
                </div>
                <div class="modal-footer justify-content-center border-0">
                    <form action="{{ route('deactivate', ['id' => $user->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-delete">Delete</button>    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

