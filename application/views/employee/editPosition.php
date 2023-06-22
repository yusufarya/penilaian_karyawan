<?php
$data = json_decode(json_encode($pageInfo), True);
$level_ = $data['me']['jabatan_id'];  

$tahun = date('Y');
$bulan = date('m'); 

?>

<!-- Begin Page Content -->
<div class="container-fluid" style="height: 100vh;">

    <!-- Page Heading --> 
    <div class="row">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h4 mb-2 text-dark"><?= $data['title'] ?></h3>
        </div> 
    </div> 
      
  <!-- Content Row -->
  <div class="row mt-2 mx-0"> 
    <form action="<?= base_url('updatePosition') ?>" method="POST" class="p`x-0">
      <div class="col-md-6 p-3 ps-4 card" style="border: none; box-shadow: 1px 1px 3px #acacac;">
        <div class="row">
          <div class="mb-3 col-md-6">
            <label for="inisial" class="form-label">Inisial <i style="color: red;">*</i></label>
            <input type="text" onkeyup="ChangeUpper(this)" class="form-control" id="inisial" name="inisial" placeholder="ADM" autocomplete="off" value="<?= $data['divInfo']['inisial'] ?>">
            <input type="hidden" name="id" id="id" value="<?= $data['divInfo']['id'] ?>">
          </div> 
          <div class="mb-3 col-md-4">
            <label for="level" class="form-label">Level <i style="color: red;">*</i></label>
            <select name="level" id="level" class="form-control form-select">
                <option value="">---</option>
                <option value="1" <?= $data['divInfo']['level'] == '1' ? 'selected' : '' ?>>1</option>
                <option value="2" <?= $data['divInfo']['level'] == '2' ? 'selected' : '' ?>>2</option>
                <option value="3" <?= $data['divInfo']['level'] == '3' ? 'selected' : '' ?>>3</option>
                <option value="4" <?= $data['divInfo']['level'] == '4' ? 'selected' : '' ?>>4</option>
                <option value="5" <?= $data['divInfo']['level'] == '5' ? 'selected' : '' ?>>5</option>
            </select>
          </div> 
        </div> 
        <div class="row">
          <div class="mb-3 col-md-12">
            <label for="nama" class="form-label">NAMA <i style="color: red;">*</i></label>
            <input type="text" onkeyup="ChangeUpper(this)" class="form-control" id="nama" name="nama" placeholder="ADMIN" value="<?= $data['divInfo']['nama'] ?>">
          </div>
        </div> 
        <div class="footer py-3">
          <button  class="btn btn-success mr-2" style="float: right;">Simpan</button>
          <a href="<?= base_url('divisiList'); ?>" class="btn btn-secondary mr-2" style="float: right;">Batal</a>
        </div>
      </div>
    </form>
  </div>  
</div>
<br>
<br>