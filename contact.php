<?php
include "header.php";
include "config/con1.php";


?>
</head>

<body>
<?php 
    include "cookie.php";
  

?>

<section style="height: 150px"></section> 
	<section  style="min-height:500px">
		<div class="container text-center justify-content-center " style="border:solid 1px;">
		<form>
			<h3 class="fw-bold">SEND US A MESSAGE</h3>
			<div class="d-flex flex-wrap justify-content-between mb-4 ">

                <div class="form-group" style="width:48%">
                  <input type="text" class="form-control py-2" id="nametext" placeholder="Your name/ID">
                </div>
                <div class="form-group" style="width:48%">
                  <input type="text" class="form-control py-2" id="email" placeholder="Email adress">
                </div>
              </div>
               <div class="form-group mb-4">
                  <textarea type="text" class="form-control py-2" placeholder="Discription:" rows="6" id="discription"></textarea>
                </div>
                <div class="d-flex justify-content-center">
                <div class="form-group" style="width:150px;">
                  <input type="submit" class="form-control py-2" id="message" value="Send message" style="background:#FAD565">
                </div>
                </div>
  </div>
  </section>
    <?php
include "footer.php";
?>
<script>
   $('#message').on('click',function(){
    var name = $("#nametext").val()
    var email = $("#email").val()
    var discription = $('#discription').val()
    alert(name+email)
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
</script>

