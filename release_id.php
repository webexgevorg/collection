<?php

    include "header.php";
    include "config/con1.php";
    require_once "user-logedin.php";

    $sql="SELECT * FROM base_checklist where realese_id='$_SESSION[release_id]'";
    $query=mysqli_query($con,$sql);
    $num=mysqli_num_rows($query);
//    $card=null;
//    while($tox = mysqli_fetch_assoc($query)){
//        $card.="<p class='ml-5 mr-1>".$tox['card_name']."</p>";
//
//    }



?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/release_id.css">
</head>
<body>
<?php include "cookie.php"; ?>

<section class="checklist_type" >
    <div class="d-flex  align-items-start justify-content-end checklist_type_column">
        <div class="d-flex flex-column mt-3 align-items-center justify-content-around baseboll">
            <div class="d-flex baseboll_pic p-1 align-items-center">
                <img class='img-fluid' src='images_release_id/Слой 3@2x.png'>
            </div>
            <div class="d-flex flex-column align-items-center release_icon">
                <img class='img-fluid' src='images_release_id/Заливка цветом 5 копия.png'>
                <h3 class="mt-1"><?= $num;?></h3>
            </div>
            <div class="d-flex flex-column align-items-center release_icon">
                <img class='img-fluid' src='images_release_id/Заливка цветом 1.png'>
                <h3 class="mt-1">34</h3>
            </div>
        </div>
    </div>
    <div class="checklist_type_column">
        <h3 class="p-4">release / checklist / baseball / 2020...</h3>
        <div class="release_type_content">
            <?= $card;?>
        </div>

    </div>
</section>


<?php
include "footer.php";
?>
<script>
    function f1(obj){
        let num=obj.innerHTML
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

</script>
</body>
</html>