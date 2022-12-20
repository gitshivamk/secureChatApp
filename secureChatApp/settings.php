
<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>
<?php include_once "header.php"; ?>
     <div class="main">
     <form action="setting_script.php" method="post">
     <center><h2 style="font-weight:600; color:rgb(68, 81, 83);">Secure Chat</h2></center>
     <hr>
     <input type="password" placeholder="Current password" class="form-control" name="curpwd" required>
     <input type="password" placeholder="New password" class="form-control" name="npw" required>
     <input type="password" placeholder="Confirm new passowrd" class="form-control" name="cpw" required>
     
     <input type="submit" value="Reset password" class="btn btn-success btn-block" name="submitbtn">
     
     <div class = "bottom" align="center">
         <a href="user.php">Cancel</a>
     </div>
</form>
</div>
</body>
</html>