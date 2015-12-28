<?php

function accessDataBase($sql){

echo"inside connect.php";

$db = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=96.226.36.3\\\\C:\\kc6\\wkennel.mdb; Uid=; Pwd=;");
$result = $db->query($sql);
return $result;
}
//\\C:\\kc6\\wkennel.mdb
?>