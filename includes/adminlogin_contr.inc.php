<?php

declare(strict_types=1);

function is_input_empty(string $admin_name, string $admin_password) {
    if (empty($admin_name) || empty($admin_password)) {
        return true;
    } else {
        return false;
    }
}

function is_name_wrong(bool|array $result) {
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function is_password_wrong(string $admin_password, string $admin_db_password) {
    if ($admin_password !== $admin_db_password) {
        return true;
    } else {
        return false;
    }
}
