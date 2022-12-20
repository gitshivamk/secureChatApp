<?php 
    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "securechat";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    
    if(!$conn){
        echo "Database connection error".mysqli_connect_error();
    }

    session_start();

    $incoming_id=$_POST["incoming_id"];
    $outgoing_id=$_POST["outgoing_id"];  

    $s="DELETE FROM messages WHERE outgoing_msg_id ='{$outgoing_id}' AND incoming_msg_id='{$incoming_id}' 
    OR outgoing_msg_id ='{$incoming_id}' AND incoming_msg_id='{$outgoing_id}'";
    
    if(mysqli_query($conn,$s))
    { 
        header("location:user.php");
    }

?>