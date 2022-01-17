<?php

include "header.php";
include "config/con1.php";
require_once "user-logedin.php";


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
                <td data-field="id" class="text-center"><input   class='k1' data_val="id_count" id="tinp1"></td>
                <td data-field="id" class="text-center"><input  class='k1'  data_val="id" id="tinp2"></td>
                <td data-field="Card number"><input class='k1' data_val="card_name"id="tinp3"></td>
                <td data-field="Card name"><input  class='k1' data_val="team"id="tinp4"></td>
                <td data-field="Team"><input  class='k1'data_val="set_type" id="tinp5"></td>
                <td data-field="Parallel"><input class='k1' data_val="parallel" id="tinp6"></td>
                <td data-field="Print run"><input class='k1' data_val="print_run" id="tinp7"></td>
            </tr>
            </thead>
            <?php
            $sql="SELECT*FROM base_checklist where  realese_id='61' ";
            $query=mysqli_query($con,$sql);
            $num=mysqli_num_rows($query);
            echo $num;
            while($row=mysqli_fetch_assoc($query)){
                echo $row['card_name'];
            }
            if(!isset($_GET['filterpage'])){

            }



            ?>
            if(!isset($_GET[filterpage]))




            <tbody id="filter_table">

            </tbody>
        </table>
        <div id="plag">

        </div>
    </div>
</section>
<?php
include "footer.php";
?>


</body>
</html>
