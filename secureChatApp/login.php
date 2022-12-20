<?php 
    session_start();
    include_once "php/config.php";
    include "includes.php";
    
    // mysqli_real_escape_string to avoid SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    //email validation
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        if(!empty($email) && !empty($password)){   
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            
            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                $hashed_password = $row['password'];
                
                if (password_verify($password, $hashed_password)) {
                    $status = "Active now";
                    $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                    if($sql2){
                        $log = "$email logged in successfully";
                        logger($log);
                        $_SESSION['unique_id'] = $row['unique_id'];
                        header("location:user.php");
                    }else{
                        $err1 = "Something went wrong. Please try again!";
                        header("location:index.php?data=$err1");
                    }
                }else{
                    $err2 = "Email or Password is Incorrect!";
                    header("location:index.php?data=$err2");
                }
            }else{
                $err3 = "User does not exist!";
                header("location:index.php?data=$err3");
            }
        }else{
            $err4 = "All input fields are required!";
            header("location:index.php?data=$err4");
        }
}
?>