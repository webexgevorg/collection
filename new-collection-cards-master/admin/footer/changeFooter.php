<?php
session_start();
include "../../config/con1.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name1 = $_POST['z1'];
    $name2 = $_POST['z2'];
    $name3 = $_POST['z3'];
    $name4 = $_POST['z4'];
    $name5 = $_POST['z5'];
    $name6 = $_POST['z6'];

    $sql = "UPDATE footer SET 
    title1 = '$name1',
    text1 = '$name2',
    title2 = '$name3',
    text2 = '$name4',
    title3 = '$name5',
    text3 = '$name6'";


    $res = mysqli_query($con, $sql);
    if($res){
        header('location:add_footer.php');
        $_SESSION['success']="Successfully updated";
    }else{
        echo "no";
    }
}
?>