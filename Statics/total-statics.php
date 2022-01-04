<?php
    require "config/con1.php";

    $sport_statics_array = [];

    $count_sport_type = "SELECT Count(sport_type) as count, sport_type FROM `collections` Group By sport_type";
    $sport_type = "SELECT sport_type FROM `collections`";
    $count_sport_result = mysqli_query($con, $sport_type);
    $sport_result = mysqli_query($con, $count_sport_type);
    $sport_count_number_row = mysqli_num_rows($count_sport_result);
    while($sport_row = mysqli_fetch_assoc($sport_result)) {
        $sport_percent = $sport_row['count'] * 100 / $sport_count_number_row;
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

    $active_users_week = [];

    $count_users_week = "SELECT Count(login_date) as count FROM `users`";
    $users_week = "SELECT login_date FROM `users` WHERE login_date  >= NOW() - INTERVAL 7 DAY";
    $users_week_result = mysqli_query($con, $users_week);
    $count_users_week_result = mysqli_query($con, $count_users_week);
    $users_week_number_row = mysqli_num_rows($users_week_result);
    while($users_week_row = mysqli_fetch_assoc($count_users_week_result)) {
        $users_week_percent = $users_week_number_row * 100 / $users_week_row['count'];
        array_push ($active_users_week, array("label"=>"Active", "y"=> $users_week_percent));
        array_push ($active_users_week, array("label"=>"Inactive", "y"=> 100 - $users_week_percent));
    }
    
    $active_users_mounth = [];

    $count_users_mounth = "SELECT Count(login_date) as count FROM `users`";
    $users_mounth = "SELECT login_date FROM `users` WHERE login_date  >= NOW() - INTERVAL 1 Month";
    $users_mounth_result = mysqli_query($con, $users_mounth);
    $count_users_mounth_result = mysqli_query($con, $count_users_mounth);
    $users_mounth_number_row = mysqli_num_rows($users_mounth_result);
    while($users_mounth_row = mysqli_fetch_assoc($count_users_mounth_result)) {
        $users_mounth_percent = $users_mounth_number_row * 100 / $users_mounth_row['count'];
        array_push ($active_users_mounth, array("label"=>"Active", "y"=> $users_mounth_percent));
        array_push ($active_users_mounth, array("label"=>"Inactive", "y"=> 100 - $users_mounth_percent));
    }
?>