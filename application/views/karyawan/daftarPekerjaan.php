<?php
$data = json_decode(json_encode($pageInfo), True);
$level_ = $data['me']['jabatan_id'];
$order = $data['order'];
?>
<!-- Begin Page Content -->
<div class="container-fluid" style="height: 100vh;">

  <!-- Page Heading -->
  <form action="<?php echo base_url('daftar_kerja') ?>" method="post">
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
      <div class="col-md-2"> </div>
      <div class="col-md-2">
        <a style="float: right;" href="#" class="btn btn-sm btn-outline-primary" type="button" id="addData"><i class="bi bi-plus"></i> Data</a>
      </div>
    </div>
  </form>

  <!-- Content Row -->
  <div class="row mt-2 mx-0">

    <table class="table table-sm table-hover table-bordered">
      <thead>
        <tr style="text-transform: uppercase; font-size: 13px; background: #ececec;">
          <th style="width: 3%;">Id</th>
          <th>Uraian Tugas</th>
          <th style="width: 120px;">Output Kerja</th>
          <th style="width: 80px;">Bulan</th>
          <th style="width: 90px; text-align:center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['dataTugas'] as $key => $val) { ?>
          <tr style="font-size: 14px;">
            <td><?= $val['id'] ?></td>
            <td><?= $val['uraian_tugas'] ?></td>
            <td><?= $val['output_kerja'] ?></td>
            <td><?= getNamaBulan(substr($val['tanggal'], 5, 2)) ?></td>
            <td style="text-align: center;">
              <a href="#" onclick="updateTugas('<?= $val['id'] ?>', <?= $level_ ?>)" class="text-warning bg-white"><i class="bi bi-pencil"></i></a> &nbsp;
              <a href="#" onclick="deleteTugas('<?= $val['id'] ?>', <?= $level_ ?>)" class="text-danger bg-white"><i class="bi bi-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</div>
<!-- /.container-fluid -->

<div class="modal fade AddTugas" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Tugas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('karyawan/addTugas') ?>" method="post">
        <div class="modal-body">
          <div class="mb-1 row">
            <label for="uraian" class="col-sm-3 col-form-label">Uraian Tugas <i style="color:red">*</i></label>
            <div class="col-sm-9">
              <textarea required type="text" class="form-control" id="uraian" name="uraian" autocomplete="off" autofocus></textarea>
            </div>
          </div>

          <div class="mb-1 row">
            <label for="output" class="col-sm-3 col-form-label">Output Kerja <i style="color:red">*</i></label>
            <div class="col-sm-9">
              <input required type="text" class="form-control" id="output" name="output" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="btn_add">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade UbahTugas" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Data Tugas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="<?= base_url('karyawan/updateTugas') ?>" method="post">
        <div class="modal-body">
          <div class="mb-1 row">
            <label for="uraian" class="col-sm-3 col-form-label">Uraian <i style="color:red">*</i></label>
            <div class="col-sm-9">
              <input type="hidden" name="eid" id="eid">
              <input required type="text" class="form-control" id="e_uraian" name="e_uraian" autocomplete="off" autofocus>
            </div>
          </div>

          <div class="mb-1 row">
            <label for="e_output" class="col-sm-3 col-form-label">Output Kerja <i style="color:red">*</i></label>
            <div class="col-sm-9">
              <input required type="text" class="form-control" id="e_output" name="e_output" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="btn_save">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade DelTugas" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('karyawan/deleteTugas') ?>" method="post">
        <div class="modal-body">
          <input type="hidden" id="del_id" name="del_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary" id="btnDel">Ya</button>
        </div>
      </form>
    </div>
  </div>
</div>