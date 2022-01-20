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
                                                    <label>contact message</label>
                                                    <select onchange="this.form.submit()" class="form-control select" id="sel-publications-status" name='sel-publications-status' >
                                                        <?php include "select_publications_status.php"; ?>
                                                    </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%" data-tblname='contact_message'>
                                            <thead>
                                                <tr>
                                                     <th >#</th>
                                                     <th class='th' data-name='name'>Name</th>
                                                     <th class='th' data-name='email'>Email</th>
                                                     <th class='th' data-name='message'>Message</th>
                                                     <th class='th' data-name='status'>Status</th>
                                                     <th class='th' data-name='date'>Date</th>
                                                     <th >Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                     <th>#</th>
                                                     <th >Name</th>
                                                     <th >Email</th>
                                                     <th >Message</th>
                                                     <th >Status</th>
                                                     <th >Date</th>
                                                     <th >Action</th>
                                                </tr>
                                            </tfoot>
                                            <!--  -->
                                            <tbody id="tbody">
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <?php include "../footer.php";?>
    <script src="../my_js/post_data_table.js"></script>
    <script>
        $(function(){
            $('#datatables_info').parent().remove()
            $('#datatables_length').remove()
        })
    </script>
    <script>
        var table = $('#datatables').DataTable();
        table.on('click', '.change-status', function() {
            let change_contact_status=$(this).attr('id')
            let row_id = $(this).parent().attr('data-id');
            $.ajax({
                    type: "post",
                    url: "change_contact_message_status.php",
                    data: {row_id},

                     success: function(res){
                        console.log(res);
                    }
                    
                })
        });
            table.on('click', '.remove', function() {
                $tr=$(this).parent().parent()
                let row_id = $(this).parent().attr('data-id');
                $.ajax({
                    type: "post",
                    url: "delete_contact_message.php",
                    data: {row_id },
                    success: function(res){
                        $tr.remove()
                    }
        })
           

    
});
    </script>
   
   
</body>
</html>