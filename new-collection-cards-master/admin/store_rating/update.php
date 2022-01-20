<?php
session_start();
include "../../config/con1.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name1 = $_POST['z1'];
    $name2 = $_POST['z2'];
    $name3 = $_POST['z3'];
    $name4 = $_POST['z4'];
    if ($_FILES) {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/test/collection-cards/images/';
        $file_name = basename($_FILES["store"]["name"]);
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["store"]["tmp_name"]);

            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {

        } else {
            if (move_uploaded_file($_FILES["store"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO `store_rating`(`title`,`intotitle1`,`intotitle2`, `text`,`image`) 
                VALUES ('$name1','$name2','$name3','$name4','$file_name')";
                $ardyunq = mysqli_query($con, $sql);
                if ($ardyunq) {
                    header('location:add_store_rating.php');
                    $_SESSION['success'] = "Successfully updated";
                } else {
                    echo "no";
                }

            }
        }
    }
}
?>