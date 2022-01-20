<?php
include "../../config/con1.php";
if(isset($_POST['row_id']) && isset($_POST['change_publications_status'])){

    $row_id=$_POST['row_id'];
 
    $change_publications_status=$_POST['change_publications_status'];
    if($change_publications_status=='1'){
         $published_date=date("Y-m-d", time());
    }
    else{
        $published_date='';
    }

   echo    $update="UPDATE publications SET status=$change_publications_status, published_date='$published_date' WHERE id=$row_id";
    if(mysqli_query($con, $update) ){
        echo 1;
    }
    else{
        echo 0;
    }
    
}


?>