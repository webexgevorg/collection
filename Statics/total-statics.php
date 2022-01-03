<?php
    require "config/con1.php";

    $sport_statics_array = [];

    // veradarcnum e checklisteri @ndhanur qanak@ @st typer-i
    $count_sport_type = "SELECT Count(sport_type) as count, sport_type FROM `collections` Group By sport_type";
    // veradarcnum e bolor typer@
    $sport_type = "SELECT sport_type FROM `collections`";
    // ashxatacnum e sql harcumner@
    $count_sport_result = mysqli_query($con, $count_sport_type);
    $sport_result = mysqli_query($con, $sport_type);
    // veradarcnum e typer-i qanakner@
    $sport_count_number_row = mysqli_num_rows($sport_result);

    while($sport_row = mysqli_fetch_assoc($count_sport_result)) {
        //hashvum enq te mer arandin typeri checlisteri qanak@ @ndhanuri qsni tokosn e
        $sport_percent = $sport_row['count'] * 100 / $sport_count_number_row;
        //tpum enq zangvac vorov ashxatum e grafikan
        array_push ($sport_statics_array, array("label"=>$sport_row['sport_type'], "y"=> $sport_percent));
    }

    $users_statics_array = [];

    $count_users = "SELECT Count(country) as count, country FROM `users` WHERE country!='' Group By country";
    $users = "SELECT country FROM `users` WHERE country!=''";
    $users_result = mysqli_query($con, $users);
    $count_users_result = mysqli_query($con, $count_users);
    $users_number_row = mysqli_num_rows($users_result);
    while($users_row = mysqli_fetch_assoc($count_users_result)) {
        $users_percent = $users_row['count'] * 100 / $users_number_row;
        array_push ($users_statics_array, array("label"=>$users_row['country'], "y"=> $users_percent));
    }

    $users_active_statistics = [];

    $users_number = "SELECT Count(login_date) as count FROM `users`";
    $active_users_week_number = "SELECT login_date FROM `users` WHERE login_date  >= NOW() - INTERVAL 7 DAY";
    $users_mounth_number = "SELECT login_date FROM `users` WHERE login_date  >= NOW() - INTERVAL 1 Month";

    $users_number_result = mysqli_query($con, $users_number);
    $active_users_week_number_result = mysqli_query($con, $active_users_week_number);
    $active_users_mounth_number_result = mysqli_query($con, $users_mounth_number);

    $active_users_week_number_row = mysqli_num_rows($active_users_week_number_result) ;
    $active_users_mounth_number_row = mysqli_num_rows($active_users_mounth_number_result) ;

    while($users_number_row = mysqli_fetch_assoc($users_number_result)) {

        $active_users_week_percent = $active_users_week_number_row * 100 / $users_number_row['count'];
        $active_users_mounth_percent = ($active_users_mounth_number_row - $active_users_week_percent) * 100 / $users_number_row['count'];
        $inactive_users_percent = 100 - $active_users_mounth_percent + -$active_users_week_percent;

        array_push ($users_active_statistics, array("label"=>"mounth", "y"=> $active_users_mounth_percent));
        array_push ($users_active_statistics, array("label"=>"week", "y"=> $active_users_week_percent));
        array_push ($users_active_statistics, array("label"=>"Inactive", "y"=> $inactive_users_percent));
        
    }

   $checklists_array = [];

   $custom_checklist = "SELECT count(cc.sport_type) as count, cc.sport_type FROM `custom_checklist` as cc, custom_name_checklist as cnc WHERE cc.rid = cnc.id GROUP BY cc.sport_type";
   $custom_checklist_type = "SELECT cc.sport_type FROM `custom_checklist` as cc, custom_name_checklist as cnc WHERE cc.rid = cnc.id ";;

   $count_custom_checklist  = mysqli_query($con, $custom_checklist );
   $custom_checklist_type_result = mysqli_query($con, $custom_checklist_type);

   $custom_type_number_row = mysqli_num_rows($custom_checklist_type_result);

   while($custom_row = mysqli_fetch_assoc($count_custom_checklist)) {
       $custom_percent = $custom_row['count'] * 100 / $custom_type_number_row;
       array_push ($checklists_array, array("label"=>$custom_row['sport_type'], "y"=> $custom_percent));
   }

?>