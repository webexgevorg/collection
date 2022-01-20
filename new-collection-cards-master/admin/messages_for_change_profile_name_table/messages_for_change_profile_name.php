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
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                     <th>#</th>
                                                     <th >User ID</th>
                                                     <th >Old Name/Nikname</th>
                                                     <th >New Name/Nikname</th>
                                                     <th >Message</th>
                                                     <th >Date</th>
                                                     <th >Status</th>
                                                     <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                <th>#</th>
                                                     <th >User ID</th>
                                                     <th >Old Name/Nikname</th>
                                                     <th >New Name/Nikname</th>
                                                     <th >Message</th>
                                                     <th >Date</th>
                                                     <th >Status</th>
                                                     <th>Action</th>
                                                </tr>
                                                </tr>
                                            </tfoot>
                                            <!--  -->
                                            <tbody>
                                            <?php
                                            
                                            $sql="SELECT * FROM messages_for_change_profile_name";
                                                    $result=mysqli_query($con, $sql);
                                                    $count=0;
                                                    while($row=mysqli_fetch_assoc($result)){
                                                        $count++;
                                                        $sql_user="SELECT name FROM users WHERE id=$row[user_id]";
                                                        $query_user=mysqli_query($con, $sql_user);
                                                        $row_user=mysqli_fetch_assoc($query_user);
                                                        echo "<tr name='' data-id='".$row['id']."'>
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