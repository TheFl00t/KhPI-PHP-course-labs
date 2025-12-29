<?php
// Логiка зберегання ім'я
if (isset($_POST['username'])) {
    $name = htmlspecialchars($_POST['username']);

    setcookie("user_name", $name, time() + 86400 * 7);

    // Перезавантажуємо сторінку
    header("Location: index.php");
    exit;
}

// Логiка видалиня cookie
if (isset($_POST['delete_cookie'])) {
    setcookie("user_name", "", time() - 3600);

    header("Location: index.php");
    exit;
}

// Додому Волтер
header("Location: index.php");
exit;
?>