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
            <!-- <div class="mx-auto news_first">
               
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
                        <p><input type="checkbox" id="all" value="Select All"class="all_news"><span class="ml-1">Select All</span></p>
                    </div>
                    </div>
                </div>
        
    </div>
    <button  data-attr="filter" class='my-2 py-1 px-5 item_button filter h5' >Filter</button>
        



        </div> -->
        <div class="d-flex flex-column news_second">
            <div class="d-flex justify-content-between">
                <div><h1 class="font-weight-bold">Main news</h1></div>
                
            </div>
            <div id="news">
               
            </div>
        </div>
    </div>
    </div>
</section>
<?php
include "footer.php";
?>
<script>

// $(document).ready(function(){
//     function filter_data(obj){
//         period=''
//         if($('#period').val()=='Last week'){
//         period='7 DAY'
//         }else if($('#period').val()=="Last months"){
//              period='31 DAY'
//         }else if($('#period').val()=="Last 3 months"){
//             period='93 DAY'
//         }else if($('#period').val()=="Last 6 months"){
//             period='186 DAY'
//         }else{
//             period='All news'
//         }
//               var filter=obj
//               var sport_type = get_filter('sport_type');
//               var producer = get_filter('producer');
//               var all_news = get_filter('all_news');
//               if(filter=="filter"){
//                     $.ajax({
//                     type:'post',
//                     url:'checknews.php',
//                     data:{filter,period, sport_type, producer, all_news},
//                     success:function(rezult){
//                         console.log(rezult)
//                             $('#news').html(rezult)
//                     }
//                 })  

//               }else{
//                 $.ajax({
//                     type:'post',
//                     url:'checknews.php',
//                     data:{filter, sport_type, producer, all_news},
//                     success:function(rezult){
//                         console.log(rezult)
//                             $('#news').html(rezult)
//                     }
//                 })  
//               }
       
           
//     }

//     function get_filter(class_name){
//         var filter=[]
       
//         $('.'+class_name+':checked').each(function(){
//             if($(this).val() == "Select All"){
                
//                 // filter.push("Portal News","Manufacture News","Releaes News","Sports News","Other News")
//             }
//             else{
//                 filter.push($(this).val())
//             }

            
//         })
        
//         return filter;
//     }


//     $('.filter').on('click',function(){
//         var filter=$(this).attr('data-attr')
//         filter_data(filter)
//     })
    
//     $('#all').on('change',function(){
        
//         if($('#all').prop('checked')==true){
      
//             $('.all_news').each(function(){
               
//                 $(this).prop('checked',true)
//             })
//         }else{
//             $('.all_news').each(function(){
               
//                $(this).prop('checked',false)
//            })
        
//         }
      
//     })
//     // ---------------------newest --oldest--------------
    


//     $('.Newest').on('click',function(){
//         var filterNews=$(this).attr('data-attr')
//         filter_data(filterNews)
//     })

// })  
load_data() 
    function load_data(page){
        $.ajax({
            type:'post',
            url:'check_main_news.php',
            data:{page},
            success:function(rezult){
                $('#news').html(rezult)
            }
        })

    }
    $(document).on('click','.pagination_link',function(){
        var page=$(this).attr('id');
        console.log(page)
        load_data(page)
    })
 </script>
</body>
</html>
