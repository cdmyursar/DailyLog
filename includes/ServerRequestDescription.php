<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $postDogID = $_POST["GLSeq"];  
    $sql = "SELECT GroomingLog.GLSeq, GroomingLog.GLDescription, GroomingLog.GLRate, GroomingLog.GLBathRate, "
        . "GroomingLog.GLGroom, GroomingLog.GLBath, "
        . "GroomingLog.GLNailsID, GroomingLog.GLOthersID, GroomingLog.GLNailsRate, GroomingLog.GLOthersRate "
        . "FROM GroomingLog "
        . "WHERE GLSeq=$postDogID";
    $result = $db->query($sql);

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $glSeq = $row['GLSeq'];
        $description = $row['GLDescription'];
        $groomRate = number_format($row['GLRate']);
        $bathRate = number_format($row['GLBathRate']);
        $boolGroom = $row['GLGroom'];
        $boolBath = $row['GLBath'];
        $nailRate = $row['GLNailsRate'];
        $teethRate = $row['GLOthersRate'];
        $boolNail = $row['GLNailsID'];
        $boolTeeth = $row['GLOthersID']; 
      }
    
}else{
    $sesGLSeq = $_GET['GLSeq'];
    $sql = "SELECT GroomingLog.GLSeq, GroomingLog.GLDescription, GroomingLog.GLRate, GroomingLog.GLBathRate, "
        . "GroomingLog.GLGroom, GroomingLog.GLBath, "
        . "GroomingLog.GLNailsID, GroomingLog.GLOthersID, GroomingLog.GLNailsRate, GroomingLog.GLOthersRate "
        . "FROM GroomingLog "
        . "WHERE GLSeq=$sesGLSeq";
    $result = $db->query($sql);

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $glSeq = $row['GLSeq'];
        echo $glSeq;
        $description = $row['GLDescription'];
        $groomRate = number_format($row['GLRate']);
        $bathRate = number_format($row['GLBathRate']);
        $boolGroom = $row['GLGroom'];
        $boolBath = $row['GLBath'];
        $nailRate = $row['GLNailsRate'];
        $teethRate = $row['GLOthersRate'];
        $boolNail = $row['GLNailsID'];
        $boolTeeth = $row['GLOthersID'];
}
}

?>
