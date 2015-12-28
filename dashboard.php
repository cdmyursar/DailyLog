<?php
session_start();
$_SESSION['TakenBy'];
$takenBy = $_SESSION['TakenBy'];
include '/includes/header.php';
include '/includes/navbar.php';
include '/includes/sqldashboard.php';
include '/includes/connect2.php';
?>



<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <p>Start Date: <input type="text" size="6" id="datepicker"></p>
            <p>End Date: <input type="text" size="6" id="datepicker2"></p>
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Customer</th>
                            <th class="text-center">Pet Name</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Groom - Bath</th>
                            <th class="text-center">Rate</th>
                            <th class="text-center">Nail Rate</th>
                            <th class="text-center">Other Rate</th>
                            <th class="text-center">Tip</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?PHP
                    
                    
                    $weekRange = rangeWeek('2015-12-23');
                    //Correct date string, put year at end of string for proper format
                    //of access date sql access likes m-d-Y php likes Y-m-d
                    $startCorrect = date("m-d-Y", strtotime($weekRange['start']));
                    $endCorrect = date("m-d-Y", strtotime($weekRange['end']));
//                    echo $startCorrect;
//                    echo $endCorrect;
                    
                    $sql = "SELECT Clients.CLLastName, GroomingLog.GLDate, GroomingLog.GLGroom, "
                        . "GroomingLog.GLBath, GroomingLog.GLRate, GroomingLog.GLGroomNails, "
                        . "GroomingLog.GLGroomOthers, GroomingLog.GLTakenBy, GroomingLog.GLBathRate, "
                        . "GroomingLog.GLNailsRate, GroomingLog.GLOthersRate, Transactions.Tips, Pets.PtPetName "
                        . "FROM ((Clients INNER JOIN Pets ON Clients.[CLSeq] = Pets.[PtOwnerCode]) INNER JOIN GroomingLog ON Pets.[PtSeq] = GroomingLog.[GLPetID]) INNER JOIN Transactions ON GroomingLog.GLSeq = Transactions.GLSeq "
                        . "WHERE GLDate between #$startCorrect# and #$endCorrect# and GLTakenBy='$takenBy' "
                        . "ORDER BY GLDate DESC";
                    
                    $result = $db->query($sql);
                    
                    $count = 0;
                    $bathDogs = 0;
                    $groomDogs = 0;
                    $nailDogs = 0;
                    $otherDogs = 0;
                    $groomingTotal = 0;
                    $tipTotal = 0;
                    $commissionTotal = 0;
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){ 
                        $groomDate = $row['GLDate'];
                        $fixGroomDate = date('Y-m-d', strtotime($groomDate));
                        $custName = $row['CLLastName'];
                        $petName = $row['PtPetName'];
                        $boolGroom = $row['GLGroom'];
                        $boolBath = $row['GLBath'];
                        $cellChoice = "";
                        $groomRate = $row['GLRate'];
                        $bathRate = $row['GLBathRate'];
                        $cellPrice = 0;
                        $nailRate = $row['GLNailsRate']/2;
                        $otherRate = $row['GLOthersRate']/2;
                        $tip = $row['Tips'];
                        $boolNails = $row['GLGroomNails'];
                        $boolOther = $row['GLGroomOthers'];
                                                
                        $count++;
                        
                        if($boolNails == -1){
                            $nailDogs++;
                            $groomingTotal += $nailRate/2;
                        }
                        if($boolOther == -1){
                            $otherDogs++;
                            $groomingTotal += $otherRate/2;
                        }
                        
                        if($boolBath == -1 && $boolGroom == 0 ){
                            $cellChoice = "Bath";
                            $cellPrice = number_format($bathRate)/2;
                            $groomingTotal += $bathRate/2;
                            $bathDogs++;
                        }else if($boolBath == 0 && $boolGroom == -1){
                            $cellChoice = "Groom";
                            $cellPrice = number_format($groomRate)/2;
                            $groomingTotal += $groomRate/2;
                            $groomDogs++;
                        }else {
                            $cellChoice = "Not Defined";
                            $cellPrice = "NA";
                        }
                        if($tip != "" || $tip != null){
                            $tipTotal += $tip;
                        }
                        
                        echo "<tr>";
                            echo "<td>$count</td>";
                            echo "<td>$custName</td>";
                            echo "<td>$petName</td>";
                            echo "<td>$fixGroomDate</td>";
                            echo "<td>$cellChoice</td>";
                            echo "<td>$cellPrice</td>";
                            echo "<td>$nailRate</td>";
                            echo "<td>$otherRate</td>";
                            echo "<td>$tip</td>";
                        echo "</tr>";
                        
                    }
                    ?>
                    </tbody>
                </table>
                <input type="text" value="<?PHP echo $groomDogs;?>">
                <input type="text" value="<?PHP echo $bathDogs;?>">
                <input type="text" value="<?PHP echo $nailDogs;?>">
                <input type="text" value="<?PHP echo $otherDogs;?>">
                <input type="text" value="<?PHP echo $groomingTotal;?>">
                <input type="text" value="<?PHP echo $tipTotal;?>">
                <input type="text" value="<?PHP echo $commissionTotal = $groomingTotal + $tipTotal;?>">
                
            </div>
        </div>
    </div>  
    
    <?PHP ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
        $( "#datepicker" ).datepicker();
        });
        $(function() {
        $( "#datepicker2" ).datepicker();
        });
    </script>
</body>
</html>