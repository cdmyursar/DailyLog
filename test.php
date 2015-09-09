<?php
session_start();
$_SESSION['TakenBy'];
include '/includes/header.php';
include '/includes/connect.php';
include '/includes/ServerRequest.php';
include '/includes/navbar.php'; 


$sql = "SELECT GroomingLog.GLDescription, Clients.CLFirstName, Clients.CLLastName, Clients.CLAddress1, Clients.CLCity, Clients.CLstate, Clients.CLZip, Clients.CLPhone1, Clients.ClEmail, Pets.PtPetName, GroomingLog.GLSeq, Pets.PtBreed
FROM GroomingLog LEFT JOIN (Clients INNER JOIN Pets ON Clients.CLSeq = Pets.PtOwnerCode) ON GroomingLog.GLPetID = Pets.PtSeq
WHERE (((GroomingLog.GLSeq)=12))";
        
        $result = $db->query($sql);
        
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo $row['GLDescription'];
            
            
        }
        
        
        ?>
