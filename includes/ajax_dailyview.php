<?php
include 'connect.php';
$sql = "SELECT GroomingLog.GLCall, GroomingLog.GLTakenBy, GroomingLog.GLGroom, GroomingLog.GLBath, GroomingLog.GLCompleted, GroomingLog.GLSeq, GroomingLog.GLInTime, Pets.PtPetName, Clients.CLLastName, Breeds.BrBreed, GroomingLog.GLCheckInTime, GroomingLog.GLR, GroomingLog.GLB, GroomingLog.GLD, GroomingLog.GLF
    FROM (Clients INNER JOIN (Pets LEFT JOIN GroomingLog ON Pets.[PtSeq] = GroomingLog.[GLPetID]) ON Clients.CLSeq = Pets.PtOwnerCode) INNER JOIN Breeds ON Pets.PtBreedID = Breeds.BrSeq
    WHERE (((GroomingLog.GLDate)=Date()))
    ORDER BY GroomingLog.GLInTime";
    $result = $db->query($sql);
        
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        $timeGL = $row['GLInTime'];  
        $checkinTimeNotMil = $row['GLCheckInTime'];
        $newTimeGL = str_replace("1899-12-30"," ",$timeGL);
        $notMil = ( date("g:i a", strtotime($newTimeGL)) );
    
    
    
    
    echo '<tr class="success"> 
    <td >
        <h1>'; echo $notMil; echo '</h1>
    </td>    
    <td>
        <span class="table-color2"><h3>'; echo $row['PtPetName']; echo'</span>'; echo ", ".$row['CLLastName']; echo'</h3>';
  echo '<span class="breedcolor"><h3>'; echo $row['BrBreed']; echo'</h3></span>
    </td>
    <td><h1>'; 
            if($row['GLGroom']&&$row['GLBath']==-1){echo "Not Selected";}
                else if($row['GLGroom']==-1){echo "Groom";}
                    else {echo "Bath & Brush";}
        
    echo '</h1></td>';
    
        if($row['GLR']!=0){
            echo "<td class=\"success\">"
            . "<h1>R</h1>"
            . "</td>";    
        }
        if($row['GLB']!=0){
            echo "<td class=\"success\">"
            . "<h1>B</h1>"
            . "</td>";    
        }
        if($row['GLD']!=0){
            echo "<td class=\"success\">"
            . "<h1>D</h1>"
            . "</td>";    
        }
        if($row['GLCompleted']!=0){
            echo "<td class=\"success\">"
            . "<h1>F</h1>"
            . "</td>";    
        }
   
        echo '</tr>';

} 
$db=null;
$result = null;
?>