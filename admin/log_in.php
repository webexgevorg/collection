<?php 
session_start();
include "../config/con1.php";
if(!empty($_POST['login']) && !empty($_POST['password'])){
	$login=$_POST['login'];
	$pass=$_POST['password'];
	$pass=md5($pass);
	$sql="SELECT * FROM admin WHERE login='$login' and password='$pass'";
	$result=mysqli_query($con, $sql);
	$num_row=mysqli_num_rows($result);
	if($num_row==1){
		$row=mysqli_fetch_assoc($result);
		$_SESSION['login']=$login;
		
	    echo "Successful login";
            ?>
               <script> 
               setTimeout(function(){
		        location.href="base_checklist/base_checklist.php"
	            },1000)
               </script>
		    <?php
	}
	else{
	echo "Invalid login or password";
	}
	

}
else{
	echo "Fill the form";
}

?>