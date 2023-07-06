<?php
$data = json_decode(json_encode($pageInfo), True);
$level_ = $data['me']['jabatan_id'];
$namaKaryawan = $data['listPenilaian'][0]['namakaryawan'];
$nik = $data['listPenilaian'][0]['nik'];

$cekDataExist =  $this->db->get_where('penilaian', ['nik' => $nik])->num_rows();
if ($cekDataExist > 0) {
    $action = '1';
    $data['listPenilaian'] = $this->Penilaian_model->listPenilaianKaryawan('', '', $nik);
} else {
    $action = '0';
}
?>
<!-- Begin Page Content -->
<div class="container-fluid" style="height: 100vh;">

    <div class="row">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h4 mb-2 text-dark"><?= $data['title'] ?></h3>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row mt-2 p-3">

        <div class="col">
            <h6 class=" mb-3">Nama Karyawan &nbsp; : &nbsp; <?= $namaKaryawan ?></h6>
        </div>

        <form action="<?= base_url('updateNilaiKaryawan') ?>" method="post">
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <tr style="text-transform: capiltal; font-size: 13px; background: #ececec;">
                        <th style="width: 3%;">No.</th>
                        <th>Uraian Tugas</th>
                        <th style="width: 110px;">Output Kerja</th>
                        <th style="width: 60px;">Nilai</th>
                        <th style="width: 160px;">Ketentuan Penilaian</th>
                        <th style="width: 110px;">Sikap Kerja</th>
                        <th style="width: 60px;">Nilai</th>
                        <th style="width: 160px;">Ketentuan Penilaian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data['listPenilaian'] as $key => $val) {
                        if ($action == '1') {
                            $pekerjaan_id = $val['pekerjaan_id'];
                            $nilai1 = $val['nilai1'];
                            $ketentuan_nilai1 = $val['ketentuan_nilai1'];
                            $sikap_kerja = $val['sikap_kerja'];
                            $nilai2 = $val['nilai2'];
                            $ketentuan_nilai2 = $val['ketentuan_nilai2'];
                            $bulan = $val['bulan'];
                            $tahun = $val['tahun'];
                            $komentar = $val['komentar'];
                        } else {
                            $pekerjaan_id = $val['id'];
                            $nilai1 = '';
                            $ketentuan_nilai1 = '';
                            $sikap_kerja = '';
                            $nilai2 = '';
                            $ketentuan_nilai2 = '';
                            $bulan = '';
                            $tahun = '';
                            $komentar = '';
                        }
                    ?>
                        <tr style="font-size: 13px;">
                            <td><?= $no++; ?> <input type="hidden" name="nik[]" value="<?= $val['nik'] ?>"></td>
                            <td><?= $val['uraian_tugas'] ?> <input type="hidden" name="pekerjaan_id[]" value="<?= $pekerjaan_id ?>"></td>
                            <td><?= $val['output_kerja'] ?></td>
                            <td><input type="text" name="nilai1[]" id="nilai1" style="width: 50px;" placeholder="A" value="<?= $nilai1 ?>"></td>
                            <td><input type="text" name="ketentuan_nilai1[]" id="ketentuan_nilai1" style="width: 180px;" value="<?= $ketentuan_nilai1 ?>"></td>
                            <td><input type="text" name="sikap_kerja[]" id="sikap_kerja" style="width: 140px;" value="<?= $sikap_kerja ?>"></td>
                            <td><input type="text" name="nilai2[]" id="nilai2" style="width: 50px;" placeholder="0" value="<?= $nilai2 ?>"></td>
                            <td><input type="text" name="ketentuan_nilai2[]" id="ketentuan_nilai2" style="width: 180px;" value="<?= $ketentuan_nilai2 ?>"></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
            <b>Catatan :</b>
            <textarea name="komentar" class="form-control" placeholder="Catatan..." id="komentar" cols="10" rows="4" style="width: 50%;"><?= $action == '1' ? $data['listPenilaian'][0]['komentar'] : '' ?> </textarea>
            <hr>
            <div>
                <a href="<?= base_url('penilaian') ?>" class="text-decoration-none"> <i class="bi bi-backspace-fill"></i> Kembali</a>
                <button type="submit" class="btn btn-success" style="float: right;">Simpan Penilaian</button>
            </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->