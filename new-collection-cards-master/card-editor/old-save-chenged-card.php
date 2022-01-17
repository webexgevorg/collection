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
if(!empty($_POST['data']) && !empty($_POST['data_card_name']) && !empty($_POST['filedata']) && !empty($_POST['filedata_name'])){
    $card_id=$_POST['card_id'];
    $tbl_name=$_POST['tbl_name'];    
    $sel="SELECT image, card_name_image, card_json_name, card_name_json_name FROM $tbl_name WHERE user_id=$user_id AND id=$card_id";  
    
    $res_card_info=mysqli_query($con, $sel);
    if(mysqli_num_rows($res_card_info)==1){
        $row_card=mysqli_fetch_assoc($res_card_info);
        $image=$row_card['image'];
        $card_name_image=$row_card['card_name_image'];
        $card_json_name=$row_card['card_json_name'];
        $card_name_json_name=$row_card['card_name_json_name'];
    }
    $img_json=$_POST['filedata'];
    $name_json=$_POST['filedata_name'];
	$data=$_POST['data'];
    $data_card_name=$_POST['data_card_name'];
	// $format_image='png';
    $base64_string = explode( ',', $data);
    $base64_string_name= explode( ',', $data_card_name);

    $pos  = explode( ';', $data );
    $pos_name  = explode( ';', $data_card_name );
    // $img_exten = explode('/', $pos[0])[1];
    // $output_file='cards-images/'.time().'.'.$format_image;
    // $file_n=time();
    // $file_name=rand(100, 1000).$file_n;
    $output_file=$image;
    $output_file_name=$card_name_image;
  
    $output_file_json=$card_json_name;
    $output_file_name_json=$card_name_json_name;

    
         file_put_contents('cards-images/'.$output_file, base64_decode( $base64_string[1]));
         file_put_contents('cards-name-images/'.$output_file_name, base64_decode( $base64_string_name[1]));
         file_put_contents('cards-images-json/'.$output_file_json, $img_json);
         file_put_contents('cards-name-images-json/'.$output_file_name_json, $name_json);
         $res='Card successfully changed';
      
}
else{
    echo 'no if';
}

echo $res;


?>