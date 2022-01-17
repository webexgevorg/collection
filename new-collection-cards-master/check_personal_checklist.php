<?php
include "config/con1.php";

    $yearofreleases = mysqli_real_escape_string($con, $_POST['yearofreleases']);
    $producer = mysqli_real_escape_string($con, $_POST['producer']);
    $nameofcollection = mysqli_real_escape_string($con, $_POST['nameofcollection']);
    $cardnumber = mysqli_real_escape_string($con, $_POST['cardnumber']);
    $cardname = mysqli_real_escape_string($con, $_POST['cardname']);
    $team= mysqli_real_escape_string($con, $_POST['team']);
    $sporttype= mysqli_real_escape_string($con, $_POST['sporttype']);
    $settype = mysqli_real_escape_string($con, $_POST['settype']);
    $parallel = mysqli_real_escape_string($con, $_POST['parallel']);
    $printrun = mysqli_real_escape_string($con, $_POST['printrun']);
    $title1 = mysqli_real_escape_string($con, $_POST['title1']);
    $title2 = mysqli_real_escape_string($con, $_POST['title2']);
    $title3 = mysqli_real_escape_string($con, $_POST['title3']);
   // echo   $yearofreleases.$producer.$nameofcollection.$cardnumber.$cardname.$team.$sporttype.$settype.$parallel.$printrun.$title1.$title2.$title3;
    $sql_select="SELECT*FROM sports_type where sport_type= '$sporttype'";
    $qeury_select=mysqli_query($con,$sql_select);
    
        $tox=mysqli_fetch_assoc($qeury_select);
        $tox['sport_type'];
     
    $sql="INSERT INTO personal_checklist(year_of_releases,producer,name_of_collection,card_number,card_name,team,sporttype,set_type,parallel,print_run,title1,title2,title3)VALUES('$yearofreleases','$producer', '$nameofcollection','$cardnumber','$cardname','$team','$tox[sport_type]','$settype','$parallel','$printrun','0','0','0')";
    $query=mysqli_query($con,$sql);
    if($query){
        echo 1;
    }

?>