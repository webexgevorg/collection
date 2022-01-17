<?php
include "header.php";
include "config/con1.php";

include "classes/pagination.php";



?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- link fontawsome for like and dislike buttons -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

<link rel="stylesheet" type="text/css" href="css/news.css">

<link rel="stylesheet" type="text/css" href="css/publications.css">
<link rel="stylesheet" href="css/pagination.css">
</head>
</head>
<body>
<?php 
    include "cookie.php";
  

?>
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

</style>

<?php 
  
?>
<section class= "p-2 news">
    <div class="container">
    <div class="d-flex flex-wrap justify-content-center news_filter">
            <div class="mx-auto news_first">
               
                <h5 class="my-2">Apply filters</h5>
                    <div id="accordion">
                    <div class="card">
                        <select class="form-select p-4" aria-label="Default select example" style="border:none" id="period">
                        <div class="card-header" id="headingTwo">
                           
                        </div>  
                            <optgroup label ="Period" >
                                <option class="py-3" value="Last week" class="period">Last week</option>
                                <option class="py-3" value="Last months" class="period">Last months</option>
                                <option class="py-3" value="Last 3 months" class="period">Last 3 months</option>
                                <option class="py-3" value="Last 6 months" class="period">Last 6 months</option>
                                <option class="py-3" value="All news" class="period">All news</option>
                            </optgroup>
                        </select>
                    </div>
                
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Sports
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
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Manufacture
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
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefore" aria-expanded="false" aria-controls="collapsefor">
                        All News
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
    <button  data-attr="filter" class='my-2 py-1 px-5 item_button filter h5 filter-page' >Filter</button>
        





                    </div>



            <div class="d-flex flex-column news_second">
                <!-- <h1 class="mx-2">Publications</h1> -->
                <div class="d-flex justify-content-between">
                <div><h1 class="font-weight-bold">Publications</h1></div>
                <div >
                     <button  data-attr="newest" class='my-2 py-1 px-4 item_button Newest h5 filter-page'>Newest</button>
                     <button  data-attr="oldest" class='my-2 py-1 px-4 item_button Newest h5 filter-page'>Oldest</button>
                </div>
            </div>
            <div id="news_table">
                <div id="news">
                
                    <?php
                     $sql_last_publications="SELECT*FROM publications where status=1 order by id desc limit 5";
                     $query_publish=mysqli_query($con, $sql_last_publications);
                        $sql_last_publications_pagination="SELECT*FROM publications where status=1 order by id desc";
                        $query_publish_pagination=mysqli_query($con, $sql_last_publications_pagination);
                        $pagination= new Pagination();
                            $pagination->limit=5;
                            $pagination->count_rows=mysqli_num_rows($query_publish_pagination);
                        while($row = mysqli_fetch_assoc( $query_publish)){

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
                           
                        ?>    
                                <div class='mx-2 news_item'>
                                    <div class='d-flex justify-content-between p-2'>
                                        <div class='d-flex flex-wrap'>
                                        <a href="selected_publication.php?public_id=<?= $row['id']?>" target="blank"> <button   class='p-1 item_button filter h5' ><?= $row['title'] ?></button></a>
                                         
                                            <h5 class='mx-3'><?= date('d M Y',strtotime($row['published_date'])) ?></h5>
                                        </div>
                                        <span class='animate_x'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill' viewBox='0 0 16 16'>
                                        <path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/>
                                            </svg>
                                        </span>
                                    </div> 
                                    <div class='p-2 block-ellipsis'>
                                        <p><?= $row['titledescription'] ?></p> 
                                        <div class='d-flex justify-content-end align-items-center font-weight'>
                                            <img class='pl-3 mx-1' src='image_publication/hot.png'>

                                            <i class="<?=$like_class ?> like-btn" data-id='<?=  $row['id'] ?>'></i>
                                            
                                            <span class='likes mx-1 font-weight-bold'><?= $like_row['count_like']; ?></span>
                                            &nbsp;&nbsp;
                                            <i class="<?=$dislike_class ?> dislike-btn" data-id='<?= $row['id'] ?>'></i>
                                            
                                            <span class='dislikes mx-1 font-weight-bold'><?= $dislike_row['count_dislike']; ?></span>
                                             <span class='pl-3'><b>134</b></span>
                                             <img class='pl-3' src='image_publication/view.png'>
                                            </div>
                                        </div>
                                    </div>   
                            <?php
                        }
                    
                    ?>
                     </div>
                    <div id="pagination">
                        <nav aria-label="Page navigation ">
                            <ul class="pagination justify-content-center r" >
                        <?php echo $pp= $pagination->pages(); ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        
              
        </div>

    </div>
</section>
<?php
include "footer.php";
?>

<script>
   
$(document).ready(function(){
    function filter_data(obj){
        period=''
        if($('#period').val()=='Last week'){
        period='7 DAY'
        }else if($('#period').val()=="Last months"){
             period='31 DAY'
        }else if($('#period').val()=="Last 3 months"){
            period='93 DAY'
        }else if($('#period').val()=="Last 6 months"){
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
                    url:'check_publication.php',
                    data:{filter,period, sport_type, producer, all_news},
                    success:function(rezult){
                        console.log(rezult)
                        let json=JSON.parse(rezult)
                            $('#news').html(json.publication)
                            $('.pagination').html(json.pagination)
                    }
                })  

              }else{
                $.ajax({
                    type:'post',
                    url:'check_publication.php',
                    data:{filter, sport_type, producer, all_news},
                    success:function(rezult){
                        console.log(rezult)
                        let json=JSON.parse(rezult)
                            $('#news').html(json.publication)
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
// getting data_attr from buttons filter, newest, oldest
    $('.filter-page').on('click',function(){
        var filter=$(this).attr('data-attr')
        filter_data(filter)
        $('.filter-page').removeClass('active-filter')
        $(this).addClass('active-filter')

    })
    // Select all click function--------------------
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


    // ----------narine----click page link---------------
    $('body').on('click', '.pg-link', function(event){
    event.preventDefault()
    let limit=5;
    let page=$(this).attr('data-value')*1
  console.log(page)
    $('.pg-link').removeClass('active-link')
    $(this).addClass('active-link')
    
        period=''
        if($('#period').val()=='Last week'){
        period='7 DAY'
        }else if($('#period').val()=="Last months"){
             period='31 DAY'
        }else if($('#period').val()=="Last 3 months"){
            period='93 DAY'
        }else if($('#period').val()=="Last 6 months"){
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
                    url:'check_publication.php',
                    data:{filter,period, sport_type, producer, all_news,limit,page},
                    success:function(rezult){
                        let json=JSON.parse(rezult)
                  
                            $('#news').html(json.publication)
                            $('.pagination').html(json.pagination)
                    }
                })  

              }else{
                $.ajax({
                    type:'post',
                    url:'check_publication.php',
                    data:{filter, sport_type, producer, all_news, limit,page},
                    success:function(rezult){
                        let json=JSON.parse(rezult)
                        // console.log(rezult)
                            $('#news').html(json.publication)
                            $('.pagination').html(json.pagination)
                    }
                })  
              }
   
 })

})
// clicking for animate icon 
    $(document).on('click','.animate_x',function(){
 
       
        $(this).parent().parent().find('.block-ellipsis').toggleClass('show')
       
       
    })







// like dislike sytem

  $('body').on('click','.like-btn',function(){
        var post_id=$(this).data('id');
        $clicked_btn=$(this);
        if($clicked_btn.hasClass('fa-thumbs-o-up')){
            action='like';
        }else if($clicked_btn.hasClass('fa-thumbs-up')){
            action='unlike';
        }
     
        $.ajax({
            url:'check_like_dislike.php',
            type:'post',
            data:{
                'action':action,
                'post_id':post_id
                },
            success:function(data){
                if(data==10){
                    alert('For clicking like  buttons, you should login  first of all')
                }else{

                    res = JSON.parse(data);
             
                    if(action=='like'){
                        $clicked_btn.removeClass('fa-thumbs-o-up');
                        $clicked_btn.addClass('fa-thumbs-up');
                    }else if(action=='unlike'){
                        $clicked_btn.removeClass('fa-thumbs-up');
                        $clicked_btn.addClass('fa-thumbs-o-up');
                    }
                    
                     // display number  of likes aand dislikes in selected publications
                    $clicked_btn.siblings('span.likes').text(res.likes)
                    $clicked_btn.siblings('span.dislikes').text(res.dislikes)
             
                    $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
                }
            }
        })
    })
    $('body').on('click','.dislike-btn',function(){
        var post_id=$(this).data('id');
        $clicked_btn=$(this);
        if($clicked_btn.hasClass('fa-thumbs-o-down')){
            action='dislike';
        }else if($clicked_btn.hasClass('fa-thumbs-down')){
            action='undislike';
        }
     
        $.ajax({
            url:'check_like_dislike.php',
            type:'post',
            data:{
                'action':action,'post_id':post_id
            },
            success:function(data){
                if(data==10){
                    alert('For clicking dislike button, you should login  first of all')
                }else{

                    res = JSON.parse(data);
              
                    if(action=='dislike'){
                        $clicked_btn.removeClass('fa-thumbs-o-down');
                        $clicked_btn.addClass('fa-thumbs-down');
                    }else if(action=='undislike'){
                        $clicked_btn.removeClass('fa-thumbs-down');
                        $clicked_btn.addClass('fa-thumbs-o-down');
                    }
                    
                     // display number  of likes aand dislikes
                    $clicked_btn.siblings('span.likes').text(res.likes)
                    $clicked_btn.siblings('span.dislikes').text(res.dislikes)
                
                    $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
                }  
            }
        })
    })
</script>

</body>
</html>

