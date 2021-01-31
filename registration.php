<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <!-- points to the style.css file for styling the form -->
    </head>
<body>
    <form action="server.php" method= "POST">
        <h1>Registration</h2>
        <?php include('message.php') ?>
        <!-- includes the message.php file to dispaly error and success messages -->
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter your Username">
        </div>
        <div class="input-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" placeholder="Enter your email">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Minimum of eight characters">
        </div>
        <div class="input-group">
            <label for="password"> Confirm Password</label>
            <input type="password" name="confirm_password">
        </div>
        <div class="submit">
            <input type="submit" value="Register" name="register" >
        </div>
        <div>
            <p style="margin-top: 30px;">Already have an account? <a href="login.php">login</a></p>
            <!-- links to the login form for a registered user -->
        </div>
    </form>
</body>
</html>
