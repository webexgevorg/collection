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

if(!empty($_POST['filedata']) && !empty($_POST['data']) && !empty($_POST['user_id']) && !empty($_POST['filedata_name']) && !empty($_POST['data_name'])){
    $width=$_POST['width'];
    $height=$_POST['height'];
    
	$new_json=$_POST['filedata'];
	$card_name_json=$_POST['filedata_name'];

    $file_n=rand(100, 1000)*time();
    $file_card_n=rand(1000, 9000)*time();

    $json_name=$file_n.'.json';
    $json_card_name=$file_card_n.'.json';

    $output_file_json='templates-jsons/'.$json_name;
    $output_file_name_json='templates-name-jsons/'.$json_card_name;

    $data=$_POST['data'];
    $data_name=$_POST['data_name'];

    $base64_string = explode( ',', $data);
    $img_name=$file_n.'.jpg';
    $output_file_img='templates-images/'.$img_name;

    $base64_string_name = explode( ',', $data_name);
    $img_card_name=$file_card_n.'.jpg';
    $output_file_card_img='templates-name-images/'.$img_card_name;
    // ----------------------------
    $insert="INSERT INTO card_templates (user_id, image, json, name_image, name_json) VALUES ($user_id, '$img_name', '$json_name', '$img_card_name', '$json_card_name')";
    if(mysqli_query($con, $insert)){
        $res='Template successfully saved';
        file_put_contents($output_file_json, $new_json);
        file_put_contents($output_file_img, base64_decode( $base64_string[1]));
        file_put_contents($output_file_name_json, $card_name_json);
        file_put_contents($output_file_card_img, base64_decode( $base64_string_name[1]));
    }
}
else{
	$res='Error';
}
echo $res;
?>