<?php
session_start();
$_SESSION['TakenBy'];
$_SESSION['result'];

include '/includes/header.php';
include '/includes/connect.php';
include '/includes/navbar.php'; 
include '/includes/posttest.php';


?> 
<body>
    <div class="container">
        <div class="jumbotron">
            <form role="form" class="form-vertical" method="POST" action="/complete.php">
                <div class="panel panel-primary">
                    <div class="panel-heading">Customer Information</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">                                  
                                    <label class="control-label">Dog Name:</label>
                                    <input type="text" id="petName" name="pet" class="form-control"  required="TRUE" placeholder="Please Enter Dog Name" value="<?php echo$_SESSION['result']['petName']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Breed:</label>
                                    <input type="text" name="breed" disabled="" class="form-control" value="<?php echo $_SESSION['result']['petBread'];?>">
                                </div>
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input type="text" required="" name="firstName" required="TRUE" class="form-control" value="<?php echo $_SESSION['result']['custFName'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input type="text" required="" name="lastName" required="TRUE" class="form-control" value="<?php echo $_SESSION['result']['custLName'];?>">
                                </div>
                               
                            </div>
                            <div class="col-xs-6">
                                
                                <div class="form-group">
                                    <label>Phone Numbers:</label>
                                    <input type="text" name="phone1" placeholder="phone number" required="TRUE" class="form-control phoneNum" value="<?php echo $_SESSION['result']['phone1'];?>">
                                    <input type="text" name="phone2" placeholder="phone number" class="form-control phoneNum" value="<?php echo $_SESSION['result']['phone2'];?>">
                                    <input type="text" name="phone3" placeholder="phone number" class="form-control phoneNum" value="<?php echo $_SESSION['result']['phone3'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" name="email" placeholder="Email" class="form-control" value="<?PHP echo $_SESSION['result']['email'];?>"
                                </div>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
                <div class="panel panel-default panel-info">
                    <div class="panel-heading">Grooming Instructions</div>
                    <div class="panel-body">
                        <?php 
                            if($_SESSION['result']['boolgroom']==-1){
                               echo "<p>Bath and Hair Cut</p> <br/>"; 
                            }else{
                                echo "<p>Bath and Brush Out</p> <br/>";
                            }
                            echo "<p>";
                                for($i = 0; $i<count($spliceTxtArea); $i++){
                                    echo $spliceTxtArea[$i]."<br/>";
                                }
                            echo "</p>";
                        ?>
                    </div>
                </div>
                <div class="panel panel-default panel-danger">
                    <div class="panel-heading">Customer Agreement</div>
                        <div class="panel-body">
                            <button id="btnagreement" type="button" class="btn btn-info">Read Agreement</button>
                                <div id="agreement">
                                    <?PHP include '\contract.html';?>
                                </div>
                        </div>
                        <div class="bg-danger" style="padding: 10px;">
                            <p id="labelagree">I agree to customer agreement.</p>
                        </div>
                </div>
                <div class="sigBorder">                   
                    <?php include '\signature.html';?>
                </div>
                <textarea required="" name="signature" id="mySig" hidden=""></textarea>
                <button class="btn btn-info" type="button" onclick="$('#signature').jSignature('clear')">Clear</button>
                <button type="submit" onclick="return svg();" class="btn btn-default">Complete Check-In</button> 
            </form>
        </div>    
    </div>
<?php $db =  null;?>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script>$(document).ready(function(){
        jQuery(function(phoneFormat){
            $(".phoneNum").mask("(999)999-9999");
});
});

$(document).ready(function(){
    $("#btnagreement").click(function(){
        $("#agreement").toggle();
    });
});

</script>
</body>
</html>