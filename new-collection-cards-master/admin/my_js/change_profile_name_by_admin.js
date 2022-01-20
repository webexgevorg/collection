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
table.on('click', '.chnge-name', function(e) {
    e.preventDefault();
    $tr=$(this).parent().parent()
    let name=$tr.find('.new_profile_name').text()
    let user_id=$tr.find('.user_id').text()
    let row_id=$tr.attr('data-id')
    $.ajax({
            type: "post",
            url: "change_profile_name_by_admin.php",
            data: {name, user_id, row_id },
            success: function(res){
                $('.result-modal-body').html(res)
                $('.open-change-name-modal').trigger('click')
                console.log(res)
                // location.reload()
            }
        })
    
});