$( window ).on( "load", function() {
    let event=''
    favorite(event)
});

function favorite(data){
    let checklist_type=$('#favorite').attr('data-checklistType')
    let checklist_id=$('#favorite').attr('data-collId')
    let event=data
    console.log(event)

    $.ajax({
        'method': 'post',
        'url': 'favorite.php',
        'data': {checklist_type, checklist_id, event},
        success:function(res){
            console.log(res)
            if(res=='lode-favorite'){
                $('.star').removeClass('fa-star-o')
                $('.star').addClass('fa-star')
            }
            else if(res=='insert-favorite'){
                $('.star').removeClass('fa-star-o')
                $('.star').addClass('fa-star')
            }
            else if(res=='click-favorite'){
                $('.star').addClass('fa-star')
                $('.result-favorite').html('<div class="text-danger text-center">You have already made the checklist favorite</div>')
                $('.open-modal-favorite-result').trigger('click')
            }
            else if(res=='click-dontlogin'){
                $('.result-favorite').html('<div class="text-danger text-center">You dont log in</div>')
                $('.open-modal-favorite-result').trigger('click')
            }
           else{
            //  $('.star').addClass('fa-star-o')
                $('.star').toggleClass('fa-star')
                $('.star').toggleClass('fa-star-o')

           }
        }
    })
}
$('.favorite').on('click', function(){
    let event='click'
    favorite(event)
})