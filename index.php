<?php
include "header.php";
?>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
<!-- ---------------------------------- -->
<!-- <link href="carusel/vendor/animate.css/animate.min.css" rel="stylesheet"> -->

  <link href="carusel/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
 
  <link href="carusel/css/style.css" rel="stylesheet">
</head>
<body class="page_fix">
    <?php include "cookie.php";?>
<section id="banner">
    <div class="container">
        <div class="banner-text">
           <h1>Lorem, ipsum dolor sit amet </h1>
           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus suscipit quasi non tenetur officiis, sapiente ut voluptatum totam libero distinctio, tempora doloribus voluptas vitae, laborum odio quia dicta? Perspiciatis, dolores.</p>
           <button class="banner-button">More...</button>
        </div>
    </div>
</section>
<!-- ------------------------section top 20 collections---------------------------------- -->


   <?php
       include "carusel/carusel-top-20-collections.php";
       include "carusel/carusel-top-20-collectors.php";
       include "carusel/carusel-new_releases.php";
       include "carusel/carusel-store-rating.php";
       
    ?> 
<!-- ------------------------new releases---------------------------------- -->

<!--<section id="new-collection">-->
<!--    <div class="container">-->
<!--        <h2 class="text-center text-uppercase">new collection</h2>-->
<!--        <div class="row row-collection">-->
<!--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 row-d" >-->
<!--                <div class="collect-card">-->
<!--                <div class="img-card">-->
<!--                    <img src="images/11.png"> -->
<!--                </div>-->
<!--                <div class="description-card">-->
<!--                  <div class="d-flex justify-content-between">-->
<!--                      <span>Description</span>-->
<!--                  </div>-->
<!--                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>-->
<!--                </div>-->
<!--                <div class="d-flex collector-cad bd-highlight mb-3">-->
<!--                    <div class="author-avatar p-2 bd-highlight"></div>-->
<!--                    <div class="p-2 bd-highlight">-->
<!--                        <p class="author-name">Author name</p>-->
<!--                        <p class="country">Country</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            </div>-->
<!--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 row-d"><div class="collect-card">-->
<!--            <div class="img-card">-->
<!--                    <img src="images/22.png"> -->
<!--                </div>-->
<!--                <div class="description-card">-->
<!--                  <div class="d-flex justify-content-between">-->
<!--                      <span>Description</span>-->
<!--                  </div>-->
<!--                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>-->
<!--                </div>-->
<!--                <div class="d-flex collector-cad bd-highlight mb-3">-->
<!--                    <div class="author-avatar p-2 bd-highlight"></div>-->
<!--                    <div class="p-2 bd-highlight">-->
<!--                        <p class="author-name">Author name</p>-->
<!--                        <p class="country">Country</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div></div>-->
<!--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 row-d"><div class="collect-card">-->
<!--            <div class="img-card">-->
<!--                    <img src="images/33.png"> -->
<!--                </div>-->
<!--                <div class="description-card">-->
<!--                  <div class="d-flex justify-content-between">-->
<!--                      <span>Description</span>-->
<!--                  </div>-->
<!--                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>-->
<!--                </div>-->
<!--                <div class="d-flex collector-cad bd-highlight mb-3">-->
<!--                    <div class="author-avatar p-2 bd-highlight"></div>-->
<!--                    <div class="p-2 bd-highlight">-->
<!--                        <p class="author-name">Author name</p>-->
<!--                        <p class="country">Country</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div></div>-->
<!--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 row-d"><div class="collect-card">-->
<!--            <div class="img-card">-->
<!--                    <img src="images/44.png"> -->
<!--                </div>-->
<!--                <div class="description-card">-->
<!--                  <div class="d-flex justify-content-between">-->
<!--                      <span>Description</span>-->
<!--                  </div>-->
<!--                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>-->
<!--                </div>-->
<!--                <div class="d-flex collector-cad bd-highlight mb-3">-->
<!--                    <div class="author-avatar p-2 bd-highlight"></div>-->
<!--                    <div class="p-2 bd-highlight">-->
<!--                        <p class="author-name">Author name</p>-->
<!--                        <p class="country">Country</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div></div>-->
<!--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 row-d"><div class="collect-card">-->
<!--            <div class="img-card">-->
<!--                    <img src="images/55.png"> -->
<!--                </div>-->
<!--                <div class="description-card">-->
<!--                  <div class="d-flex justify-content-between">-->
<!--                      <span>Description</span>-->
<!--                  </div>-->
<!--                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>-->
<!--                </div>-->
<!--                <div class="d-flex collector-cad bd-highlight mb-3">-->
<!--                    <div class="author-avatar p-2 bd-highlight"></div>-->
<!--                    <div class="p-2 bd-highlight">-->
<!--                        <p class="author-name">Author name</p>-->
<!--                        <p class="country">Country</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div></div>-->
<!--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 row-d"><div class="collect-card">-->
<!--            <div class="img-card">-->
<!--                    <img src="images/66.png"> -->
<!--                </div>-->
<!--                <div class="description-card">-->
<!--                  <div class="d-flex justify-content-between">-->
<!--                      <span>Description</span>-->
<!--                  </div>-->
<!--                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>-->
<!--                </div>-->
<!--                <div class="d-flex collector-cad bd-highlight mb-3">-->
<!--                    <div class="author-avatar p-2 bd-highlight"></div>-->
<!--                    <div class="p-2 bd-highlight">-->
<!--                        <p class="author-name">Author name</p>-->
<!--                        <p class="country">Country</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div></div>-->
<!--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 row-d"><div class="collect-card">-->
<!--            <div class="img-card">-->
<!--                    <img src="images/77.png"> -->
<!--                </div>-->
<!--                <div class="description-card">-->
<!--                  <div class="d-flex justify-content-between">-->
<!--                      <span>Description</span>-->
<!--                  </div>-->
<!--                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>-->
<!--                </div>-->
<!--                <div class="d-flex collector-cad bd-highlight mb-3">-->
<!--                    <div class="author-avatar p-2 bd-highlight"></div>-->
<!--                    <div class="p-2 bd-highlight">-->
<!--                        <p class="author-name">Author name</p>-->
<!--                        <p class="country">Country</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div></div>-->
<!--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 row-d"><div class="collect-card">-->
<!--            <div class="img-card">-->
<!--                    <img src="images/88.png"> -->
<!--                </div>-->
<!--                <div class="description-card">-->
<!--                  <div class="d-flex justify-content-between">-->
<!--                      <span>Description</span>-->
<!--                  </div>-->
<!--                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>-->
<!--                </div>-->
<!--                <div class="d-flex collector-cad bd-highlight mb-3">-->
<!--                    <div class="author-avatar p-2 bd-highlight"></div>-->
<!--                    <div class="p-2 bd-highlight">-->
<!--                        <p class="author-name">Author name</p>-->
<!--                        <p class="country">Country</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

   <?php
       include "footer.php";
   ?>
<script src="carusel/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="carusel/js/main.js"></script>
</body>
</html>