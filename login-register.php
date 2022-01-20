<?php

include "header.php";
include "config/con1.php";

        if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
            header('location:profile-page.php');
        }
     

$msg = '';
 if(isset($_POST['login'])){
    $name = $con-> real_escape_string($_POST['name']);
	$password = $con-> real_escape_string($_POST['password']);
	$password=md5($password);
    if($name=='' || $password==''){
		$msg="Please check your inputs!";
		
	}else{
	    
		$object=mysqli_query($con,"SELECT*FROM users where name='$name' and password='$password'");
        $fetch=mysqli_fetch_assoc($object);

        if(mysqli_num_rows($object)==0){
            $msg='Wrong name or password';
        }else{
            if(!empty($fetch["active"]) && $fetch["active"] == 1) {

                if($fetch['isEmailConfirmed']==0){
                    $msg="Please verify your email!";
                }
                else{
                    $msg="You have been logged in!";
                    session_start();

                    $_SESSION['user']=$fetch['id'];

                    if(isset($_POST['remember'])){
                        setcookie('user',$fetch['id'],time()+86400*30);

                    }
                    $date = date("Y-m-d h:i:s");
                    $user_id = $_SESSION['user'];
                    $sql = "UPDATE `users` SET login_date='$date' Where id=$user_id";
                    mysqli_query($con, $sql);

                    echo "<script>location.href='./profile.php'; </script>";
                    //header('http://localhost/collection-cards/profile-page.php');

                }
            }else {
                $msg = "The administration has blocked your account";
            }
        }


	}
}

?> 

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/login-register.css">

</head>
<body>
    <?php include "navbar.php"; ?>
<section class="log-reg">
	<div class="container">
		<div class="row">
			 <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
			 	<div class="login">
			 		<div class="header-log">
			 			<p class="first-par text-center">LOG IN</p>
			 		</div>
			 		<div class="divpad">
			 		   
			 			<form id="login" method='post' action=''>
			 				<br>
				 			<p class="parag-log">Welcome back,please login<br>to your account <?php echo @$row['name'];?></p>
				 			<br>
				 			<div class="input-group dvlog">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user inp7" aria-hidden="true"></i></span>
							</div>
							<input type="text" placeholder="Name/Nickname" class="form-control place_inp" name="name"  class="inpname">
							</div>
							<br>
							<div class="input-group dvlog">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-lock inp7" aria-hidden="true"></i></span>
							</div>
							<input type="password" name="password" class="form-control place_inp" placeholder="Password" >
							</div>
							<div class="checkbox checkbox-primary check">
							<input id="checkbox_remember" type="checkbox" name="remember"<?php if(isset($_COOKIE['user'])){echo 'checked';}?>>
							<label for="checkbox_remember" class="label"> Remember me</label>
							</div>
							<p></p>
							<button class="btn log-in" name='login'>LOG IN</button>
							<p></p>
						    <p class="center forgot-p">
						      <a href=""  data-toggle="modal" id="forgot-pass-a" data-target="#exampleModal">
                               Forgot your password?
                             </a>
                            </p>
							<?php if($msg!='') echo $msg."<br></br>";?></p>
			 			</form>
			 			
			 		</div>
			 	</div>
			 </div>
			 <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 log" align="center">
			 	<div class="login">
			 		<div class="header-log">
			 			<p class="first-par">REGISTER</p>
			 		</div>
			 		<div class="divpad">
			 			<form action=''>
				 			<p class="parag-log mt-4">Let's get you in board</p>
				 			<div class="input-group dvlog">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-user inp7" aria-hidden="true"></i></span>
								</div>
								<input type="text" placeholder="Name/Nickname" class="form-control place_inp" name="name" id="name" class="inpname">
							</div>
							
							<div class="input-group dvlog dvmarg">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-map-marker inp7" aria-hidden="true"></i></span>
								</div>
								
                                <select class="selectpicker countrypicker selpiker" data-flag="true" name='country' id="country" ></select>
                            </div>
							<div class="input-group dvlog dvmarg">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-map-marker inp7" aria-hidden="true"></i></span>
							</div>
							<input type="text" placeholder="City" class="form-control place_inp" name="city"  id="city">
							</div>

							<div class="input-group dvlog dvmarg">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-envelope-o inp7" aria-hidden="true"></i></span>
							</div>
							<input type="email" placeholder="Email" class="form-control place_inp" name="email"  class="inpname" id="email">
							</div>
							
							<div class="input-group dvlog dvmarg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock inp7" aria-hidden="true"></i></i></span>
                                </div>
							    <input type="password" name="password" class="form-control place_inp" placeholder="Password" id="password">
							</div>
							
							<div class="input-group dvlog dvmarg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock inp7" aria-hidden="true"></i></i></span>
                                </div>
							    <input type="password" name="confirm_password" class="form-control place_inp" placeholder="Confirm Password" id="cpass" >
							</div>
                            <div class="input-group dvlog dvmarg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar inp8" aria-hidden="true"></i></i></span>
                                </div>
                                <input type="date" name="date" class="form-control place_inp" id="bday" style="color: #6ea4ae">
                            </div>
                            <br>
						</form>
						<button class="btn log-in" name="register" id="register">REGISTER</button>
						<p></p>
						<div id="ard"></div>
			 		</div>
			 	</div>
			 </div>
		</div>
	</div>
</section>

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
<!------------------------modal for SUCCESS------------------------------------>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <button class="btn log-in" style="height:100px;font-size:20px"><p>Your mail has been sent successfully</p>
              <p>Please Verify Your Email Address</p></button>
              <p></p>
              <!-- <input class="mail form-control place_inp" placeholder="email">
               <p></p>
              <button class="submit btn log-in">Reset password</button>-->
             <div class="result"></div>
       
      </div>
    </div>
  </div>
</div>

<?php
include "footer.php";
?>
 
<script src="js/reset-password.js"></script>
<script src="js/register.js"></script>

<script>
    $('.countrypicker').countrypicker();
  </script>
  
</body>
</html>