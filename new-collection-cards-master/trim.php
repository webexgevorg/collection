<?php

    include "config/con1.php";
    $sql="SELECT * FROM base_checklist";
    $query=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($query)){
        $k=trim($row['id']);
        $k1=trim($row['card_name']);
        $k2=trim($row['team']);
        $k3=trim($row['set_type']);

       echo  $update="UPDATE base_checklist SET  card_name='$k1', team='$k2', set_type='$k3' where id = '$k'";
        $query1=mysqli_query($con, $update);
        if($query1){
            echo "chenged";
        }else{
            echo "no";
        }
    }

?>
