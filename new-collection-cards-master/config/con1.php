<?php
	//$con=new mysqli('localhost','collection','collection@2020','collection');
  	 $con=new mysqli('localhost','root','','collection');
	if($con){
		mysqli_query($con,"SET NAMES 'utf8'");	
		//echo "we have connection";
		
	}else{
		echo "something went wrong";
	}
?>
