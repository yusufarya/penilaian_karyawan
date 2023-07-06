<?php
$data = json_decode(json_encode($pageInfo), True);
$level_ = $data['me']['jabatan_id'];
$nik = $data['me']['nik'];
$order = $data['order'];
?>
<!-- Begin Page Content -->
<div class="container-fluid" style="height: 100vh;">

  <!-- Page Heading -->
  <form action="<?php echo base_url('trMe') ?>" method="post">
    <div class="row">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h4 mb-2 text-dark"><?= $data['title'] ?></h3>
      </div>
    </div>
  </form>

  <!-- Content Row -->
  <div class="row mt-2 mx-0">

    <table class="table table-sm table-hover table-bordered">
      <thead>
        <tr style="text-transform: uppercase; font-size: 13px; background: #ececec;">
          <th style="width:5%;">No.</th>
          <th>Nama Karyawan</th>
          <th>Nik</th>
          <th style="width: 120px;">Bulan</th>
          <th style="width: 160px;">Divisi</th>
          <th style="width: 160px;">Jabatan</th>
          <th style="width: 80px; text-align:center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $tempBulan = '';
        foreach ($data['listPenilaian'] as $key => $val) {
          $bulan = substr($val['tanggal'], 5, 2);
          if ($val['nik'] == $nik) {
            if ($bulan != $tempBulan) {
        ?>
              <tr style="font-size: 13px;">
                <td><?= $no++; ?></td>
                <td><?= $val['nama'] ?></td>
                <td><?= $val['nik'] ?></td>
                <td><?= getNamaBulan($bulan) ?></td>
                <td><?= $val['divisi'] ?></td>
                <td><?= $val['jabatan'] ?></td>
                <td style="text-align: center;">
                  <a href="<?= base_url('detail_nilai/') . $val['nik'] ?>" class="btn btn-info py-0 px-2" class="text-info bg-white">Detail</a>
                </td>
              </tr>
        <?php }
            $tempBulan = substr($val['tanggal'], 5, 2);
          }
        }
        ?>
      </tbody>
    </table>
  </div>

</div>
<!-- /.container-fluid -->