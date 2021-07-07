$('.addNews').on('click',function(){
    let title = $('#title').val()
    let discription = $('#discription').val()
    let sporttype = $('#sporttype').val()
    let producer = $('#producer').val()
    let newstype =$('#newstype').val()
    let published=$('#published').val()
    if( $('#title').val() ==''|| $('#discription').val() ==''){
        $('#rezult').html("<p style='color:red'>Fill all the fields</p>")
        // alert()
    }else {

        $.ajax({
            type: 'POST',
            url: 'add_news_check.php',
            data: {
                title: title,
                discription: discription,
                sporttype: sporttype,
                producer: producer,
                newstype: newstype,
                published: published
            },
            success: function (rezult) {
                $('#rezult').html("<p style='color: rgb(19,57,96);font-size:20px;font-weight:bold'>"+rezult+"</p>")
            }
        })
    }
})