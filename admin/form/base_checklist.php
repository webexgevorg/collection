<?php
include "../../config/con1.php";
if(isset($_POST['btn-bs-checklist'])){
   
    if(empty($_POST['other-sport-type'])){
        $sport_type=mysqli_real_escape_string($con, $_POST['sport-type']);
    }
    else{
        $sport_type=mysqli_real_escape_string($con, $_POST['other-sport-type']);
       
    }
   if(!empty($_POST['year-of-releases']) && !empty($_POST['producer']) && !empty($_POST['name-collection']) && !empty($_POST['card-number']) && !empty($_POST['card-name']) && !empty($_POST['team']) && !empty($_POST['set-type']) && !empty($_POST['parallel']) && !empty($_POST['print-run']) && !empty($sport_type)){
     $year_of_releases=mysqli_real_escape_string($con, $_POST['year-of-releases']);
    
     $producer=mysqli_real_escape_string($con, $_POST['producer']);
     $name_collection=mysqli_real_escape_string($con, $_POST['name-collection']);
     $card_number=mysqli_real_escape_string($con, $_POST['card-number']);
     $card_name=mysqli_real_escape_string($con, $_POST['card-name']);
     $team=mysqli_real_escape_string($con, $_POST['team']);
     $set_type=mysqli_real_escape_string($con, $_POST['set-type']);
     $parallel=mysqli_real_escape_string($con, $_POST['parallel']);
     $print_run=mysqli_real_escape_string($con, $_POST['print-run']);
     
      $sql_insert_sport="INSERT INTO sports_type (sport_type, sport_logo) VALUES ('$sport_type', '')";
        mysqli_query($con,  $sql_insert_sport);
     $end_id="SELECT id FROM base_checklist GROUP BY id DESC LIMIT 1";
     $res=mysqli_query($con, $end_id);
     $row=mysqli_fetch_assoc($res);
     
     $sort_number= $row['id']+1;
     $sql_insert="INSERT INTO base_checklist (sort_number, year_of_releases, producer, name_of_collection, card_number, card_name, team, set_type, sport_type, parallel, print_run) VALUES ($sort_number, '$year_of_releases', '$producer', '$name_collection', '$card_number', '$card_name', '$team', '$set_type', '$sport_type', '$parallel', '$print_run')";
		
			if(mysqli_query($con, $sql_insert)){
			    echo "<h5 class='text-success'>Successfully added base checklist</h5>";
			    ?>
			    <script> 
               setTimeout(function(){
		       window.location.href = 'add_base_checklist.php';
	            },1500)
               </script>
			    <?php
			}
   }
   else{
       echo  "<h5 class='text-danger'>Fill in all filds</h5>";
   }
        
    
}




?>