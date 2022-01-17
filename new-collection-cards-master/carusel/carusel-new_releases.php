<!-- ======= NEW RELEASES ======= -->
    <section id="testimonials" class="top-collections releases">
<h2 class="text-center text-uppercase"><a href="releases.php">new releases</a></h2>

      <div class="container">
       
        <div class="owl-carousel testimonials-carousel">
          <?php
           include "config/con1.php";
        $sql="SELECT re.name_of_collection, re.year_of_releases, re.sport_type, re.image, sp.sport_type, sp.sport_logo AS 'sport_logo' FROM collections re, sports_type sp WHERE sp.sport_type=re.sport_type";
        $result=mysqli_query($con, $sql);
        while($row=mysqli_fetch_assoc($result)){
          echo '<div class="testimonial-item">
          <div class="row-d" >
                <div class="collect-card carusel-card">
                <div class="img-card" style="height:230px">
                    <img src="images_realeses/'.$row['image'].'"> 
                </div>
                <div class="description-card">
                  <div class="d-flex justify-content-between">
                      <span>'.$row['name_of_collection'].'</span>
                  </div>
                  
                </div>
                <div class="d-flex collector-cad bd-highlight mb-3">
                    <div class="author-avatar p-2 bd-highlight" style="background: url(admin/sport_icons/'.$row['sport_logo'].'); background-size:cover"></div>
                    <div class="p-2 bd-highlight">
                        <p class="author-name">Year of release '.$row['year_of_releases'].'</p>
                        
                    </div>
                </div>
            </div>
            </div>
          </div>';

        }

          ?>

          <!-- <div class="testimonial-item">
          <div class="row-d" >
                <div class="collect-card carusel-card">
                <div class="img-card">
                    <img src="images/11.png"> 
                </div>
                <div class="description-card">
                  <div class="d-flex justify-content-between">
                      <span>Description</span>
                  </div>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>
                </div>
                <div class="d-flex collector-cad bd-highlight mb-3">
                    <div class="author-avatar p-2 bd-highlight"></div>
                    <div class="p-2 bd-highlight">
                        <p class="author-name">Author name</p>
                        <p class="country">Country</p>
                    </div>
                </div>
            </div>
            </div>
          </div>
 -->
          <!-- <div class="testimonial-item">
          <div class="row-d">
                <div class="collect-card carusel-card">
            <div class="img-card">
                    <img src="images/22.png"> 
                </div>
                <div class="description-card ">
                  <div class="d-flex justify-content-between">
                      <span>Description</span>
                  </div>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>
                </div>
                <div class="d-flex collector-cad bd-highlight mb-3">
                    <div class="author-avatar p-2 bd-highlight"></div>
                    <div class="p-2 bd-highlight">
                        <p class="author-name">Author name</p>
                        <p class="country">Country</p>
                    </div>
                </div>
            </div></div>
          </div> -->

          <!-- <div class="testimonial-item">
          <div class="row-d">
                <div class="collect-card carusel-card">
            <div class="img-card">
                    <img src="images/33.png"> 
                </div>
                <div class="description-card">
                  <div class="d-flex justify-content-between">
                      <span>Description</span>
                  </div>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>
                </div>
                <div class="d-flex collector-cad bd-highlight mb-3">
                    <div class="author-avatar p-2 bd-highlight"></div>
                    <div class="p-2 bd-highlight">
                        <p class="author-name">Author name</p> 

                        <p class="country">Country</p>
                    </div>
                </div>
            </div></div>
          </div> -->

         <!--  <div class="testimonial-item">
          <div class=" row-d">
                <div class="collect-card carusel-card">
            <div class="img-card">
                    <img src="images/44.png"> 
                </div>
                <div class="description-card">
                  <div class="d-flex justify-content-between">
                      <span>Description</span>
                  </div>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>
                </div>
                <div class="d-flex collector-cad bd-highlight mb-3">
                    <div class="author-avatar p-2 bd-highlight"></div>
                    <div class="p-2 bd-highlight">
                        <p class="author-name">Author name</p>
                        <p class="country">Country</p>
                    </div>
                </div>
            </div></div>
            
          </div>
 -->
          <!-- <div class="testimonial-item">
          <div class="row-d">
                <div class="collect-card carusel-card">
            <div class="img-card">
                    <img src="images/44.png"> 
                </div>
                <div class="description-card">
                  <div class="d-flex justify-content-between">
                      <span>Description</span>
                  </div>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi laudantium </p>
                </div>
                <div class="d-flex collector-cad bd-highlight mb-3">
                    <div class="author-avatar p-2 bd-highlight"></div>
                    <div class="p-2 bd-highlight">
                        <p class="author-name">Author name</p>
                        <p class="country">Country</p>
                    </div>
                </div>
            </div></div>
            
          </div> -->

        </div>

      </div>
    </section>