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

        @role('teacher')
            <a class="nav-link " href="{{route('teacher.dashboard.index')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        @endrole

        @role('student')
        <a class="nav-link " href="{{route('student.dashboard.index')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        @endrole


      </li><!-- End Dashboard Nav -->

      @role('admin')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.teacher.index')}}">
            <i class="bi bi-people-fill"></i>
            <span>Teacher</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.student.index')}}">
            <i class="bi bi-person"></i>
            <span>Student</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.section.index')}}">
            <i class="bi bi-building-fill-gear"></i>
            <span>Section</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.year-level.index')}}">
            <i class="bi bi-water"></i>
            <span>Year Level</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.subject.index')}}">
            <i class="bi bi-book"></i>
            <span>Subject</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.teacher-subject.index')}}">
            <i class="bi bi-book"></i>
            <span>Teacher Subject</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.report.index')}}">
            <i class="bi bi-trophy"></i>
            <span>Reports</span>
            </a>
        </li>
      @endrole
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-file"></i>
          <span>Report</span>
        </a>
      </li> --}}
    </ul>

  </aside><!-- End Sidebar-->
