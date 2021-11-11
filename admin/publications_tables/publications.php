<?php
           include "../heder.php";
           if(empty($_SESSION['login']) || $_SESSION['login']!="admin"){
               header('location:../index.php');
          }
        ?>
    <body>
        <?php
           include "../menu.php";
           include "../../config/con1.php";
           
        ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                                <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div class="fresh-datatables">
                                        <div class='col-md-12 text-center'>
                                            <div class='col-md-7 mx-auto'>
                                                <form method="post" action=''>
                                                    <div class="form-group">
                                                    <label>Year of releases</label>
                                                    <select onchange="this.form.submit()" class="form-control select" id="sel-publications-status" name='sel-publications-status'>
                                                        <?php include "select_publications_status.php"; ?>
                                                    </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                     <th>#</th>
                                                     <th >Title</th>
                                                     <th >Discription</th>
                                                     <th >Sport</th>
                                                     <th >Producer</th>
                                                     <th >News type</th>
                                                     <!-- <th >Status</th> -->
                                                     <th >Created date</th>
                                                     <th >Published date</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                     <th>#</th>
                                                     <th >Title</th>
                                                     <th >Discription</th>
                                                     <th >Sport</th>
                                                     <th >Producer</th>
                                                     <th >News type</th>
                                                     <!-- <th >Status</th> -->
                                                     <th >Created date</th>
                                                     <th >Published date</th>
                                                </tr>
                                            </tfoot>
                                            <!--  -->
                                            <tbody>
                                            <?php
                                            if(isset($_SESSION['status_publications'])){
                                                $status_publications=$_SESSION['status_publications'];
                                                if( $status_publications==0){
                                                    $icon='<i class="bi bi-file-earmark-plus" title="Published"></i>';
                                                    $btn_status='btn-success';
                                                    $change_publications_status=1;
                                                }
                                                else{
                                                    $icon='<i class="bi bi-file-earmark-minus" title="Unpublished"></i>';
                                                    $btn_status='btn-danger';
                                                    $change_publications_status=0;
                                                }
                                            }
                                            else{
                                                $status_publications=0;
                                                $icon='<i class="bi bi-file-earmark-minus"></i>';
                                                $btn_status='btn-danger';
                                                $change_publications_status=1;
                                            }
                                            $sql="SELECT * FROM publications WHERE status=$status_publications ORDER BY id ASC ";
                                                    $result=mysqli_query($con, $sql);
                                                    $count=0;
                                                    while($row=mysqli_fetch_assoc($result)){
                                                        $count++;
                                                        echo "<tr name=''>
                                                                <td class=''>".$count."</td>
                                                                <td class=''>".$row['title']."</td>
                                                                <td class=''>".$row['titledescription']."</td>
                                                                <td class=''>".$row['sport_type']."</td>
                                                                <td class=''>".$row['producer']."</td>
                                                                <td class=''>".$row['news_type']."</td>
                                                                <td class=''>".$row['created_date']."</td>
                                                                <td class='text-right d-flex flex-column' data-id='".$row['id']."'>
                                                                   <a href='../publications/add_publications.php?id=".$row['id']."' class='btn btn-link btn-warning edit' name=''><i class='fa fa-edit'></i></a>
                                                                   <a href='#' class='btn btn-link change-status ".$btn_status."' name='".$change_publications_status."'>".$icon."</a>
                                                                   <a href='#' class='btn btn-link btn-danger remove' data_name=''><i class='fa fa-times'></i></a>
                                                                </td>
                                                               </tr>";
                                                    }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <?php 
                                    include "../footer.php";
                                    ?>
    <script src="../my_js/publications_actions.js"></script>
   
</body>
</html>