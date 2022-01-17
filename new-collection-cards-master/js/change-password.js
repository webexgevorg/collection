$(document).ready(function(){
    $(".change-password").click(function(){
        let password=$('.password').val()
        let confirm_password=$('.confirm_password').val()
        let mail=$('input[type="hidden"]').val()
       console.log(confirm_password)
       console.log(mail)
       $.ajax({
                type: "post",
                url: "confirm-change-password.php",
                data: {pass: password, conf_pass: confirm_password, email: mail},
                success: function(res){
                    $(".result").html(res)
                }
            })
    })
    
})