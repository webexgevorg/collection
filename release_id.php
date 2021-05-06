<?php

    include "header.php";
    include "config/con1.php";
    require_once "user-logedin.php";

    if(!isset($_GET['data_id'])) {

        $sql = "SELECT * FROM base_checklist where realese_id='$_SESSION[collection_id]'";
        $query = mysqli_query($con, $sql);
        $num = mysqli_num_rows($query);
    }else{
        $sql = "SELECT * FROM base_checklist where realese_id='$_GET[data_id]'";
        $query = mysqli_query($con, $sql);
        $num = mysqli_num_rows($query);
    }


//    if(isset($_SESSION['data_first']) &&  isset($_SESSION['data_second'])){
//        echo $_SESSION['data_first'].$_SESSION['data_second'];
//    }
//
//    if(isset($_SESSION['collection_id'])){
//        echo $_SESSION['collection_id'];
//
//    }


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
            <div class="d-flex baseboll_pic p-1">
                <img class='img-fluid' src='<?php
                if(isset($_GET['data_id'])){
                    $sql="SELECT * FROM collections WHERE  id='$_GET[data_id]'";
                    $query=mysqli_query($con,$sql);
                    if($query){
                        $tox=mysqli_fetch_assoc($query);
                        echo "images/".$tox['image'];
                    }
                }else {

//                ajs harcumy ashxatum e checklist_typeic erb secmwum enq ed eji ag koxmi grvasqy ev mez tanum e release_id.php
                    $sql = "SELECT * FROM collections WHERE  id='$_SESSION[collection_id]'";
                    $query = mysqli_query($con, $sql);
                    if ($query) {
                        $tox = mysqli_fetch_assoc($query);
                        echo "images/" . $tox['image'];
                    }
                }


                ?>'>
            </div>
            <div class="d-flex flex-column align-items-center release_icon">
                <img class='img-fluid' src='images_release_id/Заливка цветом 5 копия.png'>
                <h3 class="mt-1"><?= $num;?></h3>
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

//                    echo "<p class='ml-5 mr-1 sort' data-id='" . $tox['id'] . "' onclick='sort(this)'>" . $tox['year_of_releases'] . "-" . $tox['name_of_collection'] . "</p>";
                    echo "<a  class = 'ml-5' href='release_id.php?data_id=".$tox['id']."'>" . $tox['year_of_releases'] . "-" . $tox['name_of_collection'] . "</a><br/>";
                }

            ?>
        </div>

    </div>
</section>


<?php
include "footer.php";
?>

</body>
</html>