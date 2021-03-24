<?php
include "header.php";
include "config/con1.php";
/*if(isset($_COOKIE['user']) || isset($_SESSION['user'])){ // qcume er profile-page.php ejy
  header('location:profile-page.php');
}*/

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="carusel/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="carusel/css/style.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/profile-page.css">
<link href="carusel/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="carusel/css/style.css" rel="stylesheet">
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
<div class="container" style="margin-top: 150px">

    <div class="row userRow">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div>
                <?php if ($ard['image']): ?>
                    <img src='images_users/<?php echo $ard['image'] ?>' class="img-fluid user_img">
                <?php else: ?>
                    <p>Add your image</p>
                <?php endif ?>
            </div>

            <br>
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
</div>


<div class="discdiv">
    <section id="testimonials" class="top-collections">
        <h2 class="text-center text-uppercase">COLLECTIONS</h2>
        <br>
        <a style="margin-top: -66px;position: absolute;left: 87%;" href="add_collection.php" class="float-right hr ml-2">Add Collection</a>
        <div class="container">
            <?php if ($row3 < 5){
            ?>
            <div class="row">
                <?php
                while ($tox2 = mysqli_fetch_assoc($res3)) {
                    ?>
                    <div class="owl-item active" style="width: 222px;">
                        <div class="testimonial-item">
                            <div class="row-d">
                                <div class="collect-card carusel-card">
                                    <div class="img-card" style="position: relative;">
                                        <span class="del del-personal" id="<?php echo $tox2['id'] ?>"
                                              data-toggle="modal" data-target="#delitePersonal">X</span>
                                        <a href="collection_checklist.php?id=<?php echo $tox2['id'] ?>" class="customLink">
                                            <img width="100%" src="img/<?php echo $tox2['image'] ?>"></a>
                                    </div>
                                    <div class="description-card">
                                        <div class="d-flex justify-content-between">
                                            <span class="nameofCollection"><?php echo $tox2['name_of_collection']; ?></span>
                                            <div class="plus-icon">+</div>
                                        </div>
                                        <p class="description"></p>
                                    </div>
                                    <div class="d-flex collector-cad bd-highlight mb-3">
                                        <div class="author-avatar p-2 bd-highlight"></div>
                                        <div class="p-2 bd-highlight">
                                            <p class="author-name"><?php echo $ard['name'] ?></p>
                                            <p class="country"><?php echo $ard['country'] ?></p>
                                        </div>
                                        <div class="align-self-center ml-auto p-2 bd-highlight">
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                }
                ?>
            </div>
            <?php if ($row3 >= 5) {
                ?>
                <div class="container">
                    <div class="owl-carousel testimonials-carousel">
                        <?php
                        while ($tox1 = mysqli_fetch_assoc($res3)) {
                            ?>
                            <div class="testimonial-item">
                                <div class="row-d">
                                    <div class="collect-card carusel-card">
                                        <div class="img-card" style="position: relative;">
                                            <span class = "del del-collection" id="<?php echo $tox1['id']?>" data-toggle="modal" data-target="#deliteCollection">X</span>
                                            <a href="collection_checklist.php?id=<?php echo $tox1['id'] ?>"
                                               class="customLink"> <img src="img/<?php echo $tox1['image'] ?>"></a>
                                        </div>
                                        <div class="description-card">
                                            <div class="d-flex justify-content-between">
                                                <span class="nameofCollection text-left"><?php echo $tox1['name_of_collection']; ?></span>
                                                <div class="plus-icon">+</div>
                                            </div>
                                            <p class="description"><?php echo $tox1['description'] ?></p>
                                        </div>
                                        <div class="d-flex collector-cad bd-highlight mb-3">
                                            <div class="author-avatar p-2 bd-highlight"></div>
                                            <div class="p-2 bd-highlight">
                                                <p class="author-name"><?php echo $ard['name'] ?></p>
                                                <p class="country"><?php echo $ard['country'] ?></p>
                                            </div>
                                            <div class="align-self-center ml-auto p-2 bd-highlight">
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            if ($row3 == 0) {
               echo ' <div class="discdiv text-center">
                          <img src="images/disc.png" class="img-responsive">
                          <p class="collect">NO COLLECTIONS</p>
                        </div>';
            }
            ?>

        </div>
</div>


<div class="discdiv">
    <section id="testimonials" class="top-collections">
        <h2 class="text-center text-uppercase">CUSTOM CHECKLIST</h2>
        <br>
        <a style="margin-top: -66px;position: absolute;left: 87%;" href="custom.php" class="float-right hr ml-2">Add
            Checklist</a>
        <div class="container">
            <?php if ($row < 5){
            ?>
            <div class="row">
                <?php
                while ($tox2 = mysqli_fetch_assoc($res1)) {
                    ?>
                    <div class="owl-item active" style="width: 222px;">
                        <div class="testimonial-item">
                            <div class="row-d">
                                <div class="collect-card carusel-card">
                                    <div class="img-card" style="position: relative;">
                                        <span class="del del-personal" id="<?php echo $tox2['id'] ?>"
                                              data-toggle="modal" data-target="#delitePersonal">X</span>
                                        <a href="customchecklist.php?id=<?php echo $tox2['id'] ?>" class="customLink">
                                            <img width="100%" src="img/<?php echo $tox2['image'] ?>"></a>
                                    </div>
                                    <div class="description-card">
                                        <div class="d-flex justify-content-between">
                                            <span class="nameofCollection"><?php echo $tox2['name_of_checklist']; ?></span>
                                            <div class="plus-icon">+</div>
                                        </div>
                                        <p class="description"></p>
                                    </div>
                                    <div class="d-flex collector-cad bd-highlight mb-3">
                                        <div class="author-avatar p-2 bd-highlight"></div>
                                        <div class="p-2 bd-highlight">
                                            <p class="author-name"><?php echo $ard['name'] ?></p>
                                            <p class="country"><?php echo $ard['country'] ?></p>
                                        </div>
                                        <div class="align-self-center ml-auto p-2 bd-highlight">
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<link href="carusel/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="carusel/css/style.css" rel="stylesheet">

  <link href="carusel/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
 
  <link href="carusel/css/style.css" rel="stylesheet">

</head>
<body>
    <?php include "cookie.php";?>
   <?php 
//   if(isset($_SESSION['user'])){
//       $id=$_SESSION['user'];
//   }
    $id = $_SESSION['user'];
    $sql = "SELECT * FROM users where id = $id";
    $res = mysqli_query($con,$sql);
    $ard = mysqli_fetch_assoc($res);

    $sql1 = "SELECT * FROM custom_name_checklist WHERE user_id = $id";
    $res1 = mysqli_query($con,$sql1);
    $row = mysqli_num_rows($res1);

    $sql2 = "SELECT * FROM personal_name_checklist WHERE user_id = $id";
    $res2 = mysqli_query($con,$sql2);
    $row2 = mysqli_num_rows($res2);

    $sql3 = "SELECT * FROM  new_collection_card WHERE user_id = $id";
    $res3 = mysqli_query($con,$sql3);
    $row3 = mysqli_num_rows($res3);

    

    ?> 


<div class="dvbtn">
  <button class="log-in">Add collection</button>  
</div>

<div class="container" style = "margin-top: 100px">
  <div class="row userRow">
      <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"> 
        <div>
          <?php if($ard['image']): ?>
            <img src='images_users/<?php echo $ard['image']?>' class="img-fluid user_img"> 
          <?php else: ?>
            <p>Add your image</p>
          <?php endif ?>
        </div>      
          
        <br>
        <button class="add" data-toggle="modal" data-target="#exampleModall">Edit</button> 
      </div>
      <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12" style="word-break: break-all">  
      <h4 class="parag-log"><?php echo $ard['name']?>
        
      </h4>
        <p class="parag-log"><?php echo $ard['country']?></p>
        <p class="parag-log">
          <?php 
            if($ard['more']){
              echo $ard['more'];    
            }else{
              echo "Add more information";
            }
          ?>
            
          </p>
          
      </div>
  </div>
</div>



 <div class="discdiv">
          <section id="testimonials" class="top-collections">
            <h4 class="text-center text-uppercase">COLLECTION</h4>
            <br>
            <a href="add_collection.php" class="float-right hr ml-2" style="margin-top: -66px;position: absolute;left: 84%;width: 180px;height: 40px;border-radius: 9px;">Add collection</a> 
            <div class="container">
              <?php 
                if($row3 == 0){
                  echo ' <div class="discdiv text-center">
                          <img src="images/disc.png" class="img-responsive">
                          <p class="collect">NO COLLECTIONS</p>
                        </div>';
                }
                else{
              ?>
               <div class="owl-carousel testimonials-carousel">
                  <?php
                      while($tox3=mysqli_fetch_assoc($res3)){
                  ?>
                    <div class="testimonial-item">
                      <div class="row-d" >
                        <div class="collect-card carusel-card">
                          <div class="img-card">
                            <span class = "del del-collection" id="<?php echo $tox3['id']?>" data-toggle="modal" data-target="#deliteCollection">X</span>
                            <a href="collection_checklist.php?id=<?php echo $tox3['id']?>" class = "customLink"> <img src="img/<?php echo $tox3['image']?>"></a>
                          </div>
                          <div class="description-card" style="overflow: auto">
                            <div class="d-flex justify-content-between">
                              <span class="nameofCollection"><?php echo $tox3['name_of_collection']; ?></span>
                              <div class="plus-icon">+</div>
                            </div>
                            <p  class="description"><?php echo $tox3['description']?></p>
                          </div>
                          <div class="d-flex collector-cad bd-highlight mb-3">
                              <div class="author-avatar p-2 bd-highlight"></div>
                                                  <div class="align-self-center ml-auto p-2 bd-highlight">
                                  <span class="star"><i class="fa fa-star-o"></i></span>
                                  <span class="star"><i class="fa fa-star-o"></i></span>
                                  <span class="star"><i class="fa fa-star-o"></i></span>
                                  <span class="star"><i class="fa fa-star-o"></i></span>
                                  <span class="star"><i class="fa fa-star-o"></i></span>
                              </div>
                          </div>
                        </div>
                      </div> 

<div class="discdiv">
    <section id="testimonials" class="top-collections">
      <h2 class="text-center text-uppercase">COLLECTION</h2>
      <br>

  <a href="add_collection.php" class="float-right hr ml-2" style="margin-top: -66px;position: absolute;left: 84%;width: 180px;height: 40px;border-radius: 9px;">Add collection</a> 

      <a style="margin-top: -66px;position: absolute;left: 87%;" href="custom.php" class="float-right hr ml-2">Add Checklist</a>

    <div class="container">
       
        <div class="owl-carousel testimonials-carousel">

          
          
<?php if($row3 >= 1):
  while($tox3=mysqli_fetch_assoc($res3)){
  ?>
                <div class="testimonial-item">
                <div class="row-d" >
                <div class="collect-card carusel-card">
                <div class="img-card">

                  <span class = "del del-collection" id="<?php echo $tox3['id']?>" data-toggle="modal" data-target="#deliteCollection">X</span>
                   <a href="collection_checklist.php?id=<?php echo $tox3['id']?>" class = "customLink"> <img src="img/<?php echo $tox3['image']?>"></a>

                  
                   <a href="customchecklist.php?id=<?php echo $tox1['id']?>" class = "customLink"> <img src="img/<?php echo $tox1['image']?>"></a>

                </div>
                <div class="description-card" style="overflow: auto">
                  <div class="d-flex justify-content-between">
                      <span class="nameofCollection"><?php echo $tox3['name_of_collection']; ?></span>
                      <div class="plus-icon">+</div>
                  </div>
                  <p  class="description"><?php echo $tox3['description']?></p>
                </div>
                <div class="d-flex collector-cad bd-highlight mb-3">
                    <div class="author-avatar p-2 bd-highlight"></div>
                    <div class="p-2 bd-highlight">
                        <p class="author-name"><?php echo $ard['name']?></p>
                        <p class="country"><?php echo $ard['country']?></p>
                    </div>
                    <div class="align-self-center ml-auto p-2 bd-highlight">
                        <span class="star"><i class="fa fa-star-o"></i></span>
                        <span class="star"><i class="fa fa-star-o"></i></span>
                        <span class="star"><i class="fa fa-star-o"></i></span>
                        <span class="star"><i class="fa fa-star-o"></i></span>
                        <span class="star"><i class="fa fa-star-o"></i></span>

                    </div>
                  <?php
                    }
                  ?>
               </div>
              <?php
                  }
              ?>
            </div>

        </div>

            


  <?php } 

else:
 ?>
  <div class="discdiv">
  <img src="images/disc.png" class="img-responsive">
  <p class="collect">NO COLLECTIONS</p>
</div>
<?php endif ?>
      
      </div>
      </div>
    </section>
      </div>



          
          
<div class="discdiv">
    <section id="testimonials" class="top-collections">
      <h2 class="text-center text-uppercase">CUSTOM CHECKLIST</h2>
      <br>
      <a style="margin-top: -66px;position: absolute;left: 87%;" href="custom.php" class="float-right hr ml-2">Add Checklist</a>
    <div class="container">
       
        <div class="owl-carousel testimonials-carousel">

          
          
<?php if($row >= 1):
  while($tox1=mysqli_fetch_assoc($res1)){
  ?>
                <div class="testimonial-item">
                <div class="row-d" >
                <div class="collect-card carusel-card">
                <div class="img-card">
                  
                   <a href="customchecklist.php?id=<?php echo $tox1['id']?>" class = "customLink"> <img src="img/<?php echo $tox1['image']?>"></a>
                </div>
                <div class="description-card">
                  <div class="d-flex justify-content-between">
                      <span class="nameofCollection"><?php echo $tox1['name_of_checklist']; ?></span>
                      <div class="plus-icon">+</div>
                  </div>
                  <p  class="description"><?php echo $tox1['description']?></p>
                </div>
                <div class="d-flex collector-cad bd-highlight mb-3">
                    <div class="author-avatar p-2 bd-highlight"></div>
                    <div class="p-2 bd-highlight">
                        <p class="author-name"><?php echo $ard['name']?></p>
                        <p class="country"><?php echo $ard['country']?></p>
                    </div>
                    <?php
                }
                }
                ?>
            </div>
            <?php if ($row >= 5) {
                ?>
                <div class="container">
                    <div class="owl-carousel testimonials-carousel">
                        <?php
                        while ($tox1 = mysqli_fetch_assoc($res1)) {
                            ?>
                            <div class="testimonial-item">
                                <div class="row-d">
                                    <div class="collect-card carusel-card">
                                        <div class="img-card" style="position: relative;">
                                            <a href="customchecklist.php?id=<?php echo $tox1['id'] ?>"
                                               class="customLink"> <img src="img/<?php echo $tox1['image'] ?>"></a>
                                        </div>
                                        <div class="description-card">
                                            <div class="d-flex justify-content-between">
                                                <span class="nameofCollection"><?php echo $tox1['name_of_checklist']; ?></span>
                                                <div class="plus-icon">+</div>
                                            </div>
                                            <p class="description"><?php echo $tox1['description'] ?></p>
                                        </div>
                                        <div class="d-flex collector-cad bd-highlight mb-3">
                                            <div class="author-avatar p-2 bd-highlight"></div>
                                            <div class="p-2 bd-highlight">
                                                <p class="author-name"><?php echo $ard['name'] ?></p>
                                                <p class="country"><?php echo $ard['country'] ?></p>
                                            </div>
                                            <div class="align-self-center ml-auto p-2 bd-highlight">
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            if ($row == 0) {
                ?>
                <div class="discdiv">
                    <img src="images/disc.png" class="img-responsive">
                    <p class="collect">NO COLLECTIONS</p>
                </div>
                <?php
            }
            ?>

        </div>
</div>
</section>
</div>


<!----------------personal cecklist----------------------------->
  <?php } 

else:
 ?>
  <div class="discdiv">
  <img src="images/disc.png" class="img-responsive">
  <p class="collect">NO COLLECTIONS</p>
</div>
<?php endif ?>
      
      </div>
      </div>
    </section>
      </div>


<div class="discdiv">
    <section id="testimonials" class="top-collections personalSection">
        <h2 class="text-center text-uppercase">PERSONAL CHECKLIST</h2>
        <br>
        <a style="margin-top: -66px;position: absolute;left: 87%;" href="personal.php" class="float-right hr ml-2">Add
            Checklist</a>
        <div class="container">
            <?php if ($row2 < 5){
            ?>
            <div class="row">
                <?php
                while ($tox2 = mysqli_fetch_assoc($res2)) {
                    ?>
                    <div class="owl-item active" style="width: 222px;">
                        <div class="testimonial-item">
                            <div class="row-d">
                                <div class="collect-card carusel-card">
                                    <div class="img-card" style="position: relative;">
                                        <span class="del del-personal" id="<?php echo $tox2['id'] ?>"
                                              data-toggle="modal" data-target="#delitePersonal">X</span>
                                        <a href="customchecklist.php?id=<?php echo $tox2['id'] ?>" class="customLink">
                                            <img width="100%" src="img/<?php echo $tox2['image'] ?>"></a>
                                    </div>
                                    <div class="description-card">
                                        <div class="d-flex justify-content-between">
                                            <span class="nameofCollection"><?php echo $tox2['name_of_checklist']; ?></span>
                                            <div class="plus-icon">+</div>
                                        </div>
                                        <p class="description"></p>
                                    </div>
                                    <div class="d-flex collector-cad bd-highlight mb-3">
                                        <div class="author-avatar p-2 bd-highlight"></div>
                                        <div class="p-2 bd-highlight">
                                            <p class="author-name"><?php echo $ard['name'] ?></p>
                                            <p class="country"><?php echo $ard['country'] ?></p>
                                        </div>
                                        <div class="align-self-center ml-auto p-2 bd-highlight">
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            <span class="star"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
      <h2 class="text-center text-uppercase">PERSONAL CHECKLIST</h2>
      <br>
      <a style="margin-top: -66px;position: absolute;left: 87%;" href="personal.php" class="float-right hr ml-2">Add Checklist</a>
    <div class="container">
       
    
        <div class="owl-carousel testimonials-carousel">

          
          
<?php if($row2 >= 1):
  while($tox2=mysqli_fetch_assoc($res2)){
  ?>
                <div class="testimonial-item">
                <div class="row-d" >
                <div class="collect-card carusel-card">
                <div class="img-card">
                    <span class = "del del-personal" id="<?php echo $tox2['id']?>" data-toggle="modal" data-target="#delitePersonal">X</span>
                    <a href="personalchecklist.php?id=<?php echo $tox2['id']?>" class = "customLink"> <img src="img/<?php echo $tox2['image']?>"></a>
                </div>
                <div class="description-card">
                  <div class="d-flex justify-content-between">
                    <span class="nameofCollection"><?php echo $tox2['name_of_checklist']; ?></span>
                      

                      <div class="plus-icon">+</div>
                  </div>
                  <p class="description"><?php echo $tox2['description']?></p>
                </div>
                <div class="d-flex collector-cad bd-highlight mb-3">
                    <div class="author-avatar p-2 bd-highlight"></div>
                    <div class="p-2 bd-highlight">
                        <p class="author-name"><?php echo $ard['name']?></p>
                        <p class="country"><?php echo $ard['country']?></p>
                    </div>
                    <?php
                }
                }
                ?>
            </div>
            <?php if ($row2 >= 5) {
                ?>
                <div class="container">
                    <div class="owl-carousel testimonials-carousel">
                        <?php
                        while ($tox2 = mysqli_fetch_assoc($res2)) {
                            ?>
                            <div class="testimonial-item">
                                <div class="row-d">
                                    <div class="collect-card carusel-card">
                                        <div class="img-card" style="position: relative;">
                                            <a href="customchecklist.php?id=<?php echo $tox2['id'] ?>"
                                               class="customLink"> <img src="img/<?php echo $tox2['image'] ?>"></a>
                                        </div>
                                        <div class="description-card">
                                            <div class="d-flex justify-content-between">
                                                <span class="nameofCollection"><?php echo $tox2['name_of_checklist']; ?></span>
                                                <div class="plus-icon">+</div>
                                            </div>
                                            <p class="description"><?php echo $tox2['description'] ?></p>
                                        </div>
                                        <div class="d-flex collector-cad bd-highlight mb-3">
                                            <div class="author-avatar p-2 bd-highlight"></div>
                                            <div class="p-2 bd-highlight">
                                                <p class="author-name"><?php echo $ard['name'] ?></p>
                                                <p class="country"><?php echo $ard['country'] ?></p>
                                            </div>
                                            <div class="align-self-center ml-auto p-2 bd-highlight">
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                                <span class="star"><i class="fa fa-star-o"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            if ($row == 0) {
                ?>
                <div class="discdiv">
                    <img src="images/disc.png" class="img-responsive">
                    <p class="collect">NO COLLECTIONS</p>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
            </div>
            </div> 
            </div>
            


  <?php } 

else:
 ?>
  <div class="discdiv">
  <img src="images/disc.png" class="img-responsive">
  <p class="collect">NO COLLECTIONS</p>
</div>

      
      </div>
      </div>
    </section>
      </div>


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
                  <input type="hidden" name="id" value="<?php echo $id?>">
                  <input type="text" class="form-control" name="name" value="<?php echo $ard['name']?>"> 
                  <br>                  
                  <textarea  name="text" cols="50" class="form-control">
                  <?php 
                    if($ard['more']){
                      echo $ard['more'];    
                    }else{
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
<div class="modal fade" id="deliteCustom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog delite_modal" role="document">

    </div>
</div>

<div class="modal fade" id="delitePersonal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog delite_modal-p" role="document">

    </div>
</div>

<div class="modal fade" id="deliteCollection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog delite_modal-p" role="document">

    </div>
<div class="modal fade" id="deliteCollection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog delite_modal-p" role="document">
    
  </div>
</div>
<?php
include "footer.php";
?>
<script src="carusel/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="carusel/js/main.js"></script>
<script>

    $('.del-custom').click(function () {
        var id = $(this).attr('id')
        var name = $(this).parents('.collect-card').find('.nameofCollection').text()
        var k = '<div class="modal-content" style="border:0"><form action="./custom_modal.php" method="POST"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="p-3"><p>Are you sure you want to delete the <b>' + name + '<b>?</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button><button type="submit" class="btn btn-danger" name="delite_btn-p" value="' + id + '">Delete</button></div></form></div>';
        $('.delite_modal').html(k)
    })
    $('.del-personal').click(function () {
        var id = $(this).attr('id')
        var name = $(this).parents('.collect-card').find('.nameofCollection').text()
        var k = '<div class="modal-content" style="border:0"><form action="./personal_modal.php" method="POST"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="p-3"><p>Are you sure you want to delete the <b>' + name + '<b>?</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button><button type="submit" class="btn btn-danger" name="delite_btn-p" value="' + id + '">Delete</button></div></form></div>';
        $('.delite_modal-p').html(k)
    })

    $('.del-collection').click(function () {
        var id = $(this).attr('id')
        var name = $(this).parents('.collect-card').find('.nameofCollection').text()
        var k = '<div class="modal-content" style="border:0"><form action="./collection_modal.php" method="POST"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="p-3"><p>Are you sure you want to delete the <b>' + name + '<b>?</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button><button type="submit" class="btn btn-danger" name="delite_btn-p" value="' + id + '">Delete</button></div></form></div>';
        $('.delite_modal-p').html(k)
    })
  $('.del-custom').click(function(){
    var id = $(this).attr('id')
    var name = $(this).parents('.collect-card').find('.nameofCollection').text()
    var k = '<div class="modal-content" style="border:0"><form action="./custom_modal.php" method="POST"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="p-3"><p>Are you sure you want to delete the <b>'+name+'<b>?</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button><button type="submit" class="btn btn-danger" name="delite_btn-p" value="'+id+'">Delete</button></div></form></div>';
    $('.delite_modal').html(k)
  })
$('.del-personal').click(function(){
    var id = $(this).attr('id')
    var name = $(this).parents('.collect-card').find('.nameofCollection').text()
    var k = '<div class="modal-content" style="border:0"><form action="./personal_modal.php" method="POST"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="p-3"><p>Are you sure you want to delete the <b>'+name+'<b>?</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button><button type="submit" class="btn btn-danger" name="delite_btn-p" value="'+id+'">Delete</button></div></form></div>';
    $('.delite_modal-p').html(k)
  })

$('.del-collection').click(function(){
    var id = $(this).attr('id')
    var name = $(this).parents('.collect-card').find('.nameofCollection').text()
    var k = '<div class="modal-content" style="border:0"><form action="./collection_modal.php" method="POST"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="p-3"><p>Are you sure you want to delete the <b>'+name+'<b>?</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button><button type="submit" class="btn btn-danger" name="delite_btn-p" value="'+id+'">Delete</button></div></form></div>';
    $('.delite_modal-p').html(k)
  })
</script>
</body>
</html>