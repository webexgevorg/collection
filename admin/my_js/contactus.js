 $('#message').on('click',function(){
    var name = $("#nametext").val()
    var email = $("#email").val()
    var discription = $('#discription').val()
    alert(name+email+discription)
       $.ajax({
        type:'POST',
        url:'check_contact_message.php',
        data: { name: name,
                email: email,
                discription: discription
                },
                success:function(result){
                console.log(result)
                }
           
    })

})