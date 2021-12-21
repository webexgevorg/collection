<?php
    require "../config/con1.php";
    $checklist_id = mysqli_real_escape_string($con, $_POST["checklist_id"]);
    
    $sql = "DELETE FROM `favorite_checklists` WHERE id = $checklist_id ";
    $result = mysqli_query($con, $sql);
?>