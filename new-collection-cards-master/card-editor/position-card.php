<?php
include "../config/con1.php";

if(isset($_POST['top']) && isset($_POST['left'])){

	$left=$_POST['left'];
	$top=$_POST['top'];
	$card_id=$_POST['card_id'];
	$user_id=$_POST['user_id'];

	echo $user_id;
	$update_position="UPDATE `cards` SET `top`=$top,`left`=$left WHERE user_id=$user_id AND id=$card_id";
	if(mysqli_query($con, $update_position)){
		echo 'ok';
	}
	else{
		echo 'no';
	}
}


?>