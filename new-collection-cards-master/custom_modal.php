<?php
	include "config/con1.php";
    if(isset($_POST['delite_btn'])){
    	$id = mysqli_real_escape_string($con, $_POST['delite_btn']);
      $sql = "SELECT * FROM `custom_name_checklist` WHERE id=$id";
      $query = mysqli_query($con, $sql);
      $tox = mysqli_fetch_assoc($query);
      $img = $tox['image'];
    	$del = "DELETE FROM `custom_name_checklist` WHERE id=$id";
      $res = mysqli_query($con, $del);
      if($res){
        unlink('img/'.$img.'');
        $del = "DELETE FROM `custom_checklist` WHERE cid=$id";
        $res = mysqli_query($con, $del);
        if($res){
          header('location:custom_checklist.php');
        }
      }
  }
  if(isset($_POST['delite_btn-p'])){
      $id = mysqli_real_escape_string($con, $_POST['delite_btn']);
      $sql = "SELECT * FROM `custom_name_checklist` WHERE id=$id";
      $query = mysqli_query($con, $sql);
      $tox = mysqli_fetch_assoc($query);
      $img = $tox['image'];
      $del = "DELETE FROM `custom_name_checklist` WHERE id=$id";
      $res = mysqli_query($con, $del);
      if($res){
        unlink('img/'.$img.'');
        $del = "DELETE FROM `custom_checklist` WHERE cid=$id";
        $res = mysqli_query($con, $del);
        if($res){
          header('location:profile-page.php');
        }
      }
  }
?>