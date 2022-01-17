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
if(!empty($_POST['template_id']) && !empty($_POST['tbl_name']) && !empty($_POST['folder_id'])){
    $template_id=$_POST['template_id'];
    $tbl_name=$_POST['tbl_name'];
    $folder_id=$_POST['folder_id'];
    if($tbl_name=='card1'){
        $changed_id='coll_id';
        $sel="SELECT image, card_json_name FROM $tbl_name WHERE user_id=$user_id AND $changed_id=$folder_id";  
        // ----------for card and card name--------------------
        // $sel="SELECT image, card_name_image, card_json_name, card_name_json_name FROM $tbl_name WHERE user_id=$user_id AND $changed_id=$folder_id";  
    }
    else if($tbl_name=='all_cards'){
        $changed_id='coll_id';

        $sel="(SELECT image, card_json_name FROM card1 WHERE user_id=$user_id AND $changed_id=$folder_id)
         UNION All (SELECT image, card_json_name FROM card2 WHERE user_id=$user_id AND $changed_id=$folder_id)
         UNION All(SELECT image, card_json_name FROM card3 WHERE user_id=$user_id AND $changed_id=$folder_id) ";  
         // ----------for card and card name--------------------
        // $sel="(SELECT image, card_name_image, card_json_name, card_name_json_name FROM card1 WHERE user_id=$user_id AND $changed_id=$folder_id)
        //  UNION All (SELECT image, card_name_image, card_json_name, card_name_json_name FROM card2 WHERE user_id=$user_id AND $changed_id=$folder_id)
        //  UNION All(SELECT image, card_name_image, card_json_name, card_name_json_name FROM card3 WHERE user_id=$user_id AND $changed_id=$folder_id) ";  
    
        }
    else{
        $changed_id='folder_id';
        $sel="SELECT image, card_json_name FROM $tbl_name WHERE user_id=$user_id AND $changed_id=$folder_id";  
         // ----------for card and card name--------------------
        //  $sel="SELECT image, card_name_image, card_json_name, card_name_json_name FROM $tbl_name WHERE user_id=$user_id AND $changed_id=$folder_id";  

    }
    $arr_jsons=[];
    $sel_template="SELECT * FROM card_templates WHERE id=$template_id AND user_id=$user_id";
    $res_template=mysqli_query($con, $sel_template);
    if(mysqli_num_rows($res_template)==1){
          $row_template=mysqli_fetch_assoc($res_template);
          $json_template=$row_template['json'];
          $file_json_template=file_get_contents('../card-editor/templates-jsons/'.$json_template);
          $template_info=json_decode($file_json_template, true);
          $template_background=$template_info['background'];
          $template_frame=explode('frame-', $template_info['objects'][0]['src']);
        //   print_r($card_frame);

         // ------------card-name change tamplate-------------------------------
    //   $name_json_template=$row_template['name_json'];
    //   $name_file_json_template=file_get_contents('../card-editor/templates-name-jsons/'.$name_json_template);
    //   $name_template_info=json_decode($name_file_json_template,true);
    
    }
    // $sel="SELECT image, card_name_image, card_json_name, card_name_json_name FROM $tbl_name WHERE user_id=$user_id AND $changed_id=$folder_id";  
    $res_card_info=mysqli_query($con, $sel);
    while($row_card=mysqli_fetch_assoc($res_card_info)){
        
        $image=$row_card['image'];
        // $card_name_image=$row_card['card_name_image'];
        $card_json_name=$row_card['card_json_name'];
        // $card_name_json_name=$row_card['card_name_json_name'];

        $this_card_json=file_get_contents('../card-editor/cards-images-json/'.$card_json_name);
        $card_info=json_decode( $this_card_json,true);
        $card_info['background']=$template_background;

        // $this_card_name_json=file_get_contents('../card-editor/cards-name-images-json/'.$card_name_json_name);
        // $card_name_info=json_decode( $this_card_name_json,true);
        $m='';
        foreach($card_info['objects'] as $key => $value){
            $ex_src=explode(':', $value['src']);
            $src=explode(',', $value['src']);
            if($ex_src[0]!='data'){
               $card_info['objects'][$key]['src']=$template_info['objects'][0]['src'];
               $m++;
            }
            
         }
        //  -------card_name---
        $n='';
        // foreach($card_name_info['objects'] as $key => $value){
        //     if($value['type']=='i-text'){
        //         array_push($name_template_info['objects'], $value);
        //         file_put_contents('../card-editor/cards-name-images-json/'.$card_name_json_name, json_encode( $name_template_info));
        //         array_pop($name_template_info['objects']);
        //         // $name_template_info['objects'][$i+1]=$value;
        //         $n++;
        //     }
        //  }
        //  if($n==''){
        //     file_put_contents('../card-editor/cards-name-images-json/'.$card_name_json_name, json_encode( $name_template_info));
        //  }
        //  -------hin----------------
        //  if($m==''){
        //     array_push($card_info['objects'],  $template_info['objects'][0]);
        //   }

         file_put_contents('../card-editor/cards-images-json/'.$card_json_name, json_encode( $card_info));
        //  file_put_contents('../card-editor/cards-name-images-json/'.$card_name_json_name, json_encode( $name_template_info));

         $arr=[];
         $arr['json']='card-editor/cards-images-json/'.$card_json_name;
         $arr['img']='../card-editor/cards-images/'.$image;
        //  $arr['name-json']='card-editor/cards-name-images-json/'.$card_name_json_name;
        //  $arr['name-img']='../card-editor/cards-name-images/'.$card_name_image;   
         array_push($arr_jsons, $arr);
    }
    // print_r($arr_jsons);
    print_r(json_encode($arr_jsons));
}
if(!empty($_POST['arr_data']) && !empty($_POST['arr_img'])){
// ----------for card and card name--------------------
// if(!empty($_POST['arr_data']) && !empty($_POST['arr_img']) && !empty($_POST['arr_name_data']) && !empty($_POST['arr_name_img'])){
    
    $arr_img=$_POST['arr_img'];
    // $arr_name_img=$_POST['arr_name_img'];

var_dump($arr_img);
    foreach($arr_img as $key => $value){
        $data=$value['data'];
        $path=$value['path'];
        echo $path;
        $base64_string = explode( ',', $data);
file_put_contents($path, base64_decode( $base64_string[1]));

    }
    // ---------for card name---------------
//     foreach($arr_name_img as $key => $value){
//         $name_data=$value['name_data'];
//         $name_path=$value['name_path'];
//         echo $path;
//         $base64_string_name = explode( ',', $name_data);
// file_put_contents($name_path, base64_decode( $base64_string_name[1]));

//     }
   
}
?>






