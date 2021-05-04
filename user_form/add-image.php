<?php
include "../config/con1.php";
$message='';
  if(isset($_FILES) && $_FILES['img']['error'] == 0){
       $card_id=$_POST['card-id'];
       $tbl_name=$_POST['tbl-name'];
       // ==========uploaded image banner===============                 
       $img=$_FILES['img']['name'];
       $tmp=$_FILES['img']['tmp_name'];
       $type=$_FILES['img']['type'];
       $format=explode(".", $img);
       $extantion=end($format);
       $allowed_extension = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');
       
      if(in_array($extantion, $allowed_extension)){
        $newname = md5(rand(100,100000)).".".$extantion; 
        $folder='';
        // -------create folder with tbl_name and card_id ------------------------
        $target_Path="../cards_images/$tbl_name/$card_id/";
        if(is_dir($target_Path)){
              $target_p=$target_Path;
        }
        else{
              mkdir("../cards_images/$tbl_name/$card_id/", 0771);
              $target_p =$target_Path;
        }
        $folder=$target_p.$newname;
        $ins="INSERT INTO cards_images (card_id, table_name, image) VALUES ($card_id, '$tbl_name', '$newname')";
        if(mysqli_query($con, $ins)){
            move_uploaded_file($tmp, $folder);
            $message="Image moved";
        }
        else{
          echo 'nooo ins';
        }
      }
      else{
        $message="The selected file format should be jpg, png or jpeg";
      }
  }
  else{
      echo 'nooo';
  }
  echo $message;
?>