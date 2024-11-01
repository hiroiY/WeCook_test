<<<<<<< HEAD
@vite(['resources/sass/logout.scss'])

<div class="modal fade" id="logout-form" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content logout-dialog">
      <div class="modal-body logout-modal-style">
        <p class="mb-5 display-4 logout-ttl"><i class="fa-solid fa-chevron-left fa-xs logout-ttl"></i>Log out</p>
            <form action="" method="post">
              @csrf

              {{-- Log out message --}}
              <div class="row mb-3">
                <div class="col px-auto">
                  <p class="text-center fw-bold are-you-sure">Are you sure you want to log out?</p>
                </div>
              </div>
              
              {{-- Logout button --}}
              <div class="row mb-4 justify-content-center">
                <div class="col-10">
                  <button id="logout-btn" type="submit" class="btn w-100">Log out</button>
                </div>
              </div>
              
            </form>
      </div>
    </div>
  </div>
</div>
=======
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  -->
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
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
