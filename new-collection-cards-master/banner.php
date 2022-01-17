<?php
 $sql_banner="SELECT * FROM banner";
 $res_banner=mysqli_query($con, $sql_banner);
 $row=mysqli_fetch_assoc($res_banner);
echo '<section id="banner" style="background: url(images_banner/'.$row['image'].')">
    <div class="container">
        <div class="banner-text">
           <h1>'.$row['tittle'].'</h1>
           <p>'.$row['description'].'</p>
           <button class="banner-button">More...</button>
        </div>
    </div>
</section>';


?>