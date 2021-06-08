<?php
        session_start();
        include "config/con1.php";

        if(isset($_POST['z1']) && isset($_POST['z2']) && isset($_POST['z3']) && isset($_POST['z4']) && isset($_POST['z5'])) {
            $z1 = $_POST['z1'];
            $z2 = $_POST['z2'];
            $z3 = $_POST['z3'];
            $z4 = $_POST['z4'];
            $z5 = $_POST['z5'];
            $sql = '';

            if (!empty($z1)) {
                $z1 = " id like '" . $_POST['z1'] . "%'";
                $_SESSION['z1']=$z1;
            } else {
                $z1 = "id like '%%' ";
                $_SESSION['z1']=$z1;
            }

            if (!empty($z2)) {
                $z2 = " and card_name like '" . $_POST['z2'] . "%'";
                $_SESSION['z2']=$z2;
            } else {
                $z2 = "and card_name like '%%'";
                $_SESSION['z2']=$z2;
            }
            if (!empty($z3)) {
                $z3 = " and team like '" . $_POST['z3'] . "%'";
                $_SESSION['z3']=$z3;
            } else {
                $z3 = " and team like '%%'";
                $_SESSION['z3']=$z3;
            }
            if (!empty($z4)) {
                $z4 = " and set_type like '" . $_POST['z4'] . "%'";
                $_SESSION['z4']=$z4;
            } else {
                $z4 = "and set_type like '%%'";
                $_SESSION['z4']=$z4;
            }



//            if (isset($_GET['page'])) {
//                $page = $_GET['page'];
//            } else {
//                $page = 1;
//            }
//
//            $num = 5;
//
//
//            echo $start = ($page - 1) * $num;
//
//            $sql = "SELECT* FROM base_checklist where realese_id=61 and (" . $z1 . $z2 . $z3 . $z4 . ")" . "order by id desc limit $start, $num";
//            $query = mysqli_query($con, $sql);
//
//
//            $out = '';
//            while ($row = mysqli_fetch_assoc($query)) {
//                $out .= '<tr>
//
//                                <td>' . $row['card_name'] . '</td>
//                                </tr>';
//
//            }
//            $sql1 = "SELECT* FROM base_checklist where realese_id=61 and (" . $z1 . $z2 . $z3 . $z4 . ")" . "order by id desc";
//            $query1 = mysqli_query($con, $sql1);
//            $num = mysqli_num_rows($query1);
//
//            $page_num = ceil($num / 5);
//            $num_page = '';
//            for ($i = 1; $i <= $page_num; $i++) {
//                $num_page .= "<a href='custom_checklist_name.php?pagefilter=" . $i . "' class='btn btn-primary m-1 a' data-id='" . $i . "' >$i</a>";
//            }
//
//
////          echo $out . "*" . $num_page;
?>
<!--            <script>-->
<!--                window.location.href='custom_checklist_name_new.php';-->
<!--            </script>-->

<!--  header('Location:custom_checklist_name_new.php');-->
 <?php
        }
?>
