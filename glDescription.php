<?php

session_start();
$_SESSION['TakenBy'];
include '/includes/header.php';
include '/includes/connect.php';
include '/includes/navbar.php'; 
include '/includes/ServerRequestDescription.php';
?>

<body onselectstart="return false">
    
    <div class="container">
        <div class="jumbotron">
            <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="text" hidden=""value="<?php echo $glSeq ?>"name="GLSeq">
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
                        <input type="checkbox"  name="Dematt" value="15">De-matt
                    </label>  
                    <label>
                        <input type="checkbox"  name="Deskunk" value="30">Deskunk
                    </label> 
                </div>
                <div class="dropdown">
                    <select class="form-control">
                        <option value="0">Reg. Shampoo</option>
                        <option value="5">Oatmeal</option>
                        <option value="5">Hypo</option>
                        <option value="5">Tar and Sulfur</option>
                        <option value="5">Whitening</option>
                        <option value="5">Flea</option>
                    </select>
                </div>
                <div class="dropdown">
                    <select class="form-control">
                        <option value="0">No Deshed</option>
                        <option value="16">Deshed $16.00</option>
                        <option value="19">Deshed $19.00</option>
                        <option value="22">Deshed $22.00</option>
                        <option value="25">Deshed $25.00</option>
                        <option value="30">Deshed $30.00</option>
                    </select>
                </div>
                <div class="dropdown">
                    <select class="form-control">
                        <option value="0">No FleaDip</option>
                        <option value="16">FleaDip $16.00</option>
                        <option value="19">FleaDip $19.00</option>
                        <option value="22">FleaDip $22.00</option>
                        <option value="25">FleaDip $25.00</option>
                        <option value="30">FleaDip $30.00</option>
                    </select>
                </div>
            <textarea id="txtarea"><?php echo $description;?></textarea>
            <button class="btn btn-default" type="submit">Save</button>
            </form>
        </div>
    </div>   
</body>
</html>