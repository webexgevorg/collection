<?php
include "../../config/con1.php";
if(isset($_POST['select_name_collection'])){
// 	$name=mysqli_real_escape_string($con, $_POST['select_name_collection']);
	$collection_id=mysqli_real_escape_string($con, $_POST['collection_id']);
	echo $collection_id;

}else{
	$collection_id=1;
}

?>