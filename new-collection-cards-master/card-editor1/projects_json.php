<?php
    include "../config/con1.php";
	$res='';

if(!empty($_POST['myjson']) && !empty($_POST['data']) && !empty($_POST['user_id'])){
    $width=$_POST['width'];
    $height=$_POST['height'];
    $user_id=$_POST['user_id'];
	$res='';

if(!empty($_POST['myjson']) && !empty($_POST['data'])){
	$new_json=$_POST['myjson'];
    $output_file_json='projects-json/'.time().'.json';

    $data=$_POST['data'];
    $base64_string = explode( ',', $data);
    $output_file_img='projects-json-images/'.time().'.jpg';
    
    file_put_contents($output_file_json, $new_json);
    file_put_contents($output_file_img, base64_decode( $base64_string[1]));
    // $res=$output_file;
    $insert="INSERT INTO cards_project (user_id, project, project_img, width, height) VALUES ($user_id, '$output_file_json', '$output_file_img', $width, $height)";
    if(mysqli_query($con, $insert)){
    $res='Project successfully saved';

    }
    $res='Project successfully saved';
    
}
else{
	$res='Error';
}

echo $res;


?>