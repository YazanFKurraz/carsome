<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @if(Auth::user()->hasPermission('read-users'))
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Manage
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.users')}}" class="nav-link active">
                                <i class="fa fa-users"></i>
                                <p>Manage User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.permissions')}}" class="nav-link active">
                                <i class="fa fa-bars"></i>
                                <p>Manage Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.roles')}}" class="nav-link active">
                                <i class="fa fa-bars"></i>
                                <p>Manage Roles</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-info"></i>
                    <p>
                        Informaion Basic
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.brands')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Brand</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.models')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Car Model</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-car"></i>

                    <p>
                        Car
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.cars')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Car General</p>
                        </a>
                    </li>
                </ul>
            </li>
            @if(auth()->user()->hasRole(['superadministrator','administrator']))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Use Order
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.users.order')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Order</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-envelope"></i>

                    <p>
                        Contact User
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.users.contact')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View message</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
