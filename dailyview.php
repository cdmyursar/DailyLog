<?php
include '/includes/header.php';
include '/includes/connect.php';
include '/includes/brdf.php';
?>

<body>
<div class="container">
    <?php 
        include '/includes/timeBig.php';
        date_default_timezone_set('America/Denver');
    ?>
    
<div class="table-responsive">
<table class="table">
<thead>
    <tr class="warning">
        <th><h3 class="text-center">Appointment Time</h3></th>
        <th><h3 class="text-center">Dog - Customer</h3></th>
        <th><h3 class="text-center">B&B or Groom</h3></th>
    </tr>
</thead>
<tbody id="ajaxcalls">
</tbody>
</table>
</div>
    <script>
        setInterval("ajaxCallPHP()", 5000);
        var ajaxCallPHP = function(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("ajaxcalls").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("POST", "includes/ajax_dailyview.php", true);
            xmlhttp.send();
        }
    </script>
</body>
</html>

