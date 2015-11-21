<?php
include 'connect.php';

$sql = "SELECT GroomingLog.GLCall, GroomingLog.GLTakenBy, GroomingLog.GLGroom, 
    GroomingLog.GLBath, GroomingLog.GLCompleted, GroomingLog.GLSeq, 
    GroomingLog.GLInTime, GroomingLog.GLCageNumber, 
    GroomingLog.GLR, GroomingLog.GLB, GroomingLog.GLD, GroomingLog.GLF,
    Pets.PtPetName, 
    Clients.CLLastName, Breeds.BrBreed, GroomingLog.GLCheckInTime
    FROM (Clients INNER JOIN (Pets LEFT JOIN GroomingLog ON Pets.[PtSeq] = GroomingLog.[GLPetID]) ON Clients.CLSeq = Pets.PtOwnerCode) INNER JOIN Breeds ON Pets.PtBreedID = Breeds.BrSeq
    WHERE (((GroomingLog.GLDate)=Date()))
    ORDER BY GroomingLog.GLInTime";
    $result = $db->query($sql);
    
    date_default_timezone_set('America/Chicago');
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        $timeGL = $row['GLInTime'];  
        $checkinTimeNotMil = $row['GLCheckInTime'];
        $newTimeGL = str_replace("1899-12-30"," ",$timeGL);
        $notMil = ( date("g:i a", strtotime($newTimeGL)) );
        
        $timecompare = date("g:i", strtotime($newTimeGL));
        $timeplus0 = strtotime($timecompare);
        $timeplus1 = strtotime($timecompare) +3600;
        $timeplus2 = strtotime($timecompare) +7200;
        $timeplus3 = strtotime($timecompare) +10800;
        
        $currentTime = date('h:i');
        
        if($currentTime > date('h:i',$timeplus3)){
            $backgroundColor = "fourhour";
        }else if($currentTime>date('h:i',$timeplus2)){
            $backgroundColor = "threehour";
        }else if($currentTime>date('h:i',$timeplus1)){
            $backgroundColor = "twohour";
        }else if($currentTime>date('h:i',$timeplus0)){
            $backgroundColor = "onehour";
        } else {
            $backgroundColor = "zerohour";
        }
       
        $progressBarStatus = 1;
        if($row['GLF']=='1'){
            $progressBarStatus = 100;
        }else if($row['GLD'] == '1'){
            $progressBarStatus = 75;
        }else if($row['GLB']=='1'){
            $progressBarStatus = 50;
        }else if($row['GLR']=='1'){
            $progressBarStatus = 25;
        }else{
            $progressBarStatus = 1;
        }
?>

<div class="col-md-12">
    <div class="col-md-1 cageNumber">
        <h1>3</h1>
    </div>
    <div class="col-md-5 dailyListDefault <?php echo $backgroundColor;?> border-top">
        <h1><?php echo $row['PtPetName']; echo ", "; echo $row['BrBreed'];?></h1>
    </div>
    <div class="col-md-3 dailyListDefault <?php echo $backgroundColor;?> border-top">
        <h1><?php echo $row['CLLastName'];?></h1>
    </div>
    <div class="col-md-2 dailyListDefault <?php echo $backgroundColor;?> border-top">
        <h1><?php echo $notMil; ?></h1>
    </div>
    <div class="col-md-1 dailyListDefault <?php echo $backgroundColor;?> radius-right border-top-and-right">
            <h1><?php if($row['GLGroom']== -1)
                {echo "Grm";}
                else{echo "B&B";} ?></h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="progress progress-striped">
                <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="<?php echo $progressBarStatus;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progressBarStatus;?>%;">
                    <!--        <span class="sr-only">60% Complete</span>-->
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php
} 
$db=null;
$result = null;
?>
