<?php
session_start();

if(!empty($_POST['coll_id'])){
	$folders_id_array=$_POST['folders_id_array'];

	if($_POST['tbl_name']=='card2'){
        $_SESSION['folders_id_array']=$folders_id_array;
	}
	else{
        $_SESSION['first_folders_id_array']=$folders_id_array;
	}
}

?>