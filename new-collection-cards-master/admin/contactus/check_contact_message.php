<?php 
include "../../config/con1.php";

   if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['discription'])){
        $name = $_POST['name'];
        $email=$_POST['email'];
        $discription = $_POST['discription'];
        echo $name.$email.$discription;
         $sql="INSERT INTO  contact_message (name, email, message) VALUES ('$name', '$email', '$discription')";
         //echo $sql;
    $query=mysqli_query($con,$sql);
    echo $query;
    if(mysqli_query($con,$sql)){
                echo "inserted";
            }else{
                echo "wrong";
            }
    }

   

 ?>