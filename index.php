<?php
include '/includes/connect.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){
//    echo $_POST["userName"];
//    echo $_POST['userPassword'];
    $sql = "SELECT USLOGIN, USPASSWORD FROM Employees WHERE USLOGIN='".$_POST['userName']."' AND USPASSWORD='".$_POST['userPassword']."'";         
    $result = $db->query($sql);
       while ($row = $result->fetch(PDO::FETCH_ASSOC)){
           $loginSQL = $row['USLOGIN'];
           $passwordSQL = $row['USPASSWORD'];
            if($_POST['userName'] == $loginSQL && $_POST['userPassword'] == $passwordSQL){
                if($_POST['userName']!= "LOG"){
                    session_start();
                    $_SESSION['TakenBy']=$_POST['userName'];
                    $db = null;
                    header("location:/dailylog.php");
                }else{
                    header("location:/dailyview.php");
                }
            }  
 
        }
        
}
include "/includes/header.php";
$db = null;
?>
<body>
   


<div class="container">
    <div class="row">
        <div class="jumbotron">
            <div class="form-login">
                 <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h4>Welcome back.</h4>
                    <input type="text" id="userName" name="userName" class="form-control input-sm chat-input" placeholder="username" required="" autofocus="" />
                    </br>
                    <input type="password" id="userPassword" name="userPassword" class="form-control input-sm chat-input" placeholder="password" required=""/>
                    </br>
                    <div class="wrapper">
                    <span class="group-btn">   
                        <button class="btn btn-primary btn-md" type="submit">Login</button>
                    </span>
                    </div>
                 </form>
            </div>
        
        </div>
    </div>
</div>
</body>
</html>