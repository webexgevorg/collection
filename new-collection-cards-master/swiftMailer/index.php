<?php
include "../header.php";
session_start();
// $password="125";
// $hashedPassword = hash('sha256', $password);
// echo $hashedPassword;
	if(isset($_POST['submit'])){
		
require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername('collection.cards2020@gmail.com')
  ->setPassword('zljyeigggmhvzhgr')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['collection.cards2020@gmail.com' => 'CollectionMyCards'])
  ->setTo([$_POST['email'] => 'A name'])
  ->setBody('Here is the message itself');

// Send the message
$result = $mailer->send($message);
if($result){
    echo "namak";
    
}
	}
// if($_SESSION['namak']=="namak"){
//     echo "new namak";
// }
?>
<link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />
<script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/login-register.css">
<form action="index.php" method="post">
	<input type="text" name="email" placeholder="Enter your email">
	<input type="submit" name="submit" value="Mail Me">

<body>
</form>

					<a href=""  data-toggle='modal' id='forgot-pass-a' data-target='#exampleModal'>
                            Forgot your password
                             </a>
                          <!--if($result){ echo 'show" style="display: block"';}-->
<!------------------------modal for Forgot your password------------------------------------>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset your password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <p>Enter your user account's verified email address and we will send you a password reset link.</p>
               <input class="mail form-control place_inp" placeholder="email">
               <p></p>
              <button class="submit btn log-in">Reset password</button>
             <div class="result"></div>
       
      </div>
    </div>
  </div>
</div>

    <?php  
    if($result){
    ?>
    <script>
        $("#exampleModal").modal('show')
    </script>
    <?php
    }
    ?>
</body>
</html>