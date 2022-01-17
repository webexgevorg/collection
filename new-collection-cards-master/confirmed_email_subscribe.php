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
		
		$sql="SELECT id FROM subscribe_news_home WHERE email='$email' AND token='$token'";
		$result=mysqli_query($con, $sql);
		if(mysqli_num_rows($result) > 0){
		   
			$sql_update="UPDATE subscribe_news_home SET token='', is_email_confirmed=1 WHERE email='$email'";
              	if(mysqli_query($con, $sql_update)){
              	    header('location:./');
              	}
              	     
		}
		else{
			redirect();
	    }
    }
?>

    
   