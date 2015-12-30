<?php
session_start();
$_SESSION['TakenBy'];
$takenBy = $_SESSION['TakenBy'];
date_default_timezone_set('America/Chicago');
include '/includes/header.php';
include '/includes/navbar.php';
include '/includes/connect2.php';
include '/includes/rangeweek.php';
if(isset($_POST['week'])){
    $weekSelect = $_POST['week'];
}else{
    $weekSelect = date("Y-m-d");
}
?>
<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="row">
                <div class="col-sm-4">
                    <form id="dateC" method="POST">
                        <div class="form-group">
                            <label for="weekSelector">Select week</label>
                            <select class="form-control" id="weekSelector" name="week" onchange="dateC.submit();">
                                <?PHP 
                                for($i = 0; $i<9;$i++){
                                    $week = date("Y-m-d", strtotime("-$i week"));
                                    $rangeWeek = rangeWeek(date("Y-m-d", strtotime("-$i week")));
                                    $weekStart = $rangeWeek['start'];
                                    $weekEnd = $rangeWeek['end'];
                                    $startCorrected = date("m-d-Y", strtotime($weekStart));
                                    $endCorrected = date("m-d-Y", strtotime($weekEnd));
                                    $selector = "";
                                    if($week ==$weekSelect){
                                        $selector = "selected=\"\"";
                                    }
                                    else {
                                        $selector = "";
                                    }
                                    echo "<option $selector value=\"$week\">$startCorrected - $endCorrected</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                    <div class="panel panel-default textContainer h2 text-center">
                        <h2>Owed: $<span id="commissionOP"></span></h2>
                        <h2>Tips: $<span id="tipsOP"></span></h2>
                        <h2>Total: $<span id="totalOutPut"></span></h2>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="canvas-holder">
                        <canvas id="chart-area"/>
                        <div id="doughnutLegend"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <h2><span class="label label-danger">Grooms: <span id="groomsOP"></span></span></h2>
                    <h2><span class="label label-info">Bath: <span id="bathsOP"></span></span></h2>
                    <h2><span class="label label-warning">Nails: <span id="nailsOP"></span></span></h2>
                    <h2><span class="label label-default">Other: <span id="othersOP"></span></span></h2>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Customer</th>
                            <th class="text-center">Pet Name</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Gr-BB</th>
                            <th class="text-center">Rate</th>
                            <th class="text-center">Nail</th>
                            <th class="text-center">Other</th>
                            <th class="text-center">Tip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                            include '/includes/dashboardtime.php';
                        ?>
                    </tbody>
                </table>
                <input type="text" hidden="" id="groomDogs" value="<?PHP echo $groomDogs;?>">
                <input type="text" hidden="" id="bathDogs" value="<?PHP echo $bathDogs;?>">
                <input type="text" hidden="" id="nailsDogs" value="<?PHP echo $nailDogs;?>">
                <input type="text" hidden="" id="otherDogs" value="<?PHP echo $otherDogs;?>">
                <input type="text" hidden="" id="groomingTotal" value="<?PHP echo $groomingTotal;?>">
                <input type="text" hidden="" id="tipTotal" value="<?PHP echo $tipTotal;?>">
                <input type="text" hidden="" id="commissionTotal" value="<?PHP echo $commissionTotal = $groomingTotal + $tipTotal;?>">
            </div>
        </div>
    </div>  
<script src="js/Chart.js" type="text/javascript"></script>
<script src="js/dashboard.js" type="text/javascript"></script>
</body>
</html>