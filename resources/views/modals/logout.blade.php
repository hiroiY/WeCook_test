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
