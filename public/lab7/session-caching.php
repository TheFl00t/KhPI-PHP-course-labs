<?php
session_start();

// Очищення кешу
if (isset($_POST['clear_cache'])) {
    unset($_SESSION['cached_data']);
    unset($_SESSION['cached_time']);

    header("Location: session-caching.php");
    exit();
}

function get_data()
{
    // Імітацiя затримки
    sleep(2);

    $html = "<ul>";
    for ($i = 1; $i <= 5; $i++) {
        $price = rand(100, 900);
        $html .= "<li>Товар #{$i} — <b>{$price} грн</b></li>";
    }
    $html .= "</ul>";

    return $html;
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>LAB7 - Session Caching</title>
    <link rel="stylesheet" href="client-side_caching.php">
</head>

<body>
    <h1>Кешування в сесії</h1>
    <a href="index.php">&larr; Назад у меню</a>
    <hr>

    <form method="post" style="margin-bottom: 20px;">
        <button type="submit" name="clear_cache">
            Очистити кеш сесії
        </button>
    </form>

    <?php
    // ЛОГІКА КЕШУВАННЯ
    if (isset($_SESSION['cached_data'])) {
        // Беремо з сесії

        echo "<div style='border: 2px solid green; padding: 10px; background: #f0fff0;'>";
        echo "<h3>Дані взято з СЕСІЇ</h3>";
        echo "<p>Збережено о: " . $_SESSION['cached_time'] . "</p>";
        echo "</div>";

        echo $_SESSION['cached_data'];

    } else {
        // Генеруємо наново

        echo "<div style='border: 2px solid red; padding: 10px; background: #fff0f0;'>";
        echo "<h3>Дані згенеровано</h3>";
        echo "</div>";

        // Отримуємо дані
        $data = get_data();

        // Зберiгаємо в сесію
        $_SESSION['cached_data'] = $data;
        $_SESSION['cached_time'] = date("H:i:s");

        echo $data;
    }
    ?>

</body>

</html>