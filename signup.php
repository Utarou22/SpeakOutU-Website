<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Account - SpeakOutU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.signup.css">
</head>
<body>
    <div class="overlay">
        <form class="signup-container" action="includes/signup.inc.php" method="post">
            <label class="signup-message">CREATE ACCOUNT</label>
            <?php
            signup_inputs();
            ?>
            <div class="prompt-container">
                <?php
                    check_signup_errors();
                ?>
            </div>
            <button type="submit" class="signup-button" id="signup-button">SIGN UP</button>
            <button type="button" class="re-login" id="re-login" onclick="window.location.href='index.php'">Back to Login</button>
        </form>
    </div>
</body>
</html>
