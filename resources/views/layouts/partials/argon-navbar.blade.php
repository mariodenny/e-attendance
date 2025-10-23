<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('title', 'Dashboard')</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">@yield('title', 'Dashboard')</h6>
    </nav>
    
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <!-- Search bar bisa ditambah di sini -->
      </div>
      
      <ul class="navbar-nav justify-content-end">
        <!-- Notifications -->
        <li class="nav-item dropdown">
          <a class="nav-link text-body" href="javascript:;" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ni ni-bell-55 cursor-pointer"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
          </a>
          <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item border-radius-md" href="javascript:;">New student registered</a></li>
            <li><a class="dropdown-item border-radius-md" href="javascript:;">Classroom attendance pending</a></li>
            <li><a class="dropdown-item border-radius-md" href="javascript:;">New module assigned</a></li>
          </ul>
        </li>
        
        <!-- User Profile -->
        <li class="nav-item dropdown pe-2">
          <a href="javascript:;" class="nav-link text-body p-0" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-{{ 
                auth()->user()->role == 'SA' ? 'danger' : 
                (auth()->user()->role == 'ADMIN' ? 'warning' : 
                (auth()->user()->role == 'MANAGER' ? 'info' : 'success')) 
              }} text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-white text-sm opacity-10"></i>
              </div>
              <span class="d-sm-inline d-none">
                Hello, {{ auth()->user()->username }} 
                <small class="text-muted">({{ auth()->user()->role }})</small>
              </span>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUser">
            <li>
              <a class="dropdown-item border-radius-md" href="">
                <i class="ni ni-single-02 me-2"></i> My Profile
              </a>
            </li>
            <li>
              <a class="dropdown-item border-radius-md" href="javascript:;">
                <i class="ni ni-settings me-2"></i> Settings
              </a>
            </li>
            <li><hr class="horizontal dark my-2"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <a class="dropdown-item border-radius-md text-danger" href="javascript:;" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="ni ni-user-run me-2"></i> Logout
                </a>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>