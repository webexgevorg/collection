<?php
include "../../config/con1.php";

    if(isset($_POST['title']) && isset($_POST['discription']) && isset($_POST['sporttype']) && isset($_POST['producer'])  && isset($_POST['newstype'])){

             $title = $_POST['title'];
       $discription = $_POST['discription'];
         $sporttype = $_POST['sporttype'];
          $producer = $_POST['producer'];
           $newstype= $_POST['newstype'];
      
  

            $sql1="INSERT INTO publications (title,titledescription,sport_type,producer,news_type,status,liked,watched) VALUES('$title','$discription','$sporttype','$producer','$newstype', '0','0','0') ";
            $query=mysqli_query($con,$sql1);
            if($query){
                echo "The record has been successfully inserted";
            }else{
                echo "no".mysqli_error();
            }
           //echo "yes";
    }
?>