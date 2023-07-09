<?php
$data = json_decode(json_encode($pageInfo), True);
$level_ = $data['me']['level'];
$divisi_ = $data['me']['divisi_id'];
$order = $data['order'];
?>
<!-- Begin Page Content -->
<div class="container-fluid" style="height: 100vh;">

  <!-- Page Heading -->
  <form action="<?php echo base_url('empployeeList') ?>" method="post">
    <div class="row">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h4 mb-2 text-dark"><?= $data['title'] ?></h3>
      </div>
      <div class="col-md-8">
        <div class="input-group">
          <input type="text" name="searchText" class="form-control" placeholder="Cari nama..." autocomplete="off" value="<?= $data['searchText'] ?>">
          <button class="btn btn-outline-primary" type="submit" id="submit">Cari</button>
          <button class="btn btn-outline-secondary" onclick="resetSearch()"><i class="fa fa-eraser"></i></button>
        </div>
      </div>
      <div class="col-md-2">
        <div class="row">
          <div class="col-md-10">
            <select class="form-select" name="orderby" id="orderList">
              <option value="">Urutkan</option>
              <option value="nik" <?= $order == 'nik' ? 'selected' : '' ?>>Nik</option>
              <option value="nama" <?= $order == 'nama' ? 'selected' : '' ?>>Nama</option>
              <option value="jabatan" <?= $order == 'jabatan' ? 'selected' : '' ?>>Jabatan</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <?php if ($divisi_ <= 1) { ?>
          <button style="float: right;" type="button" class="btn btn-sm btn-outline-primary" id="addData"><i class="bi bi-plus"></i> Karyawan</button>
        <?php } ?>
      </div>
    </div>
  </form>

  <!-- Content Row -->
  <div class="row mt-2 mx-0">
    <hr><br>
    <table class="table table-sm table-hover table-bordered">
      <thead>
        <tr style="text-transform: uppercase; font-size: 13px; background: #ececec;">
          <th style="width:2%;">NIK</th>
          <th>Nama</th>
          <th>Divisi</th>
          <th>Jabatan</th>
          <th style="width: 85px; text-align:left;">Jns Kel</th>
          <!-- <th style="width: 240px; text-align:left;">Alamat Admin</th> -->
          <th style="width:110px; text-align:left;">No Telp</th>
          <th style="text-align: left;">Tgl Daftar</th>
          <th style="width:90px; text-align: center;">Status</th>
          <?php if ($divisi_ <= 1) { ?>
            <th style="width: 60px; text-align:center;">Aksi</th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['dataEmp'] as $key => $val) { ?>
          <tr style="font-size: 13px;">
            <td><?= $val['nik'] ?></td>
            <td><?= $val['nama'] ?></td>
            <td><?= $val['divisi'] ?></td>
            <td><?= $val['jabatan'] ?></td>
            <td><?= $val['jenis_kel'] ?></td>
            <!-- <td><?= $val['alamat'] ?></td> -->
            <td><?= $val['no_telp'] ?></td>
            <td><?= date('d-m-Y', strtotime($val['tgl_dibuat'])) ?></td>
            <?php
            $status = $val['status'];
            if ($status == 1) {
              $stt = "<div class='badge bg-success px-4'>Aktif</div>";
            } else {
              $stt = "<div class='badge bg-danger'>Tidak Aktif</div>";
            }
            ?>
            <td style="text-align:center; padding:1px;"><?= $stt ?></td>
            <?php if ($divisi_ <= 1) { ?>
              <td style="text-align:center;">
                <a href="#" onclick="updateAdm('<?= $val['id'] ?>', <?= $level_ ?>)" class="text-warning"><i class="bi bi-pencil"></i></a> &nbsp;
                <a href="#" onclick="deleteAdm('<?= $val['id'] ?>','<?= $val['nama'] ?>', <?= $level_ ?>)" class="text-danger"><i class="bi bi-trash"></i></a>
              </td>
            <?php } ?>
          </tr>
        <?php } ?>
      </tbody>
    </table><br>
  </div>
</div>
<!-- /.container-fluid -->

<div class="modal fade AddAdm" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content px-3">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-1 row">
          <label for="nama" class="col-sm-3 col-form-label">Nama <i style="color:red">*</i></label>
          <div class="col-sm-9">
            <input required type="text" class="form-control" id="nama" name="nama" autocomplete="off" autofocus>
          </div>
        </div>
        <div class="mb-1 row">
          <label for="jenis_kel" class="col-sm-3 col-form-label">Jns Kelamin <i style="color:red">*</i></label>
          <div class="col-sm-5">
            <select name="jenis_kel" id="jenis_kel" class="form-select">
              <option value="">Pilih</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="mb-1 row">
          <label for="staticEmail" class="col-sm-3 col-form-label">Email <i style="color:red">*</i></label>
          <div class="col-sm-9">
            <input required type="email" onkeyup="ChangeLower(this)" class="form-control" id="email" name="email" autocomplete="off" placeholder="nama@gmail.com">
          </div>
        </div>
        <div class="mb-1 row">
          <label for="no_telp" class="col-sm-3 col-form-label">No. Telp <i style="color:red">*</i></label>
          <div class="col-sm-9">
            <input required type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="off">
          </div>
        </div>
        <div class="mb-1 row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat <i style="color:red">*</i></label>
          <div class="col-sm-9">
            <input required type="text" class="form-control" id="alamat" name="alamat" autocomplete="off">
          </div>
        </div>
        <div class="mb-1 row">
          <label for="password" class="col-sm-3 col-form-label">Password <i style="color:red">*</i></label>
          <div class="col-sm-9">
            <input required type="password" class="form-control" id="password" name="password" autocomplete="off">
          </div>
        </div>
        <div class="mb-1 row">
          <label for="divisi" class="col-sm-3 col-form-label">Divisi <i style="color:red">*</i></label>
          <div class="col-sm-5">
            <select name="divisi_id" id="divisi_id" class="form-select">
              <option value="">Pilih Divisi</option>
              <?php foreach ($data['divisi'] as $val) { ?>
                <option value="<?= $val['id'] ?>"><?= $val['nama'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="mb-1 row">
          <label for="jabatan" class="col-sm-3 col-form-label">Jabatan <i style="color:red">*</i></label>
          <div class="col-sm-5">
            <select name="jabatan_id" id="jabatan_id" class="form-select">
              <option value="">Pilih Jabatan</option>
              <?php foreach ($data['jabatan'] as $val) { ?>
                <option value="<?= $val['id'] ?>"><?= $val['nama'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn_add">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade UpAdm" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content px-3">
      <div class="modal-header">
        <h5 class="modal-title">Update Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-1 row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="Up_nama" autocomplete="off">
            <input type="hidden" class="form-control" id="id">
          </div>
        </div>
        <div class="mb-1 row">
          <label for="no_telp" class="col-sm-3 col-form-label">No. Telp </label>
          <div class="col-sm-9">
            <input required type="text" class="form-control" id="up_no_telp" name="up_no_telp" autocomplete="off">
          </div>
        </div>
        <div class="mb-1 row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat </label>
          <div class="col-sm-9">
            <input required type="text" class="form-control" id="up_alamat" name="up_alamat" autocomplete="off">
          </div>
        </div>
        <div class="mb-1 row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Status</label>
          <div class="col-sm-5">
            <select name="up_sts" id="up_sts" class="form-select">
              <!-- <option value="">Status</option> -->
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </div>
        </div>
        <div class="mb-1 row">
          <label for="up_divisi_id" class="col-sm-3 col-form-label">Divisi</label>
          <div class="col-sm-8">
            <select name="up_divisi_id" id="up_divisi_id" class="form-select">
              <option value="">Pilih</option>
              <?php foreach ($data['divisi'] as $val) { ?>
                <option value="<?= $val['id'] ?>"><?= $val['nama'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="mb-1 row">
          <label for="up_jabatan_id" class="col-sm-3 col-form-label">Jabatan</label>
          <div class="col-sm-8">
            <select name="up_jabatan_id" id="up_jabatan_id" class="form-select">
              <option value="">Pilih</option>
              <?php foreach ($data['jabatan'] as $val) { ?>
                <option value="<?= $val['id'] ?>"><?= $val['nama'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn_save">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade DelAdm" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control-plaintext" id="del_id">
        <p id="hapus"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-primary" id="btnDel">Ya</button>
      </div>
    </div>
  </div>
</div>