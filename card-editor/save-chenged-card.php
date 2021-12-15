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
if(!empty($_POST['data']) && !empty($_POST['filedata'])){
    $card_id=$_POST['card_id'];
    $tbl_name=$_POST['tbl_name'];    
    $sel="SELECT image, card_json_name FROM $tbl_name WHERE user_id=$user_id AND id=$card_id";  
    
    $res_card_info=mysqli_query($con, $sel);
    if(mysqli_num_rows($res_card_info)==1){
        $row_card=mysqli_fetch_assoc($res_card_info);
        $image=$row_card['image'];
        $card_json_name=$row_card['card_json_name'];
    }
    $img_json=$_POST['filedata'];
	$data=$_POST['data'];
    $base64_string = explode( ',', $data);
    $pos  = explode( ';', $data );
    $output_file=$image;
    $output_file_json=$card_json_name;

    
         file_put_contents('cards-images/'.$output_file, base64_decode( $base64_string[1]));
         file_put_contents('cards-images-json/'.$output_file_json, $img_json);
         $res='Card successfully changed';
      
}
else{
    echo 'no if';
}

echo $res;


?>