<?php
include "../../config/con1.php";

if(!empty($_POST['image_name'])){
    	$image_name=mysqli_real_escape_string($con, $_POST['image_name']);
    
     
     $sql="UPDATE banner SET image='$image_name' WHERE id=1";
     mysqli_query($con, $sql);

}


?>