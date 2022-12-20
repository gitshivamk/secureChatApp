<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>
<?php include_once "header.php"; ?>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: user.php");
          }
        ?>
        <a href="user.php" class="glyphicon glyphicon-arrow-left"></a>

        <div class="details">

          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          
          <div class="dlt" style="position:absolute; left:656px; top:10px;">

            <form action = "deleteChat.php" method="post">
              <input type="hidden" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" />
              <input type="hidden" name="incoming_id" value="<?php echo $user_id; ?>" />
              <input type="submit" name="delete" value="Clear chat" class="btn btn-danger">
            </form>

          </div>
          <p><?php echo $row['status']; ?></p>

        </div>

      </header>
      <div class="chat-box">

      </div>
      <form action = "#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button class="glyphicon glyphicon-send"></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>
