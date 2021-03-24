<?php
include "config/con1.php";
if(isset($_POST['send'])){
    $hidden = $_POST['id'];
    $name = $_POST['name'];
    $text = $_POST['text'];
     if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name']))

        {
                $ins="UPDATE `users` SET  `name` = '$name', `more` = '$text' WHERE id = '$hidden'";
                $res=mysqli_query($con, $ins);
                    
                if($res){
                    header('Location:profile-page.php');
                }else{
                    echo "sxal";
                }
     }else{
        // $folder = $_SERVER['DOCUMENT_ROOT'].'/collection-cards/images/';
        // $folder ='images/';
        $img = $_FILES["image"]["name"];
        $tmp=$_FILES['image']['tmp_name'];
        $type=$_FILES['image']['type'];
        $f_name = explode('.', $img);
        $ext = end($f_name);
        
        $allowed_extension = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');
        if(in_array($ext, $allowed_extension)){
             $fname = md5(rand(0,1000)).'.'.$ext;
             $folder='images_users/'.$fname;

        if(move_uploaded_file($tmp, $folder)){
        // move_uploaded_file($_FILES["image"]["tmp_name"], $folder.$fname);
            
            $ins="UPDATE `users` SET `name`='$name', `more`= '$text', `image` = '$fname' WHERE id = $hidden";
            $res=mysqli_query($con, $ins);
                    
                if($res){
                    header('Location:profile-page.php');
                }else{
                    echo "sxal";
                }
        }
        }
        else{
            echo 'sxal format';
        }
        
     }
      
  }   

?>