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
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
</head>
    <body class="page_fix">
        <?php include "cookie.php";?>
        <section class="section1">
            <div class="container">

                <div class="row ">
                	<?php
                	if(isset($_POST['sel'])){
                		$sel=$_POST['sel'];
                        $sql="SELECT * FROM collections WHERE id='$sel'";
                        $query=mysqli_query($con,$sql);
                                                
                        $tox=mysqli_fetch_assoc($query);
                		echo ' <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 " align="center" >
                        <div class = "imgdiv">
                            <img src="images_realeses/'. $tox['image'].'" class="personImg" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 " align="center" >
                        <div class="about">

                            <p>'. $tox['info'].'</p>
                            <br>
                            <br>
                        </div>
                    </div>';
                	}

                ?>
                	<div class="col-md-12">
                <h2 class = "releases" align="center">CHECKLIST</h2>
            </div>
                     <?php
if(isset($_SESSION['product'])){
  $product=$_SESSION['product'];
  $sport_type=$_SESSION['sport_type'];
  $year_prod=$_SESSION['year_prod'];
  $year=explode('-', $year_prod);
            $a=$year[0];
            $b=$year[1];

$sql_sel="SELECT * FROM collections WHERE sport_type='$sport_type' AND SUBSTRING(year_of_releases, 1, 4) BETWEEN $a AND $b";
     $res_sel=mysqli_query($con, $sql_sel);

  echo '<div class="col-md-12 text-center">
  <div class="col-md-5 mx-auto">
                <label>Select year of sets</label>
               <form action="" method="post" >
               <select onchange="this.form.submit()" class="form-control select" id="select_name_collection" name="sel">';
               while($row=mysqli_fetch_assoc($res_sel)){
            
if(isset($_POST['sel']) && $_POST['sel']==$row['id']){
              echo '<option value='.$row['id'].' selected>'.$row['name_of_collection'].'</option>';
  
}
else{
  echo '<option value='.$row['id'].'>'.$row['name_of_collection'].'</option>';
}
}
                                                    
echo '</select></form> 
       </div></div> </div>
    </div>
</section>';
    if(isset($_POST['sel'])){
              
              $sel=$_POST['sel'];
             $sql="SELECT * FROM base_checklist WHERE realese_id='$sel'";
            }

            else{
            $sql="SELECT bs.*, rl.id FROM base_checklist bs, collections rl WHERE rl.sport_type='$sport_type' AND SUBSTRING(rl.year_of_releases, 1, 4) BETWEEN $a AND $b AND bs.realese_id=rl.id";
          }
          ?>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 collectionNameDiv" align="center" >
                      <h2 class ="collectionName">CHECKLIST <?php echo $sport_type ." ".$year_prod; ?></h2>
                  </div>

                 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card bootstrap-table">

                                <div class="card-body table-full-width table-responsive filterable">

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
                                                $query=mysqli_query($con,$sql);
                                                $count = 0;
                                                while($tox=mysqli_fetch_assoc($query)){
                                                    $count++;

                                            echo"
                                                <tr>
                                                  <td>".$count."<input  type='hidden' value='".$tox['id']."'/></td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
                include "footer.php";
            ?>

<script src="admin/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="admin/assets/js/plugins/bootstrap-table.js"></script>
<!--<script src="admin/assets/js/plugins/jquery.dataTables.min.js"></script>-->
<script src="admin/assets/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        demo.initDashboardPageCharts();
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
            // pagination: true,
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

        $('[rel="tooltip"]').tooltip();

        $(window).resize(function() {
            $table.bootstrapTable('resetView');
        });


    });
</script>
    <script>
     $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#bootstrap-table-2 thead tr').clone(true).appendTo( '#bootstrap-table-2 thead' );
    $('#bootstrap-table-2 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        if (i > 0){
                    $(this).html(`<div class="input-group">
                                  <input  class="form-control inpt2" type="text" placeholder="Search" aria-label="Search">
                                  <button class="btn" style="border-radius:0;">
                                      <i class="fa fa-search btn" aria-hidden="true"></i>
                                  </button>
                              </div>`);
                }else {
                    $(this).html('')
                }
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#bootstrap-table-2').DataTable( {
        orderCellsTop: true,
        // fixedHeader: true
    } );
} );
        // $(document).ready(function() {

            // $('#bootstrap-table-2 thead tr').clone(true).appendTo( '#bootstrap-table-2 thead' ).addClass('filters');
            // $('#bootstrap-table-2 thead tr:eq(1) th').each( function (i) {
            //     var title = $(this).text();
            //     if (i > 0){
            //         $(this).html(`<div class="input-group">
            //                       <input  class="form-control inpt2" type="text" placeholder="Search" aria-label="Search">
            //                       <button class="btn" style="border-radius:0;">
            //                           <i class="fa fa-search btn" aria-hidden="true"></i>
            //                       </button>
            //                   </div>`);
            //     }else {
            //         $(this).html('')
            //     }

            // } );

        //     $('.filterable .filters input').keyup(function(e){
        //         /* Ignore tab key */
        //         var code = e.keyCode || e.which;
        //         if (code == '9') return;
        //         /* Useful DOM data and selectors */
        //         var $input = $(this),
        //             inputContent = $input.val().toLowerCase(),
        //             $panel = $input.parents('.filterable'),
        //             column = $panel.find('.filters th').index($input.parents('th')),
        //             $table = $panel.find('.table'),
        //             $rows = $table.find('tbody tr');
        //         /* Dirtiest filter function ever ;) */
        //         var $filteredRows = $rows.filter(function(){
        //             var value = $(this).find('td').eq(column).text().toLowerCase();
        //             return value.indexOf(inputContent) === -1;
        //         });
        //         /* Clean previous no-result if exist */
        //         $table.find('tbody .no-result').remove();
        //         /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        //         $rows.show();
        //         $filteredRows.hide();
        //         /* Prepend no-result row if all rows are filtered */
        //         if ($filteredRows.length === $rows.length) {
        //             $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        //         }
        //     });

        // } );

    </script>
</body>
</html>