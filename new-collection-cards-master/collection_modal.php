<?php
	include "config/con1.php";
  if(isset($_POST['delite_btn-p'])){
      $id = mysqli_real_escape_string($con, $_POST['delite_btn-p']);
      $sql = "SELECT * FROM `new_collection_card` WHERE id=$id";
      $query = mysqli_query($con, $sql);
      $tox = mysqli_fetch_assoc($query);
      $img = $tox['image'];
      $del = "DELETE FROM `new_collection_card` WHERE id=$id";
      $res = mysqli_query($con, $del);
      if($res){
          header('location:profile-page.php');
        }else{
          echo "zooor";
        }
    
  }

   if(isset($_POST['delite_btn-folder'])){
      $id = mysqli_real_escape_string($con, $_POST['delite_btn-folder']);
      $sql = "SELECT * FROM `collection_first_folder` WHERE id=$id";
      $query = mysqli_query($con, $sql);
      $tox = mysqli_fetch_assoc($query);
      $img = $tox['image'];
      $del = "DELETE FROM `collection_first_folder` WHERE id=$id";
      $res = mysqli_query($con, $del);
      if($res){
          header('location:profile-page.php');
        }else{
          echo "zooor";
        }
    
  }

    if(isset($_POST['delite_btn-second-folder'])){
      $id = mysqli_real_escape_string($con, $_POST['delite_btn-second-folder']);
      $sql = "SELECT * FROM `collection_second_folder` WHERE id=$id";
      $query = mysqli_query($con, $sql);
      $tox = mysqli_fetch_assoc($query);
      $img = $tox['image'];
      $del = "DELETE FROM `collection_second_folder` WHERE id=$id";
      $res = mysqli_query($con, $del);
      if($res){
          header('location:profile-page.php');
        }else{
          echo "zooor";
        }
    
  }

     if(isset($_POST['delite_first-folder'])){
      $id = mysqli_real_escape_string($con, $_POST['delite_first-folder']);
      $sql = "SELECT * FROM `collection_second_folder` WHERE id=$id";
      $query = mysqli_query($con, $sql);
      $tox = mysqli_fetch_assoc($query);
      $img = $tox['image'];
      $del = "DELETE FROM `collection_second_folder` WHERE id=$id";
      $sql = "SELECT * FROM `folder2` WHERE id=$id";
      $query = mysqli_query($con, $sql);
      $tox = mysqli_fetch_assoc($query);
      $img = $tox['image'];
      $del = "DELETE FROM `folder2` WHERE id=$id";
      $res = mysqli_query($con, $del);
      if($res){
          header('location:profile-page.php');
        }else{
          echo "zooor";
        }
    
  }

    if(isset($_POST['delite_second-folder'])){
      $id = mysqli_real_escape_string($con, $_POST['delite_second-folder']);
      $sql = "SELECT * FROM `card2` WHERE id=$id";
      $query = mysqli_query($con, $sql);
      $tox = mysqli_fetch_assoc($query);
      $img = $tox['image'];
      $del = "DELETE FROM `card2` WHERE id=$id";
      $res = mysqli_query($con, $del);
      if($res){
          header('location:profile-page.php');
        }else{
          echo "zooor";
        }
    
  }

   if(isset($_POST['delite_end'])){
      $id = mysqli_real_escape_string($con, $_POST['delite_end']);
      $sql = "SELECT * FROM `card3` WHERE id=$id";
      $query = mysqli_query($con, $sql);
      $tox = mysqli_fetch_assoc($query);
      $img = $tox['image'];
      $del = "DELETE FROM `card3` WHERE id=$id";
      $res = mysqli_query($con, $del);
      if($res){
          header('location:profile-page.php');
        }else{
          echo "zooor";
        }
    
  }
?>