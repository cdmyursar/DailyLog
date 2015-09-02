<?php 
session_start();
$_SESSION['TakenBy'];
include '/includes/header.php';
include '/includes/navbar.php';
?>


<body onselectstart="return false">
    <div class="container">
        <div class="jumbotron">
            <div id="signature-pad" class="m-signature-pad">
                <div class="m-signature-pad--body">
                    <canvas></canvas>
                </div>
                <div class="m-signature-pad--footer">
                    <div class="description">Sign above</div>
                    <button class="button clear" data-action="clear">Clear</button>
                    <button class="button save" data-action="save">Save</button>
                </div>
            </div>

            <script src="js/signature_pad.js"></script>
            <script src="js/app.js"></script>
        </div>
    </div>
</body>
</html>
