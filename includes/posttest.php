<?php
//variables for test on checkin
$sig = $_SESSION['result']['signature'];
$ter = $_SESSION['result']['terms'];

//variable for nailRate and otherRate
$otherRate=0;
$nailRate=0;

//test if POST variables were set, runs 1 time on page load.
if(isset($_POST['groomOption'])){
    if($_POST['groomOption'] == 'bb'){
    echo "Bath OPtion ";
    $_SESSION['result']['boolBath'] = -1;
    $_SESSION['result']['boolgroom'] = 0;
    $_SESSION['result']['bathRate'] = $_POST['bbPrice'];
    }
    if($_POST['groomOption'] == 'groom'){
    echo " ".$_POST['groomOption'];
    $_SESSION['result']['boolgroom'] = -1;
    $_SESSION['result']['boolBath'] = 0;
    $_SESSION['result']['groomRate'] = $_POST['groomPrice'];
    }
    
}
if(isset($_POST['nailfile'])){
    echo "nail File ";
    $nailFileRate =10;
    $_SESSION['result']['boolNail']=-1;
    $_SESSION['result']['nailFileRate']=$nailFileRate;
}
if(!isset($_POST['nailfile'])){
    echo "nail File ";
    $nailFileRate =0;
    $_SESSION['result']['boolNail']=0;
    $_SESSION['result']['nailFileRate']=$nailFileRate;
}

 if(isset($_POST['teethbrush'])){
     echo "teeth";
    $otherRate +=10;
    $_SESSION['result']['boolOthers']=-1;
    $_SESSION['result']['otherRate'] = $otherRate;
}
if(isset($_POST['dematt'])){
   $otherRate +=15;
   $_SESSION['result']['boolOthers']=-1;
   $_SESSION['result']['otherRate'] = $otherRate;
}

//if(isset($_POST['deskunk'])){
//    $otherRate +=30;
//    $_SESSION['result']['boolOthers']=-1;
//    $_SESSION['result']['otherRate'] = $otherRate;
//}
// if(isset($_POST['flea'])){
//    $otherRate +=5;
//    $_SESSION['result']['boolOthers']=-1;
//    $_SESSION['result']['otherRate'] = $otherRate;
//}
//if(isset($_POST['shampoo'])){
//    if($_POST['shampoo'] != " "){
//    $otherRate+=5;
//    $_SESSION['result']['boolOthers']=-1;
//    $_SESSION['result']['otherRate'] = $otherRate;
//    }
//}
if(isset($_POST['deshed'])){
    if($_POST['deshed'] != " "){
    $subStr = substr($_POST['deshed'], -5, -3);
    $otherRate += $subStr;
    $_SESSION['result']['boolOthers']=-1;
    $_SESSION['result']['otherRate'] = $otherRate;
    }
}
//if(isset($_POST['fleadip'])){
//    if($_POST['fleadip'] != " "){
//    $subStr = substr($_POST['fleadip'], -5, -3);
//    $otherRate += $subStr;
//    $_SESSION['result']['boolOthers']=-1;
//    $_SESSION['result']['otherRate'] = $otherRate;
//    }
//}

if($otherRate == 0){
    $zero = 0;
    $_SESSION['result']['boolOthers']=0;
    $_SESSION['result']['otherRate'] = $zero;
}


//check if txtarea1 was pass via POST, assign new txtarea to description
if(isset($_POST['txtarea1'])){
        $_SESSION['result']['description']=$_POST['txtarea1'];    
    }
    
    //split txtarea by line break for display to customer
    $txtArea = $_SESSION['result']['description'];
    $spliceTxtArea = split("\n",$txtArea);
    
//test if customer checked in already
if($sig != ""){
    if($ter != ""){
        
        $glSeq = $_SESSION['result']['glSeq'];
        
        $bathRate = $_SESSION['result']['bathRate'];
        $groomRate = $_SESSION['result']['groomRate'];

        $description = $_SESSION['result']['description'];

        $boolGroom = $_SESSION['result']['boolgroom'];
        $boolBath = $_SESSION['result']['boolBath'];
        
        $othersRate = $_SESSION['result']['otherRate'];
        $boolOther = $_SESSION['result']['boolOthers'];
        
        $nailFileRate = $_SESSION['result']['nailFileRate'];
        $boolNail = $_SESSION['result']['boolNail'];
   
        $sql = "UPDATE GroomingLog "
            . "SET "
            . "GLGroom = $boolGroom, GLBath = $boolBath, "
            . "GLDescription = '$description', "
            . "GLRate = $groomRate, GLBathRate = $bathRate, "
            . "GLNailsRate = $nailFileRate, GLOthersRate = $othersRate, "
            . "GLGroomNails = $boolNail, GLGroomOthers = $boolOther "
            . "WHERE GLSeq = $glSeq";
        $db->query($sql);
        $db=null;
        
        
        header("location:/dailylog.php");
    }
}

?>