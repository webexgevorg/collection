
<?php
include "config/con1.php";
include "classes/pagination.php";

$start=0;
$limit=5;
$page=1;  
if(isset($_POST['page'])){
    $page = $_POST['page'];
    if($_POST['page']>1){
        $start = (($_POST['page']-1)*$limit);
    }else{
        $start=0;
    }
}

 $sql = "SELECT *FROM news WHERE status=1 ";
    if(isset($_POST['period'])){
        $period=$_POST['period'];
        if($_POST['period']!="All news"){
            $sql .= " and published_date>(NOW()-INTERVAL ".$period." ) ";
        }else{

        }
        
    }
    if(isset($_POST['sport_type'])){
       
        $sport_type_filter=implode("','" , $_POST["sport_type"]);   
        $sql .= " AND sport_type IN('".$sport_type_filter."')";

    }
   
    if(isset($_POST['producer'])){
       
        $producer_filter=implode("','" , $_POST["producer"]);  
        $sql .= " AND producer IN('".$producer_filter."')";

    }
    if(isset($_POST['all_news'])){
       
        $all_news_filter=implode("','" , $_POST["all_news"]);  
        $sql .= " AND news_type IN('".$all_news_filter."')";
      
    }
   
    // creating filter  via asc and desc
      
     if($_POST['filter']=='newest'){
      
        $sql.=" ORDER BY id DESC";
    }else if($_POST['filter']=='oldest'){
        $sql.=" ORDER BY id ASC";
      
    }
    else{
        $sql.=" ORDER BY id DESC";
       
           
        } 

        $sql_pagination=$sql;
 
        $query_sql_pagination=mysqli_query($con, $sql_pagination);
       
        $pagination= new Pagination();
        $pagination->page=$page;
        $pagination->limit=$limit;
        $pagination->count_rows=mysqli_num_rows($query_sql_pagination);


        $sql.=" limit ".$start.','.$limit."";;
    // echo $sql;
  
    $query=mysqli_query($con,$sql);
    $num_rows=mysqli_num_rows($query);
    $arr=[];
    $output='';
    if($num_rows>0){
    
        while($row=mysqli_fetch_assoc($query)){
                    
            $output.= "
                            <div class='mx-2 news_item'>

                                <div class='d-flex  flex-wrap justify-content-between align-items-center my-2'>
                                    <div class='d-flex  justify-content-around align-items-center  news_item_title'  style='height:80px'>
                                        <div class='mx-1'><img src='admin/news/uploads/".$row['img1']."' class='img-fluid' style='height:100%;width:100%'></div> 
                                        <a href='spacialnews.php?news_id=$row[id]' target='_blank' color='#6ea4ae' class='font-weight-bold h2 news_title'>
                                          <button   class='my-2 p-1 created_user_name h5'>".$row['title']."</button>
                                        </a>
                                    </div>
                                    <span  class='mx-3'>".date('d M Y',strtotime($row['published_date']))."</span>
                                </div>
                                <p class='p-3 block-ellipsis' >".$row['discription']."</p>
                            </div>
                        ";
        }
     }else{
        $output.= " <div class='d-flex justify-content-center align-items-center news_item '>
                     <p class='text-center font-weight-bold h2'style='color:#3a9cae' >There is no record</p>
                </div>
             ";
     }

     $arr['news']=$output;
     $arr['pagination']=$pagination->pages();
    echo json_encode($arr); 

?>