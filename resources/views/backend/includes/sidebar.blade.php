<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="image">

            <img src="{{ asset('uploads/users/' . auth()->user()->profile_picture) }}" class="img-circle elevation-2"
                alt="User Image">

        </div>

        <div class="info">
            <a href="{{ route('backend.profile.show', auth()->user()->id) }}"
                class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <!--Dashboard-->
            <li class="nav-item has-treeview">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>

            </li>

            <!--Basic Setup-->
            <li class="nav-item has-treeview">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>
                        Basic Setup
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <!--Job Category-->
                    <li class="nav-item">
                        <a href="{{ route('backend.category.index') }}" class="nav-link">

                            <i class="nav-icon fas fa-circle"></i>
                            <p>Job Category</p>
                        </a>
                    </li>

                    <!--Job Type-->
                    <li class="nav-item">
                        <a href="{{ route('backend.type.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>Job Type</p>
                        </a>
                    </li>

                    <!--Job Level-->
                    <li class="nav-item">
                        <a href="{{ route('backend.job_level.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>Job Level</p>
                        </a>
                    </li>


                    <!--Location-->
                    <li class="nav-item">
                        <a href="{{ route('backend.location.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>Location</p>
                        </a>
                    </li>


                    <!--Skill-->
                    <li class="nav-item">
                        <a href="{{ route('backend.skill.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>Skill</p>
                        </a>
                    </li>




                </ul>
            </li>

            <!--Admin-->

            <li class="nav-item has-treeview">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                        User Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <!--Job Category-->
                    <li class="nav-item">
                        <a href="{{ route('backend.user.index') }}" class="nav-link">

                            <i class="nav-icon fas fa-circle"></i>
                            <p>Users</p>
                        </a>
                    </li>

                    <!--Role-->
                    <li class="nav-item">
                        <a href="{{ route('backend.role.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>Role</p>
                        </a>
                    </li>

                    <!--Permission-->
                    <li class="nav-item">
                        <a href="{{ route('backend.permission.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>Permission</p>
                        </a>
                    </li>

                    <!--Modules-->
                    <li class="nav-item">
                        <a href="{{ route('backend.module.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>Modules</p>
                        </a>
                    </li>




                </ul>
            </li>



            <!--Employers Management-->
            <li class="nav-item has-treeview">
                <a href="{{ route('frontend.employer.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>
                        Employers Management
                    </p>
                </a>

            </li>

            <!--Jobseekers Management-->
            <li class="nav-item has-treeview">
                <a href="{{ route('frontend.jobseeker.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Jobseekers Management

                    </p>
                </a>

            </li>

            <!--Job Management-->
            <li class="nav-item has-treeview">
                <a href="{{ route('frontend.job.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-briefcase"></i>
                    <p>
                        Job Management

                    </p>
                </a>

            </li>





            <li class="nav-item has-treeview">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                    class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </li>







        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
