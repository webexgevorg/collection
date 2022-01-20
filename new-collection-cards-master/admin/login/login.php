<?php 

           include "../heder.php";
?>

    <body>
     
    <div class="wrapper wrapper-full-page">
        
        <!-- End Navbar -->
        <div class="full-page  section-image" data-color="black" data-image="../../images/banner.jpg" ;>
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                        <!-- <form class="form" method="" action=""> -->
                            <div class="card card-login card-hidden">
                                <div class="card-header ">
                                    <h3 class="header text-center">Login</h3>
                                </div>
                                <div class="card-body ">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Login</label>
                                            <input type="text" placeholder="Enter login" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" placeholder="Password" class="form-control">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked>
                                                    <span class="form-check-sign"></span>
                                                    Subscribe to newsletter
                                                </label>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <button type="submit" class="btn btn-warning btn-wd">Login</button>
                                </div>
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
 <?php 
include "../footer.php";
 ?>
    </div>
    
</body>
<!--   Core JS Files   -->

<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>


</html>
