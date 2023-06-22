<?php
$data = json_decode(json_encode($pageInfo), True);
$me = $data['me'];
// pre($me);

$pekerjaan = $this->db->get_where('pekerjaan', ['user_id ' => $me['id']])->num_rows(); 

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">HOME BAPENDA KARYAWAN</h1>
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
                                    <td> &nbsp; :&nbsp; <?php echo $me['nama'] ?></td>
                                </tr>
                                <tr>
                                    <th>Divisi</th>
                                    <td> &nbsp; :&nbsp; <?php echo $me['divisi'] ?></td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td> &nbsp; :&nbsp; <?php echo $me['jabatan'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body px-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto mx-2">
                            <table class="table-sm" style="font-size: 14px;">
                                <tr>
                                    <th>Nama</th>
                                    <td> &nbsp; :&nbsp; <?php echo $me['nama'] ?></td>
                                </tr>
                                <tr>
                                    <th>Telp</th>
                                    <td> &nbsp; :&nbsp; <?php echo $me['no_telp'] ?></td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td> &nbsp; :&nbsp; <?php echo $me['jabatan'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>  -->

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body px-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-3">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Pekerjaan
                            </div>
                            <p class="mt-2 mb-0 font-weight-bold text-gray-800"> <?= $pekerjaan ?>  Total pekerjaan anda</p>
                            <a href="<?= base_url('daftar_kerja') ?>" class="text-decoration-none text-primary" style="font-size:13px;">
                                Selengkapnya..
                            </a>
                        </div>
                        <div class="col-auto me-2 mt-3">
                            <i class="fas fa-clipboard-list fa-2x text-info"></i>
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
                    <h6 class="m-0 font-weight-bold text-dark">Bio Data Karyawan</h6> 
                </div>
                <!-- Card Body -->
                <div class="card-body"> 
                    <div class="mt-2 text-center small">
                        <table class="table table-bordered"> 
                            <tr>
                                <th style="text-align: left;">Nik</th>
                                <td style="text-align: left;"><?= $me['nik'] ?></td>
                            </tr>  
                            <tr>  
                                <th style="text-align: left;">Nama</th> 
                                <td style="text-align: left;"><?= $me['nama'] ?></td>
                            </tr>  
                            <tr>  
                                <th style="text-align: left;">Jenis Kelamin</th> 
                                <td style="text-align: left;"><?= $me['jenis_kel'] ?></td>
                            </tr>  
                            <tr>  
                                <th style="text-align: left;">Divisi</th> 
                                <td style="text-align: left;"><?= $me['divisi'] ?></td>
                            </tr>  
                            <tr>  
                                <th style="text-align: left;">Jabatan</th> 
                                <td style="text-align: left;"><?= $me['jabatan'] ?></td>
                            </tr>  
                            <tr>  
                                <th style="text-align: left;">Email</th> 
                                <td style="text-align: left;"><?= $me['email'] ?></td>
                            </tr>  
                            <tr>  
                                <th style="text-align: left;">No. Telp</th> 
                                <td style="text-align: left;"><?= $me['no_telp'] ?></td>
                            </tr>  
                            <tr>  
                                <th style="text-align: left;">Alamat</th> 
                                <td style="text-align: left;"><?= $me['alamat'] ?></td>
                            </tr>  
                            <tr>  
                                <th style="text-align: left;">Bergabung Sejak</th> 
                                <td style="text-align: left;"><?= date('d, M Y', strtotime($me['tgl_dibuat'])) ?></td>
                            </tr>  
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
</div>
<!-- /.container-fluid -->