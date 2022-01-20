<?php
    include "../config/con1.php";
    $sql="SELECT* FROM product";
    $query=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($query)){
        echo "<div style='height:150px;width:150px;float:left;border:1px solid'>". $row['product_name']."
        <button>-</button><button>+</button></div>";
    }


?>
