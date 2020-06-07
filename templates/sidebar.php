<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="position: fixed;">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
        </div> -->
        <div class="sidebar-brand-icon" style="text-align: left;">
            <img src="<?php echo base_url("assets/img/logo3.png") ?>" alt="" style="width:60%;">
        </div>
        <div class="sidebar-brand-text mx-3">Metode Numerik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            METODE TERTUTUP
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("tabel") ?>">
                <span>Metode Tabel</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("bisection") ?>">
                <span>Metode Bisection</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("regula-falsi") ?>">
                <span>Metode Regula Falsi</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            METODE TERBUKA
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("iterasi-sederhana") ?>">
                <span>Metode Iterasi Sederhana</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("newton-raphson") ?>">
                <span>Metode Newton Raphson</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("secant") ?>">
                <span>Metode Secant</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            DIFFERENSIASI
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url("differensiasi") ?>">
                <span>Differensiasi</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("selisih-maju") ?>">
                <span>Metode Selisih Maju</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("selisih-tengah") ?>">
                <span>Metode Selisih Tengah</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo route_method("selisih-mundur") ?>">
                <span>Metode Selisih Mundur</span>
            </a>
        </li> -->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
<!-- End of Sidebar -->