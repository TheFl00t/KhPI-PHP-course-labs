<?php

    $file = $_FILES['file_upload'];

    // 1. Перевірка завантаження
    if (!is_uploaded_file($file['tmp_name'])) {
        echo "<h3>Помилка: Файл не обрано або не завантажено! (Код: " . $file['error'] . ")</h3>";
        echo "<a href='index.html'>Повернутися назад</a>";
        exit;
    }

    $file_name = $file['name'];
    $file_type = $file['type'];
    $file_size = $file['size'];

    // 2. Перевірка розміру
    if ($file_size > 2097152) {
        echo "<h3>Помилка: Файл завеликий! Максимальний розмір: 2 Мб.</h3>";
        echo "<a href='index.html'>Повернутися назад</a>";
        exit;
    }

    // 3. Перевірка типу
    if (!str_contains($file_type, "image")) {
        echo "<h3>Помилка: Дозволені лише зображення.</h3>";
        echo "<a href='index.html'>Повернутися назад</a>";
        exit;
    }

    if (!str_contains($file_type, "jpeg") && !str_contains($file_type, "jpg") && !str_contains($file_type, "png")) {
         echo "<h3>Помилка: Дозволені лише формати JPEG, JPG або PNG!</h3>";
         echo "<a href='index.html'>Повернутися назад</a>";
         exit;
    }

    // Папка для завантажень
    $uploads_dir = "uploads/";
    
    // Створюємо папку, якщо її немає
    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }

    // Формуємо шлях
    $safe_filename = basename($file_name);
    $dest_dir = $uploads_dir . $safe_filename;

    if (file_exists($dest_dir)) {
        
        // Отримуємо чисте ім'я та розширення окремо
        $info = pathinfo($safe_filename);
        $name_part = $info['filename'];
        $ext_part = $info['extension'];

        // Генеруємо нове ім'я з датою
        $new_filename = $name_part . "_" . date("His") . "." . $ext_part;
        
        // Оновлюємо шлях призначення
        $dest_dir = $uploads_dir . $new_filename;
        
        // Оновлюємо змінну імені для правильного виводу внизу
        $file_name = $new_filename;
        
        echo "<p style='color: orange'>Файл з таким ім'ям вже існував. Його було перейменовано.</p>";
    }

    // Переміщуємо файл
    if (move_uploaded_file($file['tmp_name'], $dest_dir)) {
        echo "<h3>Файл успішно завантажено!</h3>";
        echo "Ім'я: " . htmlspecialchars($file_name) . "<br>";
        echo "Тип: " . $file_type . "<br>";
        echo "Розмір: " . round($file_size / 1024, 2) . " Кб<br><br>";
        
        // Посилання на скачування
        echo "<a href='{$dest_dir}'>Скачати завантажений файл</a><br><br>";
    } else {
        echo "<h3>Сталася помилка при збереженні файлу.</h3>";
    }

    echo "<a href='index.html'>Повернутися назад</a>";

?>