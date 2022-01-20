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
                                                     <th >Subnews name</th>
                                                     
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                     <th>#</th>
                                                     <th >Subnews name</th>
                                                    
                                                </tr>
                                            </tfoot>
                                            <!--  -->
                                            <tbody>
                                            <?php
                                            
                                            $sql="SELECT * FROM subnews";
                                                    $result=mysqli_query($con, $sql);
                                                    $count=0;
                                                    while($row=mysqli_fetch_assoc($result)){
                                                        $count++;
                                                        echo "<tr name=''>
                                                                <td class=''>".$count."</td>
                                                                <td class=''>".$row['subnews_name']."</td>
                                                                
                                                                <td class='text-right d-flex flex-column' data-id='".$row['id']."'>
                                                                   <a href='../subnews/add_subnews.php?id=".$row['id']."' class='btn btn-link btn-warning edit' name=''><i class='fa fa-edit'></i></a>
                                                                   <a href='#'  id=".$row['id']." class='btn btn-link btn-danger remove' data_name=''><i class='fa fa-times'></i></a>
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
    <!-- <script src="../my_js/subnews_action.js"></script> -->
   <script>
       $('.remove').on('click',function(){
            $tr=$(this).parent().parent()
            let row_id = $(this).parent().attr('data-id');
            $.ajax({
            type: "post",
            url: "delete_subnews.php",
            data: {row_id },
            success: function(res){
                $tr.remove()
                // location.reload()
            }
        })

       })

   </script>
</body>
</html>