<?php include('message.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do It Now</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    // user Authentication
        if (!isset($_SESSION['username'])){
            $_SESSION['error'] = "you have to log in first";
            header('location:login.php');
        }else{ ?>
            <strong>Welcome!</strong>
            <?php echo $_SESSION['username'];
        }?>

    <div>
        <h2>This is a only accessible to a logged in User</h2>
        <ul>
            <li><h2><a href="index.php">HOME</a></h2></li>
            <li><h2><a href="index.php?logout">Logout</a></h2> </li>
        </ul>
    </div>


    <?php
    // destroys all session and redirects to home page when a user clicks logout
        if (isset($_GET['logout'])){
            session_destroy();
            unset($_SESSION['username']);
            header("location:login.php");
        } ?>
</body>
</html>                  