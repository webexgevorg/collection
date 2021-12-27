$("table").on('click', '.change-status', function(event) {
    event.preventDefault()
    $(this).parent().parent().css("background", "#afffafad")
    let change_contact_status=$(this).attr('id')
    let row_id = $(this).parent().attr('data-id');
    $.ajax({
        type: "post",
        url: "change_contact_message_status.php",
        data: {row_id},
        success: function(res){
            console.log(res);
        }

    })
});
$("table").on('click', '.remove', function(event) {
    event.preventDefault()
    let tr = $(this).parent().parent()
    let row_id = $(this).parent().attr('data-id');
    $.ajax({
        type: "post",
        url: "delete_contact_message.php",
        data: {row_id },
        success: function(res){
            tr.remove()
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