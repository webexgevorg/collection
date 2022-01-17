
$("table").on("click", ".disabled", function() {
    let tr=$(this).parent().parent()
    let id = tr.attr("data-id")
    let icon = $(this).parent().find("i").attr("data-disabled")

    if(icon == 0) {
        $(this).parent().find("i").attr("data-disabled", 1)
    }else {
        $(this).parent().find("i").attr("data-disabled", 0)
    }

    $(this).toggleClass('fa-check-circle')
    $(this).toggleClass('fa-minus-circle')
    
    $(tr).toggleClass('disabled_tr')
    $.post(
        "disabled_user.php",
        {id, icon},
        function (ardyunq) {
            $(".status").html(ardyunq)
        }
    )
})







