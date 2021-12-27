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


    include "select_publications_status.php";

    echo $_SESSION['status_publications'];


    if($option == "") {
        $option = "<option value='0'>Unpublished</option><option value='1'>Published</option>";
    }


    if( isset($_SESSION['status_publications']) ){
        $status_publications = $_SESSION['status_publications'];

        if( $status_publications == 0 ){
            $icon = '<i class="bi bi-file-earmark-plus" title="Published"></i>';
            $btn_status = 'btn-success';
            $change_contact_status = 1;
        }
        else{
            $icon = '';
            $btn_status = 'btn-danger';
            $change_contact_status = 0;
        }
    }
    else{
        $status_publications = 0;
        $icon = '<i class="bi bi-file-earmark-minus"></i>';
        $btn_status = 'btn-danger';
        $change_contact_status = 1;
    }

    //                $sql="SELECT * FROM contact_message WHERE status=$status_publications ORDER BY id ASC ";
    $sql="SELECT * FROM publications WHERE status=$status_publications ORDER BY id ASC ";
    $result=mysqli_query($con, $sql);

    $tables = new Tables();
    $tables -> tblName = 'publications';
    $tables -> limit = 20;
    $conditions=array('status' => $_SESSION['status_publications']);
    $table=$tables->ContactsTable($con, $conditions);

    $pagination = new Pagination();
    $pagination -> limit = 20;
    $pagination -> count_rows = mysqli_num_rows($result);

    if($table) {
        $count=0;
        while($row=mysqli_fetch_assoc($table)){
            $count++;
            $content .= "<tr name=''>
                                <td class=''>".$count."</td>
                                <td class=''>".$row['title']."</td>
                                <td class=''>".$row['titledescription']."</td>
                                <td class=''>".$row['sport_type']."</td>
                                <td class=''>".$row['producer']."</td>
                                <td class=''>".$row['news_type']."</td>
                                <td class=''>".$row['created_date']."</td>
                                <td class='text-right d-flex flex-column' data-id='".$row['id']."' class='btn btn-link btn-marning edit'> 
                                    <a href='..piblications/add_publications.php?id=".$row['id']."'></a>   
                                    <a href='#' class='btn btn-link change-status ".$btn_status."'  name='".$change_contact_status."'>".$icon."</a>
                                    <a href='#' class='btn btn-link btn-danger remove' data_name=''>
                                        <i class='fa fa-times '></i>
                                    </a>
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
                            <div class='col-md-12 text-center'>
                                <div class='col-md-7 mx-auto'>
                                    <form method="post" action=''>
                                        <div class="form-group">
                                            <label>Select a section</label>
                                            <select onchange="this.form.submit()" class="form-control select" id="sel-publications-status" name='sel-publications-status'>
                                                <?= $option ?>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table class="users_table table table-striped table-no-bordered table-hover" data-name="contact_message">
                                <thead>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Titledescription</th>
                                    <th>Sport_type</th>
                                    <th>Producer</th>
                                    <th>News_type</th>
                                    <th>Created_date</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody id="num-rows" data-rows="<?=mysqli_num_rows($result)?>">
                                <?=  $content ?>
                                </tbody>
                                <tfoot>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Titledescription</th>
                                    <th>Sport_type</th>
                                    <th>Producer</th>
                                    <th>News_type</th>
                                    <th>Created_date</th>
                                    <th>Actions</th>
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


<script src="../my_js/contact.js"></script>



</body>
</html>