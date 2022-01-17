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
                                                    <!-- <th>CARD NAME</th> -->
                                                    <th>SET TYPE</th>
                                                    <th>PARALLEL</th>
                                                    <th>COLOR</th>
                                                    <th>PRINT RUN</th>
                                                    <th>COUNT</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                     <th>#</th>
                                                    <!-- <th>CARD NAME</th> -->
                                                    <th>SET TYPE</th>
                                                    <th>PARALLEL</th>
                                                    <th>COLOR</th>
                                                    <th>PRINT RUN</th>
                                                    <th>COUNT</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="sortable">
                                               
                                                    <?php 
                                                    if(isset($_SESSION['realese_id'])){
                                                        
                                                      $collection_id=$_SESSION['realese_id'];

                                                    $count=0;
                                                    $sql="SELECT *, count(*) AS 'count'
                                                          FROM `base_checklist` WHERE realese_id='$collection_id'
                                                          GROUP BY set_type, parallel, print_run
                                                          HAVING count(*) > 1 ORDER BY id ASC";
                                                    $result=mysqli_query($con, $sql);
                                                    while($row=mysqli_fetch_assoc($result)){
                                                        $count++;
                                                        if($row['parallel']=='Base'){
                                                            echo "  <tr><td class='first_td'>".$count."<input  type='hidden' value='".$row['id']."' /></td>
                                                               
                                                               <td class='c_set_type'>".$row['set_type']."</td>
                                                               <td class='c_parallel'>".$row['parallel']."</td>
                                                               <td class='c_color'></td>

                                                               <td class='c_print_run'>".$row['print_run']."</td>
                                                               <td class='c_print_run'>".$row['count']."</td>
                                                                <td class='text-right'>
                                                        <a href='#' class='btn btn-link btn-warning edit a_edit' name=".$row['id']."><i class='fa fa-edit'></i></a>
                                                        <a href='#' class='btn btn-link btn-danger remove' data_name=".$row['id']."><i class='fa fa-times'></i></a>
                                                    </td>
                                                               </tr>";
                                                        }
                                                        else{
                                                        if($row['color']!=''){
                                                            $first_char=$row['color'][0];
                                                            if($first_char=='#'){
                                                                echo "  <tr><td class='first_td'>".$count."<input  type='hidden' value='".$row['id']."' /></td>
                                                               
                                                               <td class='c_set_type'>".$row['set_type']."</td>
                                                               <td class='c_parallel'>".$row['parallel']."</td>
                                                               <td class='c_color'><div style='border-radius: 50%;width: 30px; height: 30px; background: ".$row['color']."'></div></td>

                                                               <td class='c_print_run'>".$row['print_run']."</td>
                                                               <td class='c_print_run'>".$row['count']."</td>
                                                                <td class='text-right'>
                                                        <a href='#' class='btn btn-link btn-warning edit a_edit' name=".$row['id']."><i class='fa fa-edit'></i></a>
                                                        <a href='#' class='btn btn-link btn-danger remove' data_name=".$row['id']."><i class='fa fa-times'></i></a>
                                                    </td>
                                                               </tr>";
                                                            }
                                                            else{
                                                                echo "  <tr><td class='first_td'>".$count."<input  type='hidden' value='".$row['id']."' /></td>
                                                               
                                                               <td class='c_set_type'>".$row['set_type']."</td>
                                                               <td class='c_parallel'>".$row['parallel']."</td>
                                                               <td class='c_color'><img src='../textures/".$row['color']."' style='width: 30px; height: 30px'></td>

                                                               <td class='c_print_run'>".$row['print_run']."</td>
                                                               <td class='c_print_run'>".$row['count']."</td>
                                                                <td class='text-right'>
                                                        <a href='#' class='btn btn-link btn-warning edit a_edit' name=".$row['id']."><i class='fa fa-edit'></i></a>
                                                        <a href='#' class='btn btn-link btn-danger remove' data_name=".$row['id']."><i class='fa fa-times'></i></a>
                                                    </td>
                                                               </tr>";
                                                            }
                                                           
                                                        }
                                                        else{
                                                        echo "  <tr><td class='first_td'>".$count."<input     type='hidden' value='".$row['id']."' /></td>
                                                               
                                                               <td class='c_set_type'>".$row['set_type']."</td>
                                                               <td class='c_parallel'>".$row['parallel']."</td>
                                                               <td class='c_color d-flex'><input type='color' class='co_lor' style='border-radius: 50%;width: 20px !important;
                                                                       height: 20px !important;'>
                                                                    
                                                                      <button id='' class='btn btn-link btn-warning show' data-toggle='modal' data-target='#exampleModalCenter'> <i class='fa fa-upload'></i></button>
                                                                      </td>

                                                               <td class='c_print_run'>".$row['print_run']."</td>
                                                               <td class='c_print_run'>".$row['count']."</td>
                                                                <td class='text-right'>
                                                        <a href='#' class='btn btn-link btn-warning edit a_edit' name=".$row['id']."><i class='fa fa-edit'></i></a>
                                                        <a href='#' class='btn btn-link btn-danger remove' data_name=".$row['id']."><i class='fa fa-times'></i></a>
                                                    </td>
                                                               </tr>";
                                                           }
                                                    }
                                                  }
                                                    }
                                                    else{
    echo "<p class='text-cnter'>No Selected Collection Name </p>";
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
            <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Chose texture</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
        <form class='form' method="post" id="texture_upload_form" enctype="multipart/form-data">

      <div class="modal-body">
        <div><p class="message_texture"></p></div>

        <div class="textures" >
             <?php include "show_textures.php"; ?>
        </div>
        <div style="margin-top: 10px">
        <input type="file" name="texture_name">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary save btn-add">Save changes</button> -->
        <input type="hidden" name="texture_hidd_val" >
        <input type="submit" name="import" class="btn btn-primary save btn-add" value="Save changes">
      </div>
  </form>

    </div>
  </div>
</div>
             <?php 
                                    include "../footer.php";
                                    ?>
        <script src="../my_js/infographic.js"></script>

</body>
</html>