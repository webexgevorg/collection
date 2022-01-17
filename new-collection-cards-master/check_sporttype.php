<?php
    session_start();
    include 'config/con1.php';
    if(isset($_POST['sport_name'])){
        $sportname=$_POST['sport_name'];
        $sql = "SELECT sport_type  FROM  collections WHERE sport_type = '$sportname'";
        $query=mysqli_query($con,$sql);
        $qanak=mysqli_num_rows($query);
        echo  $qanak;
    }


    if(isset($_POST['sport_id'])){
        $_SESSION['sport_id']=$_POST['sport_id'];
        echo $_SESSION['sport_id'];
    }
//  -----  take the years
    if(isset($_POST['split1']) || isset($_POST['split2'])) {
        $tiv1 = $_POST['split1'];
        $tiv2 = $_POST['split2'];
        $sql = "SELECT * FROM  collections WHERE sport_type IN (SELECT sport_type FROM sports_type where id=$_SESSION[sport_id]) and year_of_releases BETWEEN '$tiv1'  and '$tiv2'";
        $query = mysqli_query($con, $sql);
        while ($tox = mysqli_fetch_assoc($query)) {
//            echo "<p class='ml-5 mr-1 sort' data-id='" . $tox['id'] . "' onclick='sort(this)'>" . $tox['year_of_releases'] . "-" . $tox['name_of_collection'] . "</p>";
            echo "<a href='?data_id=".$tox['id']."'>". $tox['year_of_releases'] . "-" . $tox['name_of_collection'] . "</a><br/>";
        }
    }
    if(isset($_POST['release_id'])){
        echo $_POST['release_id'];
        $_SESSION['release_id']=$_POST['release_id'];
    }
    if(isset($_POST['collection_id'])){
        $_SESSION['collection_id']=$_POST['collection_id'];
    }
?>