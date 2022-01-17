<?php

include "../../config/con1.php";

  if(isset($_POST['p_color'])){
      
  	$color=mysqli_real_escape_string($con, $_POST['p_color']);
  	$set_type=mysqli_real_escape_string($con, $_POST['set_type']);
  	$parallel=mysqli_real_escape_string($con, $_POST['parallel']);

  	
     
     $sql="UPDATE base_checklist SET color='$color' WHERE set_type='$set_type' and parallel='$parallel'";
     mysqli_query($con, $sql);

}
   
    // if(isset($_POST['remove_id'])){
    //     $remove_id=mysqli_real_escape_string($con, $_POST['remove_id']);
        
    //     $sql_delete="DELETE FROM sports_type WHERE id=$remove_id";
    //     mysqli_query($con, $sql_delete);
    // }
?>