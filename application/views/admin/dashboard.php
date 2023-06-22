<?php
$data = json_decode(json_encode($pageInfo), True);
$dataAdm = $data['me'];

// $dataB = "SELECT SUM(qty) AS TOTALQTY, SUM(harga) AS TOTALHARGA, SUM(qty*harga) AS JUMLAH FROM transaksi ";
$dataTr = 0; 

$this->db->select('users.*, divisi.nama AS divisi');
$this->db->from('users');
$this->db->join('divisi', 'divisi.id = users.divisi_id', 'left');
$this->db->order_by('id', 'DESC');
$this->db->limit(3);
$QRY = $this->db->get();
$dataAll = $QRY->result_array(); 
$jumlahKaryawan = $this->db->get_where('users', ['divisi_id >' => 0])->num_rows(); 
$male = $this->db->get_where('users', ['jenis_kel ' => 'Laki-laki', 'divisi_id >' => 0])->num_rows(); 
$female = $this->db->get_where('users', ['jenis_kel ' => 'Perempuan', 'divisi_id >' => 0])->num_rows(); 

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row"> 
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body px-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col ms-2">
                            <h3 id="date"></h3>
                            <h1 id="month"></h1>
                            <h1 id="dateTime"></h1>
                        </div>
                        <div class="col-auto mr-2">
                            <table class="table-sm" style="font-size: 14px;">
                                <tr>
                                    <th>Nama</th>
                                    <td> &nbsp; :&nbsp; <?php echo $dataAdm['nama'] ?></td>
                                </tr>
                                <tr>
                                    <th>Divisi</th>
                                    <td> &nbsp; :&nbsp; <?php echo $dataAdm['divisi'] ?></td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td> &nbsp; :&nbsp; <?php echo $dataAdm['jabatan'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body px-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-3">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Karyawan
                            </div>
                            <div class="mt-3 mb-0 font-weight-bold text-gray-800" > <?= $jumlahKaryawan ?> Karyawan </div>
                            <a href="<?= base_url('empployeeList') ?>" class="text-decoration-none text-info" style="font-size:13px;">
                                Selengkapnya..
                            </a>
                        </div>
                        <div class="col-auto me-3">
                            <i class="fas fa-users text-warning fa-2x "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body px-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-3">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jenis Kelamin
                            </div>
                            <div class="mt-3 mb-0 font-weight-bold text-gray-800">Laki - laki = <?= $male ?> </div> 
                            <div class="mt-0 mb-0 font-weight-bold text-gray-800">Perempuan = <?= $female ?></div> 
                        </div>
                        <div class="col-auto me-2 mt-3">
                            <i class="fas fa-user fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    <!-- Content Row --> 
    <div class="row"> 
        <div class="col-xl-8 col-lg-6">
            <div class="card shadow mb-4"> 
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">3 Pengguna Terbaru</h6> 
                </div>
                <!-- Card Body -->
                <div class="card-body"> 
                    <div class="mt-2 text-center small">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: left;">Nik</th>
                                    <th style="text-align: left;">Nama</th>
                                    <th style="text-align: left;">Divisi</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($dataAll as $key => $row) { ?>
                                    <tr>
                                        <td style="text-align: left;"><?= $row['nik'] ?></td>
                                        <td style="text-align: left;"><?= $row['nama'] ?></td>
                                        <td style="text-align: left;"><?= $row['divisi'] ?></td> 
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->