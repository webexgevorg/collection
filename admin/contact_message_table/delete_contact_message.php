<?php
include "../../config/con1.php";
if(isset($_POST['row_id'])){
    $row_id=$_POST['row_id'];
    $del="DELETE FROM contact_message WHERE id=$row_id";
    if(mysqli_query($con, $del) ){
        echo 1;
    }
    else{
        echo 0;
    }
    
}


?>