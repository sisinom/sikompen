<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('/') }}/image/polinema-bw.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/profile')}}" class="d-block">Sikompen</a>
        </div>
      </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                    <i class="nav-icon fa-solid fa-house-chimney"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/kompetensi') }}" class="nav-link {{ $activeMenu == 'kompetensi' ? 'active' : '' }} ">
                    <i class="nav-icon fa-solid fa-list-check"></i>
                    <p>Daftar Kompetensi</p>
                </a>
            </li>
            <li class="nav-item {{ ($activeMenu == 'kompen_dibuka' || $activeMenu == 'kompen_selesai' || $activeMenu == 'kompen_diajukan' || $activeMenu == 'kompen_ditolak' || $activeMenu == 'kompen_dilakukan') ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link {{ ($activeMenu == 'kompen_dibuka' || $activeMenu == 'kompen_selesai' || $activeMenu == 'kompen_diajukan' || $activeMenu == 'kompen_ditolak' || $activeMenu == 'kompen_dilakukan') ? 'active' : '' }} ">
                    <i class="nav-icon fa-solid fa-file-pen"></i>
                    <p>
                      Tugas Kompen
                      <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/kompen_dibuka') }}" class="nav-link {{ $activeMenu == 'kompen_dibuka' ? 'active' : '' }} ">
                            <i class="bi {{ $activeMenu == 'kompen_dibuka' ? 'bi-record-circle' : 'bi-circle' }} nav-icon nav-icon"></i>
                            <p>Kompen Dibuka</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/kompen_dilakukan') }}" class="nav-link {{ $activeMenu == 'kompen_dilakukan' ? 'active' : '' }} ">
                            <i class="bi {{ $activeMenu == 'kompen_dilakukan' ? 'bi-record-circle' : 'bi-circle' }} nav-icon"></i>
                            <p>Kompen Dilakukan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/kompen_selesai') }}" class="nav-link {{ $activeMenu == 'kompen_selesai' ? 'active' : '' }} ">
                            <i class="bi {{ $activeMenu == 'kompen_selesai' ? 'bi-record-circle' : 'bi-circle' }} nav-icon nav-icon"></i>
                            <p>Kompen Selesai</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>