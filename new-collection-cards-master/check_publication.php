<?php
session_start();
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

$user_id='';      
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    if(!empty($_COOKIE['user'])){
        $user_id=$_COOKIE['user'];
    }
    if(!empty($_SESSION['user'])){
        $user_id=$_SESSION['user'];
    }

}

$sql = "SELECT *FROM publications WHERE status=1 ";
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
// echo $sql;
$sql.=" limit ".$start.','.$limit."";

$query=mysqli_query($con,$sql);

   $num_rows=mysqli_num_rows($query);
   $arr=[];
   $output='';
   if($num_rows>0){
    
        while($row=mysqli_fetch_assoc($query)){
            $sql_like="SELECT COUNT(*) as count_like FROM rating_info WHERE post_id = $row[id] AND rating_action='like'";
            $query_like=mysqli_query($con,$sql_like);
            $like_row=mysqli_fetch_assoc($query_like);
            if($user_id){
             
                $sql_user_like="SELECT * FROM rating_info WHERE post_id = $row[id] AND user_id=$user_id and rating_action='like'";
                $query_user_like=mysqli_query($con,$sql_user_like);
                $like_user_num=mysqli_num_rows($query_user_like);

                if($like_user_num>0){
                    $like_class="fa fa-thumbs-up";
                }else{
                    $like_class="fa fa-thumbs-o-up";
                }
              
            }else{
               
                $like_class="fa fa-thumbs-o-up";
            }


            if($user_id){
               
                $sql_user_dislike="SELECT * FROM rating_info WHERE post_id = $row[id] AND user_id=$user_id and rating_action='dislike'";
                $query_user_dislike=mysqli_query($con,$sql_user_dislike);
                $dislike_user_num=mysqli_num_rows($query_user_dislike);

                if($dislike_user_num>0){
                    $dislike_class="fa fa-thumbs-down";
                }else{
                    $dislike_class="fa fa-thumbs-o-down";
                }

            }else{
                $dislike_class="fa fa-thumbs-o-down";
            }
            
          

            $sql_dislike="SELECT COUNT(*) as count_dislike FROM rating_info WHERE post_id = $row[id] AND rating_action='dislike'";
            $query_dislike=mysqli_query($con,$sql_dislike);
            $dislike_row=mysqli_fetch_assoc($query_dislike);
           
            $output.= "
            <div class='mx-2 news_item'>
                <div class='d-flex justify-content-between p-2'>
                    <div class='d-flex'>
                    <a href='selected_publication.php?public_id=".$row['id']."' target='blank'> <button   class='p-1 item_button filter h5' >".$row['title']."</button></a>
                    <h5 class='mx-3'>".date('d M Y',strtotime($row['published_date']))."</h5>
                    </div>
                    <span class='animate_x'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill' viewBox='0 0 16 16'>
                    <path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/>
                </svg></span>
                </div> 
                <div class='p-2 block-ellipsis'>
                    <p>".$row['titledescription']." </p>
                    <div class='d-flex justify-content-end align-items-center font-weight'>
                    <img class='pl-3' src='image_publication/hot.png'>

                    <i class='".$like_class." like-btn' data-id='".$row['id']."'></i>
                    
                    <span class='likes mx-1 font-weight-bold'>".$like_row['count_like']."</span>
                    &nbsp;&nbsp;&nbsp;
                    <i class='".$dislike_class." dislike-btn' data-id='".$row['id']."'></i>
                    
                    <span class='dislikes mx-1 font-weight-bold'>".$dislike_row['count_dislike']."</span>
                     <span class='pl-3'><b>134</b></span>
                     <img class='pl-3' src='image_publication/view.png'>
                    </div>
                </div>
                </div>   
        ";
        }
   }else{
    $output.= "<div class='mx-5 news_item d-flex justify-content-center align-items-center h3'>
                    <p class='p-2  font-weight-bold' >There is no record</p>
                </div>
              ";
   }
   
   $arr['publication']=$output;
   $arr['pagination']=$pagination->pages();
  echo json_encode($arr); 


?>