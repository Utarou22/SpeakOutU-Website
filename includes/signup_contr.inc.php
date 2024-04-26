<?php

declare(strict_types=1);

function is_input_empty(string $user_email, string $user_password, string $re_user_password) {
    if (empty($user_email) || empty($user_password) || empty($re_user_password)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $user_email) {
    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $user_email) {
    if (get_user_email($pdo, $user_email)) {
        return true;
    } else {
        return false;
    }
}

function is_password_different(string $user_password, string $re_user_password) {
    if ($user_password !== $re_user_password) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $user_email, string $user_password) {
    set_user($pdo, $user_email, $user_password);
}