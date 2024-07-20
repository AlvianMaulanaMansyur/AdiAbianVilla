<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="#">
                <img src="<?= base_url('assets/images/dashboard/adibian.png');?>" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="#">
                <img src="<?= base_url('assets/images/dashboard/adibian.png');?>" alt="logo" />
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Welcome back, <span class="text-black fw-bold">Admin</span> ! </h1>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            
        <!-- <li class="nav-item">
            <form class="search-form" action="#">
                <i class="icon-search"></i>
                <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
        </li> -->
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="<?= base_url('assets/foto/icon_user.jpg'); ?>" alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="<?= base_url('assets/foto/icon_user.jpg'); ?>" alt="Profile image">
                        <p class="mb-1 mt-3 fw-semibold">Admin</p>
                    </div>
                    <a class="dropdown-item" href="<?php echo base_url('Authadmin/logout'); ?>"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>