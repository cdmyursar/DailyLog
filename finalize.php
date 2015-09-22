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
                    <div class="panel-heading">Customer Information
                        <!--<button class="btn btn-default btn-xs" onclick="editFields();" style="float:right;"type="button">Edit</button>-->
                    </div>
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
                                    <label class="control-label">Address:</label>
                                    <input type="text" name="address" class="form-control" required="TRUE" placeholder="Address"value="<?php echo $_SESSION['result']["address"];?>">
                                    <input type="text" name="city" class="form-control" required="TRUE" placeholder="City"value="<?php echo $_SESSION['result']["city"];?>">    
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" name="state" class="form-control" maxlength="2"placeholder="State"value="<?php echo $_SESSION['result']["state"];?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text"  name="zip" class="form-control" required="TRUE" placeholder="Zipcode"value="<?php echo $_SESSION['result']["zip"];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input type="text" required="" name="firstName" required="TRUE" class="form-control" value="<?php echo $_SESSION['result']['custFName'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input type="text" required="" name="lastName" required="TRUE" class="form-control" value="<?php echo $_SESSION['result']['custLName'];?>">
                                </div>
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
                        <?PHP include '\contract.html';?>
                    </div>
                    <div class="bg-danger" style="padding: 10px;">
                        <input type="checkbox" required="TRUE" name="chbxagree" value="I AGREED TO TERMS" id="chbxagree">
                        <p id="labelagree">I agree to customer agreement.</p>
                    </div>
                </div>
                <?php include '\signature.html';?>
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
</script>
</body>
</html>