<?php
include "header.php";
include "config/con1.php";
$href='';
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
			<center class="first-par mx-auto">Add New Personal Checklist</center>
		</h2>
		<div class="card-body ">
			<form method="post" enctype="multipart/form-data" id="save-filds">
				<div class="form-group">
					<label>Name of collection</label>
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
				            <input class="img" type="file" name="file" required>
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
				<div class="form-group p-1">
				        <div class="form-group">
							<div class="choose_file">
						      	<label class="file_label w-auto" >
							        <input class="excel" type="file" name="import_excel">
							        <i class="fas fa-upload"></i>
						       	</label>
						    </div>
						   	<span class="excel-text" >Upload your own checklist</span>
						</div>
				         <div class="container">
				        	<small><sup>*</sup>Please note, that your checklist should be with xlsx, xls, ods, or csv formats. You can download template from here 
				        			<a class="text-info border border-info btn p-1 btn-sm" href='import/table.xlsx'> .xlsx </a>,&nbsp
					                <a class="text-info border border-info btn p-1 btn-sm" href='import/table.xls'> .xls </a>,&nbsp
					                <a class="text-info border border-info btn p-1 btn-sm" href='import/table.csv'> .csv </a>&nbsp
					                or&nbsp
					                <a class="text-info border border-info btn p-1 btn-sm" href='import/table.ods'> .ods </a>
					        </small>
					            
				        </div> 
				    <div id="message" class="mt-1"></div>
				</div>  
				<div class="row">
					<div class="err_msg col-md-6 col-sm-12"></div>
					<div class="col-md-6 col-sm-12">
						<button type="submit" name="btn_personal_edit[]" value='0' class="banner-button save-title float-right pt-1">Save</button>
						<div class="alert alert-success float-right mr-5 tstitle">
							Successfully added checklist.<?php echo $href; ?>
							<span class="msg1"></span>
							<input type="hidden" class="href_value" value="">
						</div>
					</div>
				</div>
				<input type="hidden" name="hid_val" class="hid_val" value="0">
				<center>
					<div class="gits pt-5"></div>
				</center>
				<div class="clone_select">
					<h5 class="number" style="color:#3b6692!important;letter-spacing: 3px;"><center class="first-par mx-auto pt-3">Card-1</center></h5>
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<label>Base Checklist</label><span class="float-right mr-5 text-light bg-info hrf"></span>
							<select class="form-control select2 sel bname" name="basechecklist_sel[]" >
								<option selected="true" value='0'></option>
								<?php
								while($tox=mysqli_fetch_assoc($base)){
								?>
								<option class="opt1" value='<?php echo $tox['id'] ?>' ><?php echo $tox['name_of_collection']?></option>
								<?php
								}
								?>
							</select>
							<input type="hidden" class="noc" name="rid[]">
						</div>
						<div class="col-md-6 col-sm-12">
							<label>Sport type</label>
							<select class="form-control select2 sel sport_type" name="sport_type_sel[]" >
								<option selected="true" value='0'></option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-12">
			                
						    <label>Set Type</label>
							<select class="form-control select2 sel set_type" name="set_type_sel[]" >
								<option selected="true" value='0'></option>
							</select>
						</div>
						<div class="col-md-6 col-sm-12">
							<label>Card number</label>
							<select class="form-control select2 sel card_number" name="card_number_sel[]" >
								<option selected="true" value='0'></option>
						    </select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<label>Card Name</label>
							<select class="form-control select2 sel card_name" name="card_name_sel[]" >
								<option selected="true" value='0'></option>
							</select>
						</div>
						<div class="col-md-6 col-sm-12">
			                <label>Team</label>
							<select class="form-control select2 sel team" name="team_sel[]" >
								<option selected="true" value='0'></option>
						    </select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-12">
			                <label>Parallel</label>
							<select class="form-control select2 sel parallel" name="parallel_sel[]">
								<option selected="true" value='0'></option>
						    </select>
						</div>
						<div class="col-md-6 col-sm-12">
							<label>Print run</label>
							<select class="form-control select2 sel print_run" name="print_run_sel[]">
								<option selected="true" value='0'></option>
							</select>
						</div>
					</div>
					 <div class="row ">
						<div class="col-md-6 col-sm-12 dn1">
							<div class="form-group dt1">
								<label>Title-1</label>
								<input type="text" class="form-control t1" >
							</div>
						</div>
						<div class="col-md-6 col-sm-12 dn1">
							<div class="form-group">
								<label>Description-1</label>
								<input type="text" class="form-control des t1" name="description1[]">
							</div>
						</div>
					</div>
					<div class="row ">
						<div class="col-md-6 col-sm-12 dn2">
							<div class="form-group dt2 ">
								<label>Title-2</label>
								<input type="text" class="form-control t1">
							</div>
						</div>
						<div class="col-md-6 col-sm-12 dn2">
							<div class="form-group">
								<label>Description-2</label>
								<input type="text" class="form-control des t1" name="description2[]">
							</div>
						</div>
					</div>
					<div class="row ">
						<div class="col-md-6 col-sm-12 dn3">
							<div class="form-group dt3">
								<label>Title-3</label>
								<input type="text" class="form-control t1">
							</div>
						</div> 
						<div class="col-md-6 col-sm-12 dn3">
							<div class="form-group">
								<label>Description-3</label>
								<input type="text" class="form-control des t1" name="description3[]">
							</div>
						</div>
					</div> 

				</div>
				<hr>
				<button type="submit" name="btn_personal[]" class="banner-button float-right save">Save</button>
			</form>
			<button class="add-more-button float-left" id="add">
				<div class="mt-0 mr-1 plus-icon float-left">+</div>Add more
			</button>
			<div class="ee">
				<div class="text-success ">
					You have successfully added checklist
					<br>
					<span class="msg2"></span>
				</div>
			</div>
			<br>
		</div>
	</div>
</section>

<?php
include "footer.php";
?>
<script>
	$('.choose_file .file_label .img').bind('change', function () {
        var filename = $(this).val();
       $(".file-text").text(filename.replace("C:\\fakepath\\", ""));
    })
    $('.choose_file .file_label .excel').bind('change', function () {
        var filename = $(this).val();
       $(".excel-text").text(filename.replace("C:\\fakepath\\", ""));
    })
    $('.t1').keyup(function(){
    	var t1 = $('.t1').val()
    	if(t1.length > 0){
			$('.dn1').css('display','block');
		    $('.dt1 input').attr('disabled','true')
		    $('.dt1 input').val(t1)
    	}else{
    		$('.dn1').css('display','none');
    	}
	    
    })
    $('.t2').keyup(function(){
    	var t2 = $('.t2').val()
    	if(t2.length > 0){
			$('.dn2').css('display','block');
		    $('.dt2 input').attr('disabled','true')
		    $('.dt2 input').val(t2)
    	}else{
    		$('.dn2').css('display','none');
    	}
    })
    $('.t3').keyup(function(){
    	var t3 = $('.t3').val()
		if(t3.length > 0){
			$('.dn3').css('display','block');
		    $('.dt3 input').attr('disabled','true')
		    $('.dt3 input').val(t3)
    	}else{
    		$('.dn3').css('display','none');
    	}
	    
    })	
	    
    
    $('.select2').select2();
    var tiv = 1
$(document).on('click', '#add', function () {
	
	$('.sel').select2('destroy')
	$('.sel')
	    .removeAttr('data-live-search')
	    .removeAttr('data-select2-id')
	    .removeAttr('aria-hidden')
	    .removeAttr('tabindex');

	    var $clone_select=$(this).parent().find('.clone_select').last(true)
	    var $clone_select_is_cloned=$clone_select.clone(true)
	        $clone_select.after($clone_select_is_cloned)

	    $('.sel').select2()
	    
	    var t = $(this).parent().find('.clone_select:last .opt1').attr('data-select2-id')*1
	    v=Math.floor(Math.random() * 999999);
	    $(this).parent().find('.clone_select:last .opt1').attr('data-select2-id', function(i) {
	     ++i; // Увеличим на 1, т.к. отсчет идет с 0
	     return  i + v; 
	   });

	    $(this).parent().find('.clone_select:last .sport_type').empty()
		$(this).parent().find('.clone_select:last .set_type').empty()
		$(this).parent().find('.clone_select:last .card_number').empty()
		$(this).parent().find('.clone_select:last .card_name').empty()
		$(this).parent().find('.clone_select:last .team').empty()
		$(this).parent().find('.clone_select:last .parallel').empty()
		$(this).parent().find('.clone_select:last .print_run').empty()
	    
	   	tiv++
	   	$(this).parent().find('.clone_select:last .number').remove()
	    $clone_select.append('<hr><h5 style="color:#3b6692!important;letter-spacing: 3px;"><center class="first-par mx-auto">Card-'+tiv+'</center></h5><hr>')
	    if($('.t1').val().length > 0){
	    	$('.dn1').css('display','block');
	    	$('.dt1 input').attr('disabled','true')
	    	$('.dt1 input').val($('.t1').val())
	    }
	    if($('.t2').val().length > 0){
	    	$('.dn2').css('display','block');
	    	$('.dt2 input').attr('disabled','true')
	    	$('.dt2 input').val($('.t2').val())
	    }
	    if($('.t3').val().length > 0){
	    	$('.dn3').css('display','block');
	    	$('.dt3 input').attr('disabled','true')
	    	$('.dt3 input').val($('.t3').val())
	    }
});
	$('#save-filds').on('submit', function(event){

        event.preventDefault();
		$.ajax({
		  url:"import/personal_form.php",
	      method:"POST",
	      data:new FormData(this),
	      contentType:false,
	      cache:false,
	      processData:false,
		  success:function(data)
	      {
	      	//location.href="personal_checklist.php";
	      	$('.err_msg').html(data)
	      }
		});
	})

	$('.bname').bind('change', function(){
		var k = $(this).val()
		$.post(
			"personal_form.php",
			{bbid:k}
		)
		$('.hrfa').attr('href','base_checklist.php?id='+k+'');
		$('.hrfa').css('display','block')

		$(this).parents('.row').find('.noc').val(k)
		$(this).parents('.clone_select').find('.set_type').empty()
		$(this).parents('.clone_select').find('.card_number').empty()
		$(this).parents('.clone_select').find('.card_name').empty()
		$(this).parents('.clone_select').find('.team').empty()
		$(this).parents('.clone_select').find('.parallel').empty()
		$(this).parents('.clone_select').find('.print_run').empty()
		var sport_type = $(this).parents('.clone_select').find('.sport_type')
		var set_type = $(this).parents('.clone_select').find('.set_type')

		$.post(
			"personal2.php",
			{k:k},
			function(ard){
				set_type.html("<option selected='true' value='0'></option>"+ard)

			}
		)
		$.post(
			"personal2.php",
			{sport_type:k},
			function(ard){
				sport_type.html(ard)
			}
		)
	})
	$('.set_type').change(function(){
		var k = $(this).val()
		var rid=$('.bname').val()
		$(this).parents('.clone_select').find('.card_number').empty()
		$(this).parents('.clone_select').find('.card_name').empty()
		$(this).parents('.clone_select').find('.team').empty()
		$(this).parents('.clone_select').find('.parallel').empty()
		$(this).parents('.clone_select').find('.print_run').empty()
		var card_number = $(this).parents('.clone_select').find('.card_number')
		$.post(
			"personal2.php",
			{id_settype1:k,rid:rid},
			function(ard){
				card_number.html("<option selected='true' value='0'></option>"+ard)
			}
		)
		
	})
	$('.card_number').change(function(){
		var k = $(this).val()
		var rid=$('.bname').val()
		$(this).parents('.clone_select').find('.card_name').empty()
		$(this).parents('.clone_select').find('.team').empty()
		$(this).parents('.clone_select').find('.parallel').empty()
		$(this).parents('.clone_select').find('.print_run').empty()
		var card_name = $(this).parents('.clone_select').find('.card_name')
		$.post(
			"personal2.php",
			{id_settype2:k,rid:rid},
			function(ard){
				card_name.html("<option selected='true' value='0'></option>"+ard)
			}
		)
	})
	$('.card_name').change(function(){
		var k = $(this).val()
		var rid=$('.bname').val()
		$(this).parents('.clone_select').find('.team').empty()
		$(this).parents('.clone_select').find('.parallel').empty()
		$(this).parents('.clone_select').find('.print_run').empty()
		var team = $(this).parents('.clone_select').find('.team')
		$.post(
			"personal2.php",
			{id_settype3:k,rid:rid},
			function(ard){
				team.html("<option selected='true' value='0'></option>"+ard)
			}
		)
	})
	$('.team').change(function(){
		var k = $(this).val()
		var rid = $(this).parents('.clone_select').find('.bname').val()
		var card_name = $(this).parents('.clone_select').find('.card_name').val()
		var set_type = $(this).parents('.clone_select').find('.set_type').val()
		$(this).parents('.clone_select').find('.parallel').empty()
		$(this).parents('.clone_select').find('.print_run').empty()
		var parallel = $(this).parents('.clone_select').find('.parallel')
		
		$.post(
			"personal2.php",
			{id_team:k,rid:rid,card_name:card_name,set_type:set_type},
			function(ard){
				parallel.html("<option selected='true' value='0'></option>"+ard)
			}
		)	
		
	})
	$('.parallel').change(function(){
		var k = $(this).val()
		var rid = $(this).parents('.clone_select').find('.bname').val()
		var card_number = $(this).parents('.clone_select').find('.card_number').val()
		var set_type = $(this).parents('.clone_select').find('.set_type').val()
		$(this).parents('.clone_select').find('.print_run').empty()
		var print_run = $(this).parents('.clone_select').find('.print_run')
		$.post(
			"personal2.php",
			{parallel:k,rid:rid,card_number:card_number,set_type:set_type},
			function(ard){
				print_run.html("<option selected='true' value='0'></option>"+ard)
			}
		)
	})
	$('.save').click(function(){
		$('err_msg').css('display','none')
		$('.hid_val').val('1')
		$('.tstitle').css('display','none')
		setTimeout(function(){
			$('.ee').css('display','block')
		  	var cid = $('.cid').val();
		  	$('.msg2').html("<a href='personalchecklist.php?id="+cid+"' class='text-info gtc'>Go to checklist?</a>")
		}, 500);
	})
	$('.save-title').click(function(){
		$('err_msg').css('display','none')
		$('.ee').css('display','none')
		$('.hrf').html('<a class="hrfa" style="display:none" >Select in releases</a>'); 
		$('.hid_val').val('2')
		setTimeout(function(){
			$('.tstitle').css('display','block')
		  	var cid = $('.cid').val();
		  	$('.msg1').html("<a href='personalchecklist.php?id="+cid+"' class='text-info gtc'>Go to checklist?</a>")
		}, 500);
	    
	})
	
</script>
</body>
</html>