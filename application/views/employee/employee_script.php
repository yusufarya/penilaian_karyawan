<script> 
    function updateAdm(id, level) { 

        if(level < 2) {
            $('.UpAdm').modal('show')
            
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= base_url('Employee/getUser') ?>",
                data: { id: id},
                success: function(res) {
                    var nama = res[0].nama
                    var alamat = res[0].alamat
                    var no_telp = res[0].no_telp
                    var status = res[0].status
                    var divisi_id = res[0].divisi_id
                    var jabatan_id = res[0].jabatan_id
                    $('#Up_nama').val(nama)
                    $('#up_alamat').val(alamat) 
                    $('#up_no_telp').val(no_telp) 
                    $('#id').val(id)
                    $("#up_sts").val(status).change(); 
                    $("#up_divisi_id").val(divisi_id).change(); 
                    $("#up_jabatan_id").val(jabatan_id).change();  
                }
            })
        } else { 
            bootbox.alert('<b style="color:red;">Anda tidak memiliki akses ini</b>')
        }
    }
    
    function deleteAdm(id,nama, level) {
        if (level < 2) {
            $('.DelAdm').modal('show')
            $('#hapus').html('Yakin ingin menghapus data <b>'+nama + '</b> ?')
            $('#del_id').val(id)
        } else {
            bootbox.alert('<b style="color:red;">Anda tidak memiliki akses ini</b>')            
        }
    }
    
    $(function() {
        var level = <?= json_encode($level_) ?>;
        $('#addData').click(function() {
            if (level < 2) {
                $('.AddAdm').modal('show')            
            } else {
                bootbox.alert('<b style="color:red;">Anda tidak memiliki akses ini</b>')
            }
        })
    })
    
</script>
<script>
    $('#nama, #jenis_kel, #email, #no_telp, #alamat, #password, #jabatan_id').css('border', '1.5px solid #ececec')
    $('#nama').keyup(function() {
        $('#nama').css('box-shadow', '0px 0px 0px red')
    })
    $('#jenis_kel').change(function() {
        $('#jenis_kel').css('box-shadow', '0px 0px 0px red')
    })
    $('#email').keyup(function() {
        $('#email').css('box-shadow', '0px 0px 0px red')
    })
    $('#no_telp').keyup(function() {
        $('#no_telp').css('box-shadow', '0px 0px 0px red')
    })
    $('#alamat').keyup(function() {
        $('#alamat').css('box-shadow', '0px 0px 0px red')
    })
    $('#password').keyup(function() {
        $('#password').css('box-shadow', '0px 0px 0px red')
    })
    $('#jabatan_id').change(function() {
        $('#jabatan_id').css('box-shadow', '0px 0px 0px red')
    })
    
    $('#btn_add').on('click', function() { 
        var nama = $('#nama').val()
        var jenis_kel = $('#jenis_kel').val()
        var email = $('#email').val()
        var no_telp = $('#no_telp').val()
        var alamat = $('#alamat').val()
        var password = $('#password').val()
        var divisi_id = $('#divisi_id').val()
        var jabatan_id = $('#jabatan_id').val()
        
        if (nama == '') { 
            $('#nama').css('box-shadow', '0px 0px 5px red')
        } else if (jenis_kel == '') { 
            $('#jenis_kel').css('box-shadow', '0px 0px 5px red')
        } else if (email == '') { 
            $('#email').css('box-shadow', '0px 0px 5px red')
        } else if (no_telp == '') { 
            $('#no_telp').css('box-shadow', '0px 0px 5px red')
        } else if (alamat == '') { 
            $('#alamat').css('box-shadow', '0px 0px 5px red')
        } else if (password == '') { 
            $('#password').css('box-shadow', '0px 0px 5px red')
        } else if (jabatan_id == '') { 
            $('#jabatan_id').css('box-shadow', '0px 0px 5px red')
        } else if (divisi_id == '') { 
            $('#divisi_id').css('box-shadow', '0px 0px 5px red')
        } else {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= base_url('Employee/addEmp') ?>",
                data: {
                    nama: nama, jenis_kel: jenis_kel, email: email, no_telp: no_telp, alamat: alamat, password: password, status: '1', jabatan_id: jabatan_id, divisi_id: divisi_id
                },
                success: function(res) {
                    // alert(res)
                    $('.UpAdm').modal('hide')
                    bootbox.alert(' 1 Data Karyawan berhasil ditambahkan.. ✔️')
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                },
                error: function(res) {
                    alert(res)
                }
            })
        }
    });

    $('#btn_save').on('click', function() {
        var id = $('#id').val()
        var nama = $('#Up_nama').val()
        var notelp = $('#up_no_telp').val()
        var alamat = $('#up_alamat').val()
        var status = $('#up_sts').val()
        var divisi_id = $('#up_divisi_id').val()
        var jabatan_id = $('#up_jabatan_id').val()
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "<?= base_url('Employee/updateEmp') ?>",
            data: {
                id: id, nama: nama, alamat: alamat, no_telp: notelp, status: status, divisi_id: divisi_id, jabatan_id: jabatan_id
            },
            success: function(res) {
                // alert(res)
                $('.UpAdm').modal('hide')
                bootbox.alert(' Data berhasil diubah.. ✔️')
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            },
            error: function(res) {
                alert(res)
            }
        })
    });

    $('#btnDel').on('click', function() {
        var id = $('#del_id').val()
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "<?= base_url('Admin/deleteAdmin') ?>",
            data: { id: id },
            success: function(res) {
                $('.DelAdm').modal('hide')
                bootbox.alert(' Data ' + id + ' berhasil di hapus.. ✔️')
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
        })
    })
</script>