<?php
$data = json_decode(json_encode($pageInfo), True);
$level_ = $data['me']['jabatan_id']; 
$order = isset($data['order']) ? $data['order'] : ''; 
?>
<!-- Begin Page Content -->
<div class="container-fluid" style="height: 100vh;">

  <!-- Page Heading -->
  <form action="<?php echo base_url('positionList') ?>" method="post">
    <div class="row">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h3 class="h4 mb-2 text-dark"><?= $data['title'] ?></h3>
      </div>
      <div class="col-md-8">
          <div class="input-group">
            <input type="text" name="searchText" class="form-control" placeholder="Cari..." autocomplete="off" value="<?= $data['searchText']?>">
            <button class="btn btn-outline-primary" type="submit" id="submit">Cari</button>
            <button class="btn btn-outline-secondary" onclick="resetSearch()"><i class="fa fa-eraser"></i></button> 
          </div> 
        </div>
        <div class="col-md-2">
        <div class="row"> 
          <div class="col-md-10">
            <select class="form-select" name="orderby" id="orderList">
              <option value="">Urutkan</option>
              <option value="inisial" <?= $order == 'inisial' ? 'selected' : '' ?>>Inisial</option>
              <option value="level" <?= $order == 'level' ? 'selected' : '' ?>>Level</option>
              <option value="nama" <?= $order == 'nama' ? 'selected' : '' ?>>Nama</option>
            </select> 
          </div>
        </div>          
      </div>
      <div class="col-md-2">
      <a style="float: right;" href="<?= base_url('addPosition') ?>" class="btn btn-sm btn-outline-primary" type="button" id="addData"><i class="bi bi-plus"></i> Jabatan   </a>
      </div>
    </div>
  </form> 
        
  <!-- Content Row -->
  <div class="row mt-2 mx-0">
    
    <table class="table table-sm table-hover table-bordered">
        <thead>
            <tr style="text-transform: uppercase; font-size: 13px; background: #ececec;">
                <th style="width:15%;">Inisial</th>
                <th>Nama</th>
                <th style="width:10%; text-align:center;">Level</th>
                <th style="width:70px; text-align:center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['dataPosition'] as $key => $val) { ?>
                <tr style="font-size: 13px;">
                    <td><?= $val['inisial'] ?></td> 
                    <td><?= $val['nama'] ?></td> 
                    <td style="text-align:center;"><?= $val['level'] ?></td> 
                    <td style="text-align: center;"> 
                        <a href="<?= base_url('editPosition/').$val['inisial'] ?>" class="text-warning bg-white"><i class="bi bi-pencil"></i></a> &nbsp;
                        <a href="#" onclick="deleteTr('<?= $val['id'] ?>','<?= $val['nama'] ?>', <?= $level_ ?>)" class="text-danger bg-white"><i class="bi bi-trash"></i></a> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table> 
  </div>  

</div>
<!-- /.container-fluid --> 

<div class="modal fade deleteTr" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Sales</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control-plaintext" id="del_kode">
         <p id="hapus"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-primary" id="btnDel">Ya</button>
      </div>
    </div>
  </div>
</div>