<?php
session_start();
include "../../config/con1.php";
if(isset($_POST['storerating'])) {

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
if(isset($_POST['send'])) {
    $name1 = $_POST['z1'];
    $name2 = $_POST['z2'];
    $name3 = $_POST['z3'];
    $name4 = $_POST['z4'];
    $id = $_POST['picture'];
    if (!file_exists($_FILES['store']['tmp_name']) || !is_uploaded_file($_FILES['store']['tmp_name'])) {
        $sql = "UPDATE `store_rating` SET title = '$name1',intotitle1 = '$name2',
                intotitle2 = '$name3',text = '$name4' WHERE id = '$id'";
        $ardyunq = mysqli_query($con, $sql);
        if ($ardyunq) {
            header('location:changeStoreRating.php');
            $_SESSION['intotitle']=$name2;
        } else {
            echo "no";
        }
    } else {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/test/collection-cards/images/';
        $file_name = basename($_FILES["store"]["name"]);
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (move_uploaded_file($_FILES["store"]["tmp_name"], $target_file)) {
            $sql = "UPDATE `store_rating` SET title = '$name1',intotitle1 = '$name2',
                intotitle2 = '$name3',text = '$name4',image = '$file_name' WHERE id = '$id'";
            $ardyunq = mysqli_query($con, $sql);
            if ($ardyunq) {
                $_SESSION['intotitle']=$name2;
                header('location:changeStoreRating.php');
            } else {
                echo "no";
            }
        }
    }
}

if(isset($_POST['search'])) {
    $srch = $_POST['search'];
    $sql = "SELECT * FROM store_rating WHERE intotitle1 LIKE '%$srch%'";
    $res = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<div class='row'>
                <div class='col-sm-10 add-bs' style='margin: 0 auto'>       
             <form method='post' action='change_store.php' enctype='multipart/form-data'>
                             <div class='form-group'>
                                <ul id='ul'>
                                    <label>Title</label>
                                    <li>
                                        <textarea  class='form-control' name='z1'>" . $row['title'] . "</textarea>
                                    </li>
                                    <label>Intotitle1</label>
                                    <li>
                                        <textarea  class='form-control' name='z2'>" . $row['intotitle1'] . "</textarea>
                                    </li>
                                    <label>Intotitle2</label>
                                    <li>
                                        <textarea  class='form-control' name='z3'>" . $row['intotitle2'] . "</textarea>
                                    </li>
                                    <label>Text</label>
                                    <li>
                                        <textarea  class='form-control' name='z4'>" . $row['text'] . "</textarea>
                                    </li>
                                    <br>
                                    <div class='form-group'>
                                        <label>Add</label>
                                        <input type='file' name='store' class='inp1'>
                                    </div>
                                    <input type='hidden' name='picture' value='" . $row["id"] . "'/>
                                    <div class='card-footer '>
                                        <button type='submit' class='btn btn-fill btn-add' name='send'>Update</button>
                                    </div>
                                </ul>                             
                            </div>
                            </form>
                    </div>
                </div>
                            <br>
                            <hr>";
    }
}
?>