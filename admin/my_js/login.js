$(document).ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
        
       $(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('.login').trigger('click');
                 console.log('keypress')
             }
        });
        $(".login").click(function(){
            var log=$(".log").val();
            var pass=$(".pass").val();
            $.ajax({
                type: "post",
                url: "log_in.php",
                data: {login: log, password: pass},
                success: function(ard){
                    $("#message").html(ard)
                }
            })

        })
        
        $("#change_password_admin").click(function(){
             var a=$(this).html();
             console.log(a)
             console.log('aaa')
            $.ajax({
                type: "post",
                url: "change_password_admin.php",
                data: {change_password: a},
                success: function(ard){
                    $("#message_change_password").html(ard)
                }
            })

        })
        // -----------------add new admin password------------------------------
                $("#add_new_password").click(function(){
             var password=$(".pass").val();
            var confirm_pass=$(".confirm_pass").val();
            $.ajax({
                type: "post",
                url: "add_new_pass.php",
                data: {conf_pass: confirm_pass, pass: password},
                success: function(ard){
                    $("#message_text").html(ard)
                }
            })

        })
    });