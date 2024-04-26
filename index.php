<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - SpeakOutU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/welcome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/f8e1898ab0.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="overlay">
        <form class="login-container" action="includes/login.inc.php" method="post">
            <h1 class="welcome-message">WELCOME</h1>
            <input type="text" id="email" name="login-email" placeholder="Email">
            <input type="password" id="password" name="login-password" placeholder="Password">
            <button type="submit" class="login-button" id="login-button">LOGIN</button> 
            <button type="button" class="forgot-password" id="forgot-password">Forgot Password?</button>
            <br>
            <button type="button" class="create-account" id="create-account" onclick="window.location.href='signup.php';">Create an Account</button>
        </form>
    </div>
</body>
</html>