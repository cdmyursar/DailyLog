<?php
session_start();
$_SESSION['TakenBy'];
include '/includes/header.php';
include '/includes/connect.php';
include '/includes/brdf.php';
include '/includes/navbar.php'; 
?>

<body>
<div class="container">
<?php include '/includes/time.php';?>
<span hidden=""id="idTakenBy"><?php echo $_SESSION['TakenBy'];?></span>

    <button class="btn btn-primary" id="hide">My Grooms</button>
    <button class="btn btn-primary" id="show">Show All</button>
    
    <div class="btn-group spacemore" role="group" >
    <button disabled=""class="btn btn-infoInfo" >Bath</button>
    <button disabled=""class="btn btn-successInfo" >Groom</button>
    <button disabled=""class="btn btn-dangerInfo" >Specify</button>
    </div>



<?php
date_default_timezone_set('America/Denver');

$sql = "SELECT GroomingLog.GLCall, GroomingLog.GLTakenBy, GroomingLog.GLGroom, GroomingLog.GLBath, GroomingLog.GLCompleted, GroomingLog.GLSeq, GroomingLog.GLInTime, Pets.PtPetName, Clients.CLLastName, Breeds.BrBreed, GroomingLog.GLCheckInTime, GroomingLog.GLR, GroomingLog.GLB, GroomingLog.GLD, GroomingLog.GLF
FROM (Clients INNER JOIN (Pets LEFT JOIN GroomingLog ON Pets.[PtSeq] = GroomingLog.[GLPetID]) ON Clients.CLSeq = Pets.PtOwnerCode) INNER JOIN Breeds ON Pets.PtBreedID = Breeds.BrSeq
WHERE (((GroomingLog.GLDate)=Date()))
ORDER BY GroomingLog.GLInTime";
$result = $db->query($sql);
?>
<table id="idTable" class="table table-striped table-bordered">        
<?php
while ($row = $result->fetch(PDO::FETCH_ASSOC)){
    $seq= $row['GLSeq'];
    $timeGL = $row['GLInTime'];  
    $checkinTimeNotMil = $row['GLCheckInTime'];
    $newTimeGL = str_replace("1899-12-30"," ",$timeGL);
    $notMil = ( date("g:i a", strtotime($newTimeGL)) );
    if($row['GLCheckInTime']!=""){
        $checkinTimeNotMil = strtotime($checkinTimeNotMil);
        $newFormat = date('g:i A', $checkinTimeNotMil);
        //echo $newFormat;
    }else{
        $newFormat="--";
    }
?>

    <tr class="<?php echo $row['GLTakenBy'];if($row['GLGroom']== $row['GLBath']){echo " danger";}else if($row['GLGroom']=="-1"){echo" success";}else if($row['GLBath']=="-1"){echo" info";}?>">
    <td>
        <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="text" hidden=""value="<?php echo $row['GLSeq'] ?>"name="GLSeq">
        <input type="text" hidden=""value="<?php echo $row['GLTakenBy'] ?>"name="GLTakenBy">
        <input type="text" hidden=""value="<?php echo $row['GLCompleted'] ?>"name="GLCompleted">
        <input type="text" hidden=""value="<?php echo $row['GLR'] ?>"name="GLR">
        <input type="text" hidden=""value="<?php echo $row['GLB'] ?>"name="GLB">
        <input type="text" hidden=""value="<?php echo $row['GLD'] ?>"name="GLD">         
        <input type="text" hidden=""value="<?php echo $row['GLCheckInTime'] ?>"name="GLCheckInTime">
        <button type="submit" name="Claim"class="btn btn-default"><?php if($row['GLTakenBy']!=""){echo $row['GLTakenBy'];}else{echo "Claim";}?></button>
        
    </td>
    <td>
        <span class="table-font-norm"><?php echo $notMil;?></span></br>
        <?php echo $newFormat;?>
    </td>
    <td>
        <span class="table-color2"><?php echo $row['PtPetName'];?></span></br>
        <?php echo $row['BrBreed'];?>
    </td>
    <td>
        
        <?php echo $row['CLLastName'];?></br>
        <a class="href-button" href=<?php echo"/appointment.php/?GLSeq=".$seq.""  ?>>Description</a>
    </td>
    <td>
        <?php echo "10:00 A.M."; ?>
    </td>
    <td>
        <div class="btn-group" role="group" >
            <button type="submit" class="btn btn-default <?php if($row['GLR']!=0){ echo"btn-success";}?>" name="Rough">Rough</button>
            <button type="submit" class="btn btn-default <?php if($row['GLB']!=0){ echo"btn btn-info";}?>" name="Bath">Bath</button>
        </div>
        <div class="btn-group" role="group" >
            <button type="submit" class="btn btn-default <?php if($row['GLD']!=0){ echo"btn btn-warning";}?>" name="Dry">Dry</button>
            <button type="submit" class="btn btn-default <?php if($row['GLCompleted']!=0){ echo"btn btn-danger";}?>" name="Finished">Finished</button>
        </div>  
    </td>
</form>
</tr>

<?php } ?>
    
</table>
<script>
    var x = document.getElementById("idTakenBy").innerHTML;            
    $(document).ready(function(){
        $("#hide").click(function(){
            $("#idTable tr:not(."+x+")").hide();
        });
        $("#show").click(function(){
            $("tr").show();
        });
    });
</script>
</body>
</html>

