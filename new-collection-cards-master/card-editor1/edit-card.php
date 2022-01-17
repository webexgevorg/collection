<?php
include "header.php";
include "config/con1.php";
// if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
	
// }else{
// 	header('location:index.php');
// }

?> 

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script> 
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.16/fabric.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Base64/1.1.0/base64.js" integrity="sha512-S1ZwdmlDDaFLXAWsXRXKnbkNNpmlWFlp5QEsJeiUQnzeLpzp1vxJyMdpCSAgEoAJY21LpQfCyYQ+z+W+1F84Kw==" crossorigin="anonymous"></script> -->
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="card-editor/css/file.css">

</head>
<body>
<?php include "cookie.php";
      include "card-editor/newfile.php";
 ?>


<?php
include "footer.php";
?>
</body>
</html>