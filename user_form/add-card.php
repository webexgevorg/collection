<?php
session_start();
include "../config/con1.php";
	if(!empty($_POST['name-card'])){
			$coll_id = $_POST['coll-id'];
			$user_id = $_SESSION['user'];
			$tbl_name = mysqli_real_escape_string($con, $_POST['tbl-name-card']);
			$description = mysqli_real_escape_string($con, $_POST['description']);
			$card_name=mysqli_real_escape_string($con, $_POST['name-card']);
			
				$array_session=array(
					"tbl_name" => $tbl_name,
					"coll_id"=>$coll_id, 
					"user_id"=>$user_id, 
					"card_name"=>$card_name,
					"description"=>$description
				);
				$_SESSION['card-info']=$array_session;
				header('Location: ../card-editor.php');
                exit;
	}
	else{
		echo 'error';
	}

?>