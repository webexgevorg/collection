<?php
include "header.php";
include "config/con1.php";
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
	
}else{
	header('location:index.php');
}
$cbase = "SELECT * FROM `collections` ORDER BY `name_of_collection` ASC";
$base = mysqli_query($con, $cbase);

?> 

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/custom_checklist.css">
<!--------------------------------->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<style>
.select2-container .select2-selection--single{
	height: 38px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
	line-height: 38px;
}
#a{
	display: none;
}
.select2-container--default .select2-selection--single {
    background: #b4dce5fc;
}
</style>

</head>
<body>
<?php include "cookie.php"; ?>
<section class="cust">
	<div class="container">
		<h2 class="header-log">
			<center class="first-par mx-auto">Import Personal Checklist</center>
		</h2>
		<div class="card-body">
			<form method="post" id="import_excel_form" enctype="multipart/form-data" >
				<div class="form-group">
					<label>Name of collection</label>
					<input type="hidden" value="<?php echo $_SESSION['user']; ?>" name='user_id' >
					<input type="text" class="form-control namecoll" name="name-collection" > <!-- required -->
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control desc" name="description"></textarea>
	            </div>
	            <div class="form-group">
					<div class="choose_file">
			        	<label class="file_label">
				            <input type="file" name="file" > <!-- required -->
				            <i class="fas fa-upload"></i>
			        	</label>
			    	</div>
			    <span class="file-text" >Upload photo</span>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-4">
							<label>Title-1</label>
							<input type="text" class="form-control t1" name="title1" >
						</div>
						<div class="col-md-4">
							<label>Title-2</label>
							<input type="text" class="form-control t2" name="title2" >
						</div>
						<div class="col-md-4">
							<label>Title-3</label>
							<input type="text" class="form-control t3" name="title3" >
						</div>
					</div>
				</div>
				<?php 
		            include "import/import_excel_to_mysql.php"; 
        		?>
			</form>
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
    $('#import_excel_form').on('submit', function(event){
    event.preventDefault();
    var opt_val=$("#sel_rel_name option:selected").val(); 
    
    $("#sel_rel_name").val(opt_val)
    $.ajax({
      url:"import/personal_import.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
        $('#import').css('color', '#133690');

      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Import');
      }
    })
  });
</script>
</body>
</html>