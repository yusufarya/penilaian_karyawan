<script>
    function modalDtail(id, level) {
        $('#modal-detail').modal('show')
        $('#modal-detail .table #content').html('')

        $.ajax({
            type    : "POST",
            dataType: "JSON",
            url     : "<?= base_url('penilaian/detailTugas') ?>",
            data    : {id_user : id},
            success : (dataDetail) => {
                var row = '';
                dataDetail.forEach(function(data) {
                    var namakaryawan = data.namakaryawan
                    var uraian_tugas = data.uraian_tugas
                    var output_kerja = data.output_kerja

                    row += `<tr>`+
                                `<td>`+namakaryawan+`</td>`+
                                `<td>`+uraian_tugas+`</td>`+
                                `<td>`+output_kerja+`</td>`+
                            `</tr>`;
                })
                $('#modal-detail .table #content').append(row)
            }
        })
    }
</script>