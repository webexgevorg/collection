$('.add-folder').click(function(){
	let name=$(this).attr('data-tbl-name')
	$('.tbl-name-folder').val(name);
})

$('.add-card').click(function(){
	let name=$(this).attr('data-tbl-name')
	$('.tbl-name-card').val(name);
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
