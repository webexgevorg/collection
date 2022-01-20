<?php
include "header.php";
include "config/con1.php";
require_once "user-logedin.php";
include "classes/pagination.php";
include "classes/table.php";

if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    if(!empty($_COOKIE['user'])){
        $user_id=$_COOKIE['user'];
    }
    if(!empty($_SESSION['user'])){
        $user_id=$_SESSION['user'];
    }
   
}

?>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/my_checklist.css">
<link rel="stylesheet" type="text/css" href="css/checklist.css">
<link rel="stylesheet" href="css/pagination.css">
</head>
<body>
<?php include "cookie.php"; ?>
<section class="hide_div"></section>
<section class="section1 mt-5">
    <div class="my-5 container" style="min-height: 211px">
        <h2 class="text-center mb-5 font">FAVORITE CHECKLISTS</h2>
         <div class="add_button">
            <div class="define">
                <a class="def_active" href="#">Collectors</a>
                <a class="def_passive" href="#">Collections</a>
                <a class="def_passive" href="#">Cards</a>
            </div>
        </div>
        <div class="w-100 cards mb-5 " >
        <?php   
        $sql="SELECT * FROM favorite_checklists where user_id=$user_id";
        $query=mysqli_query($con, $sql);
        $total_rows_query=mysqli_query($con, $sql);

        $conditions = array('user_id' => $user_id);
        $tables = new Tables();
        $tables -> tblName = 'favorite_checklists';
        $tables -> limit = 20;
        $table = $tables -> Table($con, $conditions);

        $pagination = new Pagination();
        $pagination -> limit = 20;
        $pagination -> count_rows = mysqli_num_rows($total_rows_query);
        $num_rows = mysqli_num_rows($query);
           if($num_rows > 0){  
        ?>
            <table class="table" id="checklists" data-name="favorite_checklists">
                <thead>
                    <tr>
                        <th data-field="id" class="text-center">#</th>
                        <th data-field="Card number">Name checklist</th>
                        <th data-field="Card year">Actions</th>
                    </tr>
                </thead>
                <tbody id="num-rows" data-rows="<?=mysqli_num_rows($total_rows_query)?>">
                    <?php
                        $count = 0;
                            while($row=mysqli_fetch_assoc($table)){
                                $count++;
                                // --- petq e poxel ------------
                                // $tblName=$row['checklist_type'];
                                // $tblName='collections';
                                $checklist_name="SELECT name_of_collection FROM collections WHERE id=$row[checklist_id]";
                                $query_checklist_name=mysqli_query($con, $checklist_name);

                                $row_name=mysqli_fetch_assoc($query_checklist_name);
                                echo "<tr data-collId='".$row['checklist_id']."' class='tr_checklist'>
                                    <td>".$count."</td>
                                    <td class='info'>".$row_name['name_of_collection']."</td>
                                    <td>
                                        <i class='fa fa-trash' style='font-size:30px; color: #6EA4AE; cursor: pointer'></i></td>
                                </tr>";
                            }
                    ?>
                </tbody>
            </table>
        <?php
        }
        else{
            echo "<div class='text-center'>Nothing found</div>";
        }
        ?>
        <div class="mt-3">
            <nav aria-label="Page navigation ">
                <ul class="pagination justify-content-center r" >
                <?php echo $pp= $pagination->pages(); ?>
                </ul>
            </nav>
        </div>
        </div>
    </div>
    <div class="delete"></div>
</section>
<?php include "footer.php"; ?>

<script src="js/checklist.js"></script>
<script src="user_js/favorite_checklist.js"></script>

<script>

</script>


</body>
</html>