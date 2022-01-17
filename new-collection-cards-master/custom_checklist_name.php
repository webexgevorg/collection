<?php

    include "header.php";
    include "config/con1.php";
    require_once "user-logedin.php";

    if(!isset($_SESSION['release_dblclick'])){?>
        <script>
            window.location.href="release_id.php"
        </script>
    <?php
        }

    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }



        $num_per_page=10;

        $start_from=($page-1)*$num_per_page;
        $sql="SELECT * FROM base_checklist  where  realese_id='$_SESSION[release_dblclick]' order by id desc limit $start_from, $num_per_page   ";
        $query=mysqli_query($con,$sql);



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
            <td data-field="id" class="text-center"><input   class='k1' data_val="id_count" id="tinp1"></td>
            <td data-field="id" class="text-center"><input  class='k1'  data_val="id" id="tinp2"></td>
            <td data-field="Card number"><input class='k1' data_val="card_name"id="tinp3"></td>
            <td data-field="Card name"><input  class='k1' data_val="team"id="tinp4"></td>
            <td data-field="Team"><input  class='k1'data_val="set_type" id="tinp5"></td>
            <td data-field="Parallel"><input class='k1' data_val="parallel" id="tinp6"></td>
            <td data-field="Print run"><input class='k1' data_val="print_run" id="tinp7"></td>
        </tr>
        </thead>

        <tbody id="filter_table">

        <?php
            $count=0;
            while($row=mysqli_fetch_assoc($query)){
                $count++;
        ?>
                    <tr>
                            <td><?= $count ?></td>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['card_name'] ?></td>
                            <td><?= $row['team'] ?></td>
                            <td><?= $row['set_type'] ?></td>
                            <td><?= $row['parallel'] ?></td>
                            <td><?= $row['print_run'] ?></td>
                    </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
        <div id="plag" style="margin:10px; text-align:center">

            <?php

            $sql_page="SELECT * FROM base_checklist where realese_id='$_SESSION[release_dblclick]'";
            $query=mysqli_query($con, $sql_page);

            $totalrecords=mysqli_num_rows($query);
            //echo $totalrecords;
            $totalpages=ceil($totalrecords/$num_per_page);
            //echo $totalpages;
//            for($i=1;$i<=$totalpages;$i++){
//                echo  "<a href='custom_checklist_name.php?page=".$i."' class='btn btn-primary m-1'>$i</a>";
//            }
            function Pagination($totalPages,$page){
                if($totalPages < 5)  foreach(range(1,$totalPages) as $p) echo '<a href="custom_checklist_name.php?page='.$p.'"style="margin:0 3px;background:rgb(110,164,174);color: rgb(19,57,96);width:30px;height:30px;display:inline-block;text-align:center;line-height:30px;border-radius:50%">'.$p.'</a>';//if $totalPages count less then 5
                if($totalPages > 4 & $page<5) foreach(range(1,5) as $p) echo '<a href="custom_checklist_name.php?page='.$p.'" style="display:inline-block; width:30px; height:30px; line-height:30px;padding:10px;background:rgb(110,164,174);color: rgb(19,57,96);border-radius:50%;margin:5px">'.$p.'</a>';//1-5
                if($totalPages-5 < 5 && $page>5) foreach(range($totalPages-4,$totalPages) as $p) echo '<a href="custom_checklist_name.php?page='.$p.'" style="display:inline-block; width:30px; height:30px;line-height:30px;padding:10px;background:rgb(110,164,174);color: rgb(19,57,96);border-radius:50%;margin:5px">'.$p.'</a>';//ban charec
                if($totalPages > 4 && $totalPages-5<5 && $page==5)foreach(range($page-2,$totalPages) as $p) echo '<a href="custom_checklist_name.php?page='.$p.'" style="display:inline-block;width:30px; height:30px; line-height:30px;padding:10px;background:rgb(110,164,174);color: rgb(19,57,96);border-radius:50%;margin:5px">'.$p.'</a>';
                if($totalPages > 4 && $totalPages-5>5 && $page>=5 && $page<=$totalPages - 4) foreach(range($page-2,$page+2) as $p) echo '<a href="custom_checklist_name.php?page='.$p.'" style="display:inline-block;width:30px; height:30px;line-height:30px;padding:10px;background:rgb(110,164,174);color: rgb(19,57,96);border-radius:50%;margin:5px">'.$p.'</a>';
           if ($totalPages > 4 && $totalPages-5>5 && $page>$totalPages-4) foreach(range($totalPages-4,$totalPages) as $p) echo '<a href="custom_checklist_name.php?page='.$p.'" style="display:inline-block;width:30px; height:30px; line-height:30px; padding:10px;background:rgb(110,164,174);color: rgb(19,57,96);border-radius:50%;margin:5px">'.$p.'</a>';
            }


Pagination($totalpages,$page)


        ?>

        </div>
    </div>
</section>
<?php
include "footer.php";
?>
<script src="js/custom_checklist_name.js"></script>


</body>
</html>
