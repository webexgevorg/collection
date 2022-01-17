$('.updateSubNews').on('click',function(){
let subnews_name=$('#subnews_name').val()
let this_id=$('#this-id').val()
alert(subnews_name+this_id)
$.ajax({
        type:'POST',
        url:'update_subnews.php',
        data:{subnews_name,this_id},
        success:function(rezult){
            $('#rezult').html("<p style='color: rgb(19,57,96);font-size:20px;font-weight:bold'>"+rezult+"</p>")
        }
        

})

})