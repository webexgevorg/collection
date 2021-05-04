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
        
        if(d=='' || n==''){
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
