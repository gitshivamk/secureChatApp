<?php
session_start();
include_once "php/config.php";
include "includes.php";

// mysqli_real_escape_string to avoid SQL injection
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($cpassword)){
        
        // Remove all illegal characters from email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // password validation
        if ($_POST["password"] === $_POST["cpassword"]) {

            //email validation
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($sql) > 0){
                    echo "This email already exist!";
                }else{
                    $ran_id = rand(time(), 100000000);
                    $status = "Active now";

                    // password_hash() using Argon2i
                    $encrypt_pass = password_hash($password, PASSWORD_ARGON2I);
                    $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, status)
                    VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$status}')");
                    if($insert_query){
                        $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                        if(mysqli_num_rows($select_sql2) > 0){
                            $result = mysqli_fetch_assoc($select_sql2);
                            $log = "$email signed up successfully";
                            logger($log);
                            $_SESSION['unique_id'] = $result['unique_id'];
                            header("location:user.php");
                        }else{
                            echo "This email already not exist!";
                        }
                    }else{
                        echo "Something went wrong. Please try again!";
                    }
                }
                }else{
                    echo "$email is not a valid email!";
                }
            }else{
                echo "Passwords doesn't match!";
            }
        }else{
            echo "All input fields are required!";
        }
?>