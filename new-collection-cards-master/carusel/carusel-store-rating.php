 <!-- ------------------section store rating--------------- -->
 <?php
 $sql = "SELECT * FROM store_rating";
 $res=mysqli_query($con, $sql);
 $tox = mysqli_fetch_assoc($res);
 ?>
<section id="clients" class="wow fadeInUp">
<h2 class="text-center text-uppercase"><?php echo $tox['title']?></h2>

    <div class="container">
        <div class="row row-collection owl-carousel clients-carousel">
            <?php
                $sql = "SELECT * FROM store_rating";
                $res=mysqli_query($con, $sql);
                while($row=mysqli_fetch_assoc($res)){
                    echo "<div class='row-d-collector'>
                                <div class='autor-img1 text-center'><img src='images/".$row['image']."' class='logo11'></div>
                                <div class='collector-sec-rating text-center' style='margin-top: 60px'>
                                    <div class=''>
                                        <span class='star1'><i class='fa fa-star-o'></i></span>
                                        <span class='star1'><i class='fa fa-star-o'></i></span>
                                        <span class='star1'><i class='fa fa-star-o'></i></span>
                                        <span class='star1'><i class='fa fa-star-o'></i></span>
                                        <span class='star1'><i class='fa fa-star-o'></i></span>
                                    </div>
                                    <p class='collector-sec-author-name' >".$row['intotitle1']."</p>
                                    <p class='collector-sec-country'>".$row['intotitle2']."</p>
                                </div>
                                <div class='collector-sec-text text-justify'>
                                   <p>".$row['text']."</p> 
                                </div>
                            </div>";
                }
            ?>

        </div>
    </div>
   
</section>