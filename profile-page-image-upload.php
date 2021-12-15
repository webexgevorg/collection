<?php
session_start();
include "config/con1.php";
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    if(!empty($_COOKIE['user'])){
        $user_id=$_COOKIE['user'];
    }
    if(!empty($_SESSION['user'])){
        $user_id=$_SESSION['user'];
    }
}
if(isset($_POST['send'])){
    $hidden = $_POST['id'];
    // $name = $_POST['name'];
    $country = $_POST['country'];
    $country_code = $_POST['country_code'];
    $city = $_POST['city'];
    
    $text = $_POST['text'];
    $sql="SELECT image FROM users WHERE id=$user_id";
    $query=mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($query);
     if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])){
        $ins="UPDATE users SET more = '$text', city = '$city', country='$country', country_code='$country_code' WHERE id = $user_id";
        $res=mysqli_query($con, $ins);
            
        if($res){
            header('Location:profile.php');
        }else{
            echo "sxal------";
        }
     }
     else{
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
             if($row['image']!=''){
                 $img_link='images_users/'.$row['image'];
                 if(is_file($img_link)){
                     unlink($img_link);
                 }
             }
            if(move_uploaded_file($tmp, $folder)){
            // move_uploaded_file($_FILES["image"]["tmp_name"], $folder.$fname);
                
                $ins="UPDATE `users` SET `city`='$city', `more`= '$text', `image` = '$fname' WHERE id = $hidden";
                $res=mysqli_query($con, $ins);
                        
                    if($res){
                        header('Location:profile.php');
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