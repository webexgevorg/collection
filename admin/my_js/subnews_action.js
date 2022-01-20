var table = $('#datatables').DataTable();
table.on('click', '.remove', function(e) {
    
    e.preventDefault();
    alert()
    $tr=$(this).parent().parent()
    let row_id = $(this).parent().attr('data-id');

    alert(row_id)
    $.ajax({
            type: "post",
            url: "delete_subnews.php",
            data: {row_id },
            success: function(res){
                $tr.remove()
                // location.reload()
            }
        })
    
});