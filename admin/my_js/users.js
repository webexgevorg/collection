$("#users_search").on("input", function () {
    let search = $("#users_search").val()
    $.post(
        "search.php",
        {search},
        function (result) {
            $(".status").html(result)
        }
    )
})



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