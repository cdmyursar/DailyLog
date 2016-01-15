<?php

 function progress($finish,$dry,$bath,$rough){
    $progressBarStatus = 1;
    if($finish=='1'){
        $progressBarStatus = 100;
    }else if($dry == '1'){
        $progressBarStatus = 75;
    }else if($bath=='1'){
        $progressBarStatus = 50;
    }else if($rough=='1'){
        $progressBarStatus = 25;
    }else{
        $progressBarStatus = 1;
    }
    return $progressBarStatus;
 }
