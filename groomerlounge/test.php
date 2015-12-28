
<a href="http://96.226.36.3">here</a>

<?php
include 'include/connect.php';

$sql = "SELECT * FROM Employees";
echo "before database connection </br>";
try{
    echo "trying to connect to database </br>";
$db = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=file://96.226.36.3/C:/xampp/htdocs; Uid=; Pwd=;");
 //$conn = new PDO("mysql:host=96.226.36.3;dbname=wkennel.mdb", "", "");
} catch (Exception $e){
    echo "caught excemption PDO ". $e->getMessage();
}
try{
    echo "result of database </br>";
$result = $db->query($sql);
}  catch (Exception $e){
    echo "caught excemption DB ". $e->getMessage();
}
while ($row = $result->fetch(PDO::FETCH_ASSOC)){
    echo $row['USLOGIN']."</br>";
}

//C:\\kc6\\wkennel.mdb