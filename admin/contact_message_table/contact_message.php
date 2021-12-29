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

   @media only screen and (max-width: 700px) {
        .inp{
            flex-wrap: wrap !important;

        }
        .form-control {
          
        }
   }
</style>

<link rel="stylesheet" href="../../css/pagination.css">
        <body>
            <?php
                include "../menu.php";
                include "../../config/con1.php";


                //publication status (read, unread)

            include "select_messages_status.php";

            if($option == "") {
                $option = "<option value='0'>Unread</option><option value='1'>Read</option>";
            }


                if( isset($_SESSION['status_messages']) ){
                    $status_messages = $_SESSION['status_messages'];
                    if( $status_messages == 0 ){
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
                    $status_messages = 0;
                    $icon = '<i class="bi bi-file-earmark-minus"></i>';
                    $btn_status = 'btn-danger';
                    $change_contact_status = 1;
                }

                echo $_SESSION['status_messages'];


//                $sql="SELECT * FROM contact_message WHERE status=$status_messages ORDER BY id ASC ";
                $sql="SELECT * FROM contact_message WHERE status=$status_messages ORDER BY id ASC ";
                $result=mysqli_query($con, $sql);

                $tables = new Tables();
                $tables -> tblName = 'contact_message';
                $tables -> limit = 20;
                $conditions=array('status' => $_SESSION['status_messages']);
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
                            <td class=''>".$row['name']."</td>
                            <td class=''>".$row['email']."</td>
                            <td class=''>".$row['message']."</td>
                            <td class=''>".$row['date']."</td>
                            <td class='text-right d-flex flex-column' data-id='".$row['id']."'> 
                                <a href='#' id=".$row['id']." class='btn btn-link change-status ".$btn_status."'  name='".$change_contact_status."'>".$icon."</a>
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
                                    <div  style="margin: 0 auto">
                                        <div></div>
                                        <div class='col-md-12 text-center'>
                                            <div class='col-md-7 mx-auto'>
                                                <form method="post" action=''>
                                                    <div class="form-group">
                                                        <label>Select a section</label>
                                                        <select onchange="this.form.submit()" class="form-control select" id="sel-messages-status" name='sel-messages   -status'>

                                           
                                                            <?= $option ?>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label>Search FROM TABLE</label>
                                                      <input type="text" class="form-control" placeholder="Search">
                                                    </div>
                                                  </div>
                                                </form>
                                                                                           
                                        </div>
                                        <table class="users_table table table-striped table-no-bordered table-hover table-responsive" data-name="contact_message">
                                            <thead>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody id="num-rows" data-rows="<?=mysqli_num_rows($result)?>">
                                            <?=  $content ?>
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tfoot>
                                        </table>
                                        <div class="mt-3">
                                            <nav aria-label="Page navigation ">
                                                <ul class="pagination justify-content-center" >
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