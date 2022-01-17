<?php
include "../config/con1.php";
	function redirect(){

	    header('location:index.php');
		exit();
	}
	if(!isset($_GET['email']) || !isset($_GET['token'])){
		redirect();

	}
	else{
        $hash=$_GET['email'];
        $hashed_email = hash('sha256', "narine@webex.am");
        if($hashed_email== $hash){
            $email='narine@webex.am';
            
		$email= mysqli_real_escape_string($con, $email);
		$token= mysqli_real_escape_string($con, $_GET['token']);
		
		$sql="SELECT id FROM admin WHERE email='$email' AND token='$token'";
		$result=mysqli_query($con, $sql);
		if(mysqli_num_rows($result) > 0){
		   
			$sql_update="UPDATE admin SET token='' WHERE email='$email'";
              	if(mysqli_query($con, $sql_update)){
              	 //   header('location:index.php');
              	}
		}
	
		
		else{
			redirect();
	    }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"> -->
    <link rel="icon" type="../image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Followmycollection</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      
    <!-- <meta property="og:site_name" content="Creative Tim" /> -->
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>-->
    
    </head>

    <body>
     
    <div class="wrapper wrapper-full-page">
        
        <!-- End Navbar -->
        <div class="full-page  section-image" data-color="black" data-image="../images/banner.jpg" ;>
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                        <!-- <form class="form" method="" action=""> -->
                            <div class="card card-login card-hidden">
                                <div class="card-header ">
                                    <h3 class="header text-center">Change Password </h3>
                                </div>
                                <div class="card-body ">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" placeholder="Enter login" class="form-control pass">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm password</label>
                                            <input type="password" placeholder="Password" class="form-control confirm_pass">
                                        </div>
                                        <div id="message_text" class="text-center"></div>
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
                                    <button id="add_new_password" class="btn btn-warning btn-wd login">Change password</button>
                                </div>
                                
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
<footer class="footer">
                                        <div class="container">
                                            <nav>
                                                
                                                <p class="copyright text-center">
                                                   &copy WEBEX TECHNOLOGIES LLC &copy 2005-
                                                    <script>
                                                        document.write(new Date().getFullYear())
                                                    </script>
                                                </p>
                                            </nav>
                                        </div>
                                    </footer>
                                </div>
                           
                            

<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/bootstrap-table.js"></script>
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<script src="assets/js/demo.js"></script>
<script src="my_js/login.js"></script>

</body>

</html>
