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
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="fresh-datatables">
                                        <div class='col-md-12 text-center'>
                                            <div class='col-md-7 mx-auto'>
                                                <form method="post" action=''>
                                                <div class="form-group">
                                                  <label>Year of releases</label>
                                                  <select onchange="this.form.submit()" class="form-control select" id="select_name_collection" name='nnn'>
                                                    <!-- ------------------ -->
                                                    <?php include "select_name_collection.php"; ?>
                                                  </select>
                                                  <!-- <button name='oooo'>ooooo</button> -->
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                     <th>#</th>
                                                    <!-- <th>YEAR OF RELEASES</th>
                                                    <th>PRODUCER</th> -->
                                                    <!-- <th>NAME OF COLLECTION</th> -->
                                                    <th>CARD NUMBER</th>
                                                    <th>CARD NAME</th>
                                                    <th>TEAM</th>
                                                    <th>SET TYPE</th>
                                                    <!-- <th>SPORT TYPE</th> -->
                                                    <th>PARALLEL</th>
                                                    <th>PRINT RUN</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                     <th>#</th>
                                                     <!-- <th>YEAR OF RELEASES</th>
                                                    <th>PRODUCER</th>
                                                    <th>NAME OF COLLECTION</th> -->
                                                    <th>CARD NUMBER</th>
                                                    <th>CARD NAME</th>
                                                    <th>TEAM</th>
                                                    <th>SET TYPE</th>
                                                    <!-- <th>SPORT TYPE</th> -->
                                                    <th>PARALLEL</th>
                                                    <th>PRINT RUN</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="sortable">
                                                    <?php 
                                                    
                                                    if(isset($_POST['nnn'])){
                                                       $collection_id=$_SESSION['realese_id'];

                                                    $count=0;
                                                    // $sql="SELECT * FROM base_checklist ORDER BY sort_number ASC";
                                                    $sql="SELECT * FROM base_checklist WHERE realese_id=$collection_id ORDER BY sort_id ASC ";
                                                    $result=mysqli_query($con, $sql);
                                                    while($row=mysqli_fetch_assoc($result)){

                                                      $sql1="SELECT MAX(id) AS 'max_id' FROM base_checklist WHERE realese_id=$collection_id ";
                                                      $res1=mysqli_query($con, $sql1);
                                                      $row1=mysqli_fetch_assoc($res1);
                                                      $max_id=$row1['max_id'];
                                                        $count++;
                                                        echo "  <tr name=".$row['realese_id']."><td class='first_td'>".$count."<input  type='hidden' value='".$row['id']."' /></td>
                                                               <td class='c_number'>".$row['card_number']."</td>
                                                               <td class='c_name'>".$row['card_name']."</td>
                                                               <td class='c_team'>".$row['team']."</td>
                                                               <td class='c_set_type'>".$row['set_type']."</td>
                                                               <td class='c_parallel'>".$row['parallel']."</td>
                                                               <td class='c_print_run'>".$row['print_run']."</td>
                                                                <td class='text-right'>
                                                        <a href='#' class='btn btn-link btn-warning edit a_edit' name=".$row['id']."><i class='fa fa-edit'></i></a>
                                                        <a href='#' class='btn btn-link btn-info copy' data-id=".$max_id." name=".$row['id']."><i class='fa fa-copy'></i></a>
                                                        <a href='#' class='btn btn-link btn-danger remove' data_name=".$row['id']."><i class='fa fa-times'></i></a>
                                                        
                                                    </td>
                                                               </tr>";
                                                    }
                                                    }
                                                    else{
                                                        if(isset($_SESSION['realese_id'])){
                                                    
                                                      $collection_id=$_SESSION['realese_id'];
    
                                                  $count=0;
                                                    // $sql="SELECT * FROM base_checklist ORDER BY sort_number ASC";
                                                    $sql="SELECT * FROM base_checklist WHERE realese_id=$collection_id ORDER BY sort_id ASC ";
                                                    $result=mysqli_query($con, $sql);
                                                    while($row=mysqli_fetch_assoc($result)){
                                                        $count++;

                                                        $sql1="SELECT MAX(id) AS 'max_id' FROM base_checklist WHERE realese_id=$collection_id ";
                                                      $res1=mysqli_query($con, $sql1);
                                                      $row1=mysqli_fetch_assoc($res1);
                                                      $max_id=$row1['max_id'];

                                                        echo "  <tr name=".$row['realese_id']."><td class='first_td'>".$count."<input  type='hidden' value='".$row['id']."' /></td>
                                                               <td class='c_number'>".$row['card_number']."</td>
                                                               <td class='c_name'>".$row['card_name']."</td>
                                                               <td class='c_team'>".$row['team']."</td>
                                                               <td class='c_set_type'>".$row['set_type']."</td>
                                                               <td class='c_parallel'>".$row['parallel']."</td>
                                                               <td class='c_print_run'>".$row['print_run']."</td>
                                                               <td class='text-right'>
                                                        <a href='#' class='btn btn-link btn-warning edit a_edit' name=".$row['id']."><i class='fa fa-edit'></i></a>
                                                        <a href='#' class='btn btn-link btn-info copy' data-id=".$max_id." name=".$row['id']."><i class='fa fa-copy'></i></a>
                                                        <a href='#' class='btn btn-link btn-danger remove' data_name=".$row['id']."><i class='fa fa-times'></i></a>
                                                    </td>
                                                               </tr>";
                                                    }
                                                    }else{
   echo "<p class='text-cnter'>No Selected Collection Name </p>";
}
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
    <script src="../my_js/base_checklist.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
   
</body>
</html>