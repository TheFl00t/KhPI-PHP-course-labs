<?php
    $firstname = $_POST["firstname"] ?? '';
    $surname = $_POST["surname"] ?? '';

    if (empty($firstname) || empty($surname)) {
        echo "<h3 style='color: red;'>Помилка: Будь ласка, заповніть усі поля!</h3>";
        echo "<a href='index.html'>Повернутися назад</a>";
        
        exit; 
    }

    echo "<h3>Добрий день, " 
        . htmlspecialchars($surname) 
        . " " 
        . htmlspecialchars($firstname) 
        . "!</h3>";
    echo "<a href='index.html'>Повернутися назад</a>";
?>