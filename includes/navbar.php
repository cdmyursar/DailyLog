
<nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" >Hi, <?php echo $_SESSION['TakenBy']; ?></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/WeekLog.php"><span class="glyphicon glyphicon-user"></span> My Week</a></li>
                        <li><a href="/DailyLog.php"><span class="glyphicon glyphicon-th-list"></span> Today&nbsp;</a></li>
                    </ul>
                </div>
            </div>    
                
            
        </nav>