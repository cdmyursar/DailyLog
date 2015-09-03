<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $postDogID = $_POST["GLSeq"]; 
    $nailFile=$teethBrush=$deShed=$deSkunk=$fleaDip=$shampoo=$bathOption=$groomOption="";
    $otherTotal = 0;
    
    
    if(isset($_POST['nailfile'])){
        echo "NAIL FILE";
    }
    if(isset($_POST['teethbrush'])){
        echo "TEETH";
    }
    if(isset($_POST['dematt'])){
        echo "dematt";
    }
    if(isset($_POST['deskunk'])){
        echo "SKUNK!";
    }
    if(isset($_POST['shampoo'])){
        echo "<h1>shampoo</h1>";
        echo $_POST['shampoo'];
    }
    if(isset($_POST['deshed'])){
        echo "<h1>deshed</h1>";
        echo $_POST['deshed'];
    }
    if(isset($_POST['fleadip'])){
        echo "<h1>fleadip</h1>";
        echo $_POST['fleadip'];
    }
    
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
