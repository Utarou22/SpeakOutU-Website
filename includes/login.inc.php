<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $user_email = $_POST["login-email"];
    $user_password = $_POST["login-password"];

    try {
        $errors = [];

        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDLERS
        if (is_input_empty($user_email, $user_password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        
        $result = get_user_email($pdo, $user_email);

        if (is_email_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }
        if (!is_email_wrong($result) && is_password_wrong($user_password, $result["user_password"])) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        require_once 'config_session.inc.php';

        $_SESSION["signup_successful"] = false;

        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("Location: ../signup.php");
            die();
        }

        $new_session_id = session_create_id();
        $session_id = $new_session_id . "_" . $result["user_id"];
        session_id($session_id);

        $_SESSION["user_id"] = $result["user_id"];
        $_SESSION["user_email"] = htmlspecialchars($result["user_email"]);
        $_SESSION["last_regeneration"] = time();

        header("Location: ../home.php?login=success");
        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) { 
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}