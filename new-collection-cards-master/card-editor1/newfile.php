<?php
$sql_frame="SELECT * FROM frames";
$res_frame=mysqli_query($con, $sql_frame);

$sql_sport_icon="SELECT * FROM sports_type";
$res_sport_icon=mysqli_query($con, $sql_sport_icon);

$sql_cards_project="SELECT * FROM cards_project WHERE user_id=$user_id";
$res_cards_project=mysqli_query($con, $sql_cards_project);

?>
<section class="file">
<<<<<<< HEAD
  <div class="container">
    <div class="row d-flex pl-3 pr-4">
          <input type="hidden" id="user_id" value="<?php echo $user_id ?>">
          <div class="top mb-2">
            <!-- <div class="icon-text" data-toggle="modal" data-target="#newModal" id="new">New</div> -->
            <div class="icon-text pl-2 pr-2" data-toggle="modal" id="drop-down">New</div>
            <div class="icon-text dropdown-divs hide text-left">
                <div class="pt-1 pb-1 new-hover" data-toggle="modal" data-target="#newModal" id="new">New canvs</div>
                <label class="d-flex">
                   <div class="pt-1 pb-1 new-hover" for="new-file"> New file</div>
                   <input type="file" id="new-file">
              </label>
            </div>
=======
	<div class="container">
		<div class="row d-flex pl-3 pr-4">
			    <div class="top">
						<div class="icon-text" data-toggle="modal" data-target="#newModal" id="new">New</div>
				  </div>
			    <div class="top ml-2">
						<div class="icon-text" data-toggle="modal" data-target="#downloadModal">Download</div>
			    </div>
          <div class="top ml-2">
            <div class="icon-text" data-toggle="modal" data-target="#clearCanvas">Clear</div>
          </div>
          <div class="top ml-2">
            <div class="icon-text" id="saveProject" >Save</div>
            <div id='dwn'></div>
          </div>
          <div class="top ml-2">
			        <div id="addProject" class="icon-text">Add project</div>
          </div>
          <div class="json-res"></div>
		</div>
		<div class="row">
			<div class="col-md-4">
				
				

>>>>>>> master

          </div>
          <div class="top ml-2 mb-2">
            <div class="icon-text" data-toggle="modal" data-target="#downloadModal">Download</div>
          </div>
          <div class="top ml-2 mb-2">
            <div class="icon-text" data-toggle="modal" data-target="#add-card" id="add-sport-card">Аdd card</div>
          </div>
          <div class="top ml-2 mb-2">
            <div class="icon-text" data-toggle="modal" data-target="#clearCanvas">Clear</div>
          </div>
          <div class="top ml-2 mb-2">
            <div class="icon-text" id="saveProject" >Save</div>
            <div id='dwn'></div>
          </div>
          <div class="top ml-2 mb-2">
              <div id="addProject" class="icon-text" data-toggle="modal" data-target="#add-project">Add project</div>
          </div>
          <div class="json-res"></div>
    </div>
    <div class="row">
      <div class="col-md-4">
        
        <div class="row left-cont">
  <div class="col-3 image-editor-tools">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      
      <a class="nav-link " id="v-pills-arrow-tab" data-toggle="pill" href="#v-pills-arrow" role="tab" aria-controls="v-pills-arrow" aria-selected="true">
                       <div class=" bord">
                            <!-- <img src="card-editor/images/cursor.png" class="img-icon"> -->
                            <i class='fas fa-mouse-pointer' style='font-size:24px;color:#133960'></i>
              <div class="icon-text">Arrow</div>
            </div>
      </a>
      <a class="nav-link draw" id="v-pills-draw-tab" data-toggle="pill" href="#v-pills-draw" role="tab" aria-controls="v-pills-draw" aria-selected="true">
                       <div class=" bord">
              <img src="images/icon/tools-03.png" class="img-icon">
              <div class="icon-text">Draw</div>
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
      <a class="nav-link" id="v-pills-s-icon-tab" data-toggle="pill" href="#v-pills-s-icon" role="tab" aria-controls="v-pills-s-icon" aria-selected="false">
            <div class=" bord">
         <img src="card-editor/sport-icon/basketball.png" class="img-icon">
         <div class="icon-text">Sport Icon</div>
      </div>
      </a>
      <a class="nav-link " id="v-pills-shapes-tab" data-toggle="pill" href="#v-pills-shapes" role="tab" aria-controls="v-pills-shapes" aria-selected="true">
                      <div class=" bord">
              <img src="images/icon/tools-12.png" class="img-icon">
              <div class="icon-text">Shapes</div>
            </div>
      </a>
      <a class="nav-link " id="v-pills-text-tab" data-toggle="pill" href="#v-pills-text" role="tab" aria-controls="v-pills-text" aria-selected="true">
                       <div class=" bord">
              <img src="images/icon/tools-02.png" class="img-icon">
              <div class="icon-text">Text</div>
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
      
      <div class="tab-pane fade show " id="v-pills-draw" role="tabpanel" aria-labelledby="v-pills-draw-tab">      
            <div class="pt-3 text-center">
        <!-- <button id="draw">draw</button> -->
        <div>
          <label>Color: </label>
            <input type="color" name="" id="draw-color" >
        </div>
        <div>
          <label>Type: </label>
          <select id="draw-type">
              <option>Pencil</option>
                <option>Circle</option>
                <option>Spray</option>
                <option>Pattern</option>
            </select>
        </div>
        <div class="d-flex justify-content-center">
          <div>Size: </div>
          <div class="d-flex align-items-center">
            <div id="size-5" class="draw-size active-size mr-2 ml-2" data-size='5'></div>
            <div id="size-8" class="draw-size mr-2 ml-2" data-size='8'></div>
            <div id="size-15" class="draw-size mr-2 ml-2" data-size='15'></div>
            <div id="size-20" class="draw-size mr-2 ml-2" data-size='20'></div>
            <div id="size-25" class="draw-size mr-2 ml-2" data-size='25'></div>
          </div>
        </div>
      </div>  
        <!-- <input type="number" name="" id="draw-size" value="3"> -->
      </div>
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
<<<<<<< HEAD
      <div class="tab-pane fade" id="v-pills-frame" role="tabpanel" aria-labelledby="v-pills-frame-tab">
         <div class="text-center">
          <div class="w-100 text-center pt-3 pb-2 border-bot d-flex justify-content-center">
            <label>Color: </label>
            <input type="color" id="hue" class="ml-3">
          </div>
          
          <?php
=======
      <div class="tab-pane fade" id="v-pills-crop" role="tabpanel" aria-labelledby="v-pills-crop-tab">
        <!-- <button id="crop">crop</button> -->
        <div class="mt-3 border-bot text-center">
            <button id="crop-image" class="pr-2 pl-2 pt-1 pb-1 mb-1">Crop </button>
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
      <div class="tab-pane fade" id="v-pills-frame" role="tabpanel" aria-labelledby="v-pills-frame-tab">
      	 <div class="text-center">
      	 	<div class="w-100 text-center pt-3 pb-2 border-bot d-flex justify-content-center">
            <label>Color: </label>
      	 		<input type="color" id="hue" class="ml-3">
      	 	</div>
      	 	
      	 	<?php
>>>>>>> master
               while($row_frame=mysqli_fetch_assoc($res_frame)){
                 echo "<img src='card-editor/frames/".$row_frame['frame_image']."' class='aa'>";
               }

          ?>
      
         </div>
      </div>
      <div class="tab-pane fade" id="v-pills-s-icon" role="tabpanel" aria-labelledby="v-pills-s-icon-tab">
<<<<<<< HEAD
          <div class="d-flex justify-content-center mt-3 border-bot">
=======
      	  <div class="d-flex justify-content-center mt-3 border-bot">
>>>>>>> master
              <label class="d-flex">Upload File: 
              <div for="overlay-img" class="ml-4 pl-3 pr-4 pt-1 pb-1 overlay-img-div text-white">Upload</div>
              <input type="file" name="" id="overlay-img" >
              </label>
            </div>
            <div class="w-100 text-center pt-3 pb-2 border-bot d-flex justify-content-center">
            <label>Color: </label>
            <input type="color" id="color-sport-icon" class="ml-3">
<<<<<<< HEAD
          </div>
          <div class="text-center"> 
          <?php
=======
            <button id="dd">dddddd</button>
          </div>
          <div class="text-center"> 
      	 	<?php
>>>>>>> master
               while($row_sport_icon=mysqli_fetch_assoc($res_sport_icon)){
                 echo "<img src='card-editor/sport-icon/".$row_sport_icon['sport_logo'].".svg' class='sport-icon'>";
               }
          ?>
      
         </div>
      </div>
      <div class="tab-pane fade" id="v-pills-shapes" role="tabpanel" aria-labelledby="v-pills-shapes-tab">
<<<<<<< HEAD
          <div class="text-center mt-4"> 
            <div class="border-bot">Shapes</div>
            <div class="d-flex mt-3 flex-wrap">
                <div class="shapes" name="triangle" data-angle="3"><img src="card-editor/images/Triangle.png"></div>
              <div class="shapes" name="rectangle" data-angle="4"><img src="card-editor/images/rectangle.png"></div>
              <div class="shapes" name="rombus" data-angle="4"><img src="card-editor/images/rombus.png"></div>
              <div class="shapes" name="pentagon" data-angle="5"><img src="card-editor/images/pentagon.png"></div>
              <div class="shapes" name="hexagon" data-angle="6"><img src="card-editor/images/hexagon1.png"></div>
              <div class="shapes" name="heptagon" data-angle="7"><img src="card-editor/images/heptagon.png"></div>
              <div class="shapes" name="octagon" data-angle="8"><img src="card-editor/images/octagon.png"></div>
              <div class="shapes" name="elipse" data-angle="10"><img src="card-editor/images/Elipse.png"></div>

            </div>
            <div class="border-bot mt-3">Background</div>
            <div class="d-flex mt-3">
              <div>
                <label><img src="card-editor/images/app-icons.png" for="color-inp" class="color-img"><input type="color" name="" id="shape-color-inp"></lable>
              </div>
              <div class="shape-color mr-1 ml-1 color1" data-color='#dbc126'></div>
              <div class="shape-color mr-1 ml-1 color2" data-color='#df9b28'></div>
              <div class="shape-color mr-1 ml-1 color3" data-color='#ea3a2d'></div>
              <div class="shape-color mr-1 ml-1 color4" data-color='#652ae3'></div>
              <div class="shape-color mr-1 ml-1 color5" data-color='#92148e'></div>
              <div class="shape-color mr-1 ml-1 color6" data-color='#157212'></div>
              <!-- <div class="background-color mr-1 ml-1 color7" data-color=''></div> -->
            </div>
         </div>
         <div class="d-flex mt-3 text-center justify-content-center">
              <div  name="text-box-1"><img src="card-editor/images/template-3-4.png" class="text-box"></div>
              <div  name="text-box-1"><img src="card-editor/images/template-3-5.png" class="text-box"></div>
=======
      	  <div class="text-center mt-4"> 
      	  	<div class="border-bot">Shapes</div>
      	  	<div class="d-flex mt-3 flex-wrap">
      	  		  <div class="shapes" name="triangle" data-angle="3"><img src="card-editor/images/Triangle.png"></div>
	      	 	  <div class="shapes" name="rectangle" data-angle="4"><img src="card-editor/images/rectangle.png"></div>
	      	 	  <div class="shapes" name="rombus" data-angle="4"><img src="card-editor/images/rombus.png"></div>
	      	 	  <div class="shapes" name="pentagon" data-angle="5"><img src="card-editor/images/pentagon.png"></div>
	      	 	  <div class="shapes" name="hexagon" data-angle="6"><img src="card-editor/images/hexagon1.png"></div>
	      	 	  <div class="shapes" name="heptagon" data-angle="7"><img src="card-editor/images/heptagon.png"></div>
	      	 	  <div class="shapes" name="octagon" data-angle="8"><img src="card-editor/images/octagon.png"></div>
	      	 	  <div class="shapes" name="elipse" data-angle="10"><img src="card-editor/images/Elipse.png"></div>

      	  	</div>
      	  	<div class="border-bot mt-3">Background</div>
      	    <div class="d-flex mt-3">
      	    	<div>
      	    		<label><img src="card-editor/images/app-icons.png" for="color-inp" class="color-img"><input type="color" name="" id="shape-color-inp"></lable>
      	    	</div>
      	    	<div class="shape-color mr-1 ml-1 color1" data-color='#dbc126'></div>
      	    	<div class="shape-color mr-1 ml-1 color2" data-color='#df9b28'></div>
      	    	<div class="shape-color mr-1 ml-1 color3" data-color='#ea3a2d'></div>
      	    	<div class="shape-color mr-1 ml-1 color4" data-color='#652ae3'></div>
      	    	<div class="shape-color mr-1 ml-1 color5" data-color='#92148e'></div>
      	    	<div class="shape-color mr-1 ml-1 color6" data-color='#157212'></div>
      	    	<!-- <div class="background-color mr-1 ml-1 color7" data-color=''></div> -->
      	    </div>
>>>>>>> master
         </div>
         <div class="d-flex mt-3 text-center justify-content-center">
              <div  name="text-box-1"><img src="card-editor/images/template-3-4.png" class="text-box"></div>
              <div  name="text-box-1"><img src="card-editor/images/template-3-5.png" class="text-box"></div>
         </div>
      </div>
      <div class="tab-pane fade" id="v-pills-text" role="tabpanel" aria-labelledby="v-pills-text-tab">
<<<<<<< HEAD
        <div class="mt-4 text-center">
          <div class=" pl-5">
          <div class="d-flex align-items-center justify-content-start ">
               <label>Color: </label>
               <input type="color" value="#1c3ee9" id="fill" class="text-color ml-2" />
          </div>
          <div class="d-flex justify-content-start mt-3">
            <label>Font: </label>
            <select id="font" class="ml-2">
              <option>arial</option>
              <option>tahoma</option>
              <option>times new roman</option>
              <option>verdana</option>
              <option>helvetica</option>
              <option>calibri</option>
              <option>noto</option>
              <option>lucida sans</option>
              <option>Century Gothic</option>
              <option>candara</option>
              <option>futara</option>
              <option>Comic Sans MS</option>
              <option>Brush Script MT</option>
              <option>Impact</option>
              <option>Ink Free</option>
            </select>
            </div>
            <div class="d-flex justify-content-start mt-3">
              <label>Font Size: </label>
              <select id="font-size" class="ml-2">
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>14</option>
                <option>18</option>
                <option>24</option>
                <option>30</option>
                <option>36</option>
                <option>48</option>
                <option>60</option>
                <option>72</option>
                <option>96</option>
                <option>100</option>
              </select>
            </div>
            <div class="w-100 d-flex mt-3 justify-content-start ">
                 <div id='bold' class="ml-2 mr-2">B</div>
                 <div id='italic' class="ml-2 mr-2">I</div>
                 <div id='underline' class="ml-2 mr-2">U</div>
            </div>
          </div>    
          <button id="text" class="pt-1 pb-1 pl-2 pr-2 mt-3">Add text</button>
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
              <div class="background-color mr-1 ml-1 color1" data-color='#dbc126'></div>
              <div class="background-color mr-1 ml-1 color2" data-color='#df9b28'></div>
              <div class="background-color mr-1 ml-1 color3" data-color='#ea3a2d'></div>
              <div class="background-color mr-1 ml-1 color4" data-color='#652ae3'></div>
              <div class="background-color mr-1 ml-1 color5" data-color='#92148e'></div>
              <div class="background-color mr-1 ml-1 color6" data-color='#157212'></div>
              <!-- <div class="background-color mr-1 ml-1 color7" data-color=''></div> -->
            </div>
=======
      	<div class="text-center mt-4">
      		<div>
      			<label>Color: </label>
				<input type="color" value="blue" id="fill" />
      		</div>
      		<div class="mt-2">
      			<label>Font: </label>
    				<select id="font">
    				  <option>arial</option>
    				  <option>tahoma</option>
    				  <option>times new roman</option>
    				  <option>verdana</option>
    				  <option>helvetica</option>
    				  <option>calibri</option>
    				  <option>noto</option>
    				  <option>lucida sans</option>
    				  <option>Century Gothic</option>
    				  <option>candara</option>
    				  <option>futara</option>
    				  <option>Comic Sans MS</option>
    				  <option>Brush Script MT</option>
    				  <option>Impact</option>
    				  <option>Ink Free</option>
    				</select>
            </div>
            <div class="mt-2">
              <label>Font Size: </label>
              <select id="font-size">
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>14</option>
                <option>18</option>
                <option>24</option>
                <option>30</option>
                <option>36</option>
                <option>48</option>
                <option>60</option>
                <option>72</option>
                <option>96</option>
                <option>100</option>
              </select>
            </div>
            <div class="w-100 d-flex mt-2 justify-content-center">
                 <div id='bold' class="ml-2 mr-2">B</div>
                 <div id='italic' class="ml-2 mr-2">I</div>
                 <div id='underline' class="ml-2 mr-2">U</div>
            </div>
                <button id="text" class="pt-1 pb-1 pl-2 pr-2 mt-2">Add text</button>

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
      	    	<div class="background-color mr-1 ml-1 color1" data-color='#dbc126'></div>
      	    	<div class="background-color mr-1 ml-1 color2" data-color='#df9b28'></div>
      	    	<div class="background-color mr-1 ml-1 color3" data-color='#ea3a2d'></div>
      	    	<div class="background-color mr-1 ml-1 color4" data-color='#652ae3'></div>
      	    	<div class="background-color mr-1 ml-1 color5" data-color='#92148e'></div>
      	    	<div class="background-color mr-1 ml-1 color6" data-color='#157212'></div>
      	    	<!-- <div class="background-color mr-1 ml-1 color7" data-color=''></div> -->
      	    </div>
>>>>>>> master
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
      <div class="col-md-8 bord2 d-flex justify-content-center align-items-center canvas-container">
        <div class="bord-dotted">
          <div class="error-message"></div>
          <div class="canvas-cont hide ml-auto mr-auto" tabindex="3">
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
<<<<<<< HEAD
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
=======
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
>>>>>>> master
        <div class="text-center pt-3 yes-no">
           <div class="pb-2">Do you want to save this canvas?</div>
           <button id="yes-save" class="pt-1 pb-1 mt-2">Yes</button>
           <button id="no-save" class="pt-1 pb-1 mt-2">No</button>
           <div class="json-res mt-2"></div>
        </div>
<<<<<<< HEAD
=======
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
>>>>>>> master
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
