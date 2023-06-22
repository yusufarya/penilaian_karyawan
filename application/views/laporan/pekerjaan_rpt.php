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
            <h1>Laporan Pekerjaan Karyawan</h1>
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <table style="margin: 20px auto 0; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 12px;">
                        <thead style="background-color: #DAA520;">
                            <tr>
                                <th>No.</th>
                                <th>Nik</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Jabatan</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <!-- <th></th> -->
                                <th colspan="2">Pekerjaan</th>
                                <th>Output Kerja</th>
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
                                        <td><strong><?php echo date('d-m-Y', strtotime($data->tanggal)) ?></strong></td>
                                        <td><strong><?php echo $nama_karyawan ?></strong></td>
                                        <td><strong><?php echo $data->divisi ?></strong></td>
                                        <td><strong><?php echo $data->jabatan ?></strong></td>
                                    </tr>
                                <?php }
                                $tempkaryawan = $data->namakaryawan;
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2"><?php echo $data->uraian_tugas ?></td>
                                    <td><?php echo $data->output_kerja ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
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