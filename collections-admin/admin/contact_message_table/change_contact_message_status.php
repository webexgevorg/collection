<?php
include "../../config/con1.php";
if(isset($_POST['row_id'])){
  // echo $_POST['row_id'];
    $row_id = $_POST['row_id'];
     $update="UPDATE contact_message SET status=1 WHERE id=$row_id";
    if(mysqli_query($con, $update) ){
        echo 1;
    } 
    else{
        echo 0;
    }
    
}


?>