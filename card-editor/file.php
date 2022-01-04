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
    $tbl_name; $coll_id; $folder_id; $releases_id; $base_checklist_card_id; $card_name; $description; 
if(!empty($_POST['data']) && !empty($_POST['filedata']) ){
        $array_session=$_SESSION['card-info'];
        $tbl_name=$array_session['tbl_name'];
        $coll_id=$array_session['coll_id'];
        $card_name=$array_session['card_name'];
        $card_number=$array_session['card_number'];
		$card_team=$array_session['card_team'];
		$card_parallel=$array_session['card_parallel'];
        $description=$array_session['description'];
        $width=$_POST['width'];
        $height=$_POST['height'];
        $img_json=$_POST['filedata'];

        if(!empty($array_session['bind_coll_id']) && !empty($array_session['bind_card_id'])) {
            echo 'if';
            $releases_id=$array_session['bind_coll_id'];
            $base_checklist_card_id=$array_session['bind_card_id'];
        }
        else{
            
            $releases_id=0;
            $base_checklist_card_id=0;
        }
        if(!empty($array_session['folder_id'])){
            $folder_id=$array_session['folder_id'];
        }
        else{
            $folder_id=0;
        }
    // echo   $tbl_name.' - '.$coll_id." - ".$releases_id." - ".$base_checklist_card_id. " - ".$card_name." - ".$description; 

	$data=$_POST['data'];
	$format_image='png';
    $base64_string = explode( ',', $data);

    $pos  = explode( ';', $data );
    // $img_exten = explode('/', $pos[0])[1];
    // $output_file='cards-images/'.time().'.'.$format_image;
    $file_n=time();
    $output_file=$file_n.'.'.$format_image;
    $output_file_json=$file_n.'.json';

    // --------------for first folder-----------------------
    if($tbl_name=='card2' || $tbl_name=='card3'){
        $insert="INSERT INTO $tbl_name (folder_id, coll_id, user_id, releases_id, base_checklist_card_id, name, number, team, parallel, description, image, card_json_name) 
                 VALUES ($folder_id, $coll_id, $user_id, $releases_id, $base_checklist_card_id, '$card_name', '$card_number', '$card_team', '$card_parallel', '$description', '$output_file', '$output_file_json')";
    }
    else{
        $insert="INSERT INTO $tbl_name (coll_id, user_id, releases_id, base_checklist_card_id, name, number, team, parallel, description, image, card_json_name) 
                 VALUES ($coll_id, $user_id, $releases_id, $base_checklist_card_id, '$card_name', '$card_number', '$card_team', '$card_parallel', '$description', '$output_file', '$output_file_json')";
        
    }
      if(mysqli_query($con, $insert)){
         file_put_contents('cards-images/'.$output_file, base64_decode( $base64_string[1]));
        //  file_put_contents('cards-name-images/'.$output_file_name, base64_decode( $base64_string_name[1]));
         file_put_contents('cards-images-json/'.$output_file_json, $img_json);
        //  file_put_contents('cards-name-images-json/'.$output_file_name_json, $name_json);
         $res='Card successfully Added';
      }
      else{
          echo 'no insert';
      }
}
else{
    echo 'no if';
}

echo $res;


?>