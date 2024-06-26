{{-- @vite(['resources/sass/logout.scss']) --}}

{{-- Log out modal --}}
<div class="modal fade in " id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content logout-dialog">
      <div class="modal-body logout-modal-style">
        <p class="mb-5 display-4 logout-ttl">
          <button type="button" class="close" data-dismiss="modal" id="cancel_btn">
            <i class="fa-solid fa-chevron-left fa-xs logout-ttl"></i>
          </button>Log out</p>
            {{-- <form id="modal-logout-form" action="{{ route('logout') }}" method="POST">
              @csrf --}}

              {{-- Log out message --}}
              <div class="row mb-3">
                <div class="col px-auto">
                  <p class="text-center fw-bold are-you-sure">Are you sure you want to log out?</p>
                </div>
              </div>
              
              {{-- Logout button --}}
              <div class="row mb-4 justify-content-center">
                <div class="col-10">
                  {{-- <button id="logout-btn" type="submit" class="btn w-100">Log out</button> --}}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button id="logout-btn" type="submit" class="btn w-100">Log out</button>
                  </form>
                </div>
              </div>
              
            {{-- </form> --}}
      </div>
    </div>
  </div>
</div>