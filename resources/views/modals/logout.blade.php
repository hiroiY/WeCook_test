@vite(['resources/sass/logout.scss'])

<div id="logoutModal" class="modal fade " tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <p class="logout-text">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-chevron-left fa-xs"></i></button>
                Log Out
            </p>
            </div>
            <div class="modal-body text-center">
                <p class="logout">Are you sure you wanna log out?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col px-auto">
                            <button type="submit" class="btn text-white w-100 logout-button">Log out</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>