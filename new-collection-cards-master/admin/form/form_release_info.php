<?php
include "../../config/con1.php";
 if(isset($_POST['hidden']) && $_POST['hidden']=='info'){
   if(!empty($_POST['info'])){
     $info=mysqli_real_escape_string($con, $_POST['info']);
     $realese_name_id=mysqli_real_escape_string($con, $_POST['opt_name']);
    
          $add_info="UPDATE collections SET info='$info' WHERE id=$realese_name_id";
          if(mysqli_query($con, $add_info)){
                $message="<h5 class='text-success'>Info successfully added </h5>";
          }
    }
   else{
       $message="<h5 class='text-danger'>Fill in all filds</h5>";
   }
        
    echo $message;
  }


?>