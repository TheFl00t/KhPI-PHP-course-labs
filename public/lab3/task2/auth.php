<?php
session_start();

// Логiка ВХОДУ
if (isset($_POST['login']) && isset($_POST['password'])) {
    
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        
        $_SESSION['user_login'] = htmlspecialchars($_POST['login']);
        
        header("Location: index.php");
        exit;
    }
}

// Логiка ВИХОДУ
if (isset($_POST['logout'])) {

    session_unset();
    session_destroy();
    
    header("Location: index.php");
    exit;
}

header("Location: index.php");
exit;
?>