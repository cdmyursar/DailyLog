<?php
    //had a button on dailylog.php, groomer would click and would assign initials to dog in GLTakenBy
    //not used anymnore bc I changed how groomers check in dogs.
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
            
            ?>