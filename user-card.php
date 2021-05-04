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
<link rel="stylesheet" type="text/css" href="css/user_card.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <?php include "cookie.php"; ?>
    <?php
    $user_id = $_SESSION['user'];
    if (!empty($_SESSION['coll-id']) && !empty($_GET['card-id']) && !empty($_GET['tbl'])) {
        $coll_id = $_SESSION['coll-id'];
        $card_id = $_GET['card-id'];
        $card_tblname = 'card' . $_GET['tbl'];
        $folder_name = '';
        if (!empty($_SESSION['first_folder_id'])) {
            $first_folder_id = $_SESSION['first_folder_id'];

            $sql_folder_name = "SELECT name_of_folder FROM collection_first_folder WHERE id=$first_folder_id";
            $res_folder_name = mysqli_query($con, $sql_folder_name);
            if (mysqli_num_rows($res_folder_name) == 1) {
                $folder_n = mysqli_fetch_assoc($res_folder_name);
                $folder_name = ' / ' . $folder_n['name_of_folder'];
            } else {
                $folder_name = '';
            }
        }
    } else {
        header("loction: user-collections.php ");
        exit();
    }
    $row_user = '';
    $sql_coll = "SELECT * FROM new_collection_card WHERE user_id = $user_id and id=$coll_id";
    $res_coll = mysqli_query($con, $sql_coll);
    if (mysqli_num_rows($res_coll) == 1) {
        $row_coll = mysqli_fetch_assoc($res_coll);
    }
    include "user_form/classes.php";
    isset($_GET['card-id']) ? $releases_info=CardInfo::Card($con, $card_tblname,  $_GET['card-id']) :'';
    isset($_GET['card-id']) ? $hide='d-none' :'';
    // isset($_GET['folder-id']) ? $count_cards=CountCards::CardsFirstFolder($con, $_GET['folder-id'], 'card1'): $count_cards=CountCards::CardsFirstFolder($con, $first_folder_id, $user_id);
    // $folders=Folders::AllFolders($con, 'collection_second_folder', 'first_folder_id', $first_folder_id);

    include "user_form/pagination.php";
    $pagination = new Pagination();
    $pagination->tblName = $card_tblname;
    $conditions = array('id' => $card_id);
    $card = $pagination->checkRow($conditions);
    $card_res = mysqli_query($con, $card);
    if (mysqli_num_rows($card_res) == 1) {
        $card_row = mysqli_fetch_assoc($card_res);
    }
    $pagination->tblName = 'cards_images';
    $conditions_images = array('card_id' => $card_id);
    $cards_images=$pagination->checkRow($conditions_images);
    $cards_images_res=mysqli_query($con, $cards_images);
    ?>
    <section class="hidden"></section>
    <section>
        <div class="container mt-3 mb-0">
            <!-- <div class="site-color text-center">
                <h3> My Collections / <?php echo $row_coll['name_of_collection'] . $folder_name; ?> </h3>
            </div> -->
            <!-- <div class="w-100 text-right mb-0">
             <button class="px-4 py-2 add-folder bg-yellow" data-tbl-name="collection_second_folder" data-toggle="modal" data-target="#add_folder">Add Folder</button>
             <button class="px-4 py-2 add-card bg-yellow" data-tbl-name="card2" data-toggle="modal" data-target="#add_card">Add Card</button>
        </div> -->
            <div class="d-flex big-container mt-2 mb-5 ">
                <div class="w-22 p-4 cont-left text-center">

                    <div class=" collection-item">
                        <!-- <a href="<?php echo $_SERVER['PHP_SELF'] . '?coll-id=' . $card_row['id'] . '&' . $uri_page ?>" class="collection-item-a" data-id="<?php echo $card_row['id']; ?>"> -->
                        <div class="h-75 img-cont d-flex flex-column justify-content-center <?php echo isset($_GET['coll-id']) && $_GET['coll-id'] == $card_row['id'] ? 'active-collection' : '' ?>">
                            <img src="card-editor/cards-images/<?php echo $card_row['image'] ?>" class="w-100">
                            <img src="card-editor/cards-name-images/<?php echo $card_row['card_name_image'] ?>" class="w-100">
                        </div>
                        <div class=" text-center mt-2 site-color fw-600"><?php echo $card_row['name'] ?></div>
                        <!-- </a> -->
                    </div>
                    <div class="mt-5">
                        <button class="px-4 py-2 add-folder bg-yellow">Edit</button>
                        <p></p>
                        <button class="px-4 py-2 add-folder bg-yellow">Use template</button>
                    </div>
                </div>
                <div class="w-6 mx-1"></div>
                <div class="w-72 p-4 cont-right">
                    <div class="site-color text-center">
                        <h3> My Collections / <?php echo $row_coll['name_of_collection'] . $folder_name; ?> </h3>
                    </div>
                    <div class='d-flex flex-wrap <?php echo  mysqli_num_rows($cards_images_res) >1 ? 'justify-content-between' : ''?> rite-items mt-3'>
                        <?php
                           $c=0;
                           if (mysqli_num_rows($cards_images_res) >0) {
                            while($card_images_row = mysqli_fetch_assoc($cards_images_res)){
                               $c++;
                               if($c<2){$mr='mr-3';}
                               echo "<div class='w-22 $mr'><div class='card-image h-100 img-cont d-flex flex-column justify-content-center '>
                                        <img class='w-100' src='cards_images/card".$_GET['tbl']."/".$_GET['card-id']."/".$card_images_row['image']."' >
                                    </div></div>";
                            }
                           }
                        ?>
                        <div class='w-22 add-img-cont'>
                        <div class='d-flex h-100 add-img text-center align-items-center justify-content-center'>
                            <form enctype="multipart/form-data" id="save-imge">
                                <div>
                                    <label for="add-image" class='plus'><i class="fa fa-plus"></i></label>
                                    <input type="file" id="add-image" name='img'>
                                </div>
                                <input type="hidden" name='card-id' value="<?= $_GET['card-id'] ?>">
                                <input type="hidden" name='tbl-name' value="<?= 'card'.$_GET['tbl'] ?>">
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class='res-img mt-3'></div>
                    <div class='mt-3'>
                        <!-- <div class="mt-5">
                            <div class="my-3">
                                <span><strong>Release</strong></span>
                            </div>
                            <div class="my-3">
                                <span><strong>Checklist</strong></span>
                            </div> -->
                            <div class="mt-5">
                    <?php echo isset($_GET['card-id']) && $releases_info ? 
                        '<div class="my-3"><span><strong>Releases</strong></span>
                          <a href="base_checklist.php?id='.$releases_info['id'].'">'.$releases_info['name_of_collection'].'</a></div>
                          <div class="my-3"><span><strong>Checklist</strong></span>
                          <a href="base_checklist.php?id='.$releases_info['id'].'">'.$releases_info['name_of_collection'].'</a></div>' : null ?>
                </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php" ?>
    <script src="user_js/add-image.js"></script>
</body>

</html>