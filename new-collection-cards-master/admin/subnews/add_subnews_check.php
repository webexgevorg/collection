
<?php
include "../../config/con1.php";
// include "../heder.php";

if(isset($_POST['subnews'])){
    $subnews=$_POST['subnews'];
   $sql1="INSERT INTO subnews (subnews_name) VALUES('$subnews')";
    $query=mysqli_query($con,$sql1);
    if($query){
        echo "The record has been successfully inserted";
    }else{
        echo "no".mysqli_error();
    }
}


?>
