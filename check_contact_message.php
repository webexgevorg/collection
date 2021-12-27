<?php 
include "config/con1.php";
   if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['discription'])){
        $email=$_POST['email'];
        $name = $_POST['name'];
        $discription = $_POST['discription'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql="INSERT INTO  contact_message (name, email, message) VALUES ('$name', '$email', '$discription')";
            $query=mysqli_query($con,$sql);
            if($query){
                echo "<p class='green'>Your message has been sent. Thanks you for contacting us</p>";
//                echo "<script>setTimeout(function(){location.reload()}, 400)</script>";
            }else{
                echo "<p class=red'>Your message has not been sent. Please try again later</p>";
            }
        }else {
           echo "<p class='red'>Incorect e-mail address</p>";
        }

   }else {
       echo "<p class='red'>Fill in all fields</p>";
   }
 ?>