<?php 
include "../../config/con1.php";

   if(isset($_POST['title']) && isset($_POST['discription']) && isset($_POST['id'])){
        $title = $_POST['title'];
        $discription = $_POST['discription'];
        $id=$_POST['id'];
        //echo $title.$discription.$id;
         $sql="UPDATE  aboutus set title='$title', discription='$discription' WHERE id=$id";
         //echo $sql;
    $query=mysqli_query($con,$sql);
    echo $query;
    if(mysqli_query($con,$sql)){
                echo "updated";
            }else{
                echo "wrong";
            }
    }

   

 ?>