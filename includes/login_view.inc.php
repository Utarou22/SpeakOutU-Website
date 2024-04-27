<?php

declare(strict_types= 1);

function check_login_errors() {
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        if (isset($errors["empty_input"])) {
            $error = $errors["empty_input"];
        } else if ($errors["login_incorrect"]) {
            $error = $errors["login_incorrect"];
        }

        echo '<p class="form-error">' . $error . '</p>';

        unset($_SESSION["errors_login"]);
    } else if (isset($_GET['login']) && $_GET['login'] === "success") {
        echo '<br>';
        echo '<p class="form-error">Login success!</p>';
    }
}