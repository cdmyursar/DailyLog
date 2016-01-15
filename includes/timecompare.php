<?php
function timeCompare($timeComparing,$boolCheckIn){
      $timecompare = date("H:i", strtotime($timeComparing));
        $timepluszero = strtotime($timecompare);
        $timeplusone = strtotime($timecompare) +3600;
        $timeplustwo = strtotime($timecompare) +7200;
        $timeplusthree = strtotime($timecompare) +10800;
        
        $timeplus0 = date('H:i',$timepluszero);
        $timeplus1 = date('H:i',$timeplusone);
        $timeplus2 = date('H:i',$timeplustwo);
        $timeplus3 = date('H:i',$timeplusthree);
 
        $currentTime = date('H:m');
        
        
        if($boolCheckIn == -1){
        if($currentTime > $timeplus3){
            $backgroundColor = "fourhour";
        }else if($currentTime>$timeplus2){
            $backgroundColor = "threehour";
        }else if($currentTime>$timeplus1){
            $backgroundColor = "twohour";
        }else if($currentTime>$timeplus0){
            $backgroundColor = "onehour";
        } else {
            $backgroundColor = "zerohour";
        }}else{
            $backgroundColor = "notCheckIn";
        }
      

    return $backgroundColor;
    
}
