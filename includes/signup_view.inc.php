<?php

declare(strict_types=1);

function signup_inputs() {
    if (isset($_SESSION["signup_successful"]) && $_SESSION["signup_successful"]) {
        $_SESSION["signup_data"]["user_email"] = "";
    }
    if (isset($_SESSION["signup_data"]["user_email"]) && !isset($_SESSION["errors_signup"]["email_used"]) &&
    !isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo '<input type="text" id="email" name="create-email" 
        placeholder="Enter School Email" value="' . $_SESSION["signup_data"]["user_email"] .'">';
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success"){
        $_SESSION["signup_data"] = "";
        echo '<input type="text" id="email" name="create-email" 
        placeholder="Enter School Email" value="' . $_SESSION["signup_data"] .'">';
    } else {
        echo '<input type="text" id="email" name="create-email" placeholder="Enter School Email">';
    }
    echo '<input type="password" id="password" name="create-password" placeholder="Create Password">';
    echo '<input type="password" id="re-password" name="re-password" placeholder="Re-enter Password">';

}

function check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        if (isset($errors["empty_input"])) {
            $error = $errors["empty_input"];
        } else if ((isset($errors["invalid_email"]))) {
            $error = $errors["invalid_email"];
        } else if ((isset($errors["email_used"]))) {
            $error = $errors["email_used"];
        } else if ($errors["password_different"]) {
            $error = $errors["password_different"];
        }

        echo '<p class="form-error">' . $error . '</p>';

        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success"){
        $_SESSION["signup_data"]["user_email"] = "";
    }
} 