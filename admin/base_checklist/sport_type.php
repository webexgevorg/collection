<?php
           include "../heder.php";

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
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                     <th>#</th>
                                                    <th>SPORT TYPE</th>
                                                    <th>SPORT LOGO</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                     <th>#</th>
                                                     <th>SPORT TYPE</th>
                                                    <th>SPORT LOGO</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="sortable">
                                               
                                                    <?php 
                                                    $count=0;
                                                    $sql="SELECT * FROM sports_type ";
                                                    $result=mysqli_query($con, $sql);
                                                    while($row=mysqli_fetch_assoc($result)){
                                                        $count++;
                                                        echo "  <tr>
                                                               <td class=''>".$count."</td>
                                                               <td class='sport_type'>".$row['sport_type']."</td>
                                                               <td class='name_collection'></td>
                                                               
                                                                <td class='text-right'>
                                                        <a href='#' class='btn btn-link btn-warning edit a_edit' name=".$row['id']."><i class='fa fa-edit'></i></a>
                                                        <a href='#' class='btn btn-link btn-danger remove' data_name=".$row['id']."><i class='fa fa-times'></i></a>
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
    <script src="../my_js/sport_type.js"></script>
    <script>
        $(function(){
            $('#datatables_info').parent().remove()
            $('#datatables_length').remove()
            $('.pagination').remove()
            $('#datatables_filter').remove()
        })
    </script>
    
</body>
</html>