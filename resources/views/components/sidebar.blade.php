  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        @role('admin')
        <a class="nav-link " href="{{route('admin.dashboard.index')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
        @endrole

        @role('branch-head')
        <a class="nav-link " href="{{route('branch-head.dashboard.index')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
        @endrole
      </li><!-- End Dashboard Nav -->

      @role('admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.branch.index')}}">
          <i class="bi bi-building-fill-gear"></i>
          <span>Branches</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.branch-head.index')}}">
          <i class="bi bi-person"></i>
          <span>Branch Head</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.collection.index')}}">
          <i class="bi bi-archive  "></i>
          <span>Collection Report</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.modify.index')}}">
          <i class="bi bi-clock "></i>
          <span>Change Logs</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.config.index')}}">
          <i class="bi bi-command "></i>
          <span>Configuration</span>
        </a>
      </li>
      @endrole

      @role('branch-head')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('branch-head.collection.index')}}">
          <i class="bi bi-piggy-bank"></i>
          <span>Collect</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('branch-head.cashier.index')}}">
          <i class="bi bi-cash"></i>
          <span>Cashier</span>
        </a>
      </li>
      @endrole
    </ul>

  </aside><!-- End Sidebar-->
