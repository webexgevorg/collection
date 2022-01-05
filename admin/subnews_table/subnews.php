<?php
include "../heder.php";
include "../../classes/table.php";
include "../../classes/pagination.php";
if(empty($_SESSION['login']) || $_SESSION['login']!="admin"){
    header('location:../index.php');
}
?>

<style>
    .data-tables .pagination {
        float: none;
    }

    .pagination>li > a {
        color: #000 !important;
    }
</style>

<link rel="stylesheet" href="../../css/pagination.css">
<body>
<?php
include "../menu.php";
include "../../config/con1.php";

$sql="SELECT * FROM subnews";
$result=mysqli_query($con, $sql);

$tables = new Tables();
$tables -> tblName = 'subnews';
$tables -> limit = 20;
$table=$tables->Table($con);

$pagination = new Pagination();
$pagination -> limit = 20;
$pagination -> count_rows = mysqli_num_rows($result);

if($table) {
    $count=0;
    while($row=mysqli_fetch_assoc($table)){
        $count++;
        $content .= "<tr name=''>
                        <td class=''>".$count."</td>
                        <td class=''>".$row['subnews_name']."</td>
                        
                        <td class='text-right' data-id='".$row['id']."'>
                           <a href='../subnews/add_subnews.php?id=".$row['id']."' class='btn btn-link btn-warning edit' name=''><i class='fa fa-edit'></i></a>
                        </td>
                       </tr>";
    }
}

?>





<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card data-tables">
                    <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-ex-10 " style="margin: 0 auto">
                            <div></div>
                            <table class="users_table table table-striped table-no-bordered table-hover" data-name="publications">
                                <thead>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th class='text-right' >Actions</th>
                                </thead>
                                <tbody id="num-rows" data-rows="<?=mysqli_num_rows($result)?>">
                                    <?=  $content ?>
                                </tbody>
                                <tfoot>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th class='text-right'>Actions</th>
                                </tfoot>
                            </table>
                            <div class="mt-3">
                                <nav aria-label="Page navigation ">
                                    <ul class="pagination justify-content-center r" >
                                        <?php echo $pp= $pagination->pages(); ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="status"></div>
<?php include "../footer.php";?>


<script src="../my_js/publications.js"></script>



</body>
</html>