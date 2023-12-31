<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>
                @if (auth()->check())
                    @php
                        $akses = auth()->user()->pegawai->departemen->nama;
                    @endphp
                    @if (auth()->user()->akses == 'admin')
                        <li class="nav-item">
                            <a href=" {{ route('shift.index') }} " class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Data Shift
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('departemen.index') }} " class="nav-link">
                                <i class="nav-icon fas fa-suitcase"></i>
                                <p>
                                    Data Departemen
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('koordinat.index') }} " class="nav-link">
                                <i class="nav-icon fas fa-map-marked-alt"></i>
                                <p>
                                    Koordinat Absensi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('pegawai.index') }} " class="nav-link">
                                <i class="nav-icon far fa-id-card"></i>
                                <p>
                                    Data Pegawai
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('absensi.index') }} " class="nav-link">
                                <i class="nav-icon fas fa-user-edit"></i>
                                <p>
                                    Absensi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('absensi.data_absensi') }} " class="nav-link">
                                <i class="nav-icon fas fa-user-edit"></i>
                                <p>
                                    Data Absensi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('cuti.pengajuan') }} " class="nav-link">
                                <i class="nav-icon fas fa-swatchbook"></i>
                                <p>
                                    Pengajuan Cuti
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('cuti.data_pengajuan') }} " class="nav-link">
                                <i class="nav-icon fas fa-swatchbook"></i>
                                <p>
                                    Data Pengajuan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('cuti.data_pengajuan_hrd') }} " class="nav-link">
                                <i class="nav-icon fas fa-swatchbook"></i>
                                <p>
                                    Pengajuan Cuti Pegawai
                                </p>
                            </a>
                        </li>
                    @elseif (auth()->user()->akses == 'pegawai')
                    <li class="nav-item">
                        <a href=" {{ route('absensi.index') }} " class="nav-link">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <p>
                                Absensi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ route('absensi.data_absensi') }} " class="nav-link">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <p>
                                Data Absensi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ route('cuti.pengajuan') }} " class="nav-link">
                            <i class="nav-icon fas fa-swatchbook"></i>
                            <p>
                                Pengajuan Cuti
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ route('cuti.data_pengajuan') }} " class="nav-link">
                            <i class="nav-icon fas fa-swatchbook"></i>
                            <p>
                                Data Pengajuan
                            </p>
                        </a>
                    </li>
                    @if ($akses == "HRD")
                        <li class="nav-item">
                            <a href=" {{ route('cuti.data_pengajuan_hrd') }} " class="nav-link">
                                <i class="nav-icon fas fa-swatchbook"></i>
                                <p>
                                    Pengajuan Cuti Pegawai
                                </p>
                            </a>
                        </li>
                    @endif
                    
                    @endif
                @endif

                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
