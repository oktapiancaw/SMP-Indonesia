
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ auth()->user()->level == 1 ? route('admin.home') : route('home') }}">
        <div class="sidebar-brand-icon">
          <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SMP Indonesia</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ auth()->user()->level == 1 ? route('admin.home') : route('home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data User
      </div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <p class="nav-link">
          <span>
            Username : {{ auth()->user()->username }}
          </span>
          <br>
          <span>
            Login sebagai : {{ auth()->user()->level == 1 ? 'Guru' : 'Siswa' }}
          </span>
        </p>
      </li>
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Manage Data
      </div>

      <!-- Nav Item - Utilities Collapse Menu -->

      {{-- Menu ini ditampilkan ketika yang login itu guru --}}
      @if (auth()->user()->level == 1)
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Main Data</h6>
              <a class="collapse-item" href="{{ route('guru.index') }}">Guru</a>
              <a class="collapse-item" href="{{ route('kelas.index') }}">Kelas</a>
              <a class="collapse-item" href="{{ route('mapel.index') }}">Mapel</a>
              <a class="collapse-item" href="{{ route('siswa.index') }}">Siswa</a>
              <a class="collapse-item" href="{{ route('nilai.index') }}">Nilai</a>
            </div>
          </div>
        </li>
      @else
      <!-- Nav Item - Charts -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Nilai</span></a>
      </li>
      @endif

      {{-- <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item active">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> --}}

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>