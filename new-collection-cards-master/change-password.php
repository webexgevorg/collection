<?php
include "config/con1.php";
	function redirect(){

	    header('location:index.php');
		exit();
	}
	if(!isset($_GET['email']) || !isset($_GET['token'])){
		redirect();
		
	}
	else{
        
		$email= mysqli_real_escape_string($con, $_GET['email']);
		$token= mysqli_real_escape_string($con, $_GET['token']);
		
		$sql="SELECT id FROM users WHERE email='$email' AND token='$token' AND isEmailConfirmed=1 AND reset_password_date>(NOW() - INTERVAL 3 HOUR)";
		$result=mysqli_query($con, $sql);
		if(mysqli_num_rows($result) > 0){
		   
			$sql_update="UPDATE users SET token='' WHERE email='$email'";
              	if(mysqli_query($con, $sql_update)){
              	 //   header('location:index.php');
              	}

	
		}
		else{
			redirect();
	    }
    }
?>

    
   <?php
include "header.php";
?>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/change-password.css">
</head>
<body class="page_fix">
    <?php include "navbar.php";?>
    <section class="change-password-sec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="col-md-6 cont-inps">
                        <div class="heade-change-password">
                            <h5 >Change password</h5>
                        </div>
     
                        <input type="password" class="password" placeholder="Password">
                        <input type="password" class="confirm_password" placeholder="Confirm password">
                        <input type="hidden" value="<?php echo $_GET['email'];?>" >
                        <button class="btn change-password">Change password</button>
                        <div class="result"></div>
                    </div>
                </div>
            </div>
        </div>
     </section>
    
     <?php
       include "footer.php";
    ?>
<script src="js/change-password.js"></script>
</body>
</html>
