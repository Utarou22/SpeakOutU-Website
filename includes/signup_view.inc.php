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
    } else {
        echo '<input type="text" id="email" name="create-email" placeholder="Enter School Email">';
    }
    echo '<input type="password" id="password" name="create-password" placeholder="Create Password">';
    echo '<input type="password" id="re-password" name="re-password" placeholder="Re-enter Password">';

}

function check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";
        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success"){
        echo '<br>';
        echo '<p class="form-success>Signup Successful!</p>';
    }
} 