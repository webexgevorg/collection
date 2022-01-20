$('.updatePublication').on('click',function(){
    let title = $('#title').val()
    let discription = $('#discription').val()
    let sporttype = $('#sporttype').val()
    let producer = $('#producer').val()
    let newstype =$('#newstype').val()
    let this_id=$('#this-id').val()
    console.log(discription)
    if( $('#title').val() ==''|| $('#discription').val() ==''){
        $('#rezult').html("<p style='color:red'>Fill all the fields</p>")
        // alert()
    }else {

        $.ajax({
            type: 'POST',
            url: 'update_publications.php',
            data: {
                title, discription, sporttype, producer, newstype, this_id
            },
            success: function (rezult) {
                $('#rezult').html("<p style='color: rgb(19,57,96);font-size:20px;font-weight:bold'>"+rezult+"</p>")
            }
        })
    }
})