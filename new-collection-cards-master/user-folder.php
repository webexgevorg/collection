<?php
$refresh_count=0;
if (isset($_SERVER["HTTP_REFERER"])) {
    $refresh_count++;
    if($refresh_count==1){
    ?>
        <script> location.reload(); break</script> 
    <?php
    }
}
include "header.php";
include "config/con1.php";
require_once "user-logedin.php";
?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/user_collections.css">
<link rel="stylesheet" type="text/css" href="css/user_collection.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<?php include "cookie.php"; ?>
<?php
$user_id = $_SESSION['user'];
if(!empty($_SESSION['coll-id']) && !empty($_SESSION['first_folder_id'])){
    $coll_id=$_SESSION['coll-id'];
    $first_folder_id=$_SESSION['first_folder_id'];
    $sql_folder_name = "SELECT name_of_folder FROM collection_first_folder WHERE id=$first_folder_id";
    $res_folder_name = mysqli_query($con, $sql_folder_name);
    if(mysqli_num_rows($res_folder_name)==1){
      $folder_name= mysqli_fetch_assoc($res_folder_name);
    }
}
else{
    header("loction: user-collections.php ");
    exit();
}
if(!empty($_SESSION['second_folder_id'])){
    $_SESSION['second_folder_id']='';
}
if(isset($_SESSION['bind_coll_id']) && !empty($_SESSION['bind_card_id'])){
    $bind_card_id=$_SESSION['bind_card_id'];
    $bind_coll_id=$_SESSION['bind_coll_id'];
    $sel_bind_coll="SELECT 'description' FROM collections WHERE id=$bind_coll_id";
    $res_bind_coll=mysqli_query($con, $sel_bind_coll);
    $row_bind_coll=mysqli_fetch_assoc($res_bind_coll);
    $bind_coll_desc=$row_bind_coll['description'];
    $card_name=$_SESSION['card_name'];
    // ---------info from bind card---------------------
    $bind_cad_info="SELECT * FROM base_checklist WHERE realese_id=$bind_coll_id and id=$bind_card_id";
    $res_bind_cad_info=mysqli_query($con, $bind_cad_info);
    if(mysqli_num_rows($res_bind_cad_info)==1){
        $card_name=$row_bind_cad_info['card_name'];
        $row_bind_cad_info=mysqli_fetch_assoc($res_bind_cad_info);
        $card_name=$row_bind_cad_info['card_name'];
        $card_number=$row_bind_cad_info['card_number'];
        $card_team=$row_bind_cad_info['team'];
        $card_parallel=$row_bind_cad_info['parallel'];
    }
    $_SESSION['bind_card_id']='';
}
else{
    $bind_card_id='';
    $bind_coll_id='';
    $bind_coll_desc='';
    $card_name='';
    $card_number='';
    $card_team='';
    $card_parallel='';
}
$row_user='';
$sql_coll = "SELECT * FROM new_collection_card WHERE user_id = $user_id and id=$coll_id";
$res_coll = mysqli_query($con, $sql_coll);
if(mysqli_num_rows($res_coll)==1){
      $row_coll= mysqli_fetch_assoc($res_coll);
}

include "user_form/classes.php";
isset($_GET['card-id']) ? $releases_info=CardInfo::Card($con, 'card2',  $_GET['card-id']) :'';
isset($_GET['card-id']) ? $hide='d-none' :'';

isset($_GET['folder-id']) ? $count_cards=CountCards::CardsFirstFolder($con, $_GET['folder-id'], 'card1'): $count_cards=CountCards::CardsFirstFolder($con, $first_folder_id, $user_id);
$folders=Folders::AllFolders($con, 'collection_second_folder', 'first_folder_id', $first_folder_id);

include "user_form/pagination.php";
if(!empty($_SESSION['first_folders_id_array'])){
    $first_folders_id_array=$_SESSION['first_folders_id_array'];
    $active_folder='active-folder';
    $pagination= new Pagination();
    $pagination->tblName='card3';
    $conditions=array('coll_id' => $coll_id,
                       'folder_id' => $first_folders_id_array );
    $collection_row = $pagination->CollectionCardItems($con, $conditions);
}
else{
    $active_folder='';
    $pagination= new Pagination();
    $pagination->tblName='card2';
    $conditions=array( 'folder_id' => $first_folder_id,
                       'coll_id' => $coll_id,
                       'user_id' => $user_id );
    $collection_row = $pagination->CollectionCardItems($con, $conditions);
}
$items=$pagination->checkRow($conditions);
$res_items=mysqli_query($con, $items);

if(mysqli_num_rows($res_items)<9 && isset($_GET['page']) && $_GET['page']>1){ ?> <script>location.href='user-folder.php'</script><?php }
?>
<section class="hidden"></section>
<section>
    <div class="container mt-3 mb-0">
        <div class="site-color text-center"><h3> My Collections / <?php echo "<a href='user-collection.php'>".$row_coll['name_of_collection'] ."</a> / ". $folder_name['name_of_folder']; ?> </h3></div>
        <div class="w-100 text-right mb-0">
             <button class="px-4 py-2 add-folder bg-yellow" data-tbl-name="collection_second_folder" data-toggle="modal" data-target="#add_folder">Add Folder</button>
             <button class="px-4 py-2 add-card bg-yellow" data-tbl-name="card2" data-toggle="modal" data-target="#add_card">Add Card</button>
        </div>
        <div class="d-flex big-container mt-2 mb-5 ">
            <div class="w-22 cont-left text-center">
                <div>
                     <img src="img/<?php echo $row_coll['image']; ?>">
                </div>
                <div class="my-3"><?php echo $row_coll['name_of_collection']?></div>
                <div class="rating">
                    <span class="mx-2"><i class="fa fa-star star"></i></span>
                    <span class="mx-2"> 64</span>
                </div>
                <div>
                    <?php echo isset($_GET['card-id']) && $releases_info ? 
                        '<div><p><strong>Releases</strong></p>
                          <a href="base_checklist.php?id='.$releases_info['id'].'">'.$releases_info['name_of_collection'].'</a></div>
                          <div class="mt-3"><p><strong>Checklist</strong></p>
                          <a href="base_checklist.php?id='.$releases_info['id'].'">'.$releases_info['name_of_collection'].'</a></div>' : null ?>
                </div>
                <div class="my-4">
                    <span class="mx-2"><i class="fa fa-star star"></i></span>
                    <span><?php echo $count_cards ?></span>
                </div>
                <div data-coll-id="<?php echo $coll_id ?>" data-tblname="card3">
                            <!-- folder ----------- -->
                            <div class='pl-4 py-2 my-5 d-flex folder-div this-folder'><div class=''><?php echo $folder_name['name_of_folder'] ?></div></div>
                     <?php
                           while($row_folder=mysqli_fetch_assoc($folders)){
                            if(!empty($_SESSION['first_folders_id_array'])){
                                
                                if (in_array($row_folder['id'], $first_folders_id_array)) {
                                      echo "<div class='pl-4 py-2 my-2 d-flex folder-div ".$active_folder."'><div class='folder' data-folder-id='".$row_folder['id']."'>".$row_folder['name']."</div><div class='sign-in  d-flex flex-column justify-content-center' data-folder='second'><i class='fa fa-sign-in' style='font-size:24px; margin-left: 20px'></i></div></div>";
                                }
                                else{
                                    echo "<div class='pl-4 py-2 my-2 d-flex folder-div'><div class='folder' data-folder-id='".$row_folder['id']."'>".$row_folder['name']."</div><div class='sign-in  d-flex flex-column justify-content-center' data-folder='second'><i class='fa fa-sign-in' style='font-size:24px; margin-left: 20px'></i></div></div>";
                                } 
                            }
                            else{
                                echo "<div class='pl-4 py-2 my-2 d-flex folder-div '><div class='folder' data-folder-id='".$row_folder['id']."'>".$row_folder['name']."</div><div class='sign-in  d-flex flex-column justify-content-center' data-folder='second'><i class='fa fa-sign-in' style='font-size:24px; margin-left: 20px'></i></div></div>";
                            }
                           }
                     ?>
                </div>
            </div>
            <div class="w-6 center-div mx-5"></div>
            <div class="w-72 cont-right">
                <?php isset($_GET['page']) ? $uri_page='page='.$_GET['page'] : $uri_page=''; ?>
                <div class="d-flex flex-wrap justify-content-between rite-items">
                    <?php
                         while($row=mysqli_fetch_assoc($collection_row)){
                    ?>
                    <div class="w-22 collection-item" >
                      <a href="<?php echo $_SERVER['PHP_SELF'].'?card-id='.$row['id'].'&'.$uri_page ?>" class="collection-item-a card-item-a" data-id="<?php echo $row['id']; ?>" data-tblname="<?php echo !empty($active_folder) ? "card3" : "card2"?>">
                        <div class=" d-flex flex-column justify-content-center " >
                            <div class="plus-div <?php echo isset($_GET['card-id']) && $_GET['card-id']==$row['id'] ? 'show' : 'd-none' ?>">
                                <i class="fa fa-plus-circle card-plus-icon card-icon" > </i>
                                <i class="fa fa-info-circle card-info-icon card-icon" data-toggle="modal" data-target="#card-icons"></i>
                                <i class="fa fa-remove card-remove-icon card-icon" data-toggle="modal" data-target="#card-icons"> </i>

                            </div>
                             <div class="img-cont <?php echo isset($_GET['card-id']) && $_GET['card-id']==$row['id'] ? 'active-collection' : '' ?>">
                                 <img src="card-editor/cards-images/<?php echo $row['image'] ?>" class="w-100">
                             </div>
                             <!-- <div class="img-cont mt-2 <?php echo isset($_GET['card-id']) && $_GET['card-id']==$row['id'] ? 'active-collection' : '' ?>">
                                 <img src="card-editor/cards-name-images/<?php echo $row['card_name_image'] ?>" class="w-100">
                             </div> -->
                        </div>
                        <!-- <div class=" text-center mt-2 site-color fw-600"><?php echo $row['name'] ?></div> -->
                      </a>
                    </div>
                    <?php
                         }
                         if(mysqli_num_rows($collection_row)<1){
                            echo '<div class="w-100 text-center my-5 text-uppercase">no cards</div>';
                         }
                    ?>
                    
                </div>
                <div>
                    <nav aria-label="Page navigation ">
                        <ul class="pagination justify-content-center">
                       <?php echo $pp= $pagination->pages($con, $conditions); ?>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- -------------------------modal------------------------------- -->

<div class="modal fade" id="add_folder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="" action="user_form/add-folder.php">
                    <div class="form-group">
                        <label>Name of folder</label>
                        <input type="text" class="form-control namefolder" name="name-folder">
                        <input type="hidden" value="<?php echo $coll_id ?>" name='coll-id' >
                        <input type="hidden" value="<?php echo $first_folder_id ?>" name='first-folder-id' >
                        <input type="hidden" name="tbl-name" class="tbl-name-folder">
                    </div>
                    <div class="message-result"></div>
                <button type="" name="" class="banner-button float-right save-folder">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- -------------------------modal------------------------------- -->

<div class="modal fade" id="add_card" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="base-checklist-bind-card.php?link=user-folder"> <button class="px-4 py-2 mb-3 bg-yellow bind-card">Bind cаrd to checklist</button></a>
                <form method="post" id="" action="user_form/add-card.php">
                    <div class="form-group">
                        <div class="form-group">
                             <label>Card number</label>
                             <input type="text" class="form-control numbercard inp" name="number-card" value="<?=$card_number?>">
                        </div>
                        <div class="form-group">
                             <label>Card name</label>
                             <input type="text" class="form-control namecard inp" name="name-card" value="<?=$card_name?>">
                        </div>
                        <div class="form-group">
                             <label>Team</label>
                             <input type="text" class="form-control teamcard inp" name="team-card" value="<?=$card_team?>">
                        </div>
                        <div class="form-group">
                             <label>Parallel</label>
                             <input type="text" class="form-control parallelcard inp" name="parallel-card" value="<?=$card_parallel?>">
                        </div>
                        
                        <input type="hidden" value="<?php echo $coll_id ?>" name='coll-id' >
                        <input type="hidden" name="tbl-name-card" class="tbl-name-card">
                        <input type="hidden" name="bind_card_id" class="bind-card-id inp" value='<?=$bind_card_id?>' >
                        <input type="hidden" class="bind-c-id inp" value='<?=$bind_card_id?>'>
                        <input type="hidden" name="bind_coll_id" class="bind-coll-id inp" value='<?=$bind_coll_id?>'>
                        <input type="hidden" name="folder_id" class="" value='<?=$first_folder_id ?>'>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control desc inp" name="description" id="desc-card"><?=$bind_coll_desc?></textarea>
                    </div>
                    <div class="message-result-card"></div>
                <button type="" name="" class="banner-button float-right save-card">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "info-modal.php" ?>
<?php include "footer.php" ?>
<script src="user_js/add-folder.js"></script>
<script src="user_js/open-modal.js"></script>
</body>
</html>
