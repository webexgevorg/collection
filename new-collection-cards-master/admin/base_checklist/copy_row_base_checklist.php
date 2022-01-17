<?php 
    include "../../config/con1.php";

  if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $realese_id=mysqli_real_escape_string($con, $_POST['realese_id']);
  	$id=mysqli_real_escape_string($con, $_POST['card_id']);
  	$card_number=mysqli_real_escape_string($con, $_POST['card_number']);
  	$card_name=mysqli_real_escape_string($con, $_POST['card_name']);
  	$team=mysqli_real_escape_string($con, $_POST['team']);
  	$set_type=mysqli_real_escape_string($con, $_POST['set_type']);
    $parallel=mysqli_real_escape_string($con, $_POST['parallel']);
    $print_run=mysqli_real_escape_string($con, $_POST['print_run']);
    $sort_id=mysqli_real_escape_string($con, $_POST['sort_id']);
     $array=$_POST['arr'];
     $sql="INSERT INTO base_checklist (realese_id, sort_id, card_number, card_name, team, set_type, parallel, color, print_run) VALUES ($realese_id, $sort_id, '$card_number', '$card_name', '$team', '$set_type', '$parallel', '', '$print_run')";
     if(mysqli_query($con, $sql)){
      echo "ook";
      // $sql1="SELECT id FROM base_checklist WHERE realese_id=$realese_id";
      // $res1=mysqli_query($con, $sql1);
      $k=0;
      foreach ($array as $key => $value){
          $sql_sort="UPDATE base_checklist SET sort_id=$key WHERE id=$value";
               mysqli_query($con, $sql_sort);    
        }

      // while ($row=mysqli_fetch_assoc($res1)) {
      //   $k++;
      //   $sql_up="UPDATE base_checklist SET sort_id=$k";
      //   mysqli_query($con, $sql_up);
      // }
     }

     $_SESSION['realese_id']=$realese_id;

}
