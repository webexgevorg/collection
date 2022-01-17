$('#add_news').on('submit',function(event){
    event.preventDefault()
   

        $.ajax({
            type: 'POST',
            url: 'add_news_check.php',
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success: function (rezult) {
                $('#rezult').html(rezult)
            }
        })
    
})