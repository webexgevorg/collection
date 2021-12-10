<?php
include "header.php";
include "config/con1.php";


?>
	<section>
		<div class="container text-center justify-content-center" style="border:solid 1px;">
		<form>
			<h3 class="fw-bold">SEND US A MESSAGE</h3>
			<div class="d-flex flex-wrap justify-content-between mb-4 ">
                <div class="form-group" style="width:48%">
                  <input type="text" class="form-control py-2" id="nametext" placeholder="Your name/ID">
                </div>
                <div class="form-group" style="width:48%">
                  <input type="text" class="form-control py-2" id="email" placeholder="Email adress">
                </div>
              </div>
               <div class="form-group mb-4">
                  <textarea type="text" class="form-control py-2" placeholder="Email adress" rows="6"></textarea>
                </div>
                <div class="d-flex justify-content-center">
                <div class="form-group w-50">
                  <input type="submit" class="form-control py-2" id="email" value="Send message">
                </div>
                </div>
		</form>
	</div>
	</section>
    <?php
include "footer.php";
?>