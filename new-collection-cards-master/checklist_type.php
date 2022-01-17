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

    $sql = "SELECT * FROM sports_type WHERE id=$sportid";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($query);
    $picture = $row['sport_logo'];
    $sportname=$row['sport_type'];
    $data='';

//if(isset($_GET['data_id'])&& !isset($_GET['data_first']) &&!isset($_GET['data_second'])){
//    $data = $_GET['data_id'];
//    $sql1="SELECT * FROM base_checklist where realese_id='$data '";
//    $query1=mysqli_query($con,$sql1);
//    $num=mysqli_num_rows($query1);
//    $sql2="SELECT * FROM collections where id='$data '";
//    $query2=mysqli_query($con,$sql2);
//    $tox=mysqli_fetch_assoc($query2);
//    $pic=$tox['image'];
//   };
if(isset($_GET['data_first']) && isset($_GET['data_second'])){
    $_SESSION['data_first']=$_GET['data_first'];
    $_SESSION['data_second']=$_GET['data_second'];
}

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



               
                   <div class='mt-3   baseboll'>
                        <div class='baseboll_pic p-3'>
                            <img class='img-fluid' src='admin/sport_icons/<?php echo $picture; ?>.png'/>
                             <h3 class='text-center' style='color:#FAD466'><?php echo $sportname; ?></h3>
                        </div>
                        <div class='d-flex flex-column release_year'>
                            <div class='year <?php echo $_GET['data_first']=='1900' ? 'active1': ''?>'><a href='checklist_type.php?data_first=1900&&data_second=1949'>1900-1949</a></div>
                            <div class='year <?php echo $_GET['data_first']=='1950' ? 'active1': ''?>'><a href='checklist_type.php?data_first=1950&&data_second=1979'>1950-1979</a></div>
                            <div class='year <?php echo $_GET['data_first']=='1980' ? 'active1': ''?>'><a href='checklist_type.php?data_first=1980&&data_second=1999'>1980-1999</a></div>
                            <div class='year <?php echo $_GET['data_first']=='2000' ? 'active1': ''?>'><a href='checklist_type.php?data_first=2000&&data_second=2009'>2000-2009</a></div>
                            <div class='year <?php echo $_GET['data_first']=='2010' ? 'active1': ''?>'><a href='checklist_type.php?data_first=2010&&data_second=2014'>2010-2014</a></div>
                            <div class='year <?php echo $_GET['data_first']=='2015' ? 'active1': ''?>'><a href='checklist_type.php?data_first=2015&&data_second=2019'>2015-2019</a></div>
                            <div class='year <?php echo $_GET['data_first']=='2020' ? 'active1': ''?>'><a href='checklist_type.php?data_first=2020&&data_second=2021'>2020-2021</a></div>
                        </div>
                    </div>


    </div>
    <div class="checklist_type_column">
        <h3 class="p-4">release / checklist / baseball / 2020...</h3>
        <div class="checlist_type_content" id="year_of_release">
<!--   estex arag enq gnum clicov scripty nerqevum grvac e          -->
            <?php
                if(isset($_GET['data_first']) &&isset($_GET['data_second'])){
                     $sql1 = "SELECT * FROM  collections WHERE sport_type IN (SELECT sport_type FROM sports_type where id = $sportid) and year_of_releases BETWEEN '$_GET[data_first]'  and '$_GET[data_second]'";
                     $query1 = mysqli_query($con, $sql1);
                     while($tox = mysqli_fetch_assoc($query1)) {
                         echo "<p class='ml-5 mr-1 sort' data-id='".$tox['id']."' onclick='sort(this)'>". $tox['year_of_releases']. "-" . $tox['name_of_collection'] . "</p>";
//                        echo "<a class='ml-5 mb-1 mt-1' href='?data_id=".$tox['id']."'>". $tox['year_of_releases']. "-" . $tox['name_of_collection'] . "</a><br/>";
                    }
                }
                else{
                    $sql1 = "SELECT * FROM  collections WHERE sport_type IN (SELECT sport_type FROM sports_type where id = $sportid) and year_of_releases BETWEEN '2020'  and '2021'";
                    $query1 = mysqli_query($con, $sql1);
                    while($tox = mysqli_fetch_assoc($query1)) {
                        echo "<a class='ml-5 mb-1 mt-1' href='?data_id=".$tox['id']."'>". $tox['year_of_releases']. "-" . $tox['name_of_collection'] . "</a><br/>";
                    }
                }
            ?>
            
          

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
            $data1=$(obj).attr('data-id')

            $.ajax({
                type:"POST",
                url:"check_sporttype.php",
                data:{collection_id:$data1},
                success:function(){
                    window.location.href="release_id.php"
                }
            })

        }


    </script>
</body>
</html>