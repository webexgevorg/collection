<?php
include "header.php";
include "config/con1.php";
// require_once "user-logedin.php";
if(isset($_GET['news_id'])){
    $news_id=$_GET['news_id'];
}




?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/news.css">

</head>
<body>
<?php include "cookie.php"; ?>
<section class=" p-2 news">
    <div class="container">
            <div id="news">
                <?php
                    $sql_news="SELECT * FROM news where id='$news_id'";
                    $query_news=mysqli_query($con, $sql_news);
                    $row = mysqli_fetch_assoc($query_news);
                      
                    echo "
                        <h1 class=' font-weight-bold'>".$row['title']."</h1>
                            <div class='my-4 spacialnews'>
                                <div class='d-flex flex-wrap justify-content-between  spacialnew_title my-2'>
                                    <div class='d-flex flex-wrap justify-content-around mt-3 align-items-center spacialnews_item_title'>
                                        <div class='ml-3'>
                                            <img src='admin/news/uploads/".$row['img1']."' class='img-fluid' style='height:100%;width:100%'>
                                        </div>
                                        <div class='ml-3'>
                                            <img src='admin/news/uploads/".$row['img2']."' class='img-fluid' style='height:100%;width:100%'>
                                        </div>
                                        <div class='ml-3'>
                                            <img src='admin/news/uploads/".$row['img3']."' class='img-fluid' style='height:100%;width:100%'>
                                        </div> 
                                    </div>
                                    <span  class='mx-3 mt-3 font-weight-bold span_data'>".date('d M Y',strtotime($row['published_date']))."</span>
                                </div>
                                <p class='p-3 mt-2'>".$row['discription']."</p>
                            </div>
                        ";
                ?>
            </div> 
    </div>
</section>
<?php
include "footer.php";
?>


</body>
</html>
