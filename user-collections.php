<?php
include "header.php";
include "config/con1.php";
require_once "user-logedin.php";
?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/user_collections.css">
</head>
<body>
<?php include "cookie.php"; ?>
<?php
$user_id = $_SESSION['user'];
$row_user='';
$sql_user = "SELECT * FROM users where id = $user_id";
$res_user = mysqli_query($con, $sql_user);
if(mysqli_num_rows($res_user)==1){
      $row_user= mysqli_fetch_assoc($res_user);
}

include "user_form/classes.php";
isset($_GET['coll-id']) ? $row=Collections::Collection($con, $_GET['coll-id']) : $row=$row_user;
isset($_GET['coll-id']) ? $count_cards=CountCards::Cards($con, $_GET['coll-id'], $user_id): $count_cards=CountCards::AllCards($con, $user_id);

include "user_form/pagination.php";
$pagination= new Pagination();
$pagination->tblName='new_collection_card';
$collections_row = $pagination->allItems($con, 'user_id', $user_id);
// $pp= $pagination->pages($con, 'user_id', $user_id);
?>
<section class="hidden"></section>
<section>
    <div class="container mt-3 mb-0">
        <div class="site-color text-center"><h3> My Collections</h3></div>
        <div class="w-100 text-right mb-0">
             <button class="px-4 py-2 add-collection bg-yellow" data-toggle="modal" data-target="#add_collection">Add collection</button>
        </div>
        <div class="d-flex big-container mt-2 mb-5 ">
            <div class="w-22 cont-left text-center">
                <div>
                     <img src=" <?php echo isset($_GET['coll-id']) ? 'img/' : 'images_users/'; echo $row['image']; ?>">
                </div>
                <div class="my-3"><?php echo $row['name']?></div>
                <div class="rating">
                    <span class="mx-2"><i class="fa fa-star star"></i></span>
                    <span class="mx-2"> 64</span>
                </div>
                <div class="my-4">
                    <span class="mx-2"><i class="fa fa-star star"></i></span>
                    <span><?php echo $count_cards ?></span>
                </div>
                <div>
                    <?php echo isset($_GET['coll-id']) ? $row['description'] : '' ?>
                </div>
            </div>
            <div class="w-6 center-div mx-5"></div>
            <div class="w-72 cont-right">
                <div class="d-flex flex-wrap justify-content-between rite-items">
                    <?php
                    isset($_GET['page']) ? $uri_page='page='.$_GET['page'] : $uri_page='';

                         while($row=mysqli_fetch_assoc($collections_row)){
                    // isset($_GET['coll-id'])==$row['id'] ? $active_class='active-collection' : $active_class='';

                    ?>
                    <div class="w-22 collection-item" >
                      <a href="<?php echo $_SERVER['PHP_SELF'].'?coll-id='.$row['id'].'&'.$uri_page ?>" class="collection-item-a" data-id="<?php echo $row['id']; ?>">
                        <div class="h-75 img-cont d-flex flex-column justify-content-center <?php echo isset($_GET['coll-id']) && $_GET['coll-id']==$row['id'] ? 'active-collection' : '' ?>" >
                             <img src="img/<?php echo $row['image'] ?>" class="w-100">
                        </div>
                        <div class=" text-center mt-2 site-color fw-600"><?php echo $row['name_of_collection'] ?></div>
                      </a>
                    </div>
                    <?php
                         }
                    ?>
                    
                </div>
                <div>
                    <nav aria-label="Page navigation ">
                        <ul class="pagination justify-content-center">
                       <?php 
                       $conditions=array('user_id' => $user_id );
                       echo $pp= $pagination->pages($con, $conditions); ?>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- -------------------------modal------------------------------- -->

<div class="modal fade" id="add_collection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Collection</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="" action="user_form/user_add_collection.php">
                    <div class="form-group">
                        <label>Name of collection card</label>
                        <input type="hidden" value="<?php echo $user_id ?>" name='user_id' >
                        <input type="text" class="form-control namecoll" name="name-collection">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control desc" name="description"></textarea>
                    </div>
                    <div class="form-group d-flex">
                        <div class="choose_file">
                            <label class="file_label">
                                <input type="file" name="file" class="file">
                                <i class="fas fa-upload" aria-hidden="true"></i>
                            </label>
                        </div>
                       <span class="file-text mx-2 my-1">Upload photo</span>
                    </div>
                    <div class="message-result"></div>
                <button type="" name="add_collection" class="banner-button float-right save-collection">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
<script src="user_js/add-collection.js"></script>
</body>
</html>
