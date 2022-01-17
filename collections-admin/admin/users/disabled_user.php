<?php
    require "../../config/con1.php";

    if(!empty($_POST['id'])) {
        $id = $_POST["id"];
        $icon = $_POST["icon"];
        $sql = "UPDATE users SET active = $icon WHERE id=$id";
        $result = mysqli_query($con, $sql);
    }       
?>