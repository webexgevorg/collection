<?php 
    include "../../config/con1.php";

  if($_SERVER["REQUEST_METHOD"]=="POST"){
      
  	$id=mysqli_real_escape_string($con, $_POST['sport_id']);
  	$sport_type=mysqli_real_escape_string($con, $_POST['sport_type']);
  	
     
     $sql="UPDATE sports_type SET sport_type='$sport_type' WHERE id=$id";
     mysqli_query($con, $sql);

}
   
    if(isset($_POST['remove_id'])){
        $remove_id=mysqli_real_escape_string($con, $_POST['remove_id']);
        
        $sql_delete="DELETE FROM sports_type WHERE id=$remove_id";
        mysqli_query($con, $sql_delete);
    }
?>