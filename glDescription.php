<?php

session_start();
$_SESSION['TakenBy'];
$GLSeq = $_GET['GLSeq'];
include '/includes/header.php';
include '/includes/connect.php';
include '/includes/navbar.php'; 
include '/includes/ServerRequestDescription.php';

$sql = "SELECT GroomingLog.GLDescription, GroomingLog.GLRate, GroomingLog.GLBathRate, "
        . "GroomingLog.GLGroom, GroomingLog.GLBath, "
        . "GroomingLog.GLNailsID, GroomingLog.GLOthersID, GroomingLog.GLNailsRate, GroomingLog.GLOthersRate "
        . "FROM GroomingLog "
        . "WHERE GLSeq=$GLSeq";
$result = $db->query($sql);
 
while($row = $result->fetch(PDO::FETCH_ASSOC)){
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

?>

<body>
    <div class="container">
        <div class="jumbotron">
            <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="radio">    
                    <label class="radio-inline">
                        <input type="radio"  name="optionsRadios" id="optionsRadios1" value="bb"<?php if($boolBath=='-1'){echo "checked";}?>> Bath and Brush <?php echo $bathRate; ?>
                    </label>
                    <label class="radio-inline">
                        <input type="radio"  name="optionsRadios" id="optionsRadios2" value="groom"<?php if($boolGroom=='-1'){echo "checked";}?>> Groom <?php echo $groomRate; ?>
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"  name="nailfile" value="" <?php if($boolNail=='-1'){echo "checked";}?>>Nail File
                    </label>
                    <label>
                        <input type="checkbox"  name="teethbrush" value="" <?php if($boolTeeth=='-1'){echo "checked";}?>>Teeth Brush
                    </label>                   
                </div>
                <div class="dropdown">
                    <select class="form-control">
                        <option>Deshed $16.00</option>
                        <option>Deshed $19.00</option>
                        <option>Deshed $22.00</option>
                        <option>Deshed $25.00</option>
                        <option>Deshed $30.00</option>
                    </select>
                </div>
            <textarea id="txtarea"><?php echo $description;?></textarea>
            </form>
        </div>
       
    </div>
    <script>
        $("#0").click(function(){
            var content = "0";
            $("#txtarea").append(content);
        })
    </script>    
</body>
</html>