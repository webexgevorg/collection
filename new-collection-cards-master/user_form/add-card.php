<?php
session_start();
include "../config/con1.php";
	if(!empty($_POST['name-card'])){
			$coll_id = $_POST['coll-id'];
			$user_id = $_SESSION['user'];
			$tbl_name = mysqli_real_escape_string($con, $_POST['tbl-name-card']);
			$bind_coll_id= mysqli_real_escape_string($con, $_POST['bind_coll_id']);
            $bind_card_id=mysqli_real_escape_string($con, $_POST['bind_card_id']);
			$description = mysqli_real_escape_string($con, $_POST['description']);
			$card_name=mysqli_real_escape_string($con, $_POST['name-card']);
			$card_number=mysqli_real_escape_string($con, $_POST['number-card']);
			$card_team=mysqli_real_escape_string($con, $_POST['team-card']);
			$card_parallel=mysqli_real_escape_string($con, $_POST['parallel-card']);
			
			
			if(isset($_POST['folder_id'])){
				$folder_id=mysqli_real_escape_string($con, $_POST['folder_id']);
			}
			else{
				$folder_id="''";
			}
				$array_session=array(
					"tbl_name" => $tbl_name,
					"coll_id"=>$coll_id, 
					"folder_id"=>$folder_id,
					"bind_coll_id" => $bind_coll_id,
					"bind_card_id" => $bind_card_id,
					"user_id"=>$user_id, 
					"card_name"=>$card_name,
					"card_number"=>$card_number,
			        "card_team"=>$card_team,
			        "card_parallel"=>$card_parallel,
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