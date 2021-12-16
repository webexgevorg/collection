<?php
    require "config/con1.php";

    $dataPoints = [];

    $sql = "SELECT Count(sport_type) as count, sport_type FROM `collections` Group By sport_type";
    $sql1 = "SELECT sport_type FROM `collections`";
    $ardyunq = mysqli_query($con, $sql1);
    $result = mysqli_query($con, $sql);
    $number_row = mysqli_num_rows($ardyunq);
    while($row = mysqli_fetch_assoc($result)) {
        $percent = $row['count'] * 100 / $number_row;
        array_push ($dataPoints, array("label"=>$row['sport_type'], "y"=> $percent));
    }

    $dataPoints1 = [];

    $sql2 = "SELECT Count(country) as count, country FROM `users` WHERE country!='' Group By country";
    $sql3 = "SELECT country FROM `users` WHERE country!=''";
    $ardyunq1 = mysqli_query($con, $sql3);
    $result1 = mysqli_query($con, $sql2);
    $number_row1 = mysqli_num_rows($ardyunq1);
    while($row1 = mysqli_fetch_assoc($result1)) {
        $percent1 = $row1['count'] * 100 / $number_row1;
        array_push ($dataPoints1, array("label"=>$row1['country'], "y"=> $percent1));
    }
?>