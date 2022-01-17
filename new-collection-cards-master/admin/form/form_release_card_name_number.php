<?php
include "../../config/con1.php";
 if(isset($_POST['hidden_card_name_number']) && $_POST['hidden_card_name_number']=='card_name_number'){

     $name_card_1=mysqli_real_escape_string($con, $_POST['name_card_1']);
     $number_card_1=mysqli_real_escape_string($con, $_POST['number_card_1']);

     $name_card_2=mysqli_real_escape_string($con, $_POST['name_card_2']);
     $number_card_2=mysqli_real_escape_string($con, $_POST['number_card_2']);

     $name_card_3=mysqli_real_escape_string($con, $_POST['name_card_3']);
     $number_card_3=mysqli_real_escape_string($con, $_POST['number_card_3']);

     $realese_name_id=mysqli_real_escape_string($con, $_POST['opt_name']);
    
          $add_card_na_nu="UPDATE collections SET name_card_1='$name_card_1', number_card_1=$number_card_1, name_card_2='$name_card_2', number_card_2=$number_card_2, name_card_3='$name_card_3', number_card_3=$number_card_3 WHERE id=$realese_name_id";
          if(mysqli_query($con, $add_card_na_nu)){
                $message="<h5 class='text-success'>Card name and number successfully added </h5>";
          }
         else{
             $message="<h5 class='text-danger'>Error</h5>";
          }
        
    echo $message;
  }


?>