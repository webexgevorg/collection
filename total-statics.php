<?php
    include "header.php";
    require_once "user-logedin.php";
    if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
        if(!empty($_COOKIE['user'])){
            $user_id=$_COOKIE['user'];
        }
        if(!empty($_SESSION['user'])){
            $user_id=$_SESSION['user'];
        }
    }
?>

    <link rel="stylesheet" type="text/css" href="css/statistics.css">

</head>
<body>
    <?php include "cookie.php"; ?>
    <section style="height: 100px"></section>
    <section class="section1 mt-5">
        <h3 class="text-center mb-5 ">TOTAL STATISTICS</h3>
        <div class="my-5 container" style="min-height: 400px">
            <div style="height: 370px; width: 50%; float: left; display: flex; flex-wrap: wrap; flex-direction: column-reverse">
                <div id="chartContainer1" style="width: 100%; height: 80%;"></div>
                <h4 style="text-align:center; margin-bottom: 25px">Каличество Коллекций</h4>
                
            </div>
            <div style="height: 370px; width: 50%; float: left; display: flex; flex-wrap: wrap; flex-direction: column-reverse">
                <div id="chartContainer2" style="width: 100%; height: 80%;"></div>
                <h4 style="text-align:center; margin-bottom: 25px">Зарегистрированные Пользобатели</h4>
                
            </div>
            <?php include "Statics/total-statics.php"?>
        </div>
    </section>
    





<script>
    window.onload = function() {
    var chart = new CanvasJS.Chart("chartContainer1", {
        theme: "light2",
        animationEnabled: true,
        title: {
            text: ""
        },
        data: [{
            type: "doughnut",
            indexLabel: "{symbol} - {y}",
            yValueFormatString: "#,##0.0\"%\"",
            showInLegend: true,
            legendText: "{label} : {y}",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();

    var chart1 = new CanvasJS.Chart("chartContainer2", {
        theme: "light2",
        animationEnabled: true,
        title: {
            text: ""
        },
        data: [{
            type: "doughnut",
            indexLabel: "{symbol} - {y}",
            yValueFormatString: "#,##0.0\"%\"",
            showInLegend: true,
            legendText: "{label} : {y}",
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart1.render();
 $('.canvasjs-chart-credit').addClass('d-none')
 }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php include "footer.php ";?>
</body>
</html>         