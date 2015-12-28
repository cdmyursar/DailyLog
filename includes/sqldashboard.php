<?php
include '/includes/connect.php';

//$sql = "SELECT GroomingLog.GLRate, GroomingLog.GLBathRate, "
//    . "GroomingLog.GLGroom, GroomingLog.GLBath, "
//    . "GroomingLog.GLGroomNails, GroomingLog.GLGroomOthers, GroomingLog.GLNailsRate, "
//    . "GroomingLog.GLOthersRate, "
//    . "Pets.PtPetName, Clients.CLFirstName, Clients.CLLastName, Breeds.BrBreed, "
//    . "GroomingLog.GLPetID, Pets.PtOwnerCode, Clients.CLSeq "
//    . "FROM (Clients INNER JOIN (Pets LEFT JOIN GroomingLog ON Pets.[PtSeq] = GroomingLog.[GLPetID]) ON Clients.CLSeq = Pets.PtOwnerCode) INNER JOIN Breeds ON Pets.PtBreedID = Breeds.BrSeq "
//    . "WHERE GLSeq=$getGLSeq";        
        
function rangeMonth($datestr) {
date_default_timezone_set(date_default_timezone_get());
$dt = strtotime($datestr);
$res['start'] = date('Y-m-d', strtotime('first day of this month', $dt));
$res['end'] = date('Y-m-d', strtotime('last day of this month', $dt));
return $res;
}

function rangeWeek($datestr) {
date_default_timezone_set('America/Chicago');
$dt = strtotime($datestr);
$res['start'] = date('N', $dt)==1 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('last sunday', $dt));
$res['end'] = date('N', $dt)==7 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('next saturday', $dt));
return $res;
}
  
//function weekly($week){
//    $a = rangeWeek($week);
//    $start = $a['start'];
//    $end = $a['end'];
//    $sql = "SELECT GroomingLog.GLRate, GroomingLog.GLBathRate, GLDate, "
//        . "GroomingLog.GLGroom, GroomingLog.GLBath, "
//        . "GroomingLog.GLGroomNails, GroomingLog.GLGroomOthers, GroomingLog.GLNailsRate, "
//        . "GroomingLog.GLOthersRate, "
//        . "Pets.PtPetName, Clients.CLFirstName, Clients.CLLastName, Breeds.BrBreed, "
//        . "GroomingLog.GLPetID, Pets.PtOwnerCode, Clients.CLSeq "
//        . "FROM (Clients INNER JOIN (Pets LEFT JOIN GroomingLog ON Pets.[PtSeq] = GroomingLog.[GLPetID]) ON Clients.CLSeq = Pets.PtOwnerCode) INNER JOIN Breeds ON Pets.PtBreedID = Breeds.BrSeq "
//        . "WHERE GLDate=(CDATE(ColumnDate) BETWEEN #$start# AND #$end#)";  
//    echo $sql;
//    $result = $db->query($sql);
//    while($row = $db->fetch(PDO::FETCH_ASSOC)){ 
//                echo $row['GLDate']."</br>";
//                
//            }
//    
//}
    
//    $a = rangeWeek('12-23-2015');
//    echo $a['start'];
//    echo $a['end'];
    
    //print_r(rangeMonth('2011-4-5')); //month-day-year
    //print_r(rangeWeek('2015-12-29'));
    

?>