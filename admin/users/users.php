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

           $sql = "Select * From users";
           $total_rows_query = mysqli_query($con, $sql);

           $tables = new Tables();
           $tables -> tblName = 'users';
           $tables -> limit = 20;
           $table = $tables -> UsersTable($con);

           $pagination = new Pagination();
           $pagination -> limit = 20;
           $pagination -> count_rows = mysqli_num_rows($total_rows_query);

            if($table) {
                $count = 0;
                while($row = mysqli_fetch_assoc($table)) {
                   $count ++;
                   if($row["active"] == 1) {
                    $content .= "<tr data-id='" . $row['id'] . "'>
                        <td>" . $count . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["country"] . "</td>
                        <td>" .  $row["city"] . " </td>
                        <td>" .  $row["birth_day"] . " </td>
                        <td class='icon'>
                            <i class='disabled fa fa-minus-circle' data-disabled='0'></i>
                        </td>
                        
                    </tr>";
                    }else {
                        $content .= "<tr class='disabled_tr' data-id='" . $row['id'] . "'>
                                <td>" . $count . "</td>
                                <td>" . $row["name"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["country"] . "</td>
                                <td>" .  $row["city"] . " </td>
                                <td>" .  $row["birth_day"] . " </td>
                                <td class='icon'>
                                    <i class='disabled fa fa-check-circle' data-disabled='1'></i>
                                </td>

                                </tr>";
                    }
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
                                        <input type="search" id="users_search">
                                        <table class="users_table table table-striped table-no-bordered table-hover" data-name="users">
                                            <thead>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                <th>Birth day</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody id="num-rows" data-rows="<?=mysqli_num_rows($total_rows_query)?>">
                                                <?=  $content ?>
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                <th>Birth day</th>
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
            <?php
                include "../footer.php";
            ?>
        <script src="../my_js/users.js"></script>
        <script src="../my_js/disabled_user.js"></script>

</body>
</html>