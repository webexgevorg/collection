$(document).ready(function(){
    $(".subscribe_btn").click(function(){
        let mail=$('.subscribe_mail').val()
        console.log(mail)
       $.ajax({
                type: "post",
                url: "subscribe.php",
                data: {email: mail},
                success: function(res){
                    $(".result").html(res)
                }
            })
    })
    
})