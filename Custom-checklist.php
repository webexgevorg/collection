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

<?php
    if(isset($_GET["public"])) {
        $status = 1;
        $buttons = '<a class="def_passive" href="Custom-checklist.php?private">Privite<a class="def_active" href="Custom-checklist.php?public">Public</a>';
    }else if(isset($_GET["private"])) {
        $status = 0;
        $buttons = '<a class="def_active" href="Custom-checklist.php?private">Privite</a><a class="def_passive" href="Custom-checklist.php?public">Public</a>';
    }
    else{}

    $_SESSION["def_custom_name_status"]=$status;
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/my_checklist.css">
<link rel="stylesheet" href="css/pagination.css">
<link rel="stylesheet" type="text/css" href="css/checklist.css?7">
</head>
<body>
<?php include "cookie.php"; ?>
<section class="hide_div"></section>
<section class="section1 mt-5">
    <div class="notification_modal">
        <div class="notification_content">
            <input type="hidden" class="notification_remove_id">
            <div class="notification">If you delete this checklist and delete the cards inside it</div>
            <div class="notification_buttons">
                <button class="cancel">CANCEL</button>
                <button class="delete_checklist">DELETE</button>
            </div>
        </div>
    </div>

    <div class="my-5 container" style="min-height: 211px">
        <h2 class="text-center mb-5 font">CUSTOM CHECKLISTS</h2>

        <div class="add_button">
            <div class="define">
                <?= $buttons ?>
            </div>
            <a href="custom.php">+ Add new</a>
        </div>
        <div class="w-100 cards mb-5 " >
        <?php
        $sql="SELECT * FROM custom_name_checklist where user_id=$user_id AND status=$status AND delete_status = 1";
        $query=mysqli_query($con, $sql);
        $total_rows_query=mysqli_query($con, $sql);
        $num_rows=mysqli_num_rows($query);
    
        $conditions = array('user_id' => $user_id, 'status' => $status, "delete_status" => 1);
        $tables = new Tables();
        $tables -> tblName = 'custom_name_checklist';
        $tables -> limit = 20;
        $table = $tables -> Table($con, $conditions);

        $pagination = new Pagination();
        $pagination -> limit = 20;
        $pagination -> count_rows = mysqli_num_rows($total_rows_query);
        $num_rows = mysqli_num_rows($query);

           if($num_rows>0){  
        ?>
            <table class="table" id="checklists" data-name="custom_name_checklist" >
                <thead>
                    <tr>
                        <th data-field="id" class="text-center">#</th>
                        <th data-field="Card number">Name checklist</th>
                        <th data-field="Card year">Actions</th>
                    </tr>
                </thead>
                <tbody id="num-rows" class="search_from_table" data-rows="<?=mysqli_num_rows($total_rows_query)?>">
                    <?php
                        $count = 0;
                        while($row=mysqli_fetch_assoc($table)){
                            $count++;
                            $tblName='collections';
                            echo "<tr data-collId='".$row['id']."' class='tr_checklist'>
                                <td>".$count."</td>
                                <td class='info'>".$row['name_of_checklist']."</td>
                                <td class='icons'>
                                    <i class='fa fa-edit'></i>
                                    <i class='fa fa-trash remove'></i>
                                </td>
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
    <div class="status"></div>


</section>
<?php include "footer.php"; ?>

<script src="js/checklist.js"></script>

</body>
</html>