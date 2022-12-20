<?php
// PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
// Base files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// create object of PHPMailer class with boolean parameter which sets/unsets exception.
$mail = new PHPMailer(true);                              
try {
    $mail->isSMTP(); // using SMTP protocol                                     
    $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
    $mail->SMTPAuth = true;  // enable smtp authentication                             
    $mail->Username = 'sender@gmail.com';  // sender gmail host              
    $mail->Password = 'password'; // sender gmail host password                          
    $mail->SMTPSecure = 'tls';  // for encrypted connection                           
    $mail->Port = 587;   // port for SMTP     

    $mail->setFrom('sender@gmail.com', "Sender"); // sender's email and name
    $mail->addAddress('receiver@gmail.com', "Receiver");  // receiver's email and name

    $mail->Subject = 'Test subject';
    $mail->Body    = 'Test body';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) { // handle error.
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
<?php include_once "header.php"; ?>
    <div class="main">
     <form method="post">
     <center><h2 style="font-weight:600; color:rgb(68, 81, 83);">Secure Chat</h2></center>
     <hr>
     <input type="email" placeholder="E-mail Address" class="form-control" name="email" required>
     <input type="submit" value="Recover Password" class="btn btn-success btn-block" name="submitbtn">
     <div class="error"><?php if(isset($_GET['data'])) echo $_GET['data']; ?></div>
  
     <div class = "bottom" align="center">
         <a href="signup.php">Create new account</a></a>
     </div>
</form>
</div>
</body>
</html>