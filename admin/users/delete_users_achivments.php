<?php

    require "../../config/con1.php";
    $id = $_POST["id"];
    $img_url = $_POST["img1_url"];

    $select_achivment_id = "SELECT id FROM `achivments` where achivment_icon = '$img_url'";
    $achivment_id_result = mysqli_query($con, $select_achivment_id);
    $achivment_id_row = mysqli_fetch_assoc($achivment_id_result);
    $achivment_id = $achivment_id_row['id'];

    $select_add_achivment = "DELETE FROM `users_achivments` WHERE user_id = $id AND achivment_id = $achivment_id";
    $add_achivment_result = mysqli_query($con, $select_add_achivment);