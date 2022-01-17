<?php
include "config/con1.php";
include "header.php";
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    
}else{
    header('location:index.php');
}
if(isset($_GET['id'])){
    $realise_id = mysqli_real_escape_string($con, $_GET['id']);
    $sql = "SELECT * FROM `custom_name_checklist` WHERE id = '$realise_id'";
    $rezult = mysqli_query($con, $sql);
    $tox = mysqli_fetch_assoc($rezult);
}
?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/base_checklist.css">
<!-------------------------------------->
<meta charset="utf-8">

<style type="text/css">
    td{
        text-align: center;
    }
    .th-inner {
        width: 200px;
    }
    thead .text-center > div{
        width: auto;
    }
    .fixed-table-body{
        overflow-x: auto;
    }
    /*.social-div>a {
    color: #133960;
    }*/
</style>
</head>
    <body class="page_fix">
        <?php include "cookie.php";?>
        <section>
            <div class="container">
                <button type="button" class="btn float-right" data-toggle="modal" data-target=".bd-example-modal-lg" id="<?php echo $tox['id']?>">
                    <img src='images/edit-icon.png' width="30">
                </button>

                <div class="row rowheight">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 " align="center" >
                        <div class = "imgdiv">
                            <img src="img/<?php echo $tox['image']; ?>" class="personImg" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 " align="center" >
                        <div class="about">
                            <p><?php echo $tox['description']?></p>
                        </div>
                    </div>
                </div>

            </div>

        </section>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 collectionNameDiv" align="center" >
                      <h2 class ="collectionName"><?php echo $tox['name_of_checklist']?></h2>
                  </div>


                <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card bootstrap-table">
                                <div class="card-body table-full-width table-responsive filterable">
                                    <table id="bootstrap-table-2" class="table">
                                        <thead>
                                        <!-- <th data-field="state" data-checkbox="true"></th> -->
                                        <th data-field="id" class="text-center">ID</th>
                                        <th data-field="base checklist name">Base checklist name</th>
                                        <th data-field="Sport type">Sport type</th>
                                        <th data-field="set_type">Set_type</th>
                                        <th data-field="Card number">Card number</th>
                                        <th data-field="Card name">Card name</th>
                                        <th data-field="Team">Team</th>
                                        <th data-field="Parallel">Parallel</th>
                                        <th data-field="Print run">Print run</th>
                                        <?php
                                            if( $tox['title1'] ){
                                                echo "<th data-field=".$tox['title1'].">".$tox['title1']."</th>";
                                            }else{
                                                echo "";
                                            }
                                            if( $tox['title2'] ){
                                                echo "<th data-field=".$tox['title2'].">".$tox['title2']."</th>";
                                            }else{
                                                echo "";
                                            }
                                            if( $tox['title3'] ){
                                                echo "<th data-field=".$tox['title3'].">".$tox['title3']."</th>";
                                            }else{
                                                echo "";
                                            }
                                        ?>
                                        <th data-field="Actions" class="disabled-sorting text-right">Actions</th>
                                        
                                        </thead>
                                        <tbody>
                                             <?php
                                                $cid = $tox['id'];
                                                $sql="SELECT * FROM `custom_checklist` WHERE cid = '$cid' ORDER BY id DESC";
                                                $query=mysqli_query($con,$sql);
                                                $count = 0;
                                                while($row=mysqli_fetch_assoc($query)){
                                                    $count++;
                                            ?>
                                                <tr>
                                                  <td><?php echo $count ?><input  type='hidden' value="<?php echo $row['id']; ?>"/></td>
                                                  <td class='base'><?php echo $row['base_checklist_name']?></td>
                                                  <td class='sport_type'><?php echo $row['sport_type']?></td>
                                                  <td class='set_type'><?php echo $row['set_type']?></td>
                                                  <td class='card_number'><?php echo $row['card_number']?></td>
                                                    
                                                  
                                                  <td class='card_name'><?php echo $row['card_name']?></td>
                                                  <td class='team'><?php echo $row['team']?></td>
                                                  <td class='parallel'><?php echo $row['parallel']?></td>
                                                  <td class='print_run'><?php echo $row['print_run']?><input class="tr" type='hidden' value="<?php echo $row['rid']; ?>" ></td>
                                                  <?php
                                                    if( $tox['title1'] ){
                                                        echo "<td class='d1 popox'>".$row['description1']."</td>";
                                                    }else{
                                                        echo "";
                                                    }
                                                    if( $tox['title2'] ){
                                                        echo "<td class='d2 popox'>".$row['description2']."</td>";
                                                    }else{
                                                        echo "";
                                                    }
                                                    if( $tox['title3'] ){
                                                        echo "<td class='d3 popox'>".$row['description3']."</td>";
                                                    }else{
                                                        echo "";
                                                    }
                                                ?>
                                                  <td class='text-right'>
                                                    <a class='btn edit_btn' >
                                                        <img src='images/edit-icon.png ' width="25" class="fa-edit fa-click" name="<?php echo $row['id'] ?>">
                                                    </a>
                                                    <a class='btn btn-info copy_btn' name="<?php echo $row['id'] ?>">
                                                        <i class='fa fa-copy'></i>
                                                    </a>
                                                    <a class='btn btn-danger remove' name="<?php echo $row['id'] ?>"  data-toggle="modal" data-target="#delete_td">
                                                        <i class='fa fa-times'></i>
                                                    </a>
                                                  </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="copy" class="copy" value="<?php echo $tox['id'] ?>">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Edite-->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <form action="custom_form.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                            <div class="col-md-12" >
                                    <label>Name of Checklist</label>
                                    <div class="input-group">
                                        <input type="text" name="name" value="<?php echo $tox['name_of_checklist'] ?>" class="form-control">
                                    </div>
                                    <br>
                                    <label>Description</label>
                                    <div class="input-group">
                                        <textarea name="desc" class="form-control"><?php echo $tox['description'] ?></textarea>
                                    </div>
                                    <br>
                                    <label>Image</label>
                                    <div class="input-group">
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                    <br>
                                    <label>Title-1</label>
                                    <div class="input-group">
                                        <input type="text" name="t1" value="<?php echo $tox['title1'] ?>" class="form-control">
                                    </div>
                                    <br>
                                    <label>Title-2</label>
                                    <div class="input-group">
                                        <input type="text" name="t2" value="<?php echo $tox['title2'] ?>" class="form-control">
                                    </div>
                                    <label>Title-3</label>
                                    <div class="input-group">
                                        <input type="text" name="t3" value="<?php echo $tox['title3'] ?>" class="form-control">
                                    </div>
                                    <input type="hidden" name='id' value="<?php echo $tox['id']; ?>">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btn_save_chenge">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Modal delete td -->
            <div class="modal fade" id="delete_td" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content del_modal" style="border: 0">
                  
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
<script src="js/jquery.tabledit.js"></script>

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
            $('.keep-open .dropdown-toggle').before('<a class="banner-button mr-3 py-2 px-3 edt-btn" href="custom_edit.php?id=<?php echo $realise_id; ?>">Edit</a>')
            $('.search').after('<br><br>')
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

        

            $('table').on('click', '.fa-click', function(){
                if( $(this).hasClass('fa-edit') ){
                    $(this).toggleClass('fa-edit').toggleClass('fa-save')
                    $(this).attr('src','images/save-icon.png')
                    $('.copy_btn').addClass('disabled')
                    $('.edit_btn').addClass('disabled')
                    $(this).parents('.edit_btn').removeClass('disabled')

                    var id = $(this).attr('name')
                    
                    var rid=$(this).parents('tr').find('.tr').val()
                    $(this).attr('name',id)
                    var base = $(this).parents('tr').find('.base')
                    var sport_type = $(this).parents('tr').find('.sport_type')
                    var set_type = $(this).parents('tr').find('.set_type')
                    var card_number = $(this).parents('tr').find('.card_number')
                    var card_name = $(this).parents('tr').find('.card_name')
                    var team = $(this).parents('tr').find('.team')
                    var parallel = $(this).parents('tr').find('.parallel')
                    var print_run = $(this).parents('tr').find('.print_run')

                    $.post(
                        'custom3.php',
                        {rid:rid,id:id},
                        function(ard){
                            base.html(ard)
                        }
                    )
                    $.post(
                        'custom3.php',
                        {sport_type:id},
                        function(ard){
                            sport_type.html(ard)
                        }
                    )
                    $.post(
                        'custom3.php',
                        {set_type:id,rid_set:rid},
                        function(ard){
                            set_type.html(ard)
                        }
                    )
                    $.post(
                        'custom3.php',
                        {card_number:id,rid_number:rid},
                        function(ard){
                            card_number.html(ard)
                        }
                    )
                    $.post(
                        'custom3.php',
                        {card_name:id,rid_name:rid},
                        function(ard){
                            card_name.html(ard)
                        }
                    )
                    $.post(
                        'custom3.php',
                        {card_name:id,rid_name:rid},
                        function(ard){
                            card_name.html(ard)
                        }
                    )
                    $.post(
                        'custom3.php',
                        {team:id,rid_team:rid},
                        function(ard){
                            team.html(ard)
                        }
                    )
                    $.post(
                        'custom3.php',
                        {parallel:id,rid_parallel:rid},
                        function(ard){
                            parallel.html(ard)
                        }
                    )
                    $.post(
                        'custom3.php',
                        {print_run:id,rid_print:rid},
                        function(ard){
                            print_run.html(ard)
                        }
                    )


                    

                }else if( $(this).hasClass('fa-save') ){
                    $(this).toggleClass('fa-save').toggleClass('fa-edit')
                    $(this).attr('src','images/edit-icon.png')
                    var upd_id =      $(this).attr('name')
                    var base =        $(this).parents('tr').find('.bname1').val()
                    var set_type =    $(this).parents('tr').find('.set_type1').val()
                    var sport_type =  $(this).parents('tr').find('.sport_type1').val()
                    var card_number = $(this).parents('tr').find('.card_number1').val()
                    var card_name =   $(this).parents('tr').find('.card_name1').val()
                    var team =        $(this).parents('tr').find('.team1').val()
                    var parallel =    $(this).parents('tr').find('.parallel1').val()
                    var print_run =   $(this).parents('tr').find('.print_run1').val()

                    var d1          = $(this).parents('tr').find('.d1').text()
                    var d2          = $(this).parents('tr').find('.d2').text()
                    var d3          = $(this).parents('tr').find('.d3').text()
                    $.post(
                        "custom_form.php",
                        {upd_id:upd_id,base:base,set_type:set_type,sport_type:sport_type,card_number:card_number,card_name:card_name,team:team,parallel:parallel,print_run:print_run,d1:d1,d2:d2,d3:d3},
                        function(){
                            location.reload()
                        }

                    )
                }else{}
                    
            })


            $('.copy_btn').click(function(){
                
                var k = $(this).parents('tr').html();
                var e = "<tr data-index='0'>"+k+"</tr>";
                var t = $(this).parents('tr');
                $(t).before(e)
                $('tbody').find('td')
                var copy        = $('.copy').val();
                var rid         = $(this).parents('tr').find('.tr').val()
                var base        = $(this).parents('tr').find('.base').text()
                var sport_type  = $(this).parents('tr').find('.sport_type').text()
                var card_number = $(this).parents('tr').find('.card_number').text()
                var card_name   = $(this).parents('tr').find('.card_name').text()
                var team        = $(this).parents('tr').find('.team').text()
                var set_type    = $(this).parents('tr').find('.set_type').text()
                var parallel    = $(this).parents('tr').find('.parallel').text()
                var print_run   = $(this).parents('tr').find('.print_run').text()
                var d1          = $(this).parents('tr').find('.d1').text()
                var d2          = $(this).parents('tr').find('.d2').text()
                var d3          = $(this).parents('tr').find('.d3').text()
                $.post(
                    'custom_form.php',
                    {basename:base,rrid:rid,sport_type:sport_type,card_number:card_number,card_name:card_name,parallel:parallel,print_run:print_run,team:team,set_type:set_type,d1:d1,d2:d2,d3:d3,copy:copy},
                    function(ard){
                       // location.reload()
                    }
                )
            })
            $('.remove').click(function(){
                var del_id = $(this).attr('name');
                var form = '<form action="custom_form.php" method="post"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><input type="hidden" value="<?php echo $tox['id'] ?>" name="id"></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button type="submit" class="btn btn-danger" name="del_td" value='+del_id+'>Delete</button></div></form>';
                $('.del_modal').html(form)
            })
        });
    
    </script>
    
</body>
</html>