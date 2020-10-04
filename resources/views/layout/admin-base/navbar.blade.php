<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
    </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
    </li> --}}
    <!-- User Dropdown Menu -->
    <li class="dropdown user user-menu">
        <a href="#" class="nav-link" data-toggle="dropdown">
        <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" class="user-image" alt="User Image">
        <span class="hidden-xs">{{ session()->get('nama') }}</span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" class="img-circle" alt="User Image">
                <p>
                {{ session()->get('nama') }}
                <small>Member since #</small>
                </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="float-left">
                    <a href="{{ url('/profile', session()->get('id')) }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="float-right">
                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="lnr lnr-exit"></i> <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link elevation-4">
    <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
        </li>
        @if ( session()->get('level') == 1 )
        <li class="nav-item has-treeview {{ request()->is('#')  ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                Master
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('#') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Team</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('#') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon text-warning"></i>
                    <p>Customer</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('#') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Category</p>
                </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{ request()->is('#') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                Projects
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('#') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>New Projects</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('#') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon text-warning"></i>
                    <p>Project On Designer</p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('#') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon text-info"></i>
                        <p>Project On Review</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('#') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon text-success"></i>
                        <p>Project Completed</p>
                    </a>
                </li>
            </ul>
        </li>
        @endif
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
