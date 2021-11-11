

<?php
include "config/con1.php";
    $period=$_POST['period'];
    $sport_type=$_POST['sport_type'];
    $producer=$_POST['producer'];
    $news_type=$_POST['news_type'];

   $sql="SELECT * from publications where published_date>(NOW()-INTERVAL $period)  and sport_type='$sport_type' and producer='$producer' and news_type='$news_type' and status=1";
   $query=mysqli_query($con,$sql);
   $num_rows=mysqli_num_rows($query);
   
  
    


   if($num_rows>0){
    
        while($row=mysqli_fetch_assoc($query)){
            
           echo "
            <div class='mx-2 news_item'>
                <div class='d-flex justify-content-between p-2'>
                    <div class='d-flex'>
                        <h5 class='public_color'>".$row['title']."</h5>
                        <h5 class='mx-3'>".$row['published_date']."</h5>
                    </div>
                    <span class='animate_x'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill' viewBox='0 0 16 16'>
                    <path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/>
                </svg></span>
                </div> 
                <div class='p-2 block-ellipsis'>
                    <p>".$row['titledescription']." </p>
                    <div class='d-flex justify-content-end align-items-center font-weight'><span><b>34</b></span> <img class='pl-3' src='image_publication/hand.png'><span class='px-3'><b>134</b></span><b><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                        <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                        <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                    </svg></b></div>
                    </div>
                </div>   
        ";
        }
   }else{
    echo  "<div class='mx-5 news_item'>
                <div class='d-flex justify-content-between my-2'></div>
        <p class='p-2' >There is no record</p>
    </div>";
   }
   
   
   


?>