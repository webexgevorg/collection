<?php

    include "header.php";
    include "config/con1.php";
    require_once "user-logedin.php";

    $z1=$_SESSION['z1'];
    $z2=$_SESSION['z2'];
    $z3=$_SESSION['z3'];
    $z4=$_SESSION['z4'];
    if (isset($_GET['pagefilter'])) {
        $pagefilter = $_GET['pagefilter'];
    } else {
        $pagefilter = 1;
    }
         $num = 5;
         $start = ($pagefilter - 1) * $num;
         $sql="SELECT* FROM base_checklist where realese_id=61 and (" . $z1 . $z2 . $z3 . $z4 . ")" . "order by id desc limit $start, $num";
         $query = mysqli_query($con, $sql);
         $out='';
         while ($row = mysqli_fetch_assoc($query)) {

             $out.='<tr>
                      <td>' . $row['card_name'] . '</td>
                  </tr>';
            }
//            echo $out;

            $sql1="SELECT* FROM base_checklist where realese_id=61 and (" . $z1 . $z2 . $z3 . $z4 . ")" . "order by id desc";
            $query1 = mysqli_query($con, $sql1);
            $num = mysqli_num_rows($query1);
            $page_num = ceil($num / 5);
            $num_page = '';
            for ($i = 1; $i <= $page_num; $i++) {
                $num_page .= "<a href='custom_checklist_name_new.php?pagefilter=" . $i . "' class='btn btn-primary m-1 a' data-id='" . $i . "' >$i</a>";
            }


?>
    <link rel="stylesheet" type="text/css" href="css/navbar-body.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/custom_checklist_name.css">
    </head>
    <body>
    <?php include "cookie.php"; ?>
    <section class="custom_checklist_name" >
        <div class="container">
            <!--<input id="inp">-->
            <table id="bootstrap-table-2" class="table">
                <thead>
                <!--<th data-field="state" data-checkbox="true"></th>-->
                <th data-field="id" class="text-center">ID-count</th>
                <th data-field="id" class="text-center">ID</th>
                <th data-field="Card number">Card name</th>
                <th data-field="Card name">Team</th>
                <th data-field="Team">Set type</th>
                <th data-field="Parallel">Parallel</th>
                <th data-field="Print run">Print run</th>
                <tr>
<!--                    <td data-field="id" class="text-center"><input   class='k1' data_val="id_count" id="tinp1"></td>-->
<!--                    <td data-field="id" class="text-center"><input  class='k1'  data_val="id" id="tinp2"></td>-->
<!--                    <td data-field="Card number"><input class='k1' data_val="card_name"id="tinp3"></td>-->
<!--                    <td data-field="Card name"><input  class='k1' data_val="team"id="tinp4"></td>-->
<!--                    <td data-field="Team"><input  class='k1'data_val="set_type" id="tinp5"></td>-->
<!--                    <td data-field="Parallel"><input class='k1' data_val="parallel" id="tinp6"></td>-->
<!--                    <td data-field="Print run"><input class='k1' data_val="print_run" id="tinp7"></td>-->
                </tr>
                </thead>
                <tbody id="filter_table">
                    <?php  echo $out;?>

                </tbody>
            </table>
            <div id="plag">
                <?php  echo $num_page;?>

            </div>
        </div>
    </section>
                <?php
                include "footer.php";
                ?>



    </body>
</html>
