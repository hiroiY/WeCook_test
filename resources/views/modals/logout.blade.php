
<div class="modal fade" id="logout-{{ Auth::user()->id }}" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Log out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="mb-5 display-4 logout-ttl"><i class="fa-solid fa-chevron-left fa-xs logout-ttl"></i>Log out</p>
            <form action="" method="post">
              @csrf
              
              {{-- Log out message --}}
              <div class="row mb-3">
                <div class="col px-auto">
                  <p class="text-center fw-bold are-you-new">Are you sure you want to log out?</p>
                </div>
              </div>
              
              {{-- Logout button --}}
              <div class="row mb-4 justify-content-center">
                <div class="col-10">
                  <button id="logout-btn" type="submit" class="btn w-100 logout-btn">Log out</button>
                </div>
              </div>
              
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
