<?php
include "header.php";
include "config/con1.php";


?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/my_checklist.css">
<style>
    .red {
        color: red;
    }

    .green {
        color: green;
    }

</style>

</head>

<body>
<?php 
    include "cookie.php";
  

?>

<section style="height: 150px"></section> 
	<section  style="min-height:500px">
		<div class="container text-center justify-content-center">
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
            </form>
               
            </div>
            <div class="d-flex justify-content-center">
                <div class="form-group" style="width:150px;">
                  <input type="submit" class="form-control py-2" id="message" value="Send message" style="background:#FAD565">
            </div>
            </div>

        <div class="result"></div>

  </section>
  <footer>
    <?php
        include "footer.php";
    ?>
  </footer>
       
   </body>
<script>
    $('#message').on('click',function(event){
        event.preventDefault()
        let name = $("#nametext").val()
        let email = $("#email").val()
        let discription = $('#discription').val()
        $.ajax({
            type:'POST',
            url:'check_contact_message.php',
            data: { name, email, discription },
            success:function(result){
                $(".result").html(result)
            }
        })
    })
</script>
