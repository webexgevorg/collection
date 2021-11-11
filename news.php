<?php

include "header.php";
include "config/con1.php";
// require_once "user-logedin.php";


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
        <div class="d-flex flex-wrap justify-content-center news_filter">
            <div class="mx-auto news_first">
                <h5 class="my-2">Apply filters</h5>
                
                <select class="form-select py-3" aria-label="Default select example" style="border:none" id="period">
                    <optgroup label ="Period" >
                        <option class="py-3" value="Last week">Last week</option>
                        <option class="py-3" value="Last months">Last months</option>
                        <option class="py-3" value="Last 3 months">Last 3 months</option>
                        <option class="py-3" value="Last 6 months">Last 6 months</option>
                        <option class="py-3" value="All news">All news</option>
                    </optgroup>
                </select>
                <select class="form-select  py-3" aria-label="Default select example" style="border:none" id="sport_type">
                    <optgroup label="Sports">
                    <?php
                        $sql="SELECT*FROM sports_type";
                        $query=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_assoc($query)){
                                                        echo "<option>".$row['sport_type']."</option>";
                                                    }
                                                ?>
                </option>
                </select>
                        
                <select class="form-select  py-3" aria-label="Default select example" style="border:none" id="producer">
                    <optgroup label="Producer" > 
                    <option value="Upper Deck">Upper Deck</option>
                    <option value="Panini">Panini</option>
                    <option value="Topps">Topps</option>
                    <option value="Leaf">Leaf</option>
                    <option value="SeReal">SeReal</option>
                    <option value="Other">Other</option>
                    <option value="All">All</option>
                    </optgroup>
                </select>
                <select class="form-select  py-3" aria-label="Default select example" style="border:none" id="news_type">
                    <optgroup  label="News type">
                    <option value="Portal news" > Portal news</option>
                    <option value="Producer news">Producer news</option>
                    <option value="Releaes news">Releaes news</option>
                    <option value="Sports news">Sports news</option>
                    <option value="All">All</option>
                    </optgroup>
                </select>
                <button class='my-2 py-1 px-4 item_button filter'>Filter</button>  
            </div>



        <div class="d-flex flex-column news_second">
            <h1 class="mx-2">NEWS</h1>
            <div id="news">
                <?php 
                    $sql_news="SELECT*FROM NEWS where status=1 order by id desc limit 5";
                    $query_news=mysqli_query($con, $sql_news);
                    while($row = mysqli_fetch_assoc($query_news)){
                        echo "
                            <div class='mx-2 news_item'>
                                <div class='d-flex justify-content-between my-2'><button class='mx-3 py-1 px-3 item_button'>".$row['producer']."</button><span  class='mx-3'>".$row['published_date']."</span></div>
                                <p class='p-3'>".$row['discription']."</p>
                            </div>
                        ";
                    }
                
                ?>
            </div>
        </div>
    </div>

    </div>
</section>
<?php
include "footer.php";
?>

<script>
    $('.filter').on('click',function(){
    $period=''
    $sport_type=$('#sport_type').val()
    $producer=$('#producer').val()
    $news_type=$('#news_type').val()
    if($('#period').val()=='Last week'){
        $period='7 DAY'
       
    }else if($('#period').val()=="Last months"){
        $period='31 DAY'
    
    }else if($('#period').val()=="Last 3 months"){
        $period='93 DAY'
    
    }else if($('#period').val()=="Last 6 months"){
        $period='186 DAY'
    
    }
    
    $.ajax({
        type:'post',
        url:'checknews.php',
        data:{period:$period,sport_type: $sport_type,producer:$producer,news_type:$news_type},
        success:function(rezult){
            $('#news').html(rezult)
        }
    })  
    
})

</script>

</body>
</html>

