<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('adminImages/satistic.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-header">Dashboard</li>
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link {{navBarClass('dashboard','active')}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Gérer les formations</li>
                <li class="nav-item">
                    <a href="/admin/formation" class="nav-link {{navBarClass('formation','active')}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Formations
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/program" class="nav-link {{navBarClass('program','active')}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Programs
                            <span class="right badge badge-info">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/debouche" class="nav-link {{navBarClass('debouche','active')}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Débouchés
                            <span class="right badge badge-success">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/commentaire" class="nav-link {{navBarClass('comment','active')}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            commentaires
                            <span class="right badge badge-warning">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-header">Gérer les étudients</li>
                <li class="nav-item">
                    <a href="/admin/student" class="nav-link {{navBarClass('student','active')}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Etudients
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-header">Gérer les Affiliations</li>
                <li class="nav-item">
                    <a href="/admin/affiliat" class="nav-link {{navBarClass('affiliat','active')}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Affiliat
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
