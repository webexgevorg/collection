<?php
session_start();
include "../config/con1.php";
$user_id='';
// if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
//             if(!empty($_COOKIE['user'])){
//                 $user_id=$_COOKIE['user'];
//             }
//             if(!empty($_SESSION['user'])){
//                 $user_id=$_SESSION['user'];
//             }
// }
	$res='';

if(!empty($_POST['data']) && !empty($_SESSION['card-info'])){
  
  foreach ($_SESSION['card-info'] as $key => $value) {
     if($key=='user_id'){
        $user_id=$value;
     }
     elseif($key=='tbl_name'){
        $tbl_name=$value;
     }
     elseif($key=='card_name'){
        $card_name=$value;
     }
     elseif($key=='coll_id'){
       $coll_id=$value;
     }
     elseif($key=='description'){
      $description=$value;
     }
     else{}

  }
echo $tbl_name;
	$data=$_POST['data'];
	$format_image='png';
    $base64_string = explode( ',', $data);
    $pos  = explode( ';', $data );
    // $img_exten = explode('/', $pos[0])[1];
    $output_file=time().'.'.$format_image;

      $insert="INSERT INTO $tbl_name (coll_id, user_id, name, description, image) VALUES ($coll_id, $user_id, '$card_name', '$description', '$output_file')";
      if(mysqli_query($con, $insert)){

         file_put_contents('cards-images/'.$output_file, base64_decode( $base64_string[1]));

         $res='Card successfully Added';
      }
}
else{
  echo "error";
}

echo $res;


?>