<?php

    include "header.php";
    include "config/con1.php";
    require_once "user-logedin.php";

if(isset($_GET['name'])) {

    $sql = "SELECT * FROM base_checklist where realese_id='$_GET[name]'";
    $query = mysqli_query($con, $sql);
    $num = mysqli_num_rows($query);
}

?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/custom_checklist_namefff.css">
</head>
<body>
<?php include "cookie.php"; ?>

<section class="d-flex  custom_checklist_name">


<div class="d-flex flex-wrap container" style="padding-right: 0;padding-left: 0">
    <div class="d-flex dv1">
        <div class="d-flex flex-column align-items-center justify-content-around name_one">
            <div class="d-flex baseboll_pic">
                <img class='img-fluid' src='<?php

                $sql = "SELECT * FROM collections WHERE  id='$_GET[name]'";
                $query = mysqli_query($con, $sql);
                if ($query) {
                    $tox = mysqli_fetch_assoc($query);
                    echo "images/" . $tox['image'];
                }

                ?>'>
            </div>
            <div class=" d-flex flex-column align-items-center baseboll_pic_after">

                <div class="d-flex flex-column align-items-center m-2 release_icon">
                    <img class='img-fluid' src='images_release_id/Заливка цветом 5 копия.png'>
                    <h3 class="mt-1 text-center" id="num"><?= $num;?></h3>
                </div>

                <div class="d-flex flex-column align-items-center m-2 release_icon">
                    <img class='img-fluid' src='images_release_id/Заливка цветом 1.png'>
                    <h3 class="mt-1 text-center" id="h3">34</h3>
                </div>
            </div>



        </div>
    </div>
    <div class="checklist_name name_two dv2">
            <h1 class="text-center p-2">RELEASES/CHECKLISTS/Baseball/2020 ...</h1>
            <div class="text-center p-3 name_three">CUSTOM CHECKLIST NAME</div>

        <input id="inp" placeholder="Search something">




        <table id="bootstrap-table-2" class="table table-responsive table-hover sm">
            <thead>
            <tr>
                <th data-field="id" class="text-center id">ID</th>
                <th data-field="id" class="text-center cardnumber">Card number<br/>

                </th class="text-center">
                <th data-field="Card number" class="text-center cardname" >Card name<br/>

                </th class="text-center cardnumber">
                <th data-field="Card name"  class="text-center team">Team<br/>

                </th>
                <th data-field="Parallel"class="text-center parallel">Parallel<br/>

                </th>
                <th data-field="Print run" class="text-center printrun">Print run<br/>

                </th>
            <tr>
                <th data-field="id" class="text-center id"></th>
                <th data-field="id" class="text-center cardnumber">

                    <div class="input-group">
                        <input class="form-control" type="text"  id="card_number" placeholder="Search" aria-label="Search">
                        <button class="btn btn-srch" style="border-radius:0;">
                            <i class="fa fa-search btn" aria-hidden="true"></i>
                        </button>
                    </div>
                </th class="text-center">
                <th data-field="Card number" class="text-center cardname" >


                    <div class="input-group">
                        <input class="form-control" type="text"  id="card_name" placeholder="Search" aria-label="Search">
                        <button class="btn btn-srch" style="border-radius:0;">
                            <i class="fa fa-search btn" aria-hidden="true"></i>
                        </button>
                    </div>
                </th class="text-center cardnumber">
                <th data-field="Card name"  class="text-center team">


                    <div class="input-group">
                        <input class="form-control" type="text"  id="team" placeholder="Search" aria-label="Search">
                        <button class="btn btn-srch" style="border-radius:0;">
                            <i class="fa fa-search btn" aria-hidden="true"></i>
                        </button>
                    </div>
                </th>
                <th data-field="Parallel"class="text-center parallel">


                    <div class="input-group">
                        <input class="form-control" type="text"  id="parallel" placeholder="Search" aria-label="Search">
                        <button class="btn btn-srch" style="border-radius:0;">
                            <i class="fa fa-search btn" aria-hidden="true"></i>
                        </button>
                    </div>
                </th>
                <th data-field="Print run" class="text-center printrun">


                    <div class="input-group">
                        <input class="form-control" type="text"  id="print_run" placeholder="Search" aria-label="Search">
                        <button class="btn btn-srch" style="border-radius:0;">
                            <i class="fa fa-search btn" aria-hidden="true"></i>
                        </button>
                    </div>
                </th>

            </thead>

            <tbody id="dinamic_content">


            </tbody>

        </table>
            <div id="tfooter"></div>
    </div>
</div>
    </div>
</section>
<?php
include "footer.php";
?>
<script src="js/custom_checklist_namefff.js"></script>
<!--<script src="js/newfetch.js"></script>-->


</script>
</body>
</html>
