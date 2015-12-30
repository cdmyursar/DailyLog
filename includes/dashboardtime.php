<?php    


$weekRange = rangeWeek($weekSelect);
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
    $nailRate = $row['GLNailsRate'];
    $otherRate = $row['GLOthersRate'];
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
    $nailRate = number_format($nailRate);
    $otherRate = number_format($otherRate);

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
$db=null;                  
?>