<?php
include "header.php";
include "config/con1.php";
// require_once "user-logedin.php";
if(isset($_GET['public_id'])){
    $public_id=$_GET['public_id'];
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
                    $sql_public="SELECT * FROM publications where id='$public_id'";
                    $query_public=mysqli_query($con,  $sql_public);
                    $row = mysqli_fetch_assoc($query_public);
                      
                    echo "
                        <h1 class=' font-weight-bold'>".$row['title']."</h1>
                            <div class='my-4 spacialnews'>
                                <div class='text-right  spacialnew_title my-2'>
                                    <span  class='mx-3 mt-3 font-weight-bold span_data'>".date('d M Y',strtotime($row['published_date']))."</span>
                                </div>
                                <p class='p-3 mt-2'>".$row['titledescription']."</p>
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
