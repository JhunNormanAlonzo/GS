  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('admin.dashboard.index')}}" class="logo d-flex align-items-center">
        <img src="{{asset('NiceAdmin/assets/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block">Cashier Report</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        @role('admin')
        <li class="nav-item dropdown" id="admin_notification">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number" id="admin_notif_badge_number"></span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" >
            <li class="dropdown-header">
              You have <span id="admin_notif_number"></span> new notifications
              <small href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Pendings</span></small>
            </li><div id="admin_list_notif"></div><li>
              <hr class="dropdown-divider">
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li>
        @endrole


        @role('branch-head')
        <li class="nav-item dropdown" id="admin_notification">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number" id="branch_head_notif_badge_number"></span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" >
            <li class="dropdown-header">
              You have <span id="branch_head_notif_number"></span> new notifications
              <small href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Requests</span></small>
            </li><div id="branch_head_list_notif"></div><li>
              <hr class="dropdown-divider">
            </li>
          </ul><!-- End Notification Dropdown Items -->

        </li>
        @endrole


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('NiceAdmin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            @php
                $nameParts = explode(" ", auth()->user()->name);
            @endphp
            <span class="d-none d-md-block dropdown-toggle ps-2">{{end($nameParts)}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{auth()->user()->name}}</h6>
              <span>{{auth()->user()->getRoleNames()->first()}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
