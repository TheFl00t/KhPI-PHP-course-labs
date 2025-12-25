<?php
    $log_file_name = "log.txt";

    // Перевіряємо, чи прийшли дані
    if (!empty($_POST['user_text'])) {
        
        $user_text = $_POST['user_text'];
        
        $text_to_save = "[" . date("H:i:s") . "] " . htmlspecialchars($user_text) . PHP_EOL;

        // Створюємо та відкриваємо файл
        $log = fopen($log_file_name, "a") or die("Не можливо відкрити файл!");

        fwrite($log, $text_to_save);
        fclose($log);
        
        echo "<p style='color:green'>Запис додано!</p>";
    }

    
    echo "<h3>Історія повідомлень:</h3>";
    
    if (file_exists($log_file_name)) {
        $content = file_get_contents($log_file_name);
        
        echo "<div style='background: #f0f0f0; padding: 10px; border: 1px solid #ccc;'>";
        // Виводимо весь вміст файлу на сторінку
        echo nl2br($content);
        echo "</div>";
    } else {
        echo "Файл поки що порожній.";
    }

    echo "<br><a href='index.html'>Повернутися назад</a>";
?>