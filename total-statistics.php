<?php
    include "header.php";
    if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
        if(!empty($_COOKIE['user'])){
            $user_id=$_COOKIE['user'];
        }
        if(!empty($_SESSION['user'])){
            $user_id=$_SESSION['user'];
        }
    }
?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/my_checklist.css">
    <link rel="stylesheet" type="text/css" href="css/statistics.css">

</head>
<body>
    <?php include "cookie.php"; ?>
    <section class="hide_div"></section>
    <section class="section1 mt-5">
        <h3 class="text-center mb-5 font">TOTAL STATISTICS</h3>
        <div class="my-5 container statistics-container">
            <div class="statistics">
                <div id="collections" ></div>
                <p class="statistics-text">Number of Collections</p>
            </div>

           <div class="statistics">
               <div id="number_checklist"></div>
               <p class="statistics-text">Number of Checklists</p>
           </div>

            <div class="statistics">
                <div id="users"></div>
                <p class="statistics-text">Registered Users</p>
            </div>

            <div class="statistics">
                <div id="active_users_week"></div>
                <p class="statistics-text">Active users</p>
            </div>

            <?php include "Statics/total-statics.php"?>
        </div>
    </section>
    

<script>
    window.onload = function() {
    var chart = new CanvasJS.Chart("collections", {
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
            dataPoints: <?php echo json_encode($sport_statics_array, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();

    var chart1 = new CanvasJS.Chart("users", {
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
            dataPoints: <?php echo json_encode($users_statics_array, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart1.render();

    var chart2 = new CanvasJS.Chart("active_users_week", {
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
            dataPoints: <?php echo json_encode($users_active_statistics, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart2.render();

    var chart3 = new CanvasJS.Chart("number_checklist", {
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
            dataPoints: <?php echo json_encode($checklists_array, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart3.render();

    var chart4 = new CanvasJS.Chart("users123", {
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
            dataPoints: <?php echo json_encode($checklists_array, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart4.render();


 $('.canvasjs-chart-credit').addClass('d-none')
 }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php include "footer.php ";?>
</body>
</html>         