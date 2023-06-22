<?php
$data = json_decode(json_encode($pageInfo), True);
?>
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background : #0984e3; border-radius: 10px;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('karyawan') ?>">
        <div class="sidebar-brand-icon">
            <i class="bi bi-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bapenda </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo $data['active'] == 'Index' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('karyawan') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home Karyawan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Heading -->
    <div class="sidebar-heading">
        Pekerjaan
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item <?php echo $data['active'] == 'Pekerjaan' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('daftar_kerja') ?>">
            <i class="fas fa-fw fa-database" aria-hidden="true"></i>
            <span>Pekerjaan Saya</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Heading -->
    <div class="sidebar-heading">
        Penilaian
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item <?php echo $data['active'] == 'Penilaian' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('penilaian_saya') ?>">
            <i class="fas fa-fw fa-file" aria-hidden="true"></i>
            <span>Penilaian Saya</span>
        </a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item <?php echo $data['active'] == 'LPenilaian' ? 'active' : '' ?>" hidden>
        <a class="nav-link" href="<?= base_url('lpenilaian_saya') ?>">
            <i class="fas fa-fw fa-clipboard-list" aria-hidden="true"></i>
            <span>Laporan Penilaian</span>
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