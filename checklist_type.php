<?php

    include "header.php";
    include "config/con1.php";

    require_once "user-logedin.php";
    if(!isset($_SESSION['sport_id'])){
        ?>
        <script>
            window.location.href="release_checklist.php"
        </script>
      <?php

    }
    $sportid=$_SESSION['sport_id'];

    $sql="SELECT * FROM sports_type WHERE id=$sportid";
    $query = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($query);
    $picture=$row['sport_logo'];
    $sportname=$row['sport_type'];




?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/checklist_type.css">
</head>
<body>
<?php include "cookie.php"; ?>

<section class="checklist_type" >
    <div class="d-flex  align-items-start justify-content-end checklist_type_column">
        <div class="mt-3 baseboll">
            <div class="baseboll_pic p-3">
                <img class='img-fluid' src='admin/sport_icons/<?=$picture;?>.png'/>
                <h3 class="text-center" style="color:#FAD466"><?= $sportname;?></h3>
            </div>
            <div class="d-flex flex-column release_year">
                <div onclick="f1(this)">1900-1949</div>
                <div onclick="f1(this)">1950-1979</div>
                <div onclick="f1(this)">1980-1999</div>
                <div onclick="f1(this)">2000-2009</div>
                <div onclick="f1(this)">2010-2014</div>
                <div onclick="f1(this)">2015-2019</div>
                <div onclick="f1(this)">2020-2021</div>
            </div>
        </div>
    </div>
    <div class="checklist_type_column">
        <h3 class="p-4">release / checklist / baseball / 2020...</h3>
        <div class="checlist_type_content" id="year_of_release">
            <p class="ml-5 mr-1">2020 Bowman 1st Edition Baseball Cards</p>
            <p class="ml-5 mr-1">2020 Bowman Baseball Cards</p>
            <p class="ml-5 mr-1">2020 Bowman 1st Edition Baseball Cards when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has</p>
            <p class="ml-5 mr-1">2020 Bowman Baseball Cards</p>
            <p class="ml-5 mr-1">2020 Bowman 1st Edition Baseball Cards</p>
            <p class="ml-5 mr-1">2020 Bowman Baseball Cards</p>
        </div>

    </div>
</section>


<?php
include "footer.php";
?>
    <script>
        function f1(obj){
            let num=$(obj).html()
            let numsplit=num.split('-')

            $.ajax(
                {  type:'POST',
                    url:'check_sporttype.php',
                    data:{split1:numsplit[0],split2:numsplit[1]},
                    success:function(rezult){
                        $('#year_of_release').html(rezult)
                    }
                }
            )
        }

        function sort(obj){
          let rel_id = $(obj).attr('data-id')
            $.ajax({
                type:'POST',
                url:'check_sporttype.php',
                data:{release_id:rel_id},
                success:function(rezult){
                   window.location.href= "release_id.php"

                }
            })
        }

    </script>
</body>
</html>