<?php
include "header.php";
include "config/con1.php";


?>
</head>
<style type="text/css">

  #sec{
    height: 150px;
  }
  @media only screen and (max-width: 1000px) {
    #sec{
      height: 50px;
    }
  }
</style>
<body>
<?php 
    include "cookie.php";
  

?>
<section id="sec"></section> 
  <section  style="min-height:500px">
    <div class="container text-center justify-content-center ">
    <form>
      <h3 class="fw-bold mb-4">SEND US A MESSAGE</h3>
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
    </form>
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
</script>