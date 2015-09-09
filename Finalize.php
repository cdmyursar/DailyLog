<?php
session_start();
$_SESSION['TakenBy'];
include '/includes/header.php';
include '/includes/connect.php';
include '/includes/navbar.php'; 

$txtArea = $_POST['txtarea1']; 
$spliceTxtArea = split("\n",$txtArea);
$otherRate = 0;

if(isset($_POST['nailfile'])){
//    echo $_POST['nailfile'];
    $otherRate +=10;
}
 if(isset($_POST['teethbrush'])){
//    echo $_POST['teethbrush'];
    $otherRate +=10;
}
if(isset($_POST['dematt'])){
//   echo $_POST['dematt'];
   $otherRate +=15;
}

if(isset($_POST['deskunk'])){
//    echo $_POST['deskunk'];
    $otherRate +=30;
}
 if(isset($_POST['flea'])){
//    echo $_POST['flea'];
    $otherRate +=5;
}
if($_POST['shampoo']!= " "){
    $otherRate+=5;
//    echo "<br /> inside shampoo if, substr= ".$otherRate;
//    echo " other rate = ".$otherRate;
}
if($_POST['deshed'] != " "){
    $subStr = substr($_POST['deshed'], -5, -3);
    $otherRate += $subStr;
//    echo "<br />inside Deshed if, subst= ".$subStr;
//    echo " other rate = ".$otherRate;
}
if($_POST['fleadip']!= " "){
    $subStr = substr($_POST['fleadip'], -5, -3);
    $otherRate += $subStr;
//    echo "<br />inside fleadip if, substr= ".$subStr;
//    echo " other rate = ".$otherRate;
}

$postGLSeq = $_POST["GLSeq"]; 

?> 
<body>
    <div class="container">
        <div class="jumbotron">
            <form role="form" method="POST" action="">
                <div>
                    <h2>Instructions</h2>
                    <?php 
//                    echo $otherRate."<br/>";
                    echo "<p>";
                    for($i = 0; $i<count($spliceTxtArea); $i++){
                        echo $spliceTxtArea[$i]."<br/>";
                    }
                    echo "</p>";
                    ?>
                </div>
            <button class="btn btn-default" type="submit">Save</button>
            </form>
        </div>
    </div>   
<?php $db =  null;?>
</body>
</html>