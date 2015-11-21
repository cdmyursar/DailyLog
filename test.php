<?php

    include 'includes/header.php';
    date_default_timezone_set('America/Chicago');
    
    $time = date('h:i');
    $d = '10:00';
    $time2 = strtotime($d);
    
    echo date('h:i',$time2);
    echo $time;
    
    if($time < date('h:i',$time2)){
        echo "         time < time2";
    }
    
    
    
?>
