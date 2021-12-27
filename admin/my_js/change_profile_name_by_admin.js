$("table").on('click', '.remove', function(e) {
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
$("body").on('click', '.chnge-name', function(e) {
    alert()
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


$('body').on('click', '.pg-link', function(event){
    event.preventDefault()
    let table_name = $(".users_table").attr("data-name")
    let count_rows=$('#num-rows').attr('data-rows')
    let page_table=$(this).attr('data-value')*1
    let limit=20;

// --------- for pagination ------------
    $.ajax({
        'method': 'post',
        'url': '../post_pagination.php',
        'data': {page_table, count_rows, limit},
        success:function(result){
            $('.pagination').html(result)
        }
    })
// --- ------- for table -----------------
    $.ajax({
        'method': 'post',
        'url': '../post_table.php',
        'data': {page: page_table, limit, table_name},
        success:function(res){
            $('#num-rows').html(res)

        }
    })
})