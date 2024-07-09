<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{ url('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SPK-TOPSIS-BEASISWA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="{{'/dashboard'}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kriteria.index') }}" class="nav-link">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                Kriteria & Bobot
              </p>
            </a>
          </li>
          <li class="nav-item">
          {{-- <a href="{{url('subkriterias')}}" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Criteria Rating
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
          <a href="{{ route('alternatif.index') }}" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Alternatif
              </p>
            </a>
          </li>
          <li class="nav-header">Result</li>
          
          <li class="nav-item">
          <a href="{{ route('topsis.index') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Hasil Perhitungan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="{{ url('/login') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p>
                Logout
                <i class="right fas fa-angle"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
