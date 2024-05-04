<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $admin_name = $_POST["admin-name"];
    $admin_password = $_POST["admin-password"];

    try {
        $errors = [];

        require_once 'dbh.inc.php';
        require_once 'adminlogin_model.inc.php';
        require_once 'adminlogin_contr.inc.php';

        //ERROR HANDLERS
        if (is_input_empty($admin_name, $admin_password)) {
            $errors["empty_input"] = 'Fill in all fields';
        }

        $result = get_admin_name($pdo, $admin_name);

        if (is_name_wrong($result)) {
            $errors['login_incorrect'] = 'Incorrect username or password!';
        }
        if (!is_name_wrong($result) && is_password_wrong($admin_password, $result["admin_password"])) {
            $errors['login_incorrect'] = 'Incorrect username or password!';
        }

        require_once 'config_session.inc.php';

        $_SESSION["signup_successful"] = false;

        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("Location: ../admin_login.php");
            die();
        }

        $new_session_id = session_create_id();
        $session_id = $new_session_id . "_" . $result["admin_id"];
        session_id($session_id);

        $_SESSION["admin_id"] = $result["admin_id"];
        $_SESSION["admin_name"] = htmlspecialchars($result["admin_name"]);
        $_SESSION["last_regeneration"] = time();

        header("Location: ../admin.php?access=granted");
        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../admin_login.php");
    die();
}