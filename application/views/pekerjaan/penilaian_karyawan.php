<?php
$data = json_decode(json_encode($pageInfo), True);
$level_ = $data['me']['jabatan_id'];
$order = $data['order'];
?>
<!-- Begin Page Content -->
<div class="container-fluid" style="height: 100vh;">

  <!-- Page Heading -->
  <form action="<?php echo base_url('penilaian') ?>" method="post">
    <div class="row">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h4 mb-2 text-dark"><?= $data['title'] ?></h3>
      </div>
      <div class="col-md-8">
        <div class="input-group">
          <input type="text" name="searchText" class="form-control" placeholder="Cari faktor..." autocomplete="off" value="<?= $data['searchText'] ?>">
          <button class="btn btn-outline-primary" type="submit" id="submit">Cari</button>
          <button class="btn btn-outline-secondary" onclick="resetSearch()"><i class="fa fa-eraser"></i></button>
        </div>
      </div>
      <div class="col-md-2" hidden>
        <select class="form-select" name="orderby" id="orderList">
          <option value="">Urutkan</option>
          <option value="users.nik" <?= $order == 'users.nik' ? 'selected' : '' ?>>Nik</option>
          <option value="users.nama" <?= $order == 'users.nama' ? 'selected' : '' ?>>Nama</option>
          <option value="jab.id" <?= $order == 'jab.id' ? 'selected' : '' ?>>Jabatan</option>
        </select>
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
          <th style="width: 120px;">Jenis Kel</th>
          <th style="width: 160px;">Divisi</th>
          <th style="width: 160px;">Jabatan</th>
          <th style="width: 100px; text-align:center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $tempKaryawan = '';
        foreach ($data['listPenilaian'] as $key => $val) {
          $karyawan = $val['nama'];
          if ($karyawan != $tempKaryawan) {
        ?>
            <tr style="font-size: 13px;">
              <td><?= $no++; ?></td>
              <td><?= $val['nama'] ?></td>
              <td><?= $val['nik'] ?></td>
              <td><?= $val['jenis_kel'] ?></td>
              <td><?= $val['divisi'] ?></td>
              <td><?= $val['jabatan'] ?></td>
              <td style="text-align: center;">
                <a href="<?= base_url('penilaian/updateNilai/') . $val['id'] ?>" class="btn btn-success py-0 px-2" class="text-info bg-white">Penilaian</a> &nbsp;
              </td>
            </tr>
        <?php }
          $tempKaryawan = $val['nama'];
        }
        ?>
      </tbody>
    </table>
  </div>

</div>
<!-- /.container-fluid -->

<div class="modal fade" id="modal-detail" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Tugas Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-stipped">
          <thead>
            <tr>
              <th>Nama Karyawan</th>
              <th>Uraian Tugas</th>
              <th>Output Kerja</th>
            </tr>
          </thead>
          <tbody id="content">

          </tbody>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary" id="btn_add">Simpan</button> -->
      </div>
    </div>
  </div>
</div>