<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $admin_name = $_POST["admin-name"];
    $admin_password = $_POST["admin-password"];

    try {
        $errors = [];

        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        //ERROR HANDLERS
        if (is_input_empty($admin_name, $admin_password)) {
            $errors[] = 'Fill in all fields';
        }

        $result = get_admin_name($pdo, $admin_name);

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../admin_login.php");
    die();
}