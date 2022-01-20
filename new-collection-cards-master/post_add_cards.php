<?php
include "config/con1.php";
if(isset($_POST['check_cards']) && count($_POST['check_cards'])>0){
    $check_cards=$_POST['check_cards'];
    $personal_chl_id=$_POST['personal_chl_id'];
    $sport_type=$_POST['sport_type'];
    $count=0;
    foreach ($check_cards as $key => $value) {
        $sel="SELECT * FROM base_checklist WHERE id=$value";
        $res=mysqli_query($con, $sel);
        $row=mysqli_fetch_assoc($res);
        if(mysqli_num_rows($res)==1){
             $card_number=$row['card_number'];
             $card_name=$row['card_name']; 
             $team=$row['team']; 
             $set_type=$row['set_type']; 
             $parallel=$row['parallel']; 
             $print_run=$row['print_run'];


            $insert="INSERT INTO personal_checklist (cid, card_number, card_name, sport_type, team, set_type, parallel, print_run) VALUES ($personal_chl_id, '$card_number', '$card_name', '$sport_type', '$team', '$set_type', '$parallel', '$print_run')";
            if(mysqli_query($con, $insert)){
               $count++;
            }
        }
    }
    if($count==count($check_cards)){
        echo "<div class='text-success'>Cards successfuly added.</div>";
    }
}
else{
    echo "<div class='text-danger'>Error</div>";
}

?>