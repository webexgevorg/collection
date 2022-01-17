<?php
include "../config/con1.php";
	if(!empty($_POST['name-folder'])){
			$coll_id = $_POST['coll-id'];
			$name_folder = mysqli_real_escape_string($con, $_POST['name-folder']);
			$tbl_name=$_POST['tbl-name'];
			if(isset($_POST['first-folder-id'])){
				$first_folder_id=$_POST['first-folder-id'];
				$sql = "INSERT INTO $tbl_name (first_folder_id, coll_id, name_of_folder) VALUES ($first_folder_id, $coll_id, '$name_folder')";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:../user-folder.php');
					exit();
				}
			}
			else{
				$sql = "INSERT INTO $tbl_name (coll_id, name_of_folder)	VALUES ($coll_id, '$name_folder')";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:../user-collection.php?coll-id='.$coll_id);
					exit();
				}
			}
	}
	else{
		echo 'error';
	}
?>