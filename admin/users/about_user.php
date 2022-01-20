<?php
   include "../heder.php";
?>

<!--<link rel="stylesheet" href="../css/about_users.css?5 ">-->

<style>
    .icon_username{
        width:100%;
        height: 50px;
        border-bottom: 1px solid #8080803d;;
        display: flex
    }
    .level_up_div{
        width: 50px;
        height: 50px;
        float: left;
        text-align: center
    }
    .use_p{
        color: grey;
        font-size: 15px
    }
    .part_one_div, .part_two_div{
        margin-top: 10px;
    }
    .part_one_div{
        width:65%
    }
    .part_two_div{
        width: 35%;
        height: 100%
    }
    .icon_logo{
        height: 100px
    }
    .part2 {
        padding: 20px 0 !important;
    }
    .circle_img{
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: #c2bdbd;
    }
    .user_color{
        color:#2d5a7a;
        font-weight: bold
    }
    .cit_sp{
        color: grey;
        font-size: 14px
    }
    .parts{
        width: 300px;
    }
    .parts > p{
        color: #2d5a7a;
        font-weight: bold;
        margin-bottom: 5px;
        letter-spacing: 0.5px
    }
    .grey_spans{
        color: grey;
        font-weight: 400
    }
    .icons_part{
        width: 300px;
        height: auto;
        border: 1px solid #2d5a7a;
        margin: 10px 20px;
        border-radius: 10px;

    }
    .users_achivment {
        width: 30px;
        margin-left: 5px;
        display: flex;
    }
    .add_achivment {
        display: flex;
    }
    .users_achivment img {
        width: 100%;
        cursor: pointer;
    }
    .exp_div{
        width: 100%;
        text-align: center;
        height: 50px;
        border-bottom: 1px solid #2d5a7a;
    }
    .exp_div > p{
        font-size: 15px;
        padding-top: 10px
    }
    .ic_des{
        width:99px;
        height: 80px;
        text-align: center;
        padding-top: 5px;

    }
    .ic_des > img{
        width: 50%;
        cursor: pointer;
    }
    @media (max-width: 650px){
        .img_p{
            display: flex;
            justify-content: center
        }
    }
    @media (min-width: 650px) and (max-width: 768px){
        .icons_part{
            width:100%;
        }
        .img_p{
            display: flex;
            justify-content: start
        }
        .exp_div > p {
            font-size: 13px;
            padding-top: 10px
        }
    }
</style>

<body>
        <?php
            include "../menu.php";
            require "../../config/con1.php";



            $icons = "";
            $select_icons = "SELECT * from sports_type";
            $icons_query = mysqli_query($con, $select_icons);
            while($icons_row = mysqli_fetch_assoc($icons_query)) {
                $icons .= '<div class = "ic_des" data-url="' . $icons_row['sport_logo'] . '">
                                <img src="../sport_icons/' . $icons_row['sport_logo'] . '.png" >
                                <p>' . $icons_row['sport_type'] . '</p>
                            </div>';
            }

            $icons1 = "";
            $select_icons1 = "SELECT * from achivments where role = 1";
            $icons1_query = mysqli_query($con, $select_icons1);
            while ($icons1_row = mysqli_fetch_assoc($icons1_query)) {
                $icons1 .= '<div class = "ic_des" data-url="' . $icons1_row['achivment_icon'] . '">
                                <img src="../sport_icons/' . $icons1_row['achivment_icon'] . '.png" >
                            </div>';
            }

            $id = $_GET["user_id"];

            $achivments = '';
            $select_achivments = "SELECT ac.achivment_icon FROM `users_achivments` as uac, achivments as ac WHERE uac.achivment_id = ac.id AND uac.user_id = $id";
            $achivments_result = mysqli_query($con , $select_achivments);
            while($achivments_row = mysqli_fetch_assoc($achivments_result)) {
                $achivments .= '<div data-url="' . $achivments_row['achivment_icon'] . '" class="users_achivment"><img src="../sport_icons/'. $achivments_row['achivment_icon'] . '.png"></div>';
            }

            $select_user = "SELECT * from users where id=$id";
            $result_user = mysqli_query($con, $select_user);
            $row_user = mysqli_fetch_assoc($result_user);

            $select_checklist = "select count(id) as count, sport_type from custom_name_checklist where user_id = $id Group By sport_type";
            $result_checklist = mysqli_query($con, $select_checklist);
            $checklist_content = "";
            $checklist_qty = mysqli_num_rows($result_checklist);

            while($row_checklist = mysqli_fetch_assoc($result_checklist)) {
               $checklist_total += $row_checklist["count"];
               $checklist_content .= "<p><span>" . $row_checklist["sport_type"] . "</span><span> Cards - </span><span>" . $row_checklist['count'] . "</span></p>";
            }

            $select_card = "select count(id) as count, sport_type from custom_checklist where cid = $id Group By sport_type";
            $result_card = mysqli_query($con, $select_card);
            $card_content = "";
            $cards_qty = mysqli_num_rows($result_card);

            $select_publication = "select count(id) as count, sport_type from custom_checklist where cid = $id Group By sport_type";
            $result_publication = mysqli_query($con, $select_publication);
            $publication_content = "";
            $publication_qty = mysqli_num_rows($result_publication);

        while($row_publication = mysqli_fetch_assoc($result_publication)) {
                $publication_total += $row_publication["count"];
                $publication_content .= "<p><span>" . $row_publication["sport_type"] . "</span><span> Cards - </span><span>" . $row_publication['count'] . "</span></p>";
            }

            $select_publication = "select count(id) as count, sport_type from custom_checklist where cid = $id Group By sport_type";
            $result_publication = mysqli_query($con, $select_publication);
            $publication_content = "";
            $publication_qty = mysqli_num_rows($result_publication);

        while($row_publication = mysqli_fetch_assoc($result_publication)) {
                $publication_total .= $row_publication["count"];
                $publication_content .= "<p><span>" . $row_publication["sport_type"] . "</span><span> Cards - </span><span>" . $row_publication['count'] . "</span></p>";
            }






        ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                                <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div style="margin: 0 auto">
                                        <div></div>
                                        <div class ="icon_username w-100">
                                            <div class = "level_up_div">
                                                <i class="fa fa-level-up" style = "transform: rotate(-90deg); color: grey; cursor:pointer;"></i>
                                            </div>
                                        </div>
                                        <div class = "parts_parent_div d-flex">
                                            <div class = "part_one_div">
                                                <div class = "col-md-12 icon_logo d-flex">
                                                    <div class = "circle_img" style="overflow: hidden">
                                                        <?php
                                                            if (!empty($row_user["image"])) {
                                                        ?>
                                                            <img src="../../images_users/<?= $row_user["image"] ?>"class = "w-100 h-100">
                                                        <?php
                                                            }else {
                                                        ?>
                                                            <img src="../../images_users/user-icon.svg" class = "w-100 h-100">
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class = "pt-4 ml-4 ">
                                                        <input type="hidden" class="hidden" value="<?= $id ?>">
                                                        <div class="add_achivment">
                                                            <?= $achivments ?>
                                                        </div>
                                                        <p class = "mb-0 user_color"><?= $row_user["name"] ?></p>
                                                        <p class = "cit_sp mb-0">
                                                            <span><?= $row_user["country"] ?></span>,
                                                            <span><?= $row_user["city"] ?></span>
                                                        </p>
                                                        <p class = "grey_spans">Email:
                                                        <span class = "user_color"><?= $row_user["email"] ?></span>
                                                    </p>
                                                    </div>                       
                                                </div>
                                                <div class = "d-flex flex-wrap pt-5 ml-5">

                                                   <?php
                                                        if ($cards_qty > 0) {
                                                   ?>
                                                    <div class = "parts">
                                                        <p class = "mb-4">
                                                            <span class = "grey_spans">Custom Cards:</span>
                                                            <span>Total</span>
                                                            <span><?= $card_total ?></span>
                                                        </p>
                                                        <?= $card_content ?>
                                                    </div>
                                                    <?php
                                                        }

                                                        if ($publication_qty > 0) {
                                                    ?>
                                                   <div class = "parts">
                                                        <p class = "mb-4">
                                                            <span class = "grey_spans">Publications:</span>
                                                            <span>Total</span>
                                                            <span><?= $publication_total ?></span>
                                                        </p>
                                                       <?= $publication_content ?>
                                                   </div>
                                                    <?php
                                                        }

                                                        if ($checklist_qty > 0) {
                                                    ?>
                                                <div class = "parts">
                                                    <P class = "mb-4">
                                                        <span class = "grey_spans">Custom checklists:</span>
                                                        <span>Total</span>
                                                        <span><?= $checklist_total ?></span>
                                                    </P>
                                                    <?= $checklist_content ?>
                                                </div>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                                </div>
                                            <div class = "part_two_div d-flex justify-content-end flex-column">
                                                <div class = "icons_part">
                                                    <div class = "exp_div">
                                                        <p>Give achievement of "Expert"</p>
                                                    </div>
                                                    <div class = "img_p d-flex flex-wrap delete_achivment">
                                                        <?= $icons ?>
                                                    </div>
                                                </div>
                                                <div class = "icons_part ">
                                                    <div class = "exp_div">
                                                        <p>Give personal achievement</p>
                                                    </div>
                                                    <div class = "img_p d-flex flex-wrap part2">
                                                        <?= $icons1 ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="status"></div>
            <?php
                include "../footer.php";
            ?>
        <script src="../my_js/users.js"></script>
        <script src="../my_js/disabled_user.js"></script>

</body>
</html>