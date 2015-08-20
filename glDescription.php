<?php

session_start();
$_SESSION['TakenBy'];
$GLSeq = $_GET['GLSeq'];
include '/includes/header.php';
include '/includes/connect.php';
include '/includes/navbar.php'; 
include '/includes/ServerRequestDescription.php';


$sql = "SELECT GroomingLog.GLDescription "
        . "FROM GroomingLog "
        . "WHERE GLSeq=$GLSeq";
$result = $db->query($sql);

?>

<body>
    <div class="container">
        <div class="jumbotron">
           <div class="btn-group" role="group" >
                <button name="10"class="btn btn-default">10</button>
                <button name="7" class="btn btn-default">7</button>
                <button name="5"class="btn btn-default">5</button>
                <button name="4"class="btn btn-default">4</button>
                <button id="0" name="0"class="btn btn-default">0</button>
            </div>  
            <textarea id="txtarea"><?php while($row = $result->fetch(PDO::FETCH_ASSOC)){echo $row['GLDescription'];}?>
            </textarea>
        </div>
       
    </div>
    <script>
        $("#0").click(function(){
            var content = "0";
            $("#txtarea").append(content);
        })
    </script>    
</body>
</html>