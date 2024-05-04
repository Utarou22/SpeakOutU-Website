<?php

declare(strict_types=1);

function is_input_empty(string $admin_name, string $admin_password) {
    if (empty($admin_name) || empty($admin_password)) {
        return true;
    } else {
        return false;
    }
}
