<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel')</title>
    <!-- AdminLTE CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- FontAwesome CDN (optional, untuk ikon) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/all.min.css">
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <span class="brand-text font-weight-light">AdminLTE</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.bookings') }}" class="nav-link {{ request()->routeIs('admin.bookings') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>Bookings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.rooms') }}" class="nav-link {{ request()->routeIs('admin.rooms') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-bed"></i>
                            <p>Rooms</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.payments') }}" class="nav-link {{ request()->routeIs('admin.payments') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-credit-card"></i>
                            <p>Payments</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.availability') }}" class="nav-link {{ request()->routeIs('admin.availability') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-day"></i>
                            <p>Availability</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content pt-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <strong>Copyright &copy; {{ date('Y') }} <a href="#">Your Company</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
<!-- AdminLTE JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<!-- FontAwesome JS (optional, jika butuh) -->
<script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/js/all.min.js"></script>
@stack('scripts')
</body>
</html> 