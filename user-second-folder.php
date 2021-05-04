<?php
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
//   if(isset($_SESSION['user'])){
//       $id=$_SESSION['user'];
//   }
$user_id = $_SESSION['user'];
if(!empty($_SESSION['coll-id']) && !empty($_SESSION['second_folder_id'])){
    $coll_id=$_SESSION['coll-id'];
    $second_folder_id=$_SESSION['second_folder_id'];
    // $_SESSION['first_folders_id_array']=[];
    $first_folder_id=$_SESSION['first_folder_id'];
    $sql_folder_name = "SELECT name_of_folder FROM collection_first_folder WHERE id=$first_folder_id";
    $res_folder_name = mysqli_query($con, $sql_folder_name);
    if(mysqli_num_rows($res_folder_name)==1){
      $folder_name= mysqli_fetch_assoc($res_folder_name);
    }

    $sql_second_folder_name = "SELECT name_of_folder FROM collection_second_folder WHERE id=$second_folder_id";
    $res_second_folder_name = mysqli_query($con, $sql_second_folder_name);
    if(mysqli_num_rows($res_second_folder_name)==1){
      $second_folder_name= mysqli_fetch_assoc($res_second_folder_name);
    }
}
else{
    header("loction: user-collections.php ");
    exit();
}
if(isset($_SESSION['bind_coll_id']) && isset($_SESSION['bind_card_id'])){
    $bind_card_id=$_SESSION['bind_card_id'];
    $bind_coll_id=$_SESSION['bind_coll_id'];
    $sel_bind_coll="SELECT 'description' FROM collections WHERE id=$bind_coll_id";
    $res_bind_coll=mysqli_query($con, $sel_bind_coll);
    $row_bind_coll=mysqli_fetch_assoc($res_bind_coll);
    $bind_coll_desc=$row_bind_coll['description'];
    $card_name=$_SESSION['card_name'];
    $_SESSION['bind_card_id']='';
}
else{
    $bind_card_id='';
    $bind_coll_id='';
    $bind_coll_desc='';
    $card_name='';
}
$row_user='';
$sql_coll = "SELECT * FROM new_collection_card WHERE user_id = $user_id and id=$coll_id";
$res_coll = mysqli_query($con, $sql_coll);
if(mysqli_num_rows($res_coll)==1){
      $row_coll= mysqli_fetch_assoc($res_coll);
}

include "user_form/classes.php";
isset($_GET['card-id']) ? $releases_info=CardInfo::Card($con, 'card3',  $_GET['card-id']) :'';
isset($_GET['card-id']) ? $hide='d-none' :'';

$count_cards=CountCards::CardsSecondFolder($con, $second_folder_id, $user_id);

include "user_form/pagination.php";
$pagination= new Pagination();
$pagination->tblName='card3';
$conditions=array('coll_id' => $coll_id,
                  'folder_id' => $second_folder_id);
$collection_row = $pagination->CollectionCardItems($con, $conditions);
$items=$pagination->checkRow($conditions);
$res_items=mysqli_query($con, $items);

if(mysqli_num_rows($res_items)<9 && isset($_GET['page']) && $_GET['page']>1){ ?> <script>location.href='user-folder.php'</script><?php }
?>
<section class="hidden"></section>
<section>
    <div class="container mt-3 mb-0">
        <div class="site-color text-center"><h3> My Collections / <?php echo $row_coll['name_of_collection'] .' / '.$folder_name['name_of_folder'].' / '.$second_folder_name['name_of_folder'] ?> </h3></div>
        <div class="w-100 text-right mb-0">
             <button class="px-4 py-2 add-card bg-yellow" data-tbl-name="card3" data-toggle="modal" data-target="#add_card">Add Card</button>
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
                
            </div>
            <div class="w-6 center-div mx-5"></div>
            <div class="w-72 cont-right">
                <?php isset($_GET['page']) ? $uri_page='page='.$_GET['page'] : $uri_page=''; ?>
                <div class="d-flex flex-wrap justify-content-between rite-items">
                    <?php
                    
                         while($row=mysqli_fetch_assoc($collection_row)){
                    // isset($_GET['coll-id'])==$row['id'] ? $active_class='active-collection' : $active_class='';
                        
                    ?>
                    <div class="w-22 collection-item" >
                      <a href="<?php echo $_SERVER['PHP_SELF'].'?card-id='.$row['id'].'&'.$uri_page ?>" class="card-item-a" data-id="<?php echo $row['id']; ?>" data-tblname="card3">
                        <div class=" img-cont d-flex flex-column justify-content-center <?php echo isset($_GET['card-id']) && $_GET['card-id']==$row['id'] ? 'active-collection' : '' ?>" >
                             <div class="plus-div <?php echo isset($_GET['card-id']) && $_GET['card-id']==$row['id'] ? 'show' : 'd-none' ?>"><i class="fa fa-plus-circle card-plus-icon"> </i></div>
                             <img src="card-editor/cards-images/<?php echo $row['image'] ?>" class="w-100">
                             <img src="card-editor/cards-name-images/<?php echo $row['card_name_image'] ?>" class="w-100">
                        </div>
                        <div class=" text-center mt-2 site-color fw-600"><?php echo $row['name'] ?></div>
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
                <a href="base-checklist-bind-card.php?link=user-second-folder"> <button class="px-4 py-2 mb-3 bg-yellow bind-card">Bind cаrd to checklist</button></a>
                <form method="post" id="" action="user_form/add-card.php">
                    <div class="form-group">
                        <label>Card name</label>
                        <input type="text" class="form-control namecard inp" name="name-card" value="<?=$card_name?>">
                        <input type="hidden" value="<?php echo $coll_id ?>" name='coll-id' >
                        <input type="hidden" name="tbl-name-card" class="tbl-name-card">
                        <input type="hidden" name="bind_card_id" class="bind-card-id inp" value='<?=$bind_card_id?>' >
                        <input type="hidden" class="bind-c-id inp" value='<?=$bind_card_id?>'>
                        <input type="hidden" name="bind_coll_id" class="bind-coll-id inp" value='<?=$bind_coll_id?>'>
                        <input type="hidden" name="folder_id" class="" value='<?=$second_folder_id ?>'>
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
<?php include "footer.php" ?>
<script src="user_js/add-folder.js"></script>
<script src="user_js/open-modal.js"></script>
</body>
</html>
