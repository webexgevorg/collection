<?php
$sql_frame="SELECT * FROM frames";
$res_frame=mysqli_query($con, $sql_frame);

$sql_sport_icon="SELECT * FROM sports_type";
$res_sport_icon=mysqli_query($con, $sql_sport_icon);

if(!empty($_SESSION['card-info'])){
        $array_session=$_SESSION['card-info'];
        $card_name=$array_session['card_name'];
}
// $sql_cards_project="SELECT * FROM cards_project WHERE user_id=$user_id";
// $res_cards_project=mysqli_query($con, $sql_cards_project);

?>
<section class="file">
	<div class="container">
		<div class="row d-flex pl-3 pr-4">
          <input type="hidden" id="user_id" value="<?php echo $user_id ?>">
          <input type="hidden" id="card-name" value="<?php echo !empty($card_name) ? $card_name : ""; ?>">
			    <div class="top mb-2">
						<!-- <div class="icon-text" data-toggle="modal" data-target="#newModal" id="new">New</div> -->
            <div class="icon-text pl-2 pr-2" data-toggle="modal" id="drop-down">New</div>
            <div class="icon-text dropdown-divs hide text-left">
                <div class="pt-1 pb-1 new-hover" data-toggle="modal" data-target="#newModal" id="new">New canvs</div>
                <label class="d-flex">
                   <div class="pt-1 pb-1 new-hover new-file-div" for="new-file" data-toggle="modal" data-target=""> New file</div>
                   <input type="" id="new-file">
              </label>
            </div>

				  </div>
			    <div class="top ml-2 mb-2">
						<div class="icon-text" data-toggle="modal" data-target="#downloadModal">Download</div>
			    </div>
          <div class="top ml-2 mb-2">
              <?php if(!empty($_GET['card-id']) && !empty($_GET['tbl'])){ ?>
                 <div class="icon-text" data-toggle="modal" data-target="#add-card" data-card-id="<?=$_GET['card-id']?>" data-tbl="<?=$_GET['tbl']?>" id="save-chenged-card">Save</div>
              <?php }else{  ?>
                 <div class="icon-text" data-toggle="modal" data-target="#add-card"  id="add-sport-card">Аdd card</div>
              <?php }?>
          </div>
          <div class="top ml-2 mb-2">
            <div class="icon-text" data-toggle="modal" data-target="#clearCanvas">Clear</div>
          </div>
          <!-- <div class="top ml-2 mb-2">
            <div class="icon-text" id="saveProject" >Save</div>
            <div id='dwn'></div>
          </div> -->
          <div class="top ml-2 mb-2">
			        <div id="addTemplate" class="icon-text" >Add template</div>
          </div>
          <div class="json-res"></div>
		</div>
		<div class="row">
			<div class="col-md-4">
				
				<div class="row left-cont">
  <div class="col-3 image-editor-tools">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    	
    	<a class="nav-link arrow" id="v-pills-arrow-tab" data-toggle="pill" href="#v-pills-arrow" role="tab" aria-controls="v-pills-arrow" aria-selected="true">
      	               <div class=" bord">
      	               	    <!-- <img src="card-editor/images/cursor.png" class="img-icon"> -->
                            <i class='fas fa-mouse-pointer' style='font-size:24px;color:#133960'></i>
							<div class="icon-text">Arrow</div>
						</div>
      </a>
      
      <a class="nav-link" id="v-pills-crop-tab" data-toggle="pill" href="#v-pills-crop" role="tab" aria-controls="v-pills-crop" aria-selected="false">
      	<div class=" bord">
							<img src="images/icon/tools-08.png" class="img-icon">
							<div class="icon-text">Crop</div>
						</div>
      </a>
      <a class="nav-link" id="v-pills-frame-tab" data-toggle="pill" href="#v-pills-frame" role="tab" aria-controls="v-pills-frame" aria-selected="false">
      	    <div class=" bord">
				 <img src="images/icon/tools-01.png" class="img-icon">
				 <div class="icon-text">Frames</div>
			</div>
      </a>
      
      <a class="nav-link " id="v-pills-background-tab" data-toggle="pill" href="#v-pills-background" role="tab" aria-controls="v-pills-text" aria-selected="true">
      	               <div class=" bord">
							<img src="images/icon/tools-09.png" class="img-icon">
							<div class="icon-text">Background</div>
						</div>
      </a>
    </div>
  </div>

  <div class="col-9 tools-container">
    <div class="tab-content" id="v-pills-tabContent">
    	
      
      <div class="tab-pane fade" id="v-pills-crop" role="tabpanel" aria-labelledby="v-pills-crop-tab">
        <!-- <button id="crop">crop</button> -->
        <div class="mt-3 border-bot text-center">
            <button id="crop-image" class="pr-2 pl-2 pt-1 pb-1 mb-1">Crop </button>
            <!-- <input type="range" name="" min="0" max="50" id="bradius" class="mt-2" value="0" data-radius=''> -->
        </div>
        <div class="d-flex flex-wrap justify-content-center crop-divs">
            <div class='crop-item pl-3 pr-3 pt-2 pb-2' data-width='238' data-height='333'>6.3 sm x 8.8 sm<br>
                 2.48 in x 3.46 in
            </div>
            <div class='crop-item pl-3 pr-3 pt-2 pb-2' data-width='242' data-height='336'>6.4 sm x 8.9 sm<br>
                2.51 in x 3.50 in
            </div>
            <div class='crop-item pl-3 pr-3 pt-2 pb-2' data-width='310' data-height='391'>8.2 sm x 13 sm<br>
                 3.22 in x 5.11 in
            </div>
            <div class='crop-item pl-3 pr-3 pt-2 pb-2' data-width='302' data-height='510'>8 sm x 13.5 sm<br>
                 3.14 in x 5.31 in
            </div>
            <div class='crop-item pl-3 pr-3 pt-2 pb-2' data-width='314' data-height='525'>8.3 sm x 13.9 sm<br>
                 3.26 in x 5.47 in
            </div>
            <div class='crop-item pl-3 pr-3 pt-2 pb-2' data-width='272' data-height='416'>7.2 sm x 11 sm<br>
                 2.83 in x 4.33 in
            </div>
            <div class='crop-item pl-3 pr-3 pt-2 pb-2' data-width='272' data-height='386'>7.2 sm x 10.1 sm<br>
                 2.83 in x 3.97in
            </div>
        </div>
      </div>
      <div class="tab-pane fade show" id="v-pills-frame" role="tabpanel" aria-labelledby="v-pills-frame-tab">
      	 <div class="text-center">
      	 	<div class="w-100 text-center pt-3 pb-2 border-bot d-flex justify-content-center">
            <label>Color: </label>
      	 		<input type="color" id="hue" class="ml-3">
      	 	</div>
      	 	
      	 	<?php
               while($row_frame=mysqli_fetch_assoc($res_frame)){
               	 echo "<img src='card-editor/frames/".$row_frame['frame_image']."' class='aa'>";
               }

      	 	?>
			
         </div>
      </div>
      <div class="tab-pane fade" id="v-pills-s-icon" role="tabpanel" aria-labelledby="v-pills-s-icon-tab">
      	  <div class="d-flex justify-content-center mt-3 border-bot">
              <label class="d-flex">Upload File: 
              <div for="overlay-img" class="ml-4 pl-3 pr-4 pt-1 pb-1 overlay-img-div text-white">Upload</div>
              <input type="file" name="" id="overlay-img" >
              </label>
            </div>
            <div class="w-100 text-center pt-3 pb-2 border-bot d-flex justify-content-center">
            <label>Color: </label>
            <input type="color" id="color-sport-icon" class="ml-3">
          </div>
          
      </div>
      
      <div class="tab-pane fade text-center" id="v-pills-background" role="tabpanel" aria-labelledby="v-pills-background-tab">
      	    <div class="border-bot mt-3">Background</div>
      	    <div class="d-flex mt-3">
      	    	<div>
      	    		<label>
                  <img src="card-editor/images/app-icons.png" for="color-inp" class="color-img">
                  <input type="color" name="" id="color-inp">
                </lable>
      	    	</div>
      	    	<div class="background-color mr-1 ml-1 color1" data-color='#fff'></div>
      	    	<div class="background-color mr-1 ml-1 color2" data-color='#df9b28'></div>
      	    	<div class="background-color mr-1 ml-1 color3" data-color='#ea3a2d'></div>
      	    	<div class="background-color mr-1 ml-1 color4" data-color='#652ae3'></div>
      	    	<div class="background-color mr-1 ml-1 color5" data-color='#92148e'></div>
      	    	<div class="background-color mr-1 ml-1 color6" data-color='#157212'></div>
      	    	<!-- <div class="background-color mr-1 ml-1 color7" data-color=''></div> -->
      	    </div>
            <div class="w-100 d-flex justify-content-end pr-4 mt-2">
              <label>Delete Background:</label>
              <button class="ml-4 pl-3 pr-4 pt-1 pb-1 delete-background text-white">Delete</button>
            </div>
            <div class="d-flex justify-content-end pr-4 mt-2">
              <label class="d-flex">Upload File: 
              <div for="background-img" class="ml-4 pl-3 pr-4 pt-1 pb-1 background-img-div text-white">Upload</div>
              <input type="file" name="" id="background-img" >
              </label>
            </div>
      </div>
    </div>
  </div>
			</div>
		</div>
			<div class="col-md-8 bord2 d-flex flex-column justify-content-center align-items-center canvas-container">
				<div class="bord-dotted ">
					<div class="error-message"></div>
					<div class="canvas-cont bord-er hide ml-auto mr-auto" >
					    <canvas id="canvas" ></canvas>
					</div>

					<div id='divHabilitSelectors' class="input-file-container">
						<input class="input-file" id="fileupload" name="files" type="file" multiple> 
						<label for="fileupload" class="input-file-trigger" id='labelFU' tabindex="0">
							<div class="upload_div">
								<img src='images/icon/upload.png' class="img_upload">
								<br>
								Please select a file
							</div>
						</label>
					</div>
				</div>
        <!-- <div class="canvas-cont bord-er hide mt-2 canvas-for-name">
             <canvas id="canvasForName" ></canvas>
        </div> -->
			</div>
		</div>
	</div>
</section>

<!-------- Modal download ------------------------- -->
<div class="modal fade" id="downloadModal" tabindex="-1" aria-labelledby="downloadModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="downloadModalLabel">Download</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
       	<div class="text-center pt-2 pt-2">
    	 	     <label>Image Name</label> 
    	 	     <input type="" name="" id="image-name">
    	 	 </div>
    	 	 <div class="text-center pt-2">
    	 	 	<label>Format: </label>
    	 	 	<label>png</label>
    	 	 	<input type="radio" name="format1" data-format='png' class="format">
    	 	 	<label>jpg</label>
    	 	 	<input type="radio" name="format1" data-format='jpg' class="format">
    	 	 </div>
    	 	 <a id="lnkDownload" href="#">
    	 	 	<button id="downloade" class="pl-5 pr-5 pt-1 pb-1">Download</button>
    	 	 </a>
    	 	 <div class="downloade-res" class="mt-2"></div>
      </div>
      
    </div>
  </div>
</div>

<!-------- Modal create NEW canvas ------------------------- -->
<div class="modal fade" id="newModal" tabindex="" aria-labelledby="newModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newModalLabel">Create new project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
       	<!-- <div class="w-100 pt-2 pb-2 border-bot text-center">Create new project</div> -->
    		<div class="text-center pt-3 create-new">
    			<div class="pt-1 pb-1">
    				<label>Width</label>
    				<input type="" name="" id="width">
    			</div>
    			<div class="pt-1 pb-1">
    				<label>Height</label>
    				<input type="" name="" id="height">
    			</div>
                <button id="create-canvas" class="pt-1 pb-1 mt-2" data-dismiss="modal">Create</button>
    		</div>
        <div class="text-center pt-3 yes-no">
           <div class="pb-2">Do you want to save this canvas?</div>
           <button id="yes-save" class="pt-1 pb-1 mt-2">Yes</button>
           <button id="no-save" class="pt-1 pb-1 mt-2">No</button>
           <div class="json-res mt-2"></div>
        </div>
      </div>
      
    </div>
  </div>
</div>


<!-------- Modal Clear canvas ------------------------- -->
<div class="modal fade" id="clearCanvas" tabindex="" aria-labelledby="clearCancasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="clearCanvasLabel">Clear Canvas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <!-- <div class="w-100 pt-2 pb-2 border-bot text-center">Create new project</div> -->
        <div class="text-center pt-3">
          <div class="pt-1 pb-1">
             Do you want to clear this canvas?
          </div>
          <button id="clear" class="pt-1 pb-1 mt-2" data-dismiss="modal">Clear</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-------- Modal add cards ------------------------- -->
<div class="modal fade" id="add-card" tabindex="" aria-labelledby="clearCancasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="clearCanvasLabel">Аdd card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
         <p class="add-card-result"></p>        
      </div>
    </div>
  </div>
</div>

<!-------- Modal add project ------------------------- -->
<div class="modal fade" id="add-project" tabindex="" aria-labelledby="clearCancasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header  pb-4">
        <h5 class="modal-title" id="clearCanvasLabel">Аdd project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center projects-container pr-2 pl-2 mb-4 d-flex">
        <?php
            while($row_project=mysqli_fetch_assoc($res_cards_project)){
                echo "<div class='project-div' data-project='".$row_project['project']."' data-width='".$row_project['width']."' data-height='".$row_project['height']."'><img src='card-editor/".$row_project['project_img']."'></div>";
            }
        ?>
         <p class="add-card-result"></p>        
      </div>
    </div>
  </div>
</div>

<?php
if(!empty($_GET['card-id']) && !empty($_GET['tbl'])){
  echo $_GET['card-id'];
  $tbl_name='card'.$_GET['tbl'];
  $card_id=$_GET['card-id'];
  $sql_card_project="SELECT * FROM $tbl_name WHERE id=$card_id";
  $query=mysqli_query($con, $sql_card_project);
  if(mysqli_num_rows($query)>0){
     $row_card_project=mysqli_fetch_assoc($query);
     $card_json='card-editor/cards-images-json/'.$row_card_project['card_json_name'];
     $card_name_json='card-editor/cards-name-images-json/'.$row_card_project['card_name_json_name'];
     echo "<input type='hidden' data-card-json='$card_json' class='inp-json' >";
    //  echo "<input type='hidden' data-card-json='$card_json' data-card-name-json='$card_name_json' class='inp-json' >";

  }
  
}
else{
  // echo 'nooo';
}

?>
<script type="text/javascript">
	// ajout de la classe JS à HTML
document.querySelector("html").classList.add('js');
 
// initialisation des variables
var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");


$('#drop-down').click(function(){
  $('.dropdown-divs').slideToggle()
})
</script>
