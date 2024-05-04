<?php

declare(strict_types=1);

function get_admin_name(object $pdo, string $admin_name) {
    $query = "SELECT * FROM admins WHERE admin_name = :admin_name;";
    $stmt = $pdo->prepare($query);
    $stmt ->bindParam(":admin_name", $admin_name);
    $stmt -> execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}