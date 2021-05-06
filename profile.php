<?php
include "header.php";
include "config/con1.php";
require_once "user-logedin.php";
// if(!empty($_COOKIE['user']) || !empty($_SESSION['user'])){ // qcume er profile-page.php ejy
// }
// else{
//   header('location:index.php');
//   exit();
// }
?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/profile1.css">
<!--<link rel="stylesheet" href="css/profile.css">-->
</head>
<body>
<?php include "cookie.php"; ?>
<?php
//   if(isset($_SESSION['user'])){
//       $id=$_SESSION['user'];
//   }
$id = $_SESSION['user'];
$sql = "SELECT * FROM users where id = $id";
$res = mysqli_query($con, $sql);
$ard = mysqli_fetch_assoc($res);

$sql1 = "SELECT * FROM custom_name_checklist WHERE user_id = $id";
$res1 = mysqli_query($con, $sql1);
$row = mysqli_num_rows($res1);

$sql2 = "SELECT * FROM personal_name_checklist WHERE user_id = $id";
$res2 = mysqli_query($con, $sql2);
$row2 = mysqli_num_rows($res2);

$sql3 = "SELECT * FROM  new_collection_card WHERE user_id = $id";
$res3 = mysqli_query($con, $sql3);
$row3 = mysqli_num_rows($res3);


?>
<div class="container container_profile" style="margin-top: 150px">

    <!-- <div class="row userRow">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div>
                <?php if ($ard['image']): ?>
                    <img src='images_users/<?php echo $ard['image'] ?>' class="img-fluid user_img">
                <?php else: ?>
                    <p>Add your image</p>
                <?php endif ?>
            </div>
            <button class="add" data-toggle="modal" data-target="#exampleModall">Edit</button>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12" style="word-break: break-all">
            <h4 class="parag-log"><?php echo $ard['name'] ?>

            </h4>
            <p class="parag-log"><?php echo $ard['country'] ?></p>
            <p class="parag-log">
                <?php
                if ($ard['more']) {
                    echo $ard['more'];
                } else {
                    echo "Add more information";
                }
                ?>

            </p>

        </div>
    </div>
</div>-->
<div>
    <!--<div>
        <a href="user-collections.php"><button>Collections</button></a>
    </div> -->
    <!-- ----------------------------------- -->
        <div class="d-flex  flex-wrap justify-content-between  first_prof">
            <div class="d-flex justify-content-between k1">
                <img  class="img-fluid" src="profile_image/Слой 14.png" >
            </div>
            <div class="k2">
                <p class="p-2 text-justify"> About me<br>belief, Lorem Ipsum is not simply random text. It has roots in
                    belief, Lorem Ipsum is not simply random text. It has roots in
                    Lorem Ipsum is not simply random text. It has roots in
                    word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.
                    This book is a treatise on the theory of ethics, very popular during the
                </p>
            </div>
            <div class="d-flex flex-column align-items-center k3">
                <h4 class="text-center"> My statistics</h4>
                <div class="d-flex flex-column  justify-content-around  icon">
                    <div class="d-flex p-1 align-items-center justify-content-between div_icon">
                        <img  src="profile_image/Заливка цветом 1.png">
                        <h5>15</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between div_icon">
                        <img  src="profile_image/Заливка цветом 2.png">
                        <h5>2345</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between div_icon">
                        <img  src="profile_image/Заливка цветом 3.png">
                        <h5>23</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between div_icon">
                        <img  class='m-1'src="profile_image/Заливка цветом 4.png">
                        <h5>30</h5>
                    </div>
                </div>
            </div>

        </div>

        <div class="cards" style="margin-top:70px">
            <div><img src="profile_image/Заливка цветом 7 копия.png"><h5>MY CHECKLISTS</h5></div>
            <div><img src="profile_image/Заливка цветом 7 копия.png"><h5>followers</h5></div>
            <div><img src="profile_image/Заливка цветом 7 копия 2.png"><h5>favorites</h5></div>
            <div><img src="profile_image/Заливка цветом 9.png"><h5>post service</h5></div>
        </div>
        <div class="cards">
            <div><img src="profile_image/Заливка цветом 8.png"><h5>my collections</h5></div>
            <div><img src="profile_image/Заливка цветом 8 копия.png"><h5>my checklists</h5></div>
            <div><img src="profile_image/Заливка цветом 8 копия 2.png"><h5>my search</h5></div>
            <div><img src="profile_image/Заливка цветом 8 копия 3.png"><h5>my templates</h5></div>
        </div>
</div>
    </div>

</section>
</div>
<?php
include "footer.php";
?>
<!-- ---------------------------------- -->
<div class="modal fade" id="exampleModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <form action="profile-page-image-upload.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="text" class="form-control" name="name" value="<?php echo $ard['name'] ?>">
                    <br>
                    <textarea name="text" cols="50" class="form-control">
                  <?php
                  if ($ard['more']) {
                      echo $ard['more'];
                  } else {
                      echo "Add more information";
                  }
                  ?>
                </textarea>
                    <br>
                    <input type="file" name="image" class="form-control">
                    <button type="submit" name="send" class="add">Add</button>
                </form>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modalbody2">

            </div>
        </div>
    </div>
</div>

</body>
</html>