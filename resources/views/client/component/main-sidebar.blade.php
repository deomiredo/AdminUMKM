<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth('penjual')->user()->logo }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ strtoupper(auth('penjual')->user()->nama_toko) }} <br> UMKM Tamiajeng</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('penjual.dashboard') }}" class="nav-link @if (request()->is('/penjual/dashboard')) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('penjual.produk.index') }}" class="nav-link @if (request()->is('penjual/manajemen-produk*')) active @endif">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Manajemen Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penjual.pesanan.index') }}" class="nav-link @if (request()->is('penjual/manajemen-pesanan*')) active @endif">
                        <i class="nav-icon fas fa-cart"></i>
                        <p>
                            Management Pesanan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penjual.komentar.index') }}" class="nav-link @if (request()->is('penjual/komentar-dan-penilaian*')) active @endif">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Komentar dan Penilaian
                        </p>
                    </a>
                </li>
                <li class="nav-item @if (request()->is('statistik-penjual*', 'statistik-pembeli-penjual*', 'analitik-pelanggan*')) menu-open @endif">
                    <a href="#" class="nav-link @if (request()->is('statistik-penjual*', 'statistik-pembeli-penjual*', 'analitik-pelanggan*')) active @endif">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Statistik dan Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('statistik-penjualan') }}" class="nav-link @if (request()->is('statistik-penjual*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Statistik Penjualan</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('statistik-pembeli-penjual') }}" class="nav-link @if (request()->is('statistik-pembeli-penjual*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Statistik Pembeli dan Penjual</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('analitik-pelanggan') }}" class="nav-link @if (request()->is('analitik-pelanggan*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Analitik Pelanggan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                  <a href="{{ route('penjual.profile.index') }}" class="nav-link @if (request()->is('penjual/myprofile*')) active @endif">
                      <i class="nav-icon fas fa-user"></i>
                      <p>
                          Profile
                      </p>
                  </a>
              </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
