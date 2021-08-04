<?php

include "header.php";
include "config/con1.php";
require_once "user-logedin.php";


?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
</head>
<body>
<?php include "cookie.php"; ?>

<section class=" p-2 news">
    <div class="d-flex container">

        <div class="ml-5 news_first">
            <h5 class="my-2">Apply filters</h5>
            
            <select class="form-select w-100 py-3" aria-label="Default select example" style="border:none" id="period">
                <optgroup label ="Period" >
                    <option value="Last week">Last week</option>
                    <option value="Last months">Last months</option>
                    <option value="Last 3 months">Last 3 months</option>
                    <option value="Last 6 months">Last 6 months</option>
                    <option value="All news">All news</option>
                </optgroup>
            </select>
            <select class="form-select w-100 py-3" aria-label="Default select example" style="border:none" id="sport_type">
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
                      
            <select class="form-select w-100 py-3" aria-label="Default select example" style="border:none" id="producer">
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
            <select class="form-select w-100 py-3" aria-label="Default select example" style="border:none" id="news_type">
                <optgroup  label="News type">
                <option value="Portal news" > Portal news</option>
                <option value="Producer news">Producer news</option>
                <option value="Releaes news">Releaes news</option>
                <option value="Sports news">Sports news</option>
                <option value="All">All</option>
                </optgroup>
            </select>
            <button class='py-1 px-4 item_button filter'>Filter</button>  
        </div>



        <div class="d-flex flex-column news_second">
            <h1 class="mx-5">NEWS</h1>
            <div id="news">
                <div class="mx-5 news_item">
                    <div class="d-flex justify-content-between my-2"><button class="mx-3 py-1 px-3 item_button">PANINI</button><span  class="mx-3">May 22,2021</span></div>
                    <p class="p-2" >t is a long established fact that a reader will be distracted by the readable content of a
                        page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, </p>
                </div>
                <div class="mx-5 news_item">
                    <div class="d-flex justify-content-between my-2"><button class="mx-3 py-1 px-3 item_button">PANINI</button><span  class="mx-3">May 22,2021</span></div>
                    <p class="p-2" >t is a long established fact that a reader will be distracted by the readable content of a
                        page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, </p>
                </div>
                <div class="mx-5 news_item">
                    <div class="d-flex justify-content-between my-2"><button class="mx-3 py-1 px-3 item_button">PANINI</button><span  class="mx-3">May 22,2021</span></div>
                    <p class="p-2" >t is a long established fact that a reader will be distracted by the readable content of a
                        page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, </p>
                </div>
                <div class="mx-5 news_item">
                    <div class="d-flex justify-content-between my-2"><button class="mx-3 py-1 px-3 item_button">PANINI</button><span  class="mx-3">May 22,2021</span></div>
                    <p class="p-2" >t is a long established fact that a reader will be distracted by the readable content of a
                        page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, </p>
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

