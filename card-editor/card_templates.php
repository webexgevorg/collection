<?php
session_start();
include "../config/con1.php";
$user_id='';
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
            if(!empty($_COOKIE['user'])){
                $user_id=$_COOKIE['user'];
            }
            if(!empty($_SESSION['user'])){
                $user_id=$_SESSION['user'];
            }
}
$res='';

if(!empty($_POST['filedata']) && !empty($_POST['data']) && !empty($_POST['user_id']) ){
    $width=$_POST['width'];
    $height=$_POST['height'];
    
	$new_json=$_POST['filedata'];

    $file_n=rand(100, 1000)*time();

    $json_name=$file_n.'.json';

    $output_file_json='templates-jsons/'.$json_name;

    $data=$_POST['data'];

    $base64_string = explode( ',', $data);
    $img_name=$file_n.'.jpg';
    $output_file_img='templates-images/'.$img_name;

    // ----------------------------
    $insert="INSERT INTO card_templates (user_id, image, json) VALUES ($user_id, '$img_name', '$json_name')";
    if(mysqli_query($con, $insert)){
        $res='Template successfully saved';
        file_put_contents($output_file_json, $new_json);
        file_put_contents($output_file_img, base64_decode( $base64_string[1]));
    }
}
else{
	$res='Error';
}
echo $res;
?>