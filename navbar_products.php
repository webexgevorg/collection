<?php
session_start();
include "config/con1.php";

if(isset($_POST['product'])){
	$product=mysqli_real_escape_string($con,$_POST['product']);
	$sport_type=mysqli_real_escape_string($con,$_POST['sport_type']);
	$year_prod=mysqli_real_escape_string($con,$_POST['year_prod']);
	    $_SESSION['product']=$product;
		$_SESSION['sport_type']=$sport_type;
		$_SESSION['year_prod']=$year_prod;
// echo $product.'-'.$sport_type.'-'.$year_prod;
	if($product=="set"){
		?>
<script type="text/javascript">location.href='sets.php'</script>
		<?php
	}
	else{
		?>
<script type="text/javascript">location.href='checklist.php'</script>
		<?php
	}

}



?>