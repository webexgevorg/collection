<?php
include "config/con1.php";
include "header.php";
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    $id = $_SESSION['user'];

    
}else{
    header('location:index.php');
}
if(isset($_GET['id'])){
    $realise_id = mysqli_real_escape_string($con, $_GET['id']);
    $sql = "SELECT * FROM `collection_second_folder` WHERE id = '$realise_id'";
    $rezult = mysqli_query($con, $sql);
    $tox = mysqli_fetch_assoc($rezult);
    
}

   
?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/profile-page.css">
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
    /*.social-div>a {
    color: #133960;
    }*/
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
              
                <br>


            </div>

        </section>
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
                        <button type="submit" class="btn btn-primary" name="btn_card">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Modal delete td -->     
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

</body>
</html>