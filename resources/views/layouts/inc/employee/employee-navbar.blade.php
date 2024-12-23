<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="employee/dashboard">Employee</a>

    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>

    <!-- Navbar Links-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                @if(Auth::user()->profile_picture)
                    <img src="{{ asset('profile_pictures/' . Auth::user()->profile_picture) }}" 
                         class="rounded-circle me-2" 
                         style="width: 35px; height: 35px; object-fit: cover;" 
                         alt="Profile Picture">
                @else
                    <img src="{{ asset('views/assets/img/avatar.png') }}" 
                         class="rounded-circle me-2" 
                         style="width: 35px; height: 35px; object-fit: cover;" 
                         alt="Default Avatar">
                @endif

                @if(Auth::user()->name && Auth::user()->last_name)
                    <span class="d-none d-lg-inline">{{ Auth::user()->name . ' ' . Auth::user()->last_name }}</span>
                @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>

    <!-- Dark Mode Toggle -->
    <button id="darkModeToggle" class="btn btn-outline-light ms-2 me-3" title="Toggle Dark Mode">
        <i class="bi bi-moon"></i>
    </button>
</nav>
