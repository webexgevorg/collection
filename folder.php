<?php
session_start();

if(!empty($_SESSION['coll-id']) && !empty($_POST['folder_id'])){
    $coll_id=$_SESSION['coll-id'];
    $_SESSION['first_folders_id_array']=[];
    if($_POST['data_folder']=='first'){
        $_SESSION['first_folder_id']=$_POST['folder_id'];
    	echo 'folder';
    }
    else{
        $_SESSION['second_folder_id']=$_POST['folder_id'];
    	echo 'second-folder';
    }
}

// ------------all_cards----------------------------
 else if(isset($_POST['all_cards'])){
    $_SESSION['folders_id_array']=[];
	$all_cards=$_POST['all_cards'];
	$_SESSION['all_cards']=$all_cards;
	echo $_SESSION['all_cards'];
}
else{
   echo 0;
}
?>