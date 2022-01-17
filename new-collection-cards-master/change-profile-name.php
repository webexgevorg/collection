<?php
session_start();
include "config/con1.php";
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    if(!empty($_COOKIE['user'])){
        $user_id=$_COOKIE['user'];
    }
    if(!empty($_SESSION['user'])){
        $user_id=$_SESSION['user'];
    }

    if(!empty($_POST['message']) && !empty($_POST['new_profile_name'])){
        $message=$_POST['message'];
        $new_profile_name=$_POST['new_profile_name'];
        
        $insert="INSERT INTO messages_for_change_profile_name ( user_id, new_profile_name, message) VALUES ($user_id, '$new_profile_name', '$message')";
        if(mysqli_query($con, $insert)){
            echo "<div class='text-success'>Message sent</div>";
        }
        else{
            echo "<div class='text-danger'>Something went wrong please try again later</div>";
        }
    }
    else{
        echo "<div class='text-danger'>Fill all filds</div>";
    }
}


?>