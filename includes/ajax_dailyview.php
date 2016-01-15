<?php
include 'connect.php';
include 'timecompare.php';
include 'progressbarstatus.php';
include 'groomercount.php';

$tagNumber = 0;
$groomerInitials=array();

$sql = "SELECT GroomingLog.GLCall, GroomingLog.GLTakenBy, GroomingLog.GLGroom, 
    GroomingLog.GLBath, GroomingLog.GLCompleted, GroomingLog.GLSeq, GroomingLog.GLCheckOut, 
    GroomingLog.GLInTime, GroomingLog.GLCageNumber, GroomingLog.GLCheckIn, 
    GroomingLog.GLR, GroomingLog.GLB, GroomingLog.GLD, GroomingLog.GLF,
    Pets.PtPetName, 
    Clients.CLLastName, Breeds.BrBreed, GroomingLog.GLCheckInTime
    FROM (Clients INNER JOIN (Pets LEFT JOIN GroomingLog ON Pets.[PtSeq] = GroomingLog.[GLPetID]) ON Clients.CLSeq = Pets.PtOwnerCode) INNER JOIN Breeds ON Pets.PtBreedID = Breeds.BrSeq
    WHERE (((GroomingLog.GLDate)=Date()))
    ORDER BY GroomingLog.GLInTime";
    $result = $db->query($sql);
    
    date_default_timezone_set('America/Chicago');
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        $boolCheckIn = $row['GLCheckIn'];
        $checkOut = $row['GLCheckOut'];
        $timeGL = $row['GLInTime'];  
        $checkinTimeNotMil = $row['GLCheckInTime'];
        $newTimeGL = str_replace("1899-12-30"," ",$timeGL);
        $notMil = ( date("g:i", strtotime($newTimeGL)) );
              
        $backgroundColor = timeCompare($newTimeGL,$boolCheckIn);
        
        $progressBarStatus = progress($row['GLF'],$row['GLD'],$row['GLB'],$row['GLR']);
         
        //$groomerInitials = groomercount($row['GLTakenBy']);
        if($groomerInitials == null || $groomerInitials!= $row['GLTakenBy']){
            $groomerInitials = array_push($groomerInitials, $row['GLTakenBy']);
            $groomerInitials[$row['GLTakenBy']]=1;
        } 
            
        $groomerInitials[$row['GLTakenBy']]+=1;
         
        $tagNumber++;
        if($checkOut != -1)
        {?>

            <div class="col-md-12">
                <div class="col-md-1 cageNumber">
                    <h2><b><?php echo $tagNumber;  ?></b></h2>
                </div>
                <div class="col-md-1 dailyListDefault <?php echo $backgroundColor;?> border-top">
                    <h2><b><?PHP if($row['GLTakenBy']!= ""){echo $row['GLTakenBy'];}else{echo "---";}?>10</b></h2>
                </div>
                <div class="col-md-3 dailyListDefault <?php echo $backgroundColor;?> border-top">
                    <h2><b><?php echo $row['PtPetName'];?></b></h2>
                </div>
                <div class="col-md-2 dailyListDefault <?php echo $backgroundColor;?> border-top">
                    <h2><b><?php echo substr($row['BrBreed'],0,9);?></b></h2>
                </div>
                <div class="col-md-2 dailyListDefault <?php echo $backgroundColor;?> border-top">
                    <h2><b><?php echo substr($row['CLLastName'],0,9);?></b></h2>
                </div>
                <div class="col-md-2 dailyListDefault <?php echo $backgroundColor;?> border-top">
                    <h2><?php echo $notMil; ?></b></h2>
                </div>
                <div class="col-md-1 dailyListDefault <?php echo $backgroundColor;?> radius-right border-top-and-right">
                        <h2><b><?php if($row['GLGroom']== -1)
                            {echo "Gr";}
                            else{echo "BB";} ?></b></h2>
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
    }
$db=null;
$result = null;
?>
