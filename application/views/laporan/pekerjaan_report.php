<?php
$data = json_decode(json_encode($pageInfo), True);
?> 
<div class="container-fluid" style="height: 90vh;">

    <div class="row mb-2">  
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h4 mb-0 text-dark"><?= $data['title'] ?></h3>
        </div>   
        <hr>
    </div><!-- /.row --> 
    <div class="row p-3 mt-1" style="width: 60%; box-shadow: 1px 5px 50px #eaeaea">
        <div class="col-lg-12 col-md-12 mt-3">
            <label for="karyawan" class="ml-1">Nama Karyawan</label>
            <select name="karyawan" id="karyawan" class="form-select">
                <option value="">Pilih Karyawan</option>
                <?php foreach ($data['karyawan'] as $emp) { ?>
                    <option value="<?= $emp['id']; ?>"> <?= $emp['nik'] . " - " . $emp['nama']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-lg-6 col-md-6 mt-3">
            <label for="divisi" class="ml-1">Divisi</label>
            <select name="divisi" id="divisi" class="form-select">
                <option value="">Pilih divisi</option> 
                <?php foreach ($data['divisi'] as $div) { ?>
                    <option value="<?= $div['id']; ?>"> <?= $div['nama']; ?></option>
                <?php } ?>
            </select>
        </div> 
        <div class="col-lg-6 col-md-6 mt-3">
            <label for="jabatan" class="ml-1">Jabatan</label>
            <select name="jabatan" id="jabatan" class="form-select">
                <option value="">Pilih jabatan</option> 
                <?php foreach ($data['jabatan'] as $jab) { ?>
                    <option value="<?= $jab['id']; ?>"> <?= $jab['nama']; ?></option>
                <?php } ?>
            </select>
        </div> 
        <!-- ///// -->
        <div class="col-lg-6 col-md-6 mt-3">
            <label for="tanggal" class="ml-1">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= date('Y-m-d', strtotime(date('Y-m-').'1')) ?>"> 
        </div>
        <div class="col-lg-6 col-md-6 mt-3">
            <label for="tanggal1" class="ml-1">S/D</label>
            <input type="date" name="tanggal1" id="tanggal1" class="form-control" value="<?= date('Y-m-d') ?>"> 
        </div> 
        <div class="col-lg-10"></div>
        <div class="col-lg-2 mt-4"> 
            <button class="btn btn-warning py-1 px-3" type="button" id="btnLaporan" style="float: right;">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </div> 
</div><!-- /.container-fluid -->   
 