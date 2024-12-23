<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ url('admin/dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed {{ request()->is('admin/add/leavetype') || request()->is('admin/leavetype') ? 'active' : '' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Leave Type
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->is('admin/add/leavetype') || request()->is('admin/leavetype') ? 'show' : '' }}"
                    id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('admin/add/leavetype') ? 'active' : '' }}"
                            href="{{ url('admin/add/leavetype')}}">Add Leave Type</a>
                        <a class="nav-link {{ request()->is('admin/leavetype') ? 'active' : '' }}"
                            href="{{ url('admin/leavetype')}}">View Leave Type</a>
                    </nav>
                </div>

                <a class="nav-link collapsed {{ request()->is('admin/applyleave') || request()->is('admin/add/applyleave') ? 'active' : '' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Applied Leave
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->is('admin/applyleave') || request()->is('admin/add/applyleave') ? 'show' : '' }}"
                    id="collapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('admin/applyleave') ? 'active' : '' }}"
                            href="{{ url('admin/applyleave')}}">View Leaves</a>
                        <a class="nav-link {{ request()->is('admin/add/applyleave') ? 'active' : '' }}"
                            href="{{ url('admin/add/applyleave')}}">Apply Leave</a>
                    </nav>
                </div>
                <a class="nav-link collapsed {{ request()->is('admin/departments') || request()->is('admin/add/department') ? 'active' : '' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#departments" aria-expanded="false"
                    aria-controls="departments">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Departments
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->is('admin/departments') || request()->is('admin/add/department') ? 'show' : '' }}"
                    id="departments" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('admin/departments') ? 'active' : '' }}"
                            href="{{ url('admin/departments')}}">View Departments</a>
                        <a class="nav-link {{ request()->is('admin/add/department') ? 'active' : '' }}"
                            href="{{ url('admin/add/department')}}">Add Department</a>
                    </nav>
                </div>

                <a class="nav-link collapsed {{ request()->is('admin/users') || request()->is('admin/add/user') ? 'active' : '' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#users" aria-expanded="false"
                    aria-controls="users">
                    <div class="sb-nav-link-icon"><i class="fa fa-user fa-fw"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->is('admin/users') || request()->is('admin/add/user') ? 'show' : '' }}"
                    id="users" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}"
                            href="{{ url('admin/users')}}">View Users</a>
                        <a class="nav-link {{ request()->is('admin/add/user') ? 'active' : '' }}"
                            href="{{ url('admin/add/user')}}">Add User</a>
                    </nav>
                </div>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name . ' ' . Auth::user()->last_name }}
        </div>
    </nav>
</div>