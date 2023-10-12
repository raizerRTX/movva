<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/traffic_offense/admin/inc/DBConnection.php');
    date_default_timezone_set('Asia/Manila');
?>

<!DOCTYPE html>

    <title>Public Site </title>

        <head>
            <meta content="width=device-width, initial-scale=1" name="viewport" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
            <link rel = "stylesheet" href = "/traffic_offense/assets/css/public.css">
            <link rel="stylesheet" href="https://use.typekit.net/oov2wcw.css">
            <link rel="stylesheet" href="/traffic_offense/plugins/linear-progress-indicator-bar/dist/css/jquery.rprogessbar.css">
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

            <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap');
            :root {
                --body-font: 'Poppins', sans-serif;
            }

            .button {
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
                border: 1px solid black;
                font-family: var(--body-font);
                border-radius: 20px;
            }
            .button1 {
                margin-top: 1rem;
                background-color: #d93025;
                color: black;
                border: 1px solid #d93025;
            }
            a:link {
                 color: white;
                 background-color: transparent;
                 text-decoration: none;
            }
            a:visited {
                color: white;
                background-color: transparent;
                text-decoration: none;
                }

            a:hover {
                color: white;
                background-color: transparent;
                text-decoration: underline;
            }

             a:active {
                color: white;
                background-color: transparent;
                text-decoration: underline;
            }
            </style>
        </head>
    
    <body>
        <nav id="navbar" class="nav">
            <div class="logo">
                <img src="/traffic_offense/uploads/logo.png" alt="text" width="100%" height="100%">
            </div>

            <div class="nav-text">
                <h2 style="color: white; font-family: Century Gothic" id="title">MOVVA</h2>
            </div>

            <div class="separator"></div>

            <div class="nav-date">
                <h3 style="color: white; font-family: Century Gothic" id="date"></h3>
            </div>
        </nav>
        <button type="button" class="button button1"><a href="demo.php">Check Ticket</a></button>
        <div class="container">
            <div class="first-box">
                <div class="total-violator">
                    <div class="header">
                        <img src="/traffic_offense/dist/img/icons8-futures-48.png" alt="signal.png" style="height:50%;margin-left: 10px;">
                        <h2 class="header-text" style="margin-left: 1rem;">Total Violator as of Year <?php echo $current_year = date('Y') ?></h2>
                    </div>
                    <div class="panel">
                        <span>
                            <h1 id="total_violator" style="cursor:pointer;">
                                <?php 
                                    $current_year = date('Y');
                                    $total = $conn->query("SELECT DISTINCT(driver_id) FROM `offense_list` WHERE YEAR(date_created) = '{$current_year}'")->num_rows;
                                    echo number_format($total);
                                ?>
                            </h1>
                        </span>
                    </div>
                </div>
                <div class="violations-summary">
                    <div class="header">
                        <img src="/traffic_offense/dist/img/icons8-futures-48.png" alt="signal.png" style="height:50%; margin-left: 10px;">
                        <h2 class="header-text" style="margin-left: 1rem;">Violations Summary</h2>
                    </div>
                    <div class="panel" id="summary" style="cursor:pointer;">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="second-box">
                <div class="top-place" id="top_place" style="cursor:pointer">
                    <div class="header" style="height: 10%; justify-content: center;">
                        <h3 class="header-text">Top Place where violators live</h3>
                    </div>
                    <div class="panel">
                        <canvas id="barChart" style="width: 100%; height: 90%;"></canvas>
                    </div>
                </div>

                <div class="cluster-box">
                    <div class="box" id = "prone_place_panel">
                        <div class="header" style="height: 15%; justify-content: center;">
                            <img src="/traffic_offense/dist/img/icons8-futures-48.png" alt="signal.png" style="height:50%; margin-left: 5px;">
                            <h3 class="header-text" id="header_4" style="margin-left: 5px;">Prone Places</h3>
                        </div>
                        <div class="panel">
                            <span><h4 id="prone_place"></h4></span>
                        </div>
                    </div>

                    <div class="box" id="driver_listed">
                        <div class="header" style="height: 20%; justify-content: center;">
                            <img src="/traffic_offense/dist/img/icons8-futures-48.png" alt="signal.png" style="height:50%; margin-left: 5px;">
                            <h4 class="header-text" id="header_1" style="margin-left: 5px;">Driver Listed Today</h4>
                        </div>
                        <div class="panel">
                            <span>
                                <h3>
                                    <?php 
                                        $current_date = date('Y-m-d');
                                        $total = $conn->query("SELECT DISTINCT (`driver_id`) AS 'List' FROM `offense_list` WHERE DATE(date_created) = '" . date('Y-m-d') ."'")->num_rows;
                                        echo number_format($total);
                                    ?>
                                </h3>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="cluster-box">
                    <div class="box" id="vehicle_type_panel">
                        <div class="header" style="height: 15%; justify-content: center;">
                            <img src="/traffic_offense/dist/img/icons8-futures-48.png" alt="signal.png" style="height:50%; margin-left: 5px;">
                            <h3 class="header-text" id="header_3" style="margin-left: 5px;">Vehicle Type</h3>
                        </div>
                        <div class="panel">
                            <span><h3 id="vehicle_type"></h3></span>
                        </div>
                    </div>

                    <div class="box">
                        <div class="header" style="height: 20%; justify-content: center;">
                            <img src="/traffic_offense/dist/img/icons8-futures-48.png" alt="signal.png" style="height:50%;">
                            <h4 class="header-text" id="header_2" style="margin-left: 2px;">Total Violation Today</h4>
                        </div>
                        <div class="panel">
                            <span>
                                <h3>
                                    <?php 
                                        $offense = $conn->query("SELECT * FROM `offense_list` where date(date_created) = '".date('Y-m-d')."' ")->num_rows;
                                        echo number_format($offense);
                                    ?>
                                </h3>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="top-violation">
                    <div class="header" style="height: 10%;">
                        <img src="/traffic_offense/dist/img/icons8-futures-48.png" alt="signal.png" style="height:50%; margin-left: 10px;">
                        <h2 class="header-text" style="margin-left: 10px">Total Violation</h2>
                    </div>
                    <div class="panel" id="total-violation-chart">
                        <div class="chart-area">
                            <canvas id="doughnutChart" style="width: 90%; height: 90%;"></canvas>
                        </div>
                        <div id="label_area" class="label-area">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="gender-chart">
                <div class="header" style="height: 10%;">
                    <img src="/traffic_offense/dist/img/icons8-futures-48.png" alt="signal.png" style="height:50%; margin-left: 10px;">
                    <h3 class="header-text" style="margin-left: 10px">Sex Chart</h3>
                </div>
                <canvas id="genderChart" style="width: 90%; height: 70%;"></canvas>
            </div>

            <div class="age-chart">
                <div class="header" style="height: 10%;">
                    <img src="/traffic_offense/dist/img/icons8-futures-48.png" alt="signal.png" style="height:50%; margin-left: 10px;">
                    <h3 class="header-text" style="margin-left: 10px">Age Chart</h3>
                </div>
                <canvas id="ageChart" style="width: 90%; height: 70%;"></canvas>
            </div>

            <div class="vehicle-class">
                <div class="header" style="height: 10%;">
                    <img src="/traffic_offense/dist/img/icons8-futures-48.png" alt="signal.png" style="height:50%; margin-left: 10px;">
                    <h3 class="header-text" style="margin-left: 10px">Vehicle Class Chart</h3>
                </div>
                <canvas id="vehicleChart" style="width: 90%; height: 70%;"></canvas>
            </div>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-nav">
                    <span id="close_btn" class="close">&times;</span>
                </div>

                <div class="date_panel">
                    <select name="select_date" id="select_date" class="sel2 select-2" style="width: 60%; height: 70%">
                        <!-- <option value="all">All Year</option> -->
                    </select>
                </div>

                <div id="content" class="modal-graph">
                    
                </div>
            </div>
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <script src="/traffic_offense/plugins/linear-progress-indicator-bar/dist/js/jQuery.rProgressbar.js"></script>

    <script>
        let c = "";
        $(document).ready(function() {
            var d = new Date();
            var options = {   
                month: 'long', 
                day: 'numeric',
                year: 'numeric'
            };

            $("#date").html(d.toLocaleDateString('en-US', options) + " " + d.toLocaleTimeString());
            barChart();
            lineChart();
            getTotalViolation();
            pronePlace();
            topVehicleType();
            genderChart();
            ageChart();
            vehicleChart();

            $(".sel2").select2();
        });

        function pronePlace() {
            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/get_top_prone_place.php", 
                dataType: "json",
                success: function(res) {
                    $("#prone_place").text("1. " + res);
                }
            });
        }

        function topVehicleType() {
            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/get_top_vehicle_type.php", 
                dataType: "json",
                success: function(res) {

                    if (res == "") {
                        $("#vehicle_type").text("N/A");
                    } else {
                        $("#vehicle_type").text(res);
                    }
                }
            });
        }

        function genderChart() {
            var labelHeader = ['Male', 'Female'];
            var color = ['#33C1EE', '#1A5D92'];
            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/gender.php", 
                dataType: "json",
                success: function(res) {
                    console.log(res);
                    new Chart("genderChart", {
                        type: "doughnut",
                        data: {
                            labels: labelHeader,
                            datasets: [{
                                backgroundColor: color,
                                data: res,
                                //label: labels,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            devicePixelRatio: 5,
                            radius: "60%",
                            cutout: "55%",
                            legend: {
                                display: false
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            },
                            hoverBorderColor: color,
                            hoverBorderWidth: 1
                        },
                        
                    });
                }
            });
        }

        function ageChart() {
            var labelHeader = ['Teenager (18-20 yrs.old)', 'Adult (21-39 yrs.old)', 'Middle Age (40-59 yrs.old)', 'Senior (60+ yrs.old)'];
            var color = ['#1A5D92', '#DF607C', '#C5F259', '#AD8EF9'];

            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/age.php", 
                dataType: "json",
                success: function(res) {
                    console.log(res);

                    new Chart("ageChart", {
                        type: "pie",
                        data: {
                            labels: labelHeader,
                            datasets: [{
                                backgroundColor: color,
                                data: res,
                                //label: labels,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            devicePixelRatio: 5,
                            radius: "60%",
                            legend: {
                                display: false
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            },
                            hoverBorderColor: color,
                            hoverBorderWidth: 1
                        },
                        
                    });
                }
            });
        }

        function vehicleChart() {
            var labelHeader = ['Public Vehicle', 'Private Vehicle'];
            var color = ['#3F6AB5', '#ED7D31'];

            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/vehicle.php", 
                dataType: "json",
                success: function(res) {
                    console.log(res);

                    new Chart("vehicleChart", {
                        type: "pie",
                        data: {
                            labels: labelHeader,
                            datasets: [{
                                backgroundColor: color,
                                data: res,
                                //label: labels,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            devicePixelRatio: 5,
                            radius: "60%",
                            legend: {
                                display: false
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            },
                            hoverBorderColor: color,
                            hoverBorderWidth: 1
                        },
                        
                    });
                }
            });
        }

        function barChart() {
            var area = new Array();
            var violator = new Array();
            var count = new Array();

            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/get_area.php", 
                dataType: "json",
                success: function(res) {
                    //check if there is duplicate entries
                    $.each(res.area, function(i, el){
                        if($.inArray(el, area) === -1) area.push(el);
                    });

                    $.each(res.violatorCount, function(i, el){
                        violator.push(el);
                    });

                    for (var i = 0; i < area.length; i++) {
                        count[i] = violator[0][area[i]];
                    }

                    var maxValue = Math.max.apply(Math, count);
                    var index = count.indexOf(maxValue);
                    var maxArea = area.at(index);

                    console.log(index);
                    console.log(maxArea);

                    var barColors = ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(255, 205, 86, 0.2)', 'rgba(255, 159, 64, 0.2)'];
                    var borderColors = ['rgb(75, 192, 192)', 'rgba(153, 102, 255)', 'rgba(255, 99, 132)', 'rgba(255, 205, 86)', 'rgba(255, 159, 64)'];

                    new Chart("barChart", {
                        type: "bar",
                        data: {
                            labels: area,
                            datasets: [{
                                backgroundColor: barColors,
                                borderColor: borderColors,
                                borderWidth: 1,
                                data: count,
                                label: ""
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            devicePixelRatio: 5,
                            legend: {
                                display: false
                            },
                            barThickness: 40,
                            borderRadius: 5
                        }
                    }); 
                }
            });
        }

        function lineChart() {

            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/get_violation_summary.php", 
                dataType: "json",
                success: function(res) {
                    //check if there is duplicate entries
                    console.log(res);
                    var barColors = ['rgba(75, 192, 192, 0.2)'];
                    var borderColors = ['rgb(75, 192, 192)'];

                    new Chart("lineChart", {
                        type: "line",
                        data: {
                            labels: res.date,
                            datasets: [{
                                backgroundColor: barColors,
                                borderColor: borderColors,
                                data: res.count,
                                label: "",
                                tension: 0.5
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            devicePixelRatio: 4,
                            legend: {
                                display: false
                            },
                            autoSkip: true,
                            alignToPixels: true,
                            responsiveAnimationDuration: 2,
                            scales: {
                                y: {
                                    beginAtZero: true
                                },
                                display: true,
                            }
                        }
                    }); 
                }
            });
        }

        function getTotalViolation() {
            var offenseName = new Array();
            var yValue = new Array();
            var v = new Array();
            v = yValue;
            var colorArray = new Array();

            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/get_offenses.php", 
                dataType: "json",
              
                success: function(res) {
                    //check if there is duplicate entries
                    $.each(res, function(i, el){
                        if($.inArray(el, offenseName) === -1) offenseName.push(el);
                    }); 

                    $.ajax({
                        type: "POST", 
                        url: "inc/get_offense_count.php", 
                        data: {"names": offenseName},
                        dataType: 'json',
                      
                        success: function(dataArr) {

                            $.each(dataArr.offenseCount, function(i, e){
                                yValue.push(e);
                            });   
                        
                            $.each(dataArr.color, function(i, el){
                                colorArray.push(el);
                            });   
                            

                            console.log(v);
                            console.log(offenseName);

                            var maxValue = Math.max.apply(Math, v);
                            var index = v.indexOf(maxValue);
                            var maxViolation = offenseName.at(index);

                            for(var i = 0; i < offenseName.length; i++) {
                                $("#label_area").append(
                                    `<div class="legend_box" onmouseover="t(` + i +  `)" style="cursor: pointer">
                                        <span class="color-box" style="background-color:` + colorArray[i] + `"></span>
                                        <div class="legend-text" style="margin-left: 10px;">
                                            <h4 style="font-size: x-small"; font-family: Century Gothic;> ` + offenseName[i] + `</h4>
                                        </div>
                                    </div>`
                                );
                            }

                            circleChart(colorArray, offenseName, v, v.reduce((a, b) => a + b, 0))
                        }
                    });
                }
            }); 
        }

        function circleChart(color, labels, data, total) {
            var barColors = ['rgba(75, 192, 192, 0.2)'];
            var borderColors = ['white'];

            c = new Chart("doughnutChart", {
                type: "doughnut",
                data: {
                    //labels: labels,
                    datasets: [{
                        backgroundColor: color,
                        borderColor: borderColors,
                        data: data,
                        //label: labels,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    devicePixelRatio: 5,
                    radius: "80%",
                    cutout: "65%",
                    legend: {
                        display: false
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    hoverBorderColor: color,
                    hoverBorderWidth: 2
                },
                plugins: [{
                    id: 'doughnutChart',
                    beforeDraw: (chart) => {
                        let width = chart.width;
                        let height = chart.height;
                        let ctx = chart.ctx;

                        ctx.restore();
                        let fontSize = (height / 114).toFixed(2);
                        ctx.font = fontSize + " Century Gothic";
                        ctx.textBaseline = "middle";

                        let text = "Total Violation: " + total;
                        let textX = Math.round((width - ctx.measureText(text).width) / 2);
                        let textY = height / 1.90;
                                
                        ctx.fillText(text, textX, textY);
                        ctx.save();
                    }
                }]
            }); 
        }

        function modalTotalViolator() {
            var year = new Date().getFullYear();
            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/get_total_violator_summary.php", 
                dataType: "json",
              
                success: function(res) {
                    var barColors = ['rgba(75, 192, 192, 0.2)'];
                    var borderColors = ['rgb(75, 192, 192)'];

                    new Chart("violatorSummary", {
                        type: "line",
                        data: {
                            labels: res.date,
                            datasets: [{
                                backgroundColor: barColors,
                                borderColor: borderColors,
                                data: res.count,
                                label: "Violator Summary For Year " + year,
                                tension: 0.5
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            devicePixelRatio: 4,
                            legend: {
                                display: true
                            },
                            autoSkip: true,
                            alignToPixels: true,
                            responsiveAnimationDuration: 2,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    suggestedMax: res.data
                                },
                            }
                        }
                    }); 
                }
            });
        }

        function modalTotalViolation() {
            var year = new Date().getFullYear();
            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/total_violation_summary.php", 
                dataType: "json",
              
                success: function(res) {
                    var barColors = ['rgba(75, 192, 192, 0.2)'];
                    var borderColors = ['rgb(75, 192, 192)'];

                    new Chart("violationSummary", {
                        type: "line",
                        data: {
                            labels: res.date,
                            datasets: [{
                                backgroundColor: barColors,
                                borderColor: borderColors,
                                data: res.count,
                                label: "Violation Summary",
                                tension: 0.5
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            devicePixelRatio: 4,
                            legend: {
                                display: true
                            },
                            autoSkip: true,
                            alignToPixels: true,
                            responsiveAnimationDuration: 2,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    }); 
                }
            });
        }

        function modalTopPlace(year) {
            var area = new Array();
            var violator = new Array();
            var count = new Array();

            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/get_top_place_summary.php", 
                data: {"year" : year},
                dataType: "json",
              
                success: function(res) {
                    $.each(res.area, function(i, el){
                        if($.inArray(el, area) === -1) area.push(el);
                    });

                    $.each(res.violatorCount, function(i, el){
                        violator.push(el);
                    });

                    for (var i = 0; i < area.length; i++) {
                        count[i] = violator[0][area[i]];
                    }

                    var maxValue = Math.max.apply(Math, count);
                    var index = count.indexOf(maxValue);
                    var maxArea = area.at(index);

                    var barColors = ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(255, 205, 86, 0.2)', 'rgba(255, 159, 64, 0.2)'];
                    var borderColors = ['rgb(75, 192, 192)', 'rgba(153, 102, 255)', 'rgba(255, 99, 132)', 'rgba(255, 205, 86)', 'rgba(255, 159, 64)'];

                    new Chart("topPlaceSummary", {
                        type: "bar",
                        data: {
                            labels: area,
                            datasets: [{
                                backgroundColor: barColors,
                                borderColor: borderColors,
                                borderWidth: 1,
                                data: count,
                                label: "Top Place Where Violators Live"
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            devicePixelRatio: 5,
                            legend: {
                                display: false
                            },
                            barThickness: 70,
                            borderRadius: 5
                        }
                    }); 
                }
            });
        }

        function modalDriverListed(year) {
            var color = ["red", "orange", "yellow"];
            var innerText = "";

            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/get_driver_listed_summary.php", 
                data: {"year" : year},
                dataType: "json",
              
                success: function(res) {
                    if (res.data == 0) {
                        innerText = "No Data Found";
                    } else {
                        innerText = "Total Violators: " + res.data;
                    }

                    var barColors = ['rgba(75, 192, 192, 0.2)'];
                    var borderColors = ['white'];

                    c = new Chart("driverListedSummary", {
                        type: "doughnut",
                        data: {
                            //labels: labels,
                            datasets: [{
                                backgroundColor: color,
                                borderColor: borderColors,
                                data: res.count,
                                //label: labels,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            devicePixelRatio: 5,
                            radius: "80%",
                            cutout: "65%",
                            legend: {
                                display: false
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            },
                            hoverBorderColor: color,
                            hoverBorderWidth: 2
                        },
                        plugins: [{
                            id: 'doughnutChart',
                            beforeDraw: (chart) => {
                            let width = chart.width;
                            let height = chart.height;
                            let ctx = chart.ctx;

                            ctx.restore();
                            let fontSize = (height / 114).toFixed(2);
                            ctx.font = fontSize + " Century Gothic";
                            ctx.textBaseline = "middle";

                            let text = innerText;
                            let textX = Math.round((width - ctx.measureText(text).width) / 2);
                            let textY = height / 1.90;
                            
                            console.log(fontSize);
                            // console.log("text x: ", textX);
                            // console.log("text y: ", textY);

                            ctx.fillText(text, textX, textY);
                            ctx.save();
                            }
                        }]
                    }); 
                }
            });
        }

        function modalPronePlace(year) {
            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/get_prone_place_summary.php", 
                data: {"year" : year},
                dataType: "json",
              
                success: function(res) {
                    var numbering = 1;
                    console.log(res);
                    if (res.size == 0) {
                        $("#content").append(`<div id="progressBar" style="display: flex; flex-direction: column; align-items: center; justify-content: center;height: 100%; width: 100%;"></div>`);
                        $("#progressBar").append("<h3> No Data Found</h4>");
                    } else {
                        $("#content").append(`<div id="progressBar" style="display: flex; flex-direction: column; align-items: center;height: 100%; width: 100%; overflow: auto"></div>`);
                        for(var i = 0; i < res.size; i++) {
                            $("#progressBar").append(`
                                <div class="progressbar">
                                    <h4 class="title_bar">` + numbering + ". " + res.prone_place[i] + `</h4>
                                    <div class="bar` + i + `"></div>
                                </div>`);
                                
                            $('.bar' + i).rProgressbar({
                                percentage: res.num[i],
                                fillBackgroundColor: '#9b59b6'
                            });

                            numbering++;
                        }
                    }

                }
            });
        }

        function modalVehicleType(year) {
            $.ajax({
                type: "POST", 
                url: "/traffic_offense/inc/get_vehicle_summary.php", 
                data: {"year" : year},
                dataType: "json",
              
                success: function(res) {
                    console.log(res);

                    if (res.total == 0) {
                        innerText = "No Data Found";
                    } else {
                        innerText = "Total Vehicles: " + res.total;
                    }

                    var barColors = ['rgba(75, 192, 192, 0.2)'];
                    var borderColors = ['white'];

                    c = new Chart("vehicleTypeSummary", {
                        type: "doughnut",
                        data: {
                            //labels: labels,
                            datasets: [{
                                backgroundColor: res.color,
                                borderColor: borderColors,
                                data: res.count,
                                //label: labels,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            devicePixelRatio: 5,
                            radius: "80%",
                            cutout: "65%",
                            legend: {
                                display: false
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            },
                            hoverBorderColor: res.color,
                            hoverBorderWidth: 2
                        },
                        plugins: [{
                            id: 'doughnutChart',
                            beforeDraw: (chart) => {
                            let width = chart.width;
                            let height = chart.height;
                            let ctx = chart.ctx;

                            ctx.restore();
                            let fontSize = (height / 114).toFixed(2);
                            ctx.font = fontSize + " Century Gothic";
                            ctx.textBaseline = "middle";

                            let text = innerText;
                            let textX = Math.round((width - ctx.measureText(text).width) / 2);
                            let textY = height / 1.90;
                            
                            console.log(fontSize);
                            // console.log("text x: ", textX);
                            // console.log("text y: ", textY);

                            ctx.fillText(text, textX, textY);
                            ctx.save();
                            }
                        }]
                    }); 

                    for(var i = 0; i < res.total; i++) {
                        $("#vehicle_label").append(
                            `<div class="legend_box" onmouseover="t(` + i +  `)" style="cursor: pointer">
                                <span class="color-box" style="background-color:` + res.color[i] + `"></span>
                                <div id="license_legend_text" style="margin-left: 10px; overflow: auto>
                                    <h4 style="font-size: medium"; font-family: Century Gothic;><b> ` + res.vehicle[i] + `</b></h4>
                                </div>
                            </div>`
                        );
                    }
                }
            });
        }

        function t(idx) {
            var meta = c.getDatasetMeta(0),
            rect = c.canvas.getBoundingClientRect(),
            point = meta.data[idx].getCenterPoint(),
            evt = new MouseEvent('mousemove', {
                clientX: rect.left + point.x,
                clientY: rect.top + point.y
            }),
            node = c.canvas;
            node.dispatchEvent(evt);
        }

        $("#total_violator").click(function(e) {
            $("#content").html("<canvas id='violatorSummary' style='width: 90%; height: 90%;' class='chartjs'></canvas>");
            $("#myModal").show();
            $(".date_panel").hide();
            modalTotalViolator();
        });

        $("#summary").click(function(e) {
            $("#content").html("<canvas id='violationSummary' style='width: 90%; height: 90%;' class='chartjs'></canvas>");
            $("#myModal").show();
            $(".date_panel").hide();
            modalTotalViolation();
        });

        $("#top_place").click(function(e) {
            const d = new Date();
            var baseDate = 2019;
            let year = d.getFullYear();
            var diff = year - baseDate;
            $("#select_date").append("<option value='all'>All Year</option>");
            for (var i = 0; i <= diff; i++) {
                var newDate = baseDate + i;
                $("#select_date").append("<option value='" + newDate + "'>" + newDate + "</option>");
            }

            $("#select_date").attr("data-id", "top_place_class");
            $(".date_panel").show();
            $("#content").html("<canvas id='topPlaceSummary' style='width: 90%; height: 90%;' class='chartjs'></canvas>");
            modalTopPlace("all");
            $("#myModal").show();
        });

        $("#driver_listed").click(function(e) {
            const d = new Date();
            var baseDate = 2019;
            let year = d.getFullYear();
            var diff = year - baseDate;
            $("#select_date").append("<option value='all'>All Year</option>");
            for (var i = 0; i <= diff; i++) {
                var newDate = baseDate + i;
                $("#select_date").append("<option value='" + newDate + "'>" + newDate + "</option>");
            }

            $("#select_date").attr("data-id", "driver_listed");
            $(".date_panel").show();
            $("#content").empty();
            $("#content").append(`
                <div style="height: 100%; width: 60%;">
                    <canvas id='driverListedSummary' style='width: 90%; height: 90%;' class='chartjs'></canvas>
                </div>

                <div id="license_label" style="height: 100%; width: 40%; display: flex; align-items: center; flex-direction: column; justify-content: center; overflow: auto">

                </div>
                
                `);
            var color = ["red", "orange", "yellow"];
            var licenseType = ["PRO", "NON-PRO", "STUDENT"];
            for(var i = 0; i < 3; i++) {
                $("#license_label").append(
                            `<div class="legend_box" onmouseover="t(` + i +  `)" style="cursor: pointer">
                                <span class="color-box" style="background-color:` + color[i] + `"></span>
                                <div id="license_legend_text" style="margin-left: 10px;>
                                    <h4 style="font-size: medium"; font-family: Century Gothic;><b> ` + licenseType[i] + `</b></h4>
                                </div>
                            </div>`
                        );
            }
            modalDriverListed("all");
            $("#myModal").show();

        });

        $("#prone_place_panel").click(function(e) {
            $("#content").empty();
            modalPronePlace("all");
            $("#select_date").attr("data-id", "prone_place");
            const d = new Date();
            var baseDate = 2019;
            let year = d.getFullYear();
            var diff = year - baseDate;
            $("#select_date").append("<option value='all'>All Year</option>");
            for (var i = 0; i <= diff; i++) {
                var newDate = baseDate + i;
                $("#select_date").append("<option value='" + newDate + "'>" + newDate + "</option>");
            }

            $("#myModal").show();
        });

        $("#vehicle_type_panel").click(function(e) {
            $("#content").empty();
            $("#select_date").attr("data-id", "prone_place");
            const d = new Date();
            var baseDate = 2019;
            let year = d.getFullYear();
            var diff = year - baseDate;
            $("#select_date").append("<option value='all'>All Year</option>");
            for (var i = 0; i <= diff; i++) {
                var newDate = baseDate + i;
                $("#select_date").append("<option value='" + newDate + "'>" + newDate + "</option>");
            }

            $("#select_date").attr("data-id", "vehicle_type");
            $(".date_panel").show();
            $("#content").append(`
                <div style="height: 100%; width: 60%;">
                    <canvas id='vehicleTypeSummary' style='width: 90%; height: 90%;' class='chartjs'></canvas>
                </div>

                <div id="vehicle_label" style="height: 100%; width: 40%; display: flex; align-items: center; flex-direction: column; justify-content: center; overflow: auto">

                </div>
                
                `);
            modalVehicleType("all");
            $("#myModal").show();
        });


        $(document).on("change", "#select_date", function(e) {
            var containerName = $(this).attr("data-id");

            if (containerName == "top_place_class") {
                $("#topPlaceSummary").remove();
                modalTopPlace($(this).val());
                $("#content").html("<canvas id='topPlaceSummary' style='width: 90%; height: 90%;'></canvas>");
            } else if (containerName == "driver_listed") {
                $("#content").empty();
                $("#content").append(`
                <div style="height: 100%; width: 60%;">
                    <canvas id='driverListedSummary' style='width: 90%; height: 90%;' class='chartjs'></canvas>
                </div>

                <div id="license_label" style="height: 100%; width: 40%; display: flex; align-items: center; flex-direction: column; justify-content: center; overflow: auto">

                </div>
                
                `);
            var color = ["red", "orange", "yellow"];
            var licenseType = ["PRO", "NON-PRO", "STUDENT"];
            for(var i = 0; i < 3; i++) {   
                $("#license_label").append(
                            `<div class="legend_box" onmouseover="t(` + i +  `)" style="cursor: pointer">
                                <span class="color-box" style="background-color:` + color[i] + `"></span>
                                <div id="license_legend_text" style="margin-left: 10px;>
                                    <h4 style="font-size: medium"; font-family: Century Gothic;><b> ` + licenseType[i] + `</b></h4>
                                </div>
                            </div>`
                        );
            }
                modalDriverListed($(this).val());
            } else if (containerName == "prone_place") {
                $("#content").empty();
                modalPronePlace($(this).val());
            } else if (containerName == "vehicle_type") {
                $("#content").empty();
                $("#content").append(`
                <div style="height: 100%; width: 60%;">
                    <canvas id='vehicleTypeSummary' style='width: 90%; height: 90%;' class='chartjs'></canvas>
                </div>

                <div id="vehicle_label" style="height: 100%; width: 40%; display: flex; align-items: center; flex-direction: column; justify-content: center; overflow: auto">

                </div>
                
                `);
                modalVehicleType($(this).val());
            }
         });

        $("#close_btn").click(function(e) {
            $("#myModal").hide();
            $("#select_date").empty();
            $("#total-violation-chart").empty();
            $("#total-violation-chart").append(`<div class="chart-area">
                            <canvas id="doughnutChart" style="width: 90%; height: 90%;"></canvas>
                        </div>
                        <div id="label_area" class="label-area">

                        </div>`);
            getTotalViolation();
        });
       

    </script>

</html>