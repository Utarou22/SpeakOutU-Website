<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/admin_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin - SpeakOutU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.admin.css">
    <script src="https://kit.fontawesome.com/f8e1898ab0.js" crossorigin="anonymous"></script>
    <script src="JS/home.js"></script>
</head>
<body>
    <div class="overlay">
        <nav class="navigation-bar">
            <h1 class="title">SpeakOutU</h1>
            <div class="options">
                <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
        </nav>
        <div class="query-wrapper">
            <div class="pending-posts">
                <?php   
                    display_db_posts()
                ?>
            </div>
        </div>
    </div>
</body>
</html>