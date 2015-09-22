<?php
session_start();
$_SESSION['TakenBy'];

include '/includes/header.php';
include '/includes/connect.php';
include '/includes/navbar.php'; 
include '/includes/sescreate.php';
?>

<body>  
    <div class="container">
        <div class="jumbotron">
            <form role="form" method="POST" action="/Finalize.php">
                <div class="">Dog Name: <?php echo "<b> ".$petName."</b>, ".$petBreed;?></div>
                <div class="">Customer: <?php echo $custLName;?></div>
                <div class="radio">    
                    <label class="radio-inline">
                        <input type="radio" class="bigradio" name="groomOption" id="optionsRadios1" value="bb"<?php if($boolBath=='-1'){echo "checked";}?>> Bath and Brush 
                        <input type="text" name="bbPrice" size="3" maxlength="3" value="<?php echo $bathRate; ?>"> 
                    </label>
                    <label class="radio-inline">
                        <input type="radio" class="bigradio" name="groomOption" id="optionsRadios2" value="groom"<?php if($boolGroom=='-1'){echo "checked";}?>> Groom 
                        <input type="text" name="groomPrice" size="3" maxlength="3" value="<?php echo $groomRate; ?>"> 
                    </label>
                </div>
                <div class="checkbox form-control">
                    <label class="control-label">
                        <input type="checkbox" class="bigchbx" id="nailfile" onchange="nailFileSelect();" name="nailfile" value="Nail File: $10.00">Nail File
                    </label>
                    <label class="control-label">
                        <input type="checkbox" class="bigchbx " id="teethbrush" onchange="teethSelect();" name="teethbrush" value="Teeth Brush: $10.00">Teeth Brush
                    </label>                   
                    <label class="control-label">
                        <input type="checkbox" class="bigchbx " id="dematt" onchange="demattSelect();"name="dematt" value="De-matt: $15.00">De-matt
                    </label>  
                    <label class="control-label">
                        <input type="checkbox" class="bigchbx " id="deskunk" onchange="deskunkSelect();"name="deskunk" value="Deskunk: $30.00">Deskunk
                    </label>
                    <label class="control-label">
                        <input type="checkbox" class="bigchbx " id="flea" onchange="fleaSelect();"name="flea" value="Flea Shampoo: $5.00">Flea Shampoo
                    </label> 
                     
                </div>
                <div class="dropdown">
                    <select name="shampoo" onchange="shampooSelect();"class="form-control" >
                        <option  class="shampoo" value=" ">Nootie Shampoo</option>
                        <option  class="shampoo" value="Shampoo: $5.00 Oatmeal">Oatmeal</option>
                        <option  class="shampoo" value="Shampoo: $5.00 Hypo">Hypo</option>
                        <option  class="shampoo" value="Shampoo: $5.00 Tar N Sulfur">Tar and Sulfur</option>
                        <option  class="shampoo" value="Shampoo: $5.00 Whitening">Whitening</option>
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
                <textarea id="txtarea" name="txtarea1"><?php echo $description;?></textarea>
                <input type="submit" value="save" class="btn btn-default" >
            </form>
            <script src="/js/TxtAreaModify.js"></script>
        </div>
    </div>   
  
</body>
</html>