<?php
include "../config/con1.php";
$message="";
	if(!empty($_POST['pass']) && !empty($_POST['conf_pass'])){
	   
	    if(strlen($_POST['pass'])>6 && strlen($_POST['conf_pass'])>6){
	       $pass=mysqli_real_escape_string($con, $_POST['pass']);
	       $confirm_pass=mysqli_real_escape_string($con, $_POST['conf_pass']);
           $email='narine@webex.am';
       
    if($pass==$confirm_pass){
        
        $pass=md5($pass);
			$sql_update="UPDATE admin SET password='$pass' WHERE email='$email'";
			if(mysqli_query($con, $sql_update)){
			   $message= 'Your password has been successfully changed';
			   ?>
			    <script> 
               setTimeout(function(){
		        location.href="index.php"
	            },1500)
               </script>
			   <?php
			}
			
		}
		else{
		    $message="Password confirmation doesn't match the password.";
		}
	
	    }
	    else{
	        $message="Make sure it's at least 6 characters.";
	    }
	}
	else{
	    $message= "Fill in password field";
	}
	echo $message;
    
?>