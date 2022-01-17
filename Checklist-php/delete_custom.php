<?php
    require "../config/con1.php";

    $id = $_POST['check_id'];

    $sql = "UPDATE `custom_name_checklist` SET `delete_status`= 0 WHERE id = $id";
    $result = mysqli_query($con, $sql);

