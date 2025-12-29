<?php
session_start();

if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    header("Location: cart_view.php");
    exit;
}

if (isset($_POST['product_id'], $_POST['quantity'])) {
    
    $id = (int)$_POST['product_id'];
    $qty = (int)$_POST['quantity'];

    // --- Кошик ---
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    // Якщо товар є - плюсуємо, якщо ні - створюємо
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + $qty;

    // --- Cookie (Історія) ---
    if (isset($_POST['product_name'])) {
        $name = $_POST['product_name'];
        
        // Отримуємо поточну історію як масив
        $historyCookie = $_COOKIE['history'] ?? '';
        $historyArr = $historyCookie ? explode(',', $historyCookie) : [];

        // Якщо такого товару ще немає в історії, додаємо
        if (!in_array($name, $historyArr)) {
            $historyArr[] = $name; // Додаємо в кінець масиву
            
            // Збираємо назад у рядок
            $newHistoryStr = implode(',', $historyArr);
            
            // Зберігаємо
            setcookie("history", $newHistoryStr, time() + (86700 * 7));
        }
    }
}

header("Location: index.php?status=added");
exit;
?>