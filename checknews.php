

<?php
include "config/con1.php";
    $period=$_POST['period'];
    $sport_type=$_POST['sport_type'];
    $producer=$_POST['producer'];
    $news_type=$_POST['news_type'];

   $sql="SELECT * from news where published_date>(NOW()-INTERVAL $period)  and sport='$sport_type' and producer='$producer' and news_type='$news_type' and status=1";
   $query=mysqli_query($con,$sql);
   $num_rows=mysqli_num_rows($query);
   
  
    


   if($num_rows>0){
    
        while($row=mysqli_fetch_assoc($query)){
            
            echo  "<div class='mx-5 news_item'>
                            <div class='d-flex justify-content-between my-2'><button class='mx-3 py-1 px-3 item_button'>PANINI</button><span  class='mx-3'>".$row['published_date']."</span></div>
                            <p class='p-2' >".$row['discription']."</p>
                        </div>";
        }
   }else{
    echo  "<div class='mx-5 news_item'>
                <div class='d-flex justify-content-between my-2'></div>
        <p class='p-2' >There is no record</p>
    </div>";
   }
   
   
   


?>