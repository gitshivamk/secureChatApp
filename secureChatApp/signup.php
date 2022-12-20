<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: user.php");
  }
?>

<?php include_once "header.php"; ?>
      
    <div class="main">
     <form action="signup_script.php" method="post">
     <center><h2 style="font-weight:600; color:rgb(68, 81, 83);">Secure Chat</h2></center>
     <hr>
     <input type="text" placeholder="First Name" class="form-control" name="fname" required>
     <input type="text" placeholder="Last Name" class="form-control" name="lname" required>
     <input type="email" placeholder="E-mail Address" class="form-control" name="email" required>
     <input type="password" class="form-control" placeholder="Password" name="password" required>
     <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
     <input type="submit" value="Sign Up" class="btn btn-success btn-block" name="submitbtn">
     
     <div class = "bottom" align="center">
         <a href="index.php">Login if already registered</a>
     </div>
</form>
</div>
</body>
</html>