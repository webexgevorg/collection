<?php
include "config/con1.php";
include "header.php";
include "classes/pagination.php";
include "classes/table.php";

if(isset($_SESSION['product'])){
    $product=$_SESSION['product'];
    $sport_type=$_SESSION['sport_type'];
    $year_prod=$_SESSION['year_prod'];
    $year=explode('-', $year_prod);
        $before_year=$year[0];
        $after_year=$year[1];
    
    $sql_checklist="SELECT * FROM collections WHERE sport_type='$sport_type' AND SUBSTRING(year_of_releases, 1, 4) BETWEEN $before_year AND $after_year";
    $res_checklist=mysqli_query($con, $sql_checklist);

    $conditions=array('sport_type' => $sport_type);
    $tables=new Tables();
    $tables->tblName='collections';
    $table=$tables->TableSportYear($con, $before_year, $after_year, $conditions);
    
    $total_rows_query=mysqli_query($con, $sql_checklist);
    $pagination= new Pagination();
    $pagination->limit=5;
    $pagination->count_rows=mysqli_num_rows($total_rows_query);
    
}
?>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/base_checklist.css">
<link rel="stylesheet" href="css/pagination.css">
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
<style>
    tr:hover{
        background: #6ea4ae;
        cursor: pointer;
    }
</style>

</head>
    <body class="page_fix">
        <?php include "cookie.php";?>
        <section class="section1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class = "realeses text-center">List of <?=$sport_type?> checklists for <?=$year_prod ?></h2>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bootstrap-table">
                            <div class="card-body table-full-width table-responsive filterable">
                                <table class="table" id="checklists" data-sport="<?=$sport_type?>" data-year="<?=$year_prod?>" data-product="checklist">
                                    <thead>
                                        <th data-field="id" class="text-center">#</th>
                                        <th data-field="Card number">Name checklist</th>
                                        <th data-field="Card year">Year</th>
                                    </thead>
                                    <tbody id="num-rows" data-rows="<?=mysqli_num_rows($total_rows_query)?>">
                                        <?php
                                            $count = 0;
                                            if($table){
                                                while($row=mysqli_fetch_assoc($table)){
                                                    $count++;
                                                echo "<tr data-collId='".$row['id']."' class='tr_checklist'>
                                                        <td>".$count."</td>
                                                        <td>".$row['name_of_collection']."</td>
                                                        <td>".$row['year_of_releases']."</td>
                                                    </tr>";
                                                }
                                            }
                                            else{
                                                echo "<tr><td colspan='3 text-center'>Nothing found<td></tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <nav aria-label="Page navigation ">
                        <ul class="pagination justify-content-center r" >
                       <?php echo $pp= $pagination->pages(); ?>
                        </ul>
                    </nav>
                </div>
            </div>    
        </section>
    <?php  include "footer.php"; ?>
    <script src="js/checklist.js"></script>
</body>
</html>