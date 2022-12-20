<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>
<?php include_once "header.php"; ?>
    <section class="users">
      
      <div class="search">
        <span class="text">Select a user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button class="glyphicon glyphicon-search"></button>
      </div>
      <div class="users-list">
  
      </div>
      </section>
      <script src="javascript/users.js"></script>
      
    </body>
</html>
