<?php
   include "../heder.php";
?>


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
        margin: 0 20px;
        border-radius: 10px;

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
            /* text-align: center */
        }
        .img_p{
            display: flex;
            justify-content: start
        }
        .exp_div > p{
        font-size: 13px;
        padding-top: 10px
    }
        /* .ic_des{
            width: 100%;
            height: 100px;
            text-align: center  
            /* 09377 9793 Hrach Gevorgyan varordakan iravunq seria */
        } */
        
    }
    
</style>
<body>
        <?php
            include "../menu.php";
            require "../../config/con1.php";

            $id = $_GET["user_id"];

            $select_user = "SELECT * from users where id=$id";
            $result_user = mysqli_query($con, $select_user);
            $row_user = mysqli_fetch_assoc($result_user);

            $select_checklist = "select count(id) as count, sport_type from custom_name_checklist where user_id = $id Group By sport_type";
            $result_checklist = mysqli_query($con, $select_checklist);
            $checklist_content = "";

            while($row_checklist = mysqli_fetch_assoc($result_checklist)) {
               $checklist_total += $row_checklist["count"];
               $checklist_content .= "<p><span>" . $row_checklist["sport_type"] . "</span><span> Cards - </span><span>" . $row_checklist['count'] . "</span></p>";
            }

            $select_card = "select count(id) as count, sport_type from custom_checklist where cid = $id Group By sport_type";
            $result_card = mysqli_query($con, $select_card);
            $card_content = "";
            $cards_qty = mysqli_num_rows($result_card);
            if($cards_qty < 1) {
                echo "qicha";
            }else {
                while($row_card = mysqli_fetch_assoc($result_card)) {
                    $card_total += $row_card["count"];
                    $card_content .= "<p><span>" . $row_card["sport_type"] . "</span><span> Cards - </span><span>" . $row_card['count'] . "</span></p>";
                }

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
                                                    <div class = "circle_img">
                                                        <img src="#" alt="" class = "w-100">
                                                    </div>
                                                    <div class = "pt-4 ml-4 ">
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
                                                   <div class = "parts">
                                                       <p class = "mb-4">
                                                           <span class = "grey_spans">Custom Cards:</span>
                                                           <span>Total</span>
                                                           <span><?= $card_total ?></span>
                                                       </p>
                                                        <?= $card_content ?>
                                                   </div>
                                                   <div class = "parts">
                                                        <p class = "mb-4">
                                                            <span class = "grey_spans">Publications:</span>
                                                            <span>Total</span>
                                                            <span>4</span>
                                                        </p>
                                                        <p>
                                                            <span>Hockey-</span>
                                                            <span>50</span>
                                                        </p>
                                                        <p>
                                                            <span>Football - </span>
                                                            <span>560</span>
                                                        </p>
                                                        <p>
                                                            <span>Baseball - </span>
                                                            <span>60</span>
                                                        </p>
                                                        <p>
                                                            <span>Basketball - </span>
                                                            <span>56</span>
                                                        </p>
                                                        <p>
                                                            <span>Soccer - </span>
                                                            <span>50</span>
                                                        </p>
                                                        <p>
                                                            <span>Autosport - </span>
                                                            <span>50</span>
                                                        </p>
                                                        <p>
                                                            <span>Fighting - </span>
                                                            <span>50</span>
                                                        </p>
                                                   </div>
                                                </div>
                                                <div class = "d-flex pt-4 ml-5">
                                                    <div class = "parts">
                                                        <P class = "mb-4">
                                                            <span class = "grey_spans">Custom checklists:</span>
                                                            <span>Total</span>
                                                            <span><?= $checklist_total ?></span>
                                                        </P>
                                                        <?= $checklist_content ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "part_two_div d-flex justify-content-end">
                                                <div class = "icons_part">
                                                    <div class = "exp_div">
                                                        <p>Give achievement of "Expert"</p>
                                                    </div>
                                                    <div class = "img_p d-flex flex-wrap">
                                                        <div class = "ic_des">
                                                            <img src="../sport_icons/football.png" alt="">
                                                            <p>Football</p>
                                                        </div>
                                                        <div class = "ic_des">
                                                            <img src="../sport_icons/hockey.png" alt="">
                                                            <p>Hockey</p>
                                                        </div>
                                                        <div class = "ic_des">
                                                            <img src="../sport_icons/soccer.png" alt="">
                                                            <p>Soccer</p>
                                                        </div>
                                                        <div class = "ic_des">
                                                            <img src="../sport_icons/baseball.png" alt="">
                                                            <p>Baseball</p>
                                                        </div>
                                                        <div class = "ic_des">
                                                            <img src="../sport_icons/basketball.png" alt="">
                                                            <p>Basketball</p>
                                                        </div>
                                                        <div class = "ic_des">
                                                            <img src="../sport_icons/autosport.png" alt="">
                                                            <p>Autosport</p>
                                                        </div>
                                                        <div class = "ic_des">
                                                            <img src="../sport_icons/wwe.png" alt="">
                                                            <p>Fighting</p>
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
            </div>
            <div class="status"></div>
            <?php
                include "../footer.php";
            ?>
        <script src="../my_js/users.js"></script>
        <script src="../my_js/disabled_user.js"></script>

</body>
</html>