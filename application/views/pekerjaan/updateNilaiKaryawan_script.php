<script>
    $('td').on('keyup', function() {
        var row_index = $(this).parent().index();
        var col_index = $(this).index();
        var thisVal = $(this).parent().find('#nilai2').val()
        console.log(thisVal)
        if (thisVal >= 5) {
            $(this).parent().find('#ketentuan_nilai2').val('Sangat Baik')
        } else if (thisVal < 5) {
            $(this).parent().find('#ketentuan_nilai2').val('Baik')
        }
    });
</script>