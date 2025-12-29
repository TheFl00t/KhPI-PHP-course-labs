<?php
session_start();

$products = $_SESSION['products'] ?? []; 
$cart = $_SESSION['cart'] ?? [];
$total_sum = 0;
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Ваш Кошик</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container container--narrow">
        
        <a href="index.php" class="btn-back">&larr; Продовжити покупки</a>
        
        <h1>🛒 Ваш кошик</h1>

        <?php if (!empty($cart)): ?>
            
            <ul class="cart-list">
                <?php foreach ($cart as $id => $qty): ?>
                    <?php 
                        $item = $products[$id]; 
                        $price = $item[2];
                        $sum = $price * $qty;
                        $total_sum += $sum;
                    ?>
                    
                    <li>
                        <div>
                            <div class="cart-item-name"><?php echo $item[0]; ?></div>
                            <div class="cart-item-info"><?php echo $qty; ?> шт. x <?php echo $price; ?> &#8372;</div>
                        </div>
                        <div class="cart-item-price">
                            <?php echo $sum; ?> &#8372;
                        </div>
                    </li>

                <?php endforeach; ?>
            </ul>

            <div class="cart-total">
                Разом до сплати: <?php echo $total_sum; ?> &#8372;
            </div>

            <div style="margin-top: 20px; text-align: right;">
                <form action="cart_process.php" method="post">
                    <input type="submit" name="clear_cart" value="Очистити кошик" class="btn btn-danger">
                </form>
            </div>

        <?php else: ?>
            <div style="text-align: center; padding: 40px; color: #888;">
                <h3>Кошик порожній 😔</h3>
            </div>
        <?php endif; ?>

        <div class="history-section">
            <p><b>📜 Історія переглядів:</b></p>
            <p style="margin-top: 10px;">
                <?php 
                    $history = $_COOKIE['history'] ?? null;
                    if ($history) {
                        // Робимо красиві теги замість просто тексту
                        $tags = explode(',', $history);
                        foreach($tags as $tag) {
                            echo "<span style='background:#eee; padding:2px 8px; border-radius:4px; margin-right:5px;'>" . htmlspecialchars($tag) . "</span>";
                        }
                    } else {
                        echo "Поки що пусто";
                    }
                ?>
            </p>
        </div>

    </div>

</body>
</html>