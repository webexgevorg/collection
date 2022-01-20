var table = $('#datatables').DataTable();
table.on('click', '.remove', function(e) {
    e.preventDefault();
    $tr=$(this).parent().parent()
    let row_id = $(this).parent().attr('data-id');
    $.ajax({
            type: "post",
            url: "delete_news.php",
            data: {row_id },
            success: function(res){
                $tr.remove()
                // location.reload()
            }
        })
    
});
// ------------change-status----------------------
table.on('click', '.change-status', function(e) {
    e.preventDefault();
    $tr=$(this).parent().parent()
    let change_publications_status=$(this).attr('name')
    console.log(change_publications_status)
    let row_id = $(this).parent().attr('data-id');
   
    $.ajax({
            type: "post",
            url: "change_publications_status.php",
            data: {row_id, change_publications_status },
            success: function(res){
                $tr.remove()
                console.log(res)
                // location.reload()
            }
        })
    
});