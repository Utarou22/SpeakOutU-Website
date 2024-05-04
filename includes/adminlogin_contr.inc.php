<?php

declare(strict_types=1);

function is_input_empty(string $user_email, string $user_password, string $re_user_password) {
    if (empty($user_email) || empty($user_password) || empty($re_user_password)) {
        return true;
    } else {
        return false;
    }
}
