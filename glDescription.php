<?php
session_start();
$_SESSION['TakenBy'];
include '/includes/header.php';
include '/includes/connect.php';
include '/includes/navbar.php'; 

$getGLSeq = $_GET['GLSeq'];

$sql = "SELECT GroomingLog.GLDescription, GroomingLog.GLRate, GroomingLog.GLBathRate, "
    . "GroomingLog.GLGroom, GroomingLog.GLBath, "
    . "GroomingLog.GLSignature, GroomingLog.GLDeshed, GroomingLog.GLFlea, GroomingLog.GLSkunk, "
    . "GroomingLog.GLNailsID, GroomingLog.GLOthersID, GroomingLog.GLNailsRate, GroomingLog.GLOthersRate "
    . "FROM GroomingLog "
    . "WHERE GLSeq=$getGLSeq";
$result = $db->query($sql);

while($row = $result->fetch(PDO::FETCH_ASSOC)){    
    $description = $row['GLDescription'];
    $groomRate = number_format($row['GLRate']);
    $bathRate = number_format($row['GLBathRate']);
    $boolGroom = $row['GLGroom'];
    $boolBath = $row['GLBath'];
    $nailRate = $row['GLNailsRate'];
    $otherRate = $row['GLOthersRate'];
    $boolNail = $row['GLNailsID'];
    $boolOther = $row['GLOthersID'];
}
?>

<body>  
    <div class="container">
        <div class="jumbotron">
            <form role="form" method="post" action="/Finalize.php">
                <input type="text" hidden="" value="<?php echo $getGLSeq?>"name="GLSeq">
                <input type="text" hidden="" value="" name="otherRate" id="otherRate">
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
                        <input type="checkbox" id="nailfile" onchange="nailFileSelect();" name="nailfile" value="Nail File: $10.00" <?php if($boolNail=='-1'){echo "checked";}?>>Nail File
                    </label>
                    <label>
                        <input type="checkbox" id="teethbrush" onchange="teethSelect();" name="teethbrush" value="Teeth Brush: $10.00">Teeth Brush
                    </label>                   
                    <label>
                        <input type="checkbox" id="dematt" onchange="demattSelect();"name="dematt" value="De-matt: $15.00">De-matt
                    </label>  
                    <label>
                        <input type="checkbox" id="deskunk" onchange="deskunkSelect();"name="deskunk" value="Deskunk: $30.00">Deskunk
                    <label>
                        <input type="checkbox" id="flea" onchange="fleaSelect();"name="flea" value="Flea Shampoo: $5.00">Flea Shampoo
                    </label> 
                    </label> 
                </div>
                <div class="dropdown">
                    <select onchange="shampooSelect();"class="form-control">
                        <option class="shampoo" value=" ">Nootie Shampoo</option>
                        <option class="shampoo" value="Shampoo: $5.00 Oatmeal">Oatmeal</option>
                        <option class="shampoo" value="Shampoo: $5.00 Hypo">Hypo</option>
                        <option class="shampoo" value="Shampoo: $5.00 Tar N Sulfur">Tar and Sulfur</option>
                        <option class="shampoo" value="Shampoo: $5.00 Whitening">Whitening</option>
                    </select>
                </div>
                <div class="dropdown">
                    <select name="deshed" onchange="deshedSelect();" class="form-control">
                        <option  class="deshed" value=" ">Deshed: None</option>
                        <option  class="deshed" value="Deshed: $16.00">Deshed: $16.00</option>
                        <option  class="deshed" value="Deshed: $19.00">Deshed: $19.00</option>
                        <option  class="deshed" value="Deshed: $22.00">Deshed: $22.00</option>
                        <option  class="deshed" value="Deshed: $25.00">Deshed: $25.00</option>
                        <option  class="deshed" value="Deshed: $30.00">Deshed: $30.00</option>
                    </select>
                </div>
                <div class="dropdown">
                    <select name="fleadip" onchange="fleaDipSelect();"class="form-control">
                        <option  class="flea" value=" ">FleaDip: None</option>
                        <option  class="flea" value="FleaDip: $16.00">FleaDip: $16.00</option>
                        <option  class="flea" value="FleaDip: $19.00">FleaDip: $19.00</option>
                        <option  class="flea" value="FleaDip: $22.00">FleaDip: $22.00</option>
                        <option  class="flea" value="FleaDip: $25.00">FleaDip: $25.00</option>
                        <option  class="flea" value="FleaDip: $30.00">FleaDip: $30.00</option>
                    </select>
                </div>
            <textarea id="txtarea"><?php echo $description;?></textarea>
            <button class="btn btn-default" type="submit">Save</button>
            </form>
            
            <script src="/js/TxtAreaModify.js"></script>
        </div>
    </div>   
  
</body>
</html>