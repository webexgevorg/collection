<?php
    session_start();
    include "config/con1.php";

    if(isset($_POST['release_id'])){

        $sql = "SELECT * FROM collections WHERE  id='$_POST[release_id]'";
        $query = mysqli_query($con, $sql);
        if ($query) {
            $tox = mysqli_fetch_assoc($query);
           $img= "<img class='img-fluid' src='images/".$tox['image']."'>";

        }

        $sql1 = "SELECT * FROM base_checklist WHERE  realese_id='$_POST[release_id]'";
        $query1 = mysqli_query($con, $sql1);
        $num=mysqli_num_rows($query1);

       echo  $arr1=$img."_".$num;

    }

    if(isset($_POST['release_dblclick'])){
        $_SESSION['release_dblclick']= $_POST['release_dblclick'];
       // echo $_SESSION['release_dblclick'];

    }

?>