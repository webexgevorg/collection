<?php
include "../../config/con1.php";
if(isset($_POST['btn-add-releases'])){
   $product_type='';
    if(empty($_POST['other-sport-type'])){
        $sport_type=mysqli_real_escape_string($con, $_POST['sport-type']);
    }
    else{
        $sport_type=mysqli_real_escape_string($con, $_POST['other-sport-type']);
       
    }

   if(!empty($_POST['year-of-releases']) && !empty($_POST['producer']) && !empty($_POST['name-collection']) && !empty($sport_type) && $_FILES["img"]["name"] != '' && !empty($_POST['product_type'])){
     $year_of_releases=mysqli_real_escape_string($con, $_POST['year-of-releases']);
    
     $producer=mysqli_real_escape_string($con, $_POST['producer']);
     $name_collection=mysqli_real_escape_string($con, $_POST['name-collection']);
     $desc=$_POST['desc'];
     
     // $number_base_cards=mysqli_real_escape_string($con, $_POST['number_base_cards']);
     // $number_rookie_cards=mysqli_real_escape_string($con, $_POST['number_rookie_cards']);
     // $number_pharallel_cards=mysqli_real_escape_string($con, $_POST['number_pharallel_cards']);
        // $info=mysqli_real_escape_string($con, $_POST['info']);
        
     $desc=json_encode($desc);
     foreach ($_POST['product_type'] as $value) {
          $product_type.=$value.',';
          
        }
      $product_type=substr($product_type, 0, strlen($product_type)-1);
     
            // ==========uploaded image banner===============                 
             $img=$_FILES['img']['name'];
             $tmp=$_FILES['img']['tmp_name'];
             $type=$_FILES['img']['type'];
             $format=explode(".", $img);
             $extantion=end($format);
             $allowed_extension = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');
             
            if(in_array($extantion, $allowed_extension)){
                  $newname = md5(rand(0,1000)).".".$extantion; 
                  $folder="../../images_realeses/".$newname;

                  move_uploaded_file($tmp, $folder);
                  $message="Image moved";

                   $sel_sport_type="SELECT sport_type FROM sports_type";
                   $sel_res=mysqli_query($con, $sel_sport_type);
                   $arr=array();
    
                      while( $row=mysqli_fetch_assoc($sel_res)){
                            array_push($arr, $row['sport_type']);
                      }
                      $pop=0;
                      foreach ($arr as $key => $value) {
                        if($sport_type==$value){
                          $pop++;
                        }
                      }
                      if($pop==0){
                           $sql_insert_sport="INSERT INTO sports_type (sport_type, sport_logo) VALUES ('$sport_type', '')";
                            mysqli_query($con,  $sql_insert_sport);
                       }
                       $description='';
                        foreach($_POST['desc'] as $name) {
                              $description.=$name.'^';
                        }
                        $description=substr($description,0, strlen($description)-1);
                        $end_id="SELECT id FROM collections GROUP BY id DESC LIMIT 1";
                        $res=mysqli_query($con, $end_id);
                        $row=mysqli_fetch_assoc($res);
     
                        $sort_number= $row['id']+1;
                        $sql_insert="INSERT INTO collections (sort_number, name_of_collection, year_of_releases, producer, sport_type, image, description, product_type) VALUES ($sort_number, '$name_collection', '$year_of_releases', '$producer', '$sport_type', '$newname', '$description', '$product_type')";
    
                         if(mysqli_query($con, $sql_insert)){
                                $message="<h5 class='text-success'>Successfully added </h5>";
                                echo("<meta http-equiv='refresh' content='1'>");
                          }
            }
            else{
                  $message="Sorry, only JPG, JPEG & PNG files are allowed in URL Realeses image";
            }
   }
   else{
       $message="<h5 class='text-danger'>Fill in all filds</h5>";
   }
        
    echo $message;
}

?>
