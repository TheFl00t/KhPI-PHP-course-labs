<?php

// Перевіряємо метод
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Refresh: 3; url=index.php");
    echo "<div style='display: flex; justify-content: center; font-size: 24px; font-weight: bold; padding-top: 20px;'>";
    echo "<h3>Метод запиту не POST. Повертаємо на головну...</h3>";
    echo "</div>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Server Info</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="info-box">
        <div class="content-wrap">
            <h2 style="text-align: center;">Інформація про сервер</h2>

            <?php
            $client_ip = $_SERVER['REMOTE_ADDR'];
            $user_browser = $_SERVER['HTTP_USER_AGENT'];
            $used_script = $_SERVER['PHP_SELF'];
            $used_method = $_SERVER['REQUEST_METHOD'];
            $path_to_file = $_SERVER['SCRIPT_FILENAME'];
            ?>

            <table>
                <tr>
                    <th>Параметр</th>
                    <th>Значення</th>
                </tr>
                <tr>
                    <td>IP Клієнта</td>
                    <td><?php echo $client_ip; ?></td>
                </tr>
                <tr>
                    <td>Браузер</td>
                    <td><?php echo $user_browser; ?></td>
                </tr>
                <tr>
                    <td>Скрипт</td>
                    <td><?php echo $used_script; ?></td>
                </tr>
                <tr>
                    <td>Метод</td>
                    <td><b><?php echo $used_method; ?></b></td>
                </tr>
                <tr>
                    <td>Шлях до файлу</td>
                    <td><?php echo $path_to_file; ?></td>
                </tr>
            </table>

            <p class="back-arrow"><a href='index.php'>&larr; Повернутись назад</a></p>
        </div>
    </div>

</body>

</html>