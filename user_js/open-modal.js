$('.add-folder').click(function(){
	let name=$(this).attr('data-tbl-name')
	$('.tbl-name-folder').val(name);
})

$('.add-card').click(function(){
	let name=$(this).attr('data-tbl-name')
	$('.tbl-name-card').val(name);
        let v=$('.bind-c-id').val()
        console.log(v)
        if(v==''){
            $('.inp').val('')
            $('.inp').attr('value', '')
        }
})
$('.save-folder').click(function(event){
        let n=$('.namefolder').val()
        
        if( n==''){
          event.preventDefault()
           $('.message-result').html('Fill all filds')
        }
        else{
                $(this).attr('type', 'submit')
        }
    })

$('.save-card').click(function(event){
        let n=$('.namecard').val()
        let d=$('#desc-card').val()
        let nu=$('.numbercard').val()
        let t=$('.teamcard').val()
        let p=$('.parallelcard').val()
        
        if(d=='' || n=='' || nu=='' || t=='' || p==''){
          event.preventDefault()
           $('.message-result-card').html('Fill all filds')
        }
        else{
                $(this).attr('type', 'submit')
        }
    })
let bind_card_id=$('.bind-c-id').val()
if(bind_card_id!==''){
        $('.add-card').trigger('click')
        $('.bind-c-id').val('')
}

$('.card-info-icon').click(function(e){
  e.preventDefault()
  let info_div=$(this).parents('a')
  console.log(info_div)
  let card_id=info_div.attr('data-id')
  let card_tblname=info_div.attr('data-tblname')
  let click='info'
  $.ajax({
          type: 'post',
          url: 'user_form/card-info.php',
          data: {card_id, card_tblname, click},
          success:function(res){
                  let result=JSON.parse(res)
                //   console.log(p.name)
                  $('#card-icons').find('.info-number').html(result.number)
                  $('#card-icons').find('.info-name').html(result.name)
                  $('#card-icons').find('.info-team').html(result.team)
                  $('#card-icons').find('.info-parallel').html(result.parallel)
                  $('#card-icons').find('.info-description').html(result.description)
          }
  })
})

$('.card-remove-icon').click(function(e){
    e.preventDefault()
    let info_div=$(this).parents('a')
  console.log(info_div)
  let card_id=info_div.attr('data-id')
  let card_tblname=info_div.attr('data-tblname')
    $('.modal-body-info').html("<div class='text-center' id='remove-card' data-id='"+card_id+"' data-tblname='"+card_tblname+"'> <div class='pb-2'>Do you want to delete this card?</div>"+
                                   "<button id='yes-delete' class='btn px-4 py-2 mx-2'>Yes</button>"+
                                   "<button id='no-delete' class='btn px-4 py-2 mx-2' data-dismiss='modal' aria-label='Close'>No</button>"+
                                   "<div class='delete-card-res mt-2'></div>  </div>")
})

$(document).on('click', '#yes-delete', function(){
  let card_id=$(document).find('#remove-card').attr('data-id')
  let card_tblname=$(document).find('#remove-card').attr('data-tblname')
  let click='delete'
  console.log(card_id)
  $.ajax({
          type: 'post',
          url: 'user_form/card-info.php',
          data: {card_id, card_tblname, click},
          success:function(res){
                if(res=='deleted'){
                        window.location.reload()
                }
          }
  })
})
