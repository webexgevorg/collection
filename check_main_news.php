<?php
include "config/con1.php";
include "classes/pagination.php";
$limit=5;
    $page=1;
    $output_footer='';
    if($_POST['page']>1){
        $start = (($_POST['page']-1)*$limit);
        $page = $_POST['page'];
    }else{
        $start=0;

    }

 $sql_news="SELECT*FROM news where status=1  and important=1   order by id DESC limit ".$start.",".$limit."";

$query_news=mysqli_query($con, $sql_news);

$output='';
while($row = mysqli_fetch_assoc($query_news)){
    
    $output.="<div class='mx-2 news_item'>

            <div class='d-flex  flex-wrap justify-content-between align-items-center my-2'>
                <div class='d-flex  justify-content-around align-items-center  news_item_title'  style='height:80px'>
                    <div class='mx-2'><img src='admin/news/uploads/".$row['img1']."' class='img-fluid' style='height:100%;width:100%'></div>
                   
                    <a href='spacialnews.php?news_id=".$row['id']."' target='_blank' color='#6ea4ae' class='font-weight-bold h2 news_title'>".$row['title']."</a>
                </div>
                <span  class='mx-3 font-weight-bold span_data'>".date('d M Y',strtotime($row['published_date']))."</span>
            </div>
            <p class='p-3 block-ellipsis' >".$row['discription']."</p>
        </div>
    ";
}


  
$sql_page="SELECT*FROM news where status=1  and important=1 order by id DESC ";
$query_page=mysqli_query($con, $sql_page);


$pagination= new Pagination();
$pagination->page=$page;
$pagination->limit=$limit;
$pagination->count_rows=mysqli_num_rows($query_page);

$arr=[];

    $paginate="   
            <div id='pagination'>
                <nav aria-label='Page navigation '>
                    <ul class='pagination justify-content-center r' >
                    ".$pagination->pages()."
                    </ul>
                </nav>
            </div>
        ";

$arr['main_news']=$output;
$arr['pagination']=$paginate;
echo json_encode($arr); 

    


?>