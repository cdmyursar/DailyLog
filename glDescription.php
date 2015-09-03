<?php
session_start();
$_SESSION['TakenBy'];
include '/includes/header.php';
include '/includes/connect.php';
include '/includes/navbar.php'; 

$getGLSeq = $_GET['GLSeq'];

$sql = "SELECT GroomingLog.GLSeq, GroomingLog.GLDescription, GroomingLog.GLRate, GroomingLog.GLBathRate, "
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
    $teethRate = $row['GLOthersRate'];
    $boolNail = $row['GLNailsID'];
    $boolTeeth = $row['GLOthersID'];
}
?>

<body>  
    <div class="container">
        <div class="jumbotron">
            <form role="form" method="post" action="/Finalize.php">
                <input type="text" hidden="" value="<?php echo $getGLSeq?>"name="GLSeq">
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
                        <input type="checkbox"  name="nailfile" value="10" <?php if($boolNail=='-1'){echo "checked";}?>>Nail File
                    </label>
                    <label>
                        <input type="checkbox"  name="teethbrush" value="10" <?php if($boolTeeth=='-1'){echo "checked";}?>>Teeth Brush
                    </label>                   
                    <label>
                        <input type="checkbox"  name="dematt" value="15">De-matt
                    </label>  
                    <label>
                        <input type="checkbox"  name="deskunk" value="30">Deskunk
                    </label> 
                </div>
                <div class="dropdown">
                    <select name="shampoo" class="form-control">
                        <option name="reg" class="shampoo" value="0">Reg. Shampoo</option>
                        <option name="oatmeal" class="shampoo" value="$5.00 Oatmeal">Oatmeal</option>
                        <option name="hypo" class="shampoo" value="$5.00 Hypo">Hypo</option>
                        <option name="tar" class="shampoo" value="$5.00 Tar N Sulfur">Tar and Sulfur</option>
                        <option name="white" class="shampoo" value="$5.00 Whitening">Whitening</option>
                        <option name="flea" class="shampoo" value="$5.00 Flea Shampoo">Flea</option>
                    </select>
                </div>
                <div class="dropdown">
                    <select name="deshed" class="form-control">
                        <option name="nodshd" value="0">No Deshed</option>
                        <option name="dshd16" value="16">Deshed $16.00</option>
                        <option name="dshd19" value="19">Deshed $19.00</option>
                        <option name="dshd22" value="22">Deshed $22.00</option>
                        <option name="dshd25" value="25">Deshed $25.00</option>
                        <option name="dshd30" value="30">Deshed $30.00</option>
                    </select>
                </div>
                <div class="dropdown">
                    <select name="fleadip" class="form-control">
                        <option name="nofdip" value="0">No FleaDip</option>
                        <option name="fdip16" value="16">FleaDip $16.00</option>
                        <option name="fdip19" value="19">FleaDip $19.00</option>
                        <option name="fdip22" value="22">FleaDip $22.00</option>
                        <option name="fdip25" value="25">FleaDip $25.00</option>
                        <option name="fdip30" value="30">FleaDip $30.00</option>
                    </select>
                </div>
            <textarea id="txtarea"><?php echo $description;?></textarea>
            <button class="btn btn-default" type="submit">Save</button>
            </form>
              <script type="text/javascript">
                  var x = document.getElementsByClassName("shampoo").selected;
                  document.write(x.value);
        for(var i=0; i<x.length;i++){
            if(x.checked){
            document.write(x[i].selected);
        }
        }
    function nailfile(){
            document.write(forms);
    }
    </script>
        </div>
    </div>   
  
</body>
</html>