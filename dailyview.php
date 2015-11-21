<?php
include '/includes/header.php';
include '/includes/connect.php';
?>

<body onload="ajaxCallPHP()">
<div class="container">
    <?php 
        include '/includes/timeBig.php';
        date_default_timezone_set('America/Chicago');
    ?>
    
    <div id="ajaxcalls" class="row box-shadow--16dp">
    </div>
       


    <script>
        //setInterval("ajaxCallPHP()", 5000);
        
        var ajaxCallPHP = function(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("ajaxcalls").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("POST", "includes/ajax_dailyview.php", true);
            xmlhttp.send();
        };
    </script>
    
</body>
</html>

