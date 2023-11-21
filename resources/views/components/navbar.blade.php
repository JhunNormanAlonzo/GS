  <!-- ======= Header ======= -->
  @php
    use App\SysConf\Configuration;
    $sys = new Configuration('SYSTEM/system_config.json');
    $config = $sys->config;
    $conf_company_name = $config['system_config']['company_name'];
    $conf_logo = $config['system_config']['logo'];
    $conf_year = $config['system_config']['year'];
@endphp
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{asset('img/bnats_logo.png')}}" alt="">
        <span class="d-none d-lg-block">{{$conf_company_name}}</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        @role('admin')
        <li class="nav-item dropdown" id="admin_notification">

          {{-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number" id="admin_notif_badge_number"></span>
          </a><!-- End Notification Icon --> --}}

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
            <img src="{{asset('img/bnats_logo.png')}}" alt="Profile" class="rounded-circle">
            @php
                $whole_name = ucwords(Auth::user()->name);
                $words = explode(' ', $whole_name);
                $lastWord = end($words);
            @endphp
            <span class="d-none d-md-block dropdown-toggle ps-2">{{$lastWord}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{$whole_name}}</h6>
              <span>{{ucwords(Auth::user()->getRoleNames()->first())}}</span>
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
