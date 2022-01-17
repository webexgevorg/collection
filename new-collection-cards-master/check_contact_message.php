<?php 
include "../../config/con1.php";

   if(isset($_POST['name'])){
        $name = $_POST['name'];
        //$email = $_POST['email'];
        //$discription = $_POST['discription'];
        echo $name;
         /*$sql="INSERT INTO  contact_message (name, email, message) VALUES ('$name', '$email', '$discription')";
         echo $sql;
    $query=mysqli_query($con,$sql);
    echo $query;
    if(mysqli_query($con,$sql)){
                echo "inserted";
            }else{
                echo "wrong";
            }*/
    }

   

 ?>