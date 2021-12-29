<?php
    require "../config/con1.php";

    $id = $_POST['id'];

    $sql = "DELETE FROM `custom_name_checklist` WHERE id = $id";
    $result = mysqli_query($con, $sql);

