<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ site_name() }} | @yield('title', 'Dashboard')</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Dropzone -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <!-- Style CSS -->
     <link rel="stylesheet" href="{{ asset('admin/dist/css/style.css') }}">
     @yield('CSS')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('admin/dist/img/logo.png') }}" alt="Universal Admin" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('admin') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <!-- Messages -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <div class="media">
                            <img src="{{ auth()->user()->profile_image ? url('storage/assets/images/profile/'.auth()->user()->profile_image) : asset('admin/dist/img/placeholder.jpg') }}" class="profile-user-img img-fluid img-circle w-100 h-100 profile-user-img-round" src="{{ auth()->user()->profile_image ? url('storage/assets/images/profile/'.auth()->user()->profile_image) : asset('admin/dist/img/placeholder.jpg') }}" alt="User profile picture">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>

            <!-- Notifications -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#"><i class="far fa-bell"></i><span class="badge badge-warning navbar-badge">15</span></a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="fas fa-envelope mr-2"></i> 4 new messages<span class="float-right text-muted text-sm">3 mins</span></a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ auth()->user()->profile_image ? url('storage/assets/images/profile/'.auth()->user()->profile_image) : asset('admin/dist/img/placeholder.jpg') }}" class="user-image img-circle elevation-2 profile-user-img-round" alt="{{ trim(auth()->user()->first_name . ' ' . (auth()->user()->middle_name ? auth()->user()->middle_name . ' ' : '') . auth()->user()->last_name) }}">
                    <span class="d-none d-md-inline">{{ trim(auth()->user()->first_name . ' ' . (auth()->user()->middle_name ? auth()->user()->middle_name . ' ' : '') . auth()->user()->last_name) }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="{{ auth()->user()->profile_image ? url('storage/assets/images/profile/'.auth()->user()->profile_image) : asset('admin/dist/img/placeholder.jpg') }}" class="img-circle elevation-2 profile-user-img-round" alt="{{ trim(auth()->user()->first_name . ' ' . (auth()->user()->middle_name ? auth()->user()->middle_name . ' ' : '') . auth()->user()->last_name) }}">
                        <p>
                            {{ trim(auth()->user()->first_name . ' ' . (auth()->user()->middle_name ? auth()->user()->middle_name . ' ' : '') . auth()->user()->last_name) }}
                            <small>Member since {{ auth()->user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>

                    <!-- Menu Body -->
                    <li class="user-body">
                        <div class="row">
                            <div class="col-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </div>
                    </li>

                    <!-- Menu Footer -->
                    <li class="user-footer">
                        <a href="{{ url('admin/profile') }}" class="btn btn-default btn-flat">Profile</a>
                        <a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat float-right"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sign out
                        </a>
                        <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a class="nav-link" data-widget="fullscreen" href="#" role="button"><i class="fas fa-expand-arrows-alt"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a></li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('admin') }}" class="brand-link">
            <img src="{{ asset('admin/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity:.8">
            <span class="brand-text font-weight-light">{{ site_name() }}</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ auth()->user()->profile_image ? url('storage/assets/images/profile/'.auth()->user()->profile_image) : asset('admin/dist/img/placeholder.jpg') }}" class="img-circle elevation-2 sidebar-user-logo profile-user-img-round" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ trim(auth()->user()->first_name . ' ' . (auth()->user()->middle_name ? auth()->user()->middle_name . ' ' : '') . auth()->user()->last_name) }}</a>
                </div>
            </div>

            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar"><i class="fas fa-search fa-fw"></i></button>
                    </div>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    
                    @foreach(menu_items() as $menu)
                        @php
                            $children = menu_items(null, $menu->id);
                            $hasChildren = $children->isNotEmpty();
                        @endphp

                        <li class="nav-item {{ $hasChildren ? 'menu-open' : '' }}">
                            <a href="{{ $hasChildren ? '#' : url('admin/'.$menu->slug) }}" class="nav-link {{ $active_page ==  $menu->menu_key? 'active': ''}}">
                                <i class="nav-icon {{ $menu->icon ?? 'fas fa-circle' }}"></i>
                                <p>
                                    {{ $menu->menu_name }}
                                    @if($hasChildren)
                                        <i class="right fas fa-angle-left"></i>
                                    @endif
                                </p>
                            </a>

                            @if($hasChildren)
                                <ul class="nav nav-treeview">
                                    @foreach($children as $child)
                                        <li class="nav-item">
                                            <a href="{{ url('admin/'.$child->slug) }}" class="nav-link">
                                                <i class="{{ $child->icon ?? 'far fa-circle' }} nav-icon"></i>
                                                <p>{{ $child->menu_name }}</p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach

                </ul>
            </nav>
        </div>
    </aside>

    @yield('content')

    <!-- Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('/') }}">{{ site_name() }}</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block"><b>Version</b> 3.2.0</div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- Scripts -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script> -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('admin/plugins/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('admin/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/common.js') }}"></script>
<!-- <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script> -->
<script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

@yield('JS')
</body>
</html>