$('.addSubNews').on('click',function(){
    let subnews=$('#subnews_name').val();

    if($('#subnews_name').val()==''){
        $('#rezult').html("<p style='color:red'>Fill all the fields</p>")
    }else{
        $.ajax({
            type:'Post',
            url:'add_subnews_check.php',
            data:{subnews},
            success:function(rezult){
                $('#rezult').html("<p style='color: rgb(19,57,96);font-size:20px;font-weight:bold'>"+rezult+"</p>")
            }

        })

    }

})
    