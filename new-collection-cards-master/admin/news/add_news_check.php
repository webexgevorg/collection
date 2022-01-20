<?php
include "../../config/con1.php";

    // if(isset($_POST['title']) && isset($_POST['discription']) && isset($_POST['sporttype']) && isset($_POST['producer'])  && isset($_POST['newstype'])){

    if(empty($_POST['title']) || empty($_POST['discription']) || empty($_FILES['img']['name'][0]) ){

 
            echo "<p class='text-danger'>Fill all the fields</p>";

    }else{
             $title = $_POST['title'];
       $discription = $_POST['discription'];
         $sporttype = $_POST['sporttype'];
          $producer = $_POST['producer'];
           $newstype= $_POST['newstype'];
           $important=intval($_POST['important']);
        //    if($important==true){
        //        echo "true";
        //    }else{
        //        echo "false";
        //    }
           $img=$_FILES['img']['name'];
           $tmp=$_FILES['img']['tmp_name'];
        $array=[];
            foreach($tmp as $key=>$value){
                $filename=$_FILES['img']['name'][$key];
                $filename_tmp=$_FILES['img']['tmp_name'][$key];
                $extantion=pathInfo($filename,PATHINFO_EXTENSION);
                $valid_extantion=array('jpg','jpeg','png','gif');
                if(in_array($extantion,$valid_extantion)){

                    $new_name=rand().".".$extantion;
                    $destination="uploads/".$new_name;
                    array_push($array,$new_name);
                    move_uploaded_file($filename_tmp,$destination);

                }
                
                   
                             
                            
            }
                
                $sql1="INSERT INTO news (title,discription,sport_type,producer,news_type,status,img1,img2,img3,important) VALUES('$title','$discription','$sporttype','$producer','$newstype', '0','$array[0]','$array[1]','$array[2]',$important)";
                    $query=mysqli_query($con,$sql1);
                    $array=[''];
                    if($query){
                        echo "<p class='text-success'>The record has been successfully inserted</p>";
                    }else{
                        echo "no".mysqli_error();
                    }
               
        }      
    
?>
