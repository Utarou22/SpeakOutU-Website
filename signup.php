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
    <link rel="stylesheet" href="CSS/signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/f8e1898ab0.js" crossorigin="anonymous"></script>
</head>
<body>
    <form class="signup-container" action="includes/signup.inc.php" method="post">
        <label class="signup-message">CREATE ACCOUNT</label>
        <?php
        signup_inputs();
        ?>
        <button type="submit" class="signup-button" id="signup-button">SIGN UP</button>
        <button type="button" class="re-login" id="re-login">Back to Login</button>
    </form>

    <?php
        check_signup_errors();
    ?>
</body>
</html>
