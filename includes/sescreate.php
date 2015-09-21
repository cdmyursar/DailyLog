<?php
$getGLSeq = $_GET['GLSeq'];

$sql = "SELECT GroomingLog.GLDescription, GroomingLog.GLRate, GroomingLog.GLBathRate, "
    . "GroomingLog.GLGroom, GroomingLog.GLBath, "
    . "GroomingLog.GLSignature, GroomingLog.GLDeshed, GroomingLog.GLFlea, GroomingLog.GLSkunk, "
    . "GroomingLog.GLNailsID, GroomingLog.GLOthersID, GroomingLog.GLNailsRate, "
    . "GroomingLog.GLOthersRate, "
    . "GroomingLog.GLTerms, "
    . "Pets.PtPetName, Clients.CLFirstName, Clients.CLLastName, Breeds.BrBreed, "
    . "Clients.CLAddress1, Clients.CLCity, Clients.CLState, Clients.CLZip, Clients.CLPhone1, Clients.CLPhone2, Clients.CLPhone3, Clients.CLEmail "
    . "FROM (Clients INNER JOIN (Pets LEFT JOIN GroomingLog ON Pets.[PtSeq] = GroomingLog.[GLPetID]) ON Clients.CLSeq = Pets.PtOwnerCode) INNER JOIN Breeds ON Pets.PtBreedID = Breeds.BrSeq "
    . "WHERE GLSeq=$getGLSeq";

$result = $db->query($sql);

while($row = $result->fetch(PDO::FETCH_ASSOC)){    
    $description = $row['GLDescription'];
    $groomRate = number_format($row['GLRate']);
    $bathRate = number_format($row['GLBathRate']);
    $boolGroom = $row['GLGroom'];
    $boolBath = $row['GLBath'];
    $boolNail = $row['GLNailsID'];
    $petName = $row['PtPetName'];
    $custLName = $row['CLLastName'];
    $custFName = $row['CLFirstName'];
    $petBreed = $row['BrBreed'];
    $custAddress = $row['CLAddress1'];
    $custCity = $row['CLCity'];
    $custState = "TX";
    $custZip = $row['CLZip'];
    $custPhone1 = $row['CLPhone1'];
    $custPhone2 = $row['CLPhone2'];
    $custPhone3 = $row['CLPhone3'];
    $custEmail = $row['CLEmail'];
    $signature = $row['GLSignature'];
    $deshed = $row['GLDeshed'];
    $fleaShampoo = $row['GLFlea'];
    $skunk = $row['GLSkunk'];
    $boolOther = $row['GLOthersID'];
    $nailFileRate = $row['GLNailsRate'];
    $otherRate = $row['GLOthersRate'];
    $terms = $row['GLTerms'];
}

$sqlArray=["glSeq"=>$getGLSeq, 

    "petName"=>$petName,"petBread"=>$petBreed,
    "bathRate"=>$bathRate,"groomRate" => $groomRate, 
    "description" => $description, 

    "boolgroom"=>$boolGroom,"boolBath"=>$boolBath,

    "nailFileRate"=>$nailFileRate, "otherRate"=>$otherRate,
    "boolOthers"=>$boolOther, "boolNail"=>$boolNail, 
    

    "custLName"=>$custLName,"custFName"=>$custFName,"address" => $custAddress, 
    "city" => $custCity, "state" => $custState,"zip" => $custZip, 
    "phone1" => $custPhone1, "phone2" => $custPhone2,"phone3" => $custPhone3, 
    "email" => $custEmail,

    "signature"=>$signature, "terms"=>$terms];

$_SESSION['result'] = $sqlArray;

$db = null;
?>