<?php
include "config/con1.php";
include "header.php";
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    $id = $_SESSION['user'];

    
}else{
    header('location:index.php');
}
if(isset($_GET['id'])){
  $folder_id=$_GET['id'];

    $realise_id = mysqli_real_escape_string($con, $_GET['id']);
    $sql = "SELECT * FROM `new_collection_card` WHERE id = '$realise_id'";
    $rezult = mysqli_query($con, $sql);
    $tox = mysqli_fetch_assoc($rezult);
    
    $sql1 = "SELECT * FROM  collection_first_folder WHERE card_id = $realise_id";
    $res1 = mysqli_query($con,$sql1);
    $row1 = mysqli_num_rows($res1);
    
    $sql2 = "SELECT * FROM  collection_second_folder WHERE card_id = $realise_id";
    $res2 = mysqli_query($con,$sql2);
    $row2 = mysqli_num_rows($res2); 
    
}

?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="css/profile-page.css">
<link rel="stylesheet" href="css/login-register.css">
<link rel="stylesheet" type="text/css" href="css/realize.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/base_checklist.css">
<link href="carusel/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="carusel/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<!-------------------------------------->
<meta charset="utf-8">

<style type="text/css">
    td{
        text-align: center;
    }
    .th-inner {
        width: 200px;
    }
    thead .text-center > div{
        width: auto;
    }
    .fixed-table-body{
        overflow-x: auto;
    }
    .carusel-card{
      background: #fbca00
    }
    .del-first{
      cursor: pointer;
    }
    .folder-item{
      min-height: unset ! important;
    }
    /*.social-div>a {
    color: #133960;
    }*/
    .testimonil-folder{
      height: 30px;
      min-height: unset ! important;
      /*font-size: */
    }
    #testimonials .folder .owl-nav {
    position: absolute;
    font-size: 95px;
    top: -60px;
    width: 100%;
    display: block;
    }
    .folder .owl-nav {
       top: 0px ! important;
       left: -30px;
       width: 106%;
       font-size: 54px ! important;
    }
.folder .owl-stage-outer{
    padding: 20px 0
}
</style>
</head>
    <body class="page_fix">
        <?php include "cookie.php";?>
        <section>
            <div class="container">
                <button type="button" class="btn float-right" data-toggle="modal" data-target=".bd-example-modal-lg" id="<?php echo $tox['id']?>">
                    <img src='images/edit-icon.png' width="30">
                </button>
                <div class="row rowheight">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 " align="center" >
                        <div class = "imgdiv">
                            <img src="img/<?php echo $tox['image']; ?>" class="personImg" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 " align="center" >
                        <div class="about">

                            <p><?php echo $tox['name_of_collection']?></p>
                            <p><?php echo $tox['description']?></p>
                        </div>

                    </div>
                </div>
                <div style="display: inline-block;margin-left: 867px;margin-bottom: 19px">
                  <button style="background: linear-gradient(180deg, rgba(252,217,0,1) 0%, rgba(251,196,0,1) 50%, rgba(250,174,0,1) 100%);border: rgba(252,217,0,1);color: black;padding: 5px 25px !important;"  type="button" class="btn btn-primary add_folder" data-position="first_folder" data-toggle="modal" data-target="#add_folder">Add folder </button>
                  <button style="background: linear-gradient(180deg, rgba(252,217,0,1) 0%, rgba(251,196,0,1) 50%, rgba(250,174,0,1) 100%);border: rgba(252,217,0,1);color: black;padding: 5px 25px !important;" type="button" class="btn btn-primary add-card" data-name="card1" data-toggle="modal" data-target="#add_card">Add card</button>

                </div>
                <div style="display: inline-block;margin-left: 867px;margin-bottom: 19px">
                  <button style="background: linear-gradient(180deg, rgba(252,217,0,1) 0%, rgba(251,196,0,1) 50%, rgba(250,174,0,1) 100%);border: rgba(252,217,0,1);color: black;padding: 5px 25px !important;"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_first_folder">Add folder </button>
                  <button style="background: linear-gradient(180deg, rgba(252,217,0,1) 0%, rgba(251,196,0,1) 50%, rgba(250,174,0,1) 100%);border: rgba(252,217,0,1);color: black;padding: 5px 25px !important;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_second_folder">Add card</button>
                </div>
                <br>


            </div>

        </section>
        <div class="discdiv">
          <section id="testimonials" class=" folder top-collections">
            <h4 class="text-center text-uppercase">FOLDERS</h4>
            <br>
            <div class="container py-5">
          <section id="testimonials" class="top-collections">
            <h4 class="text-center text-uppercase">FOLDERS</h4>
            <br>
            <div class="container">
              <?php 
                if($row1 == 0){
                  echo ' <div class="discdiv text-center">
                          <img src="images/disc.png" class="img-responsive">
                          <p class="collect">NO FOLDERS</p>
                        </div>';
                }
                elseif($row1 >= 5){
                else{
              ?>
               <div class="owl-carousel testimonials-carousel">
                  <?php
                      while($tox1=mysqli_fetch_assoc($res1)){
                  ?>
                    <div class="testimonial-item testimonil-folder folder-item">
                      <div class="row-d" >
                         <div class="collect-card carusel-card folder-div py-2">
                             <div class="d-flex justify-content-between pl-4 pr-4" data-id='<?php  echo $tox1['id'] ?>'>
                              <a href="first_folder.php?id=<?php echo $tox1['id'] ?>" class='w-100 text-center'>
                                  <span class="nameofCollection"><?php echo $tox1['name_of_folder']; ?></span>
                              </a>
                              <span class = "del del-first" id="<?php echo $tox1['id']?>" data-toggle="modal" data-target="#delete">X</span>
                            </div>
                    <div class="testimonial-item">
                      <div class="row-d" >
                        <div class="collect-card carusel-card">
                          <div class="img-card">
                            <span class = "del del-first-folder" id="<?php echo $tox1['id']?>" data-toggle="modal" data-target="#deliteFirstFolder">X</span>
                            <a href="first_folder.php?id=<?php echo $tox1['id']?>" class = "customLink"> <img src="img/<?php echo $tox1['image']?>"></a>
                          </div>
                          <div class="description-card" style="overflow: auto">
                            <div class="d-flex justify-content-between">
                              <span class="nameofCollection"><?php echo $tox1['name_of_collection']; ?></span>
                              <div class="plus-icon">+</div>
                            </div>
                            <p  class="description"><?php echo $tox1['description']?></p>
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
                    </div>
                  <?php
                    }
                  ?>
               </div>
              <?php
                  }elseif ($row1 < 5) {
                    ?>
                    <div class="row">
                      <?php
                      while($tox1=mysqli_fetch_assoc($res1)){
                  ?>
                          <div class="owl-item active" style="width: 222px;">
                              <div class="testimonial-item folder-item">
                                  <div class="row-d">
                                      <div class="collect-card carusel-card py-2 px-2">
                                          <div class="d-flex justify-content-between ">
                                              <a href="first_folder.php?id=<?php echo $tox1['id'] ?>" class = "w-100 text-center customLink">
                                                  <span class="nameofCollection "><?php echo $tox1['name_of_folder']; ?></span>
                                              </a>
                                              <span class = "del del-first" id="<?php echo $tox1['id'] ?>" data-toggle="modal" data-target="#delete">X</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
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
        <div class="discdiv my-5">
          <section id="testimonials" class="top-collections bg-white">
            <h4 class="text-center text-uppercase">CARDS</h4>
            <br>
            <div class="container">
        <div class="discdiv mt-3">
          <section id="testimonials" class="top-collections" style="background: white">
            <h4 class="text-center text-uppercase">CARDS</h4>
            <br>
            <div class="container">
            <?php
              if($row2 == 0){
                  echo ' <div class="discdiv text-center">
                          <img src="images/small-icon.png" class="img-responsive">
                          <p class="collect">NO CARDS</p>
                        </div>';
                }
                else{
                ?>
                  <?php
                      while($tox2=mysqli_fetch_assoc($res2)){
                  ?>
                   <div class="">
                      <img src="card-editor/cards-images/<?php echo $tox2['image']?>">
                      
                   </div>
                  <?php
                    }
                }
            ?>
            </div>
        </div>

                
                  <?php
                      while($tox2=mysqli_fetch_assoc($res2)){
                  ?>
                   <div class="col-md-12">
                      <div class="row style">                     
                          <div class="col-md-12">
                              <div class="row parent">
                                  <div class="col-md-3 col-sm-12 col-xs-12 contentimage">
                                      <div class="releases-item-img">
                                          <span class = "del del-second-folder" id="<?php echo $tox2['id']?>" data-toggle="modal" data-target="#deliteSecondFolder">X</span>
                                          <a href="card.php?id=<?php echo $tox2['id']?>" class = "customLink"> <img src="img/<?php echo $tox2['image']?>"></a>
                                      </div>
                                  </div>
                                  <div class="col-md-8 col-sm-12 col-xs-12">
                                       <div class="releases-item-text">
                                            <div class="description-card" style="overflow: auto;padding: 0 0">
                                                <div class="d-flex justify-content-between">
                                                    <span class="nameofCollection"><?php echo $tox2['name_of_collection']; ?></span>
                                                </div>
                                                <br>
                                                
                                            </div>
                                            <div  class="description"><?php echo $tox2['description']?></div>
                                       </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                </div>
                  <?php
                    }
                  ?>
               
               <?php
                }
            ?>
            </div>
          </section>
        </div>
                    <!-- Modal Edite-->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <form action="add_collection_form.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                            <div class="col-md-12" >
                                    <label>Name of Collection</label>
                                    <div class="input-group">
                                        <input type="text" name="name" value="<?php echo $tox['name_of_collection'] ?>" class="form-control">
                                    </div>
                                    <br>
                                    <label>Description</label>
                                    <div class="input-group">
                                        <textarea name="desc" class="form-control"><?php echo $tox['description'] ?></textarea>
                                    </div>
                                    <br>
                                    <label>Image</label>
                                    <div class="input-group">
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                    <br>
                                    <input type="hidden" name='id' value="<?php echo $tox['id']; ?>">
                                    <input type="hidden" name='uid' value="<?php echo $_SESSION['user']; ?>">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btn_save_chenge2">Save changes</button>
                        <button type="submit" class="btn btn-primary" name="btn_save_chenge">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Modal delete td -->
          <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal fade" id="deliteFirstFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog delite_modal-p" role="document">
              
            </div>
          </div>

          
            <?php  include "modal-add-folder.php" ?>
            <?php  include "modal-add-card.php" ?>
           <div class="modal fade" id="deliteSecondFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog delite_modal-p" role="document">
              
            </div>
          </div>

            <div class="modal fade" id="add_first_folder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <form action="add_collection_form.php" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Name of Collection</label>
                        <input type="text" class="form-control" name="first_folder">
                        <br>
                         <label>Description</label>
                        <textarea name ="first_description"class="form-control"></textarea>
                        <br>
                        <label>Image</label>
                        <input type="hidden" name='id' value="<?php echo $tox['id']; ?>">
                        <input type="hidden" name='uid' value="<?php echo $_SESSION['user']; ?>">
                        <input class="form-control" type="file" name="file">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="add_first_folder" class="btn btn-primary">Add</button>
                    </div>
                  </div>
                  </form>
              
                </div>
          </div>


            <div class="modal fade" id="add_second_folder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <form action="add_collection_form.php" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Name of Collection</label>
                        <input type="text" class="form-control" name="first_folder">
                        <br>
                         <label>Description</label>
                        <textarea name ="first_description"class="form-control"></textarea>
                        <br>
                        <label>Image</label>
                        <input type="hidden" name='id' value="<?php echo $tox['id']; ?>">
                        <input type="hidden" name='uid' value="<?php echo $_SESSION['user']; ?>">
                        <input class="form-control" type="file" name="file">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="add_second_folder" class="btn btn-primary">Add</button>
                    </div>
                  </div>
                  </form>
              
                </div>
          </div>
    <?php
      include "footer.php";
    ?>
    <script src="carusel/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="carusel/js/main.js"></script>
    <script src="admin/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="admin/assets/js/plugins/bootstrap-table.js"></script>
    <script src="admin/assets/js/plugins/jquery.dataTables.min.js"></script>
    <script src="admin/assets/js/demo.js"></script>
    <script src="js/jquery.tabledit.js"></script>
    <script src="js/add-card-and-folder.js"></script>
    
    <script>
        $(document).ready(function() {

          $('.del-first').click(function(){
    <script>
        $(document).ready(function() {
          $('.del-first-folder').click(function(){
          var id = $(this).attr('id')
          var name = $(this).parents('.collect-card').find('.nameofCollection').text()
          var k = '<div class="modal-content" style="border:0"><form action="./collection_modal.php" method="POST"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="p-3"><p>Are you sure you want to delete the <b>'+name+'<b>?</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button><button type="submit" class="btn btn-danger" name="delite_btn-folder" value="'+id+'">Delete</button></div></form></div>';
          $('.delite_modal-p').html(k)
          })

           $('.del-second-folder').click(function(){
          var id = $(this).attr('id')
          var name = $(this).parents('.parent').find('.nameofCollection').text()
          var k = '<div class="modal-content" style="border:0"><form action="./collection_modal.php" method="POST"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="p-3"><p>Are you sure you want to delete the <b>'+name+'<b>?</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button><button type="submit" class="btn btn-danger" name="delite_btn-second-folder" value="'+id+'">Delete</button></div></form></div>';
          $('.delite_modal-p').html(k)
          })
        });

    </script>
</body>
</html>