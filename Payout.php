<?php

include 'includes/Connect.php';
include 'includes/header.php';

$sql = "SELECT Clients.CLLastName, Pets.PtPetName, GroomingLog.GLDate, 
    GroomingLog.GLRate, GroomingLog.GLBathRate, GroomingLog.GLNailsRate, 
    GroomingLog.GLOthersRate, GroomingLog.GLTakenBy 
    FROM GroomingLog INNER JOIN (Clients INNER JOIN Pets ON 
    Clients.CLSeq = Pets.PtOwnerCode) ON GroomingLog.GLPetID = Pets.PtSeq
    WHERE (((GroomingLog.GLDate)=#11/20/2015#));";

$result = $db->query($sql);




$groomRate = 0;
$bathRate = 0;
$nailFileRate = 0;
$otherRate = 0;
$totalDogs = 0;
 while ($row = $result->fetch(PDO::FETCH_ASSOC)){
    if($row['GLTakenBy'] != ""){
        $groomRate += $row['GLRate'];
        $bathRate += $row['GLBathRate'];
        $nailFileRate += $row['GLNailsRate'];
        $otherRate += $row['GLOthersRate'];
        $totalDogs += 1;
    }
 }
?>

<body>
    <div class="container">
        <div class="jumbotron">
            <?PHP 
            echo "Groom's total = ".$groomRate."</br>";
            echo "B&B's total = ".$bathRate."</br>";
            echo "Nail Files's total = ".$nailFileRate."</br>";
            echo "Other's total = ".$otherRate."</br>";
            
            $totalAmount = $groomRate + $bathRate + $nailFileRate + $otherRate;
            echo "TOTAL: ".$totalAmount;
            echo "</br>";
            echo "Dog's total = ".$totalDogs."</br>";
            ?>
        </div>
    </div>
</body>