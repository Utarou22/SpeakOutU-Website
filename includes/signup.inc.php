<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_email = $_POST["create-email"];
    $user_password = $_POST["create-password"];
    $re_user_password = $_POST["re-password"];

    try {
        $errors = [];

        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS
        if (is_input_empty($user_email, $user_password, $re_user_password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($user_email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (is_email_registered($pdo, $user_email)) {
            $errors["email_used"] = "Email already registered!";
        }
        if (is_password_different($user_password, $re_user_password)) {
            $errors["password_different"] = "Password does not match!";
        }

        require_once 'config_session.inc.php';

        $_SESSION["signup_successful"] = false;

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signup_data = [
                "user_email" => $user_email
            ];

            $_SESSION["signup_data"] = $signup_data;

            header("Location: ../signup.php");
            die();
        }

        $_SESSION["signup_successful"] = true;
        create_user($pdo, $user_email, $user_password);

        header("Location: ../index.php?signup=success");
        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query Failed" . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}