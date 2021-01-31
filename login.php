<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">  
</head>
<body>
    <form action="server.php" method="POST">
        <h1>Login to your account</h1>
        <?php include('message.php')?>
        <div class="input-group">
            <label for="Username">Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <p class="forgot-password">forgot password?</p>
        </div>
        <div class="submit">
            <input type="submit" name="login" value="Login">
        </div>
        <div>
            <p style="margin-top: 30px;">Don't have an account? <a href="registration.php">sign up</a></p>
        </div>
    </form>
</body>
</html>