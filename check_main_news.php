<?php
include "config/con1.php";
$limit=5;
    $page='';
    $output_footer='';
    if($_POST['page']>1){
        $start = (($_POST['page']-1)*$limit);
        $page = $_POST['page'];
    }else{
        $start=0;

    }


$sql_news="SELECT*FROM news where status=1  and important=1   order by id DESC limit ".$start.",".$limit;
// echo $sql_news;
$query_news=mysqli_query($con, $sql_news);
$output='';
while($row = mysqli_fetch_assoc($query_news)){
    
    $output.="<div class='mx-2 news_item'>

            <div class='d-flex  flex-wrap justify-content-between align-items-center my-2'>
                <div class='d-flex  justify-content-around align-items-center  news_item_title'  style='height:80px'>
                    <div class='mx-2'><img src='admin/news/uploads/".$row['img1']."' class='img-fluid' style='height:100%;width:100%'></div>
                   
                    <a href='spacialnews.php?news_id=$row[id]' target='_blank' color='#6ea4ae' class='font-weight-bold h2 news_title'>".$row['title']."</a>
                </div>
                <span  class='mx-3 font-weight-bold span_data'>".date('d M Y',strtotime($row['published_date']))."</span>
            </div>
            <p class='p-3 block-ellipsis' >".$row['discription']."</p>
        </div>
    ";
}

$sql_page="SELECT*FROM news where status=1  and important=1 order by id DESC ";
$query_page=mysqli_query($con, $sql_page);
$num = mysqli_num_rows($query_page);

   $total_data=$num;
   $total_links=ceil($total_data/$limit);
   for($count=1;$count<=$total_links;$count++) {
        $output.="<span class='pagination_link me' id='".$count."'style='cursor:pointer;padding:6px;border:1px solid #ccc'>".$count."</span>";
    }


    echo $output;


?>