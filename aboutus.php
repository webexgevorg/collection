<?php 	
 include "header.php";
 include "config/con1.php";
 echo $sql1="SELECT * FROM aboutus WHERE id=1";
  $query1=mysqli_query($con, $sql1);
  $row1=mysqli_fetch_assoc($query1);
 ?>

</head>
</head>
<body>
    <?php 
    include "cookie.php";
  

?>

<section class="aboutus" style="margin-top:100px;">
    <div class="container">
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