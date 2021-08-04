<?php
session_start();
include "../config/con1.php";
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
  if(!empty($_COOKIE['user'])){
      $user_id=$_COOKIE['user'];
  }
  if(!empty($_SESSION['user'])){
      $user_id=$_SESSION['user'];
  }
}
if(isset($_POST['click']) && $_POST['click']=='info'){
    $card_id=$_POST['card_id'];
    $card_tblname=$_POST['card_tblname'];
    $sel="SELECT id, name, number, team, parallel, description FROM $card_tblname WHERE id=$card_id";
    $res=mysqli_query($con, $sel);
    $res_info=mysqli_fetch_object($res);
    // print_r($res_info);
    echo json_encode( $res_info);
}

// ----------------delete card-------------
if(isset($_POST['click']) && $_POST['click']=='delete'){
    $card_id=$_POST['card_id'];
    $card_tblname=$_POST['card_tblname'];
    $sel="SELECT id, image, card_json_name FROM $card_tblname WHERE id=$card_id";
    $res=mysqli_query($con, $sel);
    $res_info=mysqli_fetch_assoc($res);
    $image=$res_info['image'];
    $card_json_name=$res_info['card_json_name'];
    $del="DELETE FROM $card_tblname WHERE id=$card_id AND user_id=$user_id";
    if(mysqli_query($con, $del)){
        
        unlink('../card-editor/cards-images/'.$image);
        unlink('../card-editor/cards-images-json/'.$card_json_name);
        echo 'deleted';
    }
    
}
?>