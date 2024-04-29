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
                
            </nav>
            <div class="information-pane">
                <h2 class="title">TRENDING</h2>
                <p>Hello</p>
            </div>
        </div>
    </div>
</body>
</html>