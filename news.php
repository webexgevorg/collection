<?php
include "header.php";
include "config/con1.php";
include "classes/pagination.php";

?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
<link rel="stylesheet" href="css/pagination.css">
</head>
<body>
<?php include "cookie.php"; ?>
<section class=" p-2 news">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center news_filter">
            <div class="mx-auto news_first">
                <button class='new_button my-2 py-1 px-4 item_button h5'><a href="main_news.php" target="_blank">Main News</a></button>
                <h6 class="my-2">Apply filters</h6>
                <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0  ">
                            <button class="w-100 btn btn-link collapsed d-flex justify-content-between" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span>Period</span>
                                <i class='fa fa-caret-down mt-2'></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <p><input type="checkbox" name="period" value="Last week" class="period"><span class="ml-1">Last week</span></p>
                            <p><input type="checkbox" name="period" value="Last months" class="period"><span class="ml-1">Last months</span></p>
                            <p><input type="checkbox" name="period" value="Last 3 months" class="period"><span class="ml-1">Last 3 months</span></p>
                            <p><input type="checkbox" name="period" value="Last 6 months" class="period"><span class="ml-1">Last 6 months</span></p>
                            <p><input type="checkbox" name="period" value="All news" class="period"><span class="ml-1">All news</span></p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="w-100 btn btn-link collapsed d-flex justify-content-between" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span>Sports</span>
                                <i class='fa fa-caret-down mt-2'></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        <?php
                                $sql="SELECT*FROM sports_type";
                                $query=mysqli_query($con,$sql);
                                while($row=mysqli_fetch_assoc($query)){
                            
                                echo  "<p><input type='checkbox' value='".$row['sport_type']."' class='sport_type'><span class='ml-1'>".$row['sport_type']."</span></p>";
                            
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="w-100 btn btn-link collapsed d-flex justify-content-between" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span>Manufacture</span>
                            <i class='fa fa-caret-down mt-2'></i>
                        </button>
                    </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                            <p><input type="checkbox" value="Upper Deck" class="producer"><span class="ml-1">Upper Deck</span></p>
                            <p><input type="checkbox" value="Panini" class="producer"><span class="ml-1">Panini</span></p>
                            <p><input type="checkbox" value="Topps" class="producer"><span class="ml-1">Topps</span></p>
                            <p><input type="checkbox" value="Leaf" class="producer"><span class="ml-1">Leaf</span></p>
                            <p><input type="checkbox" value="SeReal" class="producer"><span class="ml-1">SeReal</span></p>
                            <p><input type="checkbox" value="Other" class="producer"><span class="ml-1">Other</span></p>
                            <p><input type="checkbox" value="All" class="producer"><span class="ml-1">All</span></p>
                            <p><input type="checkbox" value="Custom" class="producer"><span class="ml-1">Custom</span></p>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingfore">
                    <h5 class="mb-0">
                        <button class="w-100 btn btn-link collapsed d-flex justify-content-between" data-toggle="collapse" data-target="#collapsefore" aria-expanded="false" aria-controls="collapsefor">
                            <span>All News</span>
                            <i class='fa fa-caret-down mt-2'></i>
                        </button>
                    </h5>
                    </div>
                    <div id="collapsefore" class="collapse" aria-labelledby="headingfore" data-parent="#accordion">
                    <div class="card-body">
                        <p><input type="checkbox" value="Portal News"class="all_news"><span class="ml-1">Portal News</span></p>
                        <p><input type="checkbox" value="Manufacture News"class="all_news"><span class="ml-1">Manufacture News</span></p>
                        <p><input type="checkbox" value="Releaes News"class="all_news"><span class="ml-1">Releaes News</span></p>
                        <p><input type="checkbox" value="Sports News"class="all_news"><span class="ml-1">Sports News</span></p>
                        <p><input type="checkbox" value="Other News"class="all_news"><span class="ml-1">Other News</span></p>
                        <p><input type="checkbox" id="all" value="Select All"><span class="ml-1">Select All</span></p>
                    </div>
                    </div>
                </div>
    </div>
    <button  data-attr="filter" class='new_button my-4 py-1 px-5 item_button filter filter-page h5' >Filter</button>
        



        </div>
        <div class="d-flex flex-column news_second">
            <div class="d-flex justify-content-between">
                <div><h1 class="font-weight-bold">NEWS</h1></div>
                <div >
                     <button  data-attr="newest" class='new_button my-2 py-1 px-4 item_button Newest filter-page h5'>Newest</button>
                     <button  data-attr="oldest" class='new_button my-2 py-1 px-4 item_button Newest filter-page h5'>Oldest</button>
                </div>
            </div>
            <div id="news">
                <?php
                    $sql_news="SELECT*FROM news where status=1    order by id DESC limit 5";
                    
                    $query_news=mysqli_query($con, $sql_news);
                    while($row = mysqli_fetch_assoc($query_news)){
                        echo "
                            <div class='mx-2 news_item'>

                                <div class='d-flex  flex-wrap justify-content-between align-items-center my-2'>
                                    <div class='d-flex  justify-content-around align-items-center  news_item_title'  style='height:80px'>
                                        <div class='mx-2'><img src='admin/news/uploads/".$row['img1']."' class='img-fluid' style='height:100%;width:100%'></div>
                                      
                                        <a href='spacialnews.php?news_id=$row[id]' target='_blank' color='#6ea4ae' class='font-weight-bold h2 news_title'>
                                            <button   class='p-1 created_user_name h5'>".$row['title']."</button>
                                        </a>
                                    </div>
                                    <span  class='mx-3 font-weight-bold span_data'>".date('d M Y',strtotime($row['published_date']))."</span>
                                </div>
                                <p class='p-3 block-ellipsis' >".$row['discription']."</p>
                            </div>
                        ";
                    }
                ?>
            </div>
            <?php
             $sql_news_page="SELECT*FROM news where status=1 order by id DESC";
             $sql_news_query_page=mysqli_query($con,$sql_news_page);
             $pagination= new Pagination();
             $pagination->limit=5;
             $pagination->count_rows=mysqli_num_rows($sql_news_query_page);
            
            ?>

            <div id="pagination">
                        <nav aria-label="Page navigation ">
                            <ul class="pagination justify-content-center r" >
                        <?php echo $pagination->pages(); ?>
                            </ul>
                        </nav>
                    </div>
        </div>
    </div>
    </div>
</section>
<?php
include "footer.php";
?>
<script>
$('.btn-link').on('click', function(){

$('.btn-link').find('.fa-caret-up').toggleClass('fa-caret-up')
$('.btn-link').find('.fa').addClass('fa-caret-down')
$('.btn-link').find('.fa').not($(this).find('i')).removeClass('rotate-icon')

$(this).find('i').toggleClass('rotate-icon')


})
$('.period').on('change', function(){
$('.period').removeClass('active-period')
$('.period').prop('checked', false)
$(this).prop('checked', true)
$(this).addClass('active-period')

})
$(document).ready(function(){
    function filter_data(obj){
        period=''
        if($('.active-period').val()=='Last week'){
        period='7 DAY'
        }else if($('.active-period').val()=="Last months"){
             period='31 DAY'
        }else if($('.active-period').val()=="Last 3 months"){
            period='93 DAY'
        }else if($('.active-period').val()=="Last 6 months"){
            period='186 DAY'
        }else{
            period='All news'
        }
              var filter=obj
              var sport_type = get_filter('sport_type');
              var producer = get_filter('producer');
              var all_news = get_filter('all_news');
              if(filter=="filter"){
                    $.ajax({
                    type:'post',
                    url:'checknews.php',
                    data:{filter,period, sport_type, producer, all_news},
                    success:function(rezult){
                        console.log(rezult)
                        let json=JSON.parse(rezult)
                            $('#news').html(json.news)
                            $('.pagination').html(json.pagination)
                    }
                })  

              }else{
                $.ajax({
                    type:'post',
                    url:'checknews.php',
                    data:{filter, sport_type, producer, all_news},
                    success:function(rezult){
                        console.log(rezult)
                        let json=JSON.parse(rezult)
                            $('#news').html(json.news)
                            $('.pagination').html(json.pagination)
                    }
                })  
              }
       
           
    }


    function get_filter(class_name){
        var filter=[]
       
        $('.'+class_name+':checked').each(function(){
           
                filter.push($(this).val())
            

            
        })
        
        return filter;
    }


    $('.filter-page').on('click',function(){
        var filter=$(this).attr('data-attr')
        filter_data(filter)
        $('.filter-page').removeClass('active-filter')
        $(this).addClass('active-filter')

    })
    
    $('#all').on('change',function(){
        
        if($('#all').prop('checked')==true){
      
            $('.all_news').each(function(){
               
                $(this).prop('checked',true)
            })
        }else{
            $('.all_news').each(function(){
               
               $(this).prop('checked',false)
           })
        
        }
      
    })


$('body').on('click', '.pg-link', function(event){
    event.preventDefault()
  
    let limit=5;
    let page=$(this).attr('data-value')*1
  console.log(page)
    $('.pg-link').removeClass('active-link')
    $(this).addClass('active-link')
    
    period=''
        if($('.active-period').val()=='Last week'){
        period='7 DAY'
        }else if($('.active-period').val()=="Last months"){
             period='31 DAY'
        }else if($('.active-period').val()=="Last 3 months"){
            period='93 DAY'
        }else if($('.active-period').val()=="Last 6 months"){
            period='186 DAY'
        }else{
            period='All news'
        }
              var filter=$('.active-filter').attr('data-attr');
              var sport_type = get_filter('sport_type');
              var producer = get_filter('producer');
              var all_news = get_filter('all_news');
            
              if(filter=="filter"){
                    $.ajax({
                    type:'post',
                    url:'checknews.php',
                    data:{filter,period, sport_type, producer, all_news,limit,page},
                    success:function(rezult){
                   
                        let json=JSON.parse(rezult)
                            $('#news').html(json.news)
                            $('.pagination').html(json.pagination)
                    }
                })  

              }else{
                $.ajax({
                    type:'post',
                    url:'checknews.php',
                    data:{filter, sport_type, producer, all_news, limit,page},
                    success:function(rezult){
                        let json=JSON.parse(rezult)
                            $('#news').html(json.news)
                            $('.pagination').html(json.pagination)
                    }
                })  
              }
   
 })

})







    
</script>
</body>
</html>
