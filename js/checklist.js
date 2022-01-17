$('body').on('click', '.tr_checklist', function(){
    if($("table").attr("data-name") == "collections") {
        let coll_id=$(this).attr('data-collId')
        let year_prod=$('#checklists').attr('data-year')
        let product=$('#checklists').attr('data-product')
        let sport_type=$('#checklists').attr('data-sport')
        $.ajax({
            type: 'post',
            url: 'navbar_products.php',
            data: {coll_id, year_prod, sport_type, product},
            success: function(ar){
                $("#nav").html(ar)
            }
        })
    }else {
        let coll_id=$(this).attr('data-collId')
        $.ajax({
            type: 'post',
            url: 'navbar_products.php',
            data: {coll_id},
            success: function(ar){
                $("#nav").html(ar)
            }
        })
    }
})

$('body').on('click', '.pg-link', function(event){
    event.preventDefault()
    let count_rows=$('#num-rows').attr('data-rows')
    let page_table=$(this).attr('data-value')*1
    let limit=20;
    let table_name = $(".table").attr("data-name")
    
// --------- for pagination ------------
    $.ajax({
        'method': 'post',
        'url': 'post_pagination.php',
        'data': {page_table, count_rows, limit},
        success:function(result){
            $('.pagination').html(result)
        }
    })
// --- ------- for table -----------------
    $.ajax({
        'method': 'post',
        'url': 'post_table.php',
        'data': {page: page_table, limit, table_name},
        success:function(res){
            $('#num-rows').html(res)

        }
    })
})

$("body").on("click", ".remove", function() {
    let tr = $(this).parent().parent()
    let id = $(tr).attr("data-collId")
    $(".notification_modal").css("display", "flex")
    $(".notification_remove_id").val(id)
    $("body").css("overflow", "hidden")
    // $.post(
    //     "Checklist-php/delete_custom.php",
    //     {id},
    //     function (res) {
    //         $(".status").html(res)
    //         console.log(res)
    //     }
    // )
})

$(".cancel").click(function () {
    $(".notification_modal").css("display", "none")
    $("body").css("overflow", "auto")
})

$(".delete_checklist").click(function () {
    let check_id = $(".notification_remove_id").val()
    $(".notification_modal").css("display", "none")
    $("body").css("overflow", "auto")
    $(".search_from_table").find("[data-collId ='" + check_id + "']").remove()
    $.post(
        "Checklist-php/delete_custom.php",
        {check_id},
        function (res) {
            $(".status").html(res)
            console.log(res)
        }
    )
})