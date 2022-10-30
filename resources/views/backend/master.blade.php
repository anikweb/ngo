<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- csrf token  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @if(Route::is('generalSetting.index')) General Settings @elseif(Route::is('role.index')) Roles @elseif(Route::is('role.create')) Create Role @elseif(Route::is('role.edit')) Edit Role @elseif(Route::is('role.assign.users')) Assign User @elseif(Route::is('contact_and_basic_info.edit')) Edit Contact @elseif(Route::is('contact_and_basic_info.index')) Contact and basic info @elseif(Route::is('about-settings.index')) About Settings @elseif(Route::is('advisors-settings.index')) Advisors @elseif(Route::is('advisors-settings.create')) Create-Advisor @elseif(Route::is('advisors-settings.edit')) Edit-Advisor @elseif(Route::is('official-team.index')) Official Team @elseif(Route::is('official-team.create')) Create-Official Team @elseif(Route::is('official-team.edit')) Edit-Official Team @elseif(Route::is('sliders.index')) Sliders @elseif(Route::is('sliders.create')) Create-Slider @elseif(Route::is('sliders.show')) Details-Slider @elseif(Route::is('sliders.edit')) Edit-Slider @elseif(Route::is('projects.create')) Create-Project @elseif(Route::is('projects.index')) Create-Project @elseif(Route::is('projects.show')) {{ $project->title }}-Project @elseif(Route::is('projects.edit')) Edit-Project @elseif(Route::is('projects.multiple.image.create')) Multiple Images-Project @elseif(Route::is('events.create')) Create-Event @elseif(Route::is('events.index')) Events @elseif(Route::is('events.show')) {{ $event->title }}-Event @elseif(Route::is('events.edit')) Edit-Event @elseif(Route::is('image-gallery.index')) Image Gallery @elseif(Route::is('image-gallery.create')) Add-Image Gallery @elseif(Route::is('publications.create')) Create-Publication @elseif(Route::is('publications.edit')) Edit-Publication @elseif(Route::is('publications.index')) Publications @elseif(Route::is('publications.show')) Details-Publications @elseif(Route::is('volunteer.index')) Volunteers @elseif(Route::is('terms.create')) Create-Terms & Condition @elseif(Route::is('terms.edit')) Edit-Terms & Condition @elseif(Route::is('terms.index')) Terms & Condition @elseif (Route::is('privacy.create')) Create - Privacy & Policy @elseif (Route::is('privacy.edit')) Edit - Privacy & Policy @elseif (Route::is('privacy.index')) Privacy & Policy @elseif (Route::is('refund.create')) Create - Refund Policy @elseif (Route::is('refund.edit')) Edit -Refund Policy @elseif (Route::is('refund.index')) Refund Policy @endif @if(Route::is('dashboard')) @else | @endif Dashboard</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" type="image/x-icon">
    {{-- toastr css  --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    @yield('internal_css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" alt="{{ generalSettings()->site_title }}"  width="150">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
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
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" alt="{{ generalSettings()->site_title }}" class="brand-image img-circle">
      <span class="brand-text font-weight-light">{{ Str::limit(generalSettings()->site_title,'18', '..') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        @auth
          <a href="#" class="d-block">
              <p>{{ Auth::user()->name }}</p>
              <p>
                  @foreach (Auth::user()->roles() as $item)
                    <p>{{ $item }}</p>
                  @endforeach
              </p>
          </a>

        @endauth
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link @if(Route::is('dashboard')) active @endif ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- single  --}}
          <li class="nav-item">
            <a target="_blank" href="{{ route('frontend') }}" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                View Website
              </p>
            </a>
          </li>
          {{-- dropdown --}}
          @if (auth()->user()->can('contact and basic info'))
            <li class="nav-item">
                <a href="{{ route('contact_and_basic_info.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-phone"></i>
                    <p>
                        Contact & Basic Info
                    </p>
                </a>
            </li>
          @endif
        @can('media management')
            <li class="nav-item @if(Route::is('image-gallery.create')||Route::is('image-gallery.index')||Route::is('publications.create')||Route::is('publications.edit')||Route::is('publications.index')||Route::is('publications.show')) menu-open @endif">
                <a href="#" class="nav-link @if(Route::is('image-gallery.create')||Route::is('image-gallery.index')||Route::is('publications.create')||Route::is('publications.edit')||Route::is('publications.index')||Route::is('publications.show')) active @endif">
                    <i class="nav-icon fa fa-file-image" aria-hidden="true"></i>
                    <p>
                        Media
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('image-gallery.index') }}" class="nav-link @if(Route::is('image-gallery.create')||Route::is('image-gallery.index')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Image Gallery</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('publications.index') }}" class="nav-link @if(Route::is('publications.create')||Route::is('publications.edit')||Route::is('publications.index')||Route::is('publications.show')) active  @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Publications</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Press Releases</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        @can('slider management')
            <li class="nav-item">
                <a href="{{ route('sliders.index') }}" class="nav-link @if(Route::is('sliders.create')||Route::is('sliders.edit')||Route::is('sliders.index')||Route::is('sliders.show')) active @endif">
                    <i class="nav-icon fa fa-bars" aria-hidden="true"></i>
                    <p>
                        Sliders
                    </p>
                </a>
            </li>
        @endcan
        @can('project management')
            <li class="nav-item">
                <a href="{{ route('projects.index') }}" class="nav-link  @if(Route::is('projects.create')||Route::is('projects.index')||Route::is('projects.show')||Route::is('projects.editr')||Route::is('projects.multiple.image.create')) active @endif">
                    <i class="nav-icon fa fa-tasks" aria-hidden="true"></i>
                    <p>
                        Projects
                    </p>
                </a>
            </li>
        @endcan
        @can('event management')
            <li class="nav-item">
                <a href="{{ route('events.index') }}" class="nav-link @if(Route::is('events.create')||Route::is('events.edit')||Route::is('events.index')||Route::is('events.show')) active @endif">
                    <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                    <p>
                        Events
                    </p>
                </a>
            </li>
        @endcan
          @if (auth()->user()->can('team management'))
            <li class="nav-item @if(Route::is('advisors-settings.create')||Route::is('advisors-settings.edit')||Route::is('advisors-settings.index')||Route::is('official-team.create')||Route::is('official-team.edit')||Route::is('official-team.index')) menu-open @endif">
                <a href="#" class="nav-link @if(Route::is('advisors-settings.create')||Route::is('advisors-settings.edit')||Route::is('advisors-settings.index')||Route::is('official-team.create')||Route::is('official-team.edit')||Route::is('official-team.index')) active @endif">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Team
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('advisors-settings.index') }}" class="nav-link @if(Route::is('advisors-settings.create')||Route::is('advisors-settings.edit')||Route::is('advisors-settings.index')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Advisors</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('official-team.index') }}" class="nav-link @if(Route::is('official-team.create')||Route::is('official-team.edit')||Route::is('official-team.index')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Official</p>
                        </a>
                    </li>
                </ul>
            </li>
          @endif
        @if (auth()->user()->can('volunteers management'))
            <li class="nav-item">
                <a href="{{ route('volunteer.index') }}" class="nav-link @if(Route::is('volunteer.index')) active @endif">
                    <i class="nav-icon fa  fa-user-secret"></i>
                    <p>
                        Volunteers
                    </p>
                </a>
            </li>
        @endif
        @if (auth()->user()->can('general settings'))
            <li class="nav-item @if(Route::is('generalSetting.index')||Route::is('about-settings.index')||Route::is('terms.create')||Route::is('terms.edit')||Route::is('terms.index')||Route::is('privacy.create')||Route::is('privacy.edit')||Route::is('privacy.index')||Route::is('refund.create')||Route::is('refund.edit')||Route::is('refund.index')) menu-open @endif">
                <a href="#" class="nav-link @if(Route::is('generalSetting.index')||Route::is('about-settings.index')||Route::is('terms.create')||Route::is('terms.edit')||Route::is('terms.index')||Route::is('privacy.create')||Route::is('privacy.edit')||Route::is('privacy.index')||Route::is('refund.create')||Route::is('refund.edit')||Route::is('refund.index')) active @endif">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                    Settings
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('generalSetting.index') }}" class="nav-link @if(Route::is('generalSetting.index')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>General</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about-settings.index') }}" class="nav-link @if(Route::is('about-settings.index')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>About</p>
                        </a>
                    </li>
                    @can('terms and condition management')
                        <li class="nav-item">
                            <a href="{{ route('terms.index') }}" class="nav-link @if(Route::is('terms.create')||Route::is('terms.edit')||Route::is('terms.index')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Terms & Condition</p>
                            </a>
                        </li>
                    @endcan
                    @can('privacy & policy')
                        <li class="nav-item">
                            <a href="{{ route('privacy.index') }}" class="nav-link @if(Route::is('privacy.create')||Route::is('privacy.edit')||Route::is('privacy.index')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Privacy & Policy</p>
                            </a>
                        </li>
                    @endcan
                    @can('refund policy')
                        <li class="nav-item">
                            <a href="{{ route('refund.index') }}" class="nav-link @if(Route::is('refund.create')||Route::is('refund.edit')||Route::is('refund.index')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Refund Policy</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif
          {{-- Role Management  --}}
          @if (auth()->user()->can('role management'))
            <li class="nav-item @if(Route::is('role.index')||Route::is('role.create')||Route::is('role.edit')||Route::is('role.assign.users')) menu-open @endif">
            <a href="#" class="nav-link @if(Route::is('role.index')||Route::is('role.create')||Route::is('role.edit')||Route::is('role.assign.users')) active @endif">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                Role Management
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('role.create') }}" class="nav-link @if(Route::is('role.create')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Role</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link @if(Route::is('role.index')||Route::is('role.edit')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Roles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('role.assign.users') }}" class="nav-link @if(Route::is('role.assign.users')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Assign Users</p>
                    </a>
                </li>
            </ul>
            </li>
          @endif
          <li class="nav-item">
            <a href="" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2015- {{ date('y') }} <a href="https://muktirbondhon.org">Muktir Bondhon Foundation</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{--  <b>Version</b> 3.1.0  --}}
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script>
{{-- tostr --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{{-- ckeditor --}}
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


@yield('footer_js')
</body>
</html>
