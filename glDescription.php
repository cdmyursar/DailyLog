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
                    <label>
                        <input type="checkbox"  name="flea" value="5">Flea Shampoo
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
                        <option  class="deshed" value="Deshed: $25.00">Deshed: $25.00</oDeshed: $25.00"ption>
                        <option  class="deshed" value="Deshed: $30.00">Deshed: $30.00</option>
                    </select>
                </div>
                <div class="dropdown">
                    <select name="fleadip" onchange="fleaSelect();"class="form-control">
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
            
<script type="text/javascript">    
var selShampoo = document.getElementsByClassName("shampoo");
var selDeshed = document.getElementsByClassName("deshed");
var selFlea = document.getElementsByClassName("flea");
var txtarea = document.getElementById("txtarea").innerHTML;  
var parsTxtArea = txtarea.split("\n");
var indextxt2 = txtarea.indexOf("addons");

if(indextxt2 == "-1"){
    document.getElementById("txtarea").innerHTML +="\n\naddons";             
}

//parse textarea for any addons, set selectors to proper addons
//shampoo
for(var j=0;j< parsTxtArea.length; j++){
    for(var t = 0;t<selShampoo.length;t++){
        if(parsTxtArea[j]===selShampoo[t].value){
            selShampoo[t].selected = 'selected';
        }
    }
}
//deshed
for(var j=0;j< parsTxtArea.length; j++){
    for(var t = 0;t<selDeshed.length;t++){
        if(parsTxtArea[j]===selDeshed[t].value){
            selDeshed[t].selected = 'selected';
        }
    }
}
//fleaDip
for(var j=0;j< parsTxtArea.length; j++){
    for(var t = 0;t<selFlea.length;t++){
        if(parsTxtArea[j]===selFlea[t].value){
            selFlea[t].selected = 'selected';
        }
    }
}



function fleaSelect(){
    //Get user selected flea dip
    for(var i=0; i<selFlea.length;i++){
        if(selFlea[i].selected){
            editTxtArea(selFlea[i].value, selFlea);
        }
    }
}   

function deshedSelect(){
    //Get user selected deshed
    for(var i=0; i<selDeshed.length;i++){
        if(selDeshed[i].selected){
            editTxtArea(selDeshed[i].value, selDeshed);
        }
    }
}  
function shampooSelect() {        
    //Get user selected shampoo
    for(var i=0; i<selShampoo.length;i++){
        if(selShampoo[i].selected){
            editTxtArea(selShampoo[i].value, selShampoo);
        }
    }
}

function editTxtArea(value,data){
    var txtarea = document.getElementById("txtarea").innerHTML;  
    var txtsplit = txtarea.split('\n');
    //clear text area of any matching shampoos in the text area
    for(var j=0;j< txtsplit.length; j++){
        for(var t = 0;t<data.length;t++){
            if(txtsplit[j]===data[t].value){
                txtsplit.splice(j,1);
                var joinback = txtsplit.join("\n");
                document.getElementById("txtarea").innerHTML = joinback;                               
            }
        }
    }
    document.getElementById("txtarea").innerHTML +="\n"+value;                               
}

</script>
        </div>
    </div>   
  
</body>
</html>