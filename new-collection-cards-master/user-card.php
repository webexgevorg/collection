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
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.16/fabric.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Base64/1.1.0/base64.js" integrity="sha512-S1ZwdmlDDaFLXAWsXRXKnbkNNpmlWFlp5QEsJeiUQnzeLpzp1vxJyMdpCSAgEoAJY21LpQfCyYQ+z+W+1F84Kw==" crossorigin="anonymous"></script>

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
        $second_button_name="";
        $first_button_name="";
        $buttons_array = array();
        if (!empty($_SESSION['first_folder_id'])) {
            $first_folder_id = $_SESSION['first_folder_id'];

            $sql_folder_name = "SELECT name_of_folder FROM collection_first_folder WHERE id=$first_folder_id";
            $res_folder_name = mysqli_query($con, $sql_folder_name);
            if (mysqli_num_rows($res_folder_name) == 1) {
                $folder_n = mysqli_fetch_assoc($res_folder_name);
                $folder_name = ' / ' . $folder_n['name_of_folder'];
                $first_button_name = $folder_n['name_of_folder'];
            } else {
                $folder_name = '';
                $first_button_name = '';
            }
        } else {
            $first_folder_id = '';
        }
        if (!empty($_SESSION['second_folder_id'])) {
            $second_folder_id = $_SESSION['second_folder_id'];

            $sql_second_folder_name = "SELECT name_of_folder FROM collection_second_folder WHERE id=$second_folder_id";
            $res_second_folder_name = mysqli_query($con, $sql_second_folder_name);
            if (mysqli_num_rows($res_second_folder_name) == 1) {
                $second_folder_n = mysqli_fetch_assoc($res_second_folder_name);
                $second_folder_name = ' / ' . $second_folder_n['name_of_folder'];
                $second_button_name = $second_folder_n['name_of_folder'];
            } else {
                $second_folder_name = '';
                $second_button_name = '';
            }
        } else {
            $second_folder_name = '';
            $second_folder_id = '';
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
        array_push(
            $buttons_array,
            [
                'id' => $coll_id,
                'name' => $row_coll['name_of_collection'],
                'tbl_name' => 'card1'
            ],
            [
                'id' => $first_folder_id,
                'name' => $first_button_name,
                'tbl_name' => 'card2'
            ],
            [
                'id' => $second_folder_id,
                'name' => $second_button_name,
                'tbl_name' => 'card3'
            ]

        );
    }
    include "user_form/classes.php";
    isset($_GET['card-id']) ? $releases_info = CardInfo::Card($con, $card_tblname,  $_GET['card-id']) : '';
    isset($_GET['card-id']) ? $hide = 'd-none' : '';
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
    $cards_images = $pagination->checkRow($conditions_images);
    $cards_images_res = mysqli_query($con, $cards_images);
    // ------for template--------------------
    $template_sql="SELECT * FROM card_templates WHERE user_id=$user_id";
    $template_query=mysqli_query($con, $template_sql);
    
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
                    <?php
                    // echo $row_coll['name_of_collection'] ;
                    // print_r($buttons_array);
                    ?>

                    <div class=" collection-item">
                        <!-- <a href="<?php echo $_SERVER['PHP_SELF'] . '?coll-id=' . $card_row['id'] . '&' . $uri_page ?>" class="collection-item-a" data-id="<?php echo $card_row['id']; ?>"> -->
                        <div class="h-75 img-cont d-flex flex-column justify-content-center <?php echo isset($_GET['coll-id']) && $_GET['coll-id'] == $card_row['id'] ? 'active-collection' : '' ?>">
                            <img src="card-editor/cards-images/<?php echo $card_row['image'] ?>" class="w-100">
                        </div>
                        <div class='text-left mt-2'>
                           <div>
                               <strong>NUMBER:</strong>
                               <span><?=$card_row['number'] ?></span>
                           </div>
                           <div>
                               <strong>NAME:</strong>
                               <span><?=$card_row['name'] ?></span>
                           </div>
                           <div>
                               <strong>TEAM:</strong>
                               <span><?=$card_row['team'] ?></span>
                           </div>
                           <div>
                               <strong>PARALLEL:</strong>
                               <span><?=$card_row['parallel'] ?></span>
                           </div>
                           <div>
                               <strong>DESCRIPTION:</strong>
                               <span><?=$card_row['description'] ?></span>
                           </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href='<?= "card-editor.php?card-id=$card_id&tbl=$_GET[tbl]" ?>'><button class="px-4 py-2 add-folder bg-yellow">Edit</button></a>
                        <p></p>
                        <button class="px-4 py-2 add-folder bg-yellow" data-toggle="modal" data-target=".bd-example-modal-lg">Use template</button>
                    </div>
                </div>
                <div class="w-6 mx-1"></div>
                <div class="w-72 p-4 cont-right">
                    <div class="site-color text-center">
                        <h3> My Collections / <?php echo "<a href='user-collection.php'>".$row_coll['name_of_collection'] ."</a><a href='user-folder.php'>". $folder_name ."</a><a href='user-second-folder.php'>" . $second_folder_name ."</a>"; ?> </h3>
                    </div>
                    <div class='d-flex flex-wrap <?php echo  mysqli_num_rows($cards_images_res) > 1 ? 'justify-content-between' : '' ?> rite-items mt-3'>
                        <?php
                        $c = 0;
                        if (mysqli_num_rows($cards_images_res) > 0) {
                            while ($card_images_row = mysqli_fetch_assoc($cards_images_res)) {
                                $c++;
                                if ($c < 2) {
                                    $mr = 'mr-3';
                                }
                                echo "<div class='w-22 $mr'><div class='card-image h-100 img-cont d-flex flex-column justify-content-center '>
                                        <img class='w-100' src='cards_images/card" . $_GET['tbl'] . "/" . $_GET['card-id'] . "/" . $card_images_row['image'] . "' >
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
                                    <input type="hidden" name='tbl-name' value="<?= 'card' . $_GET['tbl'] ?>">
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
                          <a href="base_checklist.php?id=' . $releases_info['id'] . '">' . $releases_info['name_of_collection'] . '</a></div>
                          <div class="my-3"><span><strong>Checklist</strong></span>
                          <a href="base_checklist.php?id=' . $releases_info['id'] . '">' . $releases_info['name_of_collection'] . '</a></div>' : null ?>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
    </section>

    <!-- -----------------modal for tamplate-------------------------- -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                    <div class="canvas-cont bord-er d-none ml-auto mr-auto" >
					       <canvas id="canvas" ></canvas>
                           <!-- <canvas id="canvasForName" ></canvas> -->
                           <button class='modal-btn'>click</button>
					</div>
                    <div>
                    
                        <?php
                        foreach ($buttons_array as $key => $value) {
                            if ($value['name'] != '') {
                                if($value['tbl_name']=='card1'){
                                    //  echo "<button class=' add-folder bg-yellow' id='drop-down'>New</button>
                                    //  <div class='icon-text dropdown-divs hide text-left ppx-4 py-2 ml-2 add-folder bg-yellow'>
                                    //  <div data-id='$value[id]' data-tbl='$value[tbl_name]' class=' change-coll-cards-template'>$value[name]</div>
                                    //  <div data-id='$value[id]' data-tbl='$value[tbl_name]' class='change-coll-cards-template'>$value[name]</div>
                                    //  </div>";
                                        echo "<button class='dropdown add-folder bg-yellow'>
                                                    <a class='btn add-folder bg-yellow dropdown-toggle' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    $value[name]
                                                    </a>
                                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                                                        <div data-id='$coll_id' data-tbl='card1' class=' dropdown-item change-cards-template'>Collection without folders</div>
                                                        <div data-id='$coll_id' data-tbl='all_cards' class=' dropdown-item change-cards-template'>Collection with folders</div>
                                                    </div>
                                                </button>";
                                    }
                                else{
                                    echo "<button data-id='$value[id]' data-tbl='$value[tbl_name]' class='px-4 py-2 ml-2 add-folder bg-yellow change-cards-template'>$value[name]</button>";

                                }
                            }
                        }
                        echo "<button data-id='$card_id' data-tbl='$card_tblname' class='px-4 py-2 ml-2 add-folder bg-yellow change-this-card-template'>Only this card</button>";
                        ?>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex flex-wrap <?php echo  mysqli_num_rows($template_query) > 2 ? 'justify-content-between' : '' ?>">
                    <?php
                    $p=0;
                       while($template_row=mysqli_fetch_assoc($template_query)){
                        $p++;
                        if ($p < 2) {
                            $mr = 'mr-3';
                        }
                           echo "<div class='template-item w-22 $mr mt-2' id='$template_row[id]'>
                                    <div class='delete-template'><i class='fa fa-close'></i></div>
                                    <div class='temp-div'><img class='w-100 ' src='card-editor/templates-images/$template_row[image]'></div>
                                </div>";
                                // ------for card and card name----------------------
                                // echo "<div class='template-item w-22 $mr mt-2' id='$template_row[id]'>
                                //     <div class='delete-template'><i class='fa fa-close'></i></div>
                                //     <div class='temp-div'><img class='w-100 ' src='card-editor/templates-images/$template_row[image]'></div>
                                //     <div class='mt-2 temp-div'><img class='w-100' src='card-editor/templates-name-images/$template_row[name_image]'></div>
                                // </div>";
                       }
                    ?>
                </div>
                <div class='modal-footer'>
                    <div class='template-messagess'></div>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>
    <script src="user_js/add-image.js"></script>
    <script src="user_js/delete-template.js"></script>
    <script src="user_js/change-card-template.js"></script>
    <script>
    $('#drop-down').click(function(){
  $('.dropdown-divs').slideToggle()
})</script>
</body>

</html>

