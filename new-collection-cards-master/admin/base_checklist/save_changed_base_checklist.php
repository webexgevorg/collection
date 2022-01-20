<?php 
    include "../../config/con1.php";

  if($_SERVER["REQUEST_METHOD"]=="POST"){
      
  	$id=mysqli_real_escape_string($con, $_POST['card_id']);
  	$card_number=mysqli_real_escape_string($con, $_POST['card_number']);
  	$card_name=mysqli_real_escape_string($con, $_POST['card_name']);
  	$team=mysqli_real_escape_string($con, $_POST['team']);
  	$set_type=mysqli_real_escape_string($con, $_POST['set_type']);
    $parallel=mysqli_real_escape_string($con, $_POST['parallel']);
    $print_run=mysqli_real_escape_string($con, $_POST['print_run']);
    
     
     $sql="UPDATE base_checklist SET card_number='$card_number', card_name='$card_name', team='$team', set_type='$set_type', parallel='$parallel', print_run='$print_run' WHERE id=$id";
     mysqli_query($con, $sql);

}
   if(isset($_POST['index1'])){
    	$sort_num=mysqli_real_escape_string($con, $_POST['index1']);
        $array=$_POST['array'];
       
        foreach ($array as $key => $value){
         	$sql_sort="UPDATE base_checklist SET sort_number=$key WHERE id=$value";
               mysqli_query($con, $sql_sort);    
        }

        }
        
    if(isset($_POST['remove_id'])){
        $remove_id=mysqli_real_escape_string($con, $_POST['remove_id']);
        
        $sql_delete="DELETE FROM base_checklist WHERE id=$remove_id";
        mysqli_query($con, $sql_delete);
    }
?>