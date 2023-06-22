<?php
$data = json_decode(json_encode($pageInfo), True);
?>
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background : #192a56;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-icon">
            <i class="bi bi-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BAPENDA </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo $data['active'] == 'Dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Pengguna
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link <?php echo $data['active'] == 'Employee' ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
            <i class="fas fa-fw fa-users"></i>
            <span>Master Data</span>
        </a>
        <div id="collapsePages1" class="collapse <?php echo $data['active'] == 'Employee' ? 'show' : '' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($this->uri->segment(1) == "divisiList") {
                                            echo "active";
                                        } ?>" href="<?= base_url('divisiList') ?>">Divisi</a>
                <a class="collapse-item <?php if ($this->uri->segment(1) == "positionList") {
                                            echo "active";
                                        } ?>" href="<?= base_url('positionList') ?>">Jabatan</a>
                <a class="collapse-item <?php if ($this->uri->segment(1) == "empployeeList") {
                                            echo "active";
                                        } ?>" href="<?= base_url('empployeeList') ?>">Data Karyawan</a>
                <!-- <div class="collapse-divider"></div> -->
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <!-- Heading -->
    <div class="sidebar-heading">
        Penilaian
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item <?php echo $data['active'] == 'Pekerjaan' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('detailPekerjaan') ?>">
            <i class="fas fa-fw fa-file" aria-hidden="true"></i>
            <span>Daftar Pekerjaan</span>
        </a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item <?php echo $data['active'] == 'Penilaian' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('penilaian') ?>">
            <i class="fas fa-fw fa-file" aria-hidden="true"></i>
            <span>Penilaian Karyawan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link <?php echo $data['active'] == 'Laporan' ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse <?php echo $data['active'] == 'Laporan' ? 'show' : '' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $data['title'] == 'Laporan Pekerjaan' ? 'active' : '' ?>" href="<?= base_url('pekerjaan_report') ?>">Laporan Pekerjaan</a>
                <a class="collapse-item <?= $data['title'] == 'Laporan Penilaian' ? 'active' : '' ?>" href="<?= base_url('penilaian_report') ?>">Laporan Penilaian</a>
                <!-- <div class="collapse-divider"></div> -->
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading" hidden>
        Pengaturan
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item <?php echo $data['active'] == 'Password' ? 'active' : '' ?>" hidden>
        <a class="nav-link" href="<?= base_url('admin/ubahPassword') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Ubah Kata Sandi</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->