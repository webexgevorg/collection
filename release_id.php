<?php

    include "header.php";
    include "config/con1.php";
    require_once "user-logedin.php";

    if(isset($_SESSION['collection_id'])) {

        $sql = "SELECT * FROM base_checklist where realese_id='$_SESSION[collection_id]'";
        $query = mysqli_query($con, $sql);
        $num = mysqli_num_rows($query);
    }


?>
    <link rel="stylesheet" type="text/css" href="css/navbar-body.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/release_id.css">
    </head>
    <body>
    <?php include "cookie.php"; ?>

    <section class="checklist_type" >
        <div class="d-flex  align-items-start justify-content-end checklist_type_column">
            <div class="d-flex flex-column mt-3 align-items-center justify-content-around baseboll">
                <div class="d-flex baseboll_pic p-1" id="release_img">
                    <img class='img-fluid' src='<?php


    //                ajs harcumy ashxatum e checklist_typeic erb secmwum enq ed eji ag koxmi grvasqy ev mez tanum e release_id.php
                        $sql = "SELECT * FROM collections WHERE  id='$_SESSION[collection_id]'";
                        $query = mysqli_query($con, $sql);
                        if ($query) {
                            $tox = mysqli_fetch_assoc($query);
                            echo "images/" . $tox['image'];
                        }



                    ?>'>
                </div>
                <div class="d-flex flex-column align-items-center release_icon">
                    <img class='img-fluid' src='images_release_id/Заливка цветом 5 копия.png'>
                    <h3 class="mt-1" id="num"><?= $num;?></h3>
                </div>
                <div class="d-flex flex-column align-items-center release_icon">
                    <img class='img-fluid' src='images_release_id/Заливка цветом 1.png'>
                    <h3 class="mt-1">34</h3>
                </div>
            </div>
        </div>
        <div class="checklist_type_column">
            <h3 class="p-4">release / checklist / baseball / 2020...</h3>
            <div class="release_type_content">
                <?php
                $sql = "SELECT * FROM  collections WHERE sport_type IN (SELECT sport_type FROM sports_type where id=$_SESSION[sport_id]) and year_of_releases BETWEEN '$_SESSION[data_first]'  and '$_SESSION[data_second]'";
                $query = mysqli_query($con, $sql);
                    while ($tox = mysqli_fetch_assoc($query)) {
                        echo "<p class='ml-5 mr-1 release' data_id='" . $tox['id'] ."'>" . $tox['year_of_releases'] . "-" . $tox['name_of_collection'] . "</p>";
    //                    echo "<a  class = 'ml-5 custom1'  href='release_id.php?data_id=".$tox['id']."'   >" . $tox['year_of_releases'] . "-" . $tox['name_of_collection'] . "</a><br/>";
                    }

                ?>
            </div>

        </div>
    </section>


    <?php
    include "footer.php";
    ?>
    <script>

        $(document).on('click','.release',function(){

            $.ajax({
                type:'POST',
                url:'release_id_admin.php',
                data:{release_id:$(this).attr('data_id')},
                success:function(rez){

                   // $('#release_img').html(rez)
                    var k=rez.split("_")
                   // console.log(k)
                    $('#release_img').html(k[0])
                    $('#num').html(k[1])
                }
            })

        })
        $('.release').on('dblclick',function(){
            var id=$(this).attr('data_id')
            $.ajax({
                type:'POST',
                url:'release_id_admin.php',
                data:{release_dblclick:$(this).attr('data_id')},
                success:function(rez){
                console.log(rez)
                    // window.location.href="custom_checklist_name.php"
                    window.location.href="custom_check_namefff.php?name="+id;

                }
            })
        })
    </script>
    </body>
</html>