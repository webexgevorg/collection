<?php
include "../../config/con1.php";

    if(isset($_POST['title']) && isset($_POST['discription']) && isset($_POST['sporttype']) && isset($_POST['producer'])  && isset($_POST['newstype']) && isset($_POST['this_id'])){

        $title = $_POST['title'];
        $discription = $_POST['discription'];
        $sporttype = $_POST['sporttype'];
        $producer = $_POST['producer'];
        $newstype= $_POST['newstype'];
        $id=$_POST['this_id'];

        
           $sql1="UPDATE publications  SET title='$title', titledescription='$discription',sport_type='$sporttype', producer='$producer',news_type='$newstype'WHERE id='$id'";
           $query=mysqli_query($con,$sql1);
            if($query){
                echo "The record has been successfully updated";
            }else{
                echo "no".mysqli_error();
            }
           //echo "yes";
    }
?>
