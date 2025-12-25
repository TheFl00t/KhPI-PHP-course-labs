<?php
    $uploads_dir = "uploads/";
    
    // Перевіряємо, чи існує папка
    if (is_dir($uploads_dir)) {
        
        $files = array_diff(scandir($uploads_dir), array('.', '..'));
        
        
        echo "<h3 style='margin-bottom: 0;'>
                    Список усiх файлiв у директорії 
                <span style='background-color: #bbbbbb; padding: 2px 2px 2px 6px; border-radius: 4px'>
                    {$uploads_dir}
                </span>:
            </h3>";
        
        // Перевіряємо, чи є файли
        if (count($files) > 0) {
            
            echo "<p>Натисніть на ім'я, щоб завантажити:</p>";
            echo "<ul>";
            
            foreach ($files as $file) {
                $path = $uploads_dir . $file;
                
                // Виводимо посилання
                echo "<li><a href='{$path}'>{$file}</a></li>";
            }
            echo "</ul>";
            
        } else {
            echo "<p>Папка порожня.</p>";
        }
        
    } else {
        echo "<p style='color: red'>Папка uploads ще не створена.</p>";
    }

    echo "<br><a href='index.html'>Повернутися на головну</a>";
?>
