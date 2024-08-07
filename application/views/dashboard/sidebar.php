<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
    <?php $active = ''; ?>
        <?php if (isset($pemesanan) && $pemesanan) {
            $active = 'active';
        } ?>
        <li class="nav-item <?php echo $active ?>">
            <a class="nav-link" href="<?= base_url('dashboard/reservation'); ?>">
                <i class="menu-icon fa-solid fa-clipboard-list"></i>
                <span class="menu-title">Reservation</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/guestdata') ?>">
                <i class="menu-icon mdi mdi-account-group"></i>
                <span class="menu-title">Guest Data</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/availability'); ?>">
                <i class="menu-icon fa-solid fa-magnifying-glass"></i>
                <span class="menu-title">Room Availability</span>
            </a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/monthlyreport'); ?>">
                <i class="menu-icon fa-solid fa-sack-dollar"></i>
                <span class="menu-title">Monthly Report</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('c_fasilitas/c_fasilitas/')?>">
                <i class="menu-icon mdi mdi-bed"></i>
                <span class="menu-title">Fasilitas</span>
            </a>
        </li>
    </ul>
</nav>