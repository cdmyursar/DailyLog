<?php
session_start();
$_SESSION['TakenBy'];
$_SESSION['result'];

include '/includes/connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){  
    $takenBy = $_SESSION['TakenBy'];
    $glSeq = $_SESSION['result']['glSeq'];
    $clSeq = $_SESSION['result']['clSeq'];
    $petID = $_SESSION['result']['petID'];
    
   $_SESSION['result']['petName'] = $_POST['pet'];
   $pet = $_SESSION['result']['petName'];
   $breed = $_SESSION['result']['petBread'];
   
   $bathRate = $_SESSION['result']['bathRate'];
   $groomRate = $_SESSION['result']['groomRate'];
   
   $description = $_SESSION['result']['description'];

   $boolGroom = $_SESSION['result']['boolgroom'];
   $boolBath = $_SESSION['result']['boolBath'];
   
   $nailFileRate = $_SESSION['result']['nailFileRate'];
   $otherRate = $_SESSION['result']['otherRate'];
   
   $boolOther = $_SESSION['result']['boolOthers'];
   $boolNail = $_SESSION['result']['boolNail'];
   
   $_SESSION['result']['custFName'] = $_POST['firstName'];
   $firstName = $_SESSION['result']['custFName'];
   $_SESSION['result']['custLName'] = $_POST['lastName'];
   $lastName = $_SESSION['result']['custLName'];
   
  // $_SESSION['result']['address'] = $_POST['address'];
   //$address = $_SESSION['result']['address'];
   //$_SESSION['result']['city'] = $_POST['city'];
   //$city = $_SESSION['result']['city'];
   //$_SESSION['result']['state'] = $_POST['state'];
   //$statehold = $_SESSION['result']['state'];
   //$state = strtoupper($statehold);
   //$_SESSION['result']['zip'] = $_POST['zip'];
   //$zip = $_SESSION['result']['zip'];

    $_SESSION['result']['phone1'] = $_POST['phone1'];
    $phone1 = $_SESSION['result']['phone1'];
    $_SESSION['result']['phone2'] = $_POST['phone2'];
    $phone2 = $_SESSION['result']['phone2'];
    $_SESSION['result']['phone3'] = $_POST['phone3'];
    $phone3 = $_SESSION['result']['phone3'];

    $_SESSION['result']['email'] = $_POST['email'];
    $email = $_SESSION['result']['email'];


    //$_SESSION['result']['terms'] = $_POST['chbxagree'];
    //$terms = $_SESSION['result']['terms'];

    $_SESSION['result']['signature']=$_POST['signature'];
    $signature = $_SESSION['result']['signature'];
  
     $sql = "UPDATE GroomingLog "
            . "SET "
            . "GLGroom = $boolGroom, GLBath = $boolBath, GLCheckIn= -1, "
            . "GLDescription = '$description',GLCheckInTime = NOW(), "
            . "GLRate = $groomRate, GLBathRate = $bathRate, "
            . "GLNailsRate = $nailFileRate, GLOthersRate = $otherRate, "
            . "GLGroomNails = $boolNail, GLGroomOthers = $boolOther, "
            . "GLSignature = '$signature', " //took checkbox off form, took out of sql code $terms  GLTerms = '$terms',
            . "GLTakenBy='$takenBy' "
            . "WHERE GLSeq = $glSeq";
     //sql statement stopped working... If fucked it up
//    $sql = "UPDATE GroomingLog "
//            //. "SET GroomingLog.GLDescription = '$description' WHERE GroomingLog.GLSeq = $glSeq";
//            . "SET "
//            . "GLGroom = $boolGroom, GLBath = $boolBath, "
//            . "GLDescription = $description, GLCheckInTime = NOW(), "
//            . "GLRate = $groomRate, GLBathRate = $bathRate, "
//            . "GLNailsRate = $nailFileRate, GLOthersRate = $otherRate, "
//            . "GLGroomNails = $boolNail, GLGroomOthers = $boolOther, "
//            . "GLSignature = '$signature', GLTerms = '$terms', "
//            . "GLTakenBy='$takenBy' "
//            . "WHERE GLSeq = $glSeq";
    $db->query($sql);
    $sql = "UPDATE Clients "
            . "SET "
            . "CLLastName = '$lastName', CLFirstName='$firstName', "
            //. "CLAddress1 = '$address', CLCity='$city', CLState='$state', CLZip = '$zip',"
            . "CLPhone1 = '$phone1', CLPhone2 = '$phone2', "
            . "CLPhone3 = '$phone3', clEmail = '$email' "
            . "WHERE CLSeq = $clSeq";
    $db->query($sql);
    $sql = "UPDATE Pets "
            . "SET "
            . "PtPetName = '$pet' "
            . "WHERE PtSeq = $petID";
    $db->query($sql);
    $db=null;
    
  header("location:/dailylog.php");  
}

?>
