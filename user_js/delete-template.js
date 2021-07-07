// -----------------select template or delete-----------------
$('.template-item').find('.delete-template').hide()
$('.template-item').click(function(){
  $('.template-item .temp-div').removeClass('active-template')
  $('.template-item').find('.delete-template').hide()
  $(this).find('.temp-div').addClass('active-template')
  $(this).find('.delete-template').show()
})

$('.delete-template').click(function(){
    $that=$(this).parent()
    let template_id=$(this).parent().attr('id')
    $.ajax({
        type: 'post',
        url: 'user_form/delete-template.php',
        data: {template_id},
        success: function(res){
            console.log(res)
            if(res==1){
               $that.remove()
            }
        }
    })
})