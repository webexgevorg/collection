<?php
    include "../heder.php";
    include "../../classes/table.php";
    include "../../classes/pagination.php";

    if(empty($_SESSION['login']) || $_SESSION['login']!="admin"){
        header('location:../index.php');
    }
?>

<style>

    .fa-minus-circle {
        color: red;
        font-size: 20px;
        cursor: pointer;
    }

    .fa-check-circle {
        color: green;
        font-size: 20px;
        cursor: pointer;
    }

    .data-tables .pagination {
        float: none;
    }

    .pagination>li > a {
        color: #000 !important;
    }

    .disabled_tr {
        background: #f7707073 !important;
    }


</style>

<link rel="stylesheet" href="../../css/pagination.css">

    <body>
        <?php
           include "../menu.php";
           include "../../config/con1.php";

            $sql="SELECT * FROM messages_for_change_profile_name";
            $result=mysqli_query($con, $sql);

            $tables = new Tables();
            $tables -> tblName = 'messages_for_change_profile_name';
            $tables -> limit = 20;
            $table = $tables -> Table($con);

            $pagination = new Pagination();
            $pagination -> limit = 20;
            $pagination -> count_rows = mysqli_num_rows($result);

            $count=0;
            while($row=mysqli_fetch_assoc($table)){
                $count++;
                $sql_user="SELECT name FROM users WHERE id=$row[user_id]";
                $query_user=mysqli_query($con, $sql_user);
                $row_user=mysqli_fetch_assoc($query_user);
                $content .= "<tr name='' data-id='".$row['id']."'>
                                <td class=''>".$count."</td>
                                <td class='user_id'>".$row['user_id']."</td>
                                <td class=''>".$row_user['name']."</td>
                                <td class='new_profile_name'>".$row['new_profile_name']."</td>
                                <td class=''>".$row['message']."</td>
                                <td class=''>".$row['date']."</td>
                                <td class=''>".$row['status']."</td>
                                <td class='text-right'>
                                    <div class='chnge-name text-warning' ><i class='fa fa-edit '></i></div>
                                </td>
                            </tr>";
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
                                        <table class="users_table table table-striped table-no-bordered table-hover" data-name="messages_for_change_profile_name">
                                            <thead>
                                                <th>#</th>
                                                <th >User ID</th>
                                                <th >Old Name/Nikname</th>
                                                <th >New Name/Nikname</th>
                                                <th >Message</th>
                                                <th >Date</th>
                                                <th >Status</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody id="num-rows" data-rows="<?=mysqli_num_rows($result)?>">
                                            <?=  $content ?>
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th >User ID</th>
                                                <th >Old Name/Nikname</th>
                                                <th >New Name/Nikname</th>
                                                <th >Message</th>
                                                <th >Date</th>
                                                <th >Status</th>
                                                <th>Action</th>
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
            <?php
                include "../footer.php";
            ?>


<!-- ----------- modal -------------------- -->
<button class='open-change-name-modal d-none' data-toggle='modal' data-target='#staticBackdrop'></button>
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="result-modal-body text-center py-3">
        
      </div>
      
    </div>
  </div>
</div>
    <script src="../my_js/change_profile_name_by_admin.js"></script>
   
</body>
</html>