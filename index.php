<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - SpeakOutU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.login.css">
    <script src="https://kit.fontawesome.com/f8e1898ab0.js" crossorigin="anonymous"></script>
</head>
<body>
    <button class="admin-mode" onclick="window.location.href='admin_login.php'"><i class="fa-solid fa-wrench"></i></button>
    <div class="overlay">
        <form class="login-container" action="includes/login.inc.php" method="post">
            <h2 class="welcome-message">WELCOME</h2>
            <input type="text" id="email" name="login-email" placeholder="Email">
            <input type="password" id="password" name="login-password" placeholder="Password">
            <div class="prompt-container">
                <?php
                check_login_errors();
                ?>
            </div>
            <button type="submit" class="login-button" id="login-button">LOGIN</button>
            <button type="button" class="forgot-password" id="forgot-password">Forgot Password?</button>
            <br>
            <button type="button" class="create-account" id="create-account" onclick="window.location.href='signup.php'">Create an Account</button>
        </form>
    </div>
</body>
</html>