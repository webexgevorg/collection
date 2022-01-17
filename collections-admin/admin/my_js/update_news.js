$('#updateNews').on('submit',function(event){
     event.preventDefault()
        $.ajax({
            type: 'POST',
            url: 'update_news.php',
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success: function (rezult) {
                $('#rezult').html("<p style='color: rgb(19,57,96);font-size:20px;font-weight:bold'>"+rezult+"</p>")
            }
        })
    
})