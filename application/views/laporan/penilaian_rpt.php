<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<div class="content-wrapper" onload='window.open("", "rpt" , " width=180,height=650" )'>
    <style>
        section {
            padding: 8px 20px;
        }

        h1,
        h3 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 3px 7px;
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <button style="background-color: #DAA520; width: 52px; height:58px; border: 0px solid #DAA520; border-radius:9px;" data-title="PRINT" onclick="cetakRkp()">
            <img src="<?php echo base_url('assets/icon/printer.svg') ?>" alt="PRINT" width="38" style="display: block;">
            <p style="display: inline; font-family: 'Courier New', Courier, monospace; font-weight: 600; font-size: 13;">Print</p>
            <!-- <i class="bi bi-printer" style="width: 50px; height:50px; "></i> -->
        </button>

        <div class="cetak">
            <br>
            <h1>Laporan Penilaian Karyawan</h1>
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <table style="margin: 20px auto 0; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 11.5px;">
                        <thead style="background-color: #DAA520;">
                            <tr>
                                <th style="text-align: left;">No.</th>
                                <th style="text-align: left;">Nik</th>
                                <th style="text-align: left;">Nama</th>
                                <th style="text-align: left;">Divisi</th>
                                <th style="text-align: left;">Jabatan</th>
                                <th></th>
                                <th style="text-align: center;"> Periode</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th style="text-align: left;" colspan="2">Pekerjaan</th>
                                <th style="text-align: left;">Output Kerja</th>
                                <th>Nilai</th>
                                <th style="text-align: left;">Ketentuan Penilaian</th>
                                <th style="text-align: left;">Sikap Kerja</th>
                                <th>Nilai</th>
                                <th style="text-align: left;">Ketentuan Penilaian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $tempkaryawan = '';
                            foreach ($dataLap as $data) {
                                $nama_karyawan = $data->namakaryawan;
                                // echo $nama_karyawan . ' == ' . $tempkaryawan . '<br>';
                                if ($nama_karyawan != $tempkaryawan) {
                            ?>
                                    <tr>
                                        <td><strong><?php echo $no++ ?></strong></td>
                                        <td><strong><?php echo $data->nik ?></strong></td>
                                        <td><strong><?php echo $nama_karyawan ?></strong></td>
                                        <td><strong><?php echo $data->divisi ?></strong></td>
                                        <td><strong><?php echo $data->jabatan ?></strong></td>
                                        <td><strong></strong></td>
                                        <td style="text-align: center;"><strong><?php echo getNamaBulan($data->bulan) . ' - ' . $data->tahun ?></strong></td>
                                    </tr>
                                <?php }
                                $tempkaryawan = $data->namakaryawan;
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2"><?php echo $data->uraian_tugas ?></td>
                                    <td><?php echo $data->output_kerja ?></td>
                                    <td><?php echo $data->nilai1 ?></td>
                                    <td><?php echo $data->ketentuan_nilai1 ?></td>
                                    <td><?php echo $data->sikap_kerja ?></td>
                                    <td><?php echo $data->nilai2 ?></td>
                                    <td><?php echo $data->ketentuan_nilai2 ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <?php if ($this->session->userdata('karyawan')) {
                        $getAtasan = $this->db->get_where('users', ['divisi_id' => 2])->row_array();
                        $namaAtasan = $getAtasan['nama'];
                        // pre($dataLap[0]->namakaryawan);
                        if ($dataLap) {
                            $karyawan = $dataLap[0]->namakaryawan;
                        } else {
                            $karyawan = '';
                        }
                    ?>
                        <div style="display: flex; font-family: Arial, Helvetica, sans-serif;">
                            <div style="margin: 0 10%;">
                                <table style="border: none; font-size: 13px;">
                                    <tr style="border: none;">
                                        <th style="border: none; text-align: center;">Pegawai</th>
                                    </tr>
                                    <tr>
                                        <th style="border: none; text-align: center;"> &nbsp; </th>
                                    </tr>
                                    <tr>
                                        <th style="border: none; text-align: center;"><?= $karyawan ?></th>
                                    </tr>
                                </table>
                            </div>
                            <div style="margin: 0 8%;">
                                <table style="border: none; font-size: 13px;">
                                    <tr>
                                        <th style="border: none; text-align: center;"> &nbsp; </th>
                                    </tr>
                                    <tr style="border: none;">
                                        <th style="border: none; text-align: center;">Atasan Pejabat Penilai,</th>
                                    </tr>
                                    <tr>
                                        <th style="border: none; text-align: center;"> &nbsp; </th>
                                    </tr>
                                    <tr>
                                        <th style="border: none; text-align: center;"><?= $namaAtasan ?></th>
                                    </tr>
                                    <tr>
                                        <td style="border: none; text-align: center;"><?= $getAtasan['nik'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div style="margin: 0 10%;">
                                <table style="border: none; font-size: 13px;">
                                    <tr style="border: none;">
                                        <th style="border: none; text-align: center;">Pejabat Penilai</th>
                                    </tr>
                                    <tr>
                                        <th style="border: none; text-align: center;"> &nbsp; </th>
                                    </tr>
                                    <tr>
                                        <th style="border: none; text-align: center;"><?= $me['nama'] ?></th>
                                    </tr>
                                    <tr>
                                        <td style="border: none; text-align: center;"><?= $me['nik'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    function cetakRkp() {
        // alert('ok')
        var isi = document.querySelector('.cetak');
        var htmlToPrint = '' +
            '<style type="text/css">' +
            'h1, h3 {' +
            'font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;' +
            'padding: 0;' +
            'margin: 0;' +
            'text-align: center;' +
            '}' +
            'table {' +
            'margin: 10px auto 0;' +
            'border-collapse: collapse;' +
            'margin-top: 20px;' +
            '}' +
            'table, td, th {' +
            'border: 1px solid black;' +
            'padding: 3px 7px;' +
            '}' +
            '</style>';

        // var htmlToPrint = '' +
        //     '<style type="text/css">' +
        //     'table th, table td {' +
        //     'border:1px solid #000;' +
        //     'padding;0.5em;' +
        //     '}' +
        //     '</style>';

        console.log(htmlToPrint);
        htmlToPrint += isi.innerHTML;
        newWin = window.open("");
        // newWin.document.write("<h3 align='center'>Print Page</h3>");
        newWin.document.write(htmlToPrint);
        newWin.print();
        newWin.close();
        // window.print()
    }
</script>