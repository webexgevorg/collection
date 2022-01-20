$(document).ready(function(){
    $(".submit").click(function(){
        let mail=$('.mail').val()
        console.log(mail)
       $.ajax({
                type: "post",
                url: "reset-password.php",
                data: {email: mail},
                success: function(res){
                    $(".result").html(res)
                }
            })
    })
    
})