<?php
    include "../../config/con1.php";

    $sql="SELECT * FROM sports_type";
    $result=mysqli_query($con, $sql);
    while($row=mysqli_fetch_assoc($result)){
        echo "<option>".$row['sport_type']."</option>";
    }

?>