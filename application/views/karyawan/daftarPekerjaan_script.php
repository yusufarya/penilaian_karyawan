<script>
    $('#addData').on('click', function() {
        $('.AddTugas').modal('show')
    })
    
    function updateTugas(id) {
        $('.UbahTugas').modal('show')

        $.ajax({
            type        : "POST",
            dataType    : "JSON",
            url         : "<?= base_url('karyawan/getTugas') ?>",
            data        : {id : id},
            success     : function(result) {
                var id = result.id
                var uraian = result.uraian_tugas
                var output = result.output_kerja
                
                $('#eid').val(id)
                $('#e_uraian').val(uraian)
                $('#e_output').val(output)
            }
        })
    }

    function deleteTugas(id) {
        $('.DelTugas').modal('show')
        $('.modal-title').text('Hapus data tugas no '+ id + ' ?')
        $('#del_id').val(id)
    }
</script>