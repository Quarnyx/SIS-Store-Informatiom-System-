<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="?page=dashboard" class="logo">
            <span>
                <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
            </span>
            <span class="">
                <img src="assets/images/logo-light.png" alt="logo-large" class="logo-lg logo-light">
                <img src="assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <!--end brand-->
    <!--start startbar-menu-->
    <div class="startbar-menu">
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">
                <?php
                if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'Admin') {
                    ?>

                    <!-- Navigation -->
                    <ul class="navbar-nav mb-auto w-100">
                        <li class="menu-label mt-2">
                            <span>Menu</span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?page=dashboard">
                                <i class="iconoir-report-columns menu-icon"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarTransactions" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarTransactions">
                                <i class="iconoir-task-list menu-icon"></i>
                                <span>Master Data</span>
                            </a>
                            <div class="collapse " id="sidebarTransactions">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="?page=pengguna">Data Pengguna</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="?page=barang">Data Barang</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="?page=supplier">Data Supplier</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="?page=akun">Data Akun</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div><!--end startbarTables-->
                        </li><!--end nav-item-->

                        <li class="menu-label mt-2">
                            <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small>
                            <span>Transaksi</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=pembelian">
                                <i class="iconoir-credit-cards menu-icon"></i>
                                <span>Pembelian</span>
                            </a>

                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="?page=penjualan">
                                <i class="iconoir-credit-cards menu-icon"></i>
                                <span>Penjualan</span>
                            </a>
                        </li><!--end nav-item-->

                        <li class="menu-label mt-2">
                            <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small>
                            <span>Laporan</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=laporan-pembelian">
                                <i class="iconoir-credit-cards menu-icon"></i>
                                <span>Laporan Pembelian</span>
                            </a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="?page=laporan-penjualan">
                                <i class="iconoir-credit-cards menu-icon"></i>
                                <span>Laporan Penjualan</span>
                            </a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="?page=jurnal">
                                <i class="iconoir-credit-cards menu-icon"></i>
                                <span>Jurnal</span>
                            </a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="?page=laporan-persediaan">
                                <i class="iconoir-credit-cards menu-icon"></i>
                                <span>Laporan Persediaan</span>
                            </a>
                        </li><!--end nav-item-->
                    </ul><!--end navbar-nav--->
                <?php
                }
                ?>
                <?php
                if ($_SESSION['level'] == 'Kasir') {
                    ?>

                <!-- Navigation -->
                    <ul class="navbar-nav mb-auto w-100">
                        <li class="menu-label mt-2">
                            <span>Menu</span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?page=dashboard">
                                <i class="iconoir-report-columns menu-icon"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!--end nav-item-->


                        <li class="menu-label mt-2">
                            <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small>
                            <span>Transaksi</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=penjualan">
                                <i class="iconoir-credit-cards menu-icon"></i>
                                <span>Penjualan</span>
                            </a>
                        </li><!--end nav-item-->

                        <li class="menu-label mt-2">
                            <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small>
                            <span>Laporan</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=laporan-penjualan">
                                <i class="iconoir-credit-cards menu-icon"></i>
                                <span>Laporan Penjualan</span>
                            </a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="?page=laporan-persediaan">
                                <i class="iconoir-credit-cards menu-icon"></i>
                                <span>Laporan Persediaan</span>
                            </a>
                        </li><!--end nav-item-->
                    </ul><!--end navbar-nav--->
                <?php
                }
                ?>
            </div>
        </div><!--end startbar-collapse-->
    </div><!--end startbar-menu-->
</div>