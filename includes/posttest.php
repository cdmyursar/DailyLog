<?php
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

if(isset($_POST['deskunk'])){
    $otherRate +=30;
    $_SESSION['result']['boolOthers']=-1;
   $_SESSION['result']['otherRate'] = $otherRate;
}
 if(isset($_POST['flea'])){
    $otherRate +=5;
    $_SESSION['result']['boolOthers']=-1;
    $_SESSION['result']['otherRate'] = $otherRate;
}
if(isset($_POST['shampoo'])){
    if($_POST['shampoo'] != " "){
    $otherRate+=5;
    $_SESSION['result']['boolOthers']=-1;
    $_SESSION['result']['otherRate'] = $otherRate;
    }
}
if(isset($_POST['deshed'])){
    if($_POST['deshed'] != " "){
    $subStr = substr($_POST['deshed'], -5, -3);
    $otherRate += $subStr;
    $_SESSION['result']['boolOthers']=-1;
    $_SESSION['result']['otherRate'] = $otherRate;
    }
}
if(isset($_POST['fleadip'])){
    if($_POST['fleadip'] != " "){
    $subStr = substr($_POST['fleadip'], -5, -3);
    $otherRate += $subStr;
    $_SESSION['result']['boolOthers']=-1;
    $_SESSION['result']['otherRate'] = $otherRate;
    }
}

//set boolOther or boolNail to 0 if equals null
if($_SESSION['result']['boolOthers']==null){
    $_SESSION['result']['boolOthers']=0;
}
if($_SESSION['result']['boolNail']==null){
    $_SESSION['result']['boolNail']=0;
}

//check if txtarea1 was pass via POST, assign new txtarea to description
if(isset($_POST['txtarea1'])){
        $_SESSION['result']['description']=$_POST['txtarea1'];    
    }
    
    //split txtarea by line break for display to customer
    $txtArea = $_SESSION['result']['description'];
    $spliceTxtArea = split("\n",$txtArea);
?>