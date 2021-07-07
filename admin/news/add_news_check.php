<?php
include "../../config/con1.php";

    if(isset($_POST['title']) && isset($_POST['discription']) && isset($_POST['sporttype']) && isset($_POST['producer'])  && isset($_POST['newstype'])  && isset($_POST['published'])){

             $title = $_POST['title'];
       $discription = $_POST['discription'];
         $sporttype = $_POST['sporttype'];
          $producer = $_POST['producer'];
           $newstype= $_POST['newstype'];
           $published=$_POST['published'];

           $sql1="INSERT INTO news(title,discription,sport,producer,news_type,status,published_date) VALUES('$title','$discription','$sporttype','$producer','$newstype', '0','$published') ";
            $query=mysqli_query($con,$sql1);
            if($query){
                echo "The record has been successfully inserted";
            }else{
                echo "no".mysqli_error();
            }
           //echo "yes";
    }
?>
