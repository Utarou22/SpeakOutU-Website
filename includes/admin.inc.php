<?php

try {
    require_once 'dbh.inc.php';
    require_once 'admin.contr.inc.php';
    require_once 'admin.model.inc.php';

    require_once 'config_session.inc.php';
    
    if (!isset($_SESSION["user_id"])) {
        header("Location: ../index.php?session=terminated");
        exit();
    }

    $current_user_id = $_SESSION["user_id"];

} catch (PDOException $e) {
    echo "Newsfeed Failed: ". $e->getMessage();
}