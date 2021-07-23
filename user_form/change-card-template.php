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
    $sel="SELECT image, card_json_name FROM $tbl_name WHERE user_id=$user_id AND id=$card_id";  
    // -------------for card and card name----------------------
    // $sel="SELECT image, card_name_image, card_json_name, card_name_json_name FROM $tbl_name WHERE user_id=$user_id AND id=$card_id";  
    
    $res_card_info=mysqli_query($con, $sel);
    if(mysqli_num_rows($res_card_info)==1){
        $row_card=mysqli_fetch_assoc($res_card_info);
        $image=$row_card['image'];
        // $card_name_image=$row_card['card_name_image'];
        $card_json_name=$row_card['card_json_name'];
        // $card_name_json_name=$row_card['card_name_json_name'];
    }

    $sel_template="SELECT * FROM card_templates WHERE id=$template_id AND user_id=$user_id";
    $res_template=mysqli_query($con, $sel_template);
    if(mysqli_num_rows($res_template)==1){
          $row_template=mysqli_fetch_assoc($res_template);
          $json_template=$row_template['json'];
          $file_json_template=file_get_contents('../card-editor/templates-jsons/'.$json_template);
          $template_info=json_decode($file_json_template,true);
          $template_background=$template_info['background'];
          $template_frame=explode('frame-', $template_info['objects'][0]['src']);

          $this_card_json=file_get_contents('../card-editor/cards-images-json/'.$card_json_name);
          $card_info=json_decode( $this_card_json,true);
          $card_info['background']=$template_background;

          $m='';
          foreach($card_info['objects'] as $key => $value){
             $d=explode(':', $value['src']);
             $dd=explode(',', $value['src']);
             if($d[0]!='data'){
                $card_info['objects'][$key]['src']=$template_info['objects'][0]['src'];
                $m++;
             }
          }
          if($m==''){
            array_push($card_info['objects'],  $template_info['objects'][0]);
          }
      // ------------card-name change tamplate-------------------------------

      // $name_json_template=$row_template['name_json'];
      // $name_file_json_template=file_get_contents('../card-editor/templates-name-jsons/'.$name_json_template);
      // $name_template_info=json_decode($name_file_json_template,true);
      
      // $this_card_name_json=file_get_contents('../card-editor/cards-name-images-json/'.$card_name_json_name);
      // $card_name_info=json_decode( $this_card_name_json,true);
    //   foreach($card_name_info['objects'] as $key => $value){
    //     if($value['type']=='i-text'){
    //       array_push($name_template_info['objects'], $value);
    //     }
    //  }
          file_put_contents('../card-editor/cards-images-json/'.$card_json_name, json_encode( $card_info));
          // file_put_contents('../card-editor/cards-name-images-json/'.$card_name_json_name, json_encode( $name_template_info));

      $arr=[];
      $arr['json']='card-editor/cards-images-json/'.$card_json_name;
      $arr['img']='../card-editor/cards-images/'.$image;
      // $arr['name-json']='card-editor/cards-name-images-json/'.$card_name_json_name;
      // $arr['name-img']='../card-editor/cards-name-images/'.$card_name_image;   
    //  print_r($name_template_info);
    print_r(json_encode($arr));
    }
}
if(!empty($_POST['change_img']) && !empty($_POST['data']) && !empty($_POST['img'])){
// -------------for card and card name----------------------
// if(!empty($_POST['change_img']) && !empty($_POST['data']) && !empty($_POST['img']) && !empty($_POST['name_data']) && !empty($_POST['name_img']) ){
  
  $img=$_POST['img'];
	$data=$_POST['data'];
  // $name_img=$_POST['name_img'];
	// $name_data=$_POST['name_data'];
  
  $base64_string = explode( ',', $data);
  // $base64_string_name = explode( ',', $name_data);
echo $img;
file_put_contents($img, base64_decode( $base64_string[1]));
// file_put_contents($name_img, base64_decode( $base64_string_name[1]));

}
?>