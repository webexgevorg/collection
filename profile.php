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

        <div class="d-flex  flex-wrap justify-content-between  first_prof">
            <div class="d-flex justify-content-between k1">
                <?php if ($ard['image']): ?>
                    <img src='images_users/<?php echo $ard['image'] ?>' class="img-fluid user_img">
                <?php else: ?>
                    <img src="images_users/user-icon.svg" class="img-responsive user w-100 h-75" >
                <?php endif ?>
            </div>
            <div class="k2">
                <h4 class="parag-log">Name: <?php echo $ard['name'] ?></h4>
                <p class="parag-log">Country: <?php echo $ard['country'] ?> 
                    <img id='myImage' width="30px" src="http://www.geonames.org/flags/x/<?= strtolower($ard['country_code']) ?>.gif" />
                </p>
                <p class="parag-log">City: <?php echo $ard['city'] ?> </p>
                <p class="parag-log">Information: 
                    <?php
                    if ($ard['more']) {
                        echo $ard['more'];
                    } else {
                        echo "Information is absent";
                    }
                    ?>
                </p>
                <button class="add" data-toggle="modal" data-target="#exampleModall">Edit</button>
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
            <div><a href="release_checklist.php"> <img src="images_users/user-icon.svg" class="img-responsive user w-100 h-50" ><h5>Profile</h5></a></div>
            <div><img src="profile_image/Заливка цветом 7 копия.png"><h5>followers</h5></div>
            <div><img src="profile_image/Заливка цветом 7 копия 2.png"><h5>favorites</h5></div>
            <div><img src="profile_image/Заливка цветом 9.png"><h5>post service</h5></div>
        </div>
        <div class="cards">
            <div><a href='user-collections.php'> <img src="profile_image/Заливка цветом 8.png"><h5>my collections</h5></a></div>
            <div><a href="my_checklist.php"><img src="profile_image/Заливка цветом 8 копия.png"><h5>MY CHECKLISTS</h5></a></div>
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
                    <input type="text" class="form-control mt-2" name="city" value="<?php echo $ard['city'] ?>">
                    <br>
                    <textarea name="text" cols="50" class="form-control mt-2 ">
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