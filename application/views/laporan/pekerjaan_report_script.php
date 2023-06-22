<script>
    $('#btnLaporan').on('click', function() { 
        var karyawan = $('#karyawan').val()
        var divisi = $('#divisi').val()
        var jabatan = $('#jabatan').val()
        var tgl = $('#tanggal').val()
        var tgl1 = $('#tanggal1').val()
        
        bootbox.confirm('<h5>Buka Laporan Pekerjaan ?</h5>', function(res) {
            if (res) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Laporan/getLapPekerjaan') ?>',
                    dataType: 'JSON',
                    data: {
                        karyawan: karyawan,
                        div: divisi,
                        jab: jabatan,
                        tgl: tgl, tgl1 : tgl1
                    },
                    success: function(data) {
                        openRpt();
                    }
                })
            }
        })
    })

    function openRpt() {
        window.popup = window.open('<?php echo base_url('Laporan/getLapPekerjaanRpt') ?>', 'rpt', 'width=890, height=560, top=100, left=200, toolbar=1');
    }
</script>