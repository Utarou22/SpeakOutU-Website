<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/adminlogin_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login (Admin) - SpeakOutU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.admin_login.css">
    <script src="https://kit.fontawesome.com/f8e1898ab0.js" crossorigin="anonymous"></script>
</head>
<body>
    <button class="basic-mode" onclick="window.location.href='index.php'"><i class="fa-solid fa-circle-arrow-left"></i></button>
    <div class="overlay">
        <form class="login-container" action="includes/adminlogin.inc.php" method="post">
            <h1 class="title">ADMIN MODE</h1>
            <div class="inputs">
                <input type="text" id="email" name="admin-name" placeholder="Username">
                <input type="password" id="password" name="admin-password" placeholder="Password">
            </div>
            <div class="prompt-container">
                <?php
                    check_login_errors();
                ?>
            </div>
            <button type="submit" class="login-button">LOGIN</button>
        </form>
    </div>
</body>
</html>