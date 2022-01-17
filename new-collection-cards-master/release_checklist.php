<?php
include "header.php";
include "config/con1.php";

require_once "user-logedin.php";

$k='';
$sql = "SELECT *FROM collections";
$query = mysqli_query($con, $sql);
$qanak = mysqli_num_rows($query);
if ($qanak) {
    $k=$qanak;
}
$t='';
$sql1 = "SELECT *FROM base_checklist";
$query1 = mysqli_query($con, $sql1);
$qanak1 = mysqli_num_rows($query1);
if ($qanak1) {
    $t=$qanak1;
}


?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/release_checklist.css">


</head>
<body>
<?php include "cookie.php"; ?>

    <section class="rel_checklist" >
            <div class="d-flex flex-column  align-items-end rel_checklist_column">
                <div class="column_first">
                    <div class="item" id="first_item">
                        <img src="images_rel_checklist/Заливка цветом 4.png"/>
<!-- collections row  count -->
                        <h3 id="k"> <?= $k;?> </h3>
                    </div>
                    <div class="item" id="second_item">
                        <img class="img-responsive" src="images_rel_checklist/Заливка цветом 5 копия.png"/>
                        <!-------- base_checklist row  count -------------------->
                        <h3> <?= $t;?> </h3>
                    </div>

                </div>
            </div>
            <div class="rel_checklist_column">
             <div class="d-flex flex-column checklist_flex">
                    <h1 class="text-center my-4">RELEASES/CHECKLISTS</h1>

                <div class="d-flex flex-wrap first_flex">
                    <?php
                        $sql="SELECT * FROM  sports_type";
                        $query=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_assoc($query)){

                         echo  "<div class='item1'id=$row[id]>
                           <img class='img-fluid' src='admin/sport_icons/".$row['sport_logo'].".png'/>
                           <h3>".$row['sport_type']."</h3>
                          </div>";
                        }
                    ?>

                   </div>
                </div>
            </div>

    </section>


<?php
include "footer.php";
?>
<script>

$(document).on('dblclick','.item1',function(){

    $.ajax({
        type: 'POST',
        url: "check_sporttype.php",
        data:{sport_id: $(this).attr('id')},
        success:function(rezult) {
           // $('#k').html(rezult)
            console.log(rezult)
            window.location.href='checklist_type.php?data_first=2020&&data_second=2021'
        }
    })


})


    $item_block=$('.item1')
    $item=$('.item1').length
    for($i=0;$i<$item;$i++){
        $item_block[$i].onclick=function(){
            $(this).css('background','grey')
            $(this).siblings().css('background','#6EA4AE')

            var sports= $(this).find('h3').text()
                    $.ajax({
                        type: 'POST',
                        url: "check_sporttype.php",
                        data:{sport_name: sports},
                        success:function(rezult) {
                            $('#k').html(rezult)
                        }
                    })
        }


    }


    // $('.item1').click(function(){
    //     $('.item1').removeClass('active')
    //     $(this).addClass('active')
    // })
    //SELECT id FROM `base_checklist` WHERE realese_id IN (SELECT id FROM collections WHERE sport_type='Baseball' )


</script>

</body>
</html>
