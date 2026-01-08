<?php

function checkUserExists($pdo, $email) {
    $stmt = $pdo->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->execute([$email]);

    return $stmt->fetch() != null;
}

function getUser($pdo, $email) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    return $stmt->fetch();
}

/**
 * Додає користувача в БД.
 * @return `bool` якщо користувач успішно доданий
 */
function addUser($pdo, $username, $email, $password) {
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $hash = password_hash($password, PASSWORD_DEFAULT);

    return $stmt->execute([$username, $email, $hash]);
}

?>
