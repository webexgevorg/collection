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

$("body").on("click", ".select_user", function() {
    let id = $(this).parent().parent().attr("data-id")
    location.assign("about_user.php?user_id=" + id)
})

$(".fa-level-up").click(function () {
    location.assign("users.php")
})

$('.ic_des img').on('click',f1);

function f1() {
    let img_url = $(this).parent().attr("data-url")
    let sport_logo=$(".add_achivment").find("[data-url ='" + img_url + "']")
    console.log(sport_logo.length)
    let id = $(".hidden").val()
    let content = '<div data-url="' + img_url + '" class="users_achivment"><img src="../sport_icons/' + img_url + '.png" ></div>'
    if(sport_logo.length==0){
        $(".add_achivment").append(content)
        $.post(
            "add_users_achivments.php",
            {id, img_url },
            function (result) {
                $(".status").html(result)
            }
        )
    }



}

$("body").on("click", ".users_achivment img", function (){
    $(this).parent().remove()
    let id = $(".hidden").val()
    let img1_url = $(this).parent().attr("data-url")
    let delete_icon = $(".delete_achivment").find("[data-url ='" + img1_url + "']").find("img")
    $(delete_icon).on("click", f1)
    $.post(
        "delete_users_achivments.php",
        {id, img1_url },
        function (res) {
            $(".status").html(res)
        }
    )
})