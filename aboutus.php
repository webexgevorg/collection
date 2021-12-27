<?php 	
    include "header.php";
    include "config/con1.php";
    $sql1="SELECT * FROM aboutus WHERE id=1";
    $query1=mysqli_query($con, $sql1);
    $row1=mysqli_fetch_assoc($query1);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/my_checklist.css">

<style>
    #sec{
        height: 100px;
    }
    @media only screen and (max-width: 1000px) {
        #sec{
            height: 30px;
        }
    }
</style>

</head>

<body>
    <?php 
    include "cookie.php";
  

?>
<section id="sec"></section>
<section class="aboutus" style="min-height: 344px">
    <div class="container" style="min-height: 344px; margin: 24px auto 0">
        <div class="text-center">
            <h3 class="fw-bold" style="color:#133960;" id="title"><?php echo $row1['title']; ?></h3>
        </div>
        <p id="discription"><?php echo $row1['discription']; ?></p>
        <input type="hidden" name="" id="id" value="<?php  echo $row1['id'];?>">
    </div>          
</section>

<footer>
    <?php
include "footer.php";
?>
</footer>

</body>