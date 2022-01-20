<?php
include "config/con1.php";
include "header.php";
include "classes/pagination.php";

?>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/base_checklist.css">
<link rel="stylesheet" href="css/pagination.css">

</head>
    <body class="page_fix">
        <?php include "cookie.php";?>
        <?php
        if(isset($_SESSION['product'])){
            $coll_id=$_SESSION['coll_id'];
            $product=$_SESSION['product'];
            $sport_type=$_SESSION['sport_type'];
            $year_prod=$_SESSION['year_prod'];
            $year=explode('-', $year_prod);
                      $a=$year[0];
                      $b=$year[1];
            if(isset($_POST['sel'])){
                $coll_id=$_POST['sel'];
            }
            $sql_ckecklist="SELECT * FROM collections WHERE id=$coll_id";
            $res_ckecklist=mysqli_query($con, $sql_ckecklist);
            $row=mysqli_fetch_assoc($res_ckecklist);
        //    ------for select ---------------------
            $sql_sel="SELECT * FROM collections WHERE sport_type='$sport_type' ";
            $res_sel=mysqli_query($con, $sql_sel);
            // -------------- for checklist -----------
            $num_sql="SELECT * FROM base_checklist WHERE realese_id='$coll_id'";
            $sql="SELECT * FROM base_checklist WHERE realese_id='$coll_id' LIMIT 0 , 10";
           if(isset($user_id)){
                $sql_personal_checklist="SELECT * FROM personal_name_checklist WHERE user_id=$user_id";
                $res_personal_checklist=mysqli_query($con, $sql_personal_checklist);
           }
           
        } 
        ?>
        <section class="section1">
            <div class="container">
                <div class="row ">
                	<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 " >
                        <div class = "imgdiv">
                            <img src="images_realeses/<?=$row['image'];?>" class="personImg" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="about">
                            <p><?= $row['info']?></p>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <h2 class = "releases text-center" >CHECKLIST</h2>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="col-md-5 mx-auto">
                            <label>Select year of sets</label>
                            <form action="" method="post" >
                                <select onchange="this.form.submit()" class="form-control select" id="select_name_collection" name="sel">
                                    <?php while($row_sel=mysqli_fetch_assoc($res_sel)){
                                            if(isset($_POST['sel']) && $_POST['sel']==$row_sel['id']){
                                                        echo '<option value='.$row_sel['id'].' selected>'.$row_sel['name_of_collection'].'</option>';
                                            }
                                            else{
                                                echo '<option value='.$row_sel['id'].'>'.$row_sel['name_of_collection'].'</option>';
                                            }
                                    } ?>
                                </select>
                            </form> 
                        </div>
                    </div> 
                </div>
            </div>
        </section>
        <section>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 collectionNameDiv text-center"  >
                <div class="d-flex text-right justify-content-center">
                    <div class="w-50">
                        <h2 class ="collectionName">CHECKLIST <?php echo $sport_type ." ".$year_prod; ?></h2>
                    </div>
                    <div class="w-25 favorite " id="favorite" data-collId='<?=$coll_id?>' data-checklistType='base_checklist'>
                        <i class="star mt-2 fa " style="font-size:36px; color:#fad565;"></i>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bootstrap-table">
                                <div class="card-body table-full-width table-responsive filterable">

                                    <table id="bootstrap-table-2" class="table" >
                                    <div class="fixed-table-toolbar">
                                        <div class="columns columns-right pull-right">
                                            <div class="keep-open btn-group" title="Columns">
                                                <button type="button" class="btn btn-outline dropdown-toggle" data-toggle="dropdown">
                                                    <i class="glyphicon fa fa-columns" aria-hidden="true"></i>
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><label>
                                                        <input type="checkbox" data-field="Card number" value="1" class="select_column_name" data-name="card_number"> Card number
                                                        </label>
                                                    </li>
                                                    <li><label>
                                                        <input type="checkbox" data-field="Card name" value="2" class="select_column_name" data-name="card_name"> Card name
                                                        </label>
                                                    </li>
                                                    <li><label>
                                                        <input type="checkbox" data-field="Team" value="3" class="select_column_name" data-name="team"> Team
                                                        </label>
                                                    </li>
                                                    <li><label>
                                                        <input type="checkbox" data-field="Parallel" value="4" class="select_column_name" data-name="parallel"> Parallel
                                                        </label>
                                                    </li>
                                                    <li><label>
                                                        <input type="checkbox" data-field="Print run" value="5" class="select_column_name" data-name="print_run"> Print run
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="pull-left search">
                                            <input class="form-control all-search" type="text" placeholder="Search">
                                        </div>
                                        <div class="bars pull-left "></div><div class=' pull-right'>
                                            <button class="px-4 py-2 select-personal-checklist mr-2" data-toggle="modal" data-target="#selectPersonalChecklist">Add cards in personal checklist</button>
                                        </div>
                                    </div>
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center sorting_asc" style="width: 35px;" data-field="id" rowspan="1" colspan="1" aria-label="ID">#</th>
                                            <th class="text-center sorting_asc" style="width: 35px;" data-field="selsect" rowspan="1" colspan="1" aria-label="select">Select</th>
                                            <th style="width: 214px;" data-field="Card number" class="sorting_disabled card_number" rowspan="1" colspan="1" aria-label="Card number">Card number</th>
                                            <th style="width: 223px;" data-field="Card name" class="sorting_disabled card_name" rowspan="1" colspan="1" aria-label="Card name">Card name</th>
                                            <th style="width: 241px;" data-field="Team" class="sorting_disabled team" rowspan="1" colspan="1" aria-label="Team">Team</th>
                                            <th style="width: 214px;" data-field="Parallel" class="sorting_disabled parallel" rowspan="1" colspan="1" aria-label="Parallel">Parallel</th>
                                            <th style="width: 210px;" data-field="Print run" class="sorting_disabled print_run" rowspan="1" colspan="1" aria-label="Print run">Print run</th>
                                        </tr>
                                        <tr role="row">
                                            <th class="text-center" data-field="id" rowspan="1" colspan="1"></th>
                                            <th class="text-center" data-field="select" rowspan="1" colspan="1"></th>
                                            <th  data-field="Card number" rowspan="1" colspan="1" class="card_number">
                                                <div class="input-group">
                                                    <input class="form-control inpt2" type="text" placeholder="Search" aria-label="Search" name="card_number">
                                                    <button class="btn" style="border-radius:0;">
                                                        <i class="fa fa-search btn" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </th>
                                            <th data-field="Card name" rowspan="1" colspan="1" class="card_name">
                                                <div class="input-group">
                                                    <input class="form-control inpt2" type="text" placeholder="Search" aria-label="Search" name='card_name'>
                                                    <button class="btn" style="border-radius:0;">
                                                        <i class="fa fa-search btn" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </th>
                                            <th data-field="Team" rowspan="1" colspan="1" class="team">
                                                <div class="input-group" >
                                                    <input class="form-control inpt2" type="text" placeholder="Search" aria-label="Search" name='team'>
                                                    <button class="btn" style="border-radius:0;">
                                                        <i class="fa fa-search btn" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </th>
                                            <th data-field="Parallel" rowspan="1" colspan="1" class="parallel">
                                                <div class="input-group" >
                                                    <input class="form-control inpt2" type="text" placeholder="Search" aria-label="Search" name='parallel'>
                                                    <button class="btn" style="border-radius:0;">
                                                        <i class="fa fa-search btn" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </th>
                                            <th data-field="Print run" rowspan="1" colspan="1" class="print_run">
                                                <div class="input-group">
                                                    <input class="form-control inpt2" type="text" placeholder="Search" aria-label="Search" name="print_run">
                                                    <button class="btn" style="border-radius:0;">
                                                        <i class="fa fa-search btn" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <?php
                                                $total_rows_query=mysqli_query($con, $num_sql);
                                                $query=mysqli_query($con, $sql);
                                                $pagination= new Pagination();
                                                $pagination->limit=10;
                                                $pagination->count_rows=mysqli_num_rows($total_rows_query);
                                                ?>
                                        <tbody id="tbody">
                                        <tr id="num-rows" class="d-none" data-rows="<?=mysqli_num_rows($total_rows_query)?>" ></tr> 
                                             <?php
                                                $count = 0;
                                                while($tox=mysqli_fetch_assoc($query)){
                                                    $count++;
                                                    echo"
                                                        <tr>
                                                            <td>".$count."<input class='row-id' type='hidden' value='".$tox['id']."'/></td>
                                                            <td><input type='checkbox' class='check-card'></td>
                                                            <td class='card_number'>".$tox['card_number']."</td>
                                                            <td class='card_name'>".$tox['card_name']."</td>
                                                            <td class='team'>".$tox['team']."</td>
                                                            <td class='parallel'>".$tox['parallel']."</td>
                                                            <td class='print_run'>".$tox['print_run']."</td>
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
            <div>
                    <nav aria-label="Page navigation ">
                        <ul class="pagination justify-content-center r" >
                       <?php echo $pp= $pagination->pages(); ?>
                        </ul>
                    </nav>
            </div>
        </section>
            <?php include "footer.php"; ?>
<!-- ------------modl-------------- -->
<div class="modal fade" id="selectPersonalChecklist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add cards in personal checklist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type='hidden' id='sport-type' value='<?=$sport_type?>' >
            <div class="form-group">
                <label>Select checklist</label>
                <input type="hidden" value="128" name="user_id">
                <select type="text" class="form-control namecoll" id="select_name_checklist">
                    <?php 
                        while($row_pers_checklist=mysqli_fetch_assoc($res_personal_checklist)){
                            echo "<option value=$row_pers_checklist[id]>$row_pers_checklist[name_of_checklist]</option>";
                        } 
                    ?>
                </select>
            </div>
      </div>
      <div class="modal-footer">
            <button type="" name="add_cards" class="banner-button float-right add-cards-personal-checklist">Add cards</button>
      </div>
      <div class="w-100 res-added-cards text-center my-2"></div>
    </div>
  </div>
</div>
<!-- -------------- modal for favorite result ----------------- -->
<!-- Button trigger modal -->
<button type="button" class="d-none open-modal-favorite-result" data-toggle="modal" data-target="#modalFavorite">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modalFavorite" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Label"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="result-favorite my-4">    </div>
    </div>
  </div>
</div>

<script src="admin/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="js/check_list.js"></script>
<script src="js/favorite.js"></script>

</body>
</html>