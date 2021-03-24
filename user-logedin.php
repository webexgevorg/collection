<?php
if(!empty($_COOKIE['user']) || !empty($_SESSION['user'])){ // qcume er profile-page.php ejy
}
else{
  header('location:index.php');
  exit();
}
?>