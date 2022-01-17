<?php
include "../../config/con1.php";
if(isset($_POST['row_id']) && isset($_POST['change_news_status'])){
    $row_id=$_POST['row_id'];
    $change_news_status=$_POST['change_news_status'];
    if($change_news_status=='1'){
         $published_date=date("Y-m-d", time());
    }
    else{
        $published_date='';
    }

    $update="UPDATE news SET status=$change_news_status, published_date='$published_date' WHERE id=$row_id";
    if(mysqli_query($con, $update) ){
        echo 1;
    }
    else{
        echo 0;
    }
    
}


?>