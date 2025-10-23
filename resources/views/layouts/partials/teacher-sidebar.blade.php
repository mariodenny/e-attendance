<ul class="navbar-nav">
    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('teacher.dashboard') ? 'active' : '' }}"
            href="{{ route('teacher.dashboard') }}">
            <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
        </a>
    </li>

    <!-- My Classes -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('teacher.classes*') ? 'active' : '' }}"
            href="">
            <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-hat-3 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">My Classes</span>
        </a>
    </li>

    <!-- Attendance -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('teacher.attendance*') ? 'active' : '' }}"
            href="">
            <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-check-bold text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Attendance</span>
        </a>
    </li>

    <!-- Lesson Materials -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('teacher.lessons*') ? 'active' : '' }}"
            href="">
            <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-books text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Lesson Materials</span>
        </a>
    </li>

    <!-- Student Progress -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('teacher.progress*') ? 'active' : '' }}"
            href="">
            <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-chart-bar-32 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Student Progress</span>
        </a>
    </li>

    <!-- Reports -->
    <li class="nav-item mt-3">
        <h6 class="ps-4 text-uppercase text-xs font-weight-bolder opacity-6">Reports</h6>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('teacher.reports*') ? 'active' : '' }}"
            href="">
            <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-copy-04 text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Class Reports</span>
        </a>
    </li>
</ul>
