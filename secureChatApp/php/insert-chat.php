<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        include "includes.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        
        if(!empty($message)){
            $log = "$incoming_id sent message to $outgoing_id, message is : $message";
            logger($log);

            //Chat encryption
            $en_message = $message;
            // Store the cipher method
            $method = "AES-128-CTR";
            $iv_length = openssl_cipher_iv_length($method);
            $iv = '6204610323130699';
            $secret_key = "SecureChat";
    
            $encrypted_message = openssl_encrypt($en_message, $method, $secret_key, 0, $iv);
    
            $log = "$incoming_id sent message to $outgoing_id, message is : $message";
            logger($log);

            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$encrypted_message}')") or die();
            
        }
    }else{
        header("location:index.php");
    }


    
?>