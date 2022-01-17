<?php
include "config/con1.php";
include "header.php";
if(isset($_GET['id'])){
    $realise_id = $_GET['id'];
    $sql = "SELECT * FROM `collections` WHERE id = '$realise_id'";
    $rezult = mysqli_query($con,$sql);
    $tox = mysqli_fetch_assoc($rezult);
}

?>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/base_checklist.css">
<!-- ---------------------------------- -->
<!--     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />-->
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />-->
<!--     CSS Files-->
<!--     <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" />-->
<!--     <link href="admin/assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />-->
<!--     CSS Just for demo purpose, don't include it in your project-->
<!-- <script src="admin/assets/js/core/bootstrap.min.js" type="text/javascript"></script>-->

<!--    <link href="admin/assets/css/demo.css" rel="stylesheet" />-->
<!--     <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>-->
 

<style>
    /*.table.table-hover.dataTable.no-footer.fixedHeader-locked{*/
        /*display: none;*/
    /*}*/
</style>
</head>
    <body class="page_fix">
        <?php include "cookie.php";?>
        <section>
            <div class="container">

                <div class="row rowheight">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 " align="center" >
                        <div class = "imgdiv">
                            <img src="images_realeses/<?php echo $tox['image']?>" class="personImg" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 " align="center" >
                        <div class="about">

                            <p><?php echo $tox['info']?></p>
                            <br>
                            <br>
                            <p>Why do we use it?ill uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        </div>
                    </div>
                </div>

            </div>

        </section>

            <!-- End Navbar -->
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 collectionNameDiv" align="center" >
                      <h2 class ="collectionName"><?php echo $tox['name_of_collection']?></h2>
                  </div>


                 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                        
                        <div class="col-md-12">

                            <div class="card bootstrap-table">
                                <form method="post" id="save-filds">
                                <div class="card-body table-full-width table-responsive filterable">
                                    <div class="bars pull-left mr-2">
                                        <?php
                                        if(isset($_SESSION['user'])){
                                            if(isset($_COOKIE['bbid'])){
                                                $sql1 = "SELECT MAX(id) as id FROM `custom_name_checklist`";
                                                $res1 = mysqli_query($con, $sql1);
                                                $tox1 = mysqli_fetch_assoc($res1);
                                                $mid = $tox1['id'];
                                                $sql = "SELECT * FROM `custom_name_checklist` WHERE id='$mid'";
                                                $res = mysqli_query($con, $sql);
                                                $tox = mysqli_fetch_assoc($res);
                                                $noc = $tox['name_of_checklist'];
                                                echo "<select class='form-control sel_checklis' name='cid'><option></option>";
                                                $uid = $_SESSION['user'];
                                                $sel = "SELECT * FROM `custom_name_checklist` WHERE user_id = '$uid'";
                                                $res = mysqli_query($con, $sel);
                                                while( $row=mysqli_fetch_assoc($res) ) {
                                                ?>
                                                <option value = "<?php echo $row['id'] ?>" 
                                                <?php 
                                                if(($tox['name_of_checklist'] == $row['name_of_checklist'])){
                                                echo 'selected = "selected"';
                                                } ?>><?php echo $row['name_of_checklist']; ?></option>
                                                <?php
                                                }
                                                echo "</select>";
                                            }else{
                                            echo "<select class='form-control sel_checklis' name='cid'><option></option>";
                                            $uid = $_SESSION['user'];
                                            $sel = "SELECT * FROM `custom_name_checklist` WHERE user_id = '$uid'";
                                            $res = mysqli_query($con, $sel);
                                            while( $row=mysqli_fetch_assoc($res) ) {
                                              echo " <option value = '".$row['id']."'>".$row['name_of_checklist']."</option>";
                                            }
                                            echo "</select>";
                                            }
                                        }
                                        ?>

                                        </select>
                                    </div>
                                    <table id="bootstrap-table-2" class="table">
                                        <thead>
                                        <!--<th data-field="state" data-checkbox="true"></th>-->
                                        <th data-field="id" class="text-center">ID</th>
                                        <th data-field="Card number">Card number</th>
                                        <th data-field="Card name">Card name</th>
                                        <th data-field="Team">Team</th>
                                        <th data-field="Parallel">Parallel</th>
                                        <th data-field="Print run">Print run</th>
                                        </thead>
                                        <tbody>
                                             <?php
                                                $sql="select*from base_checklist WHERE realese_id = '$realise_id' ";
                                                $query=mysqli_query($con,$sql);
                                                $count = 0;
                                                while($tox=mysqli_fetch_assoc($query)){
                                                    $count++;

//                                            echo "<pre>";
//                                            print_r($tox);die;
                                            echo"
                                                <tr>
                                                  <td>".$count."<input class='ml-1 mt-1 float-right checkmark' name='checkmark[]' type='checkbox' value='".$tox['id']."'></td>
                                                  <td>".$tox['card_number']."</td>
                                                  <td>".$tox['card_name']."</td>
                                                  <td>".$tox['team']."</td>
                                                  <td>".$tox['parallel']."</td>
                                                  <td>".$tox['print_run']."</td>
                                                </tr>";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <input type="submit" name="btn_custom" class="banner-button save mx-3" value="Save">
                                    <span class="text-success success">
                                        
                                    </span>
                                </div>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <?php
                include "footer.php";
            ?>

<!-- <script src="admin/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script> -->
<script src="admin/assets/js/core/popper.min.js" type="text/javascript"></script>
<!-- <script src="admin/assets/js/core/bootstrap.min.js" type="text/javascript"></script> -->

<script src="admin/assets/js/plugins/bootstrap-table.js"></script>
<!--  DataTable Plugin -->
<script src="admin/assets/js/plugins/jquery.dataTables.min.js"></script>
<!--  Full Calendar   -->
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the bootstrap-table pages etc -->
<!-- <script src="admin/assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script> -->
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="admin/assets/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        // demo.showNotification();

        // demo.initVectorMap();

    });
</script>
<script type="text/javascript">
    var $table = $('#bootstrap-table-2');


    $(document).ready(function() {

        $table.bootstrapTable({
            toolbar: ".toolbar",
            clickToSelect: true,

            search: true,
            showColumns: true,
            pagination: true,
            searchAlign: 'left',
            pageSize: 8,
            clickToSelect: false,
            pageList: [8, 10, 25, 50, 100],

            formatShowingRows: function(pageFrom, pageTo, totalRows) {
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + " rows visible";
            },
            icons: {
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });

        //activate the tooltips after the data table is initialized
        $('[rel="tooltip"]').tooltip();

        $(window).resize(function() {
            $table.bootstrapTable('resetView');
        });


    });
</script>
    <script>
        $(document).ready(function() {
            var t = $('.sel_checklis').val()
            if(t>0){
                $('.checkmark').css('display','block')
            }else{
                $('.checkmark').css('display','none')
            }
            $('#bootstrap-table-2 thead tr').clone(true).appendTo( '#bootstrap-table-2 thead' ).addClass('filters');
            $('#bootstrap-table-2 thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                if (i > 0){
                    $(this).html(`<div class="input-group">
                                   <input  class="form-control inpt2" type="text" placeholder="Search" aria-label="Search">
                                   <button class="btn btn-srch" style="border-radius:0;">
                                       <i class="fa fa-search btn" aria-hidden="true"></i>
                                   </button>
                               </div>`);
                }else {
                    $(this).html('')
                }

            } );

            $('.filterable .filters input').keyup(function(e){
                /* Ignore tab key */
                var code = e.keyCode || e.which;
                if (code == '9') return;
                /* Useful DOM data and selectors */
                var $input = $(this),
                    inputContent = $input.val().toLowerCase(),
                    $panel = $input.parents('.filterable'),
                    column = $panel.find('.filters th').index($input.parents('th')),
                    $table = $panel.find('.table'),
                    $rows = $table.find('tbody tr');
                /* Dirtiest filter function ever ;) */
                var $filteredRows = $rows.filter(function(){
                    var value = $(this).find('td').eq(column).text().toLowerCase();
                    return value.indexOf(inputContent) === -1;
                });
                /* Clean previous no-result if exist */
                $table.find('tbody .no-result').remove();
                /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
                $rows.show();
                $filteredRows.hide();
                /* Prepend no-result row if all rows are filtered */
                if ($filteredRows.length === $rows.length) {
                    $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
                }
            });

        } );
        $('.sel_checklis').change(function(){
            if($('.sel_checklis').val()<1){
                $('.checkmark').css('display','none')
            }else{
                $('.checkmark').css('display','block')
            }
        })
        $('#save-filds').on('submit', function(event){
            event.preventDefault();
            $.ajax({
              url:"custom_form.php",
              method:"POST",
              data:new FormData(this),
              contentType:false,
              cache:false,
              processData:false,
              success:function(data)
              {
                //location.href="custom_checklist.php";
                $('.success').html(data)
                $('.checkmark').prop('checked',false)
              }
            });
        })
    </script>
</body>
</html>