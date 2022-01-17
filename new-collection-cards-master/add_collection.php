<?php
include "header.php";
include "config/con1.php";
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
	
}else{
	header('location:index.php');
}

?> 

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/custom_checklist.css">
</head>
<body>
<?php include "cookie.php"; ?>
<section class="cust">
	<div class="container">
		<h2 class="header-log">
			<center class="first-par mx-auto">Add New Collection Card</center>
		</h2>
		<div class="card-body ">
			<form method="post" enctype="multipart/form-data" id="save-filds">
				<div class="form-group">
					<label>Name of collection card</label>
					<input type="hidden" value="<?php echo $_SESSION['user']; ?>" name='user_id' >
					<input type="text" class="form-control namecoll" name="name-collection" required>
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control desc" name="description"></textarea>
	            </div>
	            <div class="form-group">
					<div class="choose_file">
			        	<label class="file_label">
				            <input type="file" name="file">
				            <i class="fas fa-upload"></i>
			        	</label>
			    	</div>
			    <span class="file-text" >Upload photo</span>
				</div>
				<button type="submit" name="add_collection" class="banner-button float-right save">Save</button>
			</form>
			<br>
			<br>
			<div class="mm">
				
			</div>
			<br>
		</div>
	</div>
</section>

<?php
include "footer.php";
?>
<script>
	$('.choose_file .file_label input').bind('change', function () {
        var filename = $(this).val();
       $(".file-text").text(filename.replace("C:\\fakepath\\", ""));
    })	
	    
	$('#save-filds').on('submit', function(event){

        event.preventDefault();
		$.ajax({
		  url:"add_collection_form.php",
	      method:"POST",
	      data:new FormData(this),
	      contentType:false,
	      cache:false,
	      processData:false,
		  success:function(data)
	      {
	      	//alert(data)
	      	 $(".mm").html(data);
	      }
		});
	})

</script>
</body>
</html>