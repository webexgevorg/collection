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

if(!empty($_POST['data'])){
	$data=$_POST['data'];
	$format_image='png';
    $base64_string = explode( ',', $data);
    $pos  = explode( ';', $data );
    // $img_exten = explode('/', $pos[0])[1];
    $output_file='cards-images/'.time().'.'.$format_image;

      $insert="INSERT INTO cards (user_id, card) VALUES ($user_id, '$output_file')";
      if(mysqli_query($con, $insert)){

         file_put_contents($output_file, base64_decode( $base64_string[1]));

         $res='Card successfully Added';
      }
}
else{
}

echo $res;


?>