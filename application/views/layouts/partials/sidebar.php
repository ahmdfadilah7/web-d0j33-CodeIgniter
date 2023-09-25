<!-- Sidebar navigation-->
<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('dashboard') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('nilai') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Nilai</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('kriteria') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Kriteria</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('guru') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Daftar Guru</span>
            </a>
        </li>
        
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Matriks AHP</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('matriks/perbandingan') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Hitung Kriteria</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('matriks/alternatif') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Hitung Alternatif</span>
            </a>
        </li>

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Matriks SAW</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('saw/kriteria') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Hitung Kriteria</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('saw/alternatif') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Hitung Alternatif</span>
            </a>
        </li>

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Hasil Perhitungan</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('matriks/hasil') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Hasil</span>
            </a>
        </li>

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">User Management</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('user') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">User</span>
            </a>
        </li>

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Setting</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('setting') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-settings"></i>
                </span>
                <span class="hide-menu">Setting Website</span>
            </a>
        </li>
        
    </ul>
    <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger fs-2 fw-semibold d-block"><i class="ti ti-logout"></i> Sign Out</a>
</nav>
<!-- End Sidebar navigation -->
