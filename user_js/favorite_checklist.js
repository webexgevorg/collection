$(".fa-trash").click(function() {
    let checklist_id = $(this).parent().parent().attr("data-collid")
    $(this).parent().parent().remove()
    $.post(
        "Checklist-php/delete.php",
        {checklist_id: checklist_id},
        function (result) {
            $(".delete").html(result)
        }
    )
})