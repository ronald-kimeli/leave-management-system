           <div id="layoutSidenav_nav">
               <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                   <div class="sb-sidenav-menu">
                       <div class="nav">
                           <div class="sb-sidenav-menu-heading">Core</div>
                           <a class="nav-link" href="{{ url('admin/dashboard')}}">
                               <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Dashboard
                           </a>

                           <div class="sb-sidenav-menu-heading">Interface</div>
                           <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayout" aria-controls="collapseLayout">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayout" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ url('admin/add_category')}}">Add Category</a>
                                    <a class="nav-link" href="{{ url('admin/category')}}">View Category</a>
                                    </nav>
                            </div> -->
                           <!-- end -->

                           <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                               <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Leave Type
                               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                           </a>
                           <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                               <nav class="sb-sidenav-menu-nested nav">
                                   <a class="nav-link" href="{{ url('admin/add_leavetype')}}">Add Leave Type</a>
                                   <a class="nav-link" href="{{ url('admin/leavetype')}}">View Leave Type</a>
                               </nav>
                           </div>
                           <!-- end -->

                           <!-- start of apply leave -->
                           <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapseLayouts">
                               <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Applied Leave
                               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                           </a>
                           <div class="collapse" id="collapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                               <nav class="sb-sidenav-menu-nested nav">
                                   <a class="nav-link" href="{{ url('admin/applyleave')}}">View Leaves</a>
                                   <a class="nav-link" href="{{ url('admin/add/applyleave')}}">Apply Leave</a>
                               </nav>
                           </div>

                           <!-- end -->

                           <!-- Department -->
                           <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#departments" aria-expanded="false" aria-controls="collapseLayouts">
                               <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Departments
                               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                           </a>
                           <div class="collapse" id="departments" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                               <nav class="sb-sidenav-menu-nested nav">
                                   <a class="nav-link" href="{{ url('departments')}}">View Departments</a>
                                   <a class="nav-link" href="{{ url('add/department')}}">Add Department</a>
                               </nav>
                           </div>
                           <!-- end department -->

                           <!-- users -->
                           <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#users" aria-expanded="false" aria-controls="collapseLayouts">
                               <div class="sb-nav-link-icon"><i class="fa fa-user fa-fw"></i></div>
                               Users
                               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                           </a>
                           <div class="collapse" id="users" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                               <nav class="sb-sidenav-menu-nested nav">
                                   <a class="nav-link" href="{{ url('admin/users')}}">View Users</a>
                                   <a class="nav-link" href="{{ url('admin/add/user')}}">Add User</a>
                               </nav>
                           </div>
                           <!--  -->
                       </div>
                   </div>
                   <div class="sb-sidenav-footer">
                       <div class="small">Logged in as:</div>

                       {{ Auth::user()->name.' '.Auth::user()->last_name }}
                   </div>
               </nav>
           </div>