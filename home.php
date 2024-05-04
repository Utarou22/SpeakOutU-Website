<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/home_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - SpeakOutU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.home.css">
    <script src="https://kit.fontawesome.com/f8e1898ab0.js" crossorigin="anonymous"></script>
    <script src="JS/home.js"></script>
</head>
<body>
    <div class="overlay">
        <nav class="navigation-bar">
            <h1 class="title">SpeakOutU</h1>
            <div class="options">
                <a href="#"><i class="fas fa-home"></i></a>
                <div class="account-dropdown" id="account-dropdown">
                    <a href="#" onclick="toggleDropdown('account-dropdown')"><i class="fas fa-user"></i></a>
                    <div class="account-subdropdown">
                        <a href="#">Profile</a>
                        <a href="#">Settings</a>
                        <a href="index.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="sub-overlay">
            <nav class="action-bar">
                <div class="sub-action-bar">
                    <button type="button" class="create-post" onclick="toggleCreatePostOverlay()"><i class="fa-solid fa-plus"></i>CREATE NEW POST</button>
                    <input type="text" class="search-bar" placeholder="search a topic...">
                </div>
            </nav>
            <div class="newsfeed-wrapper">
                <section class="create-post-overlay" id="create-post-overlay">
                    <form class="create-post-pane">
                        <textarea class="post-input" placeholder="Write something..."></textarea>
                        <div class="create-post-buttons">
                            <button class="cancel-button">Cancel</button>
                            <button class="submit-button">Submit Post</button>
                        </div>
                    </form>
                </section>
                <section class="newsfeed-section">
                    <?php
                        display_db_posts();
                    ?>
                </section>
            </div>
            <div class="information-pane">
                <h class="pane-title">TRENDING!!!</h>
            </div>
        </div>
    </div>
</body>
</html>