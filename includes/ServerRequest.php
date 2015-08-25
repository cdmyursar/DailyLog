<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postDogID = $_POST["GLSeq"]; 
    $postTakenBy = $_POST['GLTakenBy'];
    echo $postTakenBy;
    echo $_SESSION['TakenBy'];
    $postRough = $_POST['GLR'];
    $postBath = $_POST['GLB'];
    $postDry = $_POST['GLD'];
    $postCompleted = $_POST['GLCompleted'];
    $postCheckInTime = $_POST['GLCheckInTime'];
    

    if(isset($_POST['Claim'])){
        if($postCheckInTime == ""){
            $sqlUpdateCheckInTime = "UPDATE GroomingLog "
                                    . "SET GLCheckInTime=Now() "
                                    . "WHERE GLSeq=".$postDogID."";
            $db->query($sqlUpdateCheckInTime);
        }
        if($postTakenBy == $_SESSION['TakenBy']){
            $sqlUpdate = "UPDATE GroomingLog "
                        ."SET GLTakenBy='' "
                        ."WHERE GLSeq=".$postDogID."";
            $db->query($sqlUpdate);    
        }else if($postTakenBy === ''){
            $sqlUpdate = "UPDATE GroomingLog "
                        ."SET GLTakenBy='".$_SESSION['TakenBy']."' "
                        ."WHERE GLSeq=".$postDogID."";
            $db->query($sqlUpdate);  
        }else if($postTakenBy != $_SESSION['TakenBy']){
        ?>
        <script>
        alert("Can't claim a dog already claimed!");
        </script>
            <?php
        }
    }
    if(isset($_POST['Rough'])){
        // echo "Rough";
         if($postRough == "0" || ""){
             if($postTakenBy == $_SESSION['TakenBy']){
                $postRough = "1";
                $sqlUpdate = "UPDATE GroomingLog "
                    . "SET GLR='".$postRough."' "
                    . "WHERE GLSeq=".$postDogID."";
                $db->query($sqlUpdate);
             }
        }else if ($postRough == 1) {
            echo "inside if";
            if($postTakenBy == $_SESSION['TakenBy']){
                echo "inside else statement";
                $postRough = "0";
                $sqlUpdate = "UPDATE GroomingLog "
                    . "SET GLR='".$postRough."' "
                    . "WHERE GLSeq=".$postDogID."";
                $db->query($sqlUpdate);
            }
        }
    }
    if(isset($_POST['Bath'])){
      //echo "Bath";
      if($postBath == "0" || ''){
          if( $postTakenBy == $_SESSION['TakenBy']){
                $postBath = "1";
                $sqlUpdate = "UPDATE GroomingLog "
                    . "SET GLB='".$postBath."' "
                    . "WHERE GLSeq=".$postDogID."";
                $db->query($sqlUpdate);
          }
        }else if ($postBath == "1") {
            if( $postTakenBy == $_SESSION['TakenBy']){
                $postBath = "0";
                $sqlUpdate = "UPDATE GroomingLog "
                    . "SET GLB='".$postBath."' "
                    . "WHERE GLSeq=".$postDogID."";
                $db->query($sqlUpdate);
            }
        }
    }
    if(isset($_POST['Dry'])){
        //echo "Dry";
        if($postDry == "0" ||''){
            if( $postTakenBy == $_SESSION['TakenBy']){
                $postDry = "1";
                $sqlUpdate = "UPDATE GroomingLog "
                    . "SET GLD='".$postDry."' "
                    . "WHERE GLSeq=".$postDogID."";
                $db->query($sqlUpdate);
            }
        }else if ($postDry == "1") {
            if( $postTakenBy == $_SESSION['TakenBy']){
                $postDry = "0";
                $sqlUpdate = "UPDATE GroomingLog "
                    . "SET GLD='".$postDry."' "
                    . "WHERE GLSeq=".$postDogID."";
                $db->query($sqlUpdate);
            }
        }
    }
    if(isset($_POST['Finished'])){
        //echo "Finished";
        if($postCompleted == "0" || ""){
            if( $postTakenBy == $_SESSION['TakenBy']){
                $postCompleted = "-1";
                $sqlUpdate = "UPDATE GroomingLog "
                    . "SET GLCompleted='".$postCompleted."', GLCall='-1' "
                    . "WHERE GLSeq=".$postDogID."";
                $db->query($sqlUpdate);
            }
        }else if ($postCompleted == "-1") {
            if( $postTakenBy == $_SESSION['TakenBy']){
                $postCompleted = "0";
                $sqlUpdate = "UPDATE GroomingLog "
                    . "SET GLCompleted='".$postCompleted."', GLCall='0' "
                    . "WHERE GLSeq=".$postDogID."";
                $db->query($sqlUpdate);
            }
        }
    }
}
?>