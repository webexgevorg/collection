<?php
      
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
        	if(!empty($_COOKIE['user'])){
                $user_id=$_COOKIE['user'];
	        }
	        if(!empty($_SESSION['user'])){
                $user_id=$_SESSION['user'];
	        }
          
            include "navbarregister.php";
        }else{
            
            include "navbar.php";
  
        }
    
?>