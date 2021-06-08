<?php
session_start();
include "../config/con1.php";
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
  if(!empty($_COOKIE['user'])){
      $user_id=$_COOKIE['user'];
  }
  if(!empty($_SESSION['user'])){
      $user_id=$_SESSION['user'];
  }
}
if(!empty($_POST['template_id']) && !empty($_POST['tbl_name']) && !empty($_POST['card_id'])){
    
    $template_id=$_POST['template_id'];
    $tbl_name=$_POST['tbl_name'];
    $card_id=$_POST['card_id'];
    $sel="SELECT image, card_name_image, card_json_name, card_name_json_name FROM $tbl_name WHERE user_id=$user_id AND id=$card_id";  
    
    $res_card_info=mysqli_query($con, $sel);
    if(mysqli_num_rows($res_card_info)==1){
        $row_card=mysqli_fetch_assoc($res_card_info);
        $image=$row_card['image'];
        $card_name_image=$row_card['card_name_image'];
        $card_json_name=$row_card['card_json_name'];
        $card_name_json_name=$row_card['card_name_json_name'];
    }

    $sel_template="SELECT * FROM card_templates WHERE id=$template_id AND user_id=$user_id";
    $res_template=mysqli_query($con, $sel_template);
    if(mysqli_num_rows($res_template)==1){
          $row_template=mysqli_fetch_assoc($res_template);
          $json_template=$row_template['json'];
          $file_jscon_template=file_get_contents('../card-editor/templates-jsons/'.$json_template);
          $template_info=json_decode($file_jscon_template,true);
          $template_background=$template_info['background'];
          $template_frame=explode('frame-', $template_info['objects'][0]['src']);
        //   print_r($card_frame);

          $this_card_json=file_get_contents('../card-editor/cards-images-json/'.$card_json_name);
          $card_info=json_decode( $this_card_json,true);
          $card_info['background']=$template_background;
        //   $card_frame=explode('frame-', $card_info['objects'][0]['src']);
          foreach($card_info['objects'] as $key => $value){
             $d=explode(':', $value['src']);
             $dd=explode(',', $value['src']);
             if($d[0]!='data'){
                // $value['src']=$template_info['objects'][0]['src'];
                $card_info['objects'][$key]['src']=$template_info['objects'][0]['src'];
                // echo $value['src'];

             }
             else{
                  $k=$d[1];
                  $base64_string = explode( ',', $k);
                  $mm=$base64_string[1];
                //  $img=base64_decode( $d[1]);
             }
          }
        
// print_r( json_encode( $card_info,true));


           
// Free up memory
// file_put_contents( '../card-editor/cards-images/bbb.jpg', $im);
          // imagecopyresampled($card_info,  '../card-editor/cards-images/'.$image);
          // file_put_contents( '../card-editor/cards-images/'.$image, base64_decode($mm));

          file_put_contents('../card-editor/cards-images-json/'.$card_json_name, json_encode( $card_info));
        //   var_dump( $card_info);
      $arr=[];
      $arr['json']='card-editor/cards-images-json/'.$card_json_name;
      $arr['img']='../card-editor/cards-images/'.$image;
   
     
print_r(json_encode($arr));
// echo 'card-editor/cards-images-json/'.$card_json_name;

    }

}
if(!empty($_POST['change_img']) && !empty($_POST['data']) && !empty($_POST['img']) ){
  
  $img=$_POST['img'];
	$data=$_POST['data'];
  
  $base64_string = explode( ',', $data);
echo $img;
file_put_contents($img, base64_decode( $base64_string[1]));
}
?>