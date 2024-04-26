<?php

declare(strict_types=1);

function get_user_email(object $pdo, string $user_email) {
    $query = "SELECT user_email FROM users WHERE user_email = :user_email;";
    $stmt = $pdo->prepare($query);
    $stmt ->bindParam(":user_email", $user_email);
    $stmt -> execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $user_email, string $user_password) {
    $query = "INSERT INTO users (user_email, user_password) VALUES (:user_email, :user_password);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    
    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, $options);

    $stmt ->bindParam(":user_email", $user_email);
    $stmt ->bindParam(":user_password", $hashed_password);
    $stmt -> execute();

}