<?php
include "header.php";
require "config/con1.php";

$sql_banner = "SELECT * FROM banner";
$result_banner = mysqli_query($con, $sql_banner);

    if($result_banner) {
        $row_banner = mysqli_fetch_assoc($result_banner);
    }else {
        echo "tvyalner@ bacakayum en";
    }

?>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
<!-- <link href="carusel/vendor/animate.css/animate.min.css" rel="stylesheet"> -->

  <link href="carusel/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
 
  <link href="carusel/css/style.css" rel="stylesheet">
</head>
<body class="page_fix">
    <?php include "cookie.php";?>
<section id="banner" style="background: url('images_banner/<?= $row_banner['image'] ?>')">
    <div class="container">
        <div class="banner-text">
           <h1><?= $row_banner['tittle'] ?></h1>
           <p><?= $row_banner['description'] ?></p>
           <button class="banner-button">More...</button>
        </div>
    </div>
</section>
   <?php
       include "carusel/carusel-new_releases.php";
       include "carusel/carusel-top-20-collections.php";
       include "carusel/carusel-top-20-collectors.php";
       include "carusel/carusel-store-rating.php";
   
       include "footer.php";
   ?>
<script src="carusel/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="carusel/js/main.js"></script>
</body>
</html>