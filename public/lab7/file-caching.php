<?php

$cache_file = 'cache/report.html';
$cache_life = 600; // 10 хвилин

function generate_report()
{
    // Імітацiя затримки
    sleep(3);

    $html = "<div style='border: 2px solid red; padding: 10px; background: #fff0f0;'>";
    $html .= "<h3>Звіт згенеровано: " . date("H:i:s") . "</h3>";
    $html .= "<table border='1' cellpadding='5' style='border-collapse: collapse; width: 100%;'>";
    $html .= "<tr><th>ID</th><th>Користувач</th><th>Баланс</th></tr>";

    // Генеруємо 1000 рядків
    for ($i = 1; $i <= 1000; $i++) {
        $name = "User_" . bin2hex(random_bytes(3));
        $balance = rand(100, 50000);
        $html .= "<tr><td>$i</td><td>$name</td><td>$balance грн</td></tr>";
    }

    $html .= "</table></div>";

    return $html;
}

?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB7 - File Caching</title>
    <link rel="stylesheet" href="client-side_caching.php">
</head>

<body>
    <h1>Кешування у файл</h1>
    <a href="index.php">&larr; Назад у меню</a>
    <hr>

    <?php

    // ЛОГІКА КЕШУВАННЯ
    if (file_exists($cache_file) && (time() - filemtime($cache_file) < $cache_life)) {
        // Беремо з кешу

        echo "<div style='border: 2px solid green; padding: 10px; background: #f0fff0;'>";
        echo "<h3>Дані завантажено з КЕШУ</h3>";
        echo "<p>Файл кешу створено о: " . date("H:i:s", filemtime($cache_file)) . "</p>";
        echo "</div>";

        readfile($cache_file);

    } else {
        // Генеруємо наново

        // Отримуємо дані
        $content = generate_report();

        // Створюємо папку cache, якщо немає
        if (!is_dir('cache')) {
            mkdir('cache');
        }

        file_put_contents($cache_file, $content);

        echo $content;
    }
    ?>

</body>

</html>