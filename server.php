<?php
session_save_path();
include('database.php'); // including the database file to connect to the db
include('message.php'); //include the message file to set and unset succcess and error sessions

// for a user to register successfully
// receives user's input from the form
if (isset($_POST['register'])){  
    //the mysqli_real_escape_string() function escapes special characters in a string for use in an SQL query
    $username =  mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // form validation 
    /* $_SESSION['error] and $_SESSION['success] stores the error/success message
     in a session that has been initialzed in the message.php file*/
    if (empty($username)){
        $_SESSION['error'] = "username is required";
        header("location:registration.php");
    }elseif (empty($email)){
        $_SESSION['error'] = "Email is required";
        header("location:registration.php");
    }elseif (empty($password)){
        $_SESSION['error'] = "Password is required";
        header("location:registration.php");
    }elseif (empty($confirm_password)){
        $_SESSION['error'] = "kindly confirm Password";
        header("location:registration.php");
    }elseif ($password != $confirm_password){
        $_SESSION['error'] = "Passwords doesn't match";
        header("location:registration.php");
    }else{ 
        // checks the database if a user does not exist with the same username and email
        $results = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1") ;
        $user = mysqli_fetch_array($results);
        if ($user['username'] === $username){
             $_SESSION['error'] = "username already exists";
            header("location:registration.php");
        }elseif ($user['email'] === $email){
            $_SESSION['error'] = "email already exists";
            header("location:registration.php");
            // checks the length of the password
        }elseif (strlen($password) < 8){
            $_SESSION['error'] = "Password too short";
            header("location:registration.php");

            /* When all user's input has been validated and there is no error, the user finally registers
            and the header is set to login.php as we want a registered user to login*/
        }else {$password = sha1($password); // sha1 is used to hash the password 
            $sql = mysqli_query($conn, "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')");
            $_SESSION['success'] = "Registration successful";
            header("location:login.php");
        }
    }
}   


// Users login
// recieves input from users
if (isset($_POST['login'])){ 
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    //  validation
    if (empty($username)){
        $_SESSION['error'] = "Kindly enter your username";
        header("location:login.php");
    }elseif (empty($password)){
        $_SESSION['error'] = "Kindly enter your password";
        header("location:login.php");
    }else{
        /* checks if the details supplied is in the database as a registered user, 
        if yes it directs the user to the index page */
        $password = sha1($password);
        $results = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        $row = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1){
            $_SESSION['username'] = $username;
            $_SESSION['success'] ="you are now logged in";
            header('location:index.php');
        }else{
            $_SESSION['error'] = "Wrong Username/Password";
            header('location:login.php');
        }
    }
}