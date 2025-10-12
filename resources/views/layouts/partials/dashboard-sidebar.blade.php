<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ route('home') }}">
      <img src="https://static.wixstatic.com/media/5cdcb6_27068c396c004557843309312de91a83~mv2.png/v1/crop/x_0,y_0,w_934,h_423/fill/w_934,h_423,al_c,q_90,enc_avif,quality_auto/5cdcb6_27068c396c004557843309312de91a83~mv2.png" 
           class="navbar-brand-img h-100" alt="KodingNext Medan">
      <span class="ms-1 font-weight-bold">KodingNext</span>
    </a>
  </div>
  
  <hr class="horizontal dark mt-0">
  
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <!-- User Info -->
    <div class="navbar-nav mb-3">
      <div class="nav-item border-radius-md p-2 bg-gray-100">
        <div class="d-flex align-items-center">
          <div class="icon icon-shape icon-sm bg-gradient-{{ 
            auth()->user()->role == 'SA' ? 'danger' : 
            (auth()->user()->role == 'ADMIN' ? 'warning' : 
            (auth()->user()->role == 'MANAGER' ? 'info' : 'success')) 
          }} shadow text-center border-radius-lg me-2">
            <i class="ni ni-single-02 text-white text-sm opacity-10"></i>
          </div>
          <div class="d-flex flex-column">
            <span class="text-sm font-weight-bold">{{ auth()->user()->username }}</span>
            <span class="text-xs text-secondary">{{ auth()->user()->role }}</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Include Role-specific Sidebar -->
    @includeWhen(auth()->user()->role === 'TEACHER', 'layouts.partials.teacher-sidebar')
    @includeWhen(auth()->user()->role === 'MANAGER', 'layouts.partials.manager-sidebar')
    @includeWhen(auth()->user()->role === 'SA', 'layouts.partials.sa-sidebar')
    @includeWhen(auth()->user()->role === 'ADMIN', 'layouts.partials.admin-sidebar')
  </div>
</aside>