<?php
session_start();
$_SESSION['TakenBy'];
$_SESSION['result'];


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
var_dump($_SESSION['result']);
    
$signature = $_POST['signature'];
$_SESSION['result']['signature']=$signature;
echo $signature;






 
 


}
?>
