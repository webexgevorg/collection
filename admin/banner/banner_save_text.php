<?php 
    include "../../config/con1.php";

  if($_SERVER["REQUEST_METHOD"]=="POST"){
      
  	
  	$tittle=mysqli_real_escape_string($con, $_POST['tittle']);
  	$description=mysqli_real_escape_string($con, $_POST['description']);
  	
    
     
     $sql="UPDATE banner SET tittle='$tittle', description='$description' WHERE id=1";
     mysqli_query($con, $sql);

}
   
?>