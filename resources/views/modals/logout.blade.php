@vite(['resources/sass/logout.scss'])

<div id="logoutModal" class="modal fade" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
              <p class="logout-text">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><</button>
                Log Out
              </p>
            </div>
            <div class="modal-body text-center">
                <p>Are you sure you wanna log out?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning text-white">Log out</button>
                </form>
            </div>
        </div>
    </div>
</div>