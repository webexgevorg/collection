<?php
include "../../config/con1.php";
if(isset($_POST['subnews_name']) && isset($_POST['this_id'])){
    $subnews_name=$_POST['subnews_name'];
    $this_id=$_POST['this_id'];
    $sql1="UPDATE subnews  SET subnews_name='$subnews_name'WHERE id='$this_id'";
           $query=mysqli_query($con,$sql1);
            if($query){
                echo "The record has been successfully updated";
            }else{
                echo "no".mysqli_error();
            }
}




?>