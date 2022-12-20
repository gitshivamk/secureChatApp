<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: user.php");
  }
  include 'php/includes.php';
?>

<?php include_once "header.php"; ?>
    <div class="main">
     <form action="login.php" method="post">
     <center><h2 style="font-weight:600; color:rgb(68, 81, 83);">Secure Chat</h2></center>
     <hr>
     <input type="email" placeholder="E-mail Address" class="form-control" name="email" required>
     <input type="password" class="form-control" placeholder="Password" name="password" required>
     <input type="submit" value="Login" class="btn btn-success btn-block" name="submitbtn">
     <div class="error"><?php if(isset($_GET['data'])) echo $_GET['data']; ?></div>
     
     <div class = "bottom" align="center">
         <a href="forget.php">Forget password?</a>
     </div>
     <div class = "bottom" align="center">
         <a href="signup.php">Create new account</a></a>
     </div>
</form>
</div>
</body>
</html>