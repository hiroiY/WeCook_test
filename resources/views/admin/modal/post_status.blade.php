@vite(['resources/sass/status.scss'])
<<<<<<< HEAD

{{-- re-publish modal--}}
<div class="modal fade" id="activate-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-color">
                    Do you want to re-publish <br>this <span class="account-name">post</span>?
=======
@if($post->trashed())
{{-- re-publish modal--}}
<div class="modal fade" id="activate-post-{{ $post->id }}">
    <div class="modal-dialog modal-dialog-centered custom-modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h2 class="modal-title text-color">
                    Do you want to re-publish <br>this recipe <span class="account-name">{{ $post->title }}</span> ?
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                </h2>
            </div>
            <div class="modal-body">
                <p>This post can be searchable again!</p>
            </div>
<<<<<<< HEAD
            <div class="modal-footer">
                <form action="#" method="post">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-activate">Activate</button>    
=======
            <div class="modal-footer justify-content-center border-0">
                <form action="{{ route('post.activate', ['id' => $post->id]) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="activate_btn_{{ $post->id }}" class="btn btn-activate">Re-publish</button>    
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                </form>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD

{{-- Delete modal--}}
<div class="modal fade" id="delete-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-color">
                    Are you sure to soft delete <br>this <span class="account-name">post</span>?
=======
@else
{{-- Delete modal--}}
<div class="modal fade" id="deactivate-post-{{ $post->id }}">
    <div class="modal-dialog modal-dialog-centered custom-modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h2 class="modal-title text-color">
                    Are you sure to soft delete <br>this recipe <span class="account-name">{{ $post->title }}</span>?
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                </h2>
            </div>
            <div class="modal-body">
                <p>This post will be removed from all users favorite recipes too!</p>
            </div>
<<<<<<< HEAD
            <div class="modal-footer">
                <form action="#" method="post">
=======
            <div class="modal-footer justify-content-center border-0">
                <form action="{{ route('post.deactivate', ['id' => $post->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-delete">Delete</button>    
                </form>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======
@endif
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
