<?php
session_start();
include "../config/con1.php";
if(!empty($_POST['template_id'])){
    $template_id=$_POST['template_id'];
    if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
        if(!empty($_COOKIE['user'])){
            $user_id=$_COOKIE['user'];
        }
        if(!empty($_SESSION['user'])){
            $user_id=$_SESSION['user'];
        }
    }
    $sel="SELECT * FROM card_templates WHERE user_id=$user_id AND id=$template_id";
    $template_info=mysqli_query($con, $sel);
    if(mysqli_num_rows($template_info)==1){
        $row=mysqli_fetch_assoc($template_info);
        $image=$row['image'];
        $json=$row['json'];
        $name_image=$row['name_image'];
        $name_json=$row['name_json'];
        $file_image='../card-editor/templates-images/'.$image;
        $file_json='../card-editor/templates-jsons/'.$json;
        $name_file_image='../card-editor/templates-name-images/'.$name_image;
        $name_file_json='../card-editor/templates-name-jsons/'.$name_json;
        $del_sql="DELETE FROM card_templates WHERE id=$template_id";
        if(mysqli_query($con, $del_sql)){
            if(file_exists($file_image)){
                unlink($file_image);
                $del_img=1;
            }
            if(file_exists($file_json)){
                unlink($file_json);
                $del_json=1;
            }
            if(file_exists($name_file_image)){
                unlink($name_file_image);
                $name_del_img=1;
            }
            if(file_exists($name_file_json)){
                unlink($name_file_json);
                $name_del_json=1;
            }
        }
        if($del_img==1 && $del_json==1 && $name_del_img==1 && $name_del_json==1){
            echo 1;
        }
        else{
            echo 0;
        }
    }
}
else{
    echo 'error';
}

?>