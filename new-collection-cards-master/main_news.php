<?php
include "header.php";
include "config/con1.php";


?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
<link rel="stylesheet" href="css/pagination.css">
</head>
</head>
<body>
<?php include "cookie.php"; ?>
<section class=" p-2 news">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center news_filter">
            
        <div class="d-flex flex-column news_second">
            <div class="d-flex justify-content-between">
                <div><h1 class="font-weight-bold">Main news</h1></div>
                
            </div>
            <div id="news">
               
            </div>
            <div class="pagination_section">

            </div>
        </div>
    </div>
    </div>
</section>
<?php
include "footer.php";
?>
<script>

load_data() 

    function load_data(page){
        $.ajax({
            type:'post',
            url:'check_main_news.php',
            data:{page},
            success:function(rezult){
               
                let json=JSON.parse(rezult)
                       
                            $('#news').html(json.main_news)
                            $('.pagination_section').html(json.pagination)
            }
        })

    }
    $(document).on('click','.pg-link',function(event){
        event.preventDefault()
        let page=$(this).attr('data-value')*1
      
        load_data(page)
    })
 </script>
</body>
</html>
