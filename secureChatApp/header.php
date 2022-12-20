<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
      <div class="navbar navbar-default navbar-fixed-top"> 

    <div class="container"> 

        <div class="navbar-header"> 
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
            </button> 
            <a class="navbar-brand" href="index.php" style="font-weight:600; color:#232323;">Secure Chat</a> 
        </div> 
        <div class="collapse navbar-collapse" id="myNavbar"> 
            <ul class="nav navbar-nav navbar-right"> 
            
                <?php 
                if(isset($_SESSION['unique_id'])) { ?>
                
                    <li><a href = "settings.php"><span class = "glyphicon glyphicon-cog"></span> Settings</a></li> 
                    <li><a href = "logout.php?logout_id= unique_id" ><span class = "glyphicon glyphicon-log-out"></span> Logout</a></li>
                    
                    <?php } else { ?> 
                   
                        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> 
                        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
                        
                    <?php } ?> 
                   
            </ul> 
        </div> 
    </div> 
</div>

