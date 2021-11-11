<?php

include "header.php";
include "config/con1.php";
// require_once "user-logedin.php";


?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
<link rel="stylesheet" type="text/css" href="css/publications.css">
</head>
</head>
<body>
<?php include "cookie.php"; ?>
<style>
    .block-ellipsis {
   
    max-width: 100%;
    height: 100px;
    margin: 0 auto;
    line-height: 2;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    }

.show{
    transition: all 2s;
    height:100%;
}
</style>


<section class= "p-2 news">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center news_filter">
            
                

                    <div class="mx-auto news_first">
                        <h5 class="my-2">Apply filters</h5>
                    
                            <select class="form-select w-100 py-3" aria-label="Default select example" style="border:none" id="period">
                                <optgroup label ="Period" >
                                    <option class='py-3' value="Last week">Last week</option>
                                    <option class='py-3' value="Last months">Last months</option>
                                    <option class='py-3' value="Last 3 months">Last 3 months</option>
                                    <option class='py-3' value="Last 6 months">Last 6 months</option>
                                    <option class='py-3' value="All news">All news</option>
                                </optgroup>
                            </select>
                            <select class="form-select w-100 py-3" aria-label="Default select example" style="border:none" id="sport_type">
                                <optgroup label="Sports">
                                <?php
                                    $sql="SELECT*FROM sports_type";
                                    $query=mysqli_query($con,$sql);
                                    while($row=mysqli_fetch_assoc($query)){
                                                                    echo "<option class='pb-3'>".$row['sport_type']."</option>";
                                                                }

                                                            ?>
                            </option>
                            </select>
                                    
                            <select class="form-select w-100 py-3" aria-label="Default select example" style="border:none" id="producer">
                                <optgroup label="Producer" > 
                                <option class='pb-3' value="Upper Deck">Upper Deck</option>
                                <option class='pb-3' value="Panini">Panini</option>
                                <option class='pb-3' value="Topps">Topps</option>
                                <option class='pb-3' value="Leaf">Leaf</option>
                                <option class='pb-3' value="SeReal">SeReal</option>
                                <option class='pb-3' value="Other">Other</option>
                                <option class='pb-3' value="All">All</option>
                                </optgroup>
                            </select>
                            <select class="form-select w-100 py-3" aria-label="Default select example" style="border:none" id="news_type">
                                <optgroup  label="News type">
                                <option class='pb-3' value="Portal news" > Portal news</option>
                                <option class='pb-3' value="Producer news">Producer news</option>
                                <option class='pb-3' value="Releaes news">Releaes news</option>
                                <option class='pb-3' value="Sports news">Sports news</option>
                                <option class='pb-3' value="All">All</option>
                                </optgroup>
                            </select>
                            <button class='py-1 px-4 item_button filter'>Filter</button> 
                        
                         
                    </div>



            <div class="d-flex flex-column news_second">
                <h1 class="mx-2">Publications</h1>
                
                <div id="news">
                    <?php
                        $sql_last_publications="SELECT*FROM publications where status=1 order by id desc limit 5";
                        $query_publish=mysqli_query($con, $sql_last_publications);
                        while($row = mysqli_fetch_assoc( $query_publish)){
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
            url:'check_publication.php',
            data:{period:$period,sport_type: $sport_type,producer:$producer,news_type:$news_type},
            success:function(rezult){
                $('#news').html(rezult)
            }
        })  
    
    })
count=0

    $(document).on('click','.animate_x',function(){
       
        $(this).parent().parent().find('.block-ellipsis').toggleClass('show')
        // $(this).parent().parent().find('.block-ellipsis').slideToggle();
       
    })
      
        
         
    
     
    

</script>

</body>
</html>

