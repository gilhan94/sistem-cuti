@php
    $masterSettingMenu = URL::current() == route('divisi') || URL::current() == route('jenis-cuti');
    $masterMenuCuti =
        URL::current() == route('pengajuan-cuti') ||
        URL::current() == route('sisa-cuti') ||
        URL::current() == route('cuti-saya');
    $masterUserMenu =
        URL::current() == route('admin-user') ||
        URL::current() == route('karyawan-user') ||
        URL::current() == route('sup-user');
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="justify-content-center">
        <a class="brand-link display-grid">
            <div class="d-flex align-items-center ">
                <div>
                    <img src="{{ asset('https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=' . Auth::user()->name) }}"
                        alt="AdminLTE Logo" class="brand-image img-rounded elevation-3" style="opacity: .8">
                </div>
                <div>
                    <div class="brand-text font-weight-light text-capitalize">{{ Auth::user()->name }}</div>
                </div>
            </div>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header">APPLICATION</li>
                <li class="nav-item">
                    <a href="/" class="nav-link {{ URL::current() == route('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                {{-- Admin menu --}}
                @if (Auth::user()->role == 'admin')
                    <li class="nav-header">ADMIN MENU</li>
                    <li class="nav-item has-treeview {{ $masterSettingMenu ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Master Setting
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('divisi') }}"
                                    class="nav-link {{ URL::current() == route('divisi') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Divisi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('jenis-cuti') }}"
                                    class="nav-link {{ URL::current() == route('jenis-cuti') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jenis Cuti</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ $masterUserMenu ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Master User
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">3</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin-user') }}"
                                    class="nav-link {{ URL::current() == route('admin-user') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Admin</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sup-user') }}"
                                    class="nav-link {{ URL::current() == route('sup-user') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Supervisor</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('karyawan-user') }}"
                                    class="nav-link {{ URL::current() == route('karyawan-user') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Karyawan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">CUTI</li>
                    <li class="nav-item">
                        <a href="{{ route('daftar-pengajuan-cuti') }}"
                            class="nav-link {{ URL::current() == route('daftar-pengajuan-cuti') ? 'active' : '' }}">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Pengajuan Cuti
                            </p>
                        </a>
                    </li>
                @endif

                {{-- Supervisor Menu --}}
                @if (Auth::user()->role == 'supervisor')
                    <li class="nav-item">
                        <a href="{{ route('karyawan-user') }}"
                            class="nav-link {{ URL::current() == route('karyawan-user') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Karyawan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('daftar-pengajuan-cuti') }}"
                            class="nav-link {{ URL::current() == route('daftar-pengajuan-cuti') ? 'active' : '' }}">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Pengajuan Cuti
                            </p>
                        </a>
                    </li>
                @endif

                {{-- Karyawan Menu --}}
                @if (Auth::user()->role == 'karyawan')
                    <li class="nav-item has-treeview {{ $masterMenuCuti ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Menu Cuti
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">3</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('cuti-saya') }}"
                                    class="nav-link {{ URL::current() == route('cuti-saya') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cuti <span class="text-capitalize">{{ Auth::user()->name }}</span></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sisa-cuti') }}"
                                    class="nav-link {{ URL::current() == route('sisa-cuti') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sisa Cuti <span class="text-capitalize">{{ Auth::user()->name }}</span></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pengajuan-cuti') }}"
                                    class="nav-link {{ URL::current() == route('pengajuan-cuti') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajukan Cuti</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif

                {{-- Loged out --}}
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link btn btn-danger text-white"
                        style="cursor: pointer;">
                        <i style="rotate: 180deg;" class="nav-icon fas fa-sign-out-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
