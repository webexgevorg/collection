<?php
    include "header.php";
    require_once "user-logedin.php";
?>
<body>
    <?php include "cookie.php"; ?>
    <section style="height: 100px"></section>
    <section class="section1 mt-5">
        <div class="my-5 container" style="min-height: 211px">
                <div id="chartContainer1" style="height: 370px; width: 50%; float: left"></div>
                <!-- <h4>Каличество Коллекций</h4> -->
                <div id="chartContainer2" style="height: 370px; width: 50%; float: left"></div>
                <!-- <h4>Зарегистрированные Пользобатели</h4> -->
            <?php include "Statics/total-statics.php "; ?>
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
</body>
</html>         